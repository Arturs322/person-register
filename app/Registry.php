<?php
namespace App;

class Registry
{
    private array $persons = [];

    public function __construct(array $persons)
    {
        foreach ($persons as $person)
        {
            if ($person instanceof Person) $this->add($person);
        }
    }
    public function add(Person $person): void
    {
        $this->persons[] = $person;
    }
    public function getPersons()
    {
        return $this->persons;
    }
}