@extends('layouts.Homelayout')
@section('title','dashboard')
    
@section('contents')
    <h1>Welcome {{ auth()->user()->role }}</h1>
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <th style="width: 25%">No.</th>
                <th style="width: 25%">Equipment</th>
                <th style="width: 25%">Model</th>
                <th style="width: 25%">Action</th>
                @php
                    $x=0;
                @endphp
                @foreach($dataRequest as $data)
                <tr>
                    <td>@php echo $x+=1; @endphp</td>
                    <td>{{ $data->equipment }}</td>
                    <td>{{ $data->model }}</td>
                    <td>
                        <div style="display: flex; align-items: center;">
                        <a href="{{ route('editRequest', $data->id) }}" class="btn btn-warning ">แก้ไข</a>
                        <form action="{{ route('deleteRequest', $data->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" class="btn btn-danger">ลบ</button>
                        </form>
                        </div>
                    </td>

                </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection