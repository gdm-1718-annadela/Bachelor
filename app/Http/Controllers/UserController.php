<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Models\Image;

class UserController extends Controller
{

    public function storeImage($userId, Request $request){
        if (Auth::user()){
            $rules = [
                'file' => 'required',
                'file.*' => 'image|mimes:jpeg,jpg,png,gif,svg|max:2048|required'
            ];
            $validator = Validator::make($request->all(), $rules);

            if($validator->fails()){
                return Redirect::back()->withInput()
                                        ->withErrors($validator)
                                        ->with('fail' , 'Er ging iets mis met het uploaden van uw afbeelding');
            }
            if($request->hasFile('file')){
                // dd($request->userId);
                $directory = 'user'.$userId;


                foreach($request->file('file') as $image){
                    $name = $image->getClientOriginalName();
                    $extension = $image->getClientOriginalExtension();
                    $filename = pathinfo($name, PATHINFO_FILENAME) . '-' . uniqid(5) . '.' . $extension;
                    $image->storeAs($directory, $filename, 'public');
                    $this->storeImageToDatabase($request->userId, $filename, 'storage/'.$directory);
                }
                return back()->with('succes','U hebt een nieuwe profiel foto');
            }
        }
        else{
            return redirect('/')->with('fail','U bent niet ingelogd!');
        } 
    }
    private function storeImageToDatabase( $user_id, $filename, $filepath){
        $profileImage = User::where('id', Auth::user()->id)->first();
        User::where('id', Auth::user()->id)->update([
            'picturetitle' => $filename,
            'picturepath' => $filepath,
        ]);
    }
}
