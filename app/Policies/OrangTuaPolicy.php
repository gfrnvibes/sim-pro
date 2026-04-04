<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\OrangTua;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrangTuaPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:OrangTua');
    }

    public function view(AuthUser $authUser, OrangTua $orangTua): bool
    {
        return $authUser->can('View:OrangTua');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:OrangTua');
    }

    public function update(AuthUser $authUser, OrangTua $orangTua): bool
    {
        return $authUser->can('Update:OrangTua');
    }

    public function delete(AuthUser $authUser, OrangTua $orangTua): bool
    {
        return $authUser->can('Delete:OrangTua');
    }

    public function restore(AuthUser $authUser, OrangTua $orangTua): bool
    {
        return $authUser->can('Restore:OrangTua');
    }

    public function forceDelete(AuthUser $authUser, OrangTua $orangTua): bool
    {
        return $authUser->can('ForceDelete:OrangTua');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:OrangTua');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:OrangTua');
    }

    public function replicate(AuthUser $authUser, OrangTua $orangTua): bool
    {
        return $authUser->can('Replicate:OrangTua');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:OrangTua');
    }

}