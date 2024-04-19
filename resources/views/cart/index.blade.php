@extends("layouts.app")
@section("title", $viewData["title"])
@section("subtitle", $viewData["subtitle"])

@section("content")

<div class = "card">

    <div class = "card-header">

        Immagini nel carrello

    </div>

    <div class = "card-body">
  
        <table class = "table table-bordered table-striped text-center">

            <tr>
                <th>Id</th>
                <th>Immagine</th>
                <th>Nome</th>
                <th>Voto</th>
                <th>Quantità</th>
                <th>Totale</th>
                <th>Rimuovi</th>
            </tr>

            @foreach($viewData["images"] as $image) 
            <tr>
                <td>{{ $image->getId() }}</td>
                <td><image height = 60px src = "{{ asset("storage/" . $image->getUrl()) }}"></image></td>
                <td>{{ $image->getName() }}</td>
                <td>{{ $image->getValue() }}</td>
                <td>{{ session("images")[$image->getId()] }}</td>
                <td>{{ session("images")[$image->getId()] * 10 }}</td>
                <td>
                    <form method = "POST" action = "{{ route("cart.delete", $image->getId()) }}">
                        @csrf
                        @method("DELETE")
                        <button type = "submit" class = "btn bg-primary text-white mb-2">Cancella</button>
                    </form>
                </td>
            </tr>
            @endforeach

        </table>

        @if(count($viewData["images"]) > 0)
        <form method = "GET" action = "{{ route("cart.purchase") }}">
            @csrf
            <div class = "row">

                
                <div class = "col text-start">

                    <a class = "btn btn-outline-secondary mb-2">Totale: {{ $viewData["total"] }}</a>

                    @if($viewData["update_balance"] < 0) 
                        <a href = "{{ route("myaccount.balance") }}" class = "btn">Aggiungi fondi</a>
                    @endif

                </div>

                <div class = "col text-end">

                    <div class = "col">

                        <select class = "form-select" name = "tipologia" id = "tipologia">
                            <option selected value = "Portafoglio virtuale">Portafoglio virtuale</option>
                            <option value = "Paga alla consegna">Paga alla consegna</option>
                        </select>

                    </div><br>

                    <div class = "col-auto">
                        <button type = "submit" class = "btn bg-primary text-white mb-2">Acquista</button>

                        @if($viewData["update_balance"] < 0) 
                            <a href = "{{ route("myaccount.balance") }}" class = "btn bg-danger text-white mb-2">Aggiungi fondi</a>
                        @endif
                    </div>

                </div>

            </div>
        </form>

        <div class = "row mt-3">

            <div class = "col text-end">

                <form method = "POST" action = "{{ route("cart.clear") }}">

                    @csrf
                    @method("DELETE")
                    <button type = "submit" class = "btn bg-primary text-white mb-2">Svuota il carrello</button>
                    
                </form>

            </div>
            
        </div>
        @endif

    </div>

</div>

@endsection