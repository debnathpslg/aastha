<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    private function isSuOrAdmin(User $user)
    {
        if ($user->is_su) {
            return true;
        }

        return $user->role_id && $user->role->slug === "ADM";
    }
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $this->isSuOrAdmin($user);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        return $this->isSuOrAdmin($user);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $this->isSuOrAdmin($user);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $actor, User $target): bool
    {
        // SU can update anyone (except SU check handled in controller)
        if ($actor->is_su) {
            return true;
        }

        // Admin can update users with role level < 80
        return
            $actor->role_id &&
            $target->role_id &&
            $actor->role->slug === 'ADM' &&
            $target->role->level < 80;
    }

    public function resetPassword(User $actor, User $target): bool
    {
        return $this->update($actor, $target);
    }
    
    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        return $this->isSuOrAdmin($user);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        return false;
    }
}
