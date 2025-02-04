<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseListRequest;
use App\Repositories\CourseListQueryHandler;
use App\Repositories\CourseRepository;
use App\Repositories\QueryHandlers\CourseListQueryDbHandler;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class CourseListController extends Controller
{
    private CourseRepository $coursesRepository;

    public function __construct(CourseRepository $coursesRepository)
    {
        $this->coursesRepository = $coursesRepository;
    }

    public function __invoke(CourseListRequest $request, CourseListQueryHandler $courseListQueryHandler): \Illuminate\Contracts\View\View
    {
        /** @var CourseListQueryDbHandler $courseListQueryHandler */
        $courses = $courseListQueryHandler->paginate($request->getQuery());


        $categories = $this->coursesRepository->getCategories();
        $instruction_levels = $this->coursesRepository->getInstructionLevels();

        return View::make('site.course.list', [
            'courses' => $courses,
            'categories' => $categories,
            'instruction_levels' => $instruction_levels,
        ]);
    }
}