<template>
    <div class="ui container">
      <div class="ui card row" style="width:40%">
        <div class="content p-4">
            <h3>Rent a Car</h3>
            <div class="ui divider"></div>
              <div class="ui floating dropdown button w-100 search" id="loc" style="width:100%">
                <input class="search" autocomplete="off" tabindex="0" name="location"><span class="text">Where are you located ?</span>
              <div class="menu" tabindex="-1">
                <div class="item" data-value="Harare">Harare</div>
                <div class="item" data-value="Bulawayo">Bulawayo</div>
                <div class="item" data-value="Masvingo">Masvingo</div>
                <div class="item" data-value="Mutare">Mutare</div>
              <div class="item">Gweru</div>
              </div>
    				</div>
            <br/>
      
            <div class="ui two column centered grid">
            <div class="column"><div class="ui input fluid">
              <input placeholder="Pick-up Date" type="date" class="form-control" v-model="pickUpDate">
                </div></div>
              <div class="column"><div class="ui input fluid">
              <input placeholder="Dropoff Date" class="form-control" type="date" v-model="dropOffDate">
            </div> </div>
            </div>
            <div class="ui divider"></div>
              <button @click="searchCars()"  class="ui primary button col-md-12">Find Vehicles</button>
        </div>
      </div>

      <div v-if="!search">
          <h3 style="margin-top:40px">Featured Vehicles</h3>
          <div class="ui four cards">
            <div class="card" v-for="car in cars" v-bind:key="car.id">
              <div class="image">
                <img :src="car.imageUrl" style="height:180px;padding:20px">
              </div>
              <div class="content">
                <div class="header">{{car.brand}} {{car.model}}</div>
                <div class="meta">
                  <a class="group">{{car.year}}</a>
                </div>
                <h5 style="margin:10px 0px">{{car.location}}</h5>
                <p class="description">{{car.description}}</p>
                <div class="ui two column centered grid">
                  <div class="column"><h5>$ZWL{{car.daily_rate}} per day</h5></div>
                  <div class="column"> <button class="btn primary ui compact button reservationbutton" @click="showModal(car)">Reserve</button></div>
                </div>  
              </div>
              <div class="extra center aligned">
                <div data-rating="4" class="ui star rating"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i></div>
              </div>
            </div>
          </div>
      </div>

      <div v-if="search">
          <h3 style="margin-top:40px">Search Results({{number}})</h3>
          <div class="ui four cards">
            <div class="card" v-for="car in searchedCars" v-bind:key="car.id" @click="openInfo(car.id)">
              <div class="image">
                <img :src="car.imageUrl" style="height:150px">
              </div>
              <div class="content">
                <div class="header">{{car.brand}} {{car.model}}</div>
                <div class="meta">
                  <a class="group">{{car.year}}</a>
                </div>
                <h5 style="margin:10px 0px">{{car.location}}</h5>
                <p class="description">{{car.description}}</p>
                <div class="ui column centered grid">
                  <div class="column"><h5>$ZWL{{car.daily_rate}} per day</h5></div>
                </div>  
              </div>
              <div class="extra center aligned">
                <button class="button primary ui col-md-12">Reserve</button>
              </div>
            </div>
          </div>
          
      </div>

      <!-- Modal -->
      <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3>Rent {{car.year}} {{car.brand}} {{car.model}}</h3>
            </div>

            <div class="modal-body">
              <form form method="POST" enctype="multipart/form-data" >
                <div class="ui two column centered grid">
                <div class="column"><div class="ui input fluid ">
                <input name="pick_up_date" placeholder="End Date" type="date" required v-model="reservation.pick_up_date">
                </div></div>
                <div class="column"><div class="ui input fluid">
                <input name="return_date" placeholder="Start Date" type="date" required v-model="reservation.return_date">
                </div> </div>
                </div>
                <div class="ui divider"></div>
                <h5>Additional Options</h5>
                <input type="checkbox" name="ui checkbox" ><label>Insuarance</label> 
                <input type="checkbox" name="ui checkbox" ><label>Delivery</label> 

                <div class="ui divider"></div>
                <div class="ui two column grid">
                  <h4 class="column" style="margin:auto 0">Total</h4>
                  <p class="column" style="text-align:right;font-size:16px">$500.00</p>
                </div>

                <input type="hidden" id="custId" name="car_id" value="">
              </form> 
            </div>

            <div class="modal-footer">
              <div class="ui black deny button mr-3" @click="closeDialog()">
                Cancel
              </div>
              <div class="ui positive right button" @click="reserveCar()">
                Reserve
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
                location:"Harare",
                carType:"SUV",
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
            searchCars(){
                Axios.get("/cars/search",{
                params: {
                    location:this.location,
                    carType:this.carType,
                    pickUpDate:this.pickUpDate,
                    dropOffDate:this.dropOffDate
                }
                }).then(response=>{
                  this.searchedCars = response.data;

                  if(this.searchedCars.length > 0){
                    this.search = true;
                    this.number = this.searchedCars.length;
                  }

                  else{
                    this.search = false;
                    alert("No vehicles matching those parameters were found. Please refine your search and try again.")
                  }
                console.log(response.data);
            }).catch(error=>{
                console.log(error)
            })
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
