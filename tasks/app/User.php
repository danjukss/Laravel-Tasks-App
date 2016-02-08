<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
use App\Group;
use Carbon\Carbon;

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

    public function last_activity() {
        return $this->hasMany(LastActivity::class);
    }

    public function is($role) {
        
        $role = strtolower($role);
        $roles = ['admin' => 1, 'mod' => 2, 'user' => 0];

        $group_id = $this->group;
        $group = Group::find($group_id);

        return ($group->permissions == $roles[$role]) ? true : false;
    }

    public function last_seen() {
        $user = Auth::user();
        $diff = Carbon::now()->diffInMinutes(Carbon::parse($user->last_seen));

        if($diff > 5) {
            $user->last_seen = Carbon::now();
            $user->save();
        }   
    }

    public function scopeOnline($query) {
        $date = Carbon::now();
        $checkDate = $date->subMinutes(15);
        return $query->where('last_seen', '>=', $checkDate);
    }

}
