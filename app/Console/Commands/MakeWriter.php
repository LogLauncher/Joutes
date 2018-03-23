<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class MakeWriter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:writer {firstname} {lastname} {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new writer';

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
        $firstName = $this->argument('firstName');
        $lastName = $this->argument('lastName');
        $email = $this->argument('email');
        $username = strtoupper($lastName).' '.$firstName;

        if(User::where('username', '=', $username)->exists()){
            $this->line("Erreur: L'utilisateur $username existe déjà.");
        }else{
            $user = new User;
            $user->username = $username;
            $user->password = Hash::make('password');
            $user->email = $email;
            $user->first_name = $firstName;
            $user->last_name = $lastName;
            $user->role = 'writer';
            $user->save();
            $this->line("Le writer $username a bien été créé.");
        }

    }
}
