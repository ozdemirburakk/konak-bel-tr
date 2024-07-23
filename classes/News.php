<?php
require_once 'dbcontext/DBHandler.php';

class News {
    private $dbHandler;

    public function __construct($pdo) {
        $this->dbHandler = new DBHandler($pdo);
    }

    public function getLatestNews() {
        return $this->dbHandler->getLatestNews(1,1);
    }

    public function getLatestAnnouncements() {
        return $this->dbHandler->getLatestNews(2,1);
    }

    public function getLatestActivities() {
        return $this->dbHandler->getLatestActivities(1);
    }
}
?>
