<style>
    .card-people {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
    }

    .card-people:hover {
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
    <div class="card card-people p-4">
        <div class="card-body">
            <h1 class="text-center text-primary mb-4"><?php echo $people['name']; ?></h1>

            <div class="row">
                <div class="col-md-6">
                    <h4 class="section-title">Detalles del Personaje</h4>
                    <ul class="list-group mb-4">
                        <li class="list-group-item"><b>Altura:</b> <?php echo $people['height']; ?> cm</li>
                        <li class="list-group-item"><b>Peso:</b> <?php echo $people['mass']; ?> kg</li>
                        <li class="list-group-item"><b>Color de pelo:</b> <?php echo $people['hair_color']; ?></li>
                        <li class="list-group-item"><b>Color de piel:</b> <?php echo $people['skin_color']; ?></li>
                        <li class="list-group-item"><b>Color de ojos:</b> <?php echo $people['eye_color']; ?></li>
                        <li class="list-group-item"><b>Género:</b> <?php echo $people['gender']; ?></li>
                        <li class="list-group-item"><b>Año de nacimiento:</b> <?php echo $people['birth_year']; ?></li>
                        <li class="list-group-item"><b>Lugar de nacimiento:</b> <a href="/starwars/planetas?id=<?php echo $person['homeworldId']; ?>"><?php echo $person['homeworld']; ?></a></li>
                    </ul>
                </div>

                <div class="col-md-6">
                    <h4 class="section-title">Especie</h4>
                    <ul class="list-group mb-4">
                        <?php foreach ($person['species'] as $specie): ?>
                            <li class="list-group-item">
                                <a href="/starwars/personajes?id=<?php echo $specie['id']; ?>" class="text-decoration-none">
                                    <b><?php echo $specie['name']; ?></b> <br>
                                    <b>Clasificación: </b><?php echo $specie['classification']; ?><br>
                                    <b>Media de vida: </b><?php echo $specie['average_lifespan']; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h4 class="section-title">Vehículos</h4>
                    <ul class="list-group">
                        <?php foreach ($person['vehicles'] as $vehicle): ?>
                            <li class="list-group-item">
                                <a href="/starwars/vehiculos?id=<?php echo $vehicle['id']; ?>" class="text-decoration-none">
                                    <b><?php echo $vehicle['name']; ?></b><br>
                                    <b>Modelo: </b><?php echo $vehicle['model']; ?><br>
                                    <b>Clase: </b><?php echo $vehicle['vehicle_class']; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h4 class="section-title">Naves espaciales</h4>
                    <ul class="list-group">
                        <?php foreach ($person['starships'] as $starship): ?>
                            <li class="list-group-item">
                                <a href="/starwars/naves?id=<?php echo $starship['id']; ?>" class="text-decoration-none">
                                    <b><?php echo $starship['name']; ?></b><br>
                                    <b>Modelo: </b><?php echo $starship['model']; ?><br>
                                    <b>Clase: </b><?php echo $starship['starship_class']; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <h4 class="section-title">Películas</h4>
            <ul class="list-group">
                <?php foreach ($person['films'] as $film): ?>
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