<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Account;
use App\Models\payment;
use App\Models\package;

class Payment extends Model
{
    use HasFactory;    
    // protected $guarded = [];
    protected $fillable=['total_deposited_amount','Proof_img','payment_method','account_id','package_id','payment_method_id'];


    public function account(){

        return $this->belongsTo(Account::Class,'account_id','id');
    }

    // public function package(){

    //     return $this->hasMany(payment::Class,'package_id','id');
    // }
    public function package(){

        return $this->belongsTo(package::Class,'package_id','id');
    }
    public function payment_method(){

        return $this->belongsTo(paymentMethod::Class,'payment_method_id','id');
    }
}
