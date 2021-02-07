@extends('layouts.app')

@section('content')

<div class="container p-2">

<div class="bg-bluse-400">

<div class="py-2 text-xl text-gray-700 font-bold text-center"> <h2 class="">Add Post</h2> </div>

<div class="row">
	<form action="/post" method="POST" enctype="multipart/form-data">
@csrf
<div class="row pl-1 mb-4">
	<label for="caption" class="block text-sm font-bold text-gray-600 mb-2">Add Caption</label>
	<input type="text" id="caption" name="caption" class="form-control focus:outline-none focus:shadow-outline  @error('caption') is-invalid @enderror" value="{{ old('caption') }}" autocomplete="caption" autofocus>

@error('caption')
	<span class="text-red-500 text-sm py-2 block" role="alert">
	<strong>{{$message}}</strong>
	</span>
@enderror
</div>

<div class="row pl-1 mb-4">
	<label for="image" class="text-sm block font-bold text-gray-600 mb-2"> Post Image </label>
	<input type="file" name="image" id="image" class="focus:outline-none focus:shadow-outline form-control-file">

@error('image')                         <strong class="text-red-500 text-sm py-2 block">{{$message}}</strong>           @enderror
</div>

<div class="text-right mt-4">
<button class="btn text-lg hover:shadow-outline" type="submit">Create Post</button>
</div>

</div>


	</form>

</div>

@endsection
