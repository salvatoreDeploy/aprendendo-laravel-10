<h1>Novo Artigo:</h1>

<form action="{{route('web.store')}}" method="post">

    @csrf

    <input type="text" placeholder="Assunto" name="subject">
    <textarea name="content" cols="30" rows="5" placeholder="Conteudo"></textarea>
    <button type="submit">
        Publicar
    </button>
</form>
