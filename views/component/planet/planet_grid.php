<div class="row g-4">
    <?php foreach ($data['results'] as $planet):
        // cojo el id usando el reartrim
        $planetId = basename(rtrim($planet['url'], '/'));?>
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
                <a href="/starwars/planetas?id=<?php echo $planetId?>" class="text-dark text-decoration-none">
                    <?php include __DIR__ . '/planet_component.php'; ?>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php include __DIR__ . '/../../layout/pagination.php';