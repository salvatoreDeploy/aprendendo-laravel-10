@extends('web.layouts.web')

@section('title', 'Criar novo post')

@section('header')
    <h1 class="text-lg text-black-500">Detalhes do Post: {{ $post->subject }}</h1>
@endsection

@section('content')

<ul>
    <li>Assunto: {{ $post->subject }}</li>
    <li>Status: {{ $post->status }}</li>
    <li>Descrição: {{ $post->body }}</li>
</ul>

<form action="{{route('web.delete', $post->id)}}" method="post">
    @csrf()
    @method('DELETE')
    <button type="submit" class="shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded-full">Deletar</button>
</form>

@endsection
