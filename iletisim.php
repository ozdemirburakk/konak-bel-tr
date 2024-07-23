<?php
require_once 'dbcontext/Database.php';
require_once 'classes/Breadcrumb.php';
require_once 'classes/Content.php';
require_once 'classes/Menu.php';
require_once 'classes/Footer.php';

// Veritabanı bağlantısı
$database = new Database();
$pdo = $database->getConnection();

$page_name = "iletisim";



// Sayfa adından sayfa ID'sini al
$dbHandler = new DBHandler($pdo);
$sayfa = $dbHandler->getPageBySlug($page_name);

if ($sayfa) {
    $sayfa_id = $sayfa['id'];
    $icerik = $sayfa['icerik'];
    $titleVer = $sayfa['adi'] . ' | T.C. Konak Belediyesi';
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
$data = $breadcrumbClass->generateBreadcrumb($page_name,"");
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


// Görünümü render et
include 'views/iletisim.view.php';