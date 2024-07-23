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
$muhtarlik = $dbHandler->getMuhtarlikBySlug($page_slug);


if ($muhtarlik) {
    $titleVer = $muhtarlik['mh_mah_adi'] . ' | T.C. Konak Belediyesi';
    $muhtarlik_adi = $muhtarlik['mh_mah_adi'];
    $muhtarlik_slug = $muhtarlik['mh_url_slug'];
    $muhtar_adi = $muhtarlik['mh_muh_adi'];
    $muhtarlik_adres = $muhtarlik['mh_muh_adr'];
    $muhtarlik_tel = $muhtarlik['mh_muh_tel']; 
    $muhtarlik_gsm = $muhtarlik['mh_muh_gsm'];
    $muhtarlik_kroki = $muhtarlik['mh_kroki'];
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
$data = $breadcrumbClass->generateBreadcrumb("ilce-yapisi-ve-muhtarliklar","");
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
$sideNav->generateSideNavigation("ilce-yapisi-ve-muhtarliklar");
$sideNavHtml = ob_get_clean();

// Görünümü render et
include 'views/muhtarlik_detail.view.php';
?>
