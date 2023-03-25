@extends('layouts.app')

@section('content')
    

    <div class="row justify-content-center">
        <div class="col-md-6">
        <h1>Pridanie pouzivatela</h1>
            <form method="POST" action="{{ route('add-admin') }}">
                @csrf

                <div class="form-group">
                    <label for="name">Meno pouzivatela:</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Pridat</button>
            </form>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        form {
            margin-top: 50px;
        }

        label {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        input {
            font-size: 1.2rem;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 100%;
        }
    </style>
@endsection
