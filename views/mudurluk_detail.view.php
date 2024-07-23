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
    <link rel="stylesheet" href="/scripts/styles.css" />
</head>

<body>
    <div class="main-top-inner-inner">
        <!-- HEADER (MENU AND MENU DROPDOWN) BEGIN -->
        <?= $menuHtml ?>
        <!-- HEADER (MENU AND MENU DROPDOWN) END -->

        <div class="inner-page-top">
            <div class="inner-page-heading">
                <span class="fw-bold fs-40"><?= $mudurluk_adi; ?></span>
            </div>
            <?= $breadcrumb; ?>
        </div>
        <div class="inner-page-flex">
            <div class="inner-page-capsule">
                <div class="inner-page-content">
                    <div class="inner-page-left">
                        <div id="hakkinda" class="content-section">
                            <div class="mudurluk-info">
                                <div class="mudur">
                                    <strong><?= $mudur_adi; ?></strong>
                                    <p><?= $mudurluk_adi; ?></p>
                                </div>
                                <div class="mudurluk-iletisim">
                                    <?php if (!empty($iletisim_telefon)) : ?>
                                        <div class="mudurluk-iletisim-row">
                                            <img src="/assets/icons/phone-blue.svg" />
                                            <strong>Telefon: </strong>
                                            <?= $iletisim_telefon; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($iletisim_mail)) : ?>
                                        <div class="mudurluk-iletisim-row">
                                            <img src="/assets/icons/mail-blue.svg" />
                                            <strong>E-Posta: </strong>
                                            <?= $iletisim_mail; ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (!empty($iletisim_adresi)) : ?>
                                        <div class="mudurluk-iletisim-row">
                                            <img src="/assets/icons/address-blue.svg" />
                                            <strong>Adres: </strong>
                                            <?= $iletisim_adresi; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class=mudurluk-row-divider></div>
                            <div class="mudurluk-hakkinda">
                                <span>HAKKINDA</span>
                                <p><?= $mudurluk_icerik; ?></p>
                            </div>
                            <?php
                            if ($yonetmelik) {
                            ?>
                                <a target="_blank" href="/files/<?= $yonetmelik_url; ?>">
                                    <div class="mudurluk-button"><?= $yonetmelik_adi; ?></div>
                                </a>
                            <?php
                            }
                            ?>

                            <?php if (!empty($mudurluk_birim)) : ?>
                                <?php
                                $birimler = explode(',', $mudurluk_birim);
                                ?>
                                <div class="mudurluk-row-divider"></div>
                                <div class="mudurluk-birimler">
                                    <strong>MÜDÜRLÜK BİRİMLERİ</strong>
                                    <ul>
                                        <?php foreach ($birimler as $birim) : ?>
                                            <li><?= trim($birim); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div id="hizmetler" class="content-section" style="display:none;">
                        </div>

                        <div id="dokumanlar" class="content-section" style="display:none;">
                        </div>
                    </div>
                    <div class="inner-page-right">
                        <ul>
                            <li class="">
                                <span class="active">
                                    <span class="active"><?= $mudurluk_adi; ?></span>
                                </span>
                                <div class="inner-page-divider-wrapper">
                                    <div class="inner-page-divider"></div>
                                </div>
                                <ul class="inner-page-sub-menu">
                                    <li><span class="mudurluk_side_menu_link active" data-content="hakkinda" onclick="changeContent(this)">Hakkında</span></li>
                                    <?php
                                    if ($hizmetler) {
                                    ?>
                                        <li><span class="mudurluk_side_menu_link" data-content="hizmetler" onclick="changeContent(this)">Hizmetler</span></li>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if ($dokuman) {
                                    ?>
                                        <li><span class="mudurluk_side_menu_link" data-content="dokumanlar" onclick="changeContent(this)">Dökümanlar</span></li>
                                    <?php
                                    }
                                    ?>

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
            document.querySelector('.mudurluk_side_menu_link[data-content="hakkinda"]').click();
        });
    </script>

</body>

</html>