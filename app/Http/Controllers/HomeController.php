<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $activities = auth()->user()->activities;

        foreach(auth()->user()->followedUsers as $user) {
            foreach ($user->activities as $activity) {
                $activities->push($activity);
            }
        }

        return view('home', compact('activities'));
    }
}
