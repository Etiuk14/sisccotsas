quiero desarrollar un sistema el cual sera administados desde otro sistema que denomino el panel administrativo ya que desde ay se crearan las bases de datos, de acuerdo al cliente que la compro y las funciones habilitadas que puede utilizar dependiente el plan que compro los cuales se pueden activar o desactivar, lo primero que veo que debe ser funcional es la plataforma administrativa ya que desde ay se crearan toda la informacion necesaria y general del sistema que serian los datos del que adquirio el sistema, el detalle es que no se nada de codigos ni desarrollo, solo tengo esta descripcion de lo que quiero, no tengo instalado modulos ni programas, no e creado el proyecto con ni instalado ningun programa  quiero iniciar desde cero.

# Descripción General del Proyecto

Desarrollar un sistema en la nube con aplicaciones móviles y de escritorio. El sistema será funcional tanto en servidores VPS como en entornos locales. Se priorizará la modularidad, seguridad, y facilidad de mantenimiento, con una arquitectura que permita escalabilidad y actualizaciones rápidas.

1. la instalacion en el vps del sistema sera lo ultimo, despues de desarrollo y realizar todas las pruebas locales y ver el funcionamiento del sistema.

## Orden para crear las plataformas.
1. plataforma web de control administrativo
2. plataforma web CONTAPASS
3. aplicacion pc de CONTAPASS "de microsotf"
4. aplicacion movil CONTAPASS
   
## Recursos y Herramientas

### Entorno de Desarrollo
•	IDE: Visual Studio Code.
•	Control de Versiones: GitHub para la gestión de cambios.
•	Backend: Laravel (PHP).
•	Frontend: Vue.js para la web, Quasar Framework para apps móviles, y Electron para apps de escritorio.
•	Base de Datos: MySQL (Laragon en local, MariaDB/MySQL en VPS).
•	Servidor VPS: Contabo con Ubuntu 22.04, configurado con:
	•	Nginx (Servidor web).
	•	Certbot (Certificados SSL).
	•	PHP-FPM (Manejo de PHP).
	•	MySQL (Producción).
•	Contenerización: Docker para simplificar despliegues.

### Nuevas Herramientas y Funcionalidades Sugeridas
•	Inteligencia Artificial: Herramientas para detección de patrones sospechosos.
•	Tokenización de Datos: Proteger información sensible.
•	Blue-Green Deployment: Garantizar actualizaciones sin interrupciones.
•	Multidispositivo: Compatibilidad con múltiples resoluciones y sistemas operativos.

## Arquitectura del Sistema General

### Microservicios:
Separar el sistema en módulos independientes 
### API Gateway: 
Centraliza la autenticación y manejo de solicitudes.
### Autenticación y Seguridad:
	•	JWT con autenticación de dos factores (MFA).
	•	Cifrado avanzado para datos sensibles.
	•	Tokenización para proteger información.
	•	Inteligencia Artificial para detección de patrones sospechosos.
	
### idioma de la base de datos:
utf8_spanish_ci
### Multicliente: 
Cada cliente tendrá su propia base de datos, identificada por su NIT.
### Tablas Compartidas: 
Licencias, módulos y usuarios administradores.
### Gestión de Recursos:
Límite de almacenamiento por cliente o adquiriente de los sistemas (1 GB por licencia).
Escalabilidad para planes donde pueda aumentar la capacidad de almacenamiento o de funciones que se agreguen nuevas.
Notificaciones por actividad sospechosa.

## Estructura del Proyecto

1.	Sistema Centralizado: Panel administrativo para gestionar licencias, usuarios y módulos.
2.	Aplicaciones Conectadas: Funciona en la nube y se integra con aplicaciones móviles y de escritorio.
3.	Modularidad: Sistemas separados para facilitar actualizaciones y correcciones.

## Nuevas Funcionalidades:
1. Registro de Actividades: Módulo para monitorear actividades de usuarios y administradores.
2. Módulo de Auditorías: Informes para verificar modificaciones y cambios importantes.
3. Copia de Seguridad y Restauración: Recuperación simplificada de información desde el panel administrativo.
4. Seguimiento de Licencias: Recordatorios de vencimiento o alertas de renovación.
5. Notificaciones Automáticas: Alertas sobre tareas pendientes o vencimientos.

## Características Técnicas

