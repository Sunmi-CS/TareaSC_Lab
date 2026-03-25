<form method="POST" action="/contacts/{{ $contact->id }}">
    @csrf
    @method('PUT')

    <input name="name" value="{{ $contact->name }}">
    <input name="phone" value="{{ $contact->phone }}">
    <input name="email" value="{{ $contact->email }}">

    <button>Actualizar</button>
</form>