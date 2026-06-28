<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MecanoLink - Registro</title>

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>

<div class="container">

    <div class="login-card">

        <div class="logo">
            <h1>Mecano<span>Link</span></h1>
            <p>Crear nueva cuenta</p>
        </div>

        {{-- Mensaje de error --}}
        @if(session('error'))
            <p style="color:red; text-align:center;">
                {{ session('error') }}
            </p>
        @endif

        <form method="POST" action="/register">

            @csrf

            <div class="input-box">
                <label>Nombre completo</label>
                <input 
                    type="text"
                    name="name"
                    placeholder="Ingrese su nombre"
                    required>
            </div>

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
                    placeholder="Cree una contraseña"
                    required>
            </div>

            <button type="submit">
                Registrarse
            </button>

            <p class="register">
                ¿Ya tienes cuenta?
                <a href="/login">Iniciar sesión</a>
            </p>

        </form>

    </div>

</div>

</body>
</html>