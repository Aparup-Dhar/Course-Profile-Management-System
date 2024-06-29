@extends('layouts/app')
@section('content')

<div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Create Course Profile for {{$course->name}}</h5>
            <button type="button" class="btn btn-success" onclick="add_more()"><i class="ti ti-plus"></i> Add Objective</button>
            <br>
            <br>
            <form method="post" action="{{ url('/dep-admin/save-cp-select/'.$course->id) }}">
            @csrf
            <div id="target">
              <br>
              <h5>Course Objectives</h5>
              <div class="row">
                <div class="col-md-2">
                <input type="text" class="form-control" id="" name="cobj_num[]" aria-describedby="emailHelp" placeholder="Objective ID">
                </div>
                <div class="col-md-8">
                <textarea class="form-control" id="" name="cobj_des[]" aria-describedby="emailHelp" placeholder="Objective Description" rows="1"></textarea>
                </div>
              </div>
              <br>
              </div>


              <hr>
              <br>
              <button type="button" class="btn btn-warning" onclick="add_more_out()"><i class="ti ti-plus"></i> Add Outcome</button>


              
              <div id="target2">
              <br>
              <h5>Course Outcomes</h5>
              <div class="row">
                <div class="col-md-2">
                <input type="text" class="form-control" id="" name="cout_num[]" aria-describedby="emailHelp" placeholder="Outcome ID">
                </div>
                <div class="col-md-6">
                <textarea class="form-control" id="" name="cout_des[]" aria-describedby="emailHelp" placeholder="Outcome Description" rows="1"></textarea>
                </div>
                <div class="form-control" style="width:165px; height: 50px; overflow-y: scroll">
                @foreach($pos as $p)
                    <input type="checkbox" name="cout_map[0][]" value="{{ $p->po_num }}"> {{ $p->po_num }} <br />
                @endforeach
                </div>
              </div>
              <br>
              </div>

              <hr>

              <div class="col-md-11">
              <h5>Course Rational</h5>
              <textarea class="form-control" id="" name="c_rational" aria-describedby="emailHelp" placeholder="Rational Description" rows="4"></textarea>
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
                <input type="text" class="form-control" id="" name="cobj_num[]" aria-describedby="emailHelp" placeholder="Objective ID">\
                </div>\
                <div class="col-md-8">\
                <textarea class="form-control" id="" name="cobj_des[]" aria-describedby="emailHelp" placeholder="Objective Description" rows="1"></textarea>\
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
        <script>
            var cnt2=0;
            function add_more_out(){
                cnt2+=1; 

                html='\
                <div class="row" id="'+cnt2+'">\
                <div class="col-md-2">\
                <input type="text" class="form-control" id="" name="cout_num[]" aria-describedby="emailHelp" placeholder="Outcome ID">\
                </div>\
                <div class="col-md-6">\
                <textarea class="form-control" id="" name="cout_des[]" aria-describedby="emailHelp" placeholder="Outcome Description" rows="1"></textarea>\
                </div>\
                <div class="form-control" style="width:165px; height: 50px; overflow-y: scroll">\
                @foreach($pos as $p)\
                    <input type="checkbox" name="cout_map['+cnt2+'][]" value="{{ $p->po_num }}"> {{ $p->po_num }} <br />\
                @endforeach\
                </div>\
                <div class="col-md-2">\
                <button class="btn btn-danger" id="'+cnt2+'" type="button" onclick="remove_btn_out(this)"><i class="ti ti-trash"></i> Delete</button>\
                </div>\
                <br>\
                <br>\
                <br>\
                </div>'
                var form = document.getElementById('target2')
                form.insertAdjacentHTML('beforeend', html)
            }
            function remove_btn_out(button){
                let num = button.id
                var x = document.getElementById(num)
                x.remove()    
            }
        </script>
@endsection