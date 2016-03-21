<link rel="stylesheet" href="<?php echo base_url('dist/cropper.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('css/main.css'); ?>">
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
			mobile_number:'required',
			email:'email'
		}
	});
	$("#mobile_number").change(function(){
		$(this).rules("checkmobile", {
			remote:{
					url:'<?php echo base_url("user/checkmobile"); ?>',
					type:'post',
					data:{
						mobile:function(){
							return $("#mobile_number").val();
						},
						id:function(){
							return $("#id").val();
						}
					}		
				}
		});	
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
		if(val=="Studying")
			$("#current_education_status").show();
		else
			$("#current_education_status").hide();
	});
	
	//state
	var per_state_val = $("#per_state").val();
	if(per_state_val != '')
	{
		getdistrict(per_state_val,"per_district");
	}
	$("#per_state").change(function(){
		var val=$(this).val();
		if(val=="other")
			$("#other_per_state").show();
		else
			$("#other_per_state").hide();			
		getdistrict(val,"per_district");
	});
	var current_state_val = $("#current_state").val();
	if(current_state_val != '')
	{
		getdistrictcurrent(current_state_val,"current_district");
	}
	$("#current_state").change(function(){
		var val=$(this).val();
		if(val=="other")
			$("#other_current_state").show();
		else
			$("#other_current_state").hide();			
		getdistrictcurrent(val,"current_district");
	});
	//district
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
		gettalukacurrent(val,"current_taluka");

	});
	//taluka
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
		var id=$("#id").val();
		$.ajax({
			url:"<?php echo base_url('user/getDistrict'); ?>",
			type:'post',
			data:{state:stateval,id:id},
			success:function(response){
				$("#"+element).html(response);
				$("#per_district").change();
			}
		});
	}
	function gettaluka(stateval,element){
		var id=$("#id").val();
		$.ajax({
			url:"<?php echo base_url('user/getTaluka'); ?>",
			type:'post',
			data:{district:stateval,id:id},
			success:function(response){
				$("#"+element).html(response);
			}
		});
	}
	function getdistrictcurrent(stateval,element){
		var id=$("#id").val();
		$.ajax({
			url:"<?php echo base_url('user/getDistrictcurrent'); ?>",
			type:'post',
			data:{state:stateval,id:id},
			success:function(response){
				$("#"+element).html(response);
				$("#current_district").change();
			}
		});
	}
	function gettalukacurrent(stateval,element){
		var id=$("#id").val();
		$.ajax({
			url:"<?php echo base_url('user/getTalukacurrent'); ?>",
			type:'post',
			data:{district:stateval,id:id},
			success:function(response){
				$("#"+element).html(response);
			}
		});
	}
	$(".picture").click(function(){
		var location=$(this).attr('data-location');
		$("#location").val(location);
	});
});
</script>
<div class="container" id="crop-avatar">
	<div class="row">
		<div class="box orange-bg">
			<div class="col-lg-12 text-center bg-transpernt">
				<hr>
					<h2 class="intro-text text-center">
						<strong>Member Register</strong>
					</h2>
				<hr>
				<form id="userregistration" class="" method="post" action="<?php echo base_url('user/edit'); ?>">
					<div class="form-group col-md-4 text-left">
						<label for="first_name">First Name</label>
						<input class="form-control" name="first_name" id="first_name" value="<?php echo $user['first_name']; ?>" placeholder="First Name">
					</div>
					<div class="form-group col-md-4 text-left">
						<label for="middle_name">Middle Name</label>
						<input class="form-control" id="middle_name" name="middle_name" value="<?php echo $user['middle_name']; ?>" placeholder="Middle Name">
					</div>

					<div class="form-group col-md-4 text-left">
						<label for="last_name">Last Name</label>
						<input class="form-control" name="last_name" id="last_name" value="<?php echo $user['last_name']; ?>" placeholder="Last Name">
					</div>
					<div class="clearfix"></div>
					<div class="form-group col-md-12 text-left">
						<div class="col-md-3">
							<label for="last_name">Gender</label>
							<div class="checkbox">
								<label>
								  <input type="radio" value="male" name="gender" id="gender_male" <?php echo ($user['gender']== 'male') ? 'checked=""' : ''; ?>> Male
								</label>
								<label>
								 <input type="radio" value="female" name="gender" id="gender_female" <?php echo ($user['gender']== 'female') ? 'checked=""' : ''; ?>> Female
								</label>
							</div>
						</div>
						<div class="col-md-3">
							<label for="last_name">Marital Status</label>
							<div class="checkbox">
								<label>
								  <input class="marital" type="radio" value="single" name="marital" id="marital_single" <?php echo ($user['marital']== 'single') ? 'checked=""' : ''; ?>> Single
								</label>
								<label>
									<input class="marital" type="radio" value="merried" name="marital" id="marital_merried" <?php echo ($user['marital']== 'merried') ? 'checked=""' : ''; ?>> Merried
								</label>
								<label>
									<input class="marital" type="radio" value="divorcy" name="marital" id="martial_divorcy" <?php echo ($user['marital']== 'divorcy') ? 'checked=""' : ''; ?>> Divorcy
								</label>
							</div>
						</div>
						<div class="col-md-3">
							<label for="education">Education</label>
