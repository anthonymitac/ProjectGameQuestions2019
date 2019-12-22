<?php

use Illuminate\Database\Seeder;
use App\Answer;
class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Answer::create([
            'answername'=>'Principio de Inversión de Dependencias.'
        ]);
        Answer::create([
            'answername'=>'Patrón de Abstracción y Separación de Código Transversal.'
        ]);
        Answer::create([
            'answername'=>'Principio de Única Responsabilidad.'
        ]);
        Answer::create([
            'answername'=>'Patrón de Disminución de Diseño Top-Down.'
        ]);
        
    }
}
