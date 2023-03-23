@extends('layouts.dashboard')


@section('content')
@include('sweetalert::alert')

<div class="row">
    <div class="col-lg-8 m-auto">
        <div class="card">
            <div class="card-body">
              <h2 class="text-center">User List</h2>
              <table class="table ">
                  <thead class="m-auto">
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  @foreach ($users as $sl=>$users)
                  <tbody>
                    <tr>
                      <td>{{ $sl+1}}</td>
                      <td>{{$users->name}}</td>
                      <td>{{$users->email}}</td>
                      <td>
                        <a href="{{route('user.delete',$users->id)}}" class="btn btn-outline-danger btn-icon-text">Delete</a>
                      </td>
                    </tr>
                  </tbody>
                  @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