<select class="form-control" id="education" name="education" aria-required="true" aria-invalid="true">
	<option value="Any" <?php echo($user['education'] == "Any") ? "selected":""; ?>>Any</option>
	<option value="Std 1" <?php echo($user['education'] == "Std 1") ? "selected":""; ?>>Std 1</option>
	<option value="Std 2" <?php echo($user['education'] == "Std 2") ? "selected":""; ?>>Std 2</option>
	<option value="Std 3" <?php echo($user['education'] == "Std 3") ? "selected":""; ?>>Std 3</option>
	<option value="Std 4" <?php echo($user['education'] == "Std 4") ? "selected":""; ?>>Std 4</option>
	<option value="Std 5" <?php echo($user['education'] == "Std 5") ? "selected":""; ?>>Std 5</option>
	<option value="Std 6" <?php echo($user['education'] == "Std 6") ? "selected":""; ?>>Std 6</option>
	<option value="Std 7" <?php echo($user['education'] == "Std 7") ? "selected":""; ?>>Std 7</option>
	<option value="Std 8" <?php echo($user['education'] == "Std 8") ? "selected":""; ?>>Std 8</option>
	<option value="Std 9" <?php echo($user['education'] == "Std 9") ? "selected":""; ?>>Std 9</option>
	<option value="Std 10" <?php echo($user['education'] == "Std 10") ? "selected":""; ?>>Std 10</option>
	<option value="Std 11 - Science" <?php echo($user['education'] == "Std 11 - Science") ? "selected":""; ?>>Std 11 - Science</option>
	<option value="Std 12 - Science" <?php echo($user['education'] == "Std 12 - Science") ? "selected":""; ?>>Std 12 - Science</option>
	<option value="Std 11 - Commerce" <?php echo($user['education'] == "Std 11 - Commerce") ? "selected":""; ?>>Std 11 - Commerce</option>
	<option value="Std 12 - Commerce" <?php echo($user['education'] == "Std 12 - Commerce") ? "selected":""; ?>>Std 12 - Commerce</option>
	<option value="Std 11 - Arts" <?php echo($user['education'] == "Std 11 - Arts") ? "selected":""; ?>>Std 11 - Arts</option>
	<option value="Std 12 - Arts" <?php echo($user['education'] == "Std 12 - Arts") ? "selected":""; ?>>Std 12 - Arts</option>
	<option value="Applied Art" <?php echo($user['education'] == "Applied Art") ? "selected":""; ?>>Applied Art</option>
	<option value="Architect/Interior Decorator" <?php echo($user['education'] == "Architect/Interior Decorator") ? "selected":""; ?>>Architect/Interior Decorator</option>
	<option value="B. Architect" <?php echo($user['education'] == "B. Architect") ? "selected":""; ?>>B. Architect</option>
	<option value="B. Ed." <?php echo($user['education'] == "B. Ed.") ? "selected":""; ?>>B. Ed.</option>
	<option value="B.A." <?php echo($user['education'] == "B.A.") ? "selected":""; ?>>B.A.</option>
	<option value="B.A.M.S." <?php echo($user['education'] == "B.A.M.S.") ? "selected":""; ?>>B.A.M.S.</option>
	<option value="B.B.A." <?php echo($user['education'] == "B.B.A.") ? "selected":""; ?>>B.B.A.</option>
	<option value="B.COM" <?php echo($user['education'] == "B.COM") ? "selected":""; ?>>B.COM</option>
	<option value="B.D.S" <?php echo($user['education'] == "B.D.S") ? "selected":""; ?>>B.D.S</option>
	<option value="B.E./B-TECH I.C." <?php echo($user['education'] == "B.E./B-TECH I.C.") ? "selected":""; ?>>B.E./B-TECH I.C.</option>
	<option value="B.E./B.TECH AUTOMOBILE ENGG." <?php echo($user['education'] == "B.E./B.TECH AUTOMOBILE ENGG.") ? "selected":""; ?>>B.E./B.TECH AUTOMOBILE ENGG.</option>
	<option value="B.E./B.Tech Chemical Engg" <?php echo($user['education'] == "B.E./B.Tech Chemical Engg") ? "selected":""; ?>>B.E./B.Tech Chemical Engg</option>
	<option value="B.E./B.Tech Civil" <?php echo($user['education'] == "B.E./B.Tech Civil") ? "selected":""; ?>>B.E./B.Tech Civil</option>
	<option value="B.E./B.Tech Computer Engg." <?php echo($user['education'] == "B.E./B.Tech Computer Engg.") ? "selected":""; ?>>B.E./B.Tech Computer Engg.</option>
	<option value="B.E./B.Tech E.C." <?php echo($user['education'] == "B.E./B.Tech E.C.") ? "selected":""; ?>>B.E./B.Tech E.C.</option>
	<option value="B.E./B.Tech Enviromental" <?php echo($user['education'] == "B.E./B.Tech Enviromental") ? "selected":""; ?>>B.E./B.Tech Enviromental</option>
	<option value="B.E./B.Tech It" <?php echo($user['education'] == "B.E./B.Tech It") ? "selected":""; ?>>B.E./B.Tech It</option>
	<option value="B.E./B.Tech Mechanical" <?php echo($user['education'] == "B.E./B.Tech Mechanical") ? "selected":""; ?>>B.E./B.Tech Mechanical</option>
	<option value="B.E./B.Tech. Electric" <?php echo($user['education'] == "B.E./B.Tech. Electric") ? "selected":""; ?>>B.E./B.Tech. Electric</option>
	<option value="B.H.M.S." <?php echo($user['education'] == "B.H.M.S.") ? "selected":""; ?>>B.H.M.S.</option>
	<option value="B.OPTOMETRY" <?php echo($user['education'] == "B.OPTOMETRY") ? "selected":""; ?>>B.OPTOMETRY</option>
	<option value="B.PHARM" <?php echo($user['education'] == "B.PHARM") ? "selected":""; ?>>B.PHARM</option>
	<option value="B.Sc" <?php echo($user['education'] == "B.Sc") ? "selected":""; ?>>B.Sc</option>
	<option value="B.sc. IT" <?php echo($user['education'] == "B.sc. IT") ? "selected":""; ?>>B.sc. IT</option>
	<option value="B.Sc.Home Science" <?php echo($user['education'] == "B.Sc.Home Science") ? "selected":""; ?>>B.Sc.Home Science</option>
	<option value="B.Y.N.S." <?php echo($user['education'] == "B.Y.N.S.") ? "selected":""; ?>>B.Y.N.S.</option>
	<option value="Bachelor of Health Studies" <?php echo($user['education'] == "Bachelor of Health Studies") ? "selected":""; ?>>Bachelor of Health Studies</option>
	<option value="BCA" <?php echo($user['education'] == "BCA") ? "selected":""; ?>>BCA</option>
	<option value="Bio-engineering" <?php echo($user['education'] == "Bio-engineering") ? "selected":""; ?>>Bio-engineering</option>
	<option value="C.A (Chartered Accountant)" <?php echo($user['education'] == "C.A (Chartered Accountant)") ? "selected":""; ?>>C.A (Chartered Accountant)</option>
	<option value="C.A. Running" <?php echo($user['education'] == "C.A. Running") ? "selected":""; ?>>C.A. Running</option>
	<option value="C.S (Company Secretary)" <?php echo($user['education'] == "C.S (Company Secretary)") ? "selected":""; ?>>C.S (Company Secretary)</option>
	<option value="C.S.RUNNING" <?php echo($user['education'] == "C.S.RUNNING") ? "selected":""; ?>>C.S.RUNNING</option>
	<option value="Diploma Engg." <?php echo($user['education'] == "Diploma Engg.") ? "selected":""; ?>>Diploma Engg.</option>
	<option value="Diploma in Human Resources" <?php echo($user['education'] == "Diploma in Human Resources") ? "selected":""; ?>>Diploma in Human Resources</option>
	<option value="Diploma in Law Practice" <?php echo($user['education'] == "Diploma in Law Practice") ? "selected":""; ?>>Diploma in Law Practice</option>
	<option value="Diploma Pharmacy" <?php echo($user['education'] == "Diploma Pharmacy") ? "selected":""; ?>>Diploma Pharmacy</option>
	<option value="Hotel &amp; Hospality Management" <?php echo($user['education'] == "Hotel &amp; Hospality Management") ? "selected":""; ?>>Hotel &amp; Hospality Management</option>
	<option value="L.L.B." <?php echo($user['education'] == "L.L.B.") ? "selected":""; ?>>L.L.B.</option>
	<option value="M.A." <?php echo($user['education'] == "M.A.") ? "selected":""; ?>>M.A.</option>
	<option value="M.B.A" <?php echo($user['education'] == "M.B.A") ? "selected":""; ?>>M.B.A</option>
	<option value="M.B.A. Running" <?php echo($user['education'] == "M.B.A. Running") ? "selected":""; ?>>M.B.A. Running</option>
	<option value="M.B.B.S." <?php echo($user['education'] == "M.B.B.S.") ? "selected":""; ?>>M.B.B.S.</option>
	<option value="M.C.A." <?php echo($user['education'] == "M.C.A.") ? "selected":""; ?>>M.C.A.</option>
	<option value="M.COM" <?php echo($user['education'] == "M.COM") ? "selected":""; ?>>M.COM</option>
	<option value="M.D." <?php echo($user['education'] == "M.D.") ? "selected":""; ?>>M.D.</option>
	<option value="M.D.S. (Master of Dental Surgery)" <?php echo($user['education'] == "M.D.S. (Master of Dental Surgery)") ? "selected":""; ?>>M.D.S. (Master of Dental Surgery)</option>
	<option value="M.E./M.Tech" <?php echo($user['education'] == "M.E./M.Tech") ? "selected":""; ?>>M.E./M.Tech</option>
	<option value="M.Ed." <?php echo($user['education'] == "M.Ed.") ? "selected":""; ?>>M.Ed.</option>
	<option value="M.I.S." <?php echo($user['education'] == "M.I.S.") ? "selected":""; ?>>M.I.S.</option>
	<option value="M.P.T. (Master of Physiotherapy)" <?php echo($user['education'] == "M.P.T. (Master of Physiotherapy)") ? "selected":""; ?>>M.P.T. (Master of Physiotherapy)</option>
	<option value="M.PHARM" <?php echo($user['education'] == "M.PHARM") ? "selected":""; ?>>M.PHARM</option>
	<option value="M.S." <?php echo($user['education'] == "M.S.") ? "selected":""; ?>>M.S.</option>
	<option value="M.Sc." <?php echo($user['education'] == "M.Sc.") ? "selected":""; ?>>M.Sc.</option>
	<option value="Master of Electronic Business" <?php echo($user['education'] == "Master of Electronic Business") ? "selected":""; ?>>Master of Electronic Business</option>
	<option value="Masters in I.T." <?php echo($user['education'] == "Masters in I.T.") ? "selected":""; ?>>Masters in I.T.</option>
	<option value="MPA" <?php echo($user['education'] == "MPA") ? "selected":""; ?>>MPA</option>
	<option value="MSC IT" <?php echo($user['education'] == "MSC IT") ? "selected":""; ?>>MSC IT</option>
	<option value="Multimedia" <?php echo($user['education'] == "Multimedia") ? "selected":""; ?>>Multimedia</option>
	<option value="Nursing Course" <?php echo($user['education'] == "Nursing Course") ? "selected":""; ?>>Nursing Course</option>
	<option value="P.G.D.C.A." <?php echo($user['education'] == "P.G.D.C.A.") ? "selected":""; ?>>P.G.D.C.A.</option>
	<option value="P.T.C." <?php echo($user['education'] == "P.T.C.") ? "selected":""; ?>>P.T.C.</option>
	<option value="PG DIPLOMA IN BUSINESS MANAGEMENT" <?php echo($user['education'] == "PG DIPLOMA IN BUSINESS MANAGEMENT") ? "selected":""; ?>>PG DIPLOMA IN BUSINESS MANAGEMENT</option>
	<option value="Ph.D" <?php echo($user['education'] == "Ph.D") ? "selected":""; ?>>Ph.D</option>
	<option value="physiotherapist" <?php echo($user['education'] == "physiotherapist") ? "selected":""; ?>>physiotherapist</option>
	<option value="Sangit Visarad" <?php echo($user['education'] == "Sangit Visarad") ? "selected":""; ?>>Sangit Visarad</option>
	<option value="Under Graduate" <?php echo($user['education'] == "Under Graduate") ? "selected":""; ?>>Under Graduate</option>	
