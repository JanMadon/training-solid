<?php

namespace Tests\Feature;

use App\Repositories\Db\InstructorsRepositoryDb;
use App\ValueObjects\Instructor;
use Tests\Factories\CreateInstructor;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InstructorRepository extends TestCase
{
    use CreateInstructor , RefreshDatabase;

    public function testExample()
    {
       // Given:
        $instructor = $this->createInstructor();
        /** @var InstructorsRepositoryDb $repository */
        $repository = app(InstructorsRepositoryDb::class);

        // When:
        $instructors = $repository->getActive(1);

        //Then:
        $this->assertEquals($instructor->getKey(), $instructors->first()->getId());
        //$this->assertValidStructureOfInstructor($instructors->first()); // when returned stc class from repository
        $this->assertInstanceOf(Instructor::class, $instructors->first()); // when return instructorVO class
        $this->assertCount(1, $instructors);
    }

    private function assertValidStructureOfInstructor($instructor): void
    {
        $this->assertArrayHasKey('id', (array) $instructor);
        $this->assertArrayHasKey('user_id', (array) $instructor);
        $this->assertArrayHasKey('first_name', (array) $instructor);
        $this->assertArrayHasKey('last_name', (array) $instructor);
        $this->assertArrayHasKey('instructor_slug', (array) $instructor);
        $this->assertArrayHasKey('contact_email', (array) $instructor);
        $this->assertArrayHasKey('telephone', (array) $instructor);
        $this->assertArrayHasKey('mobile', (array) $instructor);
        $this->assertArrayHasKey('paypal_id', (array) $instructor);
        $this->assertArrayHasKey('link_facebook', (array) $instructor);
        $this->assertArrayHasKey('link_linkedin', (array) $instructor);
        $this->assertArrayHasKey('link_twitter', (array) $instructor);
        $this->assertArrayHasKey('link_googleplus', (array) $instructor);
        $this->assertArrayHasKey('biography', (array) $instructor);
        $this->assertArrayHasKey('instructor_image', (array) $instructor);
        $this->assertArrayHasKey('total_credits', (array) $instructor);
        $this->assertArrayHasKey('updated_at', (array) $instructor);
        $this->assertArrayHasKey('first_name', (array) $instructor);
        $this->assertArrayHasKey('last_name', (array) $instructor);
    }
}
