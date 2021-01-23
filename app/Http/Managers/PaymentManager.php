<?php

namespace App\Http\Managers;

use Illuminate\Support\Facades\Auth;


class PaymentManager{
    public function getInstructorPart($total){
        $percent = 75;
        $percentDecimal = $percent / 100;
        $part = $percentDecimal * $total;
        return $part;
    }

    public function getElearningPart($total){
        $percent = 25;
        $percentDecimal = $percent / 100;
        $part = $percentDecimal * $total;
        return $part;
    }
}