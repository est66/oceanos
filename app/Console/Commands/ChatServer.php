<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ChatServer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chat:server {port=8989}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start the chat Web Socket server';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $port = $this->argument('port');
        echo "starting ws on port {$port}\n";
        $server = \Ratchet\Server\IoServer::factory(
            new \Ratchet\Http\HttpServer(
                new \Ratchet\WebSocket\WsServer(
                    new \App\Ws\Router()
                )
            )
            , $port, '0.0.0.0'
        );
        $server->run();
    }
}
