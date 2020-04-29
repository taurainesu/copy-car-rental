@extends('suppliers.layout')


<style>


  




  
</style>



@section('content')
<div class="ui container">


    <form class="ui form"    method="POST" action="{{route('new_car_post')}}" enctype="multipart/form-data">
<h3 style="margin-top:20px">Add a vehicle</h3>
@if($no_cars)
<strong style="color:red">NB. Please add a vehicle first before proceeding.</strong>
@endif
<div class="ui divider"></div>
    
@csrf
<div  style="display: none;" id="firstpart" >
  <h4 class="ui header">Vehicle Information</h4>

    <label>Make and Model</label>
    <div class="fields">
    <div class="three wide field">
      <label>Type</label>
      <select class="ui fluid dropdown" name="type" required>
        <option value="Fuel Saver">Fuel Saver</option>
    <option value="Luxury Vehicle">Luxury Vehicle</option>
    <option value="SUV">SUV</option>
    <option value="Medium Sized Cars">Medium Sized Car</option>
    <option value="Tow Truck">Tow Truck</option>
   

      </select>
    </div>
    <div class="three wide field">
      <label>Brand Name</label>
      <input type="text"  name="brand" placeholder="Brand name eg Toyota" required >
    </div>


    <div class="three wide field">
      <label>Model</label>
      <input type="text" name="model" placeholder="Model eg Carina" required>
    </div>


    <div class="three wide field">
      <label>Year</label>
      <select name="year" required>
      <option value="2018">2020</option>
    <option value="2017">2019</option>
    <option value="2018">2018</option>
    <option value="2017">2017</option>
    <option value="2016">2016</option>
    <option value="2015">2015</option>
    <option value="2014">2014</option>
    <option value="2013">2013</option>
    <option value="2012">2012</option>
    <option value="2011">2011</option>
    <option value="2010">2010</option>
    <option value="2009">2009</option>
    <option value="2008">2008</option>
    <option value="2007">2007</option>
    <option value="2006">2006</option>
    <option value="2005">2005</option>
    <option value="2004">2004</option>
    <option value="2003">2003</option>
    <option value="2002">2002</option>
    <option value="2001">2001</option>
    <option value="2000">2000</option>
    <option value="1999">1999</option>
    <option value="1998">1998</option>
    <option value="1997">1997</option>
    <option value="1996">1996</option>
    <option value="1995">1995</option>
    <option value="1994">1994</option>
    <option value="1993">1993</option>
    <option value="1992">1992</option>
    <option value="1991">1991</option>
    <option value="1990">1990</option>
    <option value="1989">1989</option>
    <option value="1988">1988</option>
    <option value="1987">1987</option>
    <option value="1986">1986</option>
    <option value="1985">1985</option>
    <option value="1984">1984</option>
    <option value="1983">1983</option>
    <option value="1982">1982</option>
    <option value="1981">1981</option>
    <option value="1980">1980</option>
    <option value="1979">1979</option>
    <option value="1978">1978</option>
    <option value="1977">1977</option>
    <option value="1976">1976</option>
    <option value="1975">1975</option>
    <option value="1974">1974</option>
    <option value="1973">1973</option>
    <option value="1972">1972</option>
    <option value="1971">1971</option>
    <option value="1970">1970</option>
    <option value="1969">1969</option>
    <option value="1968">1968</option>
    <option value="1967">1967</option>
    <option value="1966">1966</option>
    <option value="1965">1965</option>
    <option value="1964">1964</option>
    <option value="1963">1963</option>
    <option value="1962">1962</option>
    <option value="1961">1961</option>
    <option value="1960">1960</option>
    <option value="1959">1959</option>
    <option value="1958">1958</option>
    <option value="1957">1957</option>
    <option value="1956">1956</option>
    <option value="1955">1955</option>
    <option value="1954">1954</option>
    <option value="1953">1953</option>
    <option value="1952">1952</option>
    <option value="1951">1951</option>
    <option value="1950">1950</option>
    <option value="1949">1949</option>
    <option value="1948">1948</option>
    <option value="1947">1947</option>
    <option value="1946">1946</option>
    <option value="1945">1945</option>
    <option value="1944">1944</option>
    <option value="1943">1943</option>
    <option value="1942">1942</option>
    <option value="1941">1941</option>
    <option value="1940">1940</option>
    <option value="1939">1939</option>
    <option value="1938">1938</option>
    <option value="1937">1937</option>
    <option value="1936">1936</option>
    <option value="1935">1935</option>
    <option value="1934">1934</option>
    <option value="1933">1933</option>
    <option value="1932">1932</option>
    <option value="1931">1931</option>
    <option value="1930">1930</option>
    <option value="1929">1929</option>
    <option value="1928">1928</option>
    <option value="1927">1927</option>
    <option value="1926">1926</option>
    <option value="1925">1925</option>
    <option value="1924">1924</option>
    <option value="1923">1923</option>
    <option value="1922">1922</option>
    <option value="1921">1921</option>
    <option value="1920">1920</option>
    <option value="1919">1919</option>
    <option value="1918">1918</option>
    <option value="1917">1917</option>
    <option value="1916">1916</option>
    <option value="1915">1915</option>
    <option value="1914">1914</option>
    <option value="1913">1913</option>
    <option value="1912">1912</option>
    <option value="1911">1911</option>
    <option value="1910">1910</option>
    <option value="1909">1909</option>
    <option value="1908">1908</option>
    <option value="1907">1907</option>
    <option value="1906">1906</option>
    <option value="1905">1905</option>
