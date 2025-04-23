<?php
require_once __DIR__ . '/../config/Database.php';

class InscriptionModel {
    private $conn;

    public function __construct() {
        $this->conn = (new Database())->getConnection();
    }

    // ➕ Créer une nouvelle inscription
    public function createInscription($event_id, $participant_id, $date_inscription) {
        $stmt = $this->conn->prepare("
            INSERT INTO inscriptions (event_id, participant_id, date_inscription) 
            VALUES (?, ?, ?)
        ");
        return $stmt->execute([$event_id, $participant_id, $date_inscription]);
    }

    // 📄 Obtenir toutes les inscriptions avec les noms d'événements et de participants
    public function getAllInscriptions() {
        $stmt = $this->conn->prepare("
            SELECT i.id, e.titre AS titre, p.nom AS nom, p.email, i.date_inscription
            FROM inscriptions i
            JOIN events e ON i.event_id = e.id
            JOIN participants p ON i.participant_id = p.id
            ORDER BY i.date_inscription DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 🔍 Trouver une inscription par ID
    public function getInscriptionById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM inscriptions WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ❌ Supprimer une inscription
    public function deleteInscription($id) {
        $stmt = $this->conn->prepare("DELETE FROM inscriptions WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // (optionnel) 🔍 Vérifier si une inscription existe déjà (évite doublon)
    public function inscriptionExists($event_id, $participant_id) {
        $stmt = $this->conn->prepare("
            SELECT COUNT(*) FROM inscriptions 
            WHERE event_id = ? AND participant_id = ?
        ");
        $stmt->execute([$event_id, $participant_id]);
        return $stmt->fetchColumn() > 0;
    }
}
