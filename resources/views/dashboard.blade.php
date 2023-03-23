@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Dashboard</h3>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <h3 style="text-align: center">Welcome To Dashboard,</h3>
                        <h4 style="text-align: center">Mr/Mrs. <strong>{{Auth::User()->name}}</strong></h4>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection