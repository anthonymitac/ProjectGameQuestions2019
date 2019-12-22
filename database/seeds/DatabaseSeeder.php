<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->truncateTables([
            'answer',
            'questions',
        ]);
        // $this->call(UsersTableSeeder::class);
        $this->call(AnswerSeeder::class);
        $this->call(QuestionsSeeder::class);
    }
    protected function truncateTables(array $tables){
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');//desactivar las llaves foraneas

        foreach ($tables as $table) {
            DB::table($table)->truncate();//vacias las tablas   
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');//activar las llaves foraneas

    }
    
}
