<?php

namespace App\Http\Traits;

use App\Providers\RouteServiceProvider;

trait AuthTrait 
{
    public function checkGuard($request){
        if($request->type == 'admin'){
            $guardName = 'admin';
        }
        else {
            $guardName = 'web';
        }
        return $guardName;
    }

}