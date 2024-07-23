<?php
require_once 'dbcontext/Database.php';
require_once 'classes/Breadcrumb.php';
require_once 'classes/SideNavigation.php';
require_once 'classes/Content.php';
require_once 'classes/Menu.php';
require_once 'dbcontext/DBHandler.php';
require_once 'classes/Footer.php';

// Veritabanı bağlantısı
$database = new Database();
$pdo = $database->getConnection();
$dbHandler = new DBHandler($pdo);

$page_slug = $_GET['seo_url'];

// Haber detaylarını al
$currentNews = $dbHandler->getNewsBySlug($page_slug);

if ($currentNews) {
    $newsId = $currentNews['id'];
    $titleVer = $currentNews['title'] . ' | T.C. Konak Belediyesi';
    $newsTitle = $currentNews['title'];
    $newsDate = $dbHandler->formatNewsDate($currentNews['created_at']);
    if ($currentNews['text'] != null || $currentNews['text'] != "") {
        $newsContent = htmlspecialchars_decode($currentNews['text'], ENT_QUOTES);
    } else {
        $newsContent = "";
    }
    $newsImage = $currentNews['image'];
    $newsGallery = $dbHandler->getNewsGallery($newsId);
} else {
    echo "Sayfa bulunamadı.";
    $titleVer = 'T.C. Konak Belediyesi';
    exit;
}

// Menü oluştur
$menu = new Menu($pdo);
$menuHtml = $menu->renderMenu();

// Footer oluştur
$footer = new Footer($pdo);
$footerHtml = $footer->renderFooter();

// Breadcrumb oluştur
$breadcrumbClass = new Breadcrumb($pdo);
$breadcrumbData = $breadcrumbClass->generateBreadcrumb("haberler", "news");
$breadcrumb = $breadcrumbData['breadcrumb'];

// TÜRKÇE BÜYÜK HARF
function turkish_strtoupper_manual($text)
{
    $search = ['ı', 'i', 'ğ', 'ü', 'ş', 'ö', 'ç'];
    $replace = ['I', 'İ', 'Ğ', 'Ü', 'Ş', 'Ö', 'Ç'];
    $text = str_replace($search, $replace, $text);
    return strtoupper($text);
}
$newsTitleUpper = turkish_strtoupper_manual($newsTitle);

// Side navigation oluştur
$sideNav = new SideNavigation($pdo);
$recentNews = $dbHandler->getRecentNews($newsId, 3, 1, 1);
ob_start();
foreach ($recentNews as $haber) {
    $created_at = $haber['created_at'];
    $date = $dbHandler->formatNewsDate($created_at);
    $url_slug = $haber['link'];
    echo '<div class="news-detail-right-capsule">
            <a href="/haberler/' . htmlspecialchars($url_slug) . '">
                <div class="news-box">
                    <img src="/assets/images/news/' . $haber['image'] . '" />
                    <span class="news-box-date">' . $date . '</span>
                    <strong>' . $haber['title'] . '</strong>
                </div>
            </a>
        </div>';
}
$sideNavHtml = ob_get_clean();

// Görünümü render et
include 'views/news_detail.view.php';
