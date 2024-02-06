@extends('layouts.HomeLayout')
@section('title','request form')
    
@section('contents')
    <h1 class="mb-3">Request Form</h1>
    <div class="row">
        <form action="{{ route('updateRequest',$datarequest->id) }}" method="POST">
            @csrf
            @method('PUT')
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col border-2">
                <div class="mb-3">
                    <label class="form-label" for="equipment">Choose your request</label>
                    <select class="form-select" name="equipment" id="equipment">
                        @if($datarequest->equipment=='mouse')
                        <option value="mouse">Mouse</option>
                        @elseif ($datarequest->equipment=='keyboard')
                        <option value="keyboard">Keyboard</option>
                        @elseif($datarequest->equipment=='moniter')
                        <option value="moniter">Moniter</option>
                        @endif
                      </select>
                </div>
                
                @if ($datarequest->equipment == 'mouse' or $datarequest->equipment == 'keyboard')
                <div class="mb-3" id="m&kAdd">
                    <label for="modellist" class="form-label">Choose model</label>
                    <input class="form-control" name="model" list="model" id="modellist" value="{{ $datarequest->model }}" >
                    <datalist id="model">
                    <option value="San Francisco">
                    <option value="New York">
                    <option value="Seattle">
                    <option value="Los Angeles">
                    <option value="Chicago">
                    </datalist>
                </div>
                @endif
                @if ($datarequest->equipment == 'moniter')
                <div class="mb-3" id="moniterAdd" >
                    <table class="table table-bordered" id="monitermodel">
                        <tr>
                            <th>Moniter Model</th>
                          
                        </tr>
                        <tr>
                            <td><input type="text" name="model" placeholder="Moniter model" value="{{ $datarequest->model }}" class="form-control" />
                            </td>
                        </tr>
                    </table>
                </div>
                @endif
            </div>
            <button class="btn btn-success">submit</button>
        </form>
    </div>



    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    
@endsection