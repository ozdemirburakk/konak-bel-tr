<?php
class Pagination {
    public static function renderPaginationLinks($current_page, $total_pages, $range = 6) {
        ?>
        <nav aria-label="Page navigation" >
            <ul class="pagination justify-content-center">
                <li class="page-item  <?= ($current_page == 1) ? 'disabled' : ''; ?>">
                    <a class="page-link page-link-control" href="?page=1">İlk</a>
                </li>
                <li class="page-item <?= ($current_page == 1) ? 'disabled' : ''; ?>">
                    <a class="page-link page-link-control" href="?page=<?= $current_page - 1; ?>">Önceki</a>
                </li>
                <?php
                $start = max(1, $current_page - floor($range / 2));
                $end = min($total_pages, $current_page + floor($range / 2));

                if ($end - $start + 1 < $range) {
                    if ($start == 1) {
                        $end = min($total_pages, $end + ($range - ($end - $start + 1)));
                    } else if ($end == $total_pages) {
                        $start = max(1, $start - ($range - ($end - $start + 1)));
                    }
                }

                for ($i = $start; $i <= $end; $i++) : ?>
                    <li class="page-item <?= ($i == $current_page) ? 'active' : ''; ?>">
                        <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                    </li>
                <?php endfor; ?>
                <li class="page-item <?= ($current_page == $total_pages) ? 'disabled' : ''; ?>">
                    <a class="page-link page-link-control" href="?page=<?= $current_page + 1; ?>">Sonraki</a>
                </li>
                <li class="page-item <?= ($current_page == $total_pages) ? 'disabled' : ''; ?>">
                    <a class="page-link page-link-control" href="?page=<?= $total_pages; ?>">Son</a>
                </li>
            </ul>
        </nav>
        <?php
    }
}
?>
