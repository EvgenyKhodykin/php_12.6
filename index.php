<?php
$example_persons_array = [
    [
        'fullname' => 'Иванов Иван Иванович',
        'job' => 'tester',
    ],
    [
        'fullname' => 'Степанова Наталья Степановна',
        'job' => 'frontend-developer',
    ],
    [
        'fullname' => 'Пащенко Владимир Александрович',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Громов Александр Иванович',
        'job' => 'fullstack-developer',
    ],
    [
        'fullname' => 'Славин Семён Сергеевич',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Цой Владимир Антонович',
        'job' => 'frontend-developer',
    ],
    [
        'fullname' => 'Быстрая Юлия Сергеевна',
        'job' => 'PR-manager',
    ],
    [
        'fullname' => 'Шматко Антонина Сергеевна',
        'job' => 'HR-manager',
    ],
    [
        'fullname' => 'аль-Хорезми Мухаммад ибн-Муса',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Бардо Жаклин Фёдоровна',
        'job' => 'android-developer',
    ],
    [
        'fullname' => 'Шварцнегер Арнольд Густавович',
        'job' => 'babysitter',
    ],
];


// Разбиение и объединение ФИО

function getFullnameFromParts($surname, $name, $patronomyc) {
    return $surname .' '. $name .' '. $patronomyc;
};
//print_r (getFullnameFromParts('Иванов','Иван','Иванович'));

function getPartsFromFullname($fullName) {
    $newArray = explode(' ', $fullName);
    $indexArray = ['surname', 'name', 'patronomyc'];
    return array_combine($indexArray, $newArray);
};
//print_r (getPartsFromFullname('Иванов Иван Иванович'));



// Сокращение ФИО

function getShortName($fullName) {
    $shortName = getPartsFromFullname($fullName);
    return $shortName['name'] .' '. mb_substr($shortName['patronomyc'], 0, 1) .'.';       
};
//print_r (getShortName('Иванов Иван Иванович'));



// Определение пола по ФИО
function getGenderFromName($fullName)
{
    $name = getPartsFromFullname($fullName);
    $genderCounter = 0;
    
    if (mb_substr($name['patronomyc'],-3,3,'UTF-8') === 'вна')
        {
            $genderCounter -=1;
        }
    if (mb_substr($name['patronomyc'],-2,2,'UTF-8') === 'ич') 
        {
            $genderCounter += 1;
        }

    if ($genderCounter > 0)
    {
        return 'Мужской пол';
    }
    if ($genderCounter < 0)
    {
        return 'Женский пол';
    }
    if ($genderCounter === 0)
    {
        return 'Неопределённый пол';
    }

};
//print_r (getGenderFromName('аль-Хорезми Мухаммад ибн-Муса'));



// Определение возрастно-полового состава

function getGenderDescription($example_persons_array)
{
    foreach ($example_persons_array as $value)
    {
        $value = getGenderFromName($example_persons_array['fullName']);
    }


};
