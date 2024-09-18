<?php

namespace App\Policies;

use App\Models\CommissionMember;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CommissionMemberPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CommissionMember $commissionMember): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->email == 'giorgio.giotto.gg@gmail.com';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CommissionMember $commissionMember): bool
    {
        return $user->email == 'giorgio.giotto.gg@gmail.com';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CommissionMember $commissionMember): bool
    {
        return $user->email == 'giorgio.giotto.gg@gmail.com';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CommissionMember $commissionMember): bool
    {
        return $user->email == 'giorgio.giotto.gg@gmail.com';
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CommissionMember $commissionMember): bool
    {
        return $user->email == 'giorgio.giotto.gg@gmail.com';
    }
}
