<?php
namespace App\Ws\Controllers;

use App\Ws\Router;
use Ratchet\ConnectionInterface;

class Chat {
    
    public function send(ConnectionInterface $from, $clients) {
        Router::jsonSend($from, 'send', []);
    }
            
}
