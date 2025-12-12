<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h2>Registrar Acceso</h2>

<div class="card">
    <form action="/index.php?controller=member&action=registerAccess" method="POST">
        <div class="form-group">
            <label for="member_id">Seleccionar Miembro:</label>
            <select name="member_id" id="member_id" class="form-control" required>
                <option value="">-- Seleccione un miembro --</option>
                <?php foreach ($members as $member): ?>
                    <?php
                    $today = date('Y-m-d');
                    $isExpired = $member['expiration_date'] && $member['expiration_date'] < $today;
                    $isAllowed = $member['status'] === 'active' && $member['entry_available'] && !$isExpired;
                    $statusText = $isAllowed ? 'Permitido' : 'Negado';
                    ?>
                    <option value="<?php echo $member['id']; ?>">
                        <?php echo htmlspecialchars($member['name']); ?> (<?php echo $statusText; ?>)
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-success">Registrar Entrada</button>
            <a href="/index.php?controller=member&action=index" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>