<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    // este metodo se lanza primero que los demas y si devuelve true no ejecutará los demas
    public function before($user, $ability)
    {
        if ($user->isMixAdmin()) {
            return true;
        }
    }

    // se llama funcion igual que en el controller
    // el parametro "User $authUser" lo envia laravel automaticamente
    public function edit(User $authUser, User $user)
    {
        return $authUser->id === $user->id;
    }
    public function update(User $authUser, User $user)
    {
        return $authUser->id === $user->id;
    }
    public function destroy(User $authUser, User $user)
    {
        return $authUser->id === $user->id;
    }
}
