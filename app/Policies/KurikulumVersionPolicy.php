<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\KurikulumVersion;
use Illuminate\Auth\Access\HandlesAuthorization;

class KurikulumVersionPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:KurikulumVersion');
    }

    public function view(AuthUser $authUser, KurikulumVersion $kurikulumVersion): bool
    {
        return $authUser->can('View:KurikulumVersion');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:KurikulumVersion');
    }

    public function update(AuthUser $authUser, KurikulumVersion $kurikulumVersion): bool
    {
        return $authUser->can('Update:KurikulumVersion');
    }

    public function delete(AuthUser $authUser, KurikulumVersion $kurikulumVersion): bool
    {
        return $authUser->can('Delete:KurikulumVersion');
    }

    public function restore(AuthUser $authUser, KurikulumVersion $kurikulumVersion): bool
    {
        return $authUser->can('Restore:KurikulumVersion');
    }

    public function forceDelete(AuthUser $authUser, KurikulumVersion $kurikulumVersion): bool
    {
        return $authUser->can('ForceDelete:KurikulumVersion');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:KurikulumVersion');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:KurikulumVersion');
    }

    public function replicate(AuthUser $authUser, KurikulumVersion $kurikulumVersion): bool
    {
        return $authUser->can('Replicate:KurikulumVersion');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:KurikulumVersion');
    }

}