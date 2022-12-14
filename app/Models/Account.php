<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Account extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $table = 'accounts';

    
    public function user(){

        return $this->belongsTo(User::Class,'user_id','id');
    }
}