1.	Implementación en la Nube:
o	Almacenamiento seguro y escalable.
o	Compatibilidad con dispositivos móviles y de escritorio.
2.	Código Modular:
o	Separación de sistemas para facilitar mantenimiento y actualizaciones.
3.	Integración con VPS:
o	Configuración optimizada para funcionar en servidores Contabo.
4.	Seguridad:
o	Gestión de roles y permisos.
o	Notificaciones de actividades sospechosas.
o	Almacenamiento seguro de contraseñas y datos sensibles.
5. 	Zona horaria, idioma, y formato de moneda por cliente.
6. 	Ofrecer almacenamiento adicional según necesidades del cliente.
7. 	Métricas sobre cómo los clientes utilizan el sistema.
8. 	Incluir balanceadores de carga en el VPS para mejorar el rendimiento en caso de aumento del tráfico.


## TABLAS A CREAR E IMPORTAR AL CREAR BASE DE DATOS QUE PARA EL QUE ADQUIERA EL SISTEMA YA QUE IMPORTANTES.

1. relacion de paises, departamentos y municipios. Sisccotsas/tablas/Ciudades.csv
2. tabla de impuestos segun requerimientos documentos electronicos dian. Sisccotsas/tablas/tipos_impuestos_dian.csv
3. tabla de obligaciones de la dian Sisccotsas/tablas/co_type_obligations.csv.bkp
4. Tipo de persona Sisccotsas/tablas/co_type_people.csv
5. tipo de regimen Sisccotsas/tablas/co_type_regimes.csv.bkp
6. archivo postman de la api a la cual el sistema sisfyc-ing debe enviar informacion para que los documentos electronicos sean aceptados por la dian, esto con el fin de no crear una api nueva que haga todo ese proceso de vinculacion con la dian.

# PANEL ADMINISTRATIVO

## Descripción del panel administrativo.

sistema para el control de las licencias, usuarios, contraseñas, de el sistemas CONTAPASS

## Funcionalidades Principales del panel administrativo.

1. el listado de módulos debe estar ubicados como en el 20% del lado izquierdo cada módulo tendrá su nombre y un icono que lo identifique y si hace de cambios de modulos el panel de modulos es estatico.
![asi deberian ser la seccion de inicio del sistema contappass y asi se deberia visualizar el 80% del espacio donde queremos colocar publicidad](ejemplo inicio de seccion sisfyc-ing y contapass.jpg). 

IMAGEN EJEMPLO DE COMO VISUALIZO EL PANEL ADMINISTRATIVO.
![imagen de ejemplo de como quisiera que quedara el panel administrativo de acuerdo a las funciones que menciono](images/ejemplo panel administrativo.jpg)

2. en el panel administrativo de clientes en la parte de arriba a la izquierda, tenga el logo de la empresa en la mitad diga panel de control de clientes, en la parte derecha se visualice el nombre de usuario y el correo, además que cuando le dé ay en el nombre de usuario se despliegue dos opciones una que diga perfil y la otra cerrar sección en la opción perfil se pueda editar la información del usuario administrador.

3. Sincronizar con plataformas como Slack o Microsoft Teams para recibir notificaciones administrativas.	

4.	Modulos:

### MODULO CLIENTES: 
en este modulo se debera visualizar por linea y en listas la informacion de cada cliente a medida que se vaya creando.

A. en este módulo se crearían, editaría y eliminarían los clientes que adquieran cualquier sistemas y la informacion de cada base de datos.
B. en este modulo debe haber botón que diga crear cliente y al darle clic debería aparecer un formulario donde se diligencia los campos, Nit, dv, nombre o razón social, correo electrónico, "que sería el usuario de ingreso al sistema", teléfono, departamento, ciudad, dirección, plataforma "se selecciona la platagorma que adquiere si es CONTAPPASS, SISFYC-ING O SISBAC", plan adquirido " de acuerdo al sistema que seleccciono le deberian aparecer el listados de planes creados en el modulo licencias", tambien al seleccionar el plan de se debe informar la cantidad de usuarios que pueden utilizar en la plataforma que adquirio. y de acuerdo al plan se le activarían los módulos de la plataforma que adquirio.

### MODULO PUBLICIDAD: 
este módulo controlara la publicidad que se visualizara al lado izquierdo 80% de pantalla del inicio de sección de los sistemas SYSFIC ING, CONTAPASS Y SISBAC, se podría agregar una imagen o crear diferentes opciones de publicidad. que tenga la opcion de vista previa de cómo se verán en los sistemas.

A. opcion para enviar mensajes masivos o personalizados a los clientes, como notificaciones de mantenimiento o actualizaciones.

### MODULO DE LICENCIAS: 
en este modulo se crearían las licencias y todas las funciones que pueden tener y dependiendo la licencia puede tener algunas funciones desactivadas, además estas licencias se deberían seleccionar cuando se está creando el cliente para que enlace la información y los módulos que pueda utilizar

