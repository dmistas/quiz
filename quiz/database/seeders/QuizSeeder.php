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
            'title' => 'Программирование'
        ]);

        DB::table('questions')->insert([
            [
                'uuid' => '1-1',
                'quiz_id' => '1',
                'text' => 'Вопрос номер 1',
            ],
            [
                'uuid' => '1-2',
                'quiz_id' => '1',
                'text' => 'Вопрос номер 2',
            ],
        ]);

        DB::table('choices')->insert([
            [
                'uuid' => '1-1-1',
                'question_id' => '1',
                'text' => 'Тест 1 Вопрос 1 Вариант 1',
                'is_correct' => false
            ],
            [
                'uuid' => '1-1-2',
                'question_id' => '1',
                'text' => 'Тест 1 Вопрос 1 Вариант 2',
                'is_correct' => true
            ],
            [
                'uuid' => '1-2-1',
                'question_id' => '2',
                'text' => 'Тест 1 Вопрос 2 Вариант 1',
                'is_correct' => true
            ],
            [
                'uuid' => '1-2-2',
                'question_id' => '2',
                'text' => 'Тест 1 Вопрос 2 Вариант 2',
                'is_correct' => false
            ],
        ]);
    }
}
