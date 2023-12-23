@extends('web.layouts.web')

@section('title', 'Forum')

@section('header')
    <h1>Detalhes do Post: {{ $post->subject }}</h1>
@endsection

@section('content')
    <ul>
        <li>Assunto: {{ $post->subject }}</li>
        <li>Status: {{ $post->status }}</li>
        <li>Descrição: {{ $post->body }}</li>
    </ul>
@endsection


