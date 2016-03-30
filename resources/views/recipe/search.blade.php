@extends('layouts.app')
@section('content')
<h1>Recipes:</h1>
    @foreach($recipe as $recipes)
    @if (count($recipe) === 0)
        Recipes not found
    @else (count($recipe) >= 1)
    		<p>{{ $recipes->title }}</p>
            <p>{{ $recipes->description }}</p>
        </div>
    @endif
    @endforeach
@endsection