<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Post;
use App\Models\Sermon;
use App\Models\Subscribe;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::latest()->take(5)->get();

        $posts = Post::latest()->take(5)->get();
        $postcount = Post::where('deleted_at','=',null)->count();

        $sermons = Sermon::latest()->take(5)->get();
        $sermoncount = Sermon::where('deleted_at','=',null)->count();

        $events = Event::latest()->take(5)->get();
        $eventcount = Event::where('deleted_at','=',null)->count();

        $subscribers = Subscribe::latest()->take(5)->get();
        $subscribecount = Subscribe::where('deleted_at','=',null)->count();

        return view('admin.dashboard', compact('users', 'posts', 'postcount', 'sermons', 'sermoncount', 'events', 'eventcount', 'subscribers', 'subscribecount'));
    }
}
