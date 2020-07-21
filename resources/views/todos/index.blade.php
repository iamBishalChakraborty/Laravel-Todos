@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}

                        <div class="float-right">
                            <a href="{{route('todo.create')}}" style="color: limegreen"><i class="fad fa-plus fa-2x"></i></a>
                        </div>

                    </div>

                    <div class="card-body text-center">
                        <h5 class="mb-3">What next you Need TODO ?</h5>
                        <div class="mt-5">
                            <h5>All Todos</h5>
                            <x-alert/>
                            @foreach($todos as $todo)
                                <div class="mb-1 d-flex justify-content-between">

                                        @if ($todo->completed)
                                        <a onclick="event.preventDefault();document.getElementById('form-incomplete-{{$todo->id}}').submit();" style="color: limegreen"><i class="fad fa-check"></i></a>
                                        <del><a class="text-decoration-none" href="{{route('todo.show', $todo->id)}}"><h5>{{$todo->title}}</h5></a></del>
                                        <form action="{{route('todo.incomplete', $todo->id)}}" id="form-incomplete-{{$todo->id}}" method="post" hidden>
                                            @csrf
                                            @method('put')
                                        </form>
                                        @else
                                        <a  onclick="event.preventDefault();document.getElementById('form-complete-{{$todo->id}}').submit();" style="color: black"><i class="fad fa-check"></i></a>
                                        <a class="text-decoration-none" href="{{route('todo.show', $todo->id)}}"><h5>{{$todo->title}}</h5></a>
                                        <form action="{{route('todo.complete', $todo->id)}}" id="form-complete-{{$todo->id}}" method="post" hidden>
                                            @csrf
                                            @method('put')
                                        </form>
                                        @endif
                                    <div class="float-right">
                                        <a href="{{route('todo.edit',$todo->id)}}" style="color: orange"><i class="fad fa-pencil"></i></a>
                                        <a onclick="event.preventDefault(); if (confirm('Are you Sure You want to delete : {{$todo->title}} ?')){ document.getElementById('form-delete-{{$todo->id}}').submit(); }" class="ml-3" style="color: red"><i class="fad fa-trash"></i></a>
                                        <form action="{{route('todo.destroy', $todo->id)}}" id="form-delete-{{$todo->id}}" method="post" hidden>
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>

                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
