<?php

namespace App\Console\Commands;

use App\Models\Player;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\Echo_;

class HelloWorldCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'app:hello-world-cron';
    protected $signature = 'hello:world';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // echo "Hello world! from commands \n";
        // $this->info("Hello world! from commands \n");
        // $this->comment("Hello world! from commands \n");
        $newPlayer = new Player();
        $newPlayer->team_id = 20;
        $newPlayer->name = "scheduler";
        $newPlayer->date_of_birth= '1995-06-15';
        $newPlayer->nationality= 'Chennai';
        $newPlayer->save();
        Log::info("New Player: ". $newPlayer->name ." stord successfully!");

        $player = Player::find(2);
        echo $player->name;
        Log::info("Player Name: " . $player->name);
    }
}
