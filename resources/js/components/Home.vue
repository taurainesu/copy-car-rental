<template>
    <div class="ui container">
    <div class="ui card row" style="width:40%">
      <div class="content p-4">
          <h3>Rent a Car</h3>
          <div class="ui divider"></div>
          <select class="form-control" v-model="location">
            <option>Harare</option>
            <option>Bulawayo</option>
            <option>Gweru</option>
            <option>Mutare</option>
            <option>Kariba</option>
          </select><br>
            <select class="form-control" v-model="carType">
              <option>SUV</option>
              <option>Sedan</option>
              <option>Truck</option>
            </select>
            
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
          <div class="card" v-for="car in cars" v-bind:key="car.id" @click="openInfo(car.id)">
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
              <div class="ui two column centered grid">
                <div class="column"><h5>$ZWL{{car.daily_rate}} per day</h5></div>
                <div class="column"> <button class="btn primary ui compact button reservationbutton">Reserve</button></div>
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
                    alert("No vehicles matching those parameters was found. Please refine your search and try again.")
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
            }
        },
        mounted(){
            this.getCars();
        },
    }
</script>
