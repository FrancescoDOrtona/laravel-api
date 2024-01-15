@extends('layouts.app')

@section('content')

    <section class="py-4">
        <div class="container">
            <h1>Projects</h1>
        </div>
    </section>

    <section class="pb-4">
        <div class="container">
            <div class="d-grid" style="grid-template-columns: repeat(3,1fr); gap: 20px;">
                @forelse ($projects as $project)
                @dump($project)
                    <div class="card">
                        <img src="{{ $project->img}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a href="{{ route('admin.projects.show', $project->id) }}">
                                <h5 class="card-title">{{ $project->title }}</h5>
                            </a>

                            @if($project->type)
                            <p>Type: {{ $project->type->name }}</p>
                            @else
                                <p>Type: -</p>
                            @endif

                            @forelse($project->technologies as $technology)
                            <p>Technology: {{ $technology->name }}</p>
                            @empty
                            <p>Technology: -</p>
                            @endforelse

                            <p class="card-text">{{ $project->description }}</p>

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
                @empty
                    No Projects to display
                @endforelse
            </div>
        </div>
    </section>
    
@endsection