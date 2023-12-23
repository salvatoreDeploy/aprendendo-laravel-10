@extends('web.layouts.web')

@csrf

<input type="text" placeholder="Assunto" name="subject" value="{{ $post->subject ?? old('subject') }}">
<textarea name="body" cols="30" rows="5" placeholder="Conteudo">{{ $post->body ?? old('body') }}</textarea>
<button type="submit">
    Publicar
</button>
