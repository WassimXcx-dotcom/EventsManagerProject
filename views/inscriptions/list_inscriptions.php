<?php
require_once '../../controllers/InscriptionController.php';
include_once '../layout/header.php';

$inscriptionController = new InscriptionController();
$inscriptions = $inscriptionController->getInscriptions();
?>

<div class="container">
    <h2>List of participants </h2>

    <?php if (count($inscriptions) > 0): ?>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Event</th>
                    <th>Inscription date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($inscriptions as $index => $inscription): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= htmlspecialchars($inscription['nom']) ?></td>
                        <td><?= htmlspecialchars($inscription['email']) ?></td>
                        <td><?= htmlspecialchars($inscription['titre']) ?></td>
                        <td><?= $inscription['date_inscription'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>None of registrations founded</p>
    <?php endif; ?>
</div>

<?php include_once '../layout/footer.php'; ?>
