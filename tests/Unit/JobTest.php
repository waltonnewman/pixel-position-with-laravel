<?php

namespace Tests\Unit;

use Tests\TestCase; // Ensure you extend TestCase
use App\Models\Job;
use App\Models\Employer;

class JobTest extends TestCase
{
    /**
     * A test to ensure a job belongs to an employer.
     */
    public function test_job_belongs_to_employer(): void
    {
        // Create an employer using the factory
        $employer = Employer::factory()->create();
        
        // Create a job associated with the employer
        $job = Job::factory()->create([
            'employer_id' => $employer->id,
        ]);

        // Assert that the job belongs to the employer
        $this->assertTrue($job->employer->is($employer));
    }
}
