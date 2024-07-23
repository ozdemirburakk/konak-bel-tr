<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T.C. Konak Belediyesi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" />
    <link rel="stylesheet" href="scripts/styles.css" />
</head>

<body>
    <div class="main-top">
        <video autoplay muted loop id="background-video">
            <source src="assets/videos/sequence_05.mp4" type="video/mp4" />
            Your browser does not support the video tag.
        </video>

        <!-- HEADER (MENU AND MENU DROPDOWN) BEGIN -->
        <?= $menuHtml ?>
        <!-- HEADER (MENU AND MENU DROPDOWN) END -->



        <!-- SEARCH (SEARCH AND QUICK BUTTONS) BEGIN -->
        <div class="search-capsule">
            <div class="search-box search-container">
                <div class="search-inner">
                    <input id="animated-placeholder" type="text" class="search-input" placeholder="" onkeyup="aramaYap(this.value)">
                    <button type="button" class="search-button"><i class="ri-search-line"></i></button>
                </div>

                <div id="result-zone" class="search-result">

                    <!-- SEARCH RESULTS ZONE -->
                </div>

                <div class="quick-inner">
                    <a target="_blank" href="https://www.konak.bel.tr/ebelediye/">
                        <div class="quick-button-red bgc-red-o">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="button-icon">
                                <path d="M6.75 22C6.55998 21.9999 6.37706 21.9278 6.23821 21.798C6.09936 21.6683 6.01493 21.4907 6.00197 21.3011C5.98902 21.1115 6.04852 20.9241 6.16843 20.7767C6.28835 20.6293 6.45975 20.5329 6.648 20.507L6.75 20.5H8.499V18.002H4.25C3.67987 18.0021 3.13098 17.7857 2.71425 17.3966C2.29751 17.0076 2.04402 16.4748 2.005 15.906L2 15.752V5.25C1.99993 4.67987 2.2163 4.13098 2.60537 3.71425C2.99444 3.29751 3.52721 3.04402 4.096 3.005L4.25 3H19.749C20.3191 2.99993 20.868 3.2163 21.2848 3.60537C21.7015 3.99444 21.955 4.52721 21.994 5.096L21.999 5.25V15.752C21.9991 16.3221 21.7827 16.871 21.3936 17.2878C21.0046 17.7045 20.4718 17.958 19.903 17.997L19.749 18.002H15.499V20.5H17.25C17.4414 20.4981 17.6263 20.5693 17.7668 20.6993C17.9073 20.8292 17.9928 21.0079 18.0059 21.1989C18.0189 21.3898 17.9585 21.5785 17.8369 21.7263C17.7153 21.8742 17.5419 21.9699 17.352 21.994L17.25 22H6.75ZM13.998 18.002H9.998L9.999 20.5H13.999L13.998 18.002ZM19.748 4.5H4.25C4.06876 4.50001 3.89366 4.56564 3.75707 4.68477C3.62048 4.80389 3.53165 4.96845 3.507 5.148L3.5 5.25V15.752C3.5 16.132 3.782 16.446 4.148 16.495L4.25 16.502H19.749C19.9302 16.502 20.1053 16.4364 20.2419 16.3172C20.3785 16.1981 20.4674 16.0336 20.492 15.854L20.499 15.752V5.25C20.499 5.06876 20.4334 4.89366 20.3142 4.75707C20.1951 4.62048 20.0306 4.53165 19.851 4.507L19.748 4.5Z" fill="white" />
                            </svg>
                            <span class="mrg-l-12">E-BELEDİYE İŞLEMLERİ</span>
                        </div>
                    </a>
                    <a href="https://keos.konak.bel.tr/imardurumu/" target="_blank">
                        <div class="quick-button bgc-blue-o">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 20 20" class="button-icon">
                                <path fill="white" d="M5 6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1zm3 0H6v2h2zm-3 6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1zm3 0H6v2h2zm4-7a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1zm0 1h2v2h-2zm-1 6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v2h2zM5 2a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V5a3 3 0 0 0-3-3zM3 5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                            </svg>
                            <!--
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="button-icon">
                                <path d="M12.8196 5.57998L11.9996 6.40198L11.1756 5.57798C10.1675 4.57003 8.80028 4.00382 7.37472 4.00391C5.94916 4.00401 4.58203 4.5704 3.57407 5.57848C2.56612 6.58657 1.99991 7.95378 2 9.37934C2.00009 10.8049 2.56648 12.172 3.57457 13.18L11.4696 21.075C11.6102 21.2154 11.8008 21.2943 11.9996 21.2943C12.1983 21.2943 12.3889 21.2154 12.5296 21.075L20.4316 13.178C21.4385 12.1698 22.0039 10.8031 22.0038 9.37828C22.0036 7.95341 21.4377 6.58689 20.4306 5.57898C19.9309 5.07903 19.3377 4.68242 18.6847 4.41182C18.0318 4.14123 17.3319 4.00195 16.6251 4.00195C15.9183 4.00195 15.2184 4.14123 14.5654 4.41182C13.9124 4.68242 13.3192 5.08003 12.8196 5.57998ZM19.3676 12.119L11.9996 19.485L4.63457 12.12C4.2716 11.7609 3.98319 11.3335 3.78591 10.8626C3.58863 10.3916 3.48637 9.88632 3.48501 9.37572C3.48365 8.86511 3.58322 8.35927 3.77799 7.88727C3.97277 7.41527 4.2589 6.98642 4.61996 6.62537C4.98101 6.26431 5.40986 5.97818 5.88186 5.7834C6.35386 5.58863 6.8597 5.48906 7.3703 5.49042C7.88091 5.49178 8.38621 5.59404 8.85717 5.79132C9.32812 5.9886 9.75544 6.27702 10.1146 6.63998L11.4726 7.99698C11.5432 8.06772 11.6273 8.12362 11.7199 8.16139C11.8124 8.19915 11.9116 8.21804 12.0116 8.21692C12.1116 8.2158 12.2103 8.1947 12.302 8.15487C12.3937 8.11504 12.4765 8.05728 12.5456 7.98498L13.8796 6.63998C14.6149 5.95556 15.587 5.583 16.5914 5.60067C17.5958 5.61834 18.5542 6.02487 19.2649 6.73474C19.9757 7.44461 20.3835 8.40249 20.4024 9.40686C20.4214 10.4112 20.0501 11.3838 19.3666 12.12" fill="white" />
                            </svg>
                            -->
                            <span class="mrg-l-12">E-İMAR</span>
                        </div>
                    </a>

                    <a href="https://www.konak.bel.tr/InoApp/HIM" target="_blank">
                        <div class="quick-button bgc-blue-o">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="button-icon">
                                <path d="M10.1549 14.7728L10.1459 14.7518C10.0107 14.7148 9.87664 14.6738 9.74391 14.6288L9.73391 14.6248C8.35246 14.1522 7.15339 13.2594 6.30453 12.0714C5.45566 10.8835 4.99951 9.45985 4.99991 7.9998C4.99946 6.2079 5.68621 4.48407 6.9187 3.18336C8.15118 1.88265 9.83555 1.10411 11.6249 1.00811C13.4142 0.912106 15.1722 1.50595 16.5368 2.66732C17.9014 3.82869 18.7686 5.46914 18.9599 7.2508C19.0039 7.6628 18.6639 7.9998 18.2499 7.9998C17.8359 7.9998 17.5049 7.6618 17.4499 7.2518C17.3169 6.28406 16.9286 5.36921 16.3249 4.60124C15.7212 3.83328 14.924 3.23991 14.015 2.88212C13.1061 2.52433 12.1183 2.41503 11.1531 2.56545C10.1879 2.71586 9.28018 3.12057 8.52321 3.73798C7.76624 4.35539 7.18733 5.16323 6.84597 6.07847C6.50461 6.99371 6.41311 7.98334 6.58089 8.94565C6.74866 9.90797 7.16965 10.8083 7.80059 11.554C8.43153 12.2997 9.24967 12.864 10.1709 13.1888C10.3565 12.7693 10.6806 12.4264 11.089 12.2175C11.4973 12.0085 11.9651 11.9463 12.4138 12.0413C12.8626 12.1362 13.2651 12.3825 13.5538 12.7389C13.8426 13.0953 14.0001 13.5401 13.9999 13.9988C13.9999 14.5968 13.7379 15.1328 13.3229 15.4988C12.9577 15.8214 12.4872 15.9995 11.9999 15.9998C11.6054 16.0012 11.2193 15.8853 10.8908 15.6668C10.5623 15.4484 10.3062 15.1372 10.1549 14.7728ZM7.99691 15.4998C7.25987 15.1059 6.58494 14.6056 5.99391 14.0148C5.44605 14.0785 4.94068 14.3413 4.57381 14.7531C4.20694 15.165 4.00413 15.6972 4.00391 16.2488V16.8268C4.00391 17.7188 4.32191 18.5828 4.90191 19.2618C6.46791 21.0958 8.85391 22.0018 11.9999 22.0018C15.1459 22.0018 17.5329 21.0958 19.1019 19.2618C19.6833 18.5825 20.0028 17.7179 20.0029 16.8238V16.2488C20.0029 15.6524 19.7661 15.0804 19.3446 14.6585C18.9231 14.2366 18.3513 13.9993 17.7549 13.9988H15.4999C15.4999 14.5368 15.3799 15.0448 15.1629 15.4988H17.7549C17.9535 15.4993 18.1437 15.5786 18.2839 15.7192C18.4242 15.8598 18.5029 16.0502 18.5029 16.2488V16.8238C18.5031 17.3602 18.3116 17.8791 17.9629 18.2868C16.7059 19.7548 14.7389 20.5008 11.9999 20.5008C9.26091 20.5008 7.29591 19.7548 6.04291 18.2878C5.69448 17.8804 5.50298 17.3619 5.50291 16.8258V16.2488C5.50291 16.0499 5.58192 15.8591 5.72258 15.7185C5.86323 15.5778 6.05399 15.4988 6.25291 15.4988L7.99691 15.4998ZM7.99991 7.9998C8.00009 7.30985 8.17873 6.63167 8.51848 6.03117C8.85822 5.43067 9.34752 4.92825 9.93882 4.57274C10.5301 4.21723 11.2033 4.02072 11.893 4.00228C12.5827 3.98385 13.2655 4.14413 13.8749 4.46755C14.4844 4.79097 14.9998 5.26653 15.3712 5.84803C15.7425 6.42953 15.9571 7.09719 15.9941 7.78615C16.0312 8.4751 15.8894 9.16192 15.5825 9.77987C15.2757 10.3978 14.8142 10.9259 14.2429 11.3128C13.6135 10.7875 12.8197 10.4997 11.9999 10.4998C12.6629 10.4998 13.2988 10.2364 13.7677 9.76756C14.2365 9.29872 14.4999 8.66284 14.4999 7.9998C14.4999 7.33675 14.2365 6.70087 13.7677 6.23203C13.2988 5.76319 12.6629 5.4998 11.9999 5.4998C11.3369 5.4998 10.701 5.76319 10.2321 6.23203C9.7633 6.70087 9.49991 7.33675 9.49991 7.9998C9.49991 8.66284 9.7633 9.29872 10.2321 9.76756C10.701 10.2364 11.3369 10.4998 11.9999 10.4998C11.1459 10.4998 10.3639 10.8058 9.75791 11.3128C9.2158 10.9469 8.77193 10.4534 8.46538 9.87573C8.15882 9.29802 7.99897 8.6538 7.99991 7.9998Z" fill="white" />
                            </svg>
                            <span class="mrg-l-12">HEMŞEHRİ İLETİŞİM MERKEZİ</span>
                        </div>
                    </a>

                    <div id="konaktif-button">
                        <div class="quick-button bgc-blue-o">
                            <span class="mrg-l-12">KON<span style="color:#FEC23B; font-size: 16px; font-weight: 700;">AKTİF</span></span>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"style="margin-left:4px;" class="button-icon">
                                <path d="M12 2C17.523 2 22 6.477 22 12C22 17.523 17.523 22 12 22C6.477 22 2 17.523 2 12C2 6.477 6.477 2 12 2ZM12 3.5C9.74566 3.5 7.58365 4.39553 5.98959 5.98959C4.39553 7.58365 3.5 9.74566 3.5 12C3.5 14.2543 4.39553 16.4163 5.98959 18.0104C7.58365 19.6045 9.74566 20.5 12 20.5C14.2543 20.5 16.4163 19.6045 18.0104 18.0104C19.6045 16.4163 20.5 14.2543 20.5 12C20.5 9.74566 19.6045 7.58365 18.0104 5.98959C16.4163 4.39553 14.2543 3.5 12 3.5ZM7.47 9.97C7.61063 9.82955 7.80125 9.75066 8 9.75066C8.19875 9.75066 8.38937 9.82955 8.53 9.97L12 13.44L15.47 9.97C15.5387 9.89631 15.6215 9.83721 15.7135 9.79622C15.8055 9.75523 15.9048 9.73318 16.0055 9.73141C16.1062 9.72963 16.2062 9.74816 16.2996 9.78588C16.393 9.8236 16.4778 9.87974 16.549 9.95096C16.6203 10.0222 16.6764 10.107 16.7141 10.2004C16.7518 10.2938 16.7704 10.3938 16.7686 10.4945C16.7668 10.5952 16.7448 10.6945 16.7038 10.7865C16.6628 10.8785 16.6037 10.9613 16.53 11.03L12.53 15.03C12.3894 15.1705 12.1988 15.2493 12 15.2493C11.8012 15.2493 11.6106 15.1705 11.47 15.03L7.47 11.03C7.32955 10.8894 7.25066 10.6988 7.25066 10.5C7.25066 10.3012 7.32955 10.1106 7.47 9.97Z" fill="white" />
                            </svg>

                        </div>
                    </div>

                </div>
                <div id="aktif-zone" class="konaktif-result">
                    <div class="konaktif-result-inner">
                        <img src="/assets/icons/left-arrow-konaktif.svg" class="arrow left-arrow" />
                        <div class="konaktif-result-container">
                            <a href="https://www.istekonak.com/" target="_blank">
                                <div class="konaktif-result-box">
                                    <img src="/assets/images/konaktif/iste-konak.png" />
                                    <span>İŞ'TE KONAK</span>
                                </div>
                            </a>
                            <a href="https://test.konak.bel.tr/etkinlikler/haydi-herkes-spora-913" target="_blank">
                                <div class="konaktif-result-box">
                                    <img src="/assets/images/konaktif/herkes-spora.png" />
                                    <span>HERKES SPORA</span>
                                </div>
                            </a>
                            <div class="konaktif-result-divider"></div>
                            <a href="https://test.konak.bel.tr/haberler/konaktan-hayati-kolaylastiran-hizmet-engelsiz-servis-3222" target="_blank">
                                <div class="konaktif-result-box">
                                    <img src="/assets/images/konaktif/engelsiz-servis.png" />
                                    <span>ENGELSİZ SERVİS</span>
                                </div>
                            </a>
                            <div class="konaktif-result-divider"></div>
                            <a href="https://test.konak.bel.tr/duyurular/psikososyal-destek-merkezi-acildi" target="_blank">
                                <div class="konaktif-result-box">
                                    <img src="/assets/images/konaktif/psikososyal.png" />
                                    <span>KONAK PSİKOSOSYAL MERKEZİ</span>
                                </div>
                            </a>
                            <div class="konaktif-result-divider"></div>
                            <a href="https://test.konak.bel.tr/haberler/konaktan-yenidogan-bebeklere-hos-geldin-hediyesi-3216" target="_blank">
                                <div class="konaktif-result-box">
                                    <img src="/assets/images/konaktif/hos-geldin-bebek.png" />
                                    <span>HOŞ GELDİN BEBEK</span>
                                </div>
                            </a>
                        </div>
                        <img src="/assets/icons/right-arrow-konaktif.svg" class="arrow right-arrow" />
                    </div>
                </div>

            </div>
        </div>
        <!-- SEARCH (SEARCH AND QUICK BUTTONS) END -->

        <!-- MAYOR (MAYOR, NEWS, ANOUNCEMENT AND ACTIVITY) BEGIN -->
        <div class="bottom">
            <div id="mayor" class="mayor-capsule">
                <div class="mayor-inner">
                    <div class="mayor-main">
                        <div class="mayor-picture">
                            <img src="assets/images/mimar_nilufer_cinarli_mutlu.png" />
                        </div>
                        <div id="div-1" class="mayor-cell-items">
                            <div class="mayor-title">
                                <span class="fs-18 fc-white fw-bolder">MİMAR</span>
                                <span class="fs-18 fc-white fw-bolder">NİLÜFER ÇINARLI MUTLU</span>
                                <span class="fs-15 fc-white fw-lighter">KONAK BELEDİYE BAŞKANI</span>
                            </div>
                            <img src="assets/icons/up_arrow.svg" style="padding-right: 24px" />
                        </div>
                        <div id="div-2" class="news-capsule">
                            <div class="news-inner">
                                <span class="fs-19 fw-bold text-center"> <i class="ri-double-quotes-l fs-14"></i> 19 Mayıs Atatürk'ü Anma Gençlik ve Spor Bayramı'mız Kutlu Olsun. <i class="ri-double-quotes-r fs-14"></i> </span>
                                <div class="social-media-icons">
                                    <img src="assets/icons/social/facebook_logo.svg">
                                    <img src="assets/icons/social/instagram_logo.svg">
                                    <img src="assets/icons/social/x_logo.svg">
                                    <img src="assets/icons/social/youtube_logo.svg">
                                </div>
                                <div class="news-detail">
                                    <div class="news-open">
                                        <img src="assets/icons/fluent--chevron-circle-right-24-regular.svg" width="20" height="20" />
                                        <a href="/baskan"><span class="fw-light fs-14">Özgeçmiş<img src="" alt="" srcset=""></span></a>
                                    </div>
                                    <div class="news-all">
                                        <img src="assets/icons/fluent--chevron-circle-right-24-regular.svg" width="20" height="20" />
                                        <span class="fw-light fs-14">Başkan'a Mesaj</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mayor-column-divider"></div>
                    <div class="mayor-cell">
                        <div class="mayor-cell-items">
                            <img src="assets/icons/news.svg" />
                            <span>HABERLER</span>
                            <img src="assets/icons/up_arrow.svg" />
                        </div>
                        <div class="news-capsule">
                            <div class="news-inner">
                                <a href="haberler/<?= htmlspecialchars($url_slug) ?>" class="news-picture-container">
                                    <img src="assets/images/news/<?= $news_image ?>" />
                                </a>
                                <a href="haberler/<?= htmlspecialchars($url_slug) ?>"><span class="fs-19 fw-bold"><?= $news_title ?></span></a>
                                <a href="haberler/<?= htmlspecialchars($url_slug) ?>"><span class="fs-16 fw-light"><?= $formatter->format($date) ?></span></a>
                                <div class="news-detail">
                                    <a href="haberler/<?= htmlspecialchars($url_slug) ?>" class="news-open">
                                        <img src="assets/icons/fluent--chevron-circle-right-24-regular.svg" width="24" height="24" />
                                        <span class="fw-light fs-16">Detaya Git</span>
                                    </a>
                                    <a href="haberler" class="news-all">
                                        <img src="assets/icons/fluent--chevron-circle-right-24-regular.svg" width="24" height="24" />
                                        <span class="fw-light fs-16">Tüm Haberler</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mayor-column-divider"></div>
                    <div class="mayor-cell">
                        <div class="mayor-cell-items">
                            <img src="assets/icons/announcement.svg">
                            <span>DUYURULAR</span>
                            <img src="assets/icons/up_arrow.svg" />
                        </div>
                        <div class="news-capsule">
                            <div class="news-inner">
                                <a href="duyurular/<?= htmlspecialchars($a_url_slug) ?>" class="news-picture-container">
                                    <img src="assets/images/news/<?= $announcement_image ?>" />
                                </a>
                                <a href="duyurular/<?= htmlspecialchars($a_url_slug) ?>"><span class="fs-19 fw-bold"><?= $announcement_title ?></span></a>
                                <a href="duyurular/<?= htmlspecialchars($a_url_slug) ?>"><span class="fs-16 fw-light"><?= $a_formatter->format($a_date) ?></span></a>
                                <div class="news-detail">
                                    <a href="duyurular/<?= htmlspecialchars($a_url_slug) ?>" class="news-open">
                                        <img src="assets/icons/fluent--chevron-circle-right-24-regular.svg" width="24" height="24" />
                                        <span class="fw-light fs-16">Detaya Git</span>
                                    </a>
                                    <a href="duyurular" class="news-all">
                                        <img src="assets/icons/fluent--chevron-circle-right-24-regular.svg" width="24" height="24" />
                                        <span class="fw-light fs-16">Tüm Duyurular</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mayor-column-divider"></div>
                    <div class="mayor-cell">
                        <div class="mayor-cell-items">
                            <img src="assets/icons/calendar.svg" />
                            <span>ETKİNLİKLER</span>
                            <img src="assets/icons/up_arrow.svg" />
                        </div>
                        <div class="news-capsule">
                            <div class="news-inner">
                                <a href="etkinlikler/<?= htmlspecialchars($ac_url_slug) ?>" class="news-picture-container">
                                    <img src="assets/images/activities/<?= $activities_image ?>" />
                                </a>
                                <a href="etkinlikler/<?= htmlspecialchars($ac_url_slug) ?>"><span class="fs-19 fw-bold"><?= $activities_title ?></span></a>
                                <a href="etkinlikler/<?= htmlspecialchars($ac_url_slug) ?>"><span class="fs-16 fw-light"><?= $ac_formatter->format($ac_date) ?></span></a>
                                <div class="news-detail">
                                    <a href="etkinlikler/<?= htmlspecialchars($ac_url_slug) ?>" class="news-open">
                                        <img src="assets/icons/fluent--chevron-circle-right-24-regular.svg" width="24" height="24" />
                                        <span class="fw-light fs-16">Detaya Git</span>
                                    </a>
                                    <a href="etkinlikler" class="news-all">
                                        <img src="assets/icons/fluent--chevron-circle-right-24-regular.svg" width="24" height="24" />
                                        <span class="fw-light fs-16">Tüm Etkinlikler</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--
                        <div class="mayor-column-divider"> </div>
                        <div class="mayor-cell">
                            <div class="mayor-cell-items">
                                <img src="assets/icons/him.svg" style="margin-right: 8px" />
                                <span>HEMŞEHRİ İLETİŞİM MERKEZİ</span>
                            </div>
                        </div>
                    -->
                </div>
            </div>
        </div>
        <!-- MAYOR (MAYOR, NEWS, ANOUNCEMENT AND ACTIVITY) END -->

        <div class="overlay"></div>

    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script type="text/javascript" src="scripts/main.js"></script>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const leftArrow = document.querySelector('.left-arrow');
        const rightArrow = document.querySelector('.right-arrow');
        const container = document.querySelector('.konaktif-result-container');

        let autoScrollInterval;

        function scrollRight() {
            if (container.scrollLeft + container.clientWidth >= container.scrollWidth) {
                container.scrollTo({
                    left: 0,
                    behavior: 'smooth'
                });
            } else {
                container.scrollBy({
                    left: 200,
                    behavior: 'smooth'
                });
            }
        }

        function scrollLeft() {
            if (container.scrollLeft <= 0) {
                container.scrollTo({
                    left: container.scrollWidth,
                    behavior: 'smooth'
                });
            } else {
                container.scrollBy({
                    left: -200,
                    behavior: 'smooth'
                });
            }
        }

        rightArrow.addEventListener('click', scrollRight);
        leftArrow.addEventListener('click', scrollLeft);

        function startAutoScroll() {
            autoScrollInterval = setInterval(scrollRight, 2000);
        }

        function stopAutoScroll() {
            clearInterval(autoScrollInterval);
        }

        container.addEventListener('mouseover', stopAutoScroll);
        container.addEventListener('mouseout', startAutoScroll);

        startAutoScroll();
    });
</script>

</html>