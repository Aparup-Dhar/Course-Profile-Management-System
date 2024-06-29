@extends('layouts/app')
@section('content')
<div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Create Program Outcomes</h5>
            <button type="button" class="btn btn-success" onclick="add_more()"><i class="ti ti-plus"></i> Add</button>
            <br>
            <br>
            <form method="post" action="{{ url('/dep-admin/save-po') }}">
            @csrf
            <div id="target">
              <div class="row">
                <div class="col-md-2">
                <input type="text" class="form-control" id="" name="po_num[]" aria-describedby="emailHelp" placeholder="PO Number">
                </div>
                <div class="col-md-2">
                <input type="text" class="form-control" id="" name="po_title[]" aria-describedby="emailHelp" placeholder="PO Title">
                </div>
                <div class="col-md-6">
                <textarea class="form-control" id="" name="po_des[]" aria-describedby="emailHelp" placeholder="PO Description" rows="1"></textarea>
                </div>
              </div>
              <br>
              
              </div>
              <br>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    
    
    <script>
            var cnt=0;
            function add_more(){
                cnt+=1; 

                html='\
                <div class="row" id="'+cnt+'">\
                <div class="col-md-2">\
                <input type="text" class="form-control" id="" name="po_num[]" aria-describedby="emailHelp" placeholder="PO Number">\
                </div>\
                <div class="col-md-2">\
                <input type="text" class="form-control" id="" name="po_title[]" aria-describedby="emailHelp" placeholder="PO Title">\
                </div>\
                <div class="col-md-6">\
                <textarea class="form-control" id="" name="po_des[]" aria-describedby="emailHelp" placeholder="PO Description" rows="1"></textarea>\
                </div>\
                <div class="col-md-2">\
                <button class="btn btn-danger" id="'+cnt+'" type="button" onclick="remove_btn(this)"><i class="ti ti-trash"></i> Delete</button>\
                </div>\
                <br>\
                <br>\
                <br>\
                </div>'
                var form = document.getElementById('target')
                form.insertAdjacentHTML('beforeend', html)
            }
            function remove_btn(button){
                let num = button.id
                var x = document.getElementById(num)
                x.remove()    
            }
        </script>
@endsection