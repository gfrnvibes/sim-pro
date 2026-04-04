<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\PenilaianProjek;
use Illuminate\Auth\Access\HandlesAuthorization;

class PenilaianProjekPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:PenilaianProjek');
    }

    public function view(AuthUser $authUser, PenilaianProjek $penilaianProjek): bool
    {
        return $authUser->can('View:PenilaianProjek');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:PenilaianProjek');
    }

    public function update(AuthUser $authUser, PenilaianProjek $penilaianProjek): bool
    {
        return $authUser->can('Update:PenilaianProjek');
    }

    public function delete(AuthUser $authUser, PenilaianProjek $penilaianProjek): bool
    {
        return $authUser->can('Delete:PenilaianProjek');
    }

    public function restore(AuthUser $authUser, PenilaianProjek $penilaianProjek): bool
    {
        return $authUser->can('Restore:PenilaianProjek');
    }

    public function forceDelete(AuthUser $authUser, PenilaianProjek $penilaianProjek): bool
    {
        return $authUser->can('ForceDelete:PenilaianProjek');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:PenilaianProjek');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:PenilaianProjek');
    }

    public function replicate(AuthUser $authUser, PenilaianProjek $penilaianProjek): bool
    {
        return $authUser->can('Replicate:PenilaianProjek');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:PenilaianProjek');
    }

}