<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quizzes')->insert([
            'uuid' => '1',
            'title' => 'Тест по основам PHP'
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => '1-1',
                'quiz_id' => '1',
                'text' => 'Как получить данные POST-запроса?',
            ],
            [
                'uuid' => '1-2',
                'quiz_id' => '1',
                'text' => 'Что будет в переменной $result после выполнения кода $result = 2 + 2 * 2;?',
            ],
            [
                'uuid' => '1-3',
                'quiz_id' => '1',
                'text' => 'Как присвоить переменной значение?',
            ],
            [
                'uuid' => '1-4',
                'quiz_id' => '1',
                'text' => 'Укажите верно заданный массив с использованием синтаксиса языка php',
            ],
            [
                'uuid' => '1-5',
                'quiz_id' => '1',
                'text' => 'Суперглобальными переменными являются:',
            ],
        ]);

        DB::table('choices')->insert([
            [
                'uuid' => '1-1-1',
                'question_id' => '1',
                'text' => 'через функцию getPostData()',
                'is_correct' => false
            ],
            [
                'uuid' => '1-1-2',
                'question_id' => '1',
                'text' => 'через переменную $_POST',
                'is_correct' => true
            ],
            [
                'uuid' => '1-1-3',
                'question_id' => '1',
                'text' => 'через константу POST',
                'is_correct' => false
            ],
            [
                'uuid' => '1-1-4',
                'question_id' => '1',
                'text' => 'Нет правильного варианта',
                'is_correct' => false
            ],
            [
                'uuid' => '1-2-1',
                'question_id' => '2',
                'text' => '6',
                'is_correct' => true
            ],
            [
                'uuid' => '1-2-2',
                'question_id' => '2',
                'text' => '8',
                'is_correct' => false
            ],
            [
                'uuid' => '1-2-3',
                'question_id' => '2',
                'text' => '4',
                'is_correct' => false
            ],
            [
                'uuid' => '1-2-4',
                'question_id' => '2',
                'text' => '2',
                'is_correct' => false
            ],
            [
                'uuid' => '1-3-1',
                'question_id' => '3',
                'text' => '$x = 5',
                'is_correct' => true
            ],
            [
                'uuid' => '1-3-2',
                'question_id' => '3',
                'text' => '$x == 5',
                'is_correct' => false
            ],
            [
                'uuid' => '1-3-3',
                'question_id' => '3',
                'text' => '$x === 5',
                'is_correct' => false
            ],
            [
                'uuid' => '1-3-4',
                'question_id' => '3',
                'text' => ' $x => 5',
                'is_correct' => false
            ],
            [
                'uuid' => '1-4-1',
                'question_id' => '4',
                'text' => '$months = array["September", "October", "November"]',
                'is_correct' => false
            ],
            [
                'uuid' => '1-4-2',
                'question_id' => '4',
                'text' => '$months = "September", "October", "November"',
                'is_correct' => false
            ],
            [
                'uuid' => '1-4-3',
                'question_id' => '4',
                'text' => '$months = array("September", "October", "November")',
                'is_correct' => true
            ],
            [
                'uuid' => '1-4-4',
                'question_id' => '4',
                'text' => '$months = ["September", "October", "November"]',
                'is_correct' => true
            ],
            [
                'uuid' => '1-5-1',
                'question_id' => '5',
                'text' => '$_SERVER',
                'is_correct' => true
            ],
            [
                'uuid' => '1-5-2',
                'question_id' => '5',
                'text' => '$_POST',
                'is_correct' => true
            ],
            [
                'uuid' => '1-5-3',
                'question_id' => '5',
                'text' => '$_NET',
                'is_correct' => false
            ],
            [
                'uuid' => '1-5-4',
                'question_id' => '5',
                'text' => '$_CLIENT',
                'is_correct' => false
            ],
        ]);
    }
}
