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

// $page_name = "meclis-karar-ozetleri";

// URL'den slug (page_name) ve tarih bilgilerini al
$urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathParts = explode('/', trim($urlPath, '/'));

// pathParts[1] varsa ve yıl (4 rakam) değilse bunu page_name olarak al, yoksa pathParts[0]
$page_name = isset($pathParts[1]) && !preg_match('/^\d{4}$/', $pathParts[1]) ? $pathParts[1] : (isset($pathParts[0]) ? $pathParts[0] : null);


if($page_name == "meclis-karar-ozetleri"){
    $agendatype = 2;
    $agendatext = " Meclis Karar Özeti";
}
if($page_name == "meclis-tutanaklari"){
    $agendatype = 3;
    $agendatext = " Meclis Tutanağı";
}
if($page_name == "meclis-gundemi"){
    $agendatype = 1;
    $agendatext = " Meclis Gündemi";
}

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

$page_slug = $sayfa['adi'];

$year = isset($_GET['year']) ? $_GET['year'] : date('Y');
$month = isset($_GET['month']) ? $_GET['month'] : date('m');

$meclis_documents = $dbHandler->getMeclisDocuments($year, $month, $agendatype);

// Menü oluştur
$menu = new Menu($pdo);
$menuHtml = $menu->renderMenu();

// Breadcrumb oluştur
$breadcrumbClass = new Breadcrumb($pdo);
$data = $breadcrumbClass->generateBreadcrumb($page_name, "");
$title = $data['title'];
$breadcrumb = $data['breadcrumb'];

// TÜRKÇE BÜYÜK HARF
function turkish_strtoupper_manual($text)
{
    $search = ['ı', 'i', 'ğ', 'ü', 'ş', 'ö', 'ç'];
    $replace = ['I', 'İ', 'Ğ', 'Ü', 'Ş', 'Ö', 'Ç'];
    $text = str_replace($search, $replace, $text);
    return strtoupper($text);
}
$title = turkish_strtoupper_manual($title);

// Footer oluştur
$footer = new Footer($pdo);
$footerHtml = $footer->renderFooter();

// Side navigation oluştur
$sideNav = new SideNavigation($pdo);
ob_start();
$sideNav->generateSideNavigation($page_name);
$sideNavHtml = ob_get_clean();

// Görünümü render et
include 'views/meclis_dosya.view.php';

?>

<script>
    // PHP'den page_name değerini JavaScript'e aktar
    const pageName = '<?= $page_name ?>';
</script>