<?php

namespace App\Policies;

use App\Project;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class ProjectPolicy
 * @package App\Policies
 */
class ProjectPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the project.
     *
     * @param  \App\User $user
     * @param  \App\Project $project
     * @return mixed
     */
    public function view(User $user, Project $project)
    {
        //
    }

    /**
     * Determine whether the user can create projects.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the project.
     *
     * @param  \App\User $user
     * @param  \App\Project $project
     * @return mixed
     */
    public function update(User $user, Project $project)
    {
        return $this->checkUserID($user, $project);
    }

    /**
     * Determine whether the user can delete the project.
     *
     * @param  \App\User $user
     * @param  \App\Project $project
     * @return mixed
     */
    public function delete(User $user, Project $project)
    {
        return $this->checkUserID($user, $project);
    }

    /**
     * @param User $user
     * @param Project $project
     * @return bool
     */
    private function checkUserID(User $user, Project $project): bool
    {
        return $user->id === $project->user_id;
    }
}
