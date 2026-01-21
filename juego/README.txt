Conexión a la API desde otro dispositivo:

Autenticación a la API:
1. Abrir Postman
2. Crear una nueva petición POST
3. Escribir la dirección chema.desarrolloesencial.com/juego/api/auth.php
4. En el apartado Params, crear una nueva key que se llame "api"
5. Ponerle como valor una API Key que se te proporciona en este link: https://password.link/KL5f1pfT/#L0lwb3sxV0E1WUF5PmxZKWRu
6. Con todos los datos ya puestos, podemos darle a "Send"
7. Si está todo correcto, Postman debería devolver un mensaje 200 OK

Login con API:
1. Asegúrate de que has hecho los 7 pasos anteriores, porque en caso contrario no podrías loguearte
2. Crear una nueva petición POST en Postman
3. Escribir la dirección chema.desarrolloesencial.com/juego/api/login.php
4. En el apartado Params, crear una nueva key que se llame "api" y otra que se llame "token"
5. Ponerle como valor a la clave API la misma API Key de antes
6. Ponerle como valor al token un token que se te asignará al haberte autenticado
7. Con todos los datos ya puestos, podemos darle a "Send"
8. Si está todo correcto, Postman debería devolver un mensaje 200 OK

OJO CUIDAO: el token tiene 15 minutos de vida, si al intentar hacer login aparece un mensaje de "401 Token expirado", repetir los pasos de autenticación

QUE LA FUERZA TE ACOMPAÑE!