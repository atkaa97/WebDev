<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Blade extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:blade {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create New Blade.';

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
        $name = $this->argument('name');

        $myBlade = fopen("resources/views/" . $name . ".blade.php", "w");
        $content = "@extends('layouts.app')";
        fwrite($myBlade, $content);
        fclose($myBlade);

        dd($name . ' blade successfully created!.');
    }
}
