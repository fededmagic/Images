@extends("layouts.app")
@section("title", $viewData["title"])
@section("subtitle", $viewData["subtitle"])

@section("content")

<div class = "card">

    <div class = "card-header">

        Ordine completato con successo

    </div>

    <div class = "card-header">

        Identificativo ordine - <b>{{ $viewData["order"]->getId() }}</b><br>
        Totale da pagare alla consegna - €<b>{{ $viewData["order"]->getTotal() }}</b><br>
        Consegna prevista - 11/09/2001<br>
        {{ $viewData["balance"] }} <br>
        {{ $viewData["strPagamento"] }}

    </div>

</div>

@endsection