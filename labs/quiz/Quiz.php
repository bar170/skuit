<?php

class Quiz
{
    private $name;
    private $table;

    public function __construct()
    {
        $this->name = 'quiz.sqlite';
        $this->table = 'questions';
    }

    /**
     * Пулучить результаты select
     * @param $sql
     * @return array|false
     */
    private function select($sql)
    {
        $db = new SQLite3($this->name);
        $result = $db->query($sql);
        $result = $result->fetchArray();

        $db->close();

        return $result;
    }

    /**
     * Установить вопросу с таким id - 1, знак того, что вопрос уже был
     * @param $id
     * @return void
     */
    private function setRepeat($id)
    {
        $db = new SQLite3($this->name);
        $sql = "UPDATE $this->table SET repeat = 1 WHERE id = $id";
        $result = $db->exec($sql);

        $db->close();

        return $result;
    }

    public function getRandom()
    {
        $sql = "SELECT * FROM $this->table WHERE repeat = 0 ORDER BY RANDOM() LIMIT 1";
        $res = $this->select($sql);

        $id = $res['id'];
        $quest = $res['quest'];
        $repeat = $res['repeat'];

        $this->setRepeat($id);
        return $quest;
    }


}

$quiz = new Quiz();
$res = $quiz->getRandom();
var_dump($res);