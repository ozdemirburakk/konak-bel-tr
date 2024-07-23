<?php
class DBHandler
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    // MENU AND SIDE
    public function getCategories()
    {
        $sql = "SELECT * FROM kategoriler WHERE ust_kategori = 0 ORDER BY sira";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getSubCategories($categoryId)
    {
        $sql = "SELECT * FROM kategoriler WHERE ust_kategori = :ust_kategori ORDER BY sira";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['ust_kategori' => $categoryId]);
        return $stmt->fetchAll();
    }

    public function getPages($categoryId)
    {
        $sql = 'SELECT * FROM sayfalar WHERE kategori_id = :kategori_id AND aktif = 1 ORDER BY sira';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['kategori_id' => $categoryId]);
        return $stmt->fetchAll();
    }

    //SEO
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

    // DATE
    public function formatNewsDate($created_at)
    {
        $date = new DateTime($created_at);
        $formatter = new IntlDateFormatter('tr_TR', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
        $formatter->setPattern('d MMMM yyyy');
        return $formatter->format($date);
    }

    // NEWS
    public function getLatestNews($category_id, $status)
    {
        $sql = "SELECT * FROM news WHERE category_id =:category_id AND news.status =:statuss ORDER BY created_at DESC LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
        $stmt->bindParam(':statuss', $status, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getNewsCount($category_id, $status)
    {
        $sql = "SELECT COUNT(*) FROM news WHERE category_id =:category_id AND news.status =:statuss";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
        $stmt->bindParam(':statuss', $status, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getNewsWithPagination($offset, $limit, $category_id, $status)
    {
        $sql = "SELECT * FROM news WHERE category_id =:category_id AND news.status =:statuss ORDER BY created_at DESC LIMIT :limit OFFSET :offset";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
        $stmt->bindParam(':statuss', $status, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getNewsById($id)
    {
        $sql = "SELECT * FROM news WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function getNewsBySlug($slug)
    {
        $sql = "SELECT * FROM news WHERE link = :link";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['link' => $slug]);
        return $stmt->fetch();
    }

    public function getRecentNews($excludeId, $limit, $category_id, $status)
    {
        $sql = "SELECT * FROM news WHERE id != :id AND category_id =:category_id AND news.status =:statuss ORDER BY created_at DESC LIMIT :limit";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $excludeId, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':category_id', $category_id, PDO::PARAM_INT);
        $stmt->bindValue(':statuss', $status, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getNewsGallery($newsId)
    {
        $sql = "SELECT * FROM newsgallery WHERE news_id = :news_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['news_id' => $newsId]);
        return $stmt->fetchAll();
    }


    // Etkinlikler
    
    public function getLatestActivities($status)
    {
        $sql = "SELECT * FROM activities WHERE activities.status =:statuss ORDER BY created_at DESC LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':statuss', $status, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getActivitiesCount($status)
    {
        $sql = "SELECT COUNT(*) FROM activities WHERE activities.status =:statuss";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':statuss', $status, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getActivitiesWithPagination($offset, $limit, $status)
    {
        $sql = "SELECT * FROM activities WHERE activities.status =:statuss ORDER BY created_at DESC LIMIT :limit OFFSET :offset";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindParam(':statuss', $status, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getActivitiesById($id)
    {
        $sql = "SELECT * FROM activities WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function getActivitiesBySlug($slug)
    {
        $sql = "SELECT * FROM activities WHERE link = :link";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['link' => $slug]);
        return $stmt->fetch();
    }

    public function getRecentActivities($excludeId, $limit, $status)
    {
        $sql = "SELECT * FROM activities WHERE id != :id AND activities.status =:statuss ORDER BY created_at DESC LIMIT :limit";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $excludeId, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':statuss', $status, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getActivitiesGallery($activityId)
    {
        $sql = "SELECT * FROM activitygallery WHERE activity_id = :activity_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['activity_id' => $activityId]);
        return $stmt->fetchAll();
    }


    // Etkinlikler

    public function getPageById($page_id)
    {
        $sql = "SELECT * FROM sayfalar WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $page_id]);
        return $stmt->fetch();
    }

    public function getPageBySlug($slug)
    {
        $sql = "SELECT * FROM sayfalar WHERE url_slug = :url_slug";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['url_slug' => $slug]);
        return $stmt->fetch();
    }

    public function getCategoryById($category_id)
    {
        $sql = "SELECT * FROM kategoriler WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $category_id]);
        return $stmt->fetch();
    }

    public function getMudurlukler()
    {
        $sql = "SELECT * FROM mudurlukler ORDER BY id ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getMudurlukBySlug($url_slug)
    {
        $sql = "SELECT * FROM mudurlukler WHERE url_slug = :url_slug";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['url_slug' => $url_slug]);
        return $stmt->fetch();
    }

    public function getMudurlukById($id)
    {
        $sql = "SELECT * FROM mudurlukler WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function getYonetmelik($mudurluk_id)
    {
        $sql = "SELECT * FROM dokumanlar WHERE mudurluk_id = :mudurluk_id AND isyonetmelik = :isyonetmelik";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['mudurluk_id' => $mudurluk_id, 'isyonetmelik' => 1]);
        return $stmt->fetch();
    }

    public function getDokuman($mudurluk_id)
    {
        $sql = "SELECT * FROM dokumanlar WHERE mudurluk_id = :mudurluk_id AND isyonetmelik = :isyonetmelik";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['mudurluk_id' => $mudurluk_id, 'isyonetmelik' => 0]);
        return $stmt->fetch();
    }

    
    public function getHizmetler($mudurluk_id)
    {
        $sql = "SELECT * FROM hizmetler WHERE mudurluk_id = :mudurluk_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['mudurluk_id' => $mudurluk_id]);
        return $stmt->fetch();
    }

    public function getKardesSehirler($istype)
    {
        $sql = "SELECT * FROM kardes_sehirler WHERE istype = :istype";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['istype'=>$istype]);
        return $stmt->fetchAll();
    }
    
	
	public function getMuhtarliklar()
    {
        $sql = "SELECT * FROM muhtarliklar ORDER BY mh_id ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getMuhtarlikBySlug($url_slug)
    {
        $sql = "SELECT * FROM muhtarliklar WHERE mh_url_slug = :mh_url_slug";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['mh_url_slug' => $url_slug]);
        return $stmt->fetch();
    }

    public function getMuhtarlikById($id)
    {
        $sql = "SELECT * FROM muhtarliklar WHERE mh_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function getMeclisDocuments($year, $month, $agendatype)
	{
		$sql = "SELECT * FROM meclis_documents WHERE year = :year AND month = :month AND agendatype= :agendatype ORDER BY date ASC";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute(['year' => $year, 'month' => $month,'agendatype' => $agendatype]);
		return $stmt->fetchAll();
	}

	public function getProjelerimiz($proje_type)
	{
		$sql = "SELECT * FROM projeler WHERE proje_type = :proje_type";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute(['proje_type'=>$proje_type]);
		return $stmt->fetchAll();
	}

	public function getProjeGallery($proje_id)
	{
		$sql = "SELECT * FROM projeler_galeri WHERE proje_id = :proje_id";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute(['proje_id' => $proje_id]);
		return $stmt->fetchAll();
	}

	public function getProjeBySlug($url_slug)
    {
        $sql = "SELECT * FROM projeler WHERE url_slug = :url_slug";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['url_slug' => $url_slug]);
        return $stmt->fetch();
    }

    public function getProjeById($id)
    {
        $sql = "SELECT * FROM projeler WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
	
	public function getGaleri()
    {
        $sql = "SELECT * FROM galleryimages WHERE gallery_id = '26' ORDER BY ordernum ASC";
        $stmt = $this->pdo->prepare($sql);
		$stmt->execute();
        return $stmt->fetchAll();
    }
}
