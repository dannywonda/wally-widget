<?php

namespace App\Http\Services;

use Illuminate\Http\Request;

class OrderServices
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function red($order)
    {
        $result = [];

        // order stores the number of widgets
        $number_of_packs = $order;
        // store into $packsNumber
        $packsNumber = &$number_of_packs;
        // widgets in a variety of pack sizes:
        $packs = [5000, 2000, 1000, 500, 250];
        // check the quantity requested against pack sizes
        do{
            $minus=0;
            foreach($packs as $key => $value){           
                if($packsNumber > $packs[$key]){
                    $minus = $value;
                    $packsNumber -= $minus;
                    $result[] = $minus;
                    break;
                } else if($packsNumber > $packs[$key+1] && $packsNumber <= $packs[$key]){
                    $nvalue = ($number_of_packs <= 10000 && $number_of_packs >= 1000) ? $packs[2] : $packs[3];
                    $minus = $nvalue;
                    $packsNumber -= $minus;
                    $result[] = $minus;
                    break;
                } else if($packsNumber>0 && $packsNumber <= $packs[ count($packs)-1 ]){
                    $minus = $packs[ count($packs) -1 ];
                    $packsNumber -= $minus;
                    $result[] = $minus;
                break;
                }
            }
        } while($packsNumber > 0);
        return array_count_values($result);
    }
}
