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
	$("#education_status").change(function(){
		var val=$(this).val();
		if(val=="Studing")
			$("#current_education_status").show();
		else
			$("#current_education_status").hide();
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
<div class="container">
	<div class="row">
		<div class="box orange-bg">
			<div class="col-lg-12 text-center bg-transpernt">
				<hr>
					<h2 class="intro-text text-center">
						<strong>Member Register</strong>
					</h2>
				<hr>
				<form id="userregistration" class="" method="post" action="<?php echo base_url('registration/add'); ?>">
					<div class="form-group col-md-4 text-left">
						<label for="first_name">First Name</label>
						<input class="form-control" name="first_name" id="first_name" placeholder="First Name">
					</div>
					<div class="form-group col-md-4 text-left">
						<label for="middle_name">Middle Name</label>
						<input class="form-control" id="middle_name" name="middle_name" placeholder="Middle Name">
					</div>

					<div class="form-group col-md-4 text-left">
						<label for="last_name">Last Name</label>
						<input class="form-control" name="last_name" id="last_name" placeholder="Last Name">
					</div>
					<div class="clearfix"></div>
					<div class="form-group col-md-12 text-left">
						<div class="col-md-3">
							<label for="last_name">Gender</label>
							<div class="checkbox">
								<label>
								  <input type="radio" value="male" name="gender" id="gender_male" checked=""> Male
								</label>
								<label>
								 <input type="radio" value="female" name="gender" id="gender_female"> Female
								</label>
							</div>
						</div>
						<div class="col-md-3">
							<label for="last_name">Marital Status</label>
							<div class="checkbox">
								<label>
								  <input class="marital" type="radio" value="single" name="marital" id="marital_single" checked=""> Single
								</label>
								<label>
									<input class="marital" type="radio" value="merried" name="marital" id="marital_merried"> Merried
								</label>
								<label>
									<input class="marital" type="radio" value="divorcy" name="marital" id="martial_divorcy"> Divorcy
								</label>
							</div>
						</div>
						<div class="col-md-3">
							<label for="education">Education</label>
							<select class="form-control" id="education" name="education" aria-required="true" aria-invalid="true">
								<option selected="" value="Any">Any</option>
								<option value="Std 1">Std 1</option>
								<option value="Std 2">Std 2</option>
								<option value="Std 3">Std 3</option>
								<option value="Std 4">Std 4</option>
								<option value="Std 5">Std 5</option>
								<option value="Std 6">Std 6</option>
								<option value="Std 7">Std 7</option>
								<option value="Std 8">Std 8</option>
								<option value="Std 9">Std 9</option>
								<option value="Std 10">Std 10</option>
								<option value="Std 11 - Science">Std 11 - Science</option>
								<option value="Std 12 - Science">Std 12 - Science</option>
								<option value="Std 11 - Commerce">Std 11 - Commerce</option>
								<option value="Std 12 - Commerce">Std 12 - Commerce</option>
								<option value="Std 11 - Arts">Std 11 - Arts</option>
								<option value="Std 12 - Arts">Std 12 - Arts</option>
								<option value="Applied Art">Applied Art</option>
								<option value="Architect/Interior Decorator">Architect/Interior Decorator</option>
								<option value="B. Architect">B. Architect</option>
								<option value="B. Ed.">B. Ed.</option>
								<option value="B.A.">B.A.</option>
								<option value="B.A.M.S.">B.A.M.S.</option>
								<option value="B.B.A.">B.B.A.</option>
								<option value="B.COM">B.COM</option>
								<option value="B.D.S">B.D.S</option>
								<option value="B.E./B-TECH I.C.">B.E./B-TECH I.C.</option>
								<option value="B.E./B.TECH AUTOMOBILE ENGG.">B.E./B.TECH AUTOMOBILE ENGG.</option>
								<option value="B.E./B.Tech Chemical Engg">B.E./B.Tech Chemical Engg</option>
								<option value="B.E./B.Tech Civil">B.E./B.Tech Civil</option>
								<option value="B.E./B.Tech Computer Engg.">B.E./B.Tech Computer Engg.</option>
								<option value="B.E./B.Tech E.C.">B.E./B.Tech E.C.</option>
								<option value="B.E./B.Tech Enviromental">B.E./B.Tech Enviromental</option>
								<option value="B.E./B.Tech It">B.E./B.Tech It</option>
								<option value="B.E./B.Tech Mechanical">B.E./B.Tech Mechanical</option>
								<option value="B.E./B.Tech. Electric">B.E./B.Tech. Electric</option>
								<option value="B.H.M.S.">B.H.M.S.</option>
								<option value="B.OPTOMETRY">B.OPTOMETRY</option>
								<option value="B.PHARM">B.PHARM</option>
								<option value="B.Sc">B.Sc</option>
								<option value="B.sc. IT">B.sc. IT</option>
								<option value="B.Sc.Home Science">B.Sc.Home Science</option>
								<option value="B.Y.N.S.">B.Y.N.S.</option>
								<option value="Bachelor of Health Studies">Bachelor of Health Studies</option>
								<option value="BCA">BCA</option>
								<option value="Bio-engineering">Bio-engineering</option>
								<option value="C.A (Chartered Accountant)">C.A (Chartered Accountant)</option>
								<option value="C.A. Running">C.A. Running</option>
								<option value="C.S (Company Secretary)">C.S (Company Secretary)</option>
								<option value="C.S.RUNNING">C.S.RUNNING</option>
								<option value="Diploma Engg.">Diploma Engg.</option>
								<option value="Diploma in Human Resources">Diploma in Human Resources</option>
								<option value="Diploma in Law Practice">Diploma in Law Practice</option>
								<option value="Diploma Pharmacy">Diploma Pharmacy</option>
								<option value="Hotel &amp; Hospality Management">Hotel &amp; Hospality Management</option>
								<option value="L.L.B.">L.L.B.</option>
								<option value="M.A.">M.A.</option>
								<option value="M.B.A">M.B.A</option>
								<option value="M.B.A. Running">M.B.A. Running</option>
								<option value="M.B.B.S.">M.B.B.S.</option>
								<option value="M.C.A.">M.C.A.</option>
								<option value="M.COM">M.COM</option>
								<option value="M.D.">M.D.</option>
								<option value="M.D.S. (Master of Dental Surgery)">M.D.S. (Master of Dental Surgery)</option>
								<option value="M.E./M.Tech">M.E./M.Tech</option>
								<option value="M.Ed.">M.Ed.</option>
								<option value="M.I.S.">M.I.S.</option>
								<option value="M.P.T. (Master of Physiotherapy)">M.P.T. (Master of Physiotherapy)</option>
								<option value="M.PHARM">M.PHARM</option>
								<option value="M.S.">M.S.</option>
								<option value="M.Sc.">M.Sc.</option>
								<option value="Master of Electronic Business">Master of Electronic Business</option>
								<option value="Masters in I.T.">Masters in I.T.</option>
								<option value="MPA">MPA</option>
								<option value="MSC IT">MSC IT</option>
								<option value="Multimedia">Multimedia</option>
								<option value="Nursing Course">Nursing Course</option>
								<option value="P.G.D.C.A.">P.G.D.C.A.</option>
								<option value="P.T.C.">P.T.C.</option>
								<option value="PG DIPLOMA IN BUSINESS MANAGEMENT">PG DIPLOMA IN BUSINESS MANAGEMENT</option>
								<option value="Ph.D">Ph.D</option>
								<option value="physiotherapist">physiotherapist</option>
								<option value="Sangit Visarad">Sangit Visarad</option>
								<option value="Under Graduate">Under Graduate</option>	
							</select>
						</div>
						<div class="col-md-3">
							<label for="education">Education Status</label>
							<select class="form-control" id="education_status" name="education_status" aria-required="true" aria-invalid="true">
								<option selected="" value="">--Education Status--</option>
								<option value="Studing">Studding</option>
								<option value="Completed">Completed</option>	
							</select>
							<input type="text" value="" class="form-control" id="current_education_status" name="current_education_status" placeholder="Enter current year & semester" style="display: none;">
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="form-group col-md-4 text-left">
						<label for="last_name">Home</label>
						<div class="checkbox">
							<label>
								<input type="radio" name="home" value="own" id="home_own" checked=""> Own
							</label>
							<label>
							 <input type="radio" name="home" value="rent" id="home_rent"> Rent
							</label>
						</div>
					</div>
					<div class="form-group col-md-4 text-left">
						<label for="occupation_business1">Occupation</label>
						<div class="checkbox">
							<label>
							  <input type="radio" name="occupation" value="business" id="occupation_business"> Business
							</label>
							<label>
							 <input type="radio" name="occupation" value="job" id="occupation_job" checked=""> Job
							</label>
						</div>
					</div>
					<div class="form-group col-md-4 text-left">
						<label for="annualincome_below_1">Annunal Income Group</label>
						<div class="checkbox">
							<label>
								<input type="radio" name="annualincome" value="below 1" id="annualincome_below_1" checked=""> Less than 1 Lakh
							</label>
							<label>
								<input type="radio" name="annualincome" value="1 to 2" id="annualincome_1_2"> 1 Lakh to 2 lakh
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input type="radio" name="annualincome" value="2 to 5" id="annualincome_2_5"> 2 lakh to 5 lakh
							</label> 
							<label>
								<input type="radio" name="annualincome" value="5 to 10" id="annualincome_5_10"> 5 lakh to 10 lakh
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input type="radio" name="annualincome" value="above 10" id="annualincome_10"> 10 lakh &amp; Above
							</label>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="form-group col-md-8 text-left">
						<label for="birthdate_date">Birth Date</label>
						<div class="row">
							<div class="col-md-4">
								<select class="form-control" id="birthdate_date" name="birthdate_date" aria-required="true" aria-invalid="true">
									<option value="">--Date--</option>
									<?php for($i=1;$i<=31;$i++) { ?>
										<option value="<?php echo ($i<9) ? '0' : ''; ?><?php echo $i; ?>"><?php echo $i; ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col-md-4">
								<select class="form-control" id="birthdate_month" name="birthdate_month" aria-required="true" aria-invalid="true">
									<option value="">--Month--</option>
									<?php for($i=1;$i<=12;$i++) { ?>
										<option value="<?php echo ($i<9) ? '0' : ''; ?><?php echo $i; ?>"><?php echo $i; ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col-md-4">
								<select class="form-control" id="birthdate_year" name="birthdate_year" aria-required="true" aria-invalid="true">
									<option value="">--Year--</option>
									<?php for($i=1900;$i<=2016;$i++) { ?>
										<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group col-md-4 text-left">
						<label for="mobile_number">Mobile Number</label>
						<input type="number" class="form-control error" name="mobile_number" id="mobile_number" placeholder="Mobile Number" aria-required="true">
					</div>
					<div class="form-group col-md-4 text-left">
						<label for="bloodgroup">Blood Group</label>
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
					<div class="form-group col-md-4 text-left">
						<label for="email">Email Address</label>
						<input type="email" class="form-control" id="email" name="email">
					</div>
					<div class="clearfix"></div>
					<div class="panel panel-default">
						<div class="panel-heading text-left"><h3 class="panel-title">Permanant Address</h3></div>
						<div class="panel-body">
							<div class="form-group col-md-4 text-left">
								<label for="per_housenumber">House No</label>
								<input type="text" class="form-control" id="per_housenumber" name="per_housenumber" placeholder="House No">
							</div>
							<div class="form-group col-md-4 text-left">
								<label for="per_society">Society</label>
								<input type="text" class="form-control" id="per_society" name="per_society" placeholder="House No">
							</div>
							<div class="form-group col-md-4 text-left">
								<label for="per_area">Area</label>
								<input type="text" class="form-control" id="per_area" name="per_area" placeholder="House No">
							</div>
							<div class="clearfix"></div>
							<div class="form-group col-md-4 text-left">
								<label for="per_city">Pincode</label>
								<input type="text" class="form-control" id="per_pincode" name="per_pincode" placeholder="Pincode">
							</div>
							<div class="form-group col-md-4 text-left">
								<label for="per_state">State</label>
									<select class="form-control" name="per_state" id="per_state" aria-invalid="false">
										<option value="">--State--</option>
										<?php foreach($states as $state){ ?>
											<option value="<?php echo $state['state_name']; ?>"><?php echo $state['state_name']; ?></option>
										<?php } ?>
										<option value="other">Other</option>
									</select>
								<input type="text" value="" class="form-control" id="other_per_state" name="other_per_state" style="display: none;">
							</div>
							<div class="form-group col-md-4 text-left">
								<label for="per_city">City</label>
								<input type="text" class="form-control" id="per_city" name="per_city" placeholder="City">
							</div>
							<div class="form-group col-md-4 text-left">
								<label for="per_district">District</label>
								<select class="form-control valid" name="per_district" id="per_district" aria-invalid="false">		
										<option value="">--District--</option>
										<option value="other">Other</option>
								</select>

								<input type="text" value="" class="form-control" id="other_per_district" name="other_per_district" style="display: none;">
							</div>
							<div class="form-group col-md-4 text-left">
								<label for="per_taluka">Taluka</label>
								<select class="form-control" name="per_taluka" id="per_taluka">		<option value="">--District--</option>
										<option value="other">Other</option>
								</select>
								<input type="text" value="" class="form-control" id="other_per_taluka" name="other_per_taluka" style="display: none">
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title text-left">Current Address</h3>
						</div>				  
						<div class="panel-body">
							<div class="form-group col-md-3 text-left custom-marging-right">
								<input type="checkbox" id="sameasabove" name="sameasabove" value="1">
									Same As Above
							</div>
							<div class="clearfix"></div>
							<div class="currentaddress">
								<div class="form-group col-md-4 text-left">
									<label for="per_housenumber">House No</label>
									<input type="text" class="form-control" id="current_housenumber" name="current_housenumber" placeholder="House No">
								</div>
								<div class="form-group col-md-4 text-left">
									<label for="per_society">Society</label>
									<input type="text" class="form-control" id="current_society" name="current_society" placeholder="House No">
								</div>
								<div class="form-group col-md-4 text-left">
									<label for="per_area">Area</label>
									<input type="text" class="form-control" id="current_area" name="current_area" placeholder="House No">
								</div>
								<div class="clearfix"></div>
								<div class="form-group col-md-4 text-left">
									<label for="per_city">Pincode</label>
									<input type="text" class="form-control" id="current_pincode" name="current_pincode" placeholder="Pincode">
								</div>
								<div class="form-group col-md-4 text-left">
									<label for="current_state">State</label>
									<select class="form-control" name="current_state" id="current_state" aria-invalid="false">
										<option value="">--State--</option>
										<?php foreach($states as $state){ ?>
											<option value="<?php echo $state['state_name']; ?>"><?php echo $state['state_name']; ?></option>
										<?php } ?>
										<option value="other">Other</option>
									</select>
									<input type="text" value="" class="form-control" id="other_current_state" name="other_current_state" style="display: none;">
								</div>
								<div class="form-group col-md-4 text-left">
									<label for="current_city">City</label>
									<input type="text" class="form-control" id="current_city" name="current_city" placeholder="City">
								</div>
								<div class="form-group col-md-4 text-left">
									<label for="current_district">District</label>
									<select class="form-control valid" name="current_district" id="current_district" aria-invalid="false">		
											<option value="">--District--</option>
											<option value="other">Other</option>
									</select>
									<input type="text" value="" class="form-control" id="other_current_district" name="other_current_district" style="display: none;">
								</div>
								<div class="form-group col-md-4 text-left">
									<label for="current_taluka">Taluka</label>
									<select class="form-control" name="current_taluka" id="current_taluka">		   <option value="">--District--</option>
											<option value="other">Other</option>
									</select>
									<input type="text" value="" class="form-control" id="other_current_taluka" name="other_current_taluka" style="display: none">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<input type="submit" name="submit" id="register" class="form-control" value="Save &amp; Continue">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /.container -->
<button id="matrimonialform" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg" style="display: none">Large modal</button>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
     	<iframe frameborder="0" height="650px" width="100%" src="<?php echo base_url('registration/matrimonial'); ?>"></iframe> 
    </div>
  </div>
</div>