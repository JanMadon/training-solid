<?php

namespace App\Repositories\Db;

use App\Models\Category;
use App\Models\InstructionLevel;
use App\Repositories\CourseRepository;
use App\ValueObjects\Course;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use DB;

class CoursesRepositoryDb implements CourseRepository
{

    public function getLatestCourses(int $limit): Collection
    {
        $courses = $this->queryBuilder($limit)
            ->orderBy('courses.updated_at', 'desc')
            ->get();

        return $this->getValueObject($courses);
    }

    public function getFreeCourses(int $limit): Collection
    {
        $courses = $this->queryBuilder($limit)
            ->where('courses.price', 0)
            ->get();

        return $this->getValueObject($courses);
    }

    public function getDiscountCourses(int $limit): Collection
    {
        $courses = $this->queryBuilder($limit)
            ->where('courses.strike_out_price', '<>' ,null)
            ->get();

        return $this->getValueObject($courses);

    }

    public function getCategories(bool $active = true): Collection
    {
        return Category::where('is_active', true)->get();
    }

    public function getInstructionLevels(): Collection
    {
        return InstructionLevel::get();
    }


    private function getValueObject(Collection $courses): collection
    {
        return $courses->map(fn($course) => new Course(
            $course->id,
            $course->first_name,
            $course->last_name,
            $course->instructor_id,
            $course->category_id,
            $course->instruction_level_id,
            $course->course_title,
            $course->course_slug,
            $course->keywords,
            $course->overview,
            $course->course_image,
            $course->thumb_image,
            $course->course_video,
            $course->duration,
            $course->price,
            $course->strike_out_price,
            $course->is_active,
            Carbon::make($course->created_at),
            Carbon::make($course->updated_at),
        ));
    }

    private function queryBuilder(int $limit): Builder
    {
        return DB::table('courses')
            ->select('courses.*', 'instructors.first_name', 'instructors.last_name')
            //->selectRaw('AVG(course_ratings.rating) AS average_rating')
            //->leftJoin('course_ratings', 'course_ratings.course_id', '=', 'courses.id')
            ->join('instructors', 'instructors.id', '=', 'courses.instructor_id')
            ->where('courses.is_active', true)
            ->groupBy('courses.id')
            ->limit($limit);
    }
}