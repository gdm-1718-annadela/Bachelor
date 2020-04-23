<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\Image;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;



class ImageController extends Controller
{
    public function storeImage(Request $request) {

        $rules= [
            'story_id' => 'required|numeric',
            'file'=> 'required|max:10420',
            'file.*'=> 'image|mimes:jpeg,png,gif,svg,jpg|max:2048'
        ];
        
        $validator=Validator::make($request->all(), $rules);

        // dd($validator->fails());

        if($validator->fails()) {
            return Redirect::back()
            ->withInput()
            ->withErrors($validator)
            ->with(
                [
                    'notification'=>'succes',
                    'message'=>'Er ging iets mis :('
                ]
            );
        }

        
        if($request->hasFile('file')) {
            // folder van de afbeeldingen
            $directory = '/story-'.$request->story_id.'/images';
            
            foreach($request->file('file') as $image) {
                $name = $image->getClientOriginalName();
                $extension = $image->getClientOriginalExtension();
                $filename = pathinfo($name, PATHINFO_FILENAME).'-'.uniqid(5).'.'.$extension;
                $image->storeAs($directory, $filename, 'public');
                
                $this->storeImageToDatabase($request->story_id, $filename, 'storage'.$directory, 'image');
            }
            
            return back()->with([
                'notification' => 'succes',
                'message'=>"het uploaden is succesvolgeladen"
            ]);


        }else{
            return Redirect::back()
            ->withInput()
            ->withErrors($request->hasFile('file'))
            ->with(
                [
                    'notification'=>'succes',
                    'message'=>'Er ging iets mis :('
                ]
            );
        }
    }
    public function storeAudio(Request $request) {

        $rules= [
            'story_id' => 'required|numeric',
            'file'=> 'required',
            'file.*'=> 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav'

        ];
        
        $validator=Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return Redirect::back()
            ->withInput()
            ->withErrors($validator)
            ->with(
                [
                    'notification'=>'succes',
                    'message'=>'Er ging iets mis :('
                ]
            );
        }
        
        if($request->hasFile('file')) {
            // folder van de afbeeldingen
            $directory = '/story-'.$request->story_id.'/audio';
            
            foreach($request->file('file') as $audio) {
                $name = $audio->getClientOriginalName();
                $extension = $audio->getClientOriginalExtension();
                $filename = pathinfo($name, PATHINFO_FILENAME).'-'.uniqid(5).'.'.$extension;
                $audio->storeAs($directory, $filename, 'public');
                
                $this->storeImageToDatabase($request->story_id, $filename, 'storage'.$directory, 'audio');
            }
            
            return back()->with([
                'notification' => 'succes',
                'message'=>"het uploaden is succesvolgeladen"
            ]);


        }else{
            return Redirect::back()
            ->withInput()
            ->withErrors("te groot")
            ->with(
                [
                    'notification'=>'succes',
                    'message'=>'Er ging iets mis :('
                ]
            );
        }
    }
    public function storeVideo(Request $request) {

        $rules= [
            'story_id' => 'required|numeric',
            'file'  => 'required',
            // 'file.*'  => 'mimes:mp4,mov,ogg',
        ];
        
        $validator=Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return Redirect::back()
            ->withInput()
            ->withErrors($validator)
            ->with(
                [
                    'notification'=>'succes',
                    'message'=>'Er ging iets mis :('
                ]
            );
        }
        
        if($request->hasFile('file')) {
            // folder van de afbeeldingen
            $directory = '/story-'.$request->story_id.'/video';
            
            foreach($request->file('file') as $audio) {
                $name = $audio->getClientOriginalName();
                $extension = $audio->getClientOriginalExtension();
                $filename = pathinfo($name, PATHINFO_FILENAME).'-'.uniqid(5).'.'.$extension;
                $audio->storeAs($directory, $filename, 'public');
                
                $this->storeImageToDatabase($request->story_id, $filename, 'storage'.$directory, 'video');
            }
            
            return back()->with([
                'notification' => 'succes',
                'message'=>"het uploaden is succesvolgeladen"
            ]);


        }else{
            return Redirect::back()
            ->withInput()
            ->withErrors("te groot")
            ->with(
                [
                    'notification'=>'succes',
                    'message'=>'Er ging iets mis :('
                ]
            );
        }
    }
    
    private function storeImageToDatabase($story_id, $filename, $filepath, $type) {
        
        $image = new Image();
        $image->story_id = $story_id;
        $image->type = $type;
        $image->title = $filename;
        $image->path = $filepath;
        $image->caption = 'dit is een caption';
        $image->save();
    }

    public function delete($image_id, Request $request){

        $image = Image::where('id',$image_id)->first();

        $file = str_replace('storage', '', $image->path) . '/' . $image->title;
        //dd($file);

        if(Storage::disk('public')->exists($file)){
            //dd('bestaat, dus kan verwijderd worden');
            $isDeleted = Storage::disk('public')->delete($file);
            if($isDeleted) {
                Image::where('id',$image_id)->delete();
            }
        } else {
            dd('iets mis');
        }
        
        return redirect()->back();
    }
}
