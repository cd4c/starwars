# TODO List

## General

- [ ] MVP (minimum viable product)

## Planetas

- [x] Mostrar todos los planetas
- [x] Detalles del planeta
- [x] Enlace a sus personajes

## Personajes

- [x] Mostrar todos los personajes
- [x] Detalles de personaje
- [x] Añadir enlace a su planeta

## Viajes a planetas

- [ ] Filtrar por clima
- [ ] Filtrar por terreno
- [ ] Filtrar por poblacion

### OPCIONAL

- [ ] Buscador por nombre de planeta

## Web Scraping

- [ ] URL entidades (todas las que se puedan)
- [ ] URL de la imagen de la entidad
- [ ] Asociar la URL de la imagen con la entidad en SWAPI

### Apuntes Web Scraping

- dependiendo del idioma que se eliga en la wikipedia, el contenedor de la imagen cambia de nombre
- en ingles es infobox-image asiq lo hare siempre en ingles ya que es el idioma por defecto
- el contenedor de la primera foto de la wiki es infobox-image (solo hay uno en la pagina asiq estamos chill)
- el a contiene una imagen y el src de esa imagen es lo que necesitamos
- SABIENDO ESTO:
tenemos que buscar en la url de la wikipedia la entidad (planeta, personaje, etc) y buscar el infobox-image de la url
de ahi sacamos el src de la imagen y lo asociamos a la entidad al hacer la llamada a SWAPI
si todo sale bien, este metodo solo puede fallar si la wikipedia elimina la entidad correspondiente
