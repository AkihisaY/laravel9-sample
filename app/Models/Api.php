<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Api extends Model
{
    use HasFactory;

    /**
     * Get Monthly Asset List
     */
    public function getMonthlyAssets(){
        $url = config('global.api_url');
        $query = [
            'function'=>'total_asset'
            ,'user_id'=>'3'
            ,'key'=>config('global.api_key')
            ];
        
        $response = file_get_contents(
                          $url.
                          http_build_query($query)
                    );
        
        $ret = json_decode($response,true);
        $asset = $ret['result'];
        return $asset;
    }
}
