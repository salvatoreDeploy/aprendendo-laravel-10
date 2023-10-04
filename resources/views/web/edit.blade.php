<h1>Editar Artigo: {{ $post->id }}</h1>

<form action="{{route('web.update', $post->id)}}" method="post">
    @method('PUT')
    @csrf

    <input type="text" placeholder="Assunto" name="subject" value="{{ $post->subject }}">
    <textarea name="content" cols="30" rows="5" placeholder="Conteudo" >{{ $post->content }}</textarea>
    <button type="submit">
        Editar
    </button>
</form>
