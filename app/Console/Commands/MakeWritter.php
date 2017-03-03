<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class MakeWritter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:writter {username} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new writter';

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
        $username = $this->argument('username');
        $password = Hash::make($this->argument('password'));

        if(User::where('username', '=', $username)->exists()){
            $this->line("Erreur: L'utilisateur $username existe déjà.");
        }else{
            $user = new User;
            $user->username = $username;
            $user->password = $password;
            $user->role = 'writter';
            $user->save();
            $this->line("Le rédacteur $username a bien été créé.");
        }

    }
}