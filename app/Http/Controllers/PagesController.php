<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Address;
use App\Models\Category;
use App\Models\Donation;
use App\Models\Event;
use App\Models\Post;
use App\Models\Sermon;
use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $address = Address::all();
        $about = About::all();
        $sermons = Sermon::latest()->where('published', 'yes')->paginate(3);
        $events = Event::latest()->where('published', 'yes')->paginate(3);
        $posts = Post::latest()->where('published', 'yes')->paginate(3);
        return view('front.welcome', compact('address', 'about', 'sermons', 'events', 'posts'));
    }

    public function aboutus()
    {
        $address = Address::all();
        $about = About::all();
        $users = User::where('published', 'yes')->paginate(6);
        return view('front.about', compact('about', 'users', 'address'));
    }

    public function sermon()
    {
        $address = Address::all();
        $sermons = Sermon::latest()->where('published', 'yes')->paginate(6);
        return view('front.sermon', compact('sermons', 'address'));
    }

    public function sermonshow($slug)
    {
        $address = Address::all();
        $sermon = Sermon::where('slug', $slug)->first();
        $category = Category::pluck('name', 'id');
        return view('front.sermonshow', compact('sermon', 'category', 'address'));
    }

    public function event()
    {
        $address = Address::all();
        $events = Event::latest()->where('published', 'yes')->paginate(6);
        return view('front.event', compact('events', 'address'));
    }

    public function eventshow($slug)
    {
        $address = Address::all();
        $event = Event::where('slug', $slug)->first();
        $category = Category::pluck('name', 'id');
        return view('front.eventshow', compact('event', 'category', 'address'));
    }

    public function blog()
    {
        $address = Address::all();
        $posts = Post::latest()->where('published', 'yes')->paginate(9);
        return view('front.blog', compact('posts', 'address'));
    }

    public function blogshow($slug)
    {
        $address = Address::all();
        $post = Post::where('slug', $slug)->first();
        $category = Category::pluck('name', 'id');
        return view('front.blogshow', compact('post', 'category', 'address'));
    }

    public function contactus()
    {
        $address = Address::all();
        return view('front.contact', compact('address'));
    }

    public function donation()
    {
        $address = Address::all();
        $donate = Donation::all();
        return view('front.donation', compact('donate', 'address'));
    }
}
