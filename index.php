<?php
require_once 'dbcontext/Database.php';
require_once 'classes/Menu.php';
require_once 'classes/News.php';

$database = new Database();
$pdo = $database->getConnection();

$menu = new Menu($pdo);
$news = new News($pdo);
$activities =new News($pdo);

$latestNews = $news->getLatestNews();
$created_at = $latestNews['created_at'];
$date = new DateTime($created_at);
$formatter = new IntlDateFormatter('tr_TR', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
$formatter->setPattern('d MMMM yyyy');
$url_slug = $latestNews['link'];
$news_title = $latestNews['title'];
$news_image = $latestNews['image'];

$a_latestNews = $news->getLatestAnnouncements();
$a_created_at = $a_latestNews['created_at'];
$a_date = new DateTime($a_created_at);
$a_formatter = new IntlDateFormatter('tr_TR', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
$a_formatter->setPattern('d MMMM yyyy');
$a_url_slug = $a_latestNews['link'];
$announcement_title = $a_latestNews['title'];
$announcement_image = $a_latestNews['image'];

$ac_latestActivities = $activities->getLatestActivities();
$ac_created_at = $ac_latestActivities['created_at'];
$ac_date = new DateTime($ac_created_at);
$ac_formatter = new IntlDateFormatter('tr_TR', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
$ac_formatter->setPattern('d MMMM yyyy');
$ac_url_slug = $ac_latestActivities['link'];
$activities_title = $ac_latestActivities['title'];
$activities_image = $ac_latestActivities['image'];

$menuHtml = $menu->renderMenu();

include 'views/index.view.php';
