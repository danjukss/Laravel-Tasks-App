<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
use App\Group;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'tasks'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tasks() {
        return $this->hasMany(Task::class);
    }

    public function is($role) {
        
        $role = strtolower($role);
        $roles = ['admin' => 1, 'mod' => 2, 'user' => 0];

        $group_id = $this->group;
        $group = Group::find($group_id);

        return ($group->permissions == $roles[$role]) ? true : false;
    }

}
