<?php

use Illuminate\Database\Seeder;
use App\Questions;
use App\Answer;
class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Questions::create([
            'questionname'=>'¿Cuál es el principio SOLID 
            que indica que las abstracciones no deben 
            depender de los detalles – los detalles 
            deben depender de las abstracciones?',

            'answer_id'=>Answer::where('id',1)->value('id')
        ]);

        Questions::create([
            'questionname'=>'Patrón de diseño que indica 
            que todo aquel código que hace referencia a 
            seguridad, gestión de operaciones y logging, 
            debe de ser encapsulado muy aparte de la lógica 
            de la aplicación con el fin de lograr extensión y 
            fácil mantenimiento de la misma',

            'answer_id'=>Answer::where('id',2)->value('id')
        ]);
        Questions::create([
            'questionname'=>'¿Cuál es el principio SOLID que 
            indica que una clase debe de tener una única
             responsabilidad o característica?',

            'answer_id'=>Answer::where('id',3)->value('id')
        ]);
        Questions::create([
            'questionname'=>'patrón de diseño que indica 
            que se debe diseñar solamente lo que es necesario 
            con el fin de evitar “sobre-ingenierías‟.',

            'answer_id'=>Answer::where('id',4)->value('id')
        ]);

    }
}
