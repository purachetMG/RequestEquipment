@extends('Layouts.Homelayout')
@section('title','dashboard-Admin')
@section('contents')

<h1>Request by {{ $user->firstname }}  {{ $user->lastname }}</h1>

<div class="row">
    <div class="col">
        <table class="table table-striped">
            <th style="width: 25%">หมายเลข</th>
                <th style="width: 25%">อุปกรณ์</th>
                <th style="width: 25%">รุ่น</th>
                <th style="width: 25%">ราคา</th>
            @php
                $x=0;
            @endphp
            @foreach($requestuser as $data)
            <tr>
                <td>@php echo $x+=1; @endphp</td>
                <td>{{ $data->equipment }} </td>
                <td>{{ $data->model }}</td>
                <td>
                    @if($data->equipmentmodel)
                   {{ $data->equipmentmodel->price }}
                   @else
                   N/A
                   @endif
                </td>

            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection