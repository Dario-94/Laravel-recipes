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
                                        <a type="button" class="btn btn-danger" id="button1" href="{{ route('recipe.destroy' , $recipes->id) }}">
                                            Delete recipe
                                        </a>
                                        <a type="button" class="btn btn-info" id="button2" href="{{ route('recipe.show' , $recipes->id) }}">
                                            Show recipe
                                        </a>
                                        <a type="button" class="btn btn-success" id="button3" href="{{ route('recipe.edit' , $recipes->id) }}">
                                            Modify recipe
                                        </a> 
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
    </table>
@endsection
