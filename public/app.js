/* Menu Pop Up */
    $(".popUpPhone").on("click", (event) => {
        event.preventDefault();
        alert('dsdasda');
        document.body.style.overflow = 'hidden';
        $(".popUpPhone").toggleClass("popUp__active");
    });

    $(".header__enter").on("click", (event) => {
        event.preventDefault();
        document.body.style.overflow = 'hidden';
        $(".popUp").toggleClass("popUp__active");
    });

    $(".popUp__close").on("click", (event) => {
        event.preventDefault();
        document.body.style.overflow = 'scroll';
        $(".popUp").removeClass("popUp__active");
        $(".popUpPhone").removeClass("popUp__active");
    });

/* Browse */
    $(".catalog__gallery").on("click", (event) => {
        event.preventDefault();
        document.body.style.overflow = 'hidden';
        $(".browse").toggleClass("browse__active");
    });

    $(".browse__fon").on("click", (event) => {
        event.preventDefault();
        document.body.style.overflow = 'scroll';
        $(".browse").removeClass("browse__active");
    });

    $(".browse_background").on("click", (event) => {
        event.preventDefault();
        document.body.style.overflow = 'scroll';
        $(".browse").removeClass("browse__active");
    });


/* Browse Slider*/
    $('.browse__wrapper').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        prevArrow: ('.arrows__prew'),
        nextArrow: ('.arrows__next')
    });


/* Accordion */
    $(".accordion__label").click(function(e) {

    $(this.firstElementChild).toggleClass('open');
    });