A. Personalización de módulos según el plan adquirido.

### MODULO USUARIOS ADMINISTRADORES:
tendrá acceso el usuario administrado maestro que sería mi usuario, donde yo pueda crear los otros usuarios de acuerdo a su rol y permisos que tenga. Agregar la posibilidad de personalizar los permisos por usuario, además de usar roles predefinidos. Asignar múltiples roles a un mismo usuario si aplica (e.g., Supervisor y Publicidad). Crear jerarquías entre usuarios para que ciertos administradores puedan delegar permisos a otros. 

* Permitir al administrador maestro habilitar o deshabilitar módulos específicos según las necesidades del cliente.

* Los usuarios administradores deben tener varios roles
	•	Usuario administrador maestro “acceso a todos los modulos y a todas las funciones de los modulos”
	•	Usuario administrador menor “acceso a todos los modulos y no puede editar ni eliminar usuarios administradores”
	•	Usuario administrador ventas “acceso a los modulos de seguimiento de licencias, y clientes ademas puede visualizar la informacion del modulo licencias”
	•	Usuario administrador supervisor “acceso a todos los modulos pero solo visualizara la informacion no la puede editar ni eliminar”
	•	Usuario administrador publicidad “acceso solo al modulo de publicidad y a visualizar la informacion de los modulos de clientes y segumiento de licencias”

### MODULOS DE LOG ERRORES: 
en este módulo se deberían quedar registrados los errores que ocurren con el sistema para poderlos identificar más rápido y generar las correcciones correspondientes  con Laravel Log Viewer. 

* Monitoreo de actividades de usuarios (creación, edición, inicios de sesión). 
* Registro detallado de actividades de usuarios y administradores. 
* Clasificar logs en categorías como "Errores", "Acciones del Usuario" y "Accesos Fallidos". 
* opcion para visualizar accesos al sistema y actividades sospechosas en tiempo real.

### MODULOS DE SEGUIMIENTO DE LICENCIAS: 

* listado de contribuyentes que estan por vencer su licencia 
* que se pueda realizar una configuración de alertas para vencimientos o necesidades de renovación. 
* Configuración de límites específicos o espacio de almacenamiento. 
* Visualización gráfica del uso del espacio por cliente. 
* Crear reportes automáticos sobre uso del sistema, clientes activos, y licencias por vencer.
* Configurar renovaciones automáticas de licencias con notificaciones al cliente.
* configuracion y visualizacion para Cargar un nuevo certificado digital. 
* Visualizar el estado y vigencia del certificado actual. 
* Actualizar o eliminar certificados y Validaciones automáticas durante la carga.

### MODULO DE AUDITORIAS: 

para rastrear acciones clave, como creación de usuarios, cambios en licencias y eliminación de registros. Registro de las modificaciones realizadas en las licencias y datos de los clientes, indicando qué usuario las realizó.

* Crear filtros avanzados en el módulo de auditorías para buscar actividades específicas (e.g., cambios en permisos de usuarios).

2. el listado de módulos debe estar ubicados como en el 20% del lado izquierdo cada módulo tendrá su nombre y un icono que lo identifique y si hace de cambios de modulos el panel de modulos es estatico.
![asi deberian ser la seccion de inicio del sistema sisfyc-ing y contappass y asi se deberia visualizar el 80% del espacio donde queremos colocar publicidad](ejemplo inicio de seccion sisfyc-ing y contapass.jpg). 

IMAGEN EJEMPLO DE COMO VISUALIZO EL PANEL ADMINISTRATIVO.
![imagen de ejemplo de como quisiera que quedara el panel administrativo de acuerdo a las funciones que menciono](images/ejemplo panel administrativo.jpg)

3. en el panel administrativo de clientes en la parte de arriba a la izquierda, tenga el logo de la empresa en la mitad diga panel de control de clientes, en la parte derecha se visualice el nombre de usuario y el correo, además que cuando le dé ay en el nombre de usuario se despliegue dos opciones una que diga perfil y la otra cerrar sección en la opción perfil se pueda editar la información del usuario administrador.
4. Sincronizar con plataformas como Slack o Microsoft Teams para recibir notificaciones administrativas.	


# SISTEMA CONTAPASS

## Descripción de contapass

Contabas es un sistema de control de información de los clientes dirigido a contadores, permitiendo el almacenamiento seguro de usuarios, contraseñas, enlaces de plataformas y documentos. Los contadores pueden gestionar y compartir documentos con sus clientes de manera segura y autorizada.

