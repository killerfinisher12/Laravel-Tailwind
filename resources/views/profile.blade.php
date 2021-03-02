@extends('layouts.app')

@section('content')
<div class="container">

<div class="row no-gutters">

<div class="flex items-center px-2 pt-3">
<div class="shadow-md">
<img class="border rounded w-28 h-28 px-0 mx-0" src="/storage/{{$user->profile->image ?? 'Default.jpg'}}" alt="image">
</div>

<div class="pl-5">
  <h2 class="font-bold text-lg">{{$user->name}}</h2>


@if(auth()->id() != $user->profile->id)
<div class="">
    

    <follow-button userid="{{$user->profile->id}}" follows="{{$follows}}">
      @csrf
    </follow-button>
    
  </form>
</div>
@endif


@can('update', $user->profile)
<div class="mb-3">                                  <a  href="/profile/{{ $user->id }}/edit" class="text-blue-400 hover:text-blue-600">
Edit Profile</a>                                </div>
@endcan

@can('update', $user->profile)
<div class="pt-2">
<a  href="/post/create" class="btn hover:bg-blue-400">Add Post</a>
</div>
@endcan

</div>
</div>

<div class=" flex justify-center">
<p class="pl-3 mt-4">{{ $user->profile->description }}</p>
</div>
<div class="flex justify-center">
<a href="" class="text-blue-400">{{ $user->profile->url }}</a>
</div>
</div>

</div>

<div class="flex justify-center  pt-2 col-12">
<div class="pr-3"><strong>{{ $user->posts->count() }} </strong>Posts</div>
<div class="pr-3"><strong>{{$user->profile->follow->count()}} </strong>Followers</div>

<div class="pr-3"><strong>{{$user->following->count()}} </strong>Following</div>
</div>


<div class="mt-5  sm:flex">
@foreach($user->posts as $post)

<div class="my-4 w-full sm:w-1/3 mx-1">
<a class=""  href="/post/{{ $post->id }}">
 <img class="object-cover shadow-md border border-gray-900 rounded" src="/storage/{{$post->image}}" alt="image">
</a>
</div>

@endforeach
</div>



</div>
@endsection
