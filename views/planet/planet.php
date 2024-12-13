<style>
    .card-planeta {
        transition: transform 0.3s;
    }
    
    .card-planeta:hover {
        transform: translateY(-5px);
    }

    .list-group :hover {
        background-color: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
</style>
<div class="card-body card-planeta">
    <h5 class="card-title text-center mb-3"><?php echo $planet['name']; ?></h5>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><b>Climate:</b> <?php echo $planet['climate']; ?></li>
        <li class="list-group-item"><b>Terrain:</b> <?php echo $planet['terrain']; ?></li>
        <li class="list-group-item"><b>Population:</b> <?php echo $planet['population']; ?></li>
        <li class="list-group-item"><b>Diameter:</b> <?php echo $planet['diameter']; ?></li>
    </ul>
</div>