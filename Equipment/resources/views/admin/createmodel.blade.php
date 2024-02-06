@extends('layouts.HomeLayout')
@section('title','request form')
    
@section('contents')
    <h1 class="mb-3">Create Model</h1>
    <div class="row">
        <form action="{{ route('insertmodel') }}" method="POST">
            @csrf
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
                        <option selected>Open this select menu</option>
                        <option value="mouse">Mouse</option>
                        <option value="keyboard">Keyboard</option>
                        <option value="moniter">Moniter</option>
                      </select>
                </div>
                
                <div class="mb-3" id="mouseAdd" style="display: none">
                    <table class="table table-bordered" id="mousemodel">
                        <tr>
                            <th>Mouse Model</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="mouse[0][model]" placeholder="Mouse model" class="form-control"/></td>
                            <td><input type="text" name="mouse[0][price]" placeholder="Price" class="form-control" /></td>
                            <td><button type="button" name="add" id="addmouse" class="btn btn-outline-primary">Add Subject</button></td>
                        </tr>
                    </table>
                </div>

                <div class="mb-3" id="keyboardAdd" style="display: none">
                    <table class="table table-bordered" id="keyboardmodel">
                        <tr>
                            <th>Keyboard Model</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="keyboard[0][model]" placeholder="Keyboard model" class="form-control" /></td>
                            <td><input type="text" name="keyboard[0][price]" placeholder="Price" class="form-control" /></td>
                            <td><button type="button" name="add" id="addkeyboard" class="btn btn-outline-primary">Add Subject</button></td>
                        </tr>
                    </table>
                </div>

                <div class="mb-3" id="moniterAdd" style="display: none">
                    <table class="table table-bordered" id="monitermodel">
                        <tr>
                            <th>Moniter Model</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="moniter[0][model]" placeholder="Moniter model" class="form-control" /></td>
                            <td><input type="text" name="moniter[0][price]" placeholder="Price" class="form-control" /></td>
                            <td><button type="button" name="add" id="addmodel" class="btn btn-outline-primary">Add Subject</button></td>
                        </tr>
                    </table>
                </div>
            </div>
            <button class="btn btn-success">submit</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const equipmentSelect = document.getElementById('equipment');
            const moniterAddSection = document.getElementById('moniterAdd');
            const mouseAddSection = document.getElementById('mouseAdd');
            const keyboardAddSection = document.getElementById('keyboardAdd');
        
            equipmentSelect.addEventListener('change', function () {
        
                moniterAddSection.style.display = 'none';
                mouseAddSection.style.display = 'none';
                keyboardAddSection.style.display = 'none';

                switch (this.value) {
                    case 'moniter':
                        moniterAddSection.style.display = 'block';
                        break;
                    case 'mouse':
                        mouseAddSection.style.display = 'block';
                        break;
                    case 'keyboard': 
                        keyboardAddSection.style.display = 'block';
                        break;
                    default:
                        break;
                }
            });
        });
        </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        var i = 0;
        $("#addmodel").click(function () {
            ++i;
            $("#monitermodel").append('<tr>' +
                '<td><input type="text" name="moniter[' + i + '][model]" placeholder="Moniter model" class="form-control" /></td>' +
                '<td><input type="text" name="moniter[' + i + '][price]" placeholder="Price" class="form-control" /></td>' +
                '<td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td>' +
                '</tr>');
        });

        $("#addmouse").click(function () {
            ++i;
            $("#mousemodel").append('<tr>' +
                '<td><input type="text" name="mouse[' + i + '][model]" placeholder="Mouse model" class="form-control" /></td>' +
                '<td><input type="text" name="mouse[' + i + '][price]" placeholder="Price" class="form-control" /></td>' +
                '<td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td>' +
                '</tr>');
        });

        $("#addkeyboard").click(function () {
            ++i;
            $("#keyboardmodel").append('<tr>' +
                '<td><input type="text" name="keyboard[' + i + '][model]" placeholder="Keyboard model" class="form-control" /></td>' +
                '<td><input type="text" name="keyboard[' + i + '][price]" placeholder="Price" class="form-control" /></td>' +
                '<td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td>' +
                '</tr>');
        });

        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
        });
    </script>
@endsection