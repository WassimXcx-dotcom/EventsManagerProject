<?php
require_once __DIR__ . '/../models/EventModel.php';

class EventController {
    private $eventModel;

    public function __construct() {
        $this->eventModel = new EventModel();
    }

    public function createEvent($titre, $date_evenement, $description) {
        if (empty($titre) || empty($date_evenement)) {
            return ['success' => false, 'message' => 'Tous les champs sont obligatoires.'];
        }

        try {
            $this->eventModel->createEvent($titre, $date_evenement, $description);
            return ['success' => true, 'message' => 'Événement créé avec succès.'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => 'Erreur lors de la création : ' . $e->getMessage()];
        }
    }

    public function getEvents() {
        return $this->eventModel->getAllEvents();
    }

    public function getEventById($id){
        return $this->eventModel->getEventById($id)[0];
    }

    public function updateEvent($id,$titre, $date, $description){
        return $this->eventModel->updateEvent($id,$titre, $date, $description);
    }
}