## Funcionalidades de contapass.

1. que el usuario contador que tiene la licencia pueda crear y editar sus usuarios (clientes) que el maneja y que puedan acceder a la información que el contador defina o les de acceso
2. Gestión de permisos y control de acceso de sus usuarios de acuerdo a lo que el contador defina cada vez que cree las clientes y el sub usuario.
3. el cliente del contador deberia poder descargar una aplicacion movil y desde ay poder visualizar la informacion que comparto en la siguiente imagen.
   ![Asi quisiera que se el cliente del contador visualizara la informacion que el contador autorizo que visualizara y descargara desde la app](images/ejemplo informacion a descargar cliente contador contapass.jpg)
4. en el módulo contador al lado izquierdo tenga la lista de cliente y que al ingresar en el cliente pueda visualizar la plataforma a que tiene acceso del cliente y al darle clic en la plataforma pueda visualizar la información de esa plataforma que debería ser usuario, contraseña, link de acceso entre otras cosas y que también pueda en esa ventana guardar la información y documentos de acuerdo a la plataforma.
![asi quisiera que se visualizara el sistema contapass una vez el contador iniciara seccion](ejemplo plataforma contapass.jpg)
5. límite de almacenamiento y gestión de información y documentos según la plataforma que maneja el contador
6. Funciones automáticas (descarga de RUT, declaraciones de renta, etc.).
7. Visualización y descarga de documentos por el su usuario y de acuerdo a la información de ese mismo su usuario autorizado por el contador.
8. Notificaciones de actividad sospechosa o intentos de acceso no autorizados.
9. Copia de seguridad y recuperación de datos.
10. Opción de pago en línea para la plataforma que ofrezcan los administradores.
11. Registro de descargas realizadas por clientes.
12. Posibilidad de firmar documentos directamente desde la plataforma.
13. Alertas para vencimientos de RUT u otros documentos.
14. Integración inicial con almacenamiento limitado por licencia.
15. Permitir al contador crear carpetas o categorías para organizar los documentos por tipo (e.g., declaraciones de renta, RUT, contratos).
16. Búsqueda avanzada para localizar documentos específicos.
17. Subir múltiples documentos o datos de clientes desde plantillas en Excel o CSV.
18. Informar al contador si los clientes no han descargado un documento después de un cierto tiempo.
19. Notificaciones al cliente sobre nuevos documentos subidos.
20. Compartir documentos con clientes externos mediante enlaces seguros con caducidad configurada.
21. Informe visual del uso del almacenamiento (por cliente o por tipo de documento).
22. Permitir que el contador se comunique directamente con sus clientes desde la plataforma.
23. Ofrecer recomendaciones automáticas al contador basadas en las acciones más frecuentes (e.g., vencimientos de múltiples documentos en una misma semana).
24. Permitir al contador programar cargas automáticas de documentos (e.g., subir masivamente al final del mes).
25. Integrar compresión automática de documentos al momento de subirlos.
26. Ofrecer un paquete de almacenamiento ampliado como upsell.
    
## APLICACION MOVIL CONTAPASS

1. aplicacion movil para que el contador pueda visualizar la informacion de los clientes de manera parecida a como lo visualiza en la pagina web.
2. el cliente del contador podra ingresar a la aplicacion con el usuario y contraseña que les asigno el contador y solo tendra acceso a la informacion que el contador le autorizo y que le corresponde a el todos se identificaran con el numero de documento.
3. Permitir que los clientes accedan a documentos descargados previamente, incluso sin conexión a internet.
4. Alertas inmediatas para el cliente cuando se suba un nuevo documento o se acerque un vencimiento.
5. Interfaz fácil para buscar documentos por fecha, nombre o categoría.
6. Posibilidad de seleccionar y descargar múltiples documentos a la vez.
7. Habilitar el inicio de sesión con huella dactilar o reconocimiento facial.
8. Generar enlaces desde la app para compartir documentos, con opciones de caducidad y contraseñas.
9. Permitir al cliente agregar comentarios o preguntas sobre documentos específicos.
10. Presentar al cliente un gráfico sencillo del estado de sus obligaciones (e.g., documentos por vencer, pagos pendientes).
11. Usar la cámara del móvil para escanear y subir documentos desde la app.
12. Configurar cuentas de correo para extraer automáticamente documentos adjuntos relevantes y almacenarlos en el sistema.

plan de desarrollo

