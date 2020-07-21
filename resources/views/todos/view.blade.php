@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">

                       <div class="float-left">
                           <a href="{{route('todo.index')}}" style="color: orange"><i class="fad fa-arrow-to-left fa-2x"></i></a>
                       </div>


                        <h5>
                            {{$todo->title}}
                        </h5>

                        <div class="float-right">
                            <a href="{{route('todo.create')}}" style="color: limegreen"><i class="fad fa-plus fa-2x"></i></a>
                        </div>

                    </div>
                    <div class="card-body text-center">
                        <h5 class="mb-3">{{$todo->description}}</h5>
                        <div>
                            <h5>All Steps :</h5>
                            <hr>
                            <x-alert/>
                            @foreach($steps as $step)
                                <h5 class="mb-3">{{$step->steps}}</h5>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
