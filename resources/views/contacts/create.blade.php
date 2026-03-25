<form method="POST" action="/contacts">
    @csrf
    <input name="name" placeholder="Nombre">
    <input name="phone" placeholder="Teléfono">
    <input name="email" placeholder="Email">
    <button>Guardar</button>
</form>