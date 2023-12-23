@extends('web.layouts.web')

<h1>Editar Artigo: {{ $post->id }}</h1>

<x-alert />

<form action="{{route('web.update', $post->id)}}" method="post">
    @method('PUT')

    @include('web.components.inputsForm', [
        "post" => $post
])
</form>
