<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

interface InstructorRepository
{
    public function getInstructors(int $limit): Collection;
}