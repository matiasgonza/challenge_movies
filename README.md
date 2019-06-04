## Consideraciones iniciales

<p>Luego de clonar el repositorio ejecutar: composer install</p>
**<strong>Es muy importante ejecutar los seeders definidos</strong>**
<h5>Framewokr: Laravel</h5>
<h5>Tipo de aplicación: API</h5>
<h5>Los paquetes instalados son:</h5>
* CORS
* Laravel Passport
<br>
<p>Las colecciones retornadas poseen paginación</p>
<p>La aplicación posee un back-office con las operaciones seguras sin autenticación requerida.</p>
### Descripción endpoints

<p>Ejemplo de modelo</p><br>
<pre>{
    "data": {
        "id": 2,
        "movies_as_actor_actress": null,
        "movies_as_director": null,
        "movies_as_producer": null,
        "first_name": "Ryder Turcotte",
        "last_name": "Marquardt",
        "aliases": "Ryder_Turcotte_783",
        "created_at": "2019-06-03 00:54:08",
        "updated_at": "2019-06-03 00:54:08"
    }
}</pre> <br>

<p>Ejemplo de colección</p><br>
<pre>{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "movies_as_actor_actress": null,
            "movies_as_director": null,
            "movies_as_producer": null,
            "first_name": "Ms. Estelle Gerhold",
            "last_name": "Keebler",
            "aliases": "Ms._Estelle_Gerhold_455",
            "created_at": "2019-06-03 00:54:08",
            "updated_at": "2019-06-03 00:54:08"
        },
        {
            "id": 10,
            "movies_as_actor_actress": null,
            "movies_as_director": null,
            "movies_as_producer": null,
            "first_name": "Tess Kulas",
            "last_name": "Willms",
            "aliases": "Tess_Kulas_938",
            "created_at": "2019-06-03 00:54:08",
            "updated_at": "2019-06-03 00:54:08"
        }
    ],
    "first_page_url": "1?page=1",
    "from": 1,
    "last_page": 6,
    "last_page_url": "1?page=6",
    "next_page_url": "1?page=2",
    "path": "1",
    "per_page": 10,
    "prev_page_url": null,
    "to": 10,
    "total": 57
}</pre><br>
<h4>EndPoit seguros, sin autenticación requerida:</h4>
<p>En los endpoints los  parámentros en la url son los id de los registros a consultar</p>
<p>GET <strong>api/front-persons : </strong><span>Para obtener todas las personas almacenadas en la aplicación.</span></p>
<p>GET <strong>api/front-person/{person} : </strong><span>Para obtener el registro de la persona correspondiente al id pasado por parámetro en la url.</span></p>
<p>GET <strong>api/front-movies : </strong><span>Para obtener todas las películas almacenadas en la aplicación</span></p>
<p>GET <strong>api/front-movies/{movie} : </strong><span>Para obtener el registro de la película correspondiente al id pasado por parámetro en la url.</span></p>
<p>GET <strong>api/person/index : </strong><span>Para obtener todos los registros de personas.</span></p>
<p>GET <strong>api/person/{person} : </strong><span>Para obtener un registro de persona específico.</span></p>
<p>GET  <strong>api/movie/index : </strong><span>Para obtener todos los registros de películas.</span></p>
<p>GET <strong>api/movie/{movie} : </strong><span>Para obtener un registro de películas específico.</span></p>
<h5>EndPoints con consultas relacionales</h5>
<p><strong>Desde el modelo Movie</strong></p>
<p>GET <strong>api/movie-casting/{movie} : </strong><span>Para obtener todos los actores/trices de una película.</span></p>
<p>GET <strong>api/movie-directors/{movie} : </strong><span>Para obtener todos los directores de una película.</span></p>
<p>GET <strong>api/movie-producer/{movie} : </strong><span>Para obtener todos los productores de una película.</span></p>
<p><strong>Desde el modelo Person</strong></p>
<p>GET <strong>api/movies-as-actor/{person} : </strong><span>Para obtener todos los registros de películas de un/a actor/triz.</span></p>
<p>GET <strong>api/movies-as-director/{person} : </strong><span>Para obtener todos los registros de películas de un director/a.</span></p>
<p>GET <strong>api/movies-as-producer/{person} : </strong><span>Para obtener todos los registros de películas de un director.</span></p>
<h4>EndPoits con autenticación requerida:</h4>
<p>Para estas consultas se debe incluir el header "autorization" con el token recibido durante la autenticación</p>
<p><strong>api/login : </strong><span>Para realizar el login(email:mati@gmail.com; password:123123).</span></p>
<h5>EndPoints REST</h5>
<p>POST <strong>api/person/ : </strong><span>Para almacenar un nuevo registro de persona.</span></p>
<p>PUT <strong>api/person/{person} : </strong><span>Para actualizar un registro de persona.</span></p>
<p>DELETE <strong>api/person/{person} : </strong><span>Para eliminar un registro de persona.</span></p>
<p>POST <strong>api/movie/ : </strong><span>Para almacenar un nuevo registro de película.</span></p>
<p>PUT <strong>api/movie/{movie} : </strong><span>Para actualizar un registro de película.</span></p>
<p>DELETE <strong>api/movie/{movie} : </strong><span>Para eliminar un registro de película.</span></p>
/*------------------------------------------------------*/
<h5>EndPoints con consultas relacionales</h5>
<p><strong>Desde el modelo Movie</strong></p>
<p>GET <strong>api/movie-casting-add/{movie} : </strong><span>Para obtener todas los registros de personas que no son actores/trices en película. Esta operación retorna el conjunto {id, first_name}</span></p>
<p>GET <strong>api/movie-directors-add/{movie} : </strong><span>Para obtener todas los registros de personas que no son directores/as en película. Esta operación retorna el conjunto {id, first_name}</span></p>
<p>GET <strong>api/movie-producer-add/{movie} : </strong><span>Para obtener todas los registros de personas que no son productores/as en película. Esta operación retorna el conjunto {id, first_name}</span></p>

