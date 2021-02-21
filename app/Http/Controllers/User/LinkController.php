<?php

namespace App\Http\Controllers\User;

use App\Models\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LinkController extends Controller
{
    public function getLink()
    {
        $links = Link::where('user_id',auth()->user()->id)->orderBy('created_at','DESC');

        if($links->count() == 0){
            return response()->json(['message'=>"You don't have any links."],400);
        }

        return response()->json($links->get(),200);
    }

    public function createLink(Request $req)
    {
        $link = Link::create([
            'user_id' => auth()->user()->id,
            'url' => $req->url,
        ]);

        if($link){
            return response()->json(['message'=>"Link succesfully created."],200);
        }
        else{
            return response()->json(['message'=>"Error."],400);
        }
    }
}
