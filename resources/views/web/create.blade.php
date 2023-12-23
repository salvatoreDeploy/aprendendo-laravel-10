
<h1>Novo Artigo:</h1>

@if($errors->any)
    @foreach($errors->all() as $error)
        <ul>
            <li>{{ $error }}</li>
        </ul>
    @endforeach
@endif

<form action="{{route('web.store')}}" method="post">
    @include('web.components.inputsForm')
</form>
