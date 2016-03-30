@extends('layouts.app')
@section('content')
<!DOCTYPE html>
    <h1>Bomber Recipes</h1>
    <p>Welcome to the RecipesSite</p>
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
                                        @if(Auth::user()->id == $recipes->user_id)
                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'route' => ['recipe.destroy', $recipes->id]
                                            ]) !!}
                                        <div class="col-sm-4">
                                            {!! Form::submit('Delete recipe', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                            <a style="margin-left:-6px;" type="button" class="btn btn-info" href="{{ route('recipe.show' , $recipes->id) }}">
                                            Show recipe
                                            </a>
                                            <a style="margin-left:-1px;" type="button" class="btn btn-success" href="{{ route('recipe.edit' , $recipes->id) }}">
                                                Modify recipe
                                            </a>
                                        @else
                                        <a style="margin-left:15px;"type="button" class="btn btn-danger" disabled="disabled">
                                            Delete recipe
                                        </a>
                                        <a type="button" class="btn btn-info" href="{{ route('recipe.show' , $recipes->id) }}">
                                            Show recipe
                                        </a>
                                         <a type="button" class="btn btn-success" disabled="disabled">
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
