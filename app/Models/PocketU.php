<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PocketU extends Model
{
    use HasFactory;
    protected $table = 'pockets';

    protected $guarded = [];

    public function payment_method(){

        return $this->belongsTo(paymentMethod::Class,'payment_method_id','id');
    }

}
