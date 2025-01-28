<?php

namespace App\Repositories\Db;

use App\Repositories\CourseRepository;
use Illuminate\Support\Collection;
use DB;

class CoursesRepositoryDb implements CourseRepository
{

    public function getLatestCourses(int $limit): Collection
    {
        return DB::table('courses')
            ->select('courses.*', 'instructors.first_name', 'instructors.last_name')
            ->selectRaw('AVG(course_ratings.rating) AS average_rating')
            ->leftJoin('course_ratings', 'course_ratings.course_id', '=', 'courses.id')
            ->join('instructors', 'instructors.id', '=', 'courses.instructor_id')
            ->where('courses.is_active', true)
            ->groupBy('courses.id')
            ->limit($limit)
            ->orderBy('courses.updated_at', 'desc')
            ->get();
    }

    public function getFreeCourses(int $limit): Collection
    {
        return DB::table('courses')
            ->select('courses.*', 'instructors.first_name', 'instructors.last_name')
            ->selectRaw('AVG(course_ratings.rating) AS average_rating')
            ->leftJoin('course_ratings', 'course_ratings.course_id', '=', 'courses.id')
            ->join('instructors', 'instructors.id', '=', 'courses.instructor_id')
            ->where('courses.is_active', true)
            ->groupBy('courses.id')
            ->limit($limit)
            ->where('courses.price', 0)
            ->get();
    }

    public function getDiscountCourses(int $limit): Collection
    {
        return DB::table('courses')
            ->select('courses.*', 'instructors.first_name', 'instructors.last_name')
            ->selectRaw('AVG(course_ratings.rating) AS average_rating')
            ->leftJoin('course_ratings', 'course_ratings.course_id', '=', 'courses.id')
            ->join('instructors', 'instructors.id', '=', 'courses.instructor_id')
            ->where('courses.is_active', true)
            ->groupBy('courses.id')
            ->limit($limit)
            ->where('courses.strike_out_price', '<>' ,null)
            ->get();
    }
}