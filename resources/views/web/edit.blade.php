@extends('web.layouts.web')

@section('title', 'Editar Post')

@section('header')
    <h1 class="text-lg text-black-500">Editar Artigo: {{ $post->id }}</h1>
@endsection

@section('content')

<x-alert />

<form action="{{route('web.update', $post->id)}}" method="post">
    @method('PUT')

    @include('web.components.inputsForm', [
        "post" => $post
])
</form>

@endsection
