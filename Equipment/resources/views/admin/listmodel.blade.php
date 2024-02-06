@extends('Layouts.Homelayout')
@section('title','dashboard-Admin')
@section('contents')

<h1>List Model</h1>
<br>
@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
<a href="{{ route('createmodel') }}" class="btn btn-success">Add model</a>
<div class="row">
    <div class="col">
        <table class="table table-striped">
            <th style="width: 25%">No</th>
            <th style="width: 25%">Equipment</th>
            <th style="width: 25%">Model</th>
            <th style="width: 25%">Price</th>
            <th style="width: 25%">Action</th>
            @php
                $x=0;
            @endphp
            @foreach($listmodel as $data)
            <tr>
                <td>@php echo $x+=1; @endphp</td>
                <td>{{ $data->equipment }}</td>
                <td>{{ $data->model }}</td>
                <td>{{ $data->price }}</td>
                <td>
                    <div style="display: flex; align-items: center;">
                    <a href="{{ route('editmodel', $data->id) }}" class="btn btn-warning ">Edit</a>
                    <form action="{{ route('deletemodel', $data->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                    </form>                 
                    </div>
                </td>

            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection