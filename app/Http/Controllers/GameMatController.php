<?php

namespace App\Http\Controllers;

use App\Models\GameMatch;
use App\Models\User;
use Illuminate\Http\Request;

class GameMatController extends Controller
{
    //

    public function newMatch($one,$two){
        $match = new GameMatch();
        $match->user1_id = $one;
        $match->user2_id = $two;
        $match->save();
        return "Create new match successfully";
    }

    //get each user info from selected match
    public function getMatch($id){
        $match = GameMatch::find($id);
        $user1 = $match->user1;
        $user2 = $match->user2;
        return $user1->name." and ".$user2->name;
    }

    //for slot1
    public function getUser1Match($id){
        $user1 = User::find($id);
        $matches = $user1->slot1;
        foreach($matches as $match){
            echo $match->user1_id. " and ". $match->user2_id."<br>";
        }
        return "End";

    }

    //for slot2
    public function getUser2Match($id){
        $user2 = User::find($id);
        $matches = $user2->slot2;
        foreach($matches as $match){
            echo $match->user1_id. " and ". $match->user2_id."<br>";
        }
        return "End";

    }

    //to show all matches
    public function getUserMatch($id){
        $user = User::find($id);
        $matches = $user->slot1->merge($user->slot2);
        foreach($matches as $match){
            echo $match->user1_id. " and ". $match->user2_id."<br>";
        }
        return "End";

    }
}
