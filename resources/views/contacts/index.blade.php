<!DOCTYPE html>
<html>
<head>
    <title>Contactos</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f6f9;
            margin: 0;
        }
        .container {
            width: 80%;
            margin: 40px auto;
        }
        .card {
            background: white;
            padding: 20px;
            margin-bottom: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .btn {
            padding: 8px 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn-primary { background: #3498db; color: white; }
        .btn-warning { background: #f39c12; color: white; }
        .btn-danger { background: #e74c3c; color: white; }
        .top {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <p>Bienvenido, {{ auth()->user()->name }} 👋</p>
    <div class="top">
        <h2>📒 Mis Contactos</h2>
        <a href="/contacts/create" class="btn btn-primary">+ Nuevo</a>
    </div>

    @foreach($contacts as $c)
        <div class="card">
            <h3>{{ $c->name }}</h3>
            <p>📞 {{ $c->phone }}</p>
            <p>📧 {{ $c->email }}</p>

            <a href="/contacts/{{ $c->id }}/edit" class="btn btn-warning">Editar</a>

            <form method="POST" action="/contacts/{{ $c->id }}" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    @endforeach
</div>

</body>
</html>