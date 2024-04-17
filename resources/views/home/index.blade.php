@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')

<div class = "row">

    <div class = "col-md-6 col-lg-4 mb-2">
        <img src = "{{asset('storage/img01.jpg')}}" class = "img-fluid rounded">
    </div>

    <div class = "col-md-6 col-lg-4 mb-2">
        <img src = "{{asset('storage/img02.jpg')}}" class = "img-fluid rounded">
    </div>

    <div class = "col-md-6 col-lg-4 mb-2">
        <img src = "{{asset('storage/img03.jpg')}}" class = "img-fluid rounded">
    </div>

</div>

@endsection
