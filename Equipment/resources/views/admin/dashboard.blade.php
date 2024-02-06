@extends('Layouts.Homelayout')
@section('title','dashboard-Admin')
@section('contents')

<h1>Welcome {{ auth()->user()->role }}</h1>

<div class="row">
    <div class="col">
        <table class="table table-striped">
            <th style="width: 20%">No.</th>
            <th style="width: 20%">Name</th>
            <th style="width: 20%">Model</th>
            <th style="width: 20%">Total price</th>
            <th style="width: 20%">Action</th>
            @php
                $x=0;
            @endphp
            @foreach($users as $data)
            <tr>
                <td>@php echo $x+=1; @endphp</td>
                <td>{{ $data->firstname }} {{ $data->lastname }}</td>
                <td>{{ $data->email }}</td>
                <td>
                    
                        {{ $data->totalPrice }}
                    
                </td>
                <td>
                    <div style="display: flex; align-items: center;">
                    <a href="{{ route('userRequest', $data->id) }}" class="btn btn-warning ">details</a>                   
                    </div>
                </td>

            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection