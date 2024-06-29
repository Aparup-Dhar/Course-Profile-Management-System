<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/pdf_style.css" rel="stylesheet" >
    <title>{{$course->course_code}}({{$course->version}})</title>
    
</head>

<body>
    
    <div class="container">
    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('css/logo.png'))) }}">
    <h1>Department of {{$department->dep_name}}</h1>
    <p><b>Course Profile</b></p>
    </div>
    <p></p>

    <p><b>Course Title: </b>{{$course->name}}</p>
    <p><b>Course Code: </b>{{$course->course_code}}({{$course->version}})</p>
    <p><b>Credit: </b>{{$course->credit}} Credit Hours</p>
    <p><b>Course Type: </b>{{$course->type}}</p>
    <p></p>
    <p><b>Rational: </b></p>
    <p>{{$rational->rational_des}}</p>
    <p><b>Course Objectives: </b></p>
    @php
        $i=1;
        $j=1;
        $k=1;
    @endphp
    @foreach($objectives as $obj)
    <p><b>{{$i++}}. </b>{{$obj->objective_des}}</p>
    @endforeach

    <p><b>Course Outcomes (COs): </b></p>
    <p>Upon successful completion of this course, student will be able to:</p>
    <table>
    @foreach($outcomes as $out)
                <tr>
                    <td style="width:10%"><b>&nbsp;CO{{$j++}}:</b></td>
                    <td style="padding-left:5px">{{$out->outcome_des}}</td>
                </tr>
    @endforeach
    </table>

    <style>
    .page-break {
        page-break-after: always;
    }
    </style>

    <div class="page-break"></div>

    <p><b>Mapping of Course Outcomes (COs) & Program Outcomes (POs): </b></p>
    <table style="text-align: center;">
                <tr>
                    <td></td>
    @foreach($program_outcomes as $po)
                    <td style="padding-left:5px">{{$po->po_num}}</td>
    @endforeach
                </tr>
    @foreach($outcomes as $out)
    @php
    $map = json_decode($out->mapping,true);
    @endphp

                <tr>
                <td style="width:10%"><b>&nbsp;CO{{$k++}}:</b></td>
                @foreach($program_outcomes as $po)
                    <td>
                        @if(in_array($po->po_num,$map))
                        <div style="font-family: DejaVu Sans, sans-serif;">✔<div>
                        @endif
                    </td>
                @endforeach
                </tr>
    @endforeach

    </table>
    


</body>
</html>