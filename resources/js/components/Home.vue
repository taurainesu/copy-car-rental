<template>
<div>
  <div>
      <div style="background:url('/toyota.jpg') no-repeat;background-size:cover;padding:5% 0">
        <div class="ui container">
          <div class="ui card row p-4" style="width:40%;">
            <div class="content">
              <h2>Rent a Car</h2>
              <div class="ui divider"></div>
                <div class="ui floating dropdown labeled icon button w-100 search my-2" id="loc" style="width:100%">
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

                <div class="ui floating search dropdown labeled icon button w-100 mb-2" style="width:100%" id="carType">
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

              <div class="ui two column centered grid mb-2">
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

              <button class="orange ui compact button p-3 mt-2" id="search" style="width:100%" @click="searchCars()">Find Vehicles</button>

            </div>
          </div>
        </div>
      </div>

      <div class="ui" v-if="!search">
        <div class="column p-5">
           <h1 class="ui center aligned header">Featured Vehicles</h1>
        </div>
        <div class="ui container pb-5">
          <div class="ui four special cards">
            <div class="card" v-for="car in cars" v-bind:key="car.id" style="border-radius:0">
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

          <div class="card" v-for="car in cars" v-bind:key="car.id" style="border-radius:0">
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


          <div class="card" v-for="car in cars" v-bind:key="car.id" style="border-radius:0">
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

          <div class="card" v-for="car in cars" v-bind:key="car.id" style="border-radius:0">
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
                dropOffDate:"",
                pickUpDate:"",
                cars:"",
                searchedCars:"",
                number:0,
                car:"",
                reservation:{
                  pick_up_date:null,
                  return_date:null,
                  payment_status:"Pending",
                  vehicle_id:null,
                  daily_rate:null,
                }
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
            }
        },
        mounted(){
            this.getCars();
        },
    }
</script>
