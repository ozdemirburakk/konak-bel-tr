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
                <div class="inner-page-iletisim">
                    <div class="inner-page-iletisim-icerik">
                        <div class="adres-bilgileri">
                            <span>Adres Bilgileri</span>
                            <div class="adres-bilgileri-inner">
                                <div class="iletisim-bilgi-box">
                                    <img src="/assets/icons/location-lineBlue.svg" />
                                    <div class="iletisim-bilgi-yazi">
                                        <span>Adres</span>
                                        <span>Dokuz Eylül Meydanı,<br />
                                            No: 11, 35210, Basmane/İzmir</span>
                                    </div>
                                </div>
                                <div class="iletisim-bilgi-box">
                                    <img src="/assets/icons/mail-lineBlue.svg" />
                                    <div class="iletisim-bilgi-yazi">
                                        <span>E-Posta</span>
                                        <span>konak@konak.bel.tr<br />
                                            konakbelediyebaskanligi@konakbel.hs01.kep.tr</span>

                                    </div>
                                </div>
                                <div class="iletisim-bilgi-box">
                                    <img src="/assets/icons/phone-lineBlue.svg" />
                                    <div class="iletisim-bilgi-yazi">
                                        <span>Alo Çözüm Hattı</span>
                                        <span>444 35 66</span>

                                    </div>
                                </div>
                                <div class="iletisim-bilgi-box">
                                    <img src="/assets/icons/call-center-lineBlue.svg" />
                                    <div class="iletisim-bilgi-yazi">
                                        <span>Santral Hattı</span>
                                        <span>0232 489 45 22<br />
                                            0232 484 53 00</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="ulasim-haritasi">
                            <span>Ulaşım Haritası</span>
                            <div class="iletisim-harita">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d390.72253513004495!2d27.142905302593416!3d38.42344229049716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14bbd8f1430f878b%3A0x2f81ff8e034d924c!2sKonak%20Belediyesi%20Bilgi%20%C4%B0%C5%9Flem%20Mudurlugu!5e0!3m2!1sen!2str!4v1721305958220!5m2!1sen!2str" width="100%" height="450px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>

                        </div>
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
                var allLinks = document.querySelectorAll('.inner-page-right li a');
                for (var i = 0; i < allLinks.length; i++) {
                    if (allLinks[i] !== element) {
                        allLinks[i].classList.remove('active');
                    }
                }
            }
        });
    </script>
</body>

</html>