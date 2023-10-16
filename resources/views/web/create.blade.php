<h1>Novo Artigo:</h1>

@if($errors->any)
    @foreach($errors->all() as $error)
        <ul>
            <li>{{ $error }}</li>
        </ul>
    @endforeach
@endif

<form action="{{route('web.store')}}" method="post">

    @csrf

    <input type="text" placeholder="Assunto" name="subject" value={{ old('subject') }}>
    <textarea name="content" cols="30" rows="5" placeholder="Conteudo">{{ old('content') }}</textarea>
    <button type="submit">
        Publicar
    </button>
</form>
