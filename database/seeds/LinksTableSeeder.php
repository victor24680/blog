<?php

use Illuminate\Database\Seeder;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            [
                'link_name' => '百度收藏',
                'link_title' => '百度',
                'link_url' => 'https://www.baidu.com',
            ],
            [
                'link_name' => '锦绣钱程',
                'link_title' => '钱程无限',
                'link_url' => 'www.jinxqc.com',
            ]  
        ];
        DB::table('links')->insert($data);
    }
}
