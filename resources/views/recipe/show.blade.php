@extends('layouts.app')
@section('content')
            <div class="media-body">
    		<h1 class="media-heading">{{ $recipe->title }}</h1>
            <p class="text-left">{{ $recipe->description }}</p>
             
            <h1>Ingredients :</h1>
                <ul>
                @foreach($recipe->ingredients as $ingredient)
                <li>{{$ingredient->name}}</li>
                @endforeach
                </ul>
            </div>
@endsection