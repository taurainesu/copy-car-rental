<template>
    <div class="ui container">
    <div class="ui card row" style="width:40%">
      <div class="content p-4">
          <h3>Rent a Car</h3>
          <div class="ui divider"></div>
          <select class="form-control" v-model="location">
            <option>Harare</option>
            <option>Buluwayo</option>
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
            <button @click="searchCars()"  class="ui primary button col-md-12" style="background-color: #ffb70a;">Find Vehicles</button>
      </div>
    </div>

    <div v-if="!search">
        <h3 style="margin-top:40px">Featured Vehicles</h3>
        <div class="ui four cards">
          <div class="card">
            <div class="image">
              <img src="image.png">
            </div>
            <div class="content">
              <div class="header">Toyota Carina</div>
              <div class="meta">
                <a class="group">2005</a>
              </div>
              <h5>Harare</h5>
              <p class="description">Very comfortable Vehicle</p>
              <div class="ui two column centered grid">
                <div class="column"><h5>$54 per day</h5></div>
                <div class="column"> <button class="btn yellow ui compact button reservationbutton">Reserve</button></div>
              </div>  
            </div>
            <div class="extra center aligned">
              <div data-rating="4" class="ui star rating"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i></div>
            </div>
          </div>

          <div class="card">
            <div class="image">
              <img src="image.png">
            </div>
            <div class="content">
              <div class="header">Toyota Carina</div>
              <div class="meta">
                <a class="group">2005</a>
              </div>
              <h5>Harare</h5>
              <p class="description">Very comfortable Vehicle</p>
              <div class="ui two column centered grid">
                <div class="column"><h5>$54 per day</h5></div>
                <div class="column"> <button class="btn yellow ui compact button reservationbutton">Reserve</button></div>
              </div>  
            </div>
            <div class="extra center aligned">
              <div data-rating="4" class="ui star rating"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i></div>
            </div>
          </div>

          <div class="card">
            <div class="image">
              <img src="image.png">
            </div>
            <div class="content">
              <div class="header">Toyota Carina</div>
              <div class="meta">
                <a class="group">2005</a>
              </div>
              <h5>Harare</h5>
              <p class="description">Very comfortable Vehicle</p>
              <div class="ui two column centered grid">
                <div class="column"><h5>$54 per day</h5></div>
                <div class="column"> <button class="btn yellow ui compact button reservationbutton">Reserve</button></div>
              </div>  
            </div>
            <div class="extra center aligned">
              <div data-rating="4" class="ui star rating"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i></div>
            </div>
          </div>

          <div class="card">
            <div class="image">
              <img src="image.png">
            </div>
            <div class="content">
              <div class="header">Toyota Carina</div>
              <div class="meta">
                <a class="group">2005</a>
              </div>
              <h5>Harare</h5>
              <p class="description">Very comfortable Vehicle</p>
              <div class="ui two column centered grid">
                <div class="column"><h5>$54 per day</h5></div>
                <div class="column"> <button class="btn yellow ui compact button reservationbutton">Reserve</button></div>
              </div>  
            </div>
            <div class="extra center aligned">
              <div data-rating="4" class="ui star rating"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i></div>
            </div>
          </div>
        </div>
        
    </div>

    <div v-if="search">
        <h3 style="margin-top:40px">Search Results Vehicles</h3>
        <div class="ui four cards">
          <div class="card">
            <div class="image">
              <img src="image.png">
            </div>
            <div class="content">
              <div class="header">Toyota Carina</div>
              <div class="meta">
                <a class="group">2005</a>
              </div>
              <h5>Harare</h5>
              <p class="description">Very comfortable Vehicle</p>
              <div class="ui two column centered grid">
                <div class="column"><h5>$54 per day</h5></div>
                <div class="column"> <button class="btn yellow ui compact button reservationbutton">Reserve</button></div>
              </div>  
            </div>
            <div class="extra center aligned">
              <div data-rating="4" class="ui star rating"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i></div>
            </div>
          </div>

          <div class="card">
            <div class="image">
              <img src="image.png">
            </div>
            <div class="content">
              <div class="header">Toyota Carina</div>
              <div class="meta">
                <a class="group">2005</a>
              </div>
              <h5>Harare</h5>
              <p class="description">Very comfortable Vehicle</p>
              <div class="ui two column centered grid">
                <div class="column"><h5>$54 per day</h5></div>
                <div class="column"> <button class="btn yellow ui compact button reservationbutton">Reserve</button></div>
              </div>  
            </div>
            <div class="extra center aligned">
              <div data-rating="4" class="ui star rating"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i></div>
            </div>
          </div>

          <div class="card">
            <div class="image">
              <img src="image.png">
            </div>
            <div class="content">
              <div class="header">Toyota Carina</div>
              <div class="meta">
                <a class="group">2005</a>
              </div>
              <h5>Harare</h5>
              <p class="description">Very comfortable Vehicle</p>
              <div class="ui two column centered grid">
                <div class="column"><h5>$54 per day</h5></div>
                <div class="column"> <button class="btn yellow ui compact button reservationbutton">Reserve</button></div>
              </div>  
            </div>
            <div class="extra center aligned">
              <div data-rating="4" class="ui star rating"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i></div>
            </div>
          </div>

          <div class="card">
            <div class="image">
              <img src="image.png">
            </div>
            <div class="content">
              <div class="header">Toyota Carina</div>
              <div class="meta">
                <a class="group">2005</a>
              </div>
              <h5>Harare</h5>
              <p class="description">Very comfortable Vehicle</p>
              <div class="ui two column centered grid">
                <div class="column"><h5>$54 per day</h5></div>
                <div class="column"> <button class="btn yellow ui compact button reservationbutton">Reserve</button></div>
              </div>  
            </div>
            <div class="extra center aligned">
              <div data-rating="4" class="ui star rating"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i></div>
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
                console.log(response.data);
            }).catch(error=>{
                console.log(error)
            })
            }
            ,
        },
        mounted(){
            //this.getCars();
        },
    }
</script>
