@extends('layouts.dashboard')

@section('content')
@include('sweetalert::alert')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-danger">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Employees</a></li>
      <li class="breadcrumb-item"><a href="#">Edit Employee</a></li>
    </ol>
  </nav>

  <div class="col-lg-5 grid-margin m-auto">
    <div class="card">
        <div class="card-body">
            <form action="{{route('employee.update')}}" method="POST">
                @csrf
                <h4 class="card-title text-center">Edit Employee Details</h4>
                <div class="form-group">
                    <label for="company_name">Name</label>
                    <input type="text" class="form-control" name="name" id="company_name" value="{{$employee->name}}">
                    @error('name')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
                <div class="form-group">
                <label for="" class="form-label">Select Company</label>
                <select name="company_id" class="form-control">
                    <option class="text-center" value="{{$employee->company_id}}">{{$employee->rel_to_company->name}}</option> 
                    @foreach ($companies as $company)                                    
                        <option class="text-center" value="{{$company->id}}">{{$company->name}}</option> 
                    @endforeach
                </select>
                    @error('company_id')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Website">Email</label>
                    <input type="email" class="form-control" id="Website" name="email" value="{{$employee->email}}">
                    @error('email')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Phone">Phone Phone</label>
                    <input type="number" class="form-control" id="Phone" name="phone" value="{{$employee->phone}}">
                    @error('phone')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
                <div class="col-md-4 m-auto">
                    <div class="mb-3">
                        <input type="hidden" name="employee_id" value="{{$employee->id}}">
                        <button type="submit" class="btn btn-outline-warning btn-block">
                            <i class="menu-icon mdi mdi-check"></i> ADD Company</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection