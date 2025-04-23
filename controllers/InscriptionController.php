<?php
require_once __DIR__ . '/../models/InscriptionModel.php';

class InscriptionController {
    private $inscriptionModel;

    public function __construct() {
        $this->inscriptionModel = new InscriptionModel();
    }

    public function createInscription($event_id, $participant_id) {
        if (empty($event_id) || empty($participant_id)) {
            return "Veuillez sélectionner un événement et un participant.";
        }

        $date_inscription = date('Y-m-d H:i:s');

        try {
            if ($this->inscriptionModel->inscriptionExists($event_id, $participant_id)) {
                return "Cette personne est déjà inscrite à cet événement.";
            }

            $success = $this->inscriptionModel->createInscription($event_id, $participant_id, $date_inscription);
            return $success ? true : "Erreur lors de l'inscription.";
        } catch (Exception $e) {
            return "Erreur: " . $e->getMessage();
        }
    }

    public function getInscriptions() {
        return $this->inscriptionModel->getAllInscriptions();
    }

    public function deleteInscription($id) {
        return $this->inscriptionModel->deleteInscription($id);
    }
}
