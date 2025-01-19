
# Documentação da API

  

## URL Base

https://swapi.py4e.com/api/

  
  

## Endpoints

  

### FilmsEndpoint

#### Lista todos os filmes se não clicar em um filme

-  **URL**: https://swapi.py4e.com/api/films/

**URL na aplicação**: /SWAPI-PHP/

-  **Método**: GET

-  **Descrição**: Retorna uma lista de filmes.

-  **Exemplo de Resposta**:

```

{

"count": 7,

"next": null,

"previous": null,

"results": [

{

"title": "A New Hope",

"episode_id": 4,

"opening_crawl": "....",

"director": "George Lucas",

"producer": "Gary Kurtz, Rick McCallum",

"release_date": "1977-05-25",

"characters": [

"https://swapi.py4e.com/api/people/1/"

],

"planets": [

"https://swapi.py4e.com/api/planets/1/"

],

"starships": [

"https://swapi.py4e.com/api/starships/2/"

],

"vehicles": [

"https://swapi.py4e.com/api/vehicles/4/"

],

"species": [

"https://swapi.py4e.com/api/species/1/"

],

"created": "2014-12-10T14:23:31.880000Z",

"edited": "2014-12-20T19:49:45.256000Z",

"url": "https://swapi.py4e.com/api/films/1/"

},

{

"title": "The Empire Strikes Back",

"episode_id": 5,

"opening_crawl": "....",

"director": "Irvin Kershner",

"producer": "Gary Kurtz, Rick McCallum",

"release_date": "1980-05-17",

"characters": [

"https://swapi.py4e.com/api/people/1/",

  

],

"planets": [

"https://swapi.py4e.com/api/planets/4/"

],

"starships": [

"https://swapi.py4e.com/api/starships/3/"

],

"vehicles": [

"https://swapi.py4e.com/api/vehicles/8/"

],

"species": [

"https://swapi.py4e.com/api/species/1/"

],

"created": "2014-12-12T11:26:24.656000Z",

"edited": "2014-12-15T13:07:53.386000Z",

"url": "https://swapi.py4e.com/api/films/2/"

}

]

}

```
  

#### Lista o filme se clicar no filme

- **URL**: https://swapi.py4e.com/api/films/{Número do filme especificado}

**URL na aplicação**: /SWAPI-PHP/film/{Número do filme especificado}

- **Método**: GET

- **Descrição**: Retorna o filme especificado.

- **Exemplo de Resposta**:

```json

{

"title": "A New Hope",

"episode_id": 4,

"opening_crawl": ....",

"director": "George Lucas",

"producer": "Gary Kurtz, Rick McCallum",

"release_date": "1977-05-25",

"characters": [

"https://swapi.py4e.com/api/people/1/",

],

"planets": [

"https://swapi.py4e.com/api/planets/1/",

],

"starships": [

"https://swapi.py4e.com/api/starships/2/",

],

"vehicles": [

"https://swapi.py4e.com/api/vehicles/4/",

],

"species": [

"https://swapi.py4e.com/api/species/1/",

],

"created": "2014-12-10T14:23:31.880000Z",

"edited": "2014-12-20T19:49:45.256000Z",

"url": "https://swapi.py4e.com/api/films/1/"

}

  

```

### PlanetsEndpoint

#### Lista o planeta se clicar no planeta

-  **URL**: https://swapi.py4e.com/api/films/{Número do planeta especificado}

**URL na aplicação**: /SWAPI-PHP/planet/{Número do planeta especificado}

-  **Método**: GET

-  **Descrição**: Retorna o planeta especificado.

-  **Exemplo de Resposta**:

```json

{

"name": "Yavin IV",

"rotation_period": "24",

"orbital_period": "4818",

"diameter": "10200",

"climate": "temperate, tropical",

"gravity": "1 standard",

"terrain": "jungle, rainforests",

"surface_water": "8",

"population": "1000",

"residents": [],

"films": [

"https://swapi.py4e.com/api/films/1/"

],

"created": "2014-12-10T11:37:19.144000Z",

"edited": "2014-12-20T20:58:18.421000Z",

"url": "https://swapi.py4e.com/api/planets/3/"

}

```

  

### CharactersEndpoint

#### Lista o personagem se clicar no personagem

- **URL**: https://swapi.py4e.com/api/people/{Número do personagem especificado}

