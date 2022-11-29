<?php

class Student
{
    public string $name;
    public string $lastName;
    public string $group;

}

class Group
{
    public array $students;
    public string $name;

    /**
     * Добавить студента в группу
     * @param Student $student
     * @return void
     */
    public function addStudent(Student $student): void
    {
        $this->students[] = $student;
    }

    /**
     * Вернуть имена всех студентов группы
     * @return array
     */
    public function getNameStudents(): array
    {
        $res = [];
        //Помним, что в $this->students хранятся объекты Student,
        // а имя студента хранится в свойстве name
        //перебираем массив, имена складываем в res, потом его вернем
        foreach ($this->students as $student) {
            $res[] = $student->name;
        }

        return $res;
    }
}



$petrov = new Student();
$petrov->name = 'Иван';
$petrov->group = '09703';

$volodin = new Student();
$volodin->name = 'Дмитрий';
$volodin->group = '09703';

$lavrik = new Student();
$lavrik->name = 'Володя';
$lavrik->group = '30848';

$group09 = new Group();
$group09->name = '09703';

$group30 = new Group();
$group30->name = '30848';

$group09->addStudent($petrov);
$group09->addStudent($volodin);
$group30->addStudent($lavrik);


$names = $group09->getNameStudents();
foreach ($names as $name) {
    echo ($name . ' учится в ' . $group09->name . '<br>');
}



//Выведет 'Студент Володя учится в группе 30848
//echo ('Студент ' . $lavrik->name . ' учится в группе ' . $lavrik->group);
