
@extends('layouts.dashboard')

@section('content')
@include('sweetalert::alert')

<nav aria-label="breadcrumb">
    <ol style="background-color: #e8ccf2;" class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{url('/company/list')}}">Companies</a></li>
      <li class="breadcrumb-item"><a href="#">Edit</a></li>
    </ol>
  </nav>

  <div class="col-lg-6 grid-margin stretch-card m-auto">
    <div class="card">
        <div class="card-body">
            <form action="{{route('company.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <h4 class="card-title text-center">Company Details</h4>
                <div class="form-group">
                    <label for="company_name">Name</label>
                    <input type="text" class="form-control" name="name" id="company_name" value="{{$company->name}}">
                    @error('name')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="text" class="form-control" id="Email" name="email" value="{{$company->email}}">
                    @error('email')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Website">Website</label>
                    <input type="text" class="form-control" id="Website" name="website" value="{{$company->website}}">
                    @error('website')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Logo">Logo</label>
                    <input type="file" class="form-control" id="Logo" name="logo" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                    @error('logo')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="div my-2">
                    <img width="150" src="{{asset('uploads/company')}}/{{$company->logo}}" id="blah" alt="">
                </div>
                <div class="form-group text-center">
                    <input type="hidden" name="company_id" value="{{$company->id}}">
                    <button type="submit" class="btn btn-outline-info btn-icon-text">Update Company Details</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection