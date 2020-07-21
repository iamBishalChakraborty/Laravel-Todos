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


                    <div class="card-body px-5 mx-5">
                        <h5 class="mb-3">What next you Need TODO ?</h5>
                        <x-alert/>
                        <form action="{{route('todo.store')}}" method="post" >
                            @csrf
                            <div class="form-group">
                                <label for="todoText">Todo</label>
                                <input type="text" name="title" class="form-control" id="todoText">
                            </div>
                            <div class="form-group">
                                <label for="todoDescription">Todo Description</label>
                                <textarea class="form-control" name="description" id="todoDescription" rows="3"></textarea>
                            </div>
                            @livewire('step')

                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
