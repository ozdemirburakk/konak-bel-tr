<?php
class Breadcrumb
{
    private $pdo;



    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function generateBreadcrumb($page_slug, $type)
    {

        if ($type == "news") {
            $class = "news-detail-breadcrumb";
            $arrow = '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M7.5 14.9168C7.5 15.8118 8.55417 16.2901 9.2275 15.7009L14.4858 11.0993C14.6423 10.9624 14.7676 10.7937 14.8535 10.6044C14.9394 10.4151 14.9838 10.2096 14.9838 10.0018C14.9838 9.79392 14.9394 9.58846 14.8535 9.39918C14.7676 9.20989 14.6423 9.04116 14.4858 8.90428L9.2275 4.30261C8.55417 3.71344 7.5 4.19178 7.5 5.08678V14.9168Z" fill="white"/>
        </svg>';
            $home_icon = '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.45 2.53344C13.0442 2.19146 12.5307 2.00391 12 2.00391C11.4693 2.00391 10.9558 2.19146 10.55 2.53344L3.8 8.22844C3.54946 8.4396 3.34806 8.70292 3.20988 9.00001C3.0717 9.2971 3.00007 9.62079 3 9.94844V19.2534C3 20.2194 3.784 21.0034 4.75 21.0034H7.75C8.21413 21.0034 8.65925 20.8191 8.98744 20.4909C9.31563 20.1627 9.5 19.7176 9.5 19.2534V15.2504C9.5 14.5704 10.042 14.0184 10.717 14.0004H13.283C13.6088 14.009 13.9183 14.1445 14.1456 14.378C14.373 14.6115 14.5001 14.9246 14.5 15.2504V19.2534C14.5 20.2194 15.284 21.0034 16.25 21.0034H19.25C19.7141 21.0034 20.1592 20.8191 20.4874 20.4909C20.8156 20.1627 21 19.7176 21 19.2534V9.94744C20.9999 9.61979 20.9283 9.2961 20.7901 8.99901C20.6519 8.70192 20.4505 8.4386 20.2 8.22744L13.45 2.53344Z" fill="white"/>
                    </svg>';
        } else {
            $class = "inner-page-breadcrumb";
            $arrow = '<img src="/assets/icons/bread_arrow.svg" />';
            $home_icon = '<img src="/assets/icons/home.svg" width="24px" height="24px" />';
        }


        $breadcrumb = '<div class=" ' . $class . ' ">
            ' . $home_icon . '
            <span class="fs-16"><a href="/">Ana Sayfa</a></span>';



        // Sayfa bilgilerini al
        $sql = "SELECT * FROM sayfalar WHERE url_slug = :url_slug";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['url_slug' => $page_slug]);
        $sayfa = $stmt->fetch();

        $sayfa_adi = '';

        if ($sayfa) {
            // Kategori bilgilerini al ve breadcrumb'a ekle
            $kategori_id = $sayfa['kategori_id'];
            $kategori_breadcrumb = [];

            while ($kategori_id != 0) {
                $sql = "SELECT * FROM kategoriler WHERE id = :id";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute(['id' => $kategori_id]);
                $kategori = $stmt->fetch();

                if ($kategori) {
                    $seo_url_kategori = $this->generateSeoUrl($kategori['id']);
                    $kategori_link = $kategori['url'] ? '<a href="/' . $seo_url_kategori . '">' . $kategori['adi'] . '</a>' : $kategori['adi'];
                    array_unshift($kategori_breadcrumb, $arrow . '<span class="fs-15">' . $kategori_link . '</span>');
                    $kategori_id = $kategori['ust_kategori'];
                }
            }

            foreach ($kategori_breadcrumb as $kategori_item) {
                $breadcrumb .= $kategori_item;
            }

            $seo_url = $this->generateSeoUrl($sayfa['id']);
            $sayfa_link = '<a href="/' . $seo_url . '">' . $sayfa['adi'] . '</a>';

            $breadcrumb .=  $arrow . ' <span class="fs-15">' . $sayfa_link . '</span>';
            $sayfa_adi = $sayfa['adi'];
        }

        $breadcrumb .= '</div>';
        return [
            'breadcrumb' => $breadcrumb,
            'title' => $sayfa_adi
        ];
    }

    public function generateSeoUrl($current_page_id)
    {
        $sql = "SELECT url_slug FROM sayfalar WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $current_page_id]);
        $sayfa = $stmt->fetch();
        if ($sayfa) {
            return $sayfa['url_slug'];
        }
        return '';
    }
}
