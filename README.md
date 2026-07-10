## LARA

LARA es una herramienta general de Inteligencia Artificial para inferir indicios de trastornos mentales en aquellas personas que hablan con ella. Para ello hay tres partes diferenciadas: una tabla de administrador, una vista para que los usuarios puedan hablar con el modelo de IA detrás de la aplicación, y por último un calendario para que cualquier psicólogo pueda agendar una cita con algunas de estas personas que podrían llegar a ser sus pacientes.

### ¿Qué hace?

#### Recomienda pautas psicológicas

Mientras un usuario habla con la ia, la aplicación va guardando todas las partes de la conversación con el usuario en una base de datos para poder utilizar esa información y analizar si hay indicios de que esa persona concreta pueda tener una enfermedad mental. En caso de que así fuera, le indicaría al usuario una serie de pautas que podría seguir con un psicólogo si esa persona quisiera.

#### Agendado de citas para psicólogos

Un psicólogo registrado en el sistema puede acceder a un calendario para organizar de forma eficiente su cita con un cliente.

#### Filtrado de usuarios por nivel

El administrador puede filtrar a sus usuarios por rol: personas o psicólogos, y modificar o eliminar sus datos.

#### Stack utilizado	

| Herramienta | Opción elegida |

|:----------- | :------------- |

| Estructura  | HTML           |

| Estilos     | CSS            |

| Gateway     | OpenRouter     |

|Base de datos| MariaDB        |

| Librería    | Cally          |

| Backend     | PHP            |


#### Cómo iniciar la app

##### 1. Clona este repositorio

`git clone https://github.com/javiuri17/lara-ai.git`
`cd lara-ai`

##### 2. Instala composer

Si usas Windows, puedes descargar [Composer-setup.exe](https://getcomposer.org/Composer-Setup.exe) o realizar una instalación manual por tu cuenta y riesgo.

Link a la documentación: [Getting started with Composer](https://getcomposer.org/doc/00-intro.md)

##### 3. Configura las variables de entorno

`OPENROUTER_API_KEY= ""`
`OPENROUTER_MODEL= ""`

`DB_HOST=localhost`
`DB_PORT=3306`
`DB_NAME= laradb`

##### 4. Copia lo que hay en .env.example a un archivo .env

Pon todo lo visto en la parte anterior dentro de un .env

##### 5. Crea la base de datos

Que se llamará laradb

##### 6. Importa la estructura de laradb

Que va a contener una tabla para usuarios y chats

##### 7. Coloca la carpeta dentro de un directorio

Donde la vayas a alojar

##### 8. Abre la aplicación con un servidor APACHE
