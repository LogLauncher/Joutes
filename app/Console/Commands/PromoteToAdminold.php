<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class PromoteAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'promote:admin {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Promote a normal user to administrator';

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
        $email = $this->argument('email');

        if(User::where('email', '=', $email)->exists()){
            $user = User::where('email', '=', $email);
            $user->role = 'administrator';
        }else{
            $this->line("Erreur: L'utilisateur est introuvable");
        }

    }
}
