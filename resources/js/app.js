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
    $(".popUpPhone").removeClass("popUp__active");
    $(".popUpKorzina").removeClass("popUp__active");
});

/* Browse */
$(".catalog__gallery").on("click", (event) => {
  //  event.preventDefault();
 //   document.body.style.overflow = 'hidden';
  //  $(".browse").toggleClass("browse__active");
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

$(".header__communication").on("click", (event) => {
    event.preventDefault();
    document.body.style.overflow = 'hidden';
    $(".popUpPhone").toggleClass("popUp__active");
});



$("#sendzaivka").on("click", (event) => {
    event.preventDefault();
   // alert('Zaivka отправлена');

   // $('#divZaivka').innerHTML="Заявка отправлена";
    let phoneZaiva=$('#phonezaivka').val();
    document.getElementById("divZaivka").innerHTML = "<h1>Заявка отправлена</h1>";
    $.ajax({
        url: '/sendzaivka',
        method: 'post',
        dataType: 'html',
        data: {text:phoneZaiva , "_token": $('meta[name="csrf-token"]').attr('content'),},
        success: function(data){
            console.log(data);
        }
    });
});

$(".addcard").on("click",  function() {
    var  tovarid=$(this).data('tovarid');
    var  tovarname=$(this).data('tovarname');
    var  tovarprice=$(this).data('tovarprice');
    var  counttovar=$('.count_modal_tovar').val();
    $.ajax({
        url: '/addtovar',
        method: 'post',
        dataType: 'html',
        data: {tovarid:tovarid ,
            tovarname:tovarname,
            counttovar:counttovar,
            price:tovarprice,
            "_token": $('meta[name="csrf-token"]').attr('content'),},
        success: function(data){
            alert('Товар в корзине !');
            console.log(data);
        }
    });
});


$(".header__basket").on("click", (event) => {
    event.preventDefault();
   // document.body.style.overflow = 'hidden';
    $.ajax({
        url: '/showcards',
        method: 'post',
        dataType: 'html',
        data: {
            "_token": $('meta[name="csrf-token"]').attr('content'),},
        success: function(data){
            console.log(data);
            document.getElementById("ShowCard").innerHTML = data;
            $(".popUpKorzina").toggleClass("popUp__active");
        }
    });

});


//

/* Accordion */
$(".accordion__label").click(function(e) {
    $(this.firstElementChild).toggleClass('open');
});


/**
 * удалить позицию в корзине
 */
$(document).on('click','.deletZakaz',function() {
    var tovar_id=$(this).data('id');
    $.ajax({
        url: '/deletecards',
        method: 'post',
        dataType: 'html',
        data: {
            "tovarid":tovar_id,
            "_token": $('meta[name="csrf-token"]').attr('content'),},
        success: function(data){
            console.log(data);
            document.getElementById("ShowCard").innerHTML = data;
        }
    });
});

$(document).on('click','.sendZakaz',function() {

    $.ajax({
        url: '/sendzakaz',
        method: 'post',
        dataType: 'html',
        data: {
            "_token": $('meta[name="csrf-token"]').attr('content'),},
        success: function(data){
            console.log(data);
            alert('Заявка отправлена')
            event.preventDefault();
            document.body.style.overflow = 'scroll';
            $(".popUp").removeClass("popUp__active");
            $(".popUpPhone").removeClass("popUp__active");
            $(".popUpKorzina").removeClass("popUp__active");
            location.reload(); // перезагружаем страницу
        }
    });
});

