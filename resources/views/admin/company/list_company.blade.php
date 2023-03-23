@extends('layouts.dashboard')

@section('content')
@include('sweetalert::alert')

<nav aria-label="breadcrumb">
    <ol style="background-color: #e8ccf2;" class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Companies</a></li>
    </ol>
  </nav>

<div class="row">
    <div class="col-lg-9 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title text-center">Company List</h4>
                <table class="table table-hover">
                    <tr style="background-color: #f3ebf6;" >
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Logo</th>
                        <th>Website</th>
                        <th>Action</th>
                    </tr>
                @foreach ($companies as $sl=>$company)
                    <tr>
                        <td>{{$sl+1}}</td>
                        <td>{{$company->name}}</td>
                        <td>{{$company->email}}</td>
                        <td>
                            <img width="100" src="{{asset('uploads/company')}}/{{$company->logo}}" alt="">
                        </td>
                        <td>{{$company->website}}</td>
                        <td>
                            <a href="{{route('edit.company',$company->id)}}" class="btn btn-outline-info btn-icon-text">Edit</a>
                            <a href="{{route('delete.company',$company->id)}}" class="btn btn-outline-danger btn-icon-text">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </table>
                <div style="margin:85%" class="div my-3">
                    {{$companies->links()}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 grid-margin">
        <div class="card">
            <div class="card-body">
                <form action="{{route('company.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h4 class="card-title text-center">Compnay Details</h4>
                    <div class="form-group">
                        <label for="company_name">Name</label>
                        <input type="text" class="form-control" name="name" id="company_name" placeholder="Company Name">
                        @error('name')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="text" class="form-control" id="Email" name="email" placeholder="Company Email">
                        @error('email')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Website">Website</label>
                        <input type="text" class="form-control" id="Website" name="website" placeholder="Company Website">
                        @error('website')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Logo">Logo</label>
                        <input type="file" class="form-control" id="Logo" name="logo" placeholder="Company Logo">
                        @error('logo')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="text-center m-auto">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-outline-primary btn-block">
                                <i class="btn-icon-prepend" data-feather="check-square"></i>ADD Company
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection