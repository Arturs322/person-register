<?php
require_once "htmlSide.php";
require_once "personData.csv";
require_once "vendor/autoload.php";

use App\Person;
use App\Registry;
use App\Storage\CSVStorage;

if (!isset($_POST["name"]))
{
    echo "fill name pliz";
} else
{
    echo "yes";
}
$storage = new CSVStorage("personData.csv");
$registry = new Registry($storage->read());

//$person = new Person("Arturs", "Krusts", "1111", "YEs");
//$registry->add($person);
//var_dump($registry);

if (isset($_POST['submit'])) {
    $registry->add(new Person(
        $_POST["name"],
        $_POST["surname"],
        $_POST["personalCode"],
        $_POST["additionalInformation"],
    ));

    $storage->save($registry->getPersons());
    header('Location: /');

    $person = $storage->getById("112");
    $storage->delete($person);
    include "interface.php";


    $data = fopen("personData.csv", "a+");

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $personalCode = $_POST['personalCode'];
    $addInfo = $_POST['addInfo'];

    $text = "{$name} {$surname} {$personalCode} $addInfo" . PHP_EOL;

//fwrite($data, $name);
//fwrite($data, $surname);
//fwrite($data, $personalCode);

    fclose($data);
}

