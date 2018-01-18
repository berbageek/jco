<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticable
{
    use Notifiable;

    public function routeNotificationForNexmo()
    {
        return $this->profile->nomor_hp;
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'assignee_id');
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
