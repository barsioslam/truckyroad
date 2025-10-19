<div class="container mt-4">
    <h2>Devenir Food Truck</h2>

    <?php if (!empty($errors['general'])): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($errors['general']) ?></div>
    <?php endif; ?>

    <form action="/account/register_truck" method="POST">
        <div class="mb-3">
            <label for="truck_name" class="form-label">Nom du Food Truck</label>
            <input type="text" class="form-control" id="truck_name" name="truck_name" 
                   value="<?= htmlspecialchars($values['truck_name'] ?? '') ?>" required>
            <?php if (!empty($errors['truck_name'])): ?>
                <div class="text-danger"><?= htmlspecialchars($errors['truck_name']) ?></div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="truck_type" class="form-label">Type de cuisine</label>
            <input type="text" class="form-control" id="truck_type" name="truck_type" 
                   value="<?= htmlspecialchars($values['truck_type'] ?? '') ?>" required>
            <?php if (!empty($errors['truck_type'])): ?>
                <div class="text-danger"><?= htmlspecialchars($errors['truck_type']) ?></div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="truck_description" class="form-label">Description</label>
            <textarea class="form-control" id="truck_description" name="truck_description" rows="3"><?= htmlspecialchars($values['truck_description'] ?? '') ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer mon Food Truck</button>
    </form>
</div>
