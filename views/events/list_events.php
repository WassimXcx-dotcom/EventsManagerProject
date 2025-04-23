<?php
require_once '../../controllers/EventController.php';
include_once '../layout/header.php';

$controller = new EventController();
$events = $controller->getEvents();
?>

<div class="container">
    <h2>Events List</h2>

    <?php if (empty($events)): ?>
        <p>None of events are registered at this moment</p>
    <?php else: ?>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Tiltle</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($events as $event): ?>
                    <tr>
                        <td><?= htmlspecialchars($event['id']) ?></td>
                        <td><?= htmlspecialchars($event['titre']) ?></td>
                        <td><?= htmlspecialchars($event['date_evenement']) ?></td>
                        <td><?= nl2br(htmlspecialchars($event['description'])) ?></td>
                        <td>
                            <a class="action-btn edit" href="edit_event.php?id=<?= $event['id'] ?>">Update</a>
                            <!-- Optionally: <a class="action-btn delete" href="#">Supprimer</a> -->
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php include_once '../layout/footer.php'; ?>
