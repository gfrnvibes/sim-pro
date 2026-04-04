<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Ketidakhadiran;
use Illuminate\Auth\Access\HandlesAuthorization;

class KetidakhadiranPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Ketidakhadiran');
    }

    public function view(AuthUser $authUser, Ketidakhadiran $ketidakhadiran): bool
    {
        return $authUser->can('View:Ketidakhadiran');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Ketidakhadiran');
    }

    public function update(AuthUser $authUser, Ketidakhadiran $ketidakhadiran): bool
    {
        return $authUser->can('Update:Ketidakhadiran');
    }

    public function delete(AuthUser $authUser, Ketidakhadiran $ketidakhadiran): bool
    {
        return $authUser->can('Delete:Ketidakhadiran');
    }

    public function restore(AuthUser $authUser, Ketidakhadiran $ketidakhadiran): bool
    {
        return $authUser->can('Restore:Ketidakhadiran');
    }

    public function forceDelete(AuthUser $authUser, Ketidakhadiran $ketidakhadiran): bool
    {
        return $authUser->can('ForceDelete:Ketidakhadiran');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Ketidakhadiran');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Ketidakhadiran');
    }

    public function replicate(AuthUser $authUser, Ketidakhadiran $ketidakhadiran): bool
    {
        return $authUser->can('Replicate:Ketidakhadiran');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Ketidakhadiran');
    }

}