<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function commentator()
    {
        return $this->belongsTo(User::class, 'commentator_id');
    }

    // public function task()
    // {
    //     $this->belongsTo(Task::class);
    // }
}
