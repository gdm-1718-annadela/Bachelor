<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;
use App\Models\Mood;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;

use App\User;


class StoryController extends Controller
{
    public function album(){
        $albums = Story::with('mood')->where('user_id', Auth::user()->id)->where('category_id','!=', '3')->get();    
        // dd($albums);    
        return view('album')->with(compact('albums'));
    }
    
    public function story(){
        $stories = Story::with('user')->with('mood')->where('category_id', '2')->get();
        $images = Image::all();

        return view('story')->with(compact('stories', 'images'));
    }
    
    public function tip(){
        $tips = Story::with('user')->with('mood')->where('category_id', '3')->get();
        return view('tip')->with(compact('tips'));
    }

    public function create(){
        $categories = Category::all();
        return view('story.create')->with(compact('categories'));
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
        return view('story.detail')->with(compact('story', 'category'));
    }

    public function edit($story_id) {

        $story = Story::where('id',$story_id)->first();
        $categories = Category::all();
        $userId = Auth::user();
        $moods = Mood::all();
        $images = Image::all()->where('story_id', $story_id)->where('type', 'image');
        $audios = Image::all()->where('story_id', $story_id)->where('type', 'audio');
        $videos = Image::all()->where('story_id', $story_id)->where('type', 'video');

        return view('story.edit')->with(compact('story','categories','userId', 'images', 'audios', 'videos', 'moods'));
    }
    public function update($story_id) {
        
        $story = Story::where('id',$story_id)->first();
        $data = [
            'category_id'=>request('category'),
            'mood_id'=>request('mood'),
            'title'=>request('title'),
            'text'=>request('text'),
        ];
        
        $story->update($data);
        return redirect('/story/'.$story_id)->with('succes', 'updated');
    }
}
