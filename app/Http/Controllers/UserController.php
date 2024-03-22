<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Category;
use App\Relationship;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function members(){
        $members=User::where('id', '!=', auth()->user()->id)->paginate(6);
        // $members=User::paginate(6);

        return view('users.members', compact('members'));
    }

    public function show($id){
        $user = User::find($id);

        return view('users.show', compact('user'));
    }

    public function profile(){
    
        return view('users.profile');
    }

    public function category(){
        $listOfcategories=Category::paginate(4);
        $category=Category::all();
        return view('users.category', compact('listOfcategories','category'));
    }

    public function follow($followed_id){

        $follower = auth()->user();
        $followed = User::find($followed_id);

        $follower->followedUsers()->attach($followed);

        $relationship = Relationship::where('follower_id', $follower->id)->where('followed_id', $followed_id)->first();
        $relationship->activity()->create([
            'user_id' => $follower->id,
            'text' => $follower->name . " followed " . $followed->name
        ]);

        // Activity::create()

        // return redirect()->route('index');
        return back();
    }


    public function unfollow($followed_id){
        $follower=auth()->user();
        $toUnfollowUser = User::find($followed_id);

        $follower->followedUsers()->detach($toUnfollowUser);

        // return redirect()->route('index');
        return back();
    }
}
