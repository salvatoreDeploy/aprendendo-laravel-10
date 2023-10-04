<h1>Forum</h1>

<a href={{route('web.create')}}>Criar novo artigo</a>

<table>
    <thead>
        <th>Assunto</th>
        <th>Status</th>
        <th>Descrição</th>
        <th></th>
    </thead>
    <tbody>
        @foreach ($forums as $forum)
            <tr>
                <td>{{ $forum->subject}}</td>
                <td>{{ $forum->status}}</td>
                <td>{{ $forum->content}}</td>
                <td>
                    <a href="{{ route('web.show', $forum->id) }}">Ir</a>
                    <a href="{{ route('web.edit', $forum->id) }}">Editar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


