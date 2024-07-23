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
                        <div>
                            <div class="mudurluk-page-capsule">
                                <?php foreach ($galeri as $index => $gal) : ?>
                                    <div class="gallery-box" onclick="openModal(<?= $index; ?>)">
                                        <img src="/files/gallery/<?= $gal['image']; ?>" />
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div id="myModal" class="modal" onclick="closeModal(event)">
                            <span class="close" onclick="closeModal(event)">&times;</span>
                            <img class="modal-content" id="modalImage">
                            <span class="prev" onclick="prevSlide()">&#10094;</span>
                            <span class="next" onclick="nextSlide()">&#10095;</span>
                        </div>
                    </div>


                    <?= $sideNavHtml ?>
                </div>
            </div>
            <?= $footerHtml ?>

        </div>
        <div class="overlay"></div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        let currentIndex = 0;
        const images = document.getElementsByClassName("gallery-box");

        function openModal(index) {
            currentIndex = index;
            const modal = document.getElementById("myModal");
            const modalImg = document.getElementById("modalImage");
            modal.style.display = "flex";
            modalImg.src = images[currentIndex].getElementsByTagName('img')[0].src;
        }

        function closeModal(event) {
            if (event.target === event.currentTarget || event.target.classList.contains('close')) {
                document.getElementById("myModal").style.display = "none";
            }
        }

        function prevSlide() {
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            document.getElementById("modalImage").src = images[currentIndex].getElementsByTagName('img')[0].src;
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % images.length;
            document.getElementById("modalImage").src = images[currentIndex].getElementsByTagName('img')[0].src;
        }

        document.addEventListener("keydown", function(event) {
            if (document.getElementById("myModal").style.display === "flex") {
                if (event.key === "ArrowLeft") {
                    prevSlide();
                } else if (event.key === "ArrowRight") {
                    nextSlide();
                } else if (event.key === "Escape") {
                    document.getElementById("myModal").style.display = "none";
                }
            }
        });




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