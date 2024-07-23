<?php
class SideNavigation {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function generateSideNavigation($page_slug) {
        // Sayfalar tablosundan mevcut sayfanın kategori_id'sini alalım
        $sql = "SELECT * FROM sayfalar WHERE url_slug = :url_slug";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['url_slug' => $page_slug]);
        $sayfa = $stmt->fetch();

        if ($sayfa) {
            $current_kategori_id = $sayfa['kategori_id'];

            // Kategoriler tablosunda bu kategori_id'ye sahip kategori bilgilerini alalım
            $sql = "SELECT * FROM kategoriler WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['id' => $current_kategori_id]);
            $kategori = $stmt->fetch();

            if ($kategori) {
                $ust_kategori_id = $kategori['ust_kategori'];

                // Ust_kategori_id'ye sahip tüm kategorileri alalım
                $sql = "SELECT * FROM kategoriler WHERE ust_kategori = :ust_kategori ORDER BY sira";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute(['ust_kategori' => $ust_kategori_id]);
                $ust_kategoriler = $stmt->fetchAll();

                echo '<div class="inner-page-right"><ul>';

                foreach ($ust_kategoriler as $ust_kategori) {
                    $is_open = $ust_kategori['id'] == $current_kategori_id ? ' open' : '';

                    echo '<li class="has-submenu' . $is_open . '">
                            <a href="#" onclick="changeColor(this)">
                                <span>' . $ust_kategori['adi'] . '</span>
                                <svg class="right-button" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.27417 10.5874C5.44996 10.4119 5.68824 10.3133 5.93668 10.3133C6.18511 10.3133 6.42339 10.4119 6.59918 10.5874L14.9992 18.9874L23.3992 10.5874C23.485 10.4953 23.5885 10.4215 23.7035 10.3702C23.8185 10.319 23.9426 10.2914 24.0685 10.2892C24.1944 10.287 24.3194 10.3101 24.4362 10.3573C24.5529 10.4044 24.6589 10.4746 24.748 10.5637C24.837 10.6527 24.9072 10.7587 24.9543 10.8755C25.0015 10.9922 25.0246 11.1172 25.0224 11.2431C25.0202 11.369 24.9926 11.4931 24.9414 11.6081C24.8902 11.7231 24.8163 11.8266 24.7242 11.9124L15.6617 20.9749C15.4859 21.1505 15.2476 21.2491 14.9992 21.2491C14.7507 21.2491 14.5125 21.1505 14.3367 20.9749L5.27417 11.9124C5.09861 11.7367 5 11.4984 5 11.2499C5 11.0015 5.09861 10.7632 5.27417 10.5874Z" fill="white" />
                                </svg>
                            </a>
                            <div class="inner-page-divider-wrapper">
                                <div class="inner-page-divider"></div>
                            </div>
                            <ul class="inner-page-submenu">';

                    // Alt kategoriler ve sayfalar
                    $sql2 = "SELECT * FROM sayfalar WHERE kategori_id = :kategori_id AND aktif = 1 ORDER BY sira";
                    $stmt2 = $this->pdo->prepare($sql2);
                    $stmt2->execute(['kategori_id' => $ust_kategori['id']]);
                    $sayfalar = $stmt2->fetchAll();

                    foreach ($sayfalar as $sayfa) {
                        $seo_url_nav = $this->generateSeoUrl($sayfa['id']);
                        $is_active = $sayfa['url_slug'] == $page_slug ? ' active' : '';
                        if (!empty($seo_url_nav)) {
                            echo '<li><a href="/' . $seo_url_nav . '" class="' . $is_active . '" onclick="changeColor(this)">' . $sayfa['adi'] . '</a></li>';
                        } else {
                            echo '<li><a href="' . $sayfa['url'] . '" target="_blank" class="' . $is_active . '" onclick="changeColor(this)">' . $sayfa['adi'] . '</a></li>';
                            
                        }
                   
                    }

                    // inner-page-divider-wrapper eklenmesi
                    echo '<div class="inner-page-divider-wrapper">
                              <div class="inner-page-divider"></div>
                          </div>';
                    echo '</ul>
                        </li>';
                }
                echo '</ul></div>';
            }
        }
    }

    public function generateSeoUrl($current_page_id) {
        $sql = "SELECT url_slug FROM sayfalar WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $current_page_id]);
        $sayfa = $stmt->fetch();
        if ($sayfa) {
            return $sayfa['url_slug'];
        }
        return '';
    }
}
?>
