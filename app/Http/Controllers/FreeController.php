<?php

namespace App\Http\Controllers;
use App\User;
use App\Post;
use DB;
use Illuminate\Http\Request;

class FreeController extends Controller
{
    public function test()
    {
        return view('pages.test');
    }
    public function index()
    {
        if(auth()->check()){
            if(count(DB::table('update_username')->where('user_id','=',auth()->id())->get()) < 1)
            {
                return redirect('set-profile');
            }else{
                $articles = Post::where('type','article')->get();
                $photos = Post::where('type','photo')->get();
                $posts = ['articles'=>$articles,'photos'=>$photos];
                return view('layouts.index')->with('posts',$posts);
            }
        }else{
            $articles = Post::where('type','article')->limit(6)->get();
            $photos = Post::where('type','photo')->limit(6)->get();
            $posts = ['articles'=>$articles,'photos'=>$photos];
            return view('layouts.index')->with('posts',$posts);
        }
    }
    public function showProfile()
    {
        if(count(DB::table('update_username')->where('user_id','=',auth()->id())->get()) >= 0)
        {
            return redirect('set-profile');
        }else{
            return 'show profile';
        }
    }
    public function faq()
    {
        return view('pages.faq');
    }
    public function about()
    {
        return view('pages.about');
    }
    public function discoverPhotos()
    {
        $photos = POST::where('type','=','photo')->latest()->get();
        return view('posts.discover-photos')->with('photos',$photos);        
    }
    public function popularPhotos()
    {
        $photos = POST::where('type','=','photo')->orderBy('views','desc')->get();
        return view('posts.discover-photos')->with('photos',$photos);   
    }
    // localhost:120/discover-articles
    public function discoverArticles()
    {
        $articles = POST::where('type','=','article')->latest()->get();
        return view('posts.discover-articles')->with('articles',$articles);                
    }
    // localhost:120/popularArticles
    public function popularArticles()
    {
        $articles = POST::where('type','=','article')->orderBy('likes','desc')->get();
        return view('posts.discover-articles')->with('articles',$articles);   
    }
    public function leaderboard()
    {
        return "hello world";
    }
    public function viewPostCreate(Post $id)
    {
        return view('posts.view-post');
    }
    public function viewPostStore(Post $id)
    {
        $id->views = $id->views+1;
        $id->save();
        return redirect('/');
    }
    public function searchCreate()
    {
        return view('pages.search');
    }
    public function searchStore()
    {
        $posts = Post::where('title','like',$request->input('search'))->get();
        $users = User::where('id','!=',auth()->id())->where('first','like',$request->input('search'))->orWhere('last','like',$request->input('search'))->get();
        $searches = ['users'=>$users,'posts'=>$posts];
        return view('pages.search')->with('searches',$searches);
    }
}
