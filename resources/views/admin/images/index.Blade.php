@extends('layouts.admin')
@section('title', $viewData['title'])

@section('content')


<div class = "card">

    <div class = "card-header">

        <h5>Aggiungere immagini</h5>

    </div>

    <div class = "card-body">


        @if($errors->any())
        <ul class = "alert alert-danger list-unstyled">

            @foreach($errors->all() as $error)
                <li>- {{ $error }} </li>
            @endforeach

        </ul>
        @endif

        <form method = "POST" action = "{{ route('admin.images.store') }}" enctype = "multipart/form-data">

            @csrf
            <div class = "row">
                <div classs = "col">
                    <div class = "mb-3 row">

                        <label class = "col-lg-2 col-md-6 col-sm-12 col-form-label">Name:</label>
                    
                        <div class = "col-lg-10 col-md-6 col-sm-12">
                            <input type = "text" value = "{{old('name')}}" name = "name" class = "form-control">
                        </div>

                    </div>
                </div>
                <div classs = "col">
                    <div class = "mb-3 row">
                    
                        <label class = "col-lg-2 col-md-6 col-sm-12 col-form-label">Value:</label>

                        <div class = "col-lg-10 col-md-6 col-sm-12">
                            <input type = "number" value = "{{old('value')}}" name = "value" class = "form-control">
                        </div>

                    </div>
                </div>
            </div>
            <div class = "row">
                <div classs = "col">
                    <div class = "mb-3 row">

                        <label class = "col-lg-2 col-md-6 col-sm-12 col-form-label">Image:</label>
                    
                        <div class = "col-lg-10 col-md-6 col-sm-12">
                            <input type = "file" value = "{{old('url')}}" name = "url" class = "form-control">
                        </div>

                    </div>
                </div>
            </div>

            <div class = "row">
                <div classs = "col">
                    <div class = "mb-3 row">

                        <label class = "col-lg-2 col-md-6 col-sm-12 col-form-label">Description:</label>
                    
                        <div class = "col-lg-10 col-md-6 col-sm-12">
                            <textarea value = "{{old('description')}}" name = "description" class = "form-control"></textarea>
                        </div>

                    </div>
                </div>
            </div>

            <div class = "row">
                <div classs = "col">
                    <div class = "mb-3 row">

                        <div class = "col-lg-10 col-md-6 col-sm-12">
                            <button name = "btnSubmit" class = "btn btn-primary">Salva</button>
                        </div>

                    </div>
                </div>
            </div>

        </form>
    
    </div>

</div>

<br>

<div class = "card">

    <div class = "card-header">

        <h5>Tabella gestione immagini</h5>

    </div>

    <div class = "card-body">

        <table class = "table table-bordered table-striped">

            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

            @foreach($viewData['images'] as $image) 

                <tr>
                    <td>{{$image->getId()}}</td>
                    <td>{{$image->getName()}}</td>
                    <td>
                        <a href = "{{route("admin.images.edit", $image->getId())}}">
                            <button class = "bg btn-primary rounded">Edit</button>
                        </a>
                    </td>
                    <td>
                        <form method = "POST" action = "{{route("admin.images.delete", $image->getId())}}">
                            <button class = "bg btn-primary rounded">Delete</button>
                            @csrf
                            @method("DELETE")
                        </form>
                    </td>
                </tr>
            
            @endforeach

        </table>

    </div>

</div>

@endsection