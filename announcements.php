<?php
require_once 'dbcontext/Database.php';
require_once 'classes/Breadcrumb.php';
require_once 'classes/SideNavigation.php';
require_once 'classes/Menu.php';
require_once 'classes/Pagination.php';
require_once 'classes/Footer.php';

// Veritabanı bağlantısı
$database = new Database();
$pdo = $database->getConnection();

$page_name = 'duyurular';
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($current_page < 1) {
    $current_page = 1;
}
$news_per_page = 12;

// Haberleri ve toplam sayfa sayısını al
$dbHandler = new DBHandler($pdo);
$total_news = $dbHandler->getNewsCount(2,1);
$total_pages = ceil($total_news / $news_per_page);
$offset = ($current_page - 1) * $news_per_page;
$haberler = $dbHandler->getNewsWithPagination($offset, $news_per_page,2,1);

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

// Side navigation oluştur
$sideNav = new SideNavigation($pdo);
ob_start();
$sideNav->generateSideNavigation($page_name);
$sideNavHtml = ob_get_clean();

// Görünümü render et
$titleVer = $title . ' | T.C. Konak Belediyesi';
include 'views/announcements.view.php';
