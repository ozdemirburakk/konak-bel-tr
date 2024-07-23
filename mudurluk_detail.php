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
$mudurluk = $dbHandler->getMudurlukBySlug($page_slug);


if ($mudurluk) {
    $titleVer = $mudurluk['adi'] . ' | T.C. Konak Belediyesi';
    $mudurluk_adi = $mudurluk['adi'];
    $mudur_adi = $mudurluk['mudur_adi'];
    $iletisim_adresi = $mudurluk['iletisim_adresi'];
    $iletisim_telefon = $mudurluk['iletisim_telefon'];
    $iletisim_mail = $mudurluk['iletisim_mail'];
    $mudurluk_icerik = $mudurluk['mudurluk_icerik'];
    $mudurluk_birim = $mudurluk['mudurluk_birim'];
    $mudurluk_id = $mudurluk['id'];
} else {
    echo "Sayfa bulunamadı.";
    $titleVer = 'T.C. Konak Belediyesi';
    exit;
}

$yonetmelik = $dbHandler->getYonetmelik($mudurluk_id);

if ($yonetmelik) {
    $yonetmelik_adi = $yonetmelik['adi'];
    $yonetmelik_url = $yonetmelik['url'];
}

$dokuman = $dbHandler->getDokuman($mudurluk_id);

$hizmetler = $dbHandler->getHizmetler($mudurluk_id);

// Menü oluştur
$menu = new Menu($pdo);
$menuHtml = $menu->renderMenu();

// Footer oluştur
$footer = new Footer($pdo);
$footerHtml = $footer->renderFooter();

// Breadcrumb oluştur
$breadcrumbClass = new Breadcrumb($pdo);
$data = $breadcrumbClass->generateBreadcrumb("mudurlukler","");
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
include 'views/mudurluk_detail.view.php';
?>
