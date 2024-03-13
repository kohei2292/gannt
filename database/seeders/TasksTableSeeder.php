<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            ['id'=>1, 'text'=>'テストプロジェクト', 'start_date' => '2021-02-01 00:00:00'
                , 'duration'=>5, 'progress'=>0.8, 'parent'=>0, 'user_id'=>1],
            ['id'=>2, 'text'=>'テストタスク', 'start_date' => '2021-02-06 00:00:00'
                , 'duration'=>4, 'progress'=>0.5, 'parent'=>1, 'user_id'=>1],
            ['id'=>3, 'text'=>'テストタスク - 2', 'start_date' => '2021-02-05 00:00:00'
                , 'duration'=>6, 'progress'=>0.7, 'parent'=>1, 'user_id'=>1],
            ['id'=>4, 'text'=>'テストタスク - 2.3', 'start_date' => '2021-02-07 00:00:00'
                , 'duration'=>2, 'progress'=>0, 'parent'=>1, 'user_id'=>1],
            ['id'=>5, 'text'=>'テストタスク - 1.1', 'start_date' => '2021-02-05 00:00:00'
                , 'duration'=>5, 'progress'=>0.34, 'parent'=>3, 'user_id'=>1],
            ['id'=>6, 'text'=>'テストタスク - 1.2', 'start_date' => '2021-02-11 00:00:00'
                , 'duration'=>4, 'progress'=>0.5, 'parent'=>3, 'user_id'=>1],
            ['id'=>7, 'text'=>'テストタスク - 2.1', 'start_date' => '2021-02-06 00:00:00'
                , 'duration'=>5, 'progress'=>0.3, 'parent'=>4, 'user_id'=>1],
            ['id'=>8, 'text'=>'テストタスク - 2.2', 'start_date' => '2021-02-06 00:00:00'
                , 'duration'=>4, 'progress'=>0.9, 'parent'=>3, 'user_id'=>1],
            ['id'=>9, 'text'=>'テストタスク - 2.222', 'start_date' => '2021-02-06 00:00:00'
                , 'duration'=>4, 'progress'=>0.9, 'parent'=>0, 'user_id'=>2],
        ]);
    }
}
