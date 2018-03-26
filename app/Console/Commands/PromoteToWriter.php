<?php
/**
 * Created by PhpStorm.
 * User: quentin.neves
 * Date: 26.03.2018
 * Time: 08:39
 */

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class PromoteToWriter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'promote:writer {email}';

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
            $user = User::where('email', $email)->first();
            $user->role = 'writer';
            $user->update();
            $this->line($email." est bien writer !");
        }else{
            $this->line("Erreur: L'utilisateur est introuvable");
        }

    }
}