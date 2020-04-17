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

 import Axios from 'axios';

const app = new Vue({
    el: '#app',
    data(){
        return{
            car:"",
            token:$('meta[name="csrf-token"]').attr('content'),
            current_currency:"USD",
            total:0.00,
            payment_method:"Ecocash",
            daily_rate:0.00,
            co_daily_rate:0.00,
            num_days:0,
            rate_bond:25,
            rate_rand:15,
            bond:0.00,
            rand:0.00,
        }
    },
    methods:{
        datepickers(car){
            var startDate;
            var endDate;
            var root = this.$root;

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
                  root.num_days = endDate.getDate() - startDate.getDate(); 
                  root.total = root.num_days * root.co_daily_rate;
                  root.totalAmount = root.current_currency + root.total;
              });
          },

          showModal(car){
            $('form').form('reset');
            
            $('#reservationmodal').modal('show');

            this.car = car;
            this.daily_rate = car.daily_rate;
            this.co_daily_rate = this.daily_rate;
            
            this.bond = this.daily_rate*this.rate_bond;
            this.rand = this.daily_rate*this.rate_rand;

            this.totalAmount = this.current_currency + this.total;
          },

          closeDialog(){
            $('.modal').modal('hide');
          },
          change(){
            var root = this.$root;

            $("#currency").change(function(){
              
              var currency = $(this).val();
              
              if(currency === ("USD")){
                root.current_currency = currency;
                root.co_daily_rate = root.daily_rate;
                root.total = root.num_days*root.daily_rate;
              }
        
              else if(currency === ("Rand")){
                root.current_currency = "R";
                root.co_daily_rate = root.rand;
                root.total = root.num_days*(root.daily_rate*root.rate_rand);
              }
        
              else if(currency === ("ZWL Bond")){
                root.current_currency = "ZWL$";
                root.co_daily_rate = root.bond;
                root.total = root.num_days*(root.daily_rate*root.rate_bond);
              }

              root.totalAmount = root.current_currency + root.total; 

            })
        
            $(".payment_method").change(function(){
              var payment_method = $(this).val();
              var mobile = $("#mobile_money");

              if(payment_method === ("Ecocash") || payment_method === ("OneMoney")){
                //show mobile number input
                mobile.show();
              }
        
              else if(payment_method === ("Other")){
                mobile.hide();
              }
            });
          },
          submitTheForm(){
            //if terms are checked and dates filled then submit
            //dates are required 
            var formElement = document.querySelector("#reservation_form");
            var formData = new FormData(formElement);
            var dates = ((formData.get('pick_up_date') != null)&&(formData.get('return_date') != null))
    
            if($("#terms").is(":checked") && dates){
              $("#loading_payment").modal('show');
            }
            
            //else alert errros
            
          }
    },
    mounted(){
        this.change();
    }
});
