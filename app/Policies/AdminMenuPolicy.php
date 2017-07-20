<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 19/07/2017
 * Time: 21:33
 */

namespace CodeDelivery\Policies;


use CodeDelivery\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminMenuPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
    }


    public function areaAdmin(User $user)
    {
        return $user->hasManyRoles(['Admin']);
    }

    public function createClient(User $user)
    {
        return $user->hasRole('Admin');
    }
}