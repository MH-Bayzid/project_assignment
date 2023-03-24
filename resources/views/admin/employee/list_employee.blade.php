@extends('layouts.dashboard')

@section('content')
@include('sweetalert::alert')

<nav aria-label="breadcrumb">
    <ol style="background-color: #e8ccf2;" class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Employees</a></li>
    </ol>
  </nav>
  
  <div class="row">
    <div class="col-lg-9 grid-margin">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title text-center">Employee List</h4>
                <table class="table table-bordered table-hover">
                    <tr style="background-color: #f3ebf6" class="text-center">
                        <th>SL</th>
                        <th>Name</th>
                        <th>Company Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Action</th>
                    </tr>
                @foreach ($employees as $sl=>$employee)
                    <tr class="text-center"> 
                        <td>{{$sl+1}}</td>
                        <td>{{$employee->name}}</td>
                        <td>{{$employee->company_id}}</td>
                        <td>{{$employee->email}}</td>
                        <td>{{$employee->phone}}</td>
                        <td>
                            <a href="{{route('edit.employee',$employee->id)}}" class="btn btn-outline-info btn-icon-text">Edit</a>
                            <a href="{{route('delete.employee',$employee->id)}}" class="btn btn-outline-danger btn-icon-text">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </table>
                <div style="margin:85%" class="div my-3">
                    {{$employees->links()}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 grid-margin">
        <div class="card">
            <div class="card-body">
                <form action="{{route('employee.store')}}" method="POST">
                    @csrf
                    <h4 class="card-title text-center">Employee Details</h4>
                    @if (session('success'))
                        <div class="alert alert-success text center">{{session('success')}}</div>
                    @endif
                    <div class="form-group">
                        <label for="company_name">Name</label>
                        <input type="text" class="form-control" name="name" id="company_name" placeholder="Employee Name">
                        @error('name')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                    <label for="" class="form-label">Select Company</label>
                    <select name="company_id" class="form-control">
                        <option class="text-center" value="">--- Select Company ---</option> 
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
                        <input type="email" class="form-control" id="Website" name="email" placeholder="Employee Website">
                        @error('email')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Phone">Employee Phone</label>
                        <input type="number" class="form-control" id="Phone" name="phone" placeholder="Employee Phone">
                        @error('phone')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="text-center m-auto">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-outline-warning btn-block">
                                <i class="menu-icon mdi mdi-check"></i> ADD Company</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
