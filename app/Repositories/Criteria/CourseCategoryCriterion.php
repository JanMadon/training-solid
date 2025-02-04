<?php

namespace App\Repositories\Criteria;

use App\Queries\CourseListQuery;
use Illuminate\Database\Query\Builder;

class CourseCategoryCriterion implements CourseListCategory
{
    private CourseListQuery $courseListQuery;

    public function __construct(CourseListQuery $courseListQuery)
    {
        $this->courseListQuery = $courseListQuery;
    }

    public function shouldBeApplied(): bool
    {
        return $this->courseListQuery->getCategoryIds() !== null;
    }

    public function applyToListBuilder(Builder $query): Builder
    {
        return $query->whereIn('courses.category_id', $this->courseListQuery->getCategoryIds());
    }
}