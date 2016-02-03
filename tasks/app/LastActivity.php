<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LastActivity extends Model
{
    protected $fillable = ['type', 'place_id', 'created_at'];

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function task() {
    	return $this->belongsTo(Task::class, 'place_id');
    }
}
