function aramaYap(str) {
    if (str.length > 2) {
        $.ajax({
            url: 'search',
            method: 'GET',
            data: { q: str },
            success: function (data) {
                $('#result-zone').html(data);
            },
        });
    } else {
        $('#result-zone').empty();
    }
}

$(document).ready(function () {
    var menuCapsuleHeight = $('.menu-capsule').outerHeight();
    $('.menu-dropdown').css('top', menuCapsuleHeight + 'px');

    $(".menu-link").hover(
        function () {
            var targetId = $(this).data("target");
            if (targetId) {
                $("#" + targetId).stop(true, true).slideDown(150);
            }
        },
        function () {
            var targetId = $(this).data("target");
            if (targetId) {
                if (!$("#" + targetId).is(':hover')) {
                    $("#" + targetId).stop(true, true).slideUp(300);
                }
            }
        }
    );

    $(".menu-dropdown").hover(
        function () {
            $(this).stop(true, true).show();
        },
        function () {
            $(this).stop(true, true).slideUp(300);
        }
    );

    /* MAYOR DIV : RESIZE */
    var width = $("#div-1").width();
    $("#div-2").css('width', width + 'px');
    /* MAYOR DIV : RESIZE */

    /* SEARCH */
    const $searchInput = $('.search-input');
    const $searchResult = $('.search-result');

    $searchInput.on('input', function () {
        if ($(this).val().length > 0) {
            $searchResult.css('display', 'flex');
        } else {
            $searchResult.css('display', 'none');
        }
    });

    $(document).on('click', function (event) {
        if (!$(event.target).closest('.search-inner, .search-result').length) {
            $searchResult.css('display', 'none');
        }
    });

    $searchInput.on('focus', function () {
        if ($(this).val().length > 0) {
            $searchResult.css('display', 'flex');
        }
    });

    /* SEARCH */
    const input = document.getElementById("animated-placeholder");
    const placeholderTexts = [
        "Size nasıl yardımcı olabiliriz ?",
        "Örn: vergi ödemesi",
        "Örn: evlilik işlemleri",
        "Örn: veteriner hizmetleri"
    ];
    let textIndex = 0;
    let charIndex = 0;
    let typingTimeout, erasingTimeout, pauseTimeout;

    function typePlaceholder() {
        if (charIndex < placeholderTexts[textIndex].length) {
            input.setAttribute("placeholder", placeholderTexts[textIndex].substring(0, charIndex + 1));
            charIndex++;
            typingTimeout = setTimeout(typePlaceholder, 80); // Harf arası gecikme süresi (ms)
        } else {
            pauseTimeout = setTimeout(erasePlaceholder, 1500); // Cümlenin tamamı yazıldıktan sonra bekleme süresi (ms)
        }
    }

    function erasePlaceholder() {
        if (charIndex > 0) {
            input.setAttribute("placeholder", placeholderTexts[textIndex].substring(0, charIndex - 1));
            charIndex--;
            erasingTimeout = setTimeout(erasePlaceholder, 25); // Harf arası silme süresi (ms)
        } else {
            textIndex = (textIndex + 1) % placeholderTexts.length;
            pauseTimeout = setTimeout(typePlaceholder, 250); // Tamamen silindikten sonra bekleme süresi (ms)
        }
    }

    function stopAnimationAndClearPlaceholder() {
        clearTimeout(typingTimeout);
        clearTimeout(erasingTimeout);
        clearTimeout(pauseTimeout);
        input.setAttribute("placeholder", "");
    }

    input.addEventListener('focus', stopAnimationAndClearPlaceholder);
    input.addEventListener('blur', function () {
        if (input.value === "") {
            charIndex = 0;
            typePlaceholder();
        }
    });

    typePlaceholder();

    /* KONAKTIF */
    const $konaktifButton = $('#konaktif-button');
    const $konaktifResult = $('.konaktif-result');

    $konaktifButton.hover(
        function () {
            $konaktifResult.css('display', 'flex');
        },
        function () {
            $konaktifResult.css('display', 'none');
        }
    );

    $konaktifResult.hover(
        function () {
            $konaktifResult.css('display', 'flex');
        },
        function () {
            $konaktifResult.css('display', 'none');
        }
    );
});