<p>PUT <strong>api/movie-casting-update/{movie} : </strong><span>Agrega nuevos actores a la película. Esta operación envía por PUT el campo 'person' que es un array con todos los id de actores a agregar</span></p>
<p>PUT <strong>api/movie-directors-update/{movie} : </strong><span>Agrega nuevos directores a la película. Esta operación envía por PUT el campo 'person' que es un array con todos los id de directores a agregar</span></p>
<p>PUT <strong>api/movie-producer-update/{movie} : </strong><span>Agrega nuevos productores a la película. Esta operación envía por PUT el campo 'person' que es un array con todos los id de productores a agregar</span></p>

<p><strong>Desde el modelo Person</strong></p>
<p>GET <strong>api/add-movie-as-actor/{person} : </strong><span>Para obtener todas los registros de películas donde un persona no es actor/triz. Esta operación retorna el conjunto {id, title}</span></p>
<p>GET <strong>api/add-movie-as-director/{person} : </strong><span>Para obtener todas los registros de películas donde un persona no es director/a. Esta operación retorna el conjunto {id, title}</span></p>
<p>GET <strong>api/add-movie-as-producer/{person} : </strong><span>Para obtener todas los registros de películas donde un persona no es productor/a. Esta operación retorna el conjunto {id, title}</span></p>

<p>PUT <strong>api/movies-as-actor-update/{person} : </strong><span>Agrega nuevas películas como actor a una persona determinada. Esta operación envía por PUT el campo 'movies' que es un array con todos los id de películas a agregar</span></p>
<p>PUT <strong>api/movies-as-director-update/{person} : </strong><span>Agrega nuevas películas como director a una persona determinada. Esta operación envía por PUT el campo 'movies' que es un array con todos los id de películas a agregar</span></p>
<p>PUT <strong>api/movies-as-producer-update/{person} : </strong><span>Agrega nuevas películas como productor a una persona determinada. Esta operación envía por PUT el campo 'movies' que es un array con todos los id de películas a agregar</span></p>

