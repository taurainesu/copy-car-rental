<template>
<div>
  <div>
      <div style="background:url('/toyota.jpg') no-repeat;background-size:cover;padding:6% 0">
        <div class="ui container">
          <div class="ui card row" style="width:40%;padding:20px">
            <div class="content">
              <h2>Rent a Vehicle</h2>
              <div class="ui divider"></div>
                <div class="ui floating dropdown labeled icon button w-100 search my-3" id="loc" style="width:100%">
                  <input class="search" autocomplete="off" tabindex="0" name="location">
                  <span class="text">Where are you located?</span>
                  <i class="map marker alternate icon"></i>
                  <div class="menu" tabindex="-1">
                    <div class="item" data-value="Harare">Harare</div>
                    <div class="item" data-value="Bulawayo">Bulawayo</div>
                    <div class="item" data-value="Masvingo">Masvingo</div>
                    <div class="item" data-value="Mutare">Mutare</div>
                    <div class="item">Gweru</div>
                  </div>
                </div>
                
                <br><br>

                <div class="ui floating search dropdown labeled icon button" style="width:100%" id="carType">
                  <input class="search" autocomplete="off" tabindex="0" name="carType">
                  <span class="text">Vehicle Type</span>
                  <i class="car alternate icon"></i>
                  <div class="menu" tabindex="-1">
                    <div class="item" data-value="Hatchback">Hatchback</div>
                    <div class="item" data-value="SUV">SUV</div>
                    <div class="item" data-value="Sedan">Sedan</div>
                  </div>
                </div>

                <br><br>

              <div class="ui two column centered grid mb-3">
                <div class="column">
                  <div class="ui input fluid"> 
                    <input placeholder="Start Date" type="date" name="pickUpDate" id="pickUpDate">
                  </div>
                </div>

                <div class="column">
                  <div class="ui input fluid">
                    <input placeholder="End Date" type="date" name="dropOffDate" id="dropOffDate">
                  </div> 
                </div>
              </div>

              <div class="ui divider"></div>

              <button class="orange ui compact button" style="padding:15px;width:100%" id="search" @click="searchCars()">Find Vehicles</button>

            </div>
          </div>
        </div>
      </div>

      <div class="ui container" v-if="!search">
        <div class="column">
           <h1 class="ui" style="padding:40px 0">Featured Vehicles</h1>
        </div>
        <div class="ui"  style="padding-bottom:40px">
          <div class="ui four special cards">
            <div class="card" v-for="car in cars" v-bind:key="car.id" style="border-radius:0">
            <div class="image">
              <img style="width:80%;height:100%;margin:auto;padding:20px" :src="car.imageUrl">
            </div>
            <div class="content">
              <div class="header" style="font-size:16px">{{car.year}} {{car.brand}} {{car.model}}</div>
              <div class="meta" style="padding-bottom:10px">
              </div>
              <p style="font-size:14px"><strong>Milage</strong> : {{car.milage}}km</p>
              <p style="font-size:14px"><strong>Location</strong> : {{car.location}}</p>
              <p style="font-size:14px"><strong>Rental Rate</strong> : $ZWL{{car.daily_rate}}/day</p>
            </div>
            <div class="extra content">
              <a v-bind:href="'cars/info/'+car.id">
                <button class="ui button icon orange right floated" style="width:48%">
                View
                </button>
              </a>
              
                <button class="ui button orange" style="width:48%" @click="showModal(car)">
                Reserve
                </button>
              
              
            </div>
          </div>

          </div>
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

      <div class="ui tiny modal middle aligned " id="reservationmodal">
        <i class="close icon"></i>
        <div class="header">Rent a {{car.brand}} {{car.model}}</div>
        <div class="content">
          <form form method="POST" action="/reservations/new" enctype="multipart/form-data" >
            <input type="text" hidden id="crsf_token" v-model="token" name="_token">
            <div class="ui two column centered grid">
              <div class="column">
                <div class="ui input fluid ">
                  <input id="date_picker1" autocomplete="off" name="pick_up_date" placeholder="Start Date" type="text" @click="datepickers(car)" required>
                </div>
              </div>
              <div class="column">
                <div class="ui input fluid">
                  <input id="date_picker2" name="return_date" placeholder="End Date"  autocomplete="off" required>
                </div> 
              </div>
            </div>

            <div class="ui divider"></div>

            <h5>Additional Options</h5>
            <input type="checkbox" name="ui checkbox" ><label>Insuarance</label> 
            <input type="checkbox" name="ui checkbox" ><label>Delivery</label> 

            <div class="ui divider"></div>
            <div class="ui two column grid">
              <h5 id="attribute">Daily rate $</h5> 
              <strong id="total_price"> {{car.daily_rate}}</strong>
            </div>
            <br>
            <input type="hidden" id="custId" name="car_id" v-bind:value="car.id">
            <button type="submit" class="orange ui compact inverted button">RESERVE</button>  
          </form> 
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
                dropOffDate:"",
                pickUpDate:"",
                cars:"",
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
                token:$('meta[name="csrf-token"]').attr('content'),
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
              window.document.location = "http://localhost:3000/cars/search?location="+$("#loc").dropdown("get value") +
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
            showModal(car){
              $('.modal').modal('show');
              this.car = car;
              this.reservation.vehicle_id = car.id;
              this.reservation.daily_rate = car.daily_rate;
            },
            closeDialog(){
              $('.modal').modal('hide');
            },

            reserveCar(){
              Axios.post("/reservations/new",this.reservation).then(response=>{
                this.cars = response.data;
                console.log(response.data);});
            },

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
            }
        },
        mounted(){
            this.getCars();
        },
    }
</script>


