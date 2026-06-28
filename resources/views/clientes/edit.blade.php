<!DOCTYPE html>

<html>

<head>

<title>Editar Cliente</title>

</head>


<body>


<h2>Editar Cliente</h2>



<form method="POST" 
action="/clientes/{{ $cliente->id }}">


@csrf

@method('PUT')


<input 
type="text"
name="nombre"
value="{{ $cliente->nombre }}">


<input 
type="text"
name="telefono"
value="{{ $cliente->telefono }}">


<input 
type="email"
name="correo"
value="{{ $cliente->correo }}">



<button>

Actualizar

</button>



</form>


</body>

</html>