1. Módulo de Usuarios Administrativos
Funcionalidades:
Gestión de Usuarios: Crear, editar, eliminar y asignar roles a los usuarios administrativos.
Roles y Permisos: Definir diferentes roles (e.g., superadministrador, administrador, usuario) y sus permisos correspondientes.
Autenticación y Seguridad: Implementar autenticación segura, recuperación de contraseñas y autenticación de dos factores (2FA).
Implementación:
Modelo de Usuario: Define el modelo de usuario administrativo.
Controladores: Crea controladores para gestionar usuarios y roles.
Vistas: Diseña vistas para la gestión de usuarios y roles.
Rutas: Define rutas para las operaciones CRUD de usuarios y roles.
2. Módulo de Licencias
Funcionalidades:
Gestión de Licencias: Crear, editar, renovar y eliminar licencias.
Asignación de Licencias: Asignar licencias a clientes específicos.
Seguimiento de Licencias: Monitorear el estado de las licencias (activas, expiradas, próximas a expirar).
Implementación:
Modelo de Licencia: Define el modelo de licencia.
Controladores: Crea controladores para gestionar licencias.
Vistas: Diseña vistas para la gestión de licencias.
Rutas: Define rutas para las operaciones CRUD de licencias.
3. Módulo de Clientes
Funcionalidades:
Gestión de Clientes: Crear, editar, eliminar y visualizar clientes.
Bases de Datos de Clientes: Crear y gestionar bases de datos específicas para cada cliente.
Asignación de Licencias a Clientes: Asignar licencias a los clientes y gestionar sus permisos.
Implementación:
Modelo de Cliente: Define el modelo de cliente.
Controladores: Crea controladores para gestionar clientes.
Vistas: Diseña vistas para la gestión de clientes.
Rutas: Define rutas para las operaciones CRUD de clientes.
4. Módulo de Publicidad
Funcionalidades:
Gestión de Publicidad: Crear, editar y eliminar anuncios publicitarios.
Segmentación de Publicidad: Definir segmentos de usuarios para mostrar anuncios específicos.
Estadísticas de Publicidad: Monitorear el rendimiento de los anuncios (impresiones, clics, conversiones).
Implementación:
Modelo de Publicidad: Define el modelo de publicidad.
Controladores: Crea controladores para gestionar publicidad.
Vistas: Diseña vistas para la gestión de publicidad.
Rutas: Define rutas para las operaciones CRUD de publicidad.
5. Módulo de Log de Errores
Funcionalidades:
Registro de Errores: Capturar y almacenar errores del sistema.
Notificaciones de Errores: Enviar notificaciones a los administradores cuando ocurran errores críticos.
Análisis de Errores: Proporcionar herramientas para analizar y resolver errores.
Implementación:
Modelo de Log de Errores: Define el modelo de log de errores.
Controladores: Crea controladores para gestionar logs de errores.
Vistas: Diseña vistas para la gestión de logs de errores.
Rutas: Define rutas para las operaciones CRUD de logs de errores.
6. Módulo de Seguimiento de Licencias
Funcionalidades:
Monitoreo de Uso de Licencias: Ver cuántas licencias están en uso y cuántas están disponibles.
Alertas de Licencias: Enviar alertas cuando las licencias estén próximas a expirar o se hayan agotado.
Implementación:
Modelo de Seguimiento de Licencias: Define el modelo de seguimiento de licencias.
Controladores: Crea controladores para gestionar el seguimiento de licencias.
Vistas: Diseña vistas para el monitoreo de licencias.
Rutas: Define rutas para las operaciones CRUD de seguimiento de licencias.
7. Módulo de Auditorías
Funcionalidades:
Registro de Auditorías: Capturar y almacenar todas las acciones realizadas por los usuarios.
Análisis de Auditorías: Proporcionar herramientas para analizar las auditorías y detectar actividades sospechosas.
Implementación:
Modelo de Auditoría: Define el modelo de auditoría.
Controladores: Crea controladores para gestionar auditorías.
Vistas: Diseña vistas para la gestión de auditorías.
Rutas: Define rutas para las operaciones CRUD de auditorías.
8. Módulo de Inicio
Funcionalidades:
Estadísticas de Uso: Mostrar gráficos y estadísticas sobre el uso del sistema.
Usuarios Activos e Inactivos: Mostrar el número de usuarios activos e inactivos.
Resumen de Actividades: Proporcionar un resumen de las actividades recientes en el sistema.
Implementación:
Controladores: Crea controladores para gestionar el inicio.
Vistas: Diseña vistas para mostrar estadísticas y gráficos.
Rutas: Define rutas para acceder al inicio.
Implementación Detallada
