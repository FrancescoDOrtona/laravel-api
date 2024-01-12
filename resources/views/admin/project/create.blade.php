@extends('layouts.app')

@section('content')

<div class="container">
    <form class="mt-3" action="{{ route('admin.projects.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="img" class="form-label">Image</label>
            <input class="form-control" id="img" name="img" placeholder="Image URL" type="text">
        </div>
    
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input class="form-control" id="title" name="title" placeholder="Title" type="text">
        </div>

        <div class="mb-3">
            <label for="type_id" class="form-label">Types</label>
            <select class="form-select" name="type_id">
                <option selected>Select type</option>
                @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <select name="technologies[]" multiple>
                @foreach($technologies as $technology)
                    <option value="{{ $technology->id }}" {{ in_array($technology->id, $project->technologies->pluck('id')->toArray()) ? 'selected' : '' }}>
                        {{ $technology->name }}
                    </option>
                @endforeach
            </select>
        </div>
    
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
        </div>
    
        <button type="submit" class="btn btn-primary">
            Create
        </button>
       </form>
</div>
@endsection