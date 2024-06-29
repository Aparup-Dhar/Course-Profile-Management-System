@extends('layouts/app')
@section('content')
<div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit PO</h5>
            <form method="post" action="{{ url('/dep-admin/update-po/'.$po->id) }}">
            @csrf
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">PO Number</label>
                <input value="{{ $po->po_num}}" type="text" class="form-control" id="" name="po_num" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">PO Title</label>
                <input value="{{ $po->po_title}}" type="text" class="form-control" id="" name="po_title">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">PO Description</label>
                <textarea class="form-control" id="" name="po_des" rows="3">{{ $po->po_des }}</textarea>
              </div>
              <br>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection