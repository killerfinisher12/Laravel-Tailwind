<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
  public function try(){
   // $user = auth::user();
    $user = User::orderBy('id', 'desc')->where('email', 'Test@gmail.com')->first();
    $name = request('name');
    return view('try', compact('user', 'name'));
  }
  public function red(){
    return redirect('/')->with('msg', 'This is a session');
  }
  
  
  
	public function index(User $user) {
	//	$user = User::findOrFail($user);
		//dd(User::find(3)->following()->where('profile_user.user_id', 3)->get());
		//return response()->json($user);
		
		//return $user->id;
		$follows = auth()->user() ? auth()->user()->following->contains($user->id) : false;
		//return $follows;
		return view('profile' , compact(['user', 'follows']));
	}

	public function edit(User $user){
	  
		$this->authorize('update', $user->profile);
		return view('Profiles.edit', compact('user'));
	}

	public function update(User $user){
	  

	if(request('image')){
	$imgPath = request('image')->store('profiles', 'public');
	$imgArray = ['image' => $imgPath];

	}

	auth()->user()->profile->update(array_merge($this->validateData(), $imgArray ?? []));

	return redirect("/profile/$user->id");

	}
	
	protected function validateData(){
	  return request()->validate([
		'title' => 'required',
		'description' => 'required',
		'url' => 'url',
		'image', '' ]);
	}

}
