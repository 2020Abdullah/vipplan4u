<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;    
    // protected $guarded = [];
    protected $fillable=['total_deposited_amount','Proof_img','payment_method','account_id','package_id','payment_method_id'];

}
