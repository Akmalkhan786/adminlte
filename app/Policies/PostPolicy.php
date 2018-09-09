<?php

namespace App\Policies;

use App\Model\Admin\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\Model\User\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function view(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\Model\User\User  $user
     * @return mixed
     */
    public function create(Admin $user)
    {
        $this->getPermission($user, 1);
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\Model\User\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function update(Admin $user)
    {
        $this->getPermission($user, 2);
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\Model\User\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function delete(Admin $user)
    {
        $this->getPermission($user,3);
    }

    /**
     * Determine whether the user can restore the post.
     *
     * @param  \App\Model\User\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function restore(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the post.
     *
     * @param  \App\Model\User\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function forceDelete(Admin $user)
    {
        //
    }

    protected function getPermission(Admin $user, $p_id){
        foreach ($user->roles as $role){
            foreach ($role->permissions as $permission){
                if ($permission->id == $p_id){
                    return true;
                }
            }
        }
        return false;
    }
}
