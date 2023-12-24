@extends('web.layouts.web')

@section('title', 'Criar novo post')

@section('header')
    <h1 class="text-lg text-black-500">Novo Artigo:</h1>
@endsection

@section('content')

    <form action="{{route('web.store')}}" method="post">
        @include('web.components.inputsForm')
    </form>

@endsection
