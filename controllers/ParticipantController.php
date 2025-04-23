<?php
require_once __DIR__ . '/../models/ParticipantModel.php';

class ParticipantController {
    private $participantModel;

    public function __construct() {
        $this->participantModel = new ParticipantModel();
    }

    public function registerParticipant($nom, $email,$event_id) {
        if (empty($nom) || empty($email)) {
            return ['success' => false, 'message' => 'Nom et email sont requis.'];
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return ['success' => false, 'message' => 'Email invalide.'];
        }

        try {
            $this->participantModel->createParticipant($nom, $email,$event_id);
            return ['success' => true, 'message' => 'Participant inscrit avec succès.'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => 'Erreur d\'inscription : ' . $e->getMessage()];
        }
    }

    public function getParticipants() {
        return $this->participantModel->getAllParticipants();
    }
}
