<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MecanoLink - Login</title>

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>

<div class="container">

    <div class="login-card">

        <div class="logo">
            <h1>Mecano<span>Link</span></h1>
            <p>Sistema de gestión mecánica</p>
        </div>

        {{-- MENSAJE DE ERROR --}}
        @if(session('error'))
            <p style="color:red; text-align:center;">
                {{ session('error') }}
            </p>
        @endif

        <form method="POST" action="/login">

            @csrf

            <div class="input-box">
                <label>Correo electrónico</label>
                <input 
                    type="email" 
                    name="email"
                    placeholder="Ingrese su correo"
                    required>
            </div>

            <div class="input-box">
                <label>Contraseña</label>
                <input 
                    type="password" 
                    name="password"
                    placeholder="Ingrese su contraseña"
                    required>
            </div>

            <button type="submit">
                Iniciar sesión
            </button>

            <p class="register">
                ¿No tienes una cuenta? 
                <a href="/register">Regístrate aquí</a>
            </p>
        </form>

    </div>

</div>

</body>
</html>