**URL na aplicação**: /SWAPI-PHP/character//{Número do personagem especificado}

- **Método**: GET

- **Descrição**: Retorna o personagem especificado.

- **Exemplo de Resposta**:

```json

{

"name": "Luke Skywalker",

"height": "172",

"mass": "77",

"hair_color": "blond",

"skin_color": "fair",

"eye_color": "blue",

"birth_year": "19BBY",

"gender": "male",

"homeworld": "https://swapi.py4e.com/api/planets/1/",

"films": [

"https://swapi.py4e.com/api/films/1/",

],

"species": [

"https://swapi.py4e.com/api/species/1/"

],

"vehicles": [

"https://swapi.py4e.com/api/vehicles/14/",

],

"starships": [

"https://swapi.py4e.com/api/starships/12/",

],

"created": "2014-12-09T13:50:51.644000Z",

"edited": "2014-12-20T21:17:56.891000Z",

"url": "https://swapi.py4e.com/api/people/1/"

}
```

### SpeciesEndpoint

#### Lista a espécie se clicar na espécie

-  **URL**: https://swapi.py4e.com/api/species/{Número da espécie especificada}

**URL na aplicação**: /SWAPI-PHP/species/{Número da espécie especificada}

-  **Método**: GET

-  **Descrição**: Retorna a espécie especificada.

-  **Exemplo de Resposta**:

```json

{

"name": "Human",

"classification": "mammal",

"designation": "sentient",

"average_height": "180",

"skin_colors": "caucasian, black, asian, hispanic",

"hair_colors": "blonde, brown, black, red",

"eye_colors": "brown, blue, green, hazel, grey, amber",

"average_lifespan": "120",

"homeworld": "https://swapi.py4e.com/api/planets/9/",

"language": "Galactic Basic",

"people": [

"https://swapi.py4e.com/api/people/1/",

],

"films": [

"https://swapi.py4e.com/api/films/1/",

],

"created": "2014-12-10T13:52:11.567000Z",

"edited": "2014-12-20T21:36:42.136000Z",

"url": "https://swapi.py4e.com/api/species/1/"

}

```

  

### StarshipsEndpoint

#### Lista a nave se clicar na nave

- **URL**: https://swapi.py4e.com/api/species/{Número da nave especificada}

**URL na aplicação**: /SWAPI-PHP/starship/{Número da nave especificada}

- **Método**: GET

- **Descrição**: Retorna a nave especificada.

- **Exemplo de Resposta**:

```json

{

"name": "Death Star",

"model": "DS-1 Orbital Battle Station",

"manufacturer": "Imperial Department of Military Research, Sienar Fleet Systems",

"cost_in_credits": "1000000000000",

"length": "120000",

"max_atmosphering_speed": "n/a",

"crew": "342,953",

"passengers": "843,342",

"cargo_capacity": "1000000000000",

"consumables": "3 years",

"hyperdrive_rating": "4.0",

"MGLT": "10",

"starship_class": "Deep Space Mobile Battlestation",

"pilots": [],

"films": [

"https://swapi.py4e.com/api/films/1/"

],

"created": "2014-12-10T16:36:50.509000Z",

"edited": "2014-12-20T21:26:24.783000Z",

"url": "https://swapi.py4e.com/api/starships/9/"

}

```

  

### VehiclesEndPoint

#### Lista o veículo se clicar no veículo

-  **URL**: https://swapi.py4e.com/api/vehicles/{Número do veículo especificado}

**URL na aplicação**: /SWAPI-PHP/vehicle/{Número do veículo especificado}

-  **Método**: GET

-  **Descrição**: Retorna o veículo especificado.

-  **Exemplo de Resposta**:

```json

{

"name": "T-16 skyhopper",

"model": "T-16 skyhopper",

"manufacturer": "Incom Corporation",

"cost_in_credits": "14500",

"length": "10.4 ",

"max_atmosphering_speed": "1200",

"crew": "1",

"passengers": "1",

"cargo_capacity": "50",

"consumables": "0",

"vehicle_class": "repulsorcraft",

"pilots": [],

"films": [

"https://swapi.py4e.com/api/films/1/"

],

"created": "2014-12-10T16:01:52.434000Z",

"edited": "2014-12-20T21:30:21.665000Z",

"url": "https://swapi.py4e.com/api/vehicles/6/"

}
