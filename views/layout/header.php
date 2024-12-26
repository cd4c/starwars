<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>d4c ~ Star Wars</title>
    <link rel="stylesheet" href="/starwars/assets/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<script>
    window.onload = () => {
        document.getElementById('wokie').onclick = () => {
            const currentUrl = new URL(window.location.href);
            const searchParams = currentUrl.searchParams;

            if (searchParams.has('wokie')) {
                searchParams.delete('wokie');
            } else {
                searchParams.set('wokie', '');
            }

            window.location.href = currentUrl.origin + currentUrl.pathname + '?' + searchParams.toString();
        }
    }
</script>

<body>
    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
            <div class="container">
                <a class="navbar-brand star-wars-logo" href="/starwars/">Star Wars</a>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/starwars/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/starwars/planetas">Planetas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/starwars/personajes">Personajes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/starwars/peliculas">Peliculas</a>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-outline-light ms-3" id="wokie">Wookiee</button>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container py-4">