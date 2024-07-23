<?php
require_once 'dbcontext/Database.php';

$database = new Database();
$pdo = $database->getConnection();

$q = $_GET['q'];

$haberler_sql = "SELECT title FROM news WHERE title LIKE :q AND created_at > '2024-05-20 10:36:50' AND category_id = 1";
$duyurular_sql = "SELECT title FROM news WHERE title LIKE :q AND created_at > '2024-05-20 10:36:50' AND category_id = 2";
$search_sql = "SELECT sonuc_id FROM arama_etiket WHERE etiket LIKE :q";

try {
    // HABERLER sorgusu
    $stmt_haberler = $pdo->prepare($haberler_sql);
    $stmt_haberler->execute(['q' => "%$q%"]);
    $haberler_result = $stmt_haberler->fetchAll(PDO::FETCH_ASSOC);
    $haberler_count = count($haberler_result);

    // DUYURULAR sorgusu
    $stmt_duyurular = $pdo->prepare($duyurular_sql);
    $stmt_duyurular->execute(['q' => "%$q%"]);
    $duyurular_result = $stmt_duyurular->fetchAll(PDO::FETCH_ASSOC);
    $duyurular_count = count($duyurular_result);

    // ETİKET sorgusu
    $stmt_search = $pdo->prepare($search_sql);
    $stmt_search->execute(['q' => "%$q%"]);
    $search_result = $stmt_search->fetchAll(PDO::FETCH_ASSOC);
    $search_count = count($search_result);

    echo '<ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="onerilen-tab" data-bs-toggle="tab" data-bs-target="#onerilen" type="button" role="tab" aria-controls="onerilen" aria-selected="true">
                Önerilen
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="haberler-tab" data-bs-toggle="tab" data-bs-target="#haberler" type="button" role="tab" aria-controls="haberler" aria-selected="false">
                Haberler <span class="badge">' . $haberler_count . '</span>
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="duyurular-tab" data-bs-toggle="tab" data-bs-target="#duyurular" type="button" role="tab" aria-controls="duyurular" aria-selected="false">
                Duyurular <span class="badge">' . $duyurular_count . '</span>
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="hizmetler-tab" data-bs-toggle="tab" data-bs-target="#hizmetler" type="button" role="tab" aria-controls="hizmetler" aria-selected="false">
                Hizmetler <span class="badge">' . $search_count . '</span>
            </button>
        </li>
    </ul>
    <div class="search-menu-divider"></div>
    <div class="tab-content" id="myTabContent">';


    echo '<div class="tab-pane fade show active" id="onerilen" role="tabpanel" aria-labelledby="onerilen-tab">';
    if ($search_count > 0) {
        $a = 0;
        foreach ($search_result as $row) {
            $sonuc_id = $row['sonuc_id'];
            $sonuc_sql = "SELECT * FROM arama_sonuc WHERE id = :id";
            $stmt_sonuc = $pdo->prepare($sonuc_sql);
            $stmt_sonuc->execute(['id' => $sonuc_id]);
            $sonuc_data = $stmt_sonuc->fetchAll(PDO::FETCH_ASSOC);
            foreach ($sonuc_data as $row2) {
                $a++;
                echo '<div class="search-content">
                    <div class="search-content-left">
                        <img src="assets/icons/search/services.svg" />
                        <span> ' . $row2['sonuc_adi'] . ' </span>
                    </div>
                    <div class="search-content-right">
                        <span> Hizmetler </span>
                    </div>
                </div>';
                if ($a == $search_count &&  $haberler_count == 0) {
                    echo '';
                } else {
                    echo '<div class="search-result-divider"></div>';
                }
            }
        }
    }
    if ($haberler_count > 0) {
        $a = 0;
        foreach ($haberler_result as $row) {
            $a++;
            echo '<div class="search-content">
                    <div class="search-content-left">
                        <img src="assets/icons/search/news.svg" />
                        <span> ' . $row['title'] . ' </span>
                    </div>
                    <div class="search-content-right">
                        <span> Haberler </span>
                    </div>
                </div>';
            if ($a == $haberler_count) {
                echo '';
            } else {
                echo '<div class="search-result-divider"></div>';
            }
        }
    }
    if ($search_count === 0 && $haberler_count === 0) {
        echo 'Sonuç bulunamadı.';
    }
    echo '</div>';


    echo '<div class="tab-pane fade" id="haberler" role="tabpanel" aria-labelledby="haberler-tab">';
    if ($haberler_count > 0) {
        $a = 0;
        foreach ($haberler_result as $row) {
            $a++;
            echo '<div class="search-content">
                    <div class="search-content-left">
                        <img src="assets/icons/search/news.svg" />
                        <span> ' . $row['title'] . ' </span>
                    </div>
                    <div class="search-content-right">
                        <span> Haberler </span>
                    </div>
                </div>';
            if ($a == $haberler_count) {
                echo '';
            } else {
                echo '<div class="search-result-divider"></div>';
            }
        }
    } else {
        echo 'Sonuç bulunamadı.';
    }
    echo '</div>';


    echo '<div class="tab-pane fade" id="duyurular" role="tabpanel" aria-labelledby="duyurular-tab">';
    if ($duyurular_count > 0) {
        $a = 0;
        foreach ($duyurular_result as $row) {
            $a++;
            echo '<div class="search-content">
                    <div class="search-content-left">
                        <img src="assets/icons/search/services.svg" />
                        <span> ' . $row['title'] . ' </span>
                    </div>
                    <div class="search-content-right">
                        <span> Duyurular </span>
                    </div>
                </div>';
            if ($a == $duyurular_count) {
                echo '';
            } else {
                echo '<div class="search-result-divider"></div>';
            }
        }
    } else {
        echo 'Sonuç bulunamadı.';
    }
    echo '</div>';


    echo '<div class="tab-pane fade" id="hizmetler" role="tabpanel" aria-labelledby="etiketler-tab">';
    if ($search_count > 0) {
        foreach ($search_result as $row) {
            $sonuc_id = $row['sonuc_id'];
            $sonuc_sql = "SELECT * FROM arama_sonuc WHERE id = :id";
            $stmt_sonuc = $pdo->prepare($sonuc_sql);
            $stmt_sonuc->execute(['id' => $sonuc_id]);
            $sonuc_data = $stmt_sonuc->fetchAll(PDO::FETCH_ASSOC);
            foreach ($sonuc_data as $row2) {
                $a++;
                echo '<div class="search-content">
                    <div class="search-content-left">
                        <img src="assets/icons/search/services.svg" />
                        <span> ' . $row2['sonuc_adi'] . ' </span>
                    </div>
                    <div class="search-content-right">
                        <span> Hizmetler </span>
                    </div>
                </div>';
                if ($a == $search_count) {
                    echo '';
                } else {
                    echo '<div class="search-result-divider"></div>';
                }
            }
        }
    } else {
        echo 'Sonuç bulunamadı.';
    }
    echo '</div>';

    echo '</div>';
} catch (PDOException $e) {
    echo 'Query failed: ' . $e->getMessage();
}

$pdo = null;
