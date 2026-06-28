hboard.blade · PHP
<!DOCTYPE html>
<html lang="es">
<head>
 
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 
<title>MecanoLink</title>
 
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
 
</head>
<body>
 
<div class="system">
 
    <!-- SIDEBAR -->
    <aside class="sidebar">
 
        <div class="logo">
            🔧 MecanoLink
        </div>
 
        <a onclick="mostrar('inicio')" class="active">
            🏠 Inicio
        </a>
 
        <a onclick="mostrar('clientes')">
            👥 Clientes
        </a>
 
        <a onclick="mostrar('vehiculos')">
            🚗 Vehículos
        </a>
 
        <a onclick="mostrar('ordenes')">
            🛠 Órdenes de trabajo
        </a>
 
        <a onclick="mostrar('tecnicos')">
            🔩 Técnicos
        </a>
 
        <a onclick="mostrar('inventario')">
            📦 Inventario
        </a>
 
        <a onclick="mostrar('historial')">
            📋 Historial
        </a>
 
        <a onclick="mostrar('reportes')">
            📊 Reportes
        </a>
 
        <form method="POST" action="/logout">
            @csrf
            <button class="logout">
                Cerrar sesión
            </button>
        </form>
 
    </aside>
 
    <!-- CONTENIDO -->
    <main>
 
        <!-- INICIO -->
        <section id="inicio" class="contenido activo">
 
            <h1>
                Panel principal
            </h1>
 
            <div class="cards">
 
                <div class="card">
                    <h2>35</h2>
                    <p>Clientes</p>
                </div>
 
                <div class="card">
                    <h2>18</h2>
                    <p>Vehículos</p>
                </div>
 
                <div class="card">
                    <h2>7</h2>
                    <p>Servicios activos</p>
                </div>
 
                <div class="card">
                    <h2>120</h2>
                    <p>Repuestos</p>
                </div>
 
            </div>
 
            <div class="panel">
 
                <h2>
                    Últimas órdenes
                </h2>
 
                <table>
 
                    <tr>
                        <th>Cliente</th>
                        <th>Vehículo</th>
                        <th>Estado</th>
                    </tr>
 
                    <tr>
                        <td>
                            Juan Pérez
                        </td>
                        <td>
                            Toyota Corolla
                        </td>
                        <td>
                            <span>
                                En proceso
                            </span>
                        </td>
                    </tr>
 
                    <tr>
                        <td>
                            María Díaz
                        </td>
                        <td>
                            Honda Civic
                        </td>
                        <td>
                            <span class="done">
                                Completado
                            </span>
                        </td>
                    </tr>
 
                </table>
 
            </div>
 
        </section>
 
        <!-- CLIENTES -->
        <section id="clientes" class="contenido">
 
            <h1>
                👥 Clientes
            </h1>
 
            @if(session('mensaje'))
                <div class="alerta alerta-exito">
                    {{ session('mensaje') }}
                </div>
            @endif
 
            <div class="panel">
 
                <!-- FORMULARIO: REGISTRAR (visible por defecto) -->
                <div id="form-registrar-wrapper">
 
                    <h2>
                        Registrar cliente
                    </h2>
 
                    <form method="POST" action="{{ route('clientes.store') }}">
                        @csrf
 
                        <div class="form-group">
                            <label>
                                Nombre
                            </label>
                            <input
                                type="text"
                                name="nombre"
                                placeholder="Nombre del cliente"
                                required>
                        </div>
 
                        <div class="form-group">
                            <label>
                                Teléfono
                            </label>
                            <input
                                type="text"
                                name="telefono"
                                placeholder="Teléfono"
                                required>
                        </div>
 
                        <div class="form-group">
                            <label>
                                Correo electrónico
                            </label>
                            <input
                                type="email"
                                name="correo"
                                placeholder="Correo electrónico"
                                required>
                        </div>
 
                        <button type="submit">
                            Guardar cliente
                        </button>
                    </form>
 
                </div>
 
                <!-- FORMULARIO: EDITAR (oculto hasta que se haga click en "Editar") -->
                <div id="form-editar-wrapper" style="display: none;">
 
                    <h2>
                        Editar cliente
                    </h2>
 
                    <form id="form-editar-cliente" method="POST" action="">
                        @csrf
                        @method('PUT')
 
                        <div class="form-group">
                            <label>
                                Nombre
                            </label>
                            <input
                                type="text"
                                name="nombre"
                                id="editar-nombre"
                                required>
                        </div>
 
                        <div class="form-group">
                            <label>
                                Teléfono
                            </label>
                            <input
                                type="text"
                                name="telefono"
                                id="editar-telefono"
                                required>
                        </div>
 
                        <div class="form-group">
                            <label>
                                Correo electrónico
                            </label>
                            <input
                                type="email"
                                name="correo"
                                id="editar-correo"
                                required>
                        </div>
 
                        <button type="submit">
                            Guardar cambios
                        </button>
 
                        <button type="button" onclick="cancelarEdicion()">
                            Cancelar
                        </button>
                    </form>
 
                </div>
 
                <hr>
 
                <h2>
                    Clientes registrados
                </h2>
 
                <table>
 
                    <thead>
                        <tr>
                            <th>
                                Nombre
                            </th>
                            <th>
                                Teléfono
                            </th>
                            <th>
                                Correo
                            </th>
                            <th>
                                Acciones
                            </th>
                        </tr>
                    </thead>
 
                    <tbody>
 
                        @if($clientes->count() > 0)
 
                            @foreach($clientes as $cliente)
 
                                <tr>
                                    <td>
                                        {{ $cliente->nombre }}
                                    </td>
                                    <td>
                                        {{ $cliente->telefono }}
                                    </td>
                                    <td>
                                        {{ $cliente->correo }}
                                    </td>
                                    <td>
                                        <button
                                            type="button"
                                            class="btn-editar"
                                            data-url="{{ route('clientes.update', $cliente->id_cliente) }}"
                                            data-nombre="{{ $cliente->nombre }}"
                                            data-telefono="{{ $cliente->telefono }}"
                                            data-correo="{{ $cliente->correo }}"
                                            onclick="editarCliente(this)">
                                            Editar
                                        </button>
 
                                        <form method="POST"
                                            action="{{ route('clientes.destroy', $cliente->id_cliente) }}"
                                            style="display:inline">
                                            @csrf
                                            @method('DELETE')
 
                                            <button type="submit"
                                                onclick="return confirm('¿Eliminar cliente?')">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
 
                            @endforeach
 
                        @else
 
                            <tr>
                                <td colspan="4">
                                    No hay clientes registrados
                                </td>
                            </tr>
 
                        @endif
 
                    </tbody>
 
                </table>
 
            </div>
 
        </section>
 
        <!-- VEHICULOS -->
        <section id="vehiculos" class="contenido">
 
            <h1>
                🚗 Vehículos
            </h1>
 
            <div class="panel">
 
                <table>
 
                    <tr>
                        <th>Placa</th>
                        <th>Modelo</th>
                        <th>Cliente</th>
                    </tr>
 
                    <tr>
                        <td>A12345</td>
                        <td>Honda Civic</td>
                        <td>Carlos</td>
                    </tr>
 
                </table>
 
            </div>
 
        </section>
 
        <!-- ORDENES -->
        <section id="ordenes" class="contenido">
 
            <h1>
                🛠 Órdenes de trabajo
            </h1>
 
            <div class="panel">
 
                <button>
                    Nueva orden
                </button>
 
                <table>
 
                    <tr>
                        <th>Número</th>
                        <th>Servicio</th>
                        <th>Estado</th>
                    </tr>
 
                    <tr>
                        <td>#001</td>
                        <td>Cambio de aceite</td>
                        <td>
                            <span>
                                Pendiente
                            </span>
                        </td>
                    </tr>
 
                </table>
 
            </div>
 
        </section>
 
        <!-- TECNICOS -->
        <section id="tecnicos" class="contenido">
 
            <h1>
                🔩 Técnicos
            </h1>
 
            <div class="panel">
 
                <table>
 
                    <tr>
                        <th>Nombre</th>
                        <th>Especialidad</th>
                    </tr>
 
                    <tr>
                        <td>
                            Pedro
                        </td>
                        <td>
                            Mecánica general
                        </td>
                    </tr>
 
                </table>
 
            </div>
 
        </section>
 
        <!-- INVENTARIO -->
        <section id="inventario" class="contenido">
 
            <h1>
                📦 Inventario
            </h1>
 
            <div class="panel">
 
                <table>
 
                    <tr>
                        <th>Repuesto</th>
                        <th>Cantidad</th>
                    </tr>
 
                    <tr>
                        <td>Aceite motor</td>
                        <td>25</td>
                    </tr>
 
                </table>
 
            </div>
 
        </section>
 
        <!-- HISTORIAL -->
        <section id="historial" class="contenido">
 
            <h1>
                📋 Historial
            </h1>
 
            <div class="panel">
 
                <table>
 
                    <tr>
                        <th>Vehículo</th>
                        <th>Trabajo</th>
                    </tr>
 
                    <tr>
                        <td>Nissan Sentra</td>
                        <td>Frenos</td>
                    </tr>
 
                </table>
 
            </div>
 
        </section>
 
        <!-- REPORTES -->
        <section id="reportes" class="contenido">
 
            <h1>
                📊 Reportes
            </h1>
 
            <div class="panel">
 
                <h3>
                    Resumen del taller
                </h3>
 
                <p>
                    Servicios realizados: 45
                </p>
 
                <p>
                    Ingresos estimados: RD$150,000
                </p>
 
            </div>
 
        </section>
 
    </main>
 
