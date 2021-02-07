@extends('layouts.app')

@section('content')

<div class="">

<div class="flex px-2 pt-3">
<a href="/profile/{{$user->user->id}}">
<img class="rounded w-15" src="/storage/{{$user->user->profile->image ?? 'Default.jpg'}}" alt="image"> </a>

<div class="pt-2">
<a href="/profile/{{$user->user->id}}"><span class="mx-2 text-xl hover:text-blue-500 cursor-pointer font-bold text-gray-600">{{$user->user->name}}</span></a>
@can('delete', $user)
<form class="" action="/post/{{$user->id}}/delete" method="POST" class="px-2"> 
@method('DELETE') 
@csrf 
<button type="submit" class="px-2 text-xs hover:underline text-blue-400">Delete</button> </form>
@endcan
</div>
</div>

<div class="">
<div class="pt-3 pb-1">
<p class="ml-2 text-md font-light">{{ $user->caption }} </p>
</div>
</div>
  
  
<div class="bg-black pdy-10">
<div class="borhder">
<div class="flex h-80 justify-center p-2">
<img class="px-0 object-cover"  src="/storage/{{ $user->image }}" alt="image">
</div>
</div>

<div class="mt-2 text-right px-0">
<span class="font-light text-xs text-white">{{$user->created_at}}</span>
</div>

</div>
<br>
<hr>

<div class="flex items-center py-2 pl-3 justify-c-center">


  <form method="POST" class="inline-block" action="/likepost">
    @csrf
    
    <input type="hidden" name="post_id" value="{{$user->id}}">
    

<span>{{$user->likepost->count()}}</span>


<label for="star">
    <button id="star" class="text-primary font-weight-bold" style="background-color: #F9FAFC; border: none; outline: none" type="submit">Star</button>
 
 @if(auth()->user()->likepost->where('id', $user->id)->first() === null)
 
  <svg id="star" width="2em" height="2em" viewBox="0 0 16 16" class="inline text-gray-300 bi bi-star-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/> </svg>
  @else
  <svg id="star" width="2em" height="2em" viewBox="0 0 16 16" class="inline text-blue-500 bi bi-star-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/> </svg>
  @endif
  </form>
</label>

<div>
<span class="ml-5 text-right">Share &nbsp<svg width="2em" height="2em" viewBox="0 0 16 16" class="inline bi bi-share" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" d="M11.724 3.947l-7 3.5-.448-.894 7-3.5.448.894zm-.448 9l-7-3.5.448-.894 7 3.5-.448.894z"/> <path fill-rule="evenodd" d="M13.5 4a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zm0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm0 10a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zm0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm-11-6.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zm0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/> </svg></span>
</div>
</div>
<hr>

<div class="row p-3">
  
<form method="POST" action="/comment" class="px-0 col-12">
  @csrf
  <input type="hidden" name="post_id" value="{{$user->id}}">
<textarea name="body" id="body" class="form-control focus:outline-none focus:shadow-outline  @error('body') is-invalid @enderror" rows="4" placeholder="Write comment" autocomplete="body" value="{{ old('body') }}"></textarea>
@error('body')
<span class="invalid-feedback">
  <strong>{{$message}}</strong>
</span>
@enderror

<div class="text-right">
<button type="submit" class="btn focus:outline-none focus:shadow-outline hover:shadow-outline  mt-2">Comment</button>
</div>
</form>
</div>
<hr class="row">

<div class="pt-3 px-2">
  @foreach($user->comment as $comment)
  <div class="">
    <a class="label" href="/profile/{{$comment->user_id}}"><strong>{{$comment->user->name}}</strong></a> <br>
<div class="px-2 font-light">
 <span> {{$comment->body}} </span>
 </div>
 
 <div class="flex px-2 pb-3 text-xs text-blue-900">
  
  <span class="mr-1"> {{$comment->likecomment->count()}} </span>
 <form method="POST" action="/likecomment">
   @csrf
   <input name="comment_id" type="hidden" value="{{$comment->id}}">
   <button class="text-primary" style="background-color: #F9FAFC; border: none; ">Like</button>
 </form>
<span class="font-bold text-gray-400">&nbsp · &nbsp</span>
<span>{{$comment->reply->count()}}</span>
<span>&nbsp</span>
 <a href="/reply/{{$comment->id}}">Reply</a>
 </div>
 <hr>
 </div>
  @endforeach
</div>

{{$lol = auth()->user()->likepost->where('user_id', 1)->where('id', $user->id)->first()
}}


</div>

@endsection
