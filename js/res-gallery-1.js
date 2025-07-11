 // home page gallery
$(document).ready(function () {
    function adjustItemPositions() {
        var $container = $('.gallery-section');
        var $items = $container.find('.featured-imagebox-portfolio.style1');
        var containerWidth = $container.width();
        var gutter = 30;

        var itemsPerRow = 3;
        if (window.innerWidth <= 765) {
            itemsPerRow = 1;
        } else if (window.innerWidth <= 1021) {
            itemsPerRow = 2;
        }

        var itemWidth = Math.floor((containerWidth - (gutter * (itemsPerRow - 1))) / itemsPerRow);

        $items.css({ width: itemWidth + 'px' });

        var columnHeights = new Array(itemsPerRow).fill(0);

        $items.each(function () {
            var $item = $(this);
            var minColIndex = columnHeights.indexOf(Math.min(...columnHeights));
            var left = minColIndex * (itemWidth + gutter);
            var top = columnHeights[minColIndex];

            $item.css({
                position: 'absolute',
                left: left + 'px',
                top: top + 'px'
            });

            columnHeights[minColIndex] += $item.outerHeight(true) + gutter;
        });

        var containerHeight = Math.max(...columnHeights);
        $container.css({
            position: 'relative',
            height: containerHeight + 'px'
        });
    }

    function initializeGalleryLayout() {
        var $gallery = $('.gallery-section');

        // Make sure it's visible before layout
        $gallery.css('visibility', 'hidden');

        $gallery.imagesLoaded({ background: true }, function () {
            adjustItemPositions();
            $gallery.css('visibility', 'visible');
        });
    }

    // Initial load
    initializeGalleryLayout();

    // Responsive: debounce resize
    let resizeTimer;
    $(window).on('resize', function () {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function () {
            initializeGalleryLayout();
        }, 200);
    });

    // Final fallback
    $(window).on('reload', function () {
       initializeGalleryLayout();
    });


});