</div>
 
<script>
 
    // ============================================
    // NAVEGACIÓN ENTRE SECCIONES (igual que siempre)
    // ============================================
    function mostrar(id){
        let secciones = document.querySelectorAll('.contenido');
 
        secciones.forEach(function(item){
            item.classList.remove('activo');
        });
 
        document.getElementById(id)
            .classList.add('activo');
    }
 
 
    // ============================================
    // EDITAR CLIENTE: llena el formulario oculto
    // y lo muestra en lugar del de "Registrar"
    // ============================================
    function editarCliente(boton) {
        document.getElementById('form-editar-cliente').action = boton.dataset.url;
        document.getElementById('editar-nombre').value = boton.dataset.nombre;
        document.getElementById('editar-telefono').value = boton.dataset.telefono;
        document.getElementById('editar-correo').value = boton.dataset.correo;
 
        document.getElementById('form-registrar-wrapper').style.display = 'none';
        document.getElementById('form-editar-wrapper').style.display = 'block';
    }
 
    function cancelarEdicion() {
        document.getElementById('form-editar-wrapper').style.display = 'none';
        document.getElementById('form-registrar-wrapper').style.display = 'block';
    }
 
 
    // ============================================
    // AL CARGAR LA PÁGINA: si la URL trae
    // ?seccion=clientes (tras un redirect), abre
    // esa sección automáticamente
    // ============================================
    document.addEventListener('DOMContentLoaded', function () {
        const params = new URLSearchParams(window.location.search);
        const seccion = params.get('seccion');
 
        if (seccion && document.getElementById(seccion)) {
            mostrar(seccion);
        }
 
        // Ocultar el mensaje de éxito automáticamente después de 4 segundos
        const alerta = document.querySelector('.alerta-exito');
        if (alerta) {
            setTimeout(function () {
                alerta.style.display = 'none';
            }, 4000);
        }
    });
 
</script>
 
</body>
</html>
 