</select>
						</div>
						<div class="col-md-3">
							<label for="education">Education Status</label>
							<select class="form-control" id="education_status" name="education_status" aria-required="true" aria-invalid="true">
								<option value="" <?php echo($user['education_status'] == "") ? "selected":""; ?>>--Education Status--</option>
								<option value="Studying" <?php echo($user['education_status'] == "Studying") ? "selected":""; ?>>Studying</option>
								<option value="Completed" <?php echo($user['education_status'] == "Completed") ? "selected":""; ?>>Completed</option>	
							</select>
							
							<input type="text" class="form-control" id="current_education_status" name="current_education_status" value="<?php echo $user['current_education_status']; ?>"  style="display: <?php echo($user['education_status'] == "Studying") ? "":"none"; ?>;">
							
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="form-group col-md-4 text-left">
						<label for="last_name">Home</label>
						<div class="checkbox">
							<label>
								<input type="radio" name="home" value="own" id="home_own" <?php echo ($user['home']== 'own') ? 'checked=""' : ''; ?>> Own
							</label>
							<label>
							 <input type="radio" name="home" value="rent" id="home_rent" <?php echo ($user['home']== 'rent') ? 'checked=""' : ''; ?>> Rent
							</label>
						</div>
					</div>
					<div class="form-group col-md-4 text-left">
						<label for="occupation_business1">Occupation</label>
						<div class="checkbox">
							<label>
							  <input type="radio" name="occupation" value="business" id="occupation_business" <?php echo ($user['occupation']== 'business') ? 'checked=""' : ''; ?>> Business
							</label>
							<label>
							 <input type="radio" name="occupation" value="job" id="occupation_job" <?php echo ($user['occupation']== 'job') ? 'checked=""' : ''; ?>> Job
							</label>
						</div>
					</div>
					<div class="form-group col-md-4 text-left">
						<label for="annualincome_below_1">Annunal Income Group</label>
						<div class="checkbox">
							<label>
								<input type="radio" name="annualincome" value="below 1" id="annualincome_below_1" <?php echo ($user['annualincome']== 'below 1') ? 'checked=""' : ''; ?>> Less than 1 Lakh
							</label>
							<label>
								<input type="radio" name="annualincome" value="1 to 2" id="annualincome_1_2" <?php echo ($user['annualincome']== '1 to 2') ? 'checked=""' : ''; ?>> 1 Lakh to 2 lakh
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input type="radio" name="annualincome" value="2 to 5" id="annualincome_2_5" <?php echo ($user['annualincome']== '2 to 5') ? 'checked=""' : ''; ?>> 2 lakh to 5 lakh
							</label> 
							<label>
								<input type="radio" name="annualincome" value="5 to 10" id="annualincome_5_10" <?php echo ($user['annualincome']== '5 to 10') ? 'checked=""' : ''; ?>> 5 lakh to 10 lakh
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input type="radio" name="annualincome" value="above 10" id="annualincome_10" <?php echo ($user['annualincome']== 'above 10') ? 'checked=""' : ''; ?>> 10 lakh &amp; Above
							</label>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="form-group col-md-8 text-left">
						<?php 
						$birthdate = $user['birthdate']; 
						$time=strtotime($birthdate);
						$date=date("d",$time);
						$month=date("m",$time);
						$year=date("Y",$time);
						?>
						<label for="birthdate_date">Birth Date</label>
						<div class="row">
							<div class="col-md-4">
								<select class="form-control" id="birthdate_date" name="birthdate_date" aria-required="true" aria-invalid="true">
									<option value="">--Date--</option>
									<?php for($i=1;$i<=31;$i++) { ?>
										<option value="<?php echo ($i<9) ? '0' : ''; ?><?php echo $i; ?>" <?php echo($date == $i) ? "selected":""; ?>><?php echo $i; ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col-md-4">
								<select class="form-control" id="birthdate_month" name="birthdate_month" aria-required="true" aria-invalid="true">
									<option value="">--Month--</option>
									<?php for($i=1;$i<=12;$i++) { ?>
										<option value="<?php echo ($i<9) ? '0' : ''; ?><?php echo $i; ?>" <?php echo($month == $i) ? "selected":""; ?>><?php echo $i; ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col-md-4">
								<select class="form-control" id="birthdate_year" name="birthdate_year" aria-required="true" aria-invalid="true">
									<option value="">--Year--</option>
									<?php for($i=1900;$i<=2016;$i++) { ?>
										<option value="<?php echo $i; ?>" <?php echo($year == $i) ? "selected":""; ?>><?php echo $i; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group col-md-4 text-left">
						<label for="mobile_number">Mobile Number</label>
						<input type="number" class="form-control error" name="mobile_number" id="mobile_number" value="<?php echo $user['mobile_number']; ?>" placeholder="Mobile Number" aria-required="true">
					</div>
					<div class="form-group col-md-4 text-left">
						<label for="bloodgroup">Blood Group</label>
			<select class="form-control" id="bloodgroup" name="bloodgroup">
				<option value="" <?php echo($user['bloodgroup'] == "") ? "selected":""; ?>>-------Blood Group------</option>
				<option value="O +" <?php echo($user['bloodgroup'] == "O +") ? "selected":""; ?>>O +</option>
				<option value="O -" <?php echo($user['bloodgroup'] == "O -") ? "selected":""; ?>>O -</option>
				<option value="A +" <?php echo($user['bloodgroup'] == "A +") ? "selected":""; ?>>A +</option>
				<option value="A -" <?php echo($user['bloodgroup'] == "A -") ? "selected":""; ?>>A -</option>
				<option value="B +" <?php echo($user['bloodgroup'] == "B +") ? "selected":""; ?>>B +</option>
				<option value="B -" <?php echo($user['bloodgroup'] == "B -") ? "selected":""; ?>>B -</option>
				<option value="AB +" <?php echo($user['bloodgroup'] == "AB +") ? "selected":""; ?>>AB +</option>
				<option value="AB -" <?php echo($user['bloodgroup'] == "AB -") ? "selected":""; ?>>AB -</option>
			</select>
					</div>
					<div class="form-group col-md-4 text-left">
						<label for="email">Email Address</label>
						<input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
					</div>
					<div class="clearfix"></div>
					<div class="panel panel-default">
						<div class="panel-heading text-left"><h3 class="panel-title">Permanant Address</h3></div>
						<div class="panel-body">
							<div class="form-group col-md-4 text-left">
								<label for="per_housenumber">House No</label>
								<input type="text" class="form-control" id="per_housenumber" name="per_housenumber" value="<?php echo $user['per_housenumber']; ?>" placeholder="House No">
							</div>
							<div class="form-group col-md-4 text-left">
								<label for="per_society">Society</label>
								<input type="text" class="form-control" id="per_society" name="per_society" value="<?php echo $user['per_society']; ?>" placeholder="House No">
							</div>
							<div class="form-group col-md-4 text-left">
								<label for="per_area">Area</label>
								<input type="text" class="form-control" id="per_area" name="per_area" value="<?php echo $user['per_area']; ?>" placeholder="House No">
							</div>
							<div class="clearfix"></div>
							<div class="form-group col-md-4 text-left">
								<label for="per_city">Pincode</label>
								<input type="text" class="form-control" id="per_pincode" name="per_pincode" value="<?php echo $user['per_pincode']; ?>" placeholder="Pincode">
							</div>
							<div class="form-group col-md-4 text-left">
								<label for="per_state">State</label>
									<select class="form-control" name="per_state" id="per_state" aria-invalid="false">
										<option value="">--State--</option>
										<?php foreach($states as $state){ ?>
											<option value="<?php echo $state['state_name']; ?>" <?php echo($user['per_state'] == $state['state_name']) ? "selected":""; ?>><?php echo $state['state_name']; ?></option>
										<?php } ?>
										<option value="other">Other</option>
									</select>
								<input type="text" value="" class="form-control" id="other_per_state" name="other_per_state" style="display: none;">
							</div>
							<div class="form-group col-md-4 text-left">
								<label for="per_city">City</label>
								<input type="text" class="form-control" id="per_city" name="per_city" value="<?php echo $user['per_city']; ?>" placeholder="City">
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
								<select class="form-control" name="per_taluka" id="per_taluka">		
									<option value="">--District--</option>
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
									<input type="text" class="form-control" id="current_housenumber" name="current_housenumber" value="<?php echo $user['current_housenumber']; ?>" placeholder="House No">
								</div>
								<div class="form-group col-md-4 text-left">
									<label for="per_society">Society</label>
									<input type="text" class="form-control" id="current_society" name="current_society" value="<?php echo $user['current_society']; ?>" placeholder="House No">
								</div>
								<div class="form-group col-md-4 text-left">
									<label for="per_area">Area</label>
									<input type="text" class="form-control" id="current_area" name="current_area" value="<?php echo $user['current_area']; ?>" placeholder="House No">
								</div>
								<div class="clearfix"></div>
								<div class="form-group col-md-4 text-left">
									<label for="per_city">Pincode</label>
									<input type="text" class="form-control" id="current_pincode" name="current_pincode" value="<?php echo $user['current_pincode']; ?>" placeholder="Pincode">
								</div>
								<div class="form-group col-md-4 text-left">
									<label for="current_state">State</label>
									<select class="form-control" name="current_state" id="current_state" aria-invalid="false">
										<option value="">--State--</option>
										<?php foreach($states as $state){ ?>
											<option value="<?php echo $state['state_name']; ?>" <?php echo($user['current_state'] == $state['state_name']) ? "selected":""; ?>><?php echo $state['state_name']; ?></option>
										<?php } ?>
										<option value="other">Other</option>
									</select>
									<input type="text" value="" class="form-control" id="other_current_state" name="other_current_state" style="display: none;">
								</div>
								<div class="form-group col-md-4 text-left">
									<label for="current_city">City</label>
									<input type="text" class="form-control" id="current_city" name="current_city" value="<?php echo $user['current_city']; ?>" placeholder="City">
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
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title text-left">Profile Picture</h3>
						</div>				  
						<div class="panel-body">
							<div class="form-group col-md-4 text-left">
								<label for="per_housenumber">Profile Pic</label>
								<div class="avatar-view" title="Change the avatar">
								<?php
								if(!empty($user['profile_picture']))
								{
									$profile_image = $user['profile_picture'];
								}
								else
								{
									$profile_image = 'blankAvatar.jpg';
								}
								?>
									<img src="<?php echo base_url('uploads/profile/'.$profile_image); ?>" alt="Avatar" class="picture" data-location="profile_picture">
								</div>
								<input type="hidden" class="profile_picture" name="profie_picture" id="profile_picture" value=""/>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<input type="hidden" name="id" id="id" class="form-control" value="<?php echo $user['id']; ?>">
							<input type="submit" name="submit" id="register" class="form-control" value="Edit">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	 <!-- Cropping modal -->
    <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form class="avatar-form" action="<?php echo base_url('crop.php'); ?>" enctype="multipart/form-data" method="post">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" id="avatar-modal-label">Change Avatar</h4>
            </div>
            <div class="modal-body">
              <div class="avatar-body">

                <!-- Upload image and data -->
                <div class="avatar-upload">
                  <input type="hidden" class="avatar-src" name="avatar_src">
                  <input type="hidden" class="avatar-data" name="avatar_data">
                  <input type="hidden" id="location" name="location" value="">
                  <label for="avatarInput">Local upload</label>
                  <input type="file" class="avatar-input" id="avatarInput" name="avatar_file">
                </div>

                <!-- Crop and preview -->
                <div class="row">
                  <div class="col-md-9">
                    <div class="avatar-wrapper"></div>
                  </div>
                  <div class="col-md-3">
                    <div class="avatar-preview preview-lg"></div>
                    <div class="avatar-preview preview-md"></div>
                    <div class="avatar-preview preview-sm"></div>
                  </div>
                </div>

                <div class="row avatar-btns">
                  <div class="col-md-9">
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="-90" title="Rotate -90 degrees">Rotate Left</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="-15">-15deg</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="-30">-30deg</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="-45">-45deg</button>
                    </div>
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="90" title="Rotate 90 degrees">Rotate Right</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="15">15deg</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="30">30deg</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="45">45deg</button>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <button type="submit" class="btn btn-primary btn-block avatar-save">Done</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div> -->
          </form>
        </div>
      </div>
    </div><!-- /.modal -->

    <!-- Loading state -->
    <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
</div>
<!-- /.container -->
<button id="matrimonialform" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg" style="display: none">Large modal</button>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
     	<iframe frameborder="0" height="650px" width="100%" src="<?php echo base_url('user/matrimonial'); ?>"></iframe> 
    </div>
  </div>
</div>
<script src="<?php echo base_url('dist/cropper.min.js');?>"></script>
<script src="<?php echo base_url('js/main.js'); ?>"></script>