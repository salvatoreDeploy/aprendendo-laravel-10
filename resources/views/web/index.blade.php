@extends('web.layouts.web')

@section('title', 'Forum')

@section('header')
    @include('web.partials.header', compact('forums'))
@endsection

@section('content')

    @include('web.partials.contentTable')

    <x-pagination :paginator="$forums" :appends="$filter"/>

@endsection
