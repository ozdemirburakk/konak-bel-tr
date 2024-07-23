<?php
require_once 'dbcontext/Database.php';
require_once 'classes/Breadcrumb.php';
require_once 'classes/SideNavigation.php';
require_once 'classes/Content.php';
require_once 'classes/Menu.php';
require_once 'classes/Footer.php';

// Veritabanı bağlantısı
$database = new Database();
$pdo = $database->getConnection();

$page_name = "mudurlukler";


$dbHandler = new DBHandler($pdo);
$mudurlukler = $dbHandler->getMudurlukler();

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

// İçerik oluştur
// $content = new Content($pdo);
// ob_start();
// $content->displayContent($sayfa_id);
// $contentHtml = ob_get_clean();

// Side navigation oluştur
$sideNav = new SideNavigation($pdo);
ob_start();
$sideNav->generateSideNavigation($page_name);
$sideNavHtml = ob_get_clean();

// Görünümü render et
$titleVer = $title . ' | T.C. Konak Belediyesi';
include 'views/mudurlukler.view.php';