<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Abraham\TwitterOAuth\TwitterOAuth;
use Illuminate\Support\Facades\Log;

class Twitter extends Model
{
    use HasFactory;

    private $tweet;
    
    public function __construct()
    {
        $this->tweet = new TwitterOAuth(
            env('TWITTER_CLIENT_ID'),
            env('TWITTER_CLIENT_SECRET'),
            env('TWITTER_CLIENT_ID_ACCESS_TOKEN'),
            env('TWITTER_CLIENT_ID_ACCESS_TOKEN_SECRET'));
    }
    
    //Get Friends
    public function getProfile()
    {
        $d = $this->tweet->get("account/verify_credentials",[]);
        // dd($d);
        return $d;
    }

    //Search Tweet
    public function serachTweets(String $searchWord)
    {
        $d = $this->tweet->get("search/tweets", [
            'q' => $searchWord,
            'count' => 5,
         ]);
        
        Log::debug($d->statuses);
        return $d->statuses;
    }

    //Show Tweet
    public function showTweet()
    {
        $d = $this->tweet->get("statuses/user_timeline",[
            // "user_id" => "25183060",
        ]);
        // dd($d);
        return $d;
    }

    //Get Friends
    public function friendList()
    {
        $d = $this->tweet->get("friends/list",[]);
        // dd($d);
        return $d->users;
    }

    //Get Friends
    public function followerList()
    {
        $d = $this->tweet->get("followers/list",[]);
        // dd($d);
        return $d->users;
    }

    //Tweet
    public function tweet($tweet_content){
        $res = $this->tweet->post("statuses/update", [
            "status" => $tweet_content,
        ]);
        // dd($res);
        return $res;
    }

    public function uploadImage(){
        $res = $this->tweet->post("media/upload", [
            "media" => 'img/IMG_3065.jpg',
        ]);
        dd($res);
        return $res;

    }

}
