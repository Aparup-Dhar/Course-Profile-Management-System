@extends('layouts/app')
@section('content')
<div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Home Page</h5>
            <p><b>Name :</b>{{ Session::get('name')}}</p>
            <p><b>Email :</b>{{ Session::get('email')}}</p>
            <p><b>Phone :</b>{{ Session::get('phone')}}</p>
            <p><b>Department :</b>{{ Session::get('department')}}</p>
            <p><b>Role :</b>{{ Session::get('role')}}</p>
          </div>
        </div>
      </div>
    </div>
@endsection