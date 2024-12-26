<style>
    .card-planet {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
    }

    .card-planet:hover {
        transform: translateY(-10px);
    }

    .section-title {
        text-transform: uppercase;
        font-weight: bold;
        margin-top: 20px;
    }

    .list-group-item:hover {
        background-color: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
</style>
<div class="container my-5">
    <div class="card card-planet p-4">
        <div class="card-body">
            <h1 class="text-center text-primary mb-4"><?php echo $planet['name']; ?></h1>

            <div class="row">
                <div class="col-md-6">
                    <h4 class="section-title">Detalles del Planeta</h4>
                    <ul class="list-group mb-4">
                        <li class="list-group-item"><b>Rotación:</b> <?php echo $planet['rotation_period']; ?> horas</li>
                        <li class="list-group-item"><b>Órbita:</b> <?php echo $planet['orbital_period']; ?> días</li>
                        <li class="list-group-item"><b>Diámetro:</b> <?php echo $planet['diameter']; ?> km</li>
                        <li class="list-group-item"><b>Clima:</b> <?php echo $planet['climate']; ?></li>
                        <li class="list-group-item"><b>Gravedad:</b> <?php echo $planet['gravity']; ?></li>
                        <li class="list-group-item"><b>Terreno:</b> <?php echo $planet['terrain']; ?></li>
                        <li class="list-group-item"><b>Agua Superficial:</b> <?php echo $planet['surface_water']; ?>%</li>
                        <li class="list-group-item"><b>Población:</b> <?php echo $planet['population']; ?></li>
                    </ul>
                </div>

                <div class="col-md-6">
                    <h4 class="section-title">Residentes</h4>
                    <ul class="list-group mb-4">
                        <?php foreach ($planetDetails['residents'] as $resident): ?>
                            <li class="list-group-item">
                                <a href="/starwars/personajes?id=<?php echo $resident['id']; ?>" class="text-decoration-none">
                                    <b><?php echo $resident['name']; ?></b>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <h4 class="section-title">Películas</h4>
            <ul class="list-group">
                <?php foreach ($planetDetails['films'] as $film): ?>
                    <li class="list-group-item">
                        <a href="/starwars/peliculas?id=<?php echo $film['id']; ?>" class="text-decoration-none">
                            <b><?php echo $film['title']; ?></b>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>