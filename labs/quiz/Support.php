<?php

class Support
{

    /**
     * Создание БД и таблицы questions
     * @return void
     */
    public function create()
    {
        $db = new SQLite3("quiz.sqlite");

        $table = 'CREATE TABLE questions (';
        $table .= 'id INTEGER PRIMARY KEY NOT NULL,';
        $table .= 'quest TEXT UNIQUE NOT NULL,';
        $table .= 'repeat id NOT NULL';
        $table .= ');';

//        CREATE TABLE questions (
//        id INTEGER PRIMARY KEY NOT NULL,
//quest TEXT UNIQUE NOT NULL,
//repeat id NOT NULL
//);

        $result = $db->exec($table);


        $db->close();
    }

    private function insert($question) : string
    {
        return "INSERT INTO questions (quest, repeat) VALUES ('$question', 0)";
    }

    /**
     * Наполнение таблицы questions
     * @return void
     */
    public function seedDB()
    {
        $db = new SQLite3("quiz.sqlite");
        $questions = [
            'Какой командой запускается тестовый сервер PHP?',
            'В PHP с какого символа начинаетcя название любой переменной?',
            'Что такое переменная?',
            'Что такое PSR?',
            'Как правильно именуются переменные?',
            'Какие переменные из представленных верны и корректны(согласно PSR)? - $name, $name_student, $zzz, $lastSeen, $name7, $name_student7, $4student',
            'Какие типы данных вы знаете? Как они обозначаются?',
            'Что такое оператор?',
            'Какие операторы вы знаете?',
            'Есть арифметические операторы.	Примеры?',
            'Операторы сравнения. 	Примеры?',
            'Строковые операторы 	Примеры?',
            'Что такое конкатенация?',
            'Двойные и одинарные кавычки. В чем разница? Как это называется?',
            'Что такое массив?',
            'Что такое элемент массива?',
            'Способы объявления массива. Какие изветны?',
            'Что такое индекс массива? ',
            'Как можно обратиться (извлечь) элемент массива?',
            'Что такое размер массива?',
            'Операторы сравнения. Что это? Какие знаете?',
            '$res =  10 < 12. Чему равен $res? Какой тип данных?',
            'Что такое цикл? пример написания',
            'Что такое тернарный оператор? Пример написания',
            'Что такое блок выражений? В контексте условий, функций или цикла?',
            'require, require_once, include и include_once. Что они делают и в чем их различие?',
            'Что такое функция?',
            'Какие встроенные функциии PHP   вы помните?',
            'Что делают функции count(), strlen() ?',
            'Что такое вывод переменной и что такое возврат значения?',
            'Что такое объявление функции?',
            '$res = 10 > 12. Чему равен $res? Какой тип данных?',
        ];

    foreach ($questions as $question) {
        $sql = $this->insert($question);
        $result = $db->exec($sql);
    }
        $db->close();
    }
}

$db = new Support();
$db->create();
$db->seedDB();