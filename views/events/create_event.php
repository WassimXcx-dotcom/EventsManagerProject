<?php
require_once '../../controllers/EventController.php';
include_once '../layout/header.php';

$controller = new EventController();

$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'] ?? '';
    $date = $_POST['date_evenement'] ?? '';
    $description = $_POST['description'] ?? '';

    $result = $controller->createEvent($titre, $date, $description);

    if ($result['success']) {
        $message = $result['message'];
    } else {
        $error = $result['message'];
    }
}
?>

<div class="container">
    <h2>Create Event</h2>

    <?php if ($message): ?>
        <div class="alert success"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <?php if ($error): ?>
        <div class="alert error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form action="" method="POST" class="event-form">
        <div class="form-group">
            <label for="titre">Event Name:</label>
            <input type="text" id="titre" name="titre" required>
        </div>

        <div class="form-group">
            <label for="date_evenement">Event date:</label>
            <input type="date" id="date_evenement" name="date_evenement" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn">Create Event</button>
    </form>
</div>

<?php include_once '../layout/footer.php'; ?>
