@extends("layouts.app")
@section("title", $viewData["title"])
@section("subtitle", $viewData["subtitle"])

@section("content")

<div class = "card">

    <div class = "card-header">
        <p>Importo attuale: € {{ $viewData["balance"] }}</p>
    </div>  

    <div class = "card-body">
        
        <form method = "POST" action = "{{ route("myaccount.update_balance") }}">

            @csrf
            <label>Importo:</label>
            <input type = "number" min = 0 name = "importo"></input>
            <button class = "btn btn-primary">Aggiungi fondi</button>

        </form>

    </div>  

</div>


@endsection