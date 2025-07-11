

        let revealContainers = document.querySelectorAll(".image-reveal");

        revealContainers.forEach((imageContainer) => {

            let image = imageContainer.querySelector("img");

            let tl = gsap.timeline({
                scrollTrigger: {
                    trigger: imageContainer,
                    start: "top 80%",
                    toggleActions: "play restart play play",
                    onEnter: () => tl.play(),
                }
            });

            tl.set(imageContainer, { autoAlpha: 1 });
            tl.from(imageContainer, 1.5, {
                xPercent: -100,
                yPercent: -100,
                ease: Power2.out
            });
            tl.from(image, 1.5, {
                xPercent: 100,
                yPercent: 100,
                delay: -1.5,
                ease: Power2.out
            });
        });

        // Second block
        let revealContainers1 = document.querySelectorAll(".image-reveal-block");

        revealContainers1.forEach((imageContainer1) => {
            let image = imageContainer1.querySelector("img");

            let tl = gsap.timeline({
                scrollTrigger: {
                    trigger: imageContainer1,
                    start: "top 80%",
                    toggleActions: "play restart play play",
                    onEnter: () => tl.play(),
                }
            });

            tl.set(imageContainer1, { autoAlpha: 1 });
            tl.from(imageContainer1, 1.5, {
                yPercent: -100,
                ease: Power2.out
            });
            tl.from(image, 1.5, {
                yPercent: 100,
                delay: -1.5,
                ease: Power2.out
            });
        });

         // portfolio page gallery
        $(document).ready(function () {
        function adjustItemPositions() {
        var $container = $('.gallery-section');
        var $items = $('.featured-imagebox-portfolio.style1');
        var containerWidth = $container.width();
        var gutter = 30;
      

        // Determine responsive pattern
        let layoutPattern;
        if (window.innerWidth <= 768) {
            layoutPattern = [1]; 
        } else if (window.innerWidth <= 1280) {
            layoutPattern = [1,3,3]; 
        } else {
            layoutPattern = [2, 3, 2]; 
        }

        var itemIndex = 0;
        var topOffset = 0;

        $items.css({
            position: 'absolute'
        });

        // Loop through items, repeating the layout pattern
        while (itemIndex < $items.length) {
            for (let patternIndex = 0; patternIndex < layoutPattern.length && itemIndex < $items.length; patternIndex++) {
                let itemsInRow = layoutPattern[patternIndex];

                // Use fixed width for 2-column rows, calculated width for 3-column rows
                let itemWidth = itemsInRow === 2
                    ? $items.first().outerWidth(true)  // or replace with a fixed value like 600
                    : Math.floor((containerWidth - gutter * (itemsInRow - 1)) / itemsInRow);



                let maxHeightInRow = 0;

                for (let j = 0; j < itemsInRow && itemIndex < $items.length; j++) {
                    let $item = $($items[itemIndex]);
                    let left = j * (itemWidth + gutter);

                    // Optional: tag items with row type classes
                    $item.removeClass('in-two-col-row in-three-col-row');
                    $item.addClass(itemsInRow === 2 ? 'in-two-col-row' : 'in-three-col-row');

                    $item.css({
                        width: itemWidth + 'px',
                        left: left + 'px',
                        top: topOffset + 'px'
                    });

                    $item[0].offsetHeight; // force reflow

                    let itemHeight = $item.outerHeight(true);
                    if (itemHeight > maxHeightInRow) {
                        maxHeightInRow = itemHeight;
                    }

                    itemIndex++;
                }

                topOffset += maxHeightInRow + gutter;
            }
        }

        // Update container height
        $container.css({
            position: 'relative',
            height: topOffset + 'px'
        });
    }

    // Utility to wait until all images are loaded
    function imagesLoaded($container, callback) {
        var $imgs = $container.find('img');
        var loaded = 0;

        if ($imgs.length === 0) {
            callback();
            return;
        }

        $imgs.each(function () {
            if (this.complete) {
                if (++loaded === $imgs.length) callback();
            } else {
                $(this).on('load error', function () {
                    if (++loaded === $imgs.length) callback();
                });
            }
        });
    }

    // Ensure all images are actually rendered
    function imagesLoaded($container, callback) {
        const $imgs = $container.find('img');
        let loaded = 0;

        if ($imgs.length === 0) {
            callback();
            return;
        }

        $imgs.each(function () {
            const img = this;
            if (img.complete && img.naturalHeight !== 0) {
                loaded++;
                if (loaded === $imgs.length) callback();
            } else {
                $(img).on('load error', function () {
                    loaded++;
                    if (loaded === $imgs.length) {
                        // Slight delay to let layout settle
                        setTimeout(callback, 50);
                    }
                });
            }
        });
    }

    function initLayout() {
        imagesLoaded($('.gallery-section'), function () {
            adjustItemPositions();
        });
    }

    // Initial layout
    initLayout();

    // Debounced resize
    let resizeTimer;
    $(window).on('resize', function () {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            initLayout();
        }, 200);
    });

    // Final fallback
    $(window).on('load', function () {
        initLayout();
    });

    
});