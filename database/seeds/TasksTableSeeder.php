<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=1; $i <=10; $i++ ){
            DB::collection("tasks")->insert([
                [
                    "title"         =>  "Test $i",
                    "description"   =>  "Test $i", 
                    "due_date"      =>  "2018-01-15",
                    "completed"     =>  true,
                    "created_at"    =>  date("Y-m-d H:i:s"),
                    "updated_at"    =>  date("Y-m-d H:i:s"),
                ],

            ]);

        }
        
    }
}