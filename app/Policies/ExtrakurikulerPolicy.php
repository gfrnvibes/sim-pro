<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Extrakurikuler;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExtrakurikulerPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Extrakurikuler');
    }

    public function view(AuthUser $authUser, Extrakurikuler $extrakurikuler): bool
    {
        return $authUser->can('View:Extrakurikuler');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Extrakurikuler');
    }

    public function update(AuthUser $authUser, Extrakurikuler $extrakurikuler): bool
    {
        return $authUser->can('Update:Extrakurikuler');
    }

    public function delete(AuthUser $authUser, Extrakurikuler $extrakurikuler): bool
    {
        return $authUser->can('Delete:Extrakurikuler');
    }

    public function restore(AuthUser $authUser, Extrakurikuler $extrakurikuler): bool
    {
        return $authUser->can('Restore:Extrakurikuler');
    }

    public function forceDelete(AuthUser $authUser, Extrakurikuler $extrakurikuler): bool
    {
        return $authUser->can('ForceDelete:Extrakurikuler');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Extrakurikuler');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Extrakurikuler');
    }

    public function replicate(AuthUser $authUser, Extrakurikuler $extrakurikuler): bool
    {
        return $authUser->can('Replicate:Extrakurikuler');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Extrakurikuler');
    }

}