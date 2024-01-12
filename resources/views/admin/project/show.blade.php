@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row pt-5">
                <div class="col-4">
                    <img class="img-fluid" src="{{ $project->img }}" alt="">
                </div>
                <div class="col-8">
                    <h2>{{ $project->title }}</h2>
                    @if($project->type)
                        <p>{{ $project->type->name }}</p>
                    @else
                        <p>Type: -</p>
                    @endif
                    @foreach($project->technologies as $technology)
                    <p>{{ $technology->name }}</p>
                    @endforeach
                    <p>{{ $project->description }}</p>
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.projects.edit' , $project->id) }}" class="btn btn-primary">Edit</a>
                        <form  action="{{route('admin.projects.destroy', $project->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection