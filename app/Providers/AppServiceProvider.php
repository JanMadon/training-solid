<?php

namespace App\Providers;

use App\Repositories\CourseListQueryHandler;
use App\Repositories\CourseRepository;
use App\Repositories\Db\CoursesRepositoryDb;
use App\Repositories\Db\InstructorsRepositoryDb;
use App\Repositories\InstructorRepository;
use App\Repositories\QueryHandlers\CourseListQueryDbHandler;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CourseRepository::class, CoursesRepositoryDb::class);
        $this->app->bind(InstructorRepository::class, InstructorsRepositoryDb::class);
        $this->app->bind(CourseListQueryHandler::class, CourseListQueryDbHandler::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        if (\DB::Connection() instanceof \Illuminate\Database\SQLiteConnection) {
            \DB::connection()->getPdo()->sqliteCreateFunction('REGEXP', function ($pattern, $value) {
                mb_regex_encoding('UTF-8');
                return (false !== mb_ereg($pattern, $value)) ? 1 : 0;
            });
        }
    }
}
