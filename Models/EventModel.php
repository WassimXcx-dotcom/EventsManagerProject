<?php
require_once __DIR__ . '/../config/Database.php';

class EventModel {
    private $conn;

    public function __construct() {
        $this->conn = (new Database())->getConnection();
    }

    public function getAllEvents() {
        $stmt = $this->conn->prepare("SELECT * FROM events ORDER BY date_evenement DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createEvent($titre, $date, $description) {
        $stmt = $this->conn->prepare("INSERT INTO events (titre, date_evenement, description) VALUES (?, ?, ?)");
        return $stmt->execute([$titre, $date, $description]);
    }
   

    public function getEventById($id){
       $stmt = $this->conn->prepare("SELECT * FROM events WHERE id=?");
       $stmt->execute([$id]);
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateEvent($id, $titre, $date, $description){
        try{
        $stmt = $this->conn->prepare("UPDATE events set titre=? , description=? , date_evenement=? WHERE id=?");
        return $stmt->execute([$titre,$description,$date,$id]);
        }catch(PDOException $err){
          return false;
        }
    }

}
