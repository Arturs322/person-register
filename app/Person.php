<?php

namespace App;

class Person
{
    private string $name;
    private string $surname;
    private string $personalCode;
    private string $additionalInformation;
    public function __construct(string $name, string $surname, string $personalCode, string $additionalInformation)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->personalCode = $personalCode;
        $this->additionalInformation = $additionalInformation;
    }
    public function getName()
    {
        return $this->name;
    } public function getSurname()
    {
        return $this->surname;
    } public function getPersonalCode()
    {
        return $this->personalCode;
    } public function getAddInfo()
    {
        return $this->additionalInformation;
    }
}