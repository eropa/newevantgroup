/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('auser-component', require('./components/UserComponent.vue').default);
Vue.component('fotoindex-component', require('./components/FotomainComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

/* Menu Pop Up */
$(".header__enter").on("click", (event) => {
    event.preventDefault();
    document.body.style.overflow = 'hidden';
    $(".popUp").toggleClass("popUp__active");
});

$(".popUp__close").on("click", (event) => {
    event.preventDefault();
    document.body.style.overflow = 'scroll';
    $(".popUp").removeClass("popUp__active");
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
