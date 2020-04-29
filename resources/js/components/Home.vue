<template>
<div>
  <div>
      <div style="background:url('/toyota.jpg') no-repeat;background-size:cover;padding:6% 0">
        <div class="ui container">
          <div class="ui card row" style="width:40%;padding:20px">
            <div class="content">
              <h3>Rent a Vehicle</h3>
              <div class="ui divider"></div>
                <div class="ui floating dropdown labeled icon button search" id="loc" style="width:100%">
                  <input class="search" autocomplete="off" tabindex="0" name="location">
                  <span class="text">Where are you located?</span>
                  <i class="map marker alternate icon"></i>
                  <div class="menu" tabindex="-1">
                    <div class="item" data-value="Harare">Harare</div>
                    <div class="item" data-value="Bulawayo">Bulawayo</div>
                    <div class="item" data-value="Masvingo">Masvingo</div>
                    <div class="item" data-value="Mutare">Mutare</div>
                    <div class="item" data-value="Gweru">Gweru</div>
                    <div class="item" data-value="Beitbridge">Beitbridge</div>
                    <div class="item" data-value="Victoria Falls">Victoria Falls</div>
                    <div class="item" data-value="Hwange">Hwange</div>
                    <div class="item" data-value="Kariba">Kariba</div>
                  </div>
                </div>
                
                <br><br>

                <div class="ui floating search dropdown labeled icon button" style="width:100%" id="carType">
                  <input class="search" autocomplete="off" tabindex="0" name="carType">
                  <span class="text">Vehicle Type</span>
                  <i class="car alternate icon"></i>
                  <div class="menu" tabindex="-1">
                    <div class="item" data-value="Fuel Saver">Fuel Saver</div>
                    <div class="item" data-value="Luxury Vehicle">Luxury Vehicle</div>
                    <div class="item" data-value="SUV">SUV</div>
                    <div class="item" data-value="Medium Sized Cars">Medium Sized Cars</div>
                    <div class="item" data-value="Tow Truck">Tow Truck</div>
                  </div>
                </div>

                <br><br>

              <div class="ui two column centered grid mb-3">
                <div class="column">
                  <div class="ui input fluid icon right"> 
                    <i class="icon calendar"></i>
                    <input placeholder="Start Date" name="pickUpDate" id="pickUpDate" @click="searchDates()" >
                  </div>
                </div>

                <div class="column">
                  <div class="ui input fluid icon right">
                    <i class="icon calendar"></i>
                    <input placeholder="End Date" name="dropOffDate" id="dropOffDate">
                  </div> 
                </div>
              </div>

              <div class="ui divider"></div>

              <button class="orange ui compact button large" style="padding:15px;width:100%" id="search" @click="searchCars()">Find Vehicles</button>

            </div>
          </div>
        </div>
      </div>

      <div class="ui container" v-if="!search" style="margin:2% 0 5% 0;">
        <div class="column">
           <h3 class="ui">Featured Vehicles</h3>
           <div class="ui divider"></div>
        </div>
        <div class="ui">
          <div class="ui four special cards" v-if="cars.length > 0">
            <div class="card" v-for="car in cars" v-bind:key="car.id" style="border-radius:0">
            <div class="image">
              <img style="width:80%;height:100%;margin:auto;padding:20px" :src="car.imageUrl">
            </div>
            <div class="content">
              <div class="header" style="font-size:16px">{{car.year}} {{car.brand}} {{car.model}}</div>
              <div class="meta" style="padding-bottom:10px">
              </div>
              <p><strong>Milage</strong> : {{car.milage}}km</p>
              <p><strong>Location</strong> : {{car.location}}</p>
              <p><strong>Rental Rate</strong> : USD{{car.daily_rate}}/day</p>
            </div>
            <div class="extra content">
              <a v-bind:href="'cars/info/'+car.id">
                <button class="ui button icon orange right floated" style="width:48%">
                View
                </button>
              </a>
              
                <button :class="{'ui button orange' : car.supplier_id != user.id,'ui button orange disabled' : car.supplier_id == user.id}"  style="width:48%" @click="$root.showModal(car)">
                Reserve
                </button>
            
            </div>
          </div>

          </div>

          <p align="center"  v-if="cars.length <= 0" style="padding:20px 0 0 0">
              No vehicles found...Please reload page
          </p>
        </div>
      </div>

      <div class="ui" v-if="search">
        <div class="column p-5">
           <h1 class="text-center" style="text-decoration:underline">Search Results</h1>
        </div>
        <div class="ui container pb-5">
          <div class="ui four special cards">

          <div class="card" v-for="car in searchedCars" v-bind:key="car.id" style="border-radius:0">
            <div class="blurring dimmer image">
              <div class="ui dimmer">
                <div class="content">
                  <div class="center">
                    <div class="ui inverted button">View More</div>
                  </div>
                </div>
              </div>
              <img style="width:80%;height:100%;margin:auto;padding:20px" :src="car.imageUrl">
            </div>
            <div class="content">
              <div class="header" style="font-size:16px">{{car.year}} {{car.brand}} {{car.model}}</div>
              <div class="meta" style="padding-bottom:10px">
              </div>
              <p style="font-size:12px">Milage : {{car.milage}}km</p>
              <p style="font-size:12px">Location : {{car.location}}</p>
              <p style="font-size:12px">Rental Rate : <strong>$ZWL{{car.daily_rate}}/day</strong></p>
            </div>
              <div class="column" style="padding:0;margin:0"> 
                <button class="orange ui button" style="width:100%;border-radius:0px">Reserve Now</button>
              </div>
          </div>


          </div>
        </div>
      </div>

      

    </div>
