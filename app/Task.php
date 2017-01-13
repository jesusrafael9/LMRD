<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Task extends Eloquent
{
    //
    protected $collection = "tasks";
    protected $primaryKey = "_id";

    protected $fillable = [
        'title', 'description','due_date', 'completed','created_at','updated_at'
    ];
}