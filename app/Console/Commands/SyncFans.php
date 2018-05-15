<?php

namespace App\Console\Commands;

use App\Jobs\SyncWechatFans;
use Illuminate\Console\Command;

class SyncFans extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync-fans';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync wechat fans from wechat server.';

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
        dispatch(new SyncWechatFans());
    }
}
