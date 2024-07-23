<?php
require_once 'dbcontext/DBHandler.php';

class Menu
{
    private $dbHandler;

    public function __construct($pdo)
    {
        $this->dbHandler = new DBHandler($pdo);
    }

    public function timeDate()
    {
    

    }

    public function renderMenu()
    {
            // Belirli bir tarihi oluştur
            $date = new DateTime();

            // Ayları Türkçe olarak elde et
            $monthsOfYear = [
                'January' => 'Ocak',
                'February' => 'Şubat',
                'March' => 'Mart',
                'April' => 'Nisan',
                'May' => 'Mayıs',
                'June' => 'Haziran',
                'July' => 'Temmuz',
                'August' => 'Ağustos',
                'September' => 'Eylül',
                'October' => 'Ekim',
                'November' => 'Kasım',
                'December' => 'Aralık'
            ];
    
            // Günü ve ayı formatla
            $dayNumber = $date->format('d');
            $monthInEnglish = $date->format('F');
            $monthInTurkish = $monthsOfYear[$monthInEnglish];
            $year = $date->format('Y');
            $time_text = strtoupper($dayNumber . ' ' . $monthInTurkish . ' ' . $year);


        $kategoriler = [];
        $dropdowns = [];

        $categories = $this->dbHandler->getCategories();

        foreach ($categories as $category) {
            if (empty($category['url'])) {
                $kategoriler[] = '<div class="menu-link" data-target="dd-' . $category['id'] . '">
                                  <div class="menu-link-items"><span>' . $category['adi'] . ' </span>
                                  <img src="/assets/icons/bottom_arrow.svg" /></div>
                                  </div>';
            } else {
                $kategoriler[] = '<div class="menu-link">
                                  <div class="menu-link-items"><a href="' . $category['url'] . '"><span>' . $category['adi'] . '</span></a></div>
                                  </div>';
            }

            $subcategories = $this->dbHandler->getSubCategories($category['id']);
            $dropdown = '<div class="menu-dropdown" id="dd-' . $category['id'] . '"><div class="menu-dropdown-inside">';

            foreach ($subcategories as $subcategory) {
                $dropdown .= '<div class="menu-dropdown-inside-sub"><ul><div class="inside-sub-title">' . $subcategory['adi'] . '</div><div class="submenu-row-divider"> </div>';

                $pages = $this->dbHandler->getPages($subcategory['id']);
                foreach ($pages as $page) {
                    $seo_url = $this->dbHandler->generateSeoUrl($page['id']);
                    if (!empty($seo_url)) {
                        $dropdown .= '<li><a href="/' . $seo_url . '"><i class="ri-arrow-right-s-fill"></i> ' . $page['adi'] . '</a></li>';
                    } else {
                        $dropdown .= '<li><a href="' . $page['url'] . '" target="_blank"><i class="ri-arrow-right-s-fill"></i> ' . $page['adi'] . '</a></li>';
                    }
                }

                $dropdown .= '</ul></div>';
            }

            $dropdown .= '</div></div>';
            $dropdowns[] = $dropdown;
        }

        ob_start();
        include 'views/menu.view.php';
        return ob_get_clean();
    }
}
