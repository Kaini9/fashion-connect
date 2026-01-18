<?php

namespace Tests\Unit;

use App\Models\Job;
use App\Models\JobApplication;
use App\Models\Payment;
use App\Models\Report;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Tests\TestCase;

class ModelRelationshipTest extends TestCase
{
    public function test_user_relationships(): void
    {
        $user = new User();

        $this->assertInstanceOf(BelongsTo::class, $user->role());
        $this->assertInstanceOf(HasOne::class, $user->profile());
        $this->assertInstanceOf(HasMany::class, $user->posts());
        $this->assertInstanceOf(BelongsToMany::class, $user->following());
    }

    public function test_job_relationships(): void
    {
        $job = new Job();
        $application = new JobApplication();

        $this->assertInstanceOf(BelongsTo::class, $job->designer());
        $this->assertInstanceOf(HasMany::class, $job->applications());
        $this->assertInstanceOf(BelongsTo::class, $application->job());
    }

    public function test_polymorphic_relationships(): void
    {
        $payment = new Payment();
        $report = new Report();

        $this->assertInstanceOf(MorphTo::class, $payment->payable());
        $this->assertInstanceOf(MorphTo::class, $report->reportable());
    }
}
