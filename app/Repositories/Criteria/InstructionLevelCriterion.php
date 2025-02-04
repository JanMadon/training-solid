<?php

namespace App\Repositories\Criteria;

use App\Queries\CourseListQuery;
use Illuminate\Database\Query\Builder;

class InstructionLevelCriterion implements CourseListCategory
{
    private CourseListQuery $courseListQuery;

    public function __construct(CourseListQuery $courseListQuery)
    {
        $this->courseListQuery = $courseListQuery;
    }

    public function shouldBeApplied(): bool
    {
        return $this->courseListQuery->getInstructionLevelIds() !== null;
    }

    public function applyToListBuilder(Builder $query): Builder
    {
        return  $query->whereIn(
            'courses.instruction_level_id',
            $this->courseListQuery->getInstructionLevelIds()
        );
    }
}