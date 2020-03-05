<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\DoorKeys;

class importKeys extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:keys';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Keys from CSV';

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
        $this->info('Importing Banches'); 

        $file = fopen(public_path('keys.csv'), 'r'); 
        $all_data = array(); 
        $i=0;
        while(($data = fgetcsv($file, 1000, ",")) !== FALSE){
            if($i != 0){
                $all_data[] = $data;
            }
            $i++; 
        }



        $bar = $this->output->createProgressBar(count($all_data));
        $bar->start();

        foreach($all_data as $sp => $ad){

            $b = new DoorKeys; 
            $b->key = $ad[0];
            $b->label = $ad[1];
            $b->active = $ad[2] == 'y' ? 1 : 0;

            $b->save();

            $bar->advance();
        }

        $bar->finish();

        echo "\n";

        $this->info('finished');

    }
}
