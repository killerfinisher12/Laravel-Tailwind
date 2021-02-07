@extends('layouts.app')

@section('content')

<div class="container">

<form action="/profile/{{$user->id}}" method="POST" enctype="multipart/form-data">
@csrf
@method('PATCH')
<div class="p-2">
<label for="title" class="label">Name</label>
<input type="text" class="mt-2 form-control focus:outline-none focus:shadow-outline  @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') ?? $user->profile->title}}" autocomplete="title" autofocus>
@error('title')
<span class="invalid-feedback" role="alert">
<strong>{{$message}}</strong>
</span>
@enderror
</div>

<div class=" p-2">
<label for="description" class="label">Description</label>
<textarea rows="5" type="text" id="description" name="description" class="mt-2 form-control focus:outline-none focus:shadow-outline @error('description') is-invalid @enderror" autocomplete="description">{{ old('description') ?? $user->profile->description}}</textarea>

@error('description')
<span class="invalid-feedback" role="alert">
<strong>{{$message}}</strong>
</span>
@enderror
</div>

<div class=" p-2">
<label for="url" class="label">Url</label>    <input type="text" id="url" name="url" class="mt-2 form-control focus:outline-none focus:shadow-outline  @error('url') is-invalid
@enderror" value="{{ old('url') ?? $user->profile->url}}" auto
complete="url">

@error('url')
<span class="invalid-feedback" role="alert">
<strong>{{$message}}</strong>
</span>
@enderror
</div>


<div class="mb-3 p-2">
<label for="image" class="label">Edit Profile Picture</label>    <input type="file" id="image" name="image" class="mt-2 form-control focus:outline-none focus:shadow-outline  @error('image') is-invalid
@enderror" value="{{ old('image') }}" auto
complete="image">

@error('image')
<span class="invalid-feedback" role="alert">
<strong>{{$message}}</strong>
</span>
@enderror
</div>

<div class="row mb-3 p-2">
<div class="text-right col-12">
<button type="submit" class=" btn btn-primary">Edit Profile</button>
</div>
</div>

</form>

</div>
@endsection
