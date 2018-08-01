<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use DB;
use App\Reaction;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;

class AuthenticatedController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth')->except('profile');
    }
    public function profile($id = 1)
    {
        if(auth()->check() && count(DB::table('update_username')->where('user_id','=',auth()->id())->first()) <= 0)
        {
            return redirect('set-profile');
        }else{
            if(url()->current() === route('profile')){
                if(auth()->check()){
                    $user = auth()->user();
                }else{
                    return redirect('/');
                }
            }else{
                $user = User::findOrFail($id);
                if($id == auth()->id()){
                    return redirect('/');
                }
            }
            if(isset($_GET['post']) && isset($_GET['sort']))
            {
                if(url()->full() == url()->current()."?post=1&sort=latest" || url()->full() == url()->current()."?post=1&sort=popular" || url()->full() == url()->current()."?post=2&sort=latest" || url()->full() == url()->current()."?post=2&sort=popular")
                {
                    if(($_GET['post'] >2 || $_GET['post'] <1) && ($_GET['sort'] != 'latest' || $_GET['sort'] != 'popular'))
                    {
                        return redirect(url()->current().'?post=1&sort=popular');
                    }else{
                        if($_GET['post'] == '1'){
                            if($_GET['sort'] == 'latest'){
                                $posts = Post::where('user_id',$user->id)->where('type','=','photo')->latest()->get();
                            }elseif($_GET['sort'] == 'popular'){
                                $posts = Post::where('user_id','=',$user->id)->where('type','=','photo')->orderBy('views','desc')->get();                                
                            }
                        }elseif($_GET['post'] == '2'){
                            if($_GET['sort'] == 'latest'){
                                $posts = Post::where('user_id',$user->id)->where('type','=','article')->latest()->get();
                            }elseif($_GET['sort'] == 'popular'){
                                $posts = Post::where('user_id',$user->id)->where('type','=','article')->orderBy('views','desc')->get();                                
                                
                            }
                        }
                    }
                }
                else{
                    if($_GET['post'] === '1'){
                        return redirect(url()->current().'?post=1&sort=popular');
                    }elseif($_GET['post'] === '2'){
                        return redirect(url()->current().'?post=2&sort=popular');
                    }else{
                        return redirect(url()->current().'?post=1&sort=popular');
                    }
                }
            }
            else{
                return redirect(url()->current().'?post=1&sort=asc');
            }
            $array = array(
                'user'=>$user,
                'posts'=>$posts
            );
            return view('pages.profile')->with('array',$array);
        }
    }
    public function profileSettings()
    {
        return view('pages.profile_settings');
    }
    public function changeAvatar(Request $request)
    {
        $user = User::find(auth()->id());
        $this->validate(request(),[
            'avatar' => 'image|max:1999',
        ]);
        if($request->hasFile('avatar')){
            if($user->avatar !== 'defaultimg.png'){
                Storage::delete('public/avatar/'.$user->avatar);
            }
            $filenameWithExt = $request->file('avatar')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $filenameToStore = $filename."_".time().".".$extension;
            $path = $request->file('avatar')->storeAs('public/avatar/', $filenameToStore);
        }else{
            $filenameToStore = $user->avatar;
        }
        $user->avatar = $filenameToStore;
        $user->save();
        return $filenameToStore;
    }
    public function profileSettingsStore(Request $request)
    {
        $user = User::find(auth()->id());
        $user->username = $request->input('username')==''?$user->username:$request->input('username');
        $user->last = $request->input('last')==''?$user->last:$request->input('last');
        $user->first = $request->input('first')==''?$user->first:$request->input('first');
        $user->password = $request->input('password')==''?$user->password:$request->input('password');
        $user->email = $request->input('email')==''?$user->email:$request->input('email');
        $user->number = $request->input('number')==''?$user->number:$request->input('number');
        $user->facebook = $request->input('facebook')==''?$user->facebook:$request->input('facebook');
        $user->twitter = $request->input('twitter')==''?$user->twitter:$request->input('twitter');
        $user->instagram = $request->input('instagram')==''?$user->instagram:$request->input('instagram');
        $user->description = $request->input('description')==''?$user->description:$request->input('description');
        $user->save();
        return 'Success!';
    }
    public function createPhotos()
    {
        if(count(DB::table('update_username')->where('user_id','=',auth()->id())->first()) <= 0)
        {
            return redirect('set-profile');
        }else{
            return view('posts.upload-photos');
        }
    }
    public function createArticle()
    {
        if(count(DB::table('update_username')->where('user_id','=',auth()->id())->first()) <= 0)
        {
            return redirect('set-profile');
        }else{
            return view('posts.create-article');
        }
    }
    public function storePosts(Request $request)
    {   

        if($request->input('type') === 'photo'){
            $this->validate(request(),[
                'cover_image'=>'required|image'
            ]);
        }elseif($request->input('type') === 'article'){
            $this->validate(request(),[
                'title'=>'|required|min:10|unique:posts',
                'body'=>'required|min:2',
                'cover_image'=>'image'
            ]);
        }
        if($request->hasFile('cover_image'))
        {   
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $filenameToStore = $filename."_".time().".".$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $filenameToStore);
        }else{
            $filenameToStore = 'defaultimg.png';
        }

        $newPost = new Post;
        $title = '';
        if($request->input('type') === 'article')
        {
            $title = $request->input('title');
        }
        elseif($request->input('type') === 'photo')
        {
            $title = 'null';
        }
        $newPost->title = $title;
        $newPost->user_id = auth()->user()->id;
        $newPost->type = $request->input('type');
        $body = '';
        if($request->input('type') === 'article')
        {
            $body = $request->input('body');
        }elseif($request->input('type') === 'photo')
        {
            $body = 'null';
        }
            $newPost->body = $body;
            $newPost->cover_image = $filenameToStore;
            $newPost->views=0;
            $newPost->save();
        
        if($request->input('type') === 'article'){
            return redirect('/discover-articles')->with('message','Success');
        }elseif($request->input('type') === 'photo'){
            return redirect('/discover-photos')->with('message','Success');
        }
    }
    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }
    public function contribute()
    {
        if(count(DB::table('update_username')->where('user_id','=',auth()->id())->first()) <= 0)
        {
            return redirect('set-profile');
        }else{
            return view('pages.contribute');
        }
    }
    public function setProfileCreate()
    {
        return view('pages.setter');
    }
    public function setProfileStore(Request $request)
    {
        $this->validate(request(),[
            'username' => 'required|unique:users|max:14'
        ]);
        $user = User::find(auth()->id());
        $user->username = $request->input('username');
        $user->save();
        DB::table('update_username')->insert([
            'user_id'=>auth()->id()
        ]);
        return redirect('/profile');
    }
    public function react(Request $request)
    {
        $reaction = Reaction::where('user_id',auth()->id())->where('post_id',$request->input('post_id'))->first();
        if(count($reaction)>0){
            if($request->input('react') == $reaction->reaction){
                $reaction->delete();
            }else{
                $reaction->reaction = $request->input('react');
                $reaction->save();
            }
        }else{
            Reaction::create([
                'user_id' => auth()->id(),
                'post_id' => $request->input('post_id'),
                'reaction' => $request->input('react')
            ]);
        }
        return $request->input('react');
    }
}
