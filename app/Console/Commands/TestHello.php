<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestHello extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'say:hello {word=World}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hello World';

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
    {  $word = $this->argument('word');
        echo"Hello $word";
    }
}
