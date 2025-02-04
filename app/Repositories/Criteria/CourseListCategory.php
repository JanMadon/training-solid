<?php

namespace App\Repositories\Criteria;

use Illuminate\Database\Query\Builder;

interface CourseListCategory
{
    public function shouldBeApplied();
    public function applyToListBuilder(Builder $query): Builder;
}