<nav class="mt-4">
    <ul class="pagination justify-content-center">
        <?php if ($page > 1): ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?php echo $page - 1; ?>">Anterior</a>
            </li>
        <?php endif; ?>
        <?php if ($data['next']): ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?php echo $page + 1; ?>">Siguiente</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>