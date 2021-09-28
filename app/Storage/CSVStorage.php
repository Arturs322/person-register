<?php

namespace App\Storage;

use App\Person;
use App\Registry;
use League\Csv\Reader;
use League\Csv\Statement;
use League\Csv\Writer;

class CSVStorage implements Storage
{
    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
    }
    public function save(Registry $registry): void
    {
        $writer = Writer::createFromPath($this->fileName, "w+");
        $writer->setDelimiter(";");
        foreach ($registry->getPersons() as $person) {
            $writer->insertOne((array) $person);
        }
    }

    public function read(): array
    {
        $reader = Reader::createFromPath($this->fileName, "r");
        $records = Statement::create()->process($reader);
        $persons = [];

        foreach ($records as $record) {
            $persons[] = new Person(
                $record[0],
                $record[1],
                $record[2],
                $record[3],
            );
        }
        return
    }

    public function getById(string $id): Person
    {
        $reader = Reader::createFromPath($this->fileName, "r");
        $reader->setDelimiter(";");
        $stat = (new Statement())
            ->where(function (array $record) use ($id){
            return $record[2] === $id;
        })
            ->limit(1);

        $record = $stat->process($reader)->fetchOne(0);
        return new Person(
            $record[0],
            $record[1],
            $record[2],
            $record[3],
        );
    }

    public function delete(Person $person): void
    {
        $reader = Reader::createFromPath($this->fileName, "r");
        $reader->setDelimiter(";");

        $writer = Writer::createFromPath($this->fileName, "r");
        $writer->setDelimiter(";");
    }
}