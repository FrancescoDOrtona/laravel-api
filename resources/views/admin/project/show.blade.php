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
                <p>{{ $project->description }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection