<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $appends = ["open"];
    protected $table = 'tasks';

    public function getOpenAttribute(){
        return true;
    }
    

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
