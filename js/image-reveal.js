    
    /*------------------------------------------------------------------------------*/
        /* Image reveal animation
        /*------------------------------------------------------------------------------*/

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