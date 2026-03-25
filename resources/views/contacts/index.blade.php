<h1>Contactos</h1>

<a href="/contacts/create">Nuevo</a>

@foreach($contacts as $c)
    <p>{{ $c->name }} - {{ $c->phone }}</p>

    <a href="/contacts/{{ $c->id }}/edit">Editar</a>

    <form method="POST" action="/contacts/{{ $c->id }}">
        @csrf
        @method('DELETE')
        <button>Eliminar</button>
    </form>
@endforeach