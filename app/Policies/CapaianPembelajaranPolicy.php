<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\CapaianPembelajaran;
use Illuminate\Auth\Access\HandlesAuthorization;

class CapaianPembelajaranPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:CapaianPembelajaran');
    }

    public function view(AuthUser $authUser, CapaianPembelajaran $capaianPembelajaran): bool
    {
        return $authUser->can('View:CapaianPembelajaran');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:CapaianPembelajaran');
    }

    public function update(AuthUser $authUser, CapaianPembelajaran $capaianPembelajaran): bool
    {
        return $authUser->can('Update:CapaianPembelajaran');
    }

    public function delete(AuthUser $authUser, CapaianPembelajaran $capaianPembelajaran): bool
    {
        return $authUser->can('Delete:CapaianPembelajaran');
    }

    public function restore(AuthUser $authUser, CapaianPembelajaran $capaianPembelajaran): bool
    {
        return $authUser->can('Restore:CapaianPembelajaran');
    }

    public function forceDelete(AuthUser $authUser, CapaianPembelajaran $capaianPembelajaran): bool
    {
        return $authUser->can('ForceDelete:CapaianPembelajaran');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:CapaianPembelajaran');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:CapaianPembelajaran');
    }

    public function replicate(AuthUser $authUser, CapaianPembelajaran $capaianPembelajaran): bool
    {
        return $authUser->can('Replicate:CapaianPembelajaran');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:CapaianPembelajaran');
    }

}