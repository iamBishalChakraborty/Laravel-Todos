@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <a href="/todos" style="color: orange"><i class="fad fa-arrow-to-left fa-2x"></i></a>
                        </div>
                     </div>

                    <div class="card-body text-center">
                        <h5 class="mb-3">What next you Need TODO ?</h5>
                        <x-alert/>
                        <form action="/todos/create" method="post">
                            @csrf
                            <input type="text" name="title">
                            <button type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
