<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;
use App\Models\Mood;
use App\Models\Category;
use App\Models\Image;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;

use App\User;


class StoryController extends Controller
{
    public function album(){
        $albums = Story::with('mood')->where('user_id', Auth::user()->id)->where('category_id','!=', '3')->orderBy('created_at', 'desc')->get();
        $moods = Mood::all();    
        return view('album')->with(compact('albums', 'moods'));
    }
    public function filter(Request $request){
        $mood_id = request('mood');
        // dd($mood_id);
        if($mood_id == "delete"){
            $albums = Story::with('mood')->where('user_id', Auth::user()->id)->where('category_id','!=', '3')->orderBy('created_at', 'desc')->get();
            $moods = Mood::all(); 
            return view('album')->with(compact('albums', 'moods'));
        }
        $albums = Story::with('mood')->where('user_id', Auth::user()->id)->where('category_id','!=', '3')->where('mood_id', $mood_id)->orderBy('created_at', 'desc')->get();
        $moods = Mood::all();

        return view('album')->with(compact('albums', 'moods'));
    }
    
    public function story(){
        $stories = Story::with('user')->with('mood')->where('category_id', '2')->orderBy('created_at', 'desc')->limit(100)->get();
        $moods = Mood::all();    
        $types = Type::all();
        $images = Image::all()->where('type', 'image');
        $audios = Image::all()->where('type', 'audio');
        $videos = Image::all()->where('type', 'video');

        return view('story')->with(compact('stories', 'moods', 'images', 'audios', 'videos', 'types'));
    }

    public function filterstory(Request $request){
        $mood_id = request('mood');
        $stories = Story::with('mood')->where('category_id','2')->where('mood_id', $mood_id)->orderBy('created_at', 'desc')->get();
        $moods = Mood::all();
        $types = Type::all();
        $images = Image::all()->where('type', 'image');
        $audios = Image::all()->where('type', 'audio');
        $videos = Image::all()->where('type', 'video');
        if($mood_id == "delete"){
            $albums = Story::with('mood')->where('user_id', Auth::user()->id)->where('category_id','!=', '3')->orderBy('created_at', 'desc')->get();
            $moods = Mood::all(); 
            return view('album')->with(compact('albums', 'moods'));
        }
        return view('story')->with(compact('stories', 'moods', 'images', 'audios', 'videos', 'types'));
    }
    public function filtertype(Request $request){
        $type_id = request('type');
        $stories = Story::with('type')->where('category_id','2')->where('type_id', $type_id)->orderBy('created_at', 'desc')->get();
        $types = Type::all();
        $images = Image::all()->where('type', 'image');
        $audios = Image::all()->where('type', 'audio');
        $videos = Image::all()->where('type', 'video');
        if($type_id == "delete"){
            return redirect()->route('home');        
        }
        return view('story')->with(compact('stories', 'types', 'images', 'audios', 'videos', 'type_id'));
    }
    public function filtertypetip(Request $request){
        $type_id = request('type');
        $stories = Story::with('type')->where('category_id','3')->where('type_id', $type_id)->orderBy('created_at', 'desc')->get();
        $types = Type::all();
        $images = Image::all()->where('type', 'image');
        $audios = Image::all()->where('type', 'audio');
        $videos = Image::all()->where('type', 'video');
        return view('tip')->with(compact('stories', 'types', 'images', 'audios', 'videos', 'type_id'));
    }
    
    public function tip(){
        $stories = Story::with('user')->with('mood')->with('type')->where('category_id', '3')->orderBy('created_at', 'desc')->limit(100)->get();
        $moods = Mood::all();    
        $images = Image::all()->where('type', 'image');
        $audios = Image::all()->where('type', 'audio');
        $videos = Image::all()->where('type', 'video');
        $types = Type::all();

        return view('tip')->with(compact('stories', 'moods', 'images', 'audios', 'videos', 'types'));
    }

    public function create($type){
        $type;
        $categories = Category::all();
        return view('story.create')->with(compact('categories', 'type'));
    }
    public function save(Request $request){
        \request()->validate( [
            'category'=> 'required',
            'title'=> 'required',
        ]);

    $data = [
        'category_id'=>request('category'),
        'title'=>request('title'),
        'user_id'=> Auth::user()->id,
        'text'=> "",
        ];
    
        $story= Story::create($data);
        $story_id = Story::where('id',$story->id)->first()->id;
    
        return redirect('/story/edit/'. $story_id);
    
    }
    
    public function detail($story_id){
        $story = Story::where('id', $story_id)->first();
        $category = Category::where('id', $story->category_id)->first();
        $moods = Mood::all();  
        $album = Story::where('id', $story_id)->first();
        $stories = Story::with('mood')->where('user_id', Auth::user()->id)->where('category_id','!=', '3')->orderBy('created_at', 'desc')->get();
        $images = Image::all()->where('story_id', $story_id)->where('type', 'image');
        $audios = Image::all()->where('story_id', $story_id)->where('type', 'audio');
        $videos = Image::all()->where('story_id', $story_id)->where('type', 'video');
        // dd($images);
        return view('story.detail')->with(compact('stories', 'category', 'moods' , 'album', 'images', 'audios', 'videos'));
    }
   

    public function edit($story_id) {
        $types = Type::all();
        $story = Story::where('id',$story_id)->first();
        $categories = Category::all();
        $userId = Auth::user();
        $moods = Mood::all();
        $images = Image::all()->where('story_id', $story_id)->where('type', 'image');
        $audios = Image::all()->where('story_id', $story_id)->where('type', 'audio');
        $videos = Image::all()->where('story_id', $story_id)->where('type', 'video');

        return view('story.edit')->with(compact('story','categories','userId', 'images', 'audios', 'videos', 'moods', 'types'));
    }
    public function update($story_id) {
        
        $story = Story::where('id',$story_id)->first();
        // \request()->validate( [
        //     'mood_id'=> 'required',
        // ]);

        $data = [
            'category_id'=>request('category'),
            'mood_id'=>request('mood'),
            'type_id'=>request('type'),
            'title'=>request('title'),
            'text'=>request('text'),
        ];
        
        $story->update($data);
        return redirect('/story/'.$story_id)->with('succes', 'updated');
    }
    public function delete($story_id) {
        $story = Story::where('id',$story_id)->delete();
        $image = Image::where('id', $story_id)->delete();
        return redirect()->back();
    }
}
