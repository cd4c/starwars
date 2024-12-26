<style>
    .card-person {
        transition: transform 0.3s;
    }

    .card-person:hover {
        transform: translateY(-5px);
    }

    .list-group :hover {
        background-color: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
</style>
<div class="card-body card-person">
    <h5 class="card-title text-center mb-3"><?php echo $person['name']; ?></h5>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><b>Altura:</b> <?php echo $person['height']; ?> cm</li>
        <li class="list-group-item"><b>Peso:</b> <?php echo $person['mass']; ?> kg</li>
        <li class="list-group-item"><b>Género:</b> <?php echo $person['gender']; ?></li>
    </ul>
</div>