<div class="vacation-search container py-5">
    <h1 class="mb-4 text-center">Buscar Planeta Ideal</h1>

    <form method="GET" action="" class="mb-5">
        <div class="row g-3">
            <div class="col-md-4">
                <label for="clima" class="form-label">Clima</label>
                <select name="clima[]" id="clima" class="form-select" multiple>
                    <?php foreach ($uniqueClimates as $climate): ?>
                        <option value="<?= $climate ?>"><?= $climate ?></option>
                    <?php endforeach; ?>
                </select>
                <small class="text-muted">Puedes seleccionar múltiples opciones</small>
            </div>

            <div class="col-md-4">
                <label for="terreno" class="form-label">Terreno</label>
                <select name="terreno[]" id="terreno" class="form-select" multiple>
                    <?php foreach ($uniqueTerrains as $terrain): ?>
                        <option value="<?= $terrain ?>"><?= $terrain ?></option>
                    <?php endforeach; ?>
                </select>
                <small class="text-muted">Puedes seleccionar múltiples opciones</small>
            </div>

            <div class="col-md-2">
                <label for="poblacion" class="form-label">Población mínima</label>
                <input type="number" name="poblacion_min" id="poblacion" class="form-control" placeholder="Ej: 1000">
            </div>

            <div class="col-md-2">
                <label for="poblacion_max" class="form-label">Población máxima</label>
                <input type="number" name="poblacion_max" id="poblacion_max" class="form-control" placeholder="Ej: 1000000">
            </div>
        </div>

        <div class="mt-4 text-center">
            <button type="submit" class="btn btn-dark btn-lg">Buscar</button>
        </div>
    </form>

    <div class="results">
        <?php if (isset($filteredPlanets) && count($filteredPlanets) > 0): ?>
            <h2 class="mb-4 text-center">Resultados</h2>
            <div class="row g-4">
                <?php foreach ($filteredPlanets as $planet):
                    $planetId = basename(rtrim($planet['url'], '/')); ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm">
                            <a href="/starwars/planetas?id=<?= $planetId ?>" class="text-dark text-decoration-none">
                                <?php include __DIR__ . '/../planet/planet_component.php'; ?>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-center text-muted">No se encontraron planetas con las condiciones seleccionadas.</p>
        <?php endif; ?>
    </div>
</div>
<!-- para no mandar la llamada con elementos vacios en la url -->
<script>
    document.getElementById('searchForm').addEventListener('submit', function(event) {
        const form = event.target;
        const inputs = form.querySelectorAll('input, select');

        inputs.forEach(input => {
            if ((input.type === 'number' && !input.value.trim()) ||
                (input.tagName === 'SELECT' && input.selectedOptions.length === 0)) {
                input.disabled = true;
            }
        });
    });
</script>