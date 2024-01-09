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
                    <div class="card">
                        <img src="{{ $project->img}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href="{{ route('admin.projects.show', $project->id) }}">
                            <h5 class="card-title">{{ $project->title }}</h5>
                        </a>
                        <p class="card-text">{{ $project->description }}</p>
                        <a href="#" class="btn btn-primary">Edit</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                    </div>
                    </div>
                @empty
                    No Projects to display
                @endforelse
            </div>
        </div>
    </section>
    
@endsection