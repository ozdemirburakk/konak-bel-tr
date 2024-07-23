<?php
require_once 'dbcontext/Database.php';
require_once 'classes/Breadcrumb.php';
require_once 'classes/SideNavigation.php';
require_once 'classes/Menu.php';
require_once 'classes/Footer.php';

// Veritabanı bağlantısı
$database = new Database();
$pdo = $database->getConnection();

$page_slug = $_GET['seo_url'];

// Müdürlük detaylarını al
$dbHandler = new DBHandler($pdo);
$proje = $dbHandler->getProjeBySlug($page_slug);


if ($proje) {
    $titleVer = $proje['proje_adi'] . ' | T.C. Konak Belediyesi';
    $proje_id = $proje['id'];
    $proje_adi = $proje['proje_adi'];
    $proje_icerik = $proje['proje_icerik'];
    $proje_url_slug = $proje['url_slug'];
} else {
    echo "Sayfa bulunamadı.";
    $titleVer = 'T.C. Konak Belediyesi';
    exit;
}

$projeGallery = $dbHandler->getProjeGallery($proje_id);

// Menü oluştur
$menu = new Menu($pdo);
$menuHtml = $menu->renderMenu();

// Footer oluştur
$footer = new Footer($pdo);
$footerHtml = $footer->renderFooter();

// Breadcrumb oluştur
$breadcrumbClass = new Breadcrumb($pdo);
$data = $breadcrumbClass->generateBreadcrumb("projelerimiz","");
$title = $data['title'];
$breadcrumb = $data['breadcrumb'];

// TÜRKÇE BÜYÜK HARF
function turkish_strtoupper_manual($text) {
    $search = ['ı', 'i', 'ğ', 'ü', 'ş', 'ö', 'ç'];
    $replace = ['I', 'İ', 'Ğ', 'Ü', 'Ş', 'Ö', 'Ç'];
    $text = str_replace($search, $replace, $text);
    return strtoupper($text);
}
$title = turkish_strtoupper_manual($title);

// Side navigation oluştur
$sideNav = new SideNavigation($pdo);
ob_start();
// $sideNav->generateSideNavigation($page_name);
$sideNavHtml = ob_get_clean();

// Görünümü render et
include 'views/projelerimiz_detail.view.php';
?>
