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
                                        {{ Form::open(array('url' => 'recipe/' . $recipes->id, 'class' => 'pull-right')) }}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                                        {{ Form::close() }}
                                    </div>
                                    <a type="button" class="btn btn-success" href="{{ route('recipe.edit' , $recipes->id) }}">
                                        Modify
                                    </a>
                                    </div>
                                </td>
                                     
                            </tr>
                        @endforeach
                    </tbody>
    </table>
@endsection
