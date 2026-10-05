<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;

class JobPolicy
{
    public function update(User $user, Job $job): bool
    {
        // Example A: If Job belongs directly to User (user_id column on jobs table)
        return $job->employer->user_id === $user->id;

        // Example B: If Job belongs to an Employer, which belongs to a User
        // return $job->employer->user_id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Job $job): bool
    {
        return $job->employer->user_id === $user->id;
    }
}
