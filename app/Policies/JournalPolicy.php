<?php

namespace App\Policies;

use App\Models\Journal;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JournalPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Journal $journal): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Journal $journal): Response
    {
        return $user->id === $journal->user_id ? Response::allow() : Response::deny("you should own this journal to delete or update it.");
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Journal $journal): Response
    {
        return $user->id === $journal->user_id ? Response::allow() : Response::deny("you should own this journal to delete or update it.");
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Journal $journal): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Journal $journal): bool
    {
        //
    }
}
