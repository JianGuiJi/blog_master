<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mockery\CountValidator\Exception;

class QuestionsAnswers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'QA:name {args*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'ask question and answer it';

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
        //
        try{
            $arguments = $this->arguments();
            if(isset($arguments['args'])){
                $args = $arguments['args'];
                if ($args && count($args) == 1) {
                    $name = $this->ask('What is your account?');
                    echo 'your account is ' . $name;
                    echo ' if you have secret,please input !';
                    $secret = $this->secret('What is your secret?');
                    echo ' your secret:!'.$secret;
                } else {
                    $age = $this->ask('What is your age?' . json_encode($args));
                    echo 'you age is ' . $age;
                }
            }

        }catch(Exception $e){
            echo 'exception: ' . json_encode($e);
        }


    }
}
