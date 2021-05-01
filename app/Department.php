<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    protected $fillable = ['name'];

    // commit trial edit

    public function position(){
        return $this->hashMany('App\Position');
    } 
}
