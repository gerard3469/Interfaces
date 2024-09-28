# Interfaces

## Descripción

Este es un proyecto web desarrollado en Laravel que permite la comunción con almacenes externos. El proyecto incluye características como autenticación, visualización de historial de operaciones, y la capacidad de realizar acciones como reenvíos.

## Requisitos

- PHP 7.3 o superior
- Composer
- MySQL o MariaDB

## Instalación

1. **Clonar el repositorio**

   ```bash
   git clone https://github.com/gerard3469/Interfaces.git
   cd Interfaces
    ```
2. **Ejecutar composer**
    ```bash
   composer install
    ```
3. **Configurar sus variables de entorno .env**
   ```bash
      cp .env.example .env
    ```

4. **Generar clave de aplicación**
   ```bash
      php artisan key:generate
    ```

5. **Ejecutar las migraciones**
    ```bash
   php artisan migrate
    ```
6. **Iniciar el servicio**
    ```bash
   php artisan serve
      ```
## API Endpoints

### **1. Registrar un usuario para autenticarse**

- **Método**: `POST`
- **URL**: `/api/register`
- **Descripción**: Crea usuario para poder obtener tokens.
- **Respuesta Exitosa (200 OK)**:
 ```yaml
{
    "name": "Username",
    "email": "gerard@example.com",
    "password": "aAa12345",
    "password_confirmation": "aAa12345"
}
```
### **2. Obtener token para autenticación de endpoints**

- **Método**: `POST`
- **URL**: `/api/login`
- **Descripción**: regresa token.
- **Respuesta Exitosa (200 OK)**:
 ```yaml
{
    "email": "gerard@example.com",
    "password": "aAa12345"
}
```
### **3. Guardar productos**

- **Método**: `POST`
- **URL**: `/api/setProduct`
- **Autenticación** `bearer`
- **Descripción**: Crea productos de prueba.
- **Respuesta Exitosa (200 OK)**:
 ```yaml
{
  "products": [
    {
      "code":"10001",
      "product": "Product 1",
      "description": "Description for Product 1",
      "unit": "Unit 1",
      "status": true
    },
    {
      "code":"10002",
      "product": "Product 2",
      "description": "Description for Product 2",
      "unit": "Unit 2",
      "status": false
    },
    {
      "code":"10003",
      "product": "Product 3",
      "description": "Description for Product 3",
      "unit": "Unit 3",
      "status": true
    }
    // Agrega más productos aquí
  ]
}
```
