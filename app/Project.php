<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            $project->{$project->getKeyName()} = (string) Str::uuid();
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }
}
