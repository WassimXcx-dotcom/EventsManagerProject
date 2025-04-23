<?php
require_once __DIR__ . '/../config/Database.php';

class ParticipantModel {
    private $conn;

    public function __construct() {
        $this->conn = (new Database())->getConnection();
    }

    // ➕ Créer un nouveau participant
    public function createParticipant($nom, $email,$event_id) {
        try{
        $stmt = $this->conn->prepare("SELECT * FROM participants WHERE email = ?");
        $stmt->execute([$email]);
        $participant = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$participant) {
        $stmt = $this->conn->prepare("INSERT INTO participants (nom, email) VALUES (?, ?)");
        $stmt->execute([$nom, $email]);
        $stmt = $this->conn->prepare("SELECT * FROM participants WHERE email = ?");
        $stmt->execute([$email]);
        $participant = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        $stmt = $this->conn->prepare("SELECT * FROM inscriptions WHERE participant_id = ? and event_id=?");
        $stmt->execute([$participant['id'] ,$event_id ]);
        $existing = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$existing){
            $stmt = $this->conn->prepare("
            INSERT INTO inscriptions (event_id, participant_id, date_inscription) 
            VALUES (?, ?, ?)
        ");
        $date_inscription = date('Y-m-d H:i:s');
        $stmt->execute([$event_id,$participant['id'],$date_inscription ]);
        }
        return true;
     }catch(PDOException $err){
           return false;
     }
    }
    

    // 📄 Obtenir tous les participants
    public function getAllParticipants() {
        $stmt = $this->conn->prepare("SELECT * FROM participants ORDER BY nom ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 🔍 Trouver un participant par ID
    public function getParticipantById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM participants WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ✏️ Mettre à jour un participant
    public function updateParticipant($id, $nom, $email) {
        $stmt = $this->conn->prepare("UPDATE participants SET nom = ?, email = ? WHERE id = ?");
        return $stmt->execute([$nom, $email, $id]);
    }

    // ❌ Supprimer un participant
    public function deleteParticipant($id) {
        $stmt = $this->conn->prepare("DELETE FROM participants WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
