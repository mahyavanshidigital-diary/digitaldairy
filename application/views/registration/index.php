<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
<script>
	$(document).ready(function(){
		$("#userregistration").validate({
			rules:{
				first_name:'required',
				middle_name:'required',
				last_name:'required',
				birthdate_date:'required',
				birthdate_month:'required',
				birthdate_year:'required',
				mobile_number:{
					required:true,
					remote:{
						url:'<?php echo base_url("registration/checkmobile"); ?>',
						type:'post',
						data:{
							mobile:function(){
								return $("#mobile_number").val();
							}
						}		
					}
				},
				email:'email'
			}
		});
		$("#education").change(function(){
			var val=$(this).val();
			if(val=="other")
				$("#other_education").show();
			else
				$("#other_education").hide();
		});
		//per_state
		$("#per_state").change(function(){
			var val=$(this).val();
			if(val=="other")
				$("#other_per_state").show();
			else
				$("#other_per_state").hide();			
			getdistrict(val,"per_district");
		});
		$("#current_state").change(function(){
			var val=$(this).val();
			if(val=="other")
				$("#other_current_state").show();
			else
				$("#other_current_state").hide();			
			getdistrict(val,"current_district");
		});
		//per_state
		$("#per_district").change(function(){
			var val=$(this).val();
			if(val=="other")
				$("#other_per_district").show();
			else
				$("#other_per_district").hide();
			gettaluka(val,"per_taluka");

		});
		$("#current_district").change(function(){
			var val=$(this).val();
			if(val=="other")
				$("#other_current_district").show();
			else
				$("#other_current_district").hide();
			gettaluka(val,"current_taluka");

		});
		//other_per_taluka
		$("#per_taluka").change(function(){
			var val=$(this).val();
			if(val=="other")
				$("#other_per_taluka").show();
			else
				$("#other_per_taluka").hide();
		});
		$("#current_taluka").change(function(){
			var val=$(this).val();
			if(val=="other")
				$("#other_current_taluka").show();
			else
				$("#other_current_taluka").hide();
		});
		
		$("#mobile_number,.marital").change(function(){		
			var birthdate_date=$("#birthdate_date").val();
			var birthdate_month=$("#birthdate_month").val();
			var birthdate_year=$("#birthdate_year").val();
			var marital=$("input[name=marital]:checked").val();
			
			if(marital=='single'){
				//now check 				
				if(birthdate_date!="" && birthdate_month!="" && birthdate_year!=""){
					//check the age
				
					var birthday=birthdate_year+'-'+birthdate_month+'-'+birthdate_date;
					
					 var birthDate = new Date(birthday);
					 console.log(birthDate);
					var ageDifMs = Date.now() - birthDate.getTime();
					
				    var ageDate = new Date(ageDifMs); // miliseconds from epoch
				    var age=Math.abs(ageDate.getUTCFullYear() - 1970);			    
				    if(age>21){
						//show popup
						$("#matrimonialform").click();
					}
				}
			}
		});
		$("#sameasabove").change(function(){
                    if($(this).is(':checked'))
                        $(".currentaddress").fadeOut();
                    else
                        $(".currentaddress").fadeIn();
                });
		function getdistrict(stateval,element){
			$.ajax({
				url:"<?php echo base_url('registration/getDistrict'); ?>",
				type:'post',
				data:{state:stateval},
				success:function(response){
					$("#"+element).html(response);
				}
			});
		}
		function gettaluka(stateval,element){
			$.ajax({
				url:"<?php echo base_url('registration/getTaluka'); ?>",
				type:'post',
				data:{district:stateval},
				success:function(response){
					$("#"+element).html(response);
				}
			});
		}
		
	});
