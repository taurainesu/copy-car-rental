@extends('layouts.auth')
@section('content')
<div class="container">
    <div class="column">
        <div class="ui card" style="padding:30px;width:45%;margin:3rem auto">
            <div class="content">
                <form method="POST" action="{{ route('supplier-register') }}" class="ui form">
                    <img src="/logo.png" style="width:100px;height:50px;"/>
                <h3 style="margin:20px auto">{{$message ?? 'Supplier Registration'}}</h3>
                    @csrf
                    <input hidden name="facebookID" value="{{$facebookID ?? ''}}"/>
                    <div class="field">
                        <label class="headers">Personal Details</label>
                        <div class="ui divider"></div>
                        <div class="field">
                            <label>Full Name</label>
                            <input type="text" name="name" placeholder="Name" required value="{{$name ?? ''}}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          
                        </div>
                        <div class="field">
                            <div class="field">
                                <input type="text" style="display:none" name="" placeholder="National ID Number">
                            </div>
                            <div class="field">
                              <label>License Number</label>
                                <input type="text" name="licenseNo" placeholder="License ID Number">
                            </div>
                            </div>
                          <div class="two fields">
                            <div class="field">
                              <label>Gender</label>
                                <select name="sex" class="ui selection dropdown" required>
                                  <option>Female</option>
                                  <option>Male</option>
                                </select>
                            </div>
                            <div class="field">
                              <label>Age</label>
                              <input type="number" name="age" placeholder="Age" required>
                            </div>
                          </div>
                        
                          <div class="field">
                            <label>Physical Address</label>
                            <textarea rows="2" name="address"  placeholder="Residental Address" required></textarea>
                          </div>
                            
                  
                          <div class="two fields" style="margin-bottom:40px !important">
                            <div class="field">
                              <label>Country of Residence</label>
                              <div class="ui fluid search selection dropdown">
                                <input type="hidden" name="country">
                                <i class="dropdown icon"></i>
                                <div class="default text">Select Country</div>
                                <div class="menu">
                                <div class="item" data-value="af">Afghanistan</div>
                                <div class="item" data-value="ax">Aland Islands</div>
                                <div class="item" data-value="al">Albania</div>
                                <div class="item" data-value="dz">Algeria</div>
                                <div class="item" data-value="as">American Samoa</div>
                                <div class="item" data-value="ad">Andorra</div>
                                <div class="item" data-value="ao">Angola</div>
                                <div class="item" data-value="ai">Anguilla</div>
                                <div class="item" data-value="ag">Antigua</div>
                                <div class="item" data-value="ar">Argentina</div>
                                <div class="item" data-value="am">Armenia</div>
                                <div class="item" data-value="aw">Aruba</div>
                                <div class="item" data-value="au">Australia</div>
                                <div class="item" data-value="at">Austria</div>
                                <div class="item" data-value="az">Azerbaijan</div>
                                <div class="item" data-value="bs">Bahamas</div>
                                <div class="item" data-value="bh">Bahrain</div>
                                <div class="item" data-value="bd">Bangladesh</div>
                                <div class="item" data-value="bb">Barbados</div>
                                <div class="item" data-value="by">Belarus</div>
                                <div class="item" data-value="be">Belgium</div>
                                <div class="item" data-value="bz">Belize</div>
                                <div class="item" data-value="bj">Benin</div>
                                <div class="item" data-value="bm">Bermuda</div>
                                <div class="item" data-value="bt">Bhutan</div>
                                <div class="item" data-value="bo">Bolivia</div>
                                <div class="item" data-value="ba">Bosnia</div>
                                <div class="item" data-value="bw">Botswana</div>
                                <div class="item" data-value="bv">Bouvet Island</div>
                                <div class="item" data-value="br">Brazil</div>
                                <div class="item" data-value="vg">British Virgin Islands</div>
                                <div class="item" data-value="bn">Brunei</div>
                                <div class="item" data-value="bg">Bulgaria</div>
                                <div class="item" data-value="bf">Burkina Faso</div>
                                <div class="item" data-value="mm">Burma</div>
                                <div class="item" data-value="bi">Burundi</div>
                                <div class="item" data-value="tc">Caicos Islands</div>
                                <div class="item" data-value="kh">Cambodia</div>
                                <div class="item" data-value="cm">Cameroon</div>
                                <div class="item" data-value="ca">Canada</div>
                                <div class="item" data-value="cv">Cape Verde</div>
                                <div class="item" data-value="ky">Cayman Islands</div>
                                <div class="item" data-value="cf">Central African Republic</div>
                                <div class="item" data-value="td">Chad</div>
                                <div class="item" data-value="cl">Chile</div>
                                <div class="item" data-value="cn">China</div>
                                <div class="item" data-value="cx">Christmas Island</div>
                                <div class="item" data-value="cc">Cocos Islands</div>
                                <div class="item" data-value="co">Colombia</div>
                                <div class="item" data-value="km">Comoros</div>
                                <div class="item" data-value="cg">Congo Brazzaville</div>
                                <div class="item" data-value="cd">Congo</div>
                                <div class="item" data-value="ck">Cook Islands</div>
                                <div class="item" data-value="cr">Costa Rica</div>
                                <div class="item" data-value="ci">Cote Divoire</div>
                                <div class="item" data-value="hr">Croatia</div>
                                <div class="item" data-value="cu">Cuba</div>
                                <div class="item" data-value="cy">Cyprus</div>
                                <div class="item" data-value="cz">Czech Republic</div>
                                <div class="item" data-value="dk">Denmark</div>
                                <div class="item" data-value="dj">Djibouti</div>
                                <div class="item" data-value="dm">Dominica</div>
                                <div class="item" data-value="do">Dominican Republic</div>
                                <div class="item" data-value="ec">Ecuador</div>
                                <div class="item" data-value="eg">Egypt</div>
                                <div class="item" data-value="sv">El Salvador</div>
                                <div class="item" data-value="gb">England</div>
                                <div class="item" data-value="gq">Equatorial Guinea</div>
                                <div class="item" data-value="er">Eritrea</div>
                                <div class="item" data-value="ee">Estonia</div>
                                <div class="item" data-value="et">Ethiopia</div>
                                <div class="item" data-value="eu">European Union</div>
                                <div class="item" data-value="fk">Falkland Islands</div>
                                <div class="item" data-value="fo">Faroe Islands</div>
                                <div class="item" data-value="fj">Fiji</div>
                                <div class="item" data-value="fi">Finland</div>
                                <div class="item" data-value="fr">France</div>
                                <div class="item" data-value="gf">French Guiana</div>
                                <div class="item" data-value="pf">French Polynesia</div>
                                <div class="item" data-value="tf">French Territories</div>
                                <div class="item" data-value="ga">Gabon</div>
                                <div class="item" data-value="gm">Gambia</div>
                                <div class="item" data-value="ge">Georgia</div>
                                <div class="item" data-value="de">Germany</div>
                                <div class="item" data-value="gh">Ghana</div>
                                <div class="item" data-value="gi">Gibraltar</div>
                                <div class="item" data-value="gr">Greece</div>
                                <div class="item" data-value="gl">Greenland</div>
                                <div class="item" data-value="gd">Grenada</div>
                                <div class="item" data-value="gp">Guadeloupe</div>
                                <div class="item" data-value="gu">Guam</div>
                                <div class="item" data-value="gt">Guatemala</div>
                                <div class="item" data-value="gw">Guinea-Bissau</div>
                                <div class="item" data-value="gn">Guinea</div>
                                <div class="item" data-value="gy">Guyana</div>
                                <div class="item" data-value="ht">Haiti</div>
                                <div class="item" data-value="hm">Heard Island</div>
                                <div class="item" data-value="hn">Honduras</div>
                                <div class="item" data-value="hk">Hong Kong</div>
                                <div class="item" data-value="hu">Hungary</div>
                                <div class="item" data-value="is">Iceland</div>
                                <div class="item" data-value="in">India</div>
                                <div class="item" data-value="io">Indian Ocean Territory</div>
                                <div class="item" data-value="id">Indonesia</div>
                                <div class="item" data-value="ir">Iran</div>
                                <div class="item" data-value="iq">Iraq</div>
                                <div class="item" data-value="ie">Ireland</div>
                                <div class="item" data-value="il">Israel</div>
                                <div class="item" data-value="it">Italy</div>
                                <div class="item" data-value="jm">Jamaica</div>
                                <div class="item" data-value="jp">Japan</div>
                                <div class="item" data-value="jo">Jordan</div>
                                <div class="item" data-value="kz">Kazakhstan</div>
                                <div class="item" data-value="ke">Kenya</div>
                                <div class="item" data-value="ki">Kiribati</div>
                                <div class="item" data-value="kw">Kuwait</div>
                                <div class="item" data-value="kg">Kyrgyzstan</div>
                                <div class="item" data-value="la">Laos</div>
                                <div class="item" data-value="lv">Latvia</div>
                                <div class="item" data-value="lb">Lebanon</div>
                                <div class="item" data-value="ls">Lesotho</div>
                                <div class="item" data-value="lr">Liberia</div>
                                <div class="item" data-value="ly">Libya</div>
                                <div class="item" data-value="li">Liechtenstein</div>
                                <div class="item" data-value="lt">Lithuania</div>
                                <div class="item" data-value="lu">Luxembourg</div>
                                <div class="item" data-value="mo">Macau</div>
                                <div class="item" data-value="mk">Macedonia</div>
                                <div class="item" data-value="mg">Madagascar</div>
                                <div class="item" data-value="mw">Malawi</div>
                                <div class="item" data-value="my">Malaysia</div>
                                <div class="item" data-value="mv">Maldives</div>
                                <div class="item" data-value="ml">Mali</div>
                                <div class="item" data-value="mt">Malta</div>
                                <div class="item" data-value="mh">Marshall Islands</div>
                                <div class="item" data-value="mq">Martinique</div>
                                <div class="item" data-value="mr">Mauritania</div>
                                <div class="item" data-value="mu">Mauritius</div>
                                <div class="item" data-value="yt">Mayotte</div>
                                <div class="item" data-value="mx">Mexico</div>
                                <div class="item" data-value="fm">Micronesia</div>
                                <div class="item" data-value="md">Moldova</div>
                                <div class="item" data-value="mc">Monaco</div>
                                <div class="item" data-value="mn">Mongolia</div>
                                <div class="item" data-value="me">Montenegro</div>
                                <div class="item" data-value="ms">Montserrat</div>
                                <div class="item" data-value="ma">Morocco</div>
                                <div class="item" data-value="mz">Mozambique</div>
                                <div class="item" data-value="na">Namibia</div>
                                <div class="item" data-value="nr">Nauru</div>
                                <div class="item" data-value="np">Nepal</div>
                                <div class="item" data-value="an">Netherlands Antilles</div>
                                <div class="item" data-value="nl">Netherlands</div>
                                <div class="item" data-value="nc">New Caledonia</div>
                                <div class="item" data-value="pg">New Guinea</div>
                                <div class="item" data-value="nz">New Zealand</div>
                                <div class="item" data-value="ni">Nicaragua</div>
                                <div class="item" data-value="ne">Niger</div>
                                <div class="item" data-value="ng">Nigeria</div>
                                <div class="item" data-value="nu">Niue</div>
                                <div class="item" data-value="nf">Norfolk Island</div>
                                <div class="item" data-value="kp">North Korea</div>
                                <div class="item" data-value="mp">Northern Mariana Islands</div>
                                <div class="item" data-value="no">Norway</div>
                                <div class="item" data-value="om">Oman</div>
                                <div class="item" data-value="pk">Pakistan</div>
                                <div class="item" data-value="pw">Palau</div>
                                <div class="item" data-value="ps">Palestine</div>
                                <div class="item" data-value="pa">Panama</div>
                                <div class="item" data-value="py">Paraguay</div>
                                <div class="item" data-value="pe">Peru</div>
                                <div class="item" data-value="ph">Philippines</div>
                                <div class="item" data-value="pn">Pitcairn Islands</div>
                                <div class="item" data-value="pl">Poland</div>
                                <div class="item" data-value="pt">Portugal</div>
                                <div class="item" data-value="pr">Puerto Rico</div>
                                <div class="item" data-value="qa">Qatar</div>
                                <div class="item" data-value="re">Reunion</div>
                                <div class="item" data-value="ro">Romania</div>
                                <div class="item" data-value="ru">Russia</div>
                                <div class="item" data-value="rw">Rwanda</div>
                                <div class="item" data-value="sh">Saint Helena</div>
                                <div class="item" data-value="kn">Saint Kitts and Nevis</div>
                                <div class="item" data-value="lc">Saint Lucia</div>
                                <div class="item" data-value="pm">Saint Pierre</div>
                                <div class="item" data-value="vc">Saint Vincent</div>
                                <div class="item" data-value="ws">Samoa</div>
                                <div class="item" data-value="sm">San Marino</div>
                                <div class="item" data-value="gs">Sandwich Islands</div>
                                <div class="item" data-value="st">Sao Tome</div>
                                <div class="item" data-value="sa">Saudi Arabia</div>
                                <div class="item" data-value="sn">Senegal</div>
                                <div class="item" data-value="cs">Serbia</div>
                                <div class="item" data-value="rs">Serbia</div>
                                <div class="item" data-value="sc">Seychelles</div>
                                <div class="item" data-value="sl">Sierra Leone</div>
                                <div class="item" data-value="sg">Singapore</div>
                                <div class="item" data-value="sk">Slovakia</div>
                                <div class="item" data-value="si">Slovenia</div>
                                <div class="item" data-value="sb">Solomon Islands</div>
                                <div class="item" data-value="so">Somalia</div>
                                <div class="item" data-value="za">South Africa</div>
                                <div class="item" data-value="kr">South Korea</div>
                                <div class="item" data-value="es">Spain</div>
                                <div class="item" data-value="lk">Sri Lanka</div>
                                <div class="item" data-value="sd">Sudan</div>
                                <div class="item" data-value="sr">Suriname</div>
                                <div class="item" data-value="sj">Svalbard</div>
                                <div class="item" data-value="sz">Swaziland</div>
                                <div class="item" data-value="se">Sweden</div>
                                <div class="item" data-value="ch">Switzerland</div>
                                <div class="item" data-value="sy">Syria</div>
                                <div class="item" data-value="tw">Taiwan</div>
                                <div class="item" data-value="tj">Tajikistan</div>
                                <div class="item" data-value="tz">Tanzania</div>
                                <div class="item" data-value="th">Thailand</div>
                                <div class="item" data-value="tl">Timorleste</div>
                                <div class="item" data-value="tg">Togo</div>
                                <div class="item" data-value="tk">Tokelau</div>
                                <div class="item" data-value="to">Tonga</div>
                                <div class="item" data-value="tt">Trinidad</div>
                                <div class="item" data-value="tn">Tunisia</div>
                                <div class="item" data-value="tr">Turkey</div>
                                <div class="item" data-value="tm">Turkmenistan</div>
                                <div class="item" data-value="tv">Tuvalu</div>
                                <div class="item" data-value="ug">Uganda</div>
                                <div class="item" data-value="ua">Ukraine</div>
                                <div class="item" data-value="ae">United Arab Emirates</div>
                                <div class="item" data-value="us">United States</div>
                                <div class="item" data-value="uy">Uruguay</div>
                                <div class="item" data-value="um">Us Minor Islands</div>
                                <div class="item" data-value="vi">Us Virgin Islands</div>
                                <div class="item" data-value="uz">Uzbekistan</div>
                                <div class="item" data-value="vu">Vanuatu</div>
                                <div class="item" data-value="va">Vatican City</div>
                                <div class="item" data-value="ve">Venezuela</div>
                                <div class="item" data-value="vn">Vietnam</div>
                                <div class="item" data-value="wf">Wallis and Futuna</div>
                                <div class="item" data-value="eh">Western Sahara</div>
                                <div class="item" data-value="ye">Yemen</div>
                                <div class="item" data-value="zm">Zambia</div>
                                <div class="item" data-value="zw">Zimbabwe</div>
                              </div>
                               </div>
                            </div>

                            <div class="field">
                              <label>Nationality</label>
                              <input type="text" name="nationality" placeholder="Nationality" required>
                            </div>
                          </div>

                          <label class="headers">Account Information</label>
                          <div class="ui divider"></div>
                          <div class="two fields">
                            <div class="field">
                              <label>Email Address</label>
                            <input type="email" name="email" value="{{$email ?? ''}}" placeholder="Email Address" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="field">
                              <label>Phone Number</label>
                              <input type="number" name="phone" placeholder="Phone Number " required>
                            </div>
                          </div>
                          <div class="two fields">
                            <div class="field">
                              <label>Password</label>
                                <input type="password" name="password" placeholder="Password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="field">
                              <label>Confirm Password</label>
                              <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                            </div>
                          </div>
                    </div>
                    <button class="ui button orange register" onclick="showLoadingRegister()" style="margin:20px 0">
                        Register
                    </button>
                    <p style="margin:auto;text-align:center">Already a supplier?<a href="/supplier/login"><strong> Go to supplier login page.</strong></a></p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section("javasript")
<script>
  $(".button").click(function(){

    $("#sex").val($("#sex_div").dropdown("get value"));
    $("#country").val($("#country_div").dropdown("get value"));

    console.log( $("#sex").val());
    console.log( $("#country").val());
  })
  
</script>
@endsection
