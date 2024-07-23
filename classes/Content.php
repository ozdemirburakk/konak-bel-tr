<?php
class Content {
    private $dbHandler;

    public function __construct($pdo) {
        $this->dbHandler = new DBHandler($pdo);
    }

    public function displayContent($current_page_id) {
        $sayfa = $this->dbHandler->getPageById($current_page_id);

        if ($sayfa) {
            echo '<div class="inner-page-left-content">';
            echo htmlspecialchars_decode($sayfa['icerik'], ENT_QUOTES);
            echo '</div>';
        }
    }
}
?>
