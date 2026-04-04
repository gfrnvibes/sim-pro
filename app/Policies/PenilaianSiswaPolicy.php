<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\PenilaianSiswa;
use Illuminate\Auth\Access\HandlesAuthorization;

class PenilaianSiswaPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:PenilaianSiswa');
    }

    public function view(AuthUser $authUser, PenilaianSiswa $penilaianSiswa): bool
    {
        return $authUser->can('View:PenilaianSiswa');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:PenilaianSiswa');
    }

    public function update(AuthUser $authUser, PenilaianSiswa $penilaianSiswa): bool
    {
        return $authUser->can('Update:PenilaianSiswa');
    }

    public function delete(AuthUser $authUser, PenilaianSiswa $penilaianSiswa): bool
    {
        return $authUser->can('Delete:PenilaianSiswa');
    }

    public function restore(AuthUser $authUser, PenilaianSiswa $penilaianSiswa): bool
    {
        return $authUser->can('Restore:PenilaianSiswa');
    }

    public function forceDelete(AuthUser $authUser, PenilaianSiswa $penilaianSiswa): bool
    {
        return $authUser->can('ForceDelete:PenilaianSiswa');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:PenilaianSiswa');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:PenilaianSiswa');
    }

    public function replicate(AuthUser $authUser, PenilaianSiswa $penilaianSiswa): bool
    {
        return $authUser->can('Replicate:PenilaianSiswa');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:PenilaianSiswa');
    }

}