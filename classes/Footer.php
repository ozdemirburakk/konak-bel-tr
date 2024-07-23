<?php
require_once 'dbcontext/DBHandler.php';

class Footer {
    private $dbHandler;

    public function __construct($pdo) {
        $this->dbHandler = new DBHandler($pdo);
    }

    public function renderFooter() {
        ob_start();
        include 'views/footer.view.php';
        return ob_get_clean();
    }
}
?>
