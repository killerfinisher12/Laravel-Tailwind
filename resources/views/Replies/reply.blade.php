@extends('layouts.app')

@section('content')
<div class="">
  
<div class="flex py-3">
<p class="ml-2 text-lg my-0 px-0">Replies to {{$comment->user->name}}'s Comment</p> &nbsp; &nbsp;
<a class="text-blue-700" href="/post/{{$comment->post_id}}">Back</a>
</div>
<hr >

<div class="py-3 px-2">
<div class="">

<a href="/profile/{{$comment->user_id}}"><strong>{{$comment->user->name}}</strong></a>
<br>
<span class="ml-1">{{$comment->body}}</span>
</div>
</div>
<hr class="row">

<div class="mb-4">
@foreach($replies as $reply)
<div class="px-2 py-3 ml-1">
<a class="label block" href="/profile/{{$reply->user->id}}">{{$reply->user->name}}</a>
<div class="ml-1">{{$reply->body}}</div>
</div>
<hr>
@endforeach
</div>




<div class="p-2">
  <form class="col-12" method="POST" action="/reply">
    @csrf
    <div class="">
    <input type="hidden" value="{{$comment->id}}" name="comment_id">
    <textarea rows="5" name="body" class="form-control focus:shadow-outline focus:outline-none @error('body') is-invalid @enderror" placeholder="Write a reply" autocomplete="body" value="{{old('body')}}"></textarea>
    @error('body')
    <span class="invalid-feedback">
      <strong>{{$message}}</strong>
    </span>
    @enderror
    </div>
    <div class="text-right pt-2">
      <button class="btn hover:bg-blue-400" type="submit">Reply</button>
    </div>
  </form>
</div>

</div>
@endsection