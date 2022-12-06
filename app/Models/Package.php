<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\package;

class Package extends Model
{
    use HasFactory;
    protected $guarded = [];

    // public function payment(){

    //     return $this->hasMany(package::Class,'package_id','id');
    // }

}
