@extends('layouts.app')
@section('content')
            <div class="media-body">
    		<h1 class="media-heading">{{ $recipe->title }}</h1>
             <p class="text-right">{{ $recipe->description }}</p>
            </div>
@endsection