</script>
<div class="content-body">
	<div class="container">
		<form id="userregistration" class="form-horizontal" method="post" action="<?php echo base_url('registration/add'); ?>">
			<div class="row custom-marging-top">
				<div class="form-group col-md-4 custom-marging-right">
					<label for="first_name">First Name</label>
					<input class="form-control" name="first_name" id="first_name" placeholder="First Name">
				</div>
				<div class="form-group col-md-4 custom-marging-right">
					<label for="middle_name">Middle Name</label>
					<input class="form-control" id="middle_name" name="middle_name" placeholder="Middle Name">
				</div>
				<div class="form-group col-md-4 custom-marging-right">
					<label for="last_name">Last Name</label>
					<input class="form-control" name="last_name" id="last_name" placeholder="Last Name">
				</div>
			</div>
			<div class="row custom-marging-top">
				<div class="form-group col-md-3 custom-marging-right">
					<label for="gender_male">Gender</label>
					<div>
						<input type="radio" value="male" name="gender" id="gender_male" checked=""> Male
						<input type="radio" value="female" name="gender" id="gender_female" > Female
					</div>
				</div>
				<div class="form-group col-md-3 custom-marging-right">
					<label for="marital_single">Marital Status</label>
					<div>
						<input class="marital" type="radio" value="single" name="marital" id="marital_single" checked=""> Single
						<input class="marital" type="radio" value="merried" name="marital" id="marital_merried" > Merried
						<input class="marital" type="radio" value="divorcy" name="marital" id="martial_divorcy" > Divorcy
					</div>
				</div>
				<div class="form-group col-md-3 custom-marging-right">
					<label for="education">Education</label>
					<div>
						<select class="form-control" id="education" name="education">
							<option value="">--Education--</option>
							<option value="SSC">SSC</option>
							<option value="HSC">HSC</option>
							<option value="BCom">BCom</option>
							<option value="BSc">BSc</option>
							<option value="MSc">MSc</option>
							<option value="other">Other</option>
						</select>
						<input type="text" value="" class="form-control" id="other_education" name="other_education" style="display: none"/>
					</div>
				</div>
				<div class="form-group col-md-3 custom-marging-right">
					<label for="home_own">Home</label>
					<div>
						<input type="radio" name="home" value="own" id="home_own" checked=""> Own
						<input type="radio" name="home" value="rent" id="home_rent" > Rent
					</div>
				</div>
			</div>
			<div class="row custom-marging-top">
				<div class="form-group col-md-4 custom-marging-right">
					<label for="occupation_business">Occupation</label>
					<div>
						<input type="radio" name="occupation" value="business" id="occupation_business" > Business
						<input type="radio" name="occupation" value="job" id="occupation_job" checked=""> Job
					</div>
				</div>
				<div class="form-group col-md-4 custom-marging-right">
					<label for="birthdate_date">Birth Date</label>
					<div>
						<select class="form-control" id="birthdate_date" name="birthdate_date">
							<option value="">--Date--</option>
							<?php for($i=1;$i<=31;$i++) { ?>
								<option value="<?php echo ($i<9) ? '0' : ''; ?><?php echo $i; ?>"><?php echo $i; ?></option>
							<?php } ?>
						</select>
						<select class="form-control" id="birthdate_month" name="birthdate_month">
							<option value="">--Month--</option>
							<?php for($i=1;$i<=12;$i++) { ?>
								<option value="<?php echo ($i<9) ? '0' : ''; ?><?php echo $i; ?>"><?php echo $i; ?></option>
							<?php } ?>
						</select>
						<select class="form-control" id="birthdate_year" name="birthdate_year">
							<option value="">--Year--</option>
							<?php for($i=1900;$i<=2016;$i++) { ?>
								<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="form-group col-md-4 custom-marging-right">
					<label for="mobile_number">Mobile Number</label>
					<input type="number" class="form-control" name="mobile_number" id="mobile_number" placeholder="Mobile Number">
				</div>
			</div>
			<div class="row custom-marging-top">
				<div class="form-group col-md-4 custom-marging-right">
					<label for="annualincome_below_1">Annunal Income Group</label>
					<div>
						<input type="radio" name="annualincome" value="below 1" id="annualincome_below_1" checked=""> Less than 1 Lakh
						<input type="radio" name="annualincome" value="1 to 2" id="annualincome_1_2" > 1 Lakh to 2 lakh
						<input type="radio" name="annualincome" value="2 to 5" id="annualincome_2_5" > 2 lakh to 5 lakh
						<input type="radio" name="annualincome" value="5 to 10" id="annualincome_5_10" > 5 lakh to 10 lakh
						<input type="radio" name="annualincome" value="above 10" id="annualincome_10" > 10 lakh & Above
					</div>
				</div>
				<div class="form-group col-md-4 custom-marging-right">
					<label for="bloodgroup">Blood Group</label>
					<div>
						<select class="form-control" id="bloodgroup" name="bloodgroup">
							<option value="">-------Blood Group------</option>
							<option value="O +">O +</option>
							<option value="O -">O -</option>
							<option value="A +">A +</option>
							<option value="A -">A -</option>
							<option value="B +">B +</option>
							<option value="B -">B -</option>
							<option value="AB +">AB +</option>
							<option value="AB -">AB -</option>
						</select>
					</div>
				</div>
				<div class="form-group col-md-4 custom-marging-right">
					<label for="email">Email Address</label>
					<input type="email" class="form-control" id="email" name="email">
				</div>
			</div>
			<div class="row custom-marging-top">
				<h4>Permanant Address</h4>
				<div class="form-group col-md-3 custom-marging-right">
					<label for="per_housenumber">House No</label>
					<input type="text" class="form-control" id="per_housenumber" name="per_housenumber" placeholder="House No"/>
				</div>
				<div class="form-group col-md-3 custom-marging-right">
					<label for="per_society">Society</label>
					<input type="text" class="form-control" id="per_society" name="per_society" placeholder="House No"/>
				</div>
				<div class="form-group col-md-3 custom-marging-right">
					<label for="per_area">Area</label>
					<input type="text" class="form-control" id="per_area" name="per_area" placeholder="House No"/>
				</div>
				<div class="form-group col-md-3 custom-marging-right">
					<label for="per_city">Pincode</label>
					<input type="text" class="form-control" id="per_pincode" name="per_pincode" placeholder="Pincode"/>
				</div>
			</div>
			<div class="row custom-marging-top">
				<div class="form-group col-md-3 custom-marging-right">
					<label for="per_state">State</label>
					<div>
						<select class="form-control" name="per_state" id="per_state">
							<option value="">--State--</option>
							<?php foreach($states as $state){ ?>
								<option value="<?php echo $state['state_name']; ?>"><?php echo $state['state_name']; ?></option>
							<?php } ?>
							<option value="other">Other</option>
						</select>
					</div>
					<input type="text" value="" class="form-control" id="other_per_state" name="other_per_state" style="display: none"/>
				</div>
				<div class="form-group col-md-3 custom-marging-right">
					<label for="per_city">City</label>
					<input type="text" class="form-control" id="per_city" name="per_city" placeholder="City"/>
				</div>
				<div class="form-group col-md-3 custom-marging-right">
					<label for="per_district">District</label>
					<div>
						<select class="form-control" name="per_district" id="per_district">
							<option value="">--District--</option>
						</select>
					</div>
					<input type="text" value="" class="form-control" id="other_per_district" name="other_per_district" style="display: none"/>
				</div>
				<div class="form-group col-md-3 custom-marging-right">
					<label for="per_taluka">Taluka</label>
					<div>
						<select class="form-control" name="per_taluka" id="per_taluka">
							<option value="">--District--</option>
						</select>
					</div>
					<input type="text" value="" class="form-control" id="other_per_taluka" name="other_per_taluka" style="display: none"/>
				</div>
			</div>
			<div class="row custom-marging-top">
				<h4>Current Address</h4>
                                <div class="form-group col-md-12 custom-marging-right">
                                    <input type="checkbox" id="sameasabove" name="sameasabove" value="1"/>
                                    Same As Above
                                </div>
                                <div class="currentaddress">
                                    <div class="form-group col-md-3 custom-marging-right">
                                            <label for="per_housenumber">House No</label>
                                            <input type="text" class="form-control" id="current_housenumber" name="current_housenumber" placeholder="House No"/>
                                    </div>
                                    <div class="form-group col-md-3 custom-marging-right">
                                            <label for="per_society">Society</label>
                                            <input type="text" class="form-control" id="current_society" name="current_society" placeholder="House No"/>
                                    </div>
                                    <div class="form-group col-md-3 custom-marging-right">
                                            <label for="per_area">Area</label>
                                            <input type="text" class="form-control" id="current_area" name="current_area" placeholder="House No"/>
                                    </div>
                                    <div class="form-group col-md-3 custom-marging-right">
                                            <label for="per_city">Pincode</label>
                                            <input type="text" class="form-control" id="current_pincode" name="current_pincode" placeholder="Pincode"/>
                                    </div>
                                </div>
			</div>
			<div class="row custom-marging-top">
                            <div class="currentaddress">
                            <div class="form-group col-md-3 custom-marging-right">
					<label for="current_state">State</label>
					<div>
						<select class="form-control" name="current_state" id="current_state">
							<option value="">--State--</option>
							<?php foreach($states as $state){ ?>
								<option value="<?php echo $state['state_name']; ?>"><?php echo $state['state_name']; ?></option>
							<?php } ?>
							<option value="other">Other</option>
						</select>
					</div>
					<input type="text" value="" class="form-control" id="other_current_state" name="other_current_state" style="display: none"/>
				</div>
				<div class="form-group col-md-3 custom-marging-right">
					<label for="current_city">City</label>
					<input type="text" class="form-control" id="current_city" name="current_city" placeholder="City"/>
				</div>
				<div class="form-group col-md-3 custom-marging-right">
					<label for="current_district">District</label>
					<div>
						<select class="form-control" name="current_district" id="current_district">
							<option value="">--District--</option>
						</select>
					</div>
					<input type="text" value="" class="form-control" id="other_current_district" name="other_current_district" style="display: none"/>
				</div>
				<div class="form-group col-md-3 custom-marging-right">
					<label for="current_taluka">Taluka</label>
					<div>
						<select class="form-control"  name="current_taluka" id="current_taluka">
							<option value="">--District--</option>
						</select>
					</div>
					<input type="text" value="" class="form-control" id="other_current_taluka" name="other_current_taluka" style="display: none"/>
				</div>
                            </div>
			</div>
			<div class="row custom-marging-top">
				<div class="form-group col-md-4 custom-marging-right">
					<input type="submit" name="submit" id="register" class="form-control" value="Save & Continue"/>
				</div>
			</div>				
		</form>
	</div>
</div>
<button id="matrimonialform" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg" style="display: none">Large modal</button>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
     	<iframe frameborder="0" height="650px" width="100%" src="<?php echo base_url('registration/matrimonial'); ?>"></iframe> 
    </div>
  </div>
</div>