@extends('layouts/app')
@section('content')

<div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Course Profile for {{$course_info->name}}</h5>
            <div id="target">
              <br>
              <h5>Course Objectives</h5>
              @foreach($objectives as $obj)
              <div class="row">
                <div class="col-md-2">
                <input type="text" value="{{ $obj->objective_id }}" class="form-control" id="" name="cobj_num[]" aria-describedby="emailHelp" placeholder="Objective ID" disabled>
                </div>
                <div class="col-md-8">
                <textarea class="form-control" id="" name="cobj_des[]" aria-describedby="emailHelp" placeholder="Objective Description" rows="1" disabled>{{ $obj->objective_des }}</textarea>
                </div>
                <div class="col-md-2">
                <a href="{{ url('/dep-admin/edit-cp-obj/'.$obj->id) }}" class="btn btn-info"><i class="ti ti-edit"></i> Edit</a>
                </div>

              </div>
              <br>
              @endforeach

              <hr>
              
              <div id="target2">
              <br>
              <h5>Course Outcomes</h5>
              @foreach($outcomes as $out)

              @php
              $values="";
              $values = json_decode($out->mapping,true);
              @endphp
              <div class="row">
                <div class="col-md-2">
                <input type="text" value="{{ $out->outcome_id }}" class="form-control" id="" name="cout_num[]" aria-describedby="emailHelp" placeholder="Outcome ID" disabled>
                </div>
                <div class="col-md-6">
                <textarea class="form-control" id="" name="cout_des[]" aria-describedby="emailHelp" placeholder="Outcome Description" rows="1" disabled>{{ $out->outcome_des }}</textarea>
                </div>
                <div class="form-control" style="width:165px; height: 50px; overflow-y: scroll">
                @foreach($pos as $p)
                    <input type="checkbox" name="cout_map[][]" value="{{ $p->po_num }}" {{in_array($p->po_num,$values) ? 'checked':''}} disabled> {{ $p->po_num }} <br />
                @endforeach
                </div>
                <div class="col-md-2">
                <a href="{{ url('/dep-admin/edit-cp-out/'.$out->id) }}" class="btn btn-info"><i class="ti ti-edit"></i> Edit</a>
                </div>
              </div>
              <br>
              @endforeach

              <hr>
              <br>

              <h5>Course Rational</h5>
              @foreach($rational as $r)
              <div class="row">
              <div class="col-md-10">
              <textarea class="form-control" id="" name="c_rational" aria-describedby="emailHelp" placeholder="Rational Description" rows="4" disabled>{{ $r->rational_des }}</textarea>
              </div>
              <div class="col-md-2">
              <a href="{{ url('/dep-admin/edit-cp-rtn/'.$r->id) }}" class="btn btn-info"><i class="ti ti-edit"></i> Edit</a>
              </div>
              </div>
              @endforeach
          </div>
        </div>
      </div>
      
    
    
@endsection