<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Contacto</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f6f9;
        }
        .form-box {
            width: 400px;
            margin: 60px auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 6px;
            border: 1px solid #ccc;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #2ecc71;
            border: none;
            color: white;
            border-radius: 6px;
        }
        a {
            display: block;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="form-box">
    <h2>➕ Nuevo Contacto</h2>

    <form method="POST" action="/contacts">
        @csrf
        <input name="name" placeholder="Nombre">
        <input name="phone" placeholder="Teléfono">
        <input name="email" placeholder="Email">
        <button>Guardar</button>
    </form>

    <a href="/contacts">← Volver</a>
</div>

</body>
</html>