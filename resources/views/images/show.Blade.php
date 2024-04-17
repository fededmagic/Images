@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')

<div class = "card mb-3">

    <div class = "row g-0">

        <div class = "col-md-4">
            <img src = "{{asset("/storage/" .  $viewData['image']->getUrl())}}" class = "img-fluid rounded-start">
        </div>

        <div class = "col-md-8">

            <div class = "card-body">

                <h5 class = "card-title">
                    {{$viewData['image']->getName()}}
                </h5>

                <p class = "card-text">
                    Descrizione: {{$viewData['image']->getDescription()}}
                </p>

                <p class = "card-text">
                    Voto: {{$viewData['image']->getValue()}}
                </p>

                <p class = "card-text">

                    <form method = "POST" action = "{{ route("cart.add", $viewData["image"]->getId()) }}">

                        @csrf
                        <div class = "row">

                            <div class = "col-auto">

                                <div class = "input-group col-auto">
                                    <label for = "qta" class = "input-group-text">Quantità</label>
                                    <input type = "number" max = 1000 min = 1 name = "qta" value = 1>
                                </div>
                                
                            </div>

                            <div class = "col-auto">
                                <button type = "submit" class = "btn btn-primary">Aggiungi al carrello</button>
                            </div>

                        </div>

                    </form>

                </p>

            </div>

        </div>

    </div>

</div>

@endsection
