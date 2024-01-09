@extends('layouts.app')

@section('content')

<div class="container">
    <form class="mt-3" action="{{ route('admin.projects.update', $project->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="img" class="form-label">Image</label>
            <input class="form-control" id="img" name="img" placeholder="Image URL" type="text" value="{{ old('img', $project->img)}}">
        </div>
    
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input class="form-control" id="title" name="title" placeholder="Title" type="text" value="{{ old('title', $project->title)}}">
        </div>
    
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description', $project->description) }}</textarea>
        </div>
    
        <button type="submit" class="btn btn-primary">
            Create
        </button>
       </form>
</div>
@endsection