<?php

use Illuminate\Database\Seeder;
use MyApp\ReadingCircles\Infrastructure\DAOs\MemberDAO;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MemberDAO::create([
            'login_id' => 'aaa',
            'name' => 'テストユーザー名前',
            'display_name' => 'テストユーザー表示用名前',
        ]);
    }
}
