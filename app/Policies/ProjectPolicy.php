<?php

namespace App\Policies;

use App\Model\Project;
use App\Model\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Project $project)
    {
        return $user->id === $project->user_id;
    }

    public function destroy(User $user, Project $project)
    {
        return $user->id === $project->user_id;
    }
}
