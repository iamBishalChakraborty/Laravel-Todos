@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <a href="{{route('todo.index')}}" style="color: orange"><i class="fad fa-arrow-to-left fa-2x"></i></a>
                        </div>
                    </div>

                    <div class="card-body text-center">
                        <h5 class="mb-3">What next you Need TODO ?</h5>
                        <x-alert/>
                        <form action="{{route('todo.update', $todo->id)}}" method="post">
                            @csrf
                            @method('patch')
                            <input type="text" name="title" value="{{$todo->title}}">
                            <button type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
