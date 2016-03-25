@extends('layouts.app')
@section('content')
<!DOCTYPE html>
    <h1>Bomber Recipes</h1>
    <p>Welcome to the RecipesBlog</p>
    <table class="table table-striped table-bordered">
                    <tbody>
                        <td class="table-text"><b>Title</b></td>
                        <td class="table-text"><b>Description</b></td>
                        @foreach ($recipe as $recipes)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $recipes->title }}</div>
                                </td>

                                <td>
                                    <div>{{ $recipes->description }}</div>
                                </td>
                                <td>
                                    <div>
                                        @if(Auth::user()->id == $recipes->user_id)
                                        <a type="button" class="btn btn-danger" id="button1" href="{{ route('recipe.destroy' , $recipes->id) }}">
                                            Delete recipe
                                        </a>
                                        @else
                                        <a type="button" class="btn btn-danger" disabled="disabled" id="button1">
                                            Delete recipe
                                        </a>
                                        @endif
                                        <a type="button" class="btn btn-info" id="button2" href="{{ route('recipe.show' , $recipes->id) }}">
                                            Show recipe
                                        </a>
                                        @if(Auth::user()->id == $recipes->user_id)
                                        <a type="button" class="btn btn-success" id="button3" href="{{ route('recipe.edit' , $recipes->id) }}">
                                            Modify recipe
                                        </a> 
                                        @else
                                        <a type="button" class="btn btn-success" disabled="disabled" id="button3">
                                            Modify recipe
                                        </a> 
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
    </table>
@endsection
