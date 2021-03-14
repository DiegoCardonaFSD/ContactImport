<?php


namespace App\Http;


use App\Models\IinRange;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class Helpers
{
    /**
     * @param string $card
     * @return false
     */
    public static function getFranchise(string $card){
        $ranges = IinRange::all()->sortByDesc('priority');
        $franchise = false;
        $ranges->each(function($range) use ($card, &$franchise) {
            $iin = substr($card, 0, strlen($range->range_from));
            if($range->range_from <= $iin && $iin <= $range->range_to){
                $franchise = $range->franchise;
                return false;
            }
        });
        return $franchise;
    }

    /**
     * @param $card
     * @return string
     */
    public static function getCardToken($card){
        return hash('sha256', $card);
    }
}
