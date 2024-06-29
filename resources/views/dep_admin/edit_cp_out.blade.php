@extends('layouts/app')
@section('content')
<div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Course Outcome</h5>
            <form method="post" action="{{ url('/dep-admin/update-cp-out/'.$outcome->id) }}">
            @csrf
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Outcome ID</label>
                <input type="text" value="{{ $outcome->outcome_id }}" class="form-control" id="" name="cout_num" aria-describedby="emailHelp" placeholder="Outcome ID">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Outcome Description</label>
                <textarea class="form-control" id="" name="cout_des" aria-describedby="emailHelp" placeholder="Outcome Description" rows="1" >{{ $outcome->outcome_des }}</textarea>
              </div>
              <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">CO-PO Mapping</label>
              <div class="form-control" style="width:250px; height: 130px; overflow-y: scroll">
                @php
                $values = json_decode($outcome->mapping,true);
                @endphp
                @foreach($pos as $p)
                    <input type="checkbox" name="cout_map[]" value="{{ $p->po_num }}" {{in_array($p->po_num,$values) ? 'checked':''}}> {{ $p->po_num }} <br />
                @endforeach
              </div>
              </div>
              <br>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection