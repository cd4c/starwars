<div class="row g-4">
    <?php foreach ($data['results'] as $person):
        // cojo el id usando el reartrim
        $personId = basename(rtrim($person['url'], '/')); ?>
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
                <a href="/starwars/personajes?id=<?php echo $personId ?>" class="text-dark text-decoration-none">
                    <?php include __DIR__ . '/people_component.php'; ?>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php include __DIR__ . '/../../layout/pagination.php';
