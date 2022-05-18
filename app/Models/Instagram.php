<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Instagram extends Model
{
    use HasFactory;

    /**
     * Get Instagram Data form API
     */
    public function getInstagramData(){
        try{
            $instagram_id = env('INSTAGRAM_BUSINESS_ID');
            $instagram_token = env('INSTAGRAM_CLIENT_TOKEN');
            $url = config('global.instagram_url').$instagram_id."/media?fields=".config('global.instagram_fields')."&access_token=".$instagram_token;
            $query = [];
            
            $response = file_get_contents(
                              $url.
                              http_build_query($query)
                        );
            
            $ret = json_decode($response,true);
            return $ret["data"];

        }catch(Exception $e){
            Log::debug("Unexpected Error at Instagram API");
            Log::error($e->getMessage());
            return null;
        }
    }
}
