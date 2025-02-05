<?php

namespace App\ValueObjects;

class Boundaries
{
    private float $from;
    private ?float $to;

    public function __construct(float $from, ?float $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function getFrom(): float
    {
        return $this->from;
    }

    public function getTo(): ?float
    {
        return $this->to;
    }
}