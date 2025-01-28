<?php

namespace App\Repositories\Db;

use App\Models\Instructor;
use App\Repositories\InstructorRepository;
use Illuminate\Support\Collection;
use DB;

class InstructorsRepositoryDb implements InstructorRepository
{
    public function getInstructors(int $limit): Collection
    {
        return DB::table('instructors')
            ->select('instructors.*')
            ->join('users', 'users.id', '=', 'instructors.user_id')
            ->where('users.is_active', true)
            ->groupBy('instructors.id')
            ->limit($limit)
            ->get();
    }
}