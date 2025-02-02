<?php

namespace Tests\Feature;

use App\Repositories\Db\CoursesRepositoryDb;
use App\ValueObjects\Course as CourseVO;
use App\ValueObjects\InstructorName;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Factories\CreateCourses;
use Tests\TestCase;

class CoursesRepository extends TestCase
{
    use RefreshDatabase, WithFaker, CreateCourses;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample(): void
    {
        // Given:
        $course = $this->createCourse();
        //$repository = new CoursesRepositoryDb();
        /** @var  CoursesRepositoryDb $repository */
        $repository = app(CoursesRepositoryDb::class);

        // When:
        $latest = $repository->getLatestCourses(1);
        $free = $repository->getFreeCourses(1);
        $discounted = $repository->getDiscountCourses(1);

        // Then:
        $this->assertEquals($course->getKey(), $latest->first()->getId());
        $this->assertEquals($course->getKey(), $free->first()->getId());
        $this->assertEquals($course->getKey(), $discounted->first()->getId());

        $this->assertInstanceOf(CourseVO::class, $latest->first());
        $this->assertInstanceOf(CourseVO::class, $free->first());
        $this->assertInstanceOf(CourseVO::class, $discounted->first());

        $this->assertInstanceOf(InstructorName::class, $latest->first()->getInstructor());
        $this->assertInstanceOf(InstructorName::class, $free->first()->getInstructor());
        $this->assertInstanceOf(InstructorName::class, $discounted->first()->getInstructor());

        $this->assertCount(1, $latest);
        $this->assertCount(1, $free);
        $this->assertCount(1, $discounted);
    }
}
