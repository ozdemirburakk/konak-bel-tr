<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titleVer; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" />
    <link rel="stylesheet" href="scripts/styles.css" />
</head>

<body>
    <div class="main-top-inner-inner">
        <!-- HEADER (MENU AND MENU DROPDOWN) BEGIN -->
        <?= $menuHtml ?>
        <!-- HEADER (MENU AND MENU DROPDOWN) END -->

        <div class="inner-page-top">
            <div class="inner-page-heading">
                <span class="fw-bold fs-40"><?= $title; ?></span>
            </div>
            <?= $breadcrumb; ?>
        </div>
        <div class="inner-page-flex">
            <div class="inner-page-capsule">
                <div class="inner-page-content">
                    <div class="inner-page-left">


                        <div id="tamamlanan-projeler" class="content-section">
                            <div class="projelerimiz-page-capsule">
                                <?php foreach ($pvy_tamamlanan as $proje) : ?>
                                    <?php if ($proje['proje_icerik'] != NULL && $proje['proje_icerik'] != "") : ?>
                                        <a href="projeler/<?= htmlspecialchars($proje['url_slug']); ?>">
                                        <?php endif; ?>
                                        <div class="proje-box">
                                            <strong class="clamp-text"><?= htmlspecialchars($proje['proje_adi']); ?></strong>
                                            <div class="proje-box-right">
                                                <?php if ($proje['proje_icerik'] != NULL && $proje['proje_icerik'] != "") : ?>
                                                    <div class="proje-box-divider"></div>
                                                    <img src="/assets/icons/right-arrow-select.svg" />
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <?php if ($proje['proje_icerik'] != NULL && $proje['proje_icerik'] != "") : ?>
                                        </a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div id="yapımı-devam-eden-projeler" class="content-section projelerimiz-page-capsule" style="display:none;">
                            <div class="projelerimiz-page-capsule">
                                <?php foreach ($ptyd_isler as $proje) : ?>
                                    <?php if ($proje['proje_icerik'] != NULL && $proje['proje_icerik'] != "") : ?>
                                        <a href="projeler/<?= htmlspecialchars($proje['url_slug']); ?>">
                                        <?php endif; ?>
                                        <div class="proje-box">
                                            <strong class="clamp-text"><?= htmlspecialchars($proje['proje_adi']); ?></strong>
                                            <div class="proje-box-right">
                                                <?php if ($proje['proje_icerik'] != NULL && $proje['proje_icerik'] != "") : ?>
                                                    <div class="proje-box-divider"></div>
                                                    <img src="/assets/icons/right-arrow-select.svg" />
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <?php if ($proje['proje_icerik'] != NULL && $proje['proje_icerik'] != "") : ?>
                                        </a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div id="porejsi-devam-eden-projeler" class="content-section projelerimiz-page-capsule" style="display:none;">
                            <div class="projelerimiz-page-capsule">
                                <?php foreach ($pd_isler as $proje) : ?>
                                    <?php if ($proje['proje_icerik'] != NULL && $proje['proje_icerik'] != "") : ?>
                                        <a href="projeler/<?= htmlspecialchars($proje['url_slug']); ?>">
                                        <?php endif; ?>
                                        <div class="proje-box">
                                            <strong class="clamp-text"><?= htmlspecialchars($proje['proje_adi']); ?></strong>
                                            <div class="proje-box-right">
                                                <?php if ($proje['proje_icerik'] != NULL && $proje['proje_icerik'] != "") : ?>
                                                    <div class="proje-box-divider"></div>
                                                    <img src="/assets/icons/right-arrow-select.svg" />
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <?php if ($proje['proje_icerik'] != NULL && $proje['proje_icerik'] != "") : ?>
                                        </a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div id="planlanan-isler" class="content-section projelerimiz-page-capsule" style="display:none;">
                            <div class="projelerimiz-page-capsule">
                                <?php foreach ($p_isler as $proje) : ?>
                                    <?php if ($proje['proje_icerik'] != NULL && $proje['proje_icerik'] != "") : ?>
                                        <a href="projeler/<?= htmlspecialchars($proje['url_slug']); ?>">
                                        <?php endif; ?>
                                        <div class="proje-box">
                                            <strong class="clamp-text"><?= htmlspecialchars($proje['proje_adi']); ?></strong>
                                            <div class="proje-box-right">
                                                <?php if ($proje['proje_icerik'] != NULL && $proje['proje_icerik'] != "") : ?>
                                                    <div class="proje-box-divider"></div>
                                                    <img src="/assets/icons/right-arrow-select.svg" />
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <?php if ($proje['proje_icerik'] != NULL && $proje['proje_icerik'] != "") : ?>
                                        </a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>




                    </div>
                    <div class="inner-page-right">
                        <ul>
                            <li class="">
                                <span class="active">
                                    <span class="active">Projelerimiz</span>
                                </span>
                                <div class="inner-page-divider-wrapper">
                                    <div class="inner-page-divider"></div>
                                </div>
                                <ul class="inner-page-sub-menu">
                                    <li class="projeler-li"><span class="proje_side_menu_link active" data-content="tamamlanan-projeler" onclick="changeContent(this)">Projesi ve Yapımı Tamamlanan İşler</span></li>
                                    <li class="projeler-li"><span class="proje_side_menu_link" data-content="yapımı-devam-eden-projeler" onclick="changeContent(this)">Projesi Tamamlanan Yapımı Devam Eden İşler</span></li>
                                    <li class="projeler-li"><span class="proje_side_menu_link" data-content="porejsi-devam-eden-projeler" onclick="changeContent(this)">Projesi Devam Eden İşler</span></li>
                                    <li class="projeler-li"><span class="proje_side_menu_link" data-content="planlanan-isler" onclick="changeContent(this)">Planlanan İşler</span></li>


                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <?= $footerHtml ?>

        </div>
        <div class="overlay"></div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            var menuCapsuleHeight = $('.menu-capsule').outerHeight();
            $('.menu-dropdown').css('top', menuCapsuleHeight + 'px');

            $(".menu-link").hover(
                function() {
                    var targetId = $(this).data("target");
                    if (targetId) {
                        $("#" + targetId).stop(true, true).slideDown(150);
                    }
                },
                function() {
                    var targetId = $(this).data("target");
                    if (targetId) {
                        if (!$("#" + targetId).is(':hover')) {
                            $("#" + targetId).stop(true, true).slideUp(300);
                        }
                    }
                }
            );

            $(".menu-dropdown").hover(
                function() {
                    $(this).stop(true, true).show();
                },
                function() {
                    $(this).stop(true, true).slideUp(300);
                }
            );

            // DROPDOWN (sideBar) açma/kapatma işlevselliği
            document.querySelectorAll('.has-submenu > a').forEach(function(item) {
                item.addEventListener('click', function(event) {
                    event.preventDefault(); // Bağlantının varsayılan davranışını engelle
                    var submenu = this.nextElementSibling.nextElementSibling; // inner-page-submenu elemanını al
                    // Tıklanan alt menünün dışındaki diğer alt menüleri kapat
                    document.querySelectorAll('.has-submenu .inner-page-submenu').forEach(function(otherSubmenu) {
                        if (otherSubmenu !== submenu) {
                            otherSubmenu.classList.remove('active');
                            otherSubmenu.style.display = 'none';
                        }
                    });
                    if (submenu) {
                        if (submenu.style.display === 'block') {
                            submenu.style.display = 'none';
                        } else {
                            submenu.style.display = 'block';
                        }
                    }
                });
            });

            // Alt menü linklerine tıklanıldığında submenu'nun kapanmasını engelle
            document.querySelectorAll('.inner-page-submenu li').forEach(function(submenuItem) {
                submenuItem.addEventListener('click', function(event) {
                    event.stopPropagation();
                });
            });

            document.querySelectorAll('.inner-page-divider-wrapper').forEach(function(divider) {
                divider.addEventListener('click', function(event) {
                    event.stopPropagation();
                });
            });

            // Menü linklerine tıklandığında rengin değişmesi işlevselliği
            window.changeColor = function(element) {
                element.classList.add('active');
                var allLinks = document.querySelectorAll('.inner-page-right li span');
                for (var i = 0; i < allLinks.length; i++) {
                    if (allLinks[i] !== element) {
                        allLinks[i].classList.remove('active');
                    }
                }
            }



            // İçerik değiştirme işlevselliği
            window.changeContent = function(element) {
                // Aktif menü rengini değiştir
                changeColor(element);

                // Tüm içerik bölümlerini gizle
                var allContentSections = document.querySelectorAll('.content-section');
                allContentSections.forEach(function(section) {
                    section.style.display = 'none';
                });

                // Seçilen içerik bölümünü göster
                var contentId = element.getAttribute('data-content');
                document.getElementById(contentId).style.display = 'block';
            }

            // Menü linklerine tıklama olayını bağlama
            document.querySelectorAll('.mudurluk_side_menu_link').forEach(function(link) {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    changeContent(this);
                });
            });

            // Sayfa ilk yüklendiğinde "Hakkında" sekmesini aktif yap
            document.querySelector('.mudurluk_side_menu_link[data-content="tamamlanan-projeler"]').click();
        });
    </script>
</body>

</html>