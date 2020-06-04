<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Task extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($task) {
            $task->{$task->getKeyName()} = (string) Str::uuid();
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

    public function project(){
        return $this->belongsTo('App\Project');
    }
}
