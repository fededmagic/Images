@extends("layouts.app")
@section("title", $viewData["title"])
@section("subtitle", $viewData["subtitle"])

@section("content")

@foreach($viewData["orders"] as $order)
<div class = "card mb-4">

    <div class = "card-header">

        Ordine #{{ $order->getId() }}

    </div>

    <div class = "card-body">

        <p>Ordine effetturato in data {{ $order->getCreatedAt() }}</p>
        <p>Prezzo totale: {{ $order->getTotal() }}</p>
  
        <table class = "table table-bordered table-striped text-center">

            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Prezzo</th>
                <th>Quantità</th>
            </tr>

            @foreach($order->getItems() as $item) 
            <tr>
                <td>{{ $item->getImage()->getId() }}</td>
                <td>{{ $item->getImage()->getName() }}</td>
                <td>10</td>
                <td>{{ $item->getQuantity() }}</td>
            </tr>
            @endforeach

        </table>

    </div>

</div>

@endforeach

@endsection