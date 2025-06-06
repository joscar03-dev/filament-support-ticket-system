<?php

namespace App\Policies;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RolPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermiso('acceso-rol');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Rol $rol): bool
    {
        return $user->hasPermiso('visualizar-rol');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermiso('crear-rol');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Rol $rol): bool
    {
        return $user->hasPermiso('editar-rol');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Rol $rol): bool
    {
        return $user->hasPermiso('eliminar-rol');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Rol $rol): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Rol $rol): bool
    {
        //
    }
}
