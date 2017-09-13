<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Illuminate\Support\Facades\Log;


class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send {user*}{--queue= : Whether the job should be queued}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send drip e-mails to a user';

    /**
     * The drip e-mail service.
     *
     * @var DripEmailer
     */
    protected $drip;

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
        $user = $this->argument('user');
//        $user = $this->argument();
//        $arguments = $this->arguments();
        Log::info('user:' . json_encode($user));
        //
//        $this->drip->send(User::find($this->argument('user')));
        echo 'Send email to user:'.json_encode($user).',used times:'.(microtime(true)-$_SERVER['REQUEST_TIME']);
    }
}
