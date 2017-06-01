<?php
namespace App\Ws\Controllers;

use App\Ws\Router;
use Ratchet\ConnectionInterface;
use Request;
use Auth;

class Chat {

    public function login(ConnectionInterface $from, $clients) {
        $email = Request::input('email', '');
        $password = Request::input('password', '');
        if (!Auth::attempt(['email' => $email, 'password' => $password], false)) {
            Router::jsonSend($from, 'error', 'login unsuccessful');
            return;
        }
        $from->isAuth = true;
        $from->email = $email;
        Router::jsonSend($from, 'login', 'login successful');
        Router::jsonBroadcastToAuth($clients, 'connection', [
            'email' => $from->email,
            'id' => $from->resourceId,
        ]);
    }

    public function logout(ConnectionInterface $from, $clients) {
        if (!isset($from->isAuth)) {
            Router::jsonSend($from, 'error', 'Authentification required');
            return;
        }
        unset($from->isAuth);
        Router::jsonSend($from, 'logout', 'logout successful');
        Router::jsonBroadcastToAuth($clients, 'disconnection', [
            'email' => $from->email,
            'id' => $from->resourceId,
        ]);
    }

    public function send(ConnectionInterface $from, $clients) {
        if (!isset($from->isAuth)) {
            Router::jsonSend($from, 'error', 'Authentification required');
            return;
        }
        $msg = Request::input('msg');
//        if (time() - $from->lastSend < $delay) {
//
//        }
//        $from->lastSend = time();
        Router::jsonBroadcastToAuth($clients, 'send', [
            'email' => $from->email,
            'msg' => $msg,
        ]);
    }

    public function usersList(ConnectionInterface $from, $clients) {
        if (!isset($from->isAuth)) {
            Router::jsonSend($from, 'error', 'Authentification required');
            return;
        }
        foreach ($clients as $client) {
            if (isset($client->isAuth)) {
                Router::jsonSend($from, 'connection', [
                    'email' => $client->email,
                    'id' => $client->resourceId,
                ]);
            }
        }
    }



}
