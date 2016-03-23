@extends('layouts.app')
@section('content')
<h1>Search results:</h1>
@if (!$recipe->isEmpty())
@foreach($recipe as $recipes)
{{$recipes->title}}<br />
{{$recipes->description}}
@endforeach
@else
Nessuna ricetta trovata!
@endif
@endsection