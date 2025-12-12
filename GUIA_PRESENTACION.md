# 🎤 Libreto de Presentación: Arquitectura Cliente-Servidor

## 1. Introducción (Concepto General)
**"Buenos días/tardes. Hoy vamos a demostrar una implementación práctica de la Arquitectura Cliente-Servidor distribuida en dos nodos."**

*   **El Problema:** "Normalmente, cuando desarrollamos, tenemos todo en una sola máquina (Localhost). Pero en el mundo real, los sistemas están distribuidos."
*   **La Solución:** "Hemos separado el sistema en dos partes físicas:"
    1.  **Mi compañero (Cliente):** Solo maneja la interfaz y la visualización. No tiene la base de datos ni la lógica pesada.
    2.  **Yo (Servidor):** Tengo el 'cerebro' del sistema: el código PHP, las reglas de negocio y, lo más importante, la Base de Datos PostgreSQL."

## 2. Demostración del Flujo (Paso a Paso)

### Paso A: Solicitud de Información (GET)
*(Pide a tu compañero que recargue la página de lista de miembros)*

**"Fíjense lo que acaba de pasar:"**
1.  "El navegador de mi compañero envió una petición **GET** a mi dirección IP (`172.17.188.113`)."
2.  "Mi servidor (PHP) recibió la orden, consultó la base de datos PostgreSQL para sacar la lista de miembros y calculó quién puede entrar y quién no."
3.  "Mi servidor generó el HTML con la tabla y se lo devolvió a su navegador."
4.  **Clave:** "Él ve los datos, pero los datos viven en MI máquina."

### Paso B: Lógica de Negocio Centralizada (Registrar Acceso)
*(Pide a tu compañero que haga clic en 'Registrar Acceso' o intenta entrar con un usuario caducado)*

**"Aquí vemos la validación del servidor en acción. Hemos implementado un Control de Accesos:"**
1.  "El cliente selecciona un usuario y envía la petición."
2.  "Mi servidor no solo guarda el dato. Antes de hacerlo, ejecuta reglas:"
    *   ¿El usuario está activo?
    *   ¿Su fecha de caducidad es válida?
    *   ¿Tiene el permiso de entrada habilitado?
3.  "Si alguna falla, mi servidor rechaza la petición y le devuelve un error al cliente."

*(Ejemplo visual en pantalla)*
*   **Entrada Permitida (Verde):** "El servidor verificó que hoy es anterior a la fecha de vencimiento."
*   **Entrada Negada (Rojo):** "El servidor detectó que la fecha ya pasó o el estado es inactivo."

## 3. Conclusión Técnica
"Esta arquitectura garantiza la **Seguridad** y la **Integridad** de los datos.
*   El Cliente no puede manipular la base de datos directamente, solo a través de las acciones que yo (el Servidor) permito.
*   Si yo apago mi servidor, su aplicación deja de funcionar, demostrando la dependencia real del servicio."

---
## 💡 Tips para la Demo en Vivo
1.  **Muestra la consola:** Si puedes, ten abierta la terminal donde corre el servidor (`php -S...`). Cada vez que tu compañero haga clic, se verán líneas nuevas en tu pantalla. Señálalas y di: *"¿Ven? Aquí llegó su petición"*.
2.  **Cambio en caliente (Opcional):** Si cambias algo en la base de datos directamente (pgAdmin) y él recarga, se verá reflejado inmediatamente, probando que es la misma fuente de verdad.
