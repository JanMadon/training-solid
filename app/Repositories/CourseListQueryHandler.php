<?php

namespace App\Repositories;

use App\Queries\CourseListQuery;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface CourseListQueryHandler
{
    public function paginate(CourseListQuery $courseListQuery): LengthAwarePaginator;
    public function handle(CourseListQuery $courseListQuery): Collection;

}