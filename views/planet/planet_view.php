<div class="row g-4">
    <?php foreach ($planets['results'] as $planet): ?>
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
                <?php include __DIR__ . '/planet.php'; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<nav class="mt-4">
    <ul class="pagination justify-content-center">
        <?php if ($page > 1): ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?php echo $page - 1; ?>">Previous</a>
            </li>
        <?php endif; ?>
        <?php if ($planets['next']): ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?php echo $page + 1; ?>">Next</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>
