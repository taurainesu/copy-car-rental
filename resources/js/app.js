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
Vue.component('home', require('./components/Home.vue').default);
Vue.component('search', require('./components/Search.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data(){
        return{
            car:"",
            token:$('meta[name="csrf-token"]').attr('content'),
        }
    },
    methods:{
        datepickers(car){
            var startDate;
            var endDate;

            $("#date_picker1").datepicker({
                minDate: '+0d',
                changeMonth: true, 
                changeYear: true,
              });

              $("#date_picker1").datepicker('show');

              $(function() { 

                  $("#date_picker2").datepicker({}); 

              }); 

              $('#date_picker1').change(function() { 

                  startDate = $(this).datepicker('getDate'); 

                  $("#date_picker2").datepicker("option", "minDate", startDate); 
              }) 

              $('#date_picker2').change(function() { 

                  endDate = $(this).datepicker('getDate'); 

                  $("#date_picker1").datepicker("option", "maxDate", endDate); 
                  var diffDays = endDate.getDate() - startDate.getDate(); 
                  var total=diffDays* car.daily_rate;
                  $("#attribute").text("Total $");
                  $("#total_price").text(total);

              });
          },

          showModal(car){
            $('.modal').modal('show');
            this.car = car;
          },
          closeDialog(){
            $('.modal').modal('hide');
          },
    },
});
