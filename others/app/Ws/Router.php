<?php 

namespace App\Ws;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Request;

class Router implements MessageComponentInterface {
    protected $clients;
    protected $controller;

    public function __construct() {        
        $this->clients = new \SplObjectStorage();  
        $this->controller = new Controllers\Chat();
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
        // L'action doit être existante sur le controller
        if (!method_exists($this->controller, $data['action'])) {
            self::jsonSend($from, 'error', 'action invalid');
            return;
        }
        // Utilise Request pour le passage des para. au controller
        Request::replace($data);
        // Execute l'action en fournissant le client actuel et tous les clients
        call_user_func_array(
            [$this->controller, $data['action']],
            [$from, $this->clients]
        );
    }

    public function onClose(ConnectionInterface $conn) {        
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
}