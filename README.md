# 🔧 MecanoLink

Sistema de gestión web para talleres mecánicos, desarrollado con Laravel. Permite administrar clientes, vehículos, órdenes de trabajo, técnicos e inventario desde un panel centralizado.

## ✨ Funcionalidades

- **Autenticación**: registro e inicio de sesión de usuarios
- **Panel principal**: resumen general del taller (clientes, vehículos, servicios activos, repuestos)
- **Gestión de clientes**: crear, editar y eliminar clientes sin salir del panel, con mensajes de confirmación
- **Módulo de vehículos**: registro de vehículos asociados a clientes
- **Órdenes de trabajo**: seguimiento de servicios en proceso
- **Técnicos**: registro de personal y especialidades
- **Inventario**: control de repuestos disponibles
- **Historial**: registro de trabajos realizados
- **Reportes**: resumen de servicios e ingresos estimados

## 🛠 Tecnologías

- **Backend**: Laravel 12, PHP 8.2
- **Base de datos**: MySQL
- **Frontend**: HTML, CSS, JavaScript (vanilla)

## 🚀 Instalación

1. Clona el repositorio:
```bash
   git clone https://github.com/TU-USUARIO/mecanolink.git
   cd mecanolink
```

2. Instala las dependencias:
```bash
   composer install
```

3. Copia el archivo de entorno y genera la clave de la aplicación:
```bash
   cp .env.example .env
   php artisan key:generate
```

4. Configura tu base de datos en el archivo `.env`:
5. Ejecuta las migraciones:
```bash
   php artisan migrate
```

6. Levanta el servidor local:
```bash
   php artisan serve
```

7. Abre `http://127.0.0.1:8000` en tu navegador.

## 📌 Estado del proyecto

En desarrollo activo — el módulo de clientes está completamente funcional. Los módulos de vehículos, órdenes de trabajo, técnicos e inventario están en construcción.

## 👤 Autor

Samuel, Richie, Karla
