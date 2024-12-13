# TODO List

## General

- [ ] MVP (minimum viable product)

## Planetas

- [x] Mostrar todos los planetas
- [ ] Detalles del planeta
- [ ] Enlace a sus personajes

## Personajes

- [ ] Mostrar todos los personajes
- [ ] Detalles de personaje
- [ ] Añadir enlace a su planeta

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

- el contenedor de la primera foto de la wiki es infobox-image (solo hay uno en la pagina asiq estamos chill)
- el a contiene una imagen y el src de esa imagen es lo que necesitamos
- SABIENDO ESTO:
-- tenemos que buscar en la url de la wikipedia la entidad (planeta, personaje, etc) y buscar el infobox-image de la url
-- de ahi sacamos el src de la imagen y lo asociamos a la entidad al hacer la llamada a SWAPI
-- si todo sale bien, este metodo solo puede fallar si la wikipedia elimina la entidad correspondiente
