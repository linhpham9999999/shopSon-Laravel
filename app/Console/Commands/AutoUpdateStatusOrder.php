<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class AutoUpdateStatusOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update status delivery order success';

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
     * @return int
     */
    public function handle()
    {
        $hoa_don = DB::table('hoa_don')->select('id_TT')->get()->toArray();
        foreach ($hoa_don as $value){
            if($value->id_TT == 5) {
                DB::table('hoa_don')->where('id_TT','=',5)->update(['id_TT'=>1]);
            }
        }
        $this->info('update:cron Command Run successfully!');
    }
}
