<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tasklist extends Model
{
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    // public function project()
    // {
    //     $this->belongsTo(Project::class);
    // }
}
