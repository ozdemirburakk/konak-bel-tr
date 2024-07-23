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
                <span class="fw-bold fs-40"><?= $proje_adi; ?></span>
            </div>
            <?= $breadcrumb; ?>
        </div>
        <div class="inner-page-flex">
            <div class="inner-page-capsule">
                <div class="inner-page-content">
                    <div class="inner-page-left">

                        <div class="mudurluk-info">
                            <div class="mudur">
                                <strong><?= $proje_adi; ?></strong>
                            </div>

                        </div>
                        <div class=mudurluk-row-divider></div>

                        <div class="mudurluk-hakkinda">
                            <!-- <strong>HAKKINDA</strong> -->
                            <?= $proje_icerik; ?>

                        </div>

                        <?php if (!empty($projeGallery)) : ?>
                            <div class="gallery">
                                <div class="gallery-images">
                                    <?php
                                    $i = 0;
                                    foreach ($projeGallery as $galleryItem) :
                                        echo '<img src="/files/' . $galleryItem['url'] . '" onclick="openModal(' . $i . ')">';
                                        $i++;
                                    endforeach;
                                    ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div id="myModal" class="modal" onclick="closeModal(event)" style="z-index: 999999999999;">
                            <span class="close" onclick="closeModal(event)">&times;</span>
                            <img class="modal-content" id="modalImage">
                            <span class="prev" onclick="prevSlide()">&#10094;</span>
                            <span class="next" onclick="nextSlide()">&#10095;</span>
                        </div>




                    </div>
                    <div class="inner-page-right">
                        <ul>
                            <li class="projeler-li">
                                <a href="/projelerimiz">
                                    <span class="proje_side_menu_link">Projesi ve Yapımı Tamamlanan İşler</span>
                                    <svg class="right-button-news" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.27417 10.5874C5.44996 10.4119 5.68824 10.3133 5.93668 10.3133C6.18511 10.3133 6.42339 10.4119 6.59918 10.5874L14.9992 18.9874L23.3992 10.5874C23.485 10.4953 23.5885 10.4215 23.7035 10.3702C23.8185 10.319 23.9426 10.2914 24.0685 10.2892C24.1944 10.287 24.3194 10.3101 24.4362 10.3573C24.5529 10.4044 24.6589 10.4746 24.748 10.5637C24.837 10.6527 24.9072 10.7587 24.9543 10.8755C25.0015 10.9922 25.0246 11.1172 25.0224 11.2431C25.0202 11.369 24.9926 11.4931 24.9414 11.6081C24.8902 11.7231 24.8163 11.8266 24.7242 11.9124L15.6617 20.9749C15.4859 21.1505 15.2476 21.2491 14.9992 21.2491C14.7507 21.2491 14.5125 21.1505 14.3367 20.9749L5.27417 11.9124C5.09861 11.7367 5 11.4984 5 11.2499C5 11.0015 5.09861 10.7632 5.27417 10.5874Z" fill="#057FBB" />
                                    </svg>
                                </a>
                                <div class="inner-page-divider-wrapper">
                                    <div class="inner-page-divider"></div>
                                </div>
                            </li>
                            <li class="projeler-li">
                                <a  href="/projelerimiz" >
                                    <span class="proje_side_menu_link">Projesi Tamamlanan Yapımı Devam Eden İşler</span>
                                    <svg class="right-button-news" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="active" d="M5.27417 10.5874C5.44996 10.4119 5.68824 10.3133 5.93668 10.3133C6.18511 10.3133 6.42339 10.4119 6.59918 10.5874L14.9992 18.9874L23.3992 10.5874C23.485 10.4953 23.5885 10.4215 23.7035 10.3702C23.8185 10.319 23.9426 10.2914 24.0685 10.2892C24.1944 10.287 24.3194 10.3101 24.4362 10.3573C24.5529 10.4044 24.6589 10.4746 24.748 10.5637C24.837 10.6527 24.9072 10.7587 24.9543 10.8755C25.0015 10.9922 25.0246 11.1172 25.0224 11.2431C25.0202 11.369 24.9926 11.4931 24.9414 11.6081C24.8902 11.7231 24.8163 11.8266 24.7242 11.9124L15.6617 20.9749C15.4859 21.1505 15.2476 21.2491 14.9992 21.2491C14.7507 21.2491 14.5125 21.1505 14.3367 20.9749L5.27417 11.9124C5.09861 11.7367 5 11.4984 5 11.2499C5 11.0015 5.09861 10.7632 5.27417 10.5874Z" fill="white" />
                                    </svg>
                                </a>
                                <div class="inner-page-divider-wrapper">
                                    <div class="inner-page-divider"></div>
                                </div>
                            </li>
                            <li class="projeler-li">
                                <a href="/projelerimiz">
                                    <span class="proje_side_menu_link">Projesi Devam Eden İşler</span>
                                    <svg class="right-button-news" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.27417 10.5874C5.44996 10.4119 5.68824 10.3133 5.93668 10.3133C6.18511 10.3133 6.42339 10.4119 6.59918 10.5874L14.9992 18.9874L23.3992 10.5874C23.485 10.4953 23.5885 10.4215 23.7035 10.3702C23.8185 10.319 23.9426 10.2914 24.0685 10.2892C24.1944 10.287 24.3194 10.3101 24.4362 10.3573C24.5529 10.4044 24.6589 10.4746 24.748 10.5637C24.837 10.6527 24.9072 10.7587 24.9543 10.8755C25.0015 10.9922 25.0246 11.1172 25.0224 11.2431C25.0202 11.369 24.9926 11.4931 24.9414 11.6081C24.8902 11.7231 24.8163 11.8266 24.7242 11.9124L15.6617 20.9749C15.4859 21.1505 15.2476 21.2491 14.9992 21.2491C14.7507 21.2491 14.5125 21.1505 14.3367 20.9749L5.27417 11.9124C5.09861 11.7367 5 11.4984 5 11.2499C5 11.0015 5.09861 10.7632 5.27417 10.5874Z" fill="white" />
                                    </svg>
                                </a>
                            </li>
                            <div class="inner-page-divider-wrapper">
                                    <div class="inner-page-divider"></div>
                                </div>
                            <li class="projeler-li">
                                <a href="/projelerimiz">
                                    <span class="proje_side_menu_link">Planlanan İşler</span>
                                    <svg class="right-button-news" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.27417 10.5874C5.44996 10.4119 5.68824 10.3133 5.93668 10.3133C6.18511 10.3133 6.42339 10.4119 6.59918 10.5874L14.9992 18.9874L23.3992 10.5874C23.485 10.4953 23.5885 10.4215 23.7035 10.3702C23.8185 10.319 23.9426 10.2914 24.0685 10.2892C24.1944 10.287 24.3194 10.3101 24.4362 10.3573C24.5529 10.4044 24.6589 10.4746 24.748 10.5637C24.837 10.6527 24.9072 10.7587 24.9543 10.8755C25.0015 10.9922 25.0246 11.1172 25.0224 11.2431C25.0202 11.369 24.9926 11.4931 24.9414 11.6081C24.8902 11.7231 24.8163 11.8266 24.7242 11.9124L15.6617 20.9749C15.4859 21.1505 15.2476 21.2491 14.9992 21.2491C14.7507 21.2491 14.5125 21.1505 14.3367 20.9749L5.27417 11.9124C5.09861 11.7367 5 11.4984 5 11.2499C5 11.0015 5.09861 10.7632 5.27417 10.5874Z" fill="white" />
                                    </svg>
                                </a>
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
        let currentIndex = 0;
        const images = document.getElementsByClassName("gallery-images")[0].children;

        function openModal(index) {
            currentIndex = index;
            const modal = document.getElementById("myModal");
            const modalImg = document.getElementById("modalImage");
            modal.style.display = "flex";
            modalImg.src = images[currentIndex].src;
        }

        function closeModal(event) {
            if (event.target === event.currentTarget || event.target.classList.contains('close')) {
                document.getElementById("myModal").style.display = "none";
            }
        }

        function prevSlide() {
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            document.getElementById("modalImage").src = images[currentIndex].src;
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % images.length;
            document.getElementById("modalImage").src = images[currentIndex].src;
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


           
        });
    </script>

</body>

</html>