</div>
</template>

<script>

    import Axios from 'axios';
    export default {
        data(){
            return{
                search:false,
                location:"",
                carType:"",
                showModalForm:true,
                dropOffDate:"",
                pickUpDate:"",
                cars:"",
                user:"",
                modal:false,
                searchedCars:"",
                number:0,
                car:"",
                reservation:{
                  pick_up_date:null,
                  return_date:null,
                  payment_status:"Pending",
                  vehicle_id:null,
                  daily_rate:null,
                },
            }
        },
        methods:{ 
            // searchCars(){
            //     Axios.get("/cars/search",{
            //     params: {
            //         location:$("#loc").dropdown("get value"),
            //         carType:$("#carType").dropdown("get value"),
            //         pickUpDate:$("#pickUpDate").val(),
            //         dropOffDate:$("#dropOffDate").val()
            //     }
            //     }).then(response=>{
            //       this.searchedCars = response.data;

            //       if(this.searchedCars.length > 0){
            //         this.search = true;
            //         this.number = this.searchedCars.length;
            //       }

            //       else{
            //         this.search = false;
            //         alert("No vehicles matching those parameters were found. Please refine your search and try again.")
            //       }
            //     console.log(response.data);
            // }).catch(error=>{
            //     console.log(error)
            // })
            // },
            searchCars(){
              window.document.location = "/cars/search?location="+$("#loc").dropdown("get value") +
              "&carType="+$("#carType").dropdown("get value")+
              "&pickUpDate="+$("#pickUpDate").val()+
              "&dropOffDate="+$("#dropOffDate").val();
            },
            getCars(){
              Axios.get("/cars/get").then(response=>{
                this.cars = response.data;
                console.log(response.data);
            }).catch(error=>{
                console.log(error)
            })
            },
            openInfo(id){
              window.open("/cars/info/"+id,"_self");
            },

            reserveCar(){
              Axios.post("/reservations/new",this.reservation).then(response=>{
                this.cars = response.data;
                console.log(response.data);});
            },

            searchDates(){
              var startDate;
              var endDate;

              $("#pickUpDate").datepicker({
                minDate: '+0d',
                changeMonth: true, 
                changeYear: true,
              })

              $("#pickUpDate").datepicker('show');

                $(function() { 

                    $("#dropOffDate").datepicker({}); 

                });

                $('#pickUpDate').change(function() { 

                    startDate = $(this).datepicker('getDate'); 

                    $("#dropOffDate").datepicker("option", "minDate", startDate); 
                }) 

                $('#dropOffDate').change(function() { 

                    endDate = $(this).datepicker('getDate'); 

                    $("#pickUpDate").datepicker("option", "maxDate", endDate); 
                });
                
            }
        },
        mounted(){
            this.getCars();

            Axios.post("/user/id").then(response=>{
              this.user = response.data;
            })
        },
    }
</script>


