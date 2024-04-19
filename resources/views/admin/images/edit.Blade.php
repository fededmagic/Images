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

        <form method = "POST" action = "{{ route('admin.images.update', $viewData['image']->getId()) }}" enctype = "multipart/form-data">

            @csrf
            @method("PUT")
            <div class = "row">
                <div classs = "col">
                    <div class = "mb-3 row">

                        <label class = "col-lg-2 col-md-6 col-sm-12 col-form-label">Name:</label>
                    
                        <div class = "col-lg-10 col-md-6 col-sm-12">
                            <input type = "text" value = "{{ $viewData["image"]->getName() }}" name = "name" class = "form-control">
                        </div>

                    </div>
                </div>
                <div classs = "col">
                    <div class = "mb-3 row">
                    
                        <label class = "col-lg-2 col-md-6 col-sm-12 col-form-label">Value:</label>

                        <div class = "col-lg-10 col-md-6 col-sm-12">
                            <input type = "number" value = "{{ $viewData["image"]->getValue() }}" name = "value" class = "form-control">
                        </div>

                    </div>
                </div>
            </div>
            <div class = "row">
                <div classs = "col">
                    <div class = "mb-3 row">

                        <label class = "col-lg-2 col-md-6 col-sm-12 col-form-label">Image:</label>
                    
                        <div class = "col-lg-10 col-md-6 col-sm-12">
                            <input type = "file"  name = "url" class = "form-control">
                        </div>

                    </div>
                </div>
            </div>

            <div class = "row">
                <div classs = "col">
                    <div class = "mb-3 row">

                        <label class = "col-lg-2 col-md-6 col-sm-12 col-form-label">Description:</label>
                    
                        <div class = "col-lg-10 col-md-6 col-sm-12">
                            <textarea name = "description" class = "form-control">{{ $viewData["image"]->getDescription() }}</textarea>
                        </div>

                    </div>
                </div>
            </div>

            <div class = "row">
                <div classs = "col">
                    <div class = "mb-3 row">

                        <div class = "col-lg-10 col-md-6 col-sm-12">
                            <input type = "checkbox" class = "form-check-input" name = "availability" value = 0
                            @if($viewData["image"]->getAvailability() == false)
                                checked
                            @endif
                            >
                            <label>Disabilita</label>
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


@endsection