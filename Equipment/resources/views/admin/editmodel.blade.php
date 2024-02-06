@extends('layouts.HomeLayout')
@section('title','request form')
    
@section('contents')
    <h1 class="mb-3">Request Form</h1>
    <div class="row">
        <form action="{{ route('updateModel', $equipment->id) }}" method="POST">
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
                    <label class="form-label" for="equipment">Edit equipment</label>
                    <select class="form-select" name="equipment" id="equipment">
                        @if($equipment->equipment=='mouse')
                        <option value="mouse">Mouse</option>
                        @elseif ($equipment->equipment=='keyboard')
                        <option value="keyboard">Keyboard</option>
                        @elseif($equipment->equipment=='moniter')
                        <option value="moniter">Moniter</option>
                        @endif
                      </select>
                </div>
                
                @if ($equipment->equipment == 'mouse')
                <div class="mb-3" id="mouseAdd" >
                    <table class="table table-bordered" id="mousemodel">
                        <tr>
                            <th>Mouse Model</th>
                            <th>Price</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="model" placeholder="Mouse model" value="{{ $equipment->model }}" class="form-control" /></td>
                            <td><input type="text" name="price" placeholder="Price" value="{{ $equipment->price }}" class="form-control" /></td>
                        </tr>
                    </table>
                </div>
                @endif
                @if ($equipment->equipment == 'moniter')
                <div class="mb-3" id="moniterAdd" >
                    <table class="table table-bordered" id="monitermodel">
                        <tr>
                            <th>Moniter Model</th>
                            <th>Price</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="model" placeholder="Moniter model" value="{{ $equipment->model }}" class="form-control" /></td>
                            <td><input type="text" name="price" placeholder="Price" value="{{ $equipment->price }}" class="form-control" /></td>
                        </tr>
                    </table>
                </div>
                @endif
                @if ($equipment->equipment == 'keyboard')
                <div class="mb-3" id="keyboardAdd" >
                    <table class="table table-bordered" id="keyboardmodel">
                        <tr>
                            <th>Keyboard Model</th>
                            <th>Price</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="model" placeholder="Keyboard model" value="{{ $equipment->model }}" class="form-control" /></td>
                            <td><input type="text" name="price" placeholder="Price" value="{{ $equipment->price }}" class="form-control" /></td>
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