@extends('web.layouts.web')

@section('title', 'Forum')

@section('header')
    <h1>Forum</h1>
@endsection

@section('content')

    <a href={{route('web.create')}}>Criar novo artigo</a>

    <table>
        <thead>
        <th>Assunto</th>
        <th>Status</th>
        <th>Descrição</th>
        <th></th>
        </thead>
        <tbody>
            @foreach ($forums->itemsData() as $forum)
                <tr>
                    <td>{{ $forum->subject }}</td>
                    <td>{{ getStatusForum("A") }}</td>
                    <td>{{ $forum->body }}</td>
                    <td>
                        <form action="{{ route('web.delete', $forum->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('web.show', $forum->id) }}">Ir</a>
                            <a href="{{ route('web.edit', $forum->id) }}">Editar</a>

                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <x-pagination :paginator="$forums" :appends="$filter"/>

@endsection
