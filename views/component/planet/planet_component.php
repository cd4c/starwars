<style>
    .card-planet {
        transition: transform 0.3s;
    }
    
    .card-planet:hover {
        transform: translateY(-5px);
    }

    .list-group :hover {
        background-color: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
</style>
<div class="card-body card-planet">
    <h5 class="card-title text-center mb-3"><?php echo $planet['name']; ?></h5>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><b>Clima:</b> <?php echo $planet['climate']; ?></li>
        <li class="list-group-item"><b>Terreno:</b> <?php echo $planet['terrain']; ?></li>
        <li class="list-group-item"><b>Población:</b> <?php echo $planet['population']; ?></li>
        <li class="list-group-item"><b>Diametro:</b> <?php echo $planet['diameter']; ?></li>
    </ul>
</div>