<?php

namespace App\Ws;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Request;

class Router implements MessageComponentInterface {
    const DEFAULT_CONTROLLER = "Chat";

    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage();
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $data = json_decode($msg, true);
        if (json_last_error() != JSON_ERROR_NONE) {
            self::jsonSend($from, 'error', 'JSON invalid');
            return;
        }
        // Le message doit contenir une action
        if (!isset($data['action'])) {
            self::jsonSend($from, 'error', 'action missing');
            return;
        }
        // Le message doit contenir un controller ou alors le controller par
        // défaut est utilisé
        if (!isset($data['controller'])) {
            $data['controller'] = self::DEFAULT_CONTROLLER;
        }
        // la classe du controller doit exister
        $controllerClassName = __NAMESPACE__ . "\\Controllers\\" . ucfirst($data['controller']);
        if (!class_exists($controllerClassName)) {
            self::jsonSend($from, 'error', 'controller invalid');
            return;
        }
        $controller = new $controllerClassName();
        // L'action doit être existante sur le controller
        if (!method_exists($controller, $data['action'])) {
            self::jsonSend($from, 'error', 'action invalid');
            return;
        }
        // Utilise Request pour le passage des para. au controller
        Request::replace($data);
        // Execute l'action en fournissant le client actuel et tous les clients
        call_user_func_array(
            [$controller, $data['action']],
            [$from, $this->clients]
        );
    }

    public function onClose(ConnectionInterface $conn) {
        // Si la connexion était authentifié au chat, on délogue l'utilisateur
        if (isset($conn->isAuth)) {
            $controller = new Controllers\Chat();
            $controller->logout($conn, $this->clients);
        }
        $this->clients->detach($conn);
        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }

    public static function jsonSend(ConnectionInterface $client, $action, $data) {
        $client->send(json_encode([
            'action' => $action,
            'data' => $data,
        ]));
    }

    public static function jsonBroadcast($clients, $action, $data) {
        foreach ($clients as $client) {
            self::jsonSend($client, $action, $data);
        }
    }

    public static function jsonBroadcastToAuth($clients, $action, $data) {
        foreach ($clients as $client) {
            if (isset($client->isAuth)) {
                self::jsonSend($client, $action, $data);
            }
        }
    }

}