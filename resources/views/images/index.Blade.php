@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')

<div class = "row">

    @foreach($viewData['images'] as $image) 
        
        <div class = "col-md-4 col-lg-3 mb-2">

            <div class = "card">
                <img src = "{{asset('/storage/' . $image->getUrl())}}" class = "card-img-top img-card">
                <div class = "card-body text-center">
                    <a class = "btn bg-primary text-white" href = "{{route('images.show', ['id' => $image->getId()])}}">{{$image->getName()}}</a>
                </div>
            </div>

        </div>
    
    @endforeach

</div>

@endsection