<?php

namespace App\ValueObjects;

use Illuminate\Contracts\Support\Arrayable;

class InstructorName implements Arrayable
{
    private int $id;
    private string $first_name;
    private string $last_name;

    public function __construct($id, $first_name, $last_name)
    {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->first_name;
    }

    public function getLastName(): string
    {
        return $this->last_name;
    }

    public function getFullName(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function toArray()
    {
        $result = [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name
        ];
    }
}