<?php

use Illuminate\Database\Seeder;

class AccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Account::create([
            'name'         => '个人测试号',
            'token'        => '14897353862jgqbb',
            'user_id'      => '1',
            'app_id'       => 'wxea11580fc7d0d409',
            'app_secret'   => 'b7a6df3044f2e318f83548c7fe6d208d',
            'aes_key'      => '',
            'merchant_id'  => '',
            'merchant_key' => '',
            'cert_path'    => '',
            'key_path'     => '',
            'type'         => 4,
        ]);
    }
}