</select>
    </div>




    <div class="three wide field">
      <label>Seats</label>
      <select name="seats" required>
      <option value="2018">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10 +</option>
    <option value="20">20+</option>
    <option value="30">30+</option>
    <option value="40">40+</option>
    <option value="50">50+</option>
    <option value="60">60+</option>
    <option value="70">70+</option>
    <option value="80">80+</option>
  
    
</select>
    </div>




   



   
    </div>




    <div class="field">
      <h4>Specifications</h4>
      <div class="fields">
      <div class="three wide field">
        <label>Transmission</label>
        <select name="transmission" class="ui fluid dropdown" required>
          <option value="Manual">Manual</option>
      <option value="Automatic">Automatic</option>
     
        </select>
      </div>
      <div class="three wide field">
        <label>Fuel</label>
        <select class="ui fluid dropdown" name="fuel_type" required>
          <option value="Diesel">Diesel</option>
      <option value="Petrol">Petrol</option>
      <option value="Electric">Electric</option>
      <option value="Hybrid">Hybrid</option>
     
        </select>
      </div>
  
  
      <div class="three wide field">
        <label>Milage</label>
        <input type="number" name="milage" required>
      </div>
  
  
  
      <div class="three wide field">
        <label>Engine Capicity</label>
        <input type="number" name="engine_capacity" placeholder="in litres" step="0.01" required>
      </div>
  
  
  
      <div class="three wide field">
        <label>Color</label>
        <input type="text" name="color" required>
      </div>
      </div>
    </div>
  


    <div class="fields">






      <div class="four wide field">

    <label for="image" class="">{{ __('Front photo') }}</label>

    <input type="file"  name="imageUrl" id="uploadFile"   required/>

      </div>





      <div class="four wide field">

        <label for="image" class="">{{ __('Dashboard photo') }}</label>
    
        <input type="file"  name="imageUrl1" id="uploadFile1"   required/>
    
          </div>

          <div class="four wide field">

            <label for="image" class="">{{ __('Back Photo') }}</label>
        
            <input type="file"  name="imageUrl2" id="uploadFile2"   required/>
        
              </div>




  </div>




  <div class="fields">



  


    <div class="four wide field">

  <label for="image" class="">{{ __('Interior photo showing seats') }}</label>

  <input type="file"  name="imageUrl3" id="uploadFile3"   required/>

    </div>





    <div class="four wide field">

      <label for="image" class="">{{ __('Your favourite Photo') }}</label>
  
      <input type="file"  name="imageUrl4" id="uploadFile4"   required/>
  
        </div>


  </div>

  <br><br>

  <a  id="nextclick1"  class="yellow  ui compact button ">{{ __('Next') }}</a>

  <br><br>









</div>



  <div  style="display: none;"  id="secondpart">

    <h4 class="ui header">Vehicle Registration</h4>  

 
    <div class="field">
     
  
      <div class="ui checkbox">
        <input type="checkbox"  id="not_in_my_name">
        <label>Vehicle is in not in my name</label>
      </div>
  
      <br><br>
  
      <div class="fields">
  
  
        <div class="three wide field">
          <label>Number Plate</label>
          <input type="text" name="vehicle_registration" maxlength="16" placeholder="Number plate" required>
        </div>
    
    
  
        <div class="three wide field">
          <label>Engine Number</label>
          <input type="text" name="engine_number" placeholder="egine_number" required>
        </div>
      <div class="three wide field">
        <label>Chasis Number</label>
        <input type="text" name="chasis_number"  placeholder="Chasis" required>
      </div>



      <div class="four wide field">

        <label for="image" class="">{{ __('Registration Book') }}</label>
    
        <input type="file"  name="imageUrl5" id="uploadFile5"   required/>
    
          </div>
  
  
  
      
  
  
  
      </div>
  
  
      
  
      <div class=" ui fields">
  
  
  
        <div id="agreement" class="ui input" style="display: none;">
          <div  class="field">
  
            <label for="image" class="">{{ __('Upload Agreement of Sale/Affidavit') }}</label>
        
            <input type="file"  name="imageUrl6" id="uploadFile6" />
    
            
          </div>
              </div>
  
       
  
       
      
                  
      
     
  
  
      </div>

      
      
      
      <label for="image" class="">{{ __(' Upload  Fitness Certificate from  VID  or AA') }}</label>
      
      <input type="file"  name="imageUrl7" id="uploadFile7" required/>


      <h4 class="ui header">Insurance Information</h4>
      <div class="fields">
    

        <div class="fields">
          <div class="three wide field">
            <label>Insurance Company</label>
            <input type="text" name="insuarance_company" placeholder="Insurance Company" required>
          </div>
        <div class="three wide field">
          <label>Type of Cover</label>
          <input type="text" name="cover_type"  placeholder="Type" required>
        </div>
      
        <div class="three wide field">
          <label>Package  Name</label>
          <input type="text" name="package_name" placeholder="Package Name" required>
        </div>
      
      
        
      
        
      
      
      <div class="three wide field">
            <label>Expiry Date</label>
            <input type="date" name="insuarance_expiry"  required>
          </div>
        <div class="three wide field">
          <label>Policy  Number</label>
          <input type="text" name="policy_number" maxlength="16" placeholder="Policy Number" required>
        </div>
      
      
      
        </div>
      </div>
      
      
      <div class="ui divider"></div>
      
      
      <label for="image" class="">{{ __('Policy Document') }}</label>
      
      <input type="file"  name="imageUrl8" id="uploadFile8"  required/>
    



  
      <br><br>
  
  
  
      <a  id="nextclick2"  class="yellow  ui compact button ">{{ __('Next') }}</a>
     
    
    </div>
 






