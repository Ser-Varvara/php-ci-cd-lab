<?php

declare(strict_types=1);

namespace App\Tasks;

class Group
{
    private array $students = [];

    public function __construct(
        public int $group_id,
        public string $name
    ) {}

    public function addStudent(Student $student): void
    {
        $this->students[] = $student;
    }

    public function removeStudent(int $id): void
    {
        foreach ($this->students as $key => $student) {
            if ($student->id === $id) {
                unset($this->students[$key]);
            }
        }
    }

    public function searchStudent(int $id): ?Student
    {
        foreach ($this->students as $student) {
            if ($student->id === $id) {
                return $student;
            }
        }

        return null;
    }
}