<div class="ui divider"></div>




 



       

</div>

<div  style="display: none;" id="thirdpart" >

<h4 class="ui  header">Rental Information</h4>
<h5>Banking Details</h5>
  <div class="fields">
    
    <div class="fields">
      <div class="three wide field">
        <label>Bank</label>
        <input type="text" name="bank" maxlength="16" placeholder="Bank" required>
      </div>
    <div class="three wide field">
      <label>Branch</label>
      <input type="text" name="branch" maxlength="16" placeholder="Branch" required>
    </div>

    <div class="three wide field">
      <label>Account Name</label>
      <input type="text" name="account_name" maxlength="16" placeholder="Account Name" required>
    </div>




  <div class="three wide field">
        <label>Account Number</label>
        <input type="text" name="account_number" maxlength="16" placeholder="Account Number" required>
      </div>
    <div class="three wide field">
      <label>Account Type</label>
      <input type="text" name="account type" maxlength="16" placeholder="Account type" required>
    </div>



    </div>
  </div>




  <div class="two fields">
    <div class="field">
      <label>City</label>
      <select  name="location" class="ui fluid dropdown" required>
        <option value="Harare">Harare</option>
    <option value="Bulawayo">Bulawayo</option>
    <option value="Mutare">Mutare</option>
    <option value="Masvingo">Masvingo</option>
    <option value="Beitbridge">Beitbridge</option>
    <option value="Victoria">Victoria Falls</option>
    <option value="Hwange">Hwange</option>
    <option value="Kariba">Kariba</option>

      </select>
    </div>
    <div class="field">
      <label>Country</label>
      <select class="ui fluid dropdown" required>
        <option value="Zimbabwe">Zimbabwe</option>
    <option value="Botswana">Botswana</option>
    <option value="South Africa">South Africa</option>
    <option value="Zambia">Zambia</option>
    <option value="Mozambique">Mozambique</option>


      </select>
    </div>
  </div>


  <div class="field">
    <label>Physical Address</label>
    <textarea name=physical_address  required></textarea>
  </div>
  <div class="field">
    <label>Description</label>
    <textarea rows="2"  name="description" required></textarea>
  </div>   
  <div class="field">
   



    <div class="ui checkbox">
      <input type="checkbox" id="confirm">
      <label>I confirm that the information  provided  on this page is true and i will abide by the Criuz Auto city terms and conditions</label>
    </div>

  </div>


  <button   style="display:none"  id="submit_button" type="submit" class="yellow  ui compact button ">{{ __('Register') }}</button>


<button    id="placeholder_submit_button" type="submit" class="yellow  ui compact button disabled">{{ __('Register') }}</button>


</div>



  <div  style="display: none;"   id="fourthpart">
  






  










<div class="ui divider"></div>



  

  

  <div class="ui divider"></div>
</form>






<strong class="ui teal"></strong>

<a class="ui orange basic label">All payments will be made within 5 working  days</a>


<div class="ui divider"></div>

</div>

@endsection


@section('javascript')

<script>
 
$("#not_in_my_name").change(function() {

      if ($('#agreement').is(":visible"))
        {
            $("#agreement").hide(); 
        }
      
      else
          {
              $("#agreement").show(); 
            }

});



$("#confirm").change(function() {

if ($('#subimit_button').is(":visible"))
  {
      $("#submit_button").hide(); 
      $("#placeholder_submit_button").show(); 
  }

else
    {

      $("#placeholder_submit_button").hide()

      $('#firstpart').show();

      $('#secondpart').show();
      
        $("#submit_button").show(); 
      }

});
</script>


<script>
 $(document).ready(function() {
  $('#firstpart').show();



  
});



$('#nextclick1').click(

  function(){

    $('#firstpart').hide();
    $('#secondpart').show();

  }
);


$('#nextclick2').click(

  function(){

    $('#secondpart').hide();
    $('#thirdpart').show();

  }
);


  </script>





@endsection






