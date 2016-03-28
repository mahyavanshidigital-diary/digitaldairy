<link rel="stylesheet" href="<?php echo base_url('dist/cropper.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('css/main.css'); ?>">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"> 
<style>
    #accordion h3{color:red}
</style>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
$(function() {
    $( "#accordion" ).accordion({active: false,
  collapsible: true});
    $(".form-control").each(function(){
       $(this).addClass('resulttxt'); 
    });
});
</script>
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
                        relation:'required',
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
		if(val=="Studying"){
			$("#current_education_status").show();
                        $("#occupation").val("Student");
                }
		else
			$("#current_education_status").hide();
	});
	$("#occupation").change(function(){
            var val=$(this).val();
            if(val=="Other")
                $("#other_occupation").show();
            else
                $("#other_occupation").hide();
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
        $(".picture").click(function(){
            var location=$(this).attr('data-location');
            $("#location").val(location);
           
        });
        $("#complete").click(function(){
           $("#mode").val('complete');
           $("#register").click();
        });
        $("#viewprofile").click(function(){
           window.location.href=base_url+'/user/prifile/<?php echo $user['id']; ?>';
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
<div class="container" id="crop-avatar">
	<div class="row">
		<div class="box orange-bg">
			<div class="col-lg-12 text-center bg-transpernt">
				<hr>
					<h2 class="intro-text text-center">
						<strong>Member Register</strong>
					</h2>
				<hr>
				<form id="userregistration" class="" method="post" action="<?php echo base_url('registration/insertfamily'); ?>">
					<div class="form-group col-md-3 text-left">
						<label for="first_name">First Name</label>
						<input class="form-control" name="first_name" id="first_name" placeholder="First Name">
					</div>
					<div class="form-group col-md-3 text-left">
						<label for="middle_name">Middle Name</label>
						<input class="form-control" id="middle_name" name="middle_name" placeholder="Middle Name">
					</div>

					<div class="form-group col-md-3 text-left">
						<label for="last_name">Last Name</label>
						<input class="form-control" name="last_name" id="last_name" placeholder="Last Name">
					</div>
                                        <div class="form-group col-md-3 text-left">
						<label for="relation">Relation</label>
						<select class="relation form-control" name="relation" id="relation">
											<option value="">--Relation--</option>
											<option value="son">Son</option>
											<option value="daughter">Daughter</option>
											<option value="wife">Wife</option>
											<option value="husbad">Husband</option>
											<option value="grand father">Grand Father</option>
											<option value="grand mother">Grand Mother</option>
											<option value="daughter-in-law">Daughter-In-Law</option>
											<option value="son-in-law">Son-In-Law</option>
											<option value="other">Other</other>
										</select>
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
                                                        <select class="form-control marital" id="marital" name="marital">
                                                            <option value="">-------Occupation------</option>
                                                            <option value="single">Single</option>
                                                            <option value="merried">Merried</option>
                                                            <option value="divorcy">Divorcy</option>
                                                            <option value="widow">Widow</option>
                                                            <option value="Other">Other</option>
                                                        </select>
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
								<option value="Studying">Studying</option>
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
                                                <select class="form-control" id="occupation" name="occupation">
							<option value="">-------Occupation------</option>
							<option value="Doctor">Doctor</option>
							<option value="Layer">Layer</option>
							<option value="Teacher">Teacher</option>
							<option value="Student">Student</option>
							<option value="Other">Other</option>
						</select>
						<input type="text" value="" class="form-control" id="other_occupation" name="other_occupation" style="display: none;">
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
								<input type="text" class="form-control" id="per_housenumber" name="per_housenumber" placeholder="House No" value="<?php echo $user['per_housenumber']; ?>">
							</div>
							<div class="form-group col-md-4 text-left">
								<label for="per_society">Society</label>
								<input type="text" class="form-control" id="per_society" name="per_society" placeholder="Society" value="<?php echo $user['per_society']; ?>">
							</div>
							<div class="form-group col-md-4 text-left">
								<label for="per_area">Area</label>
								<input type="text" class="form-control" id="per_area" name="per_area" placeholder="Area" value="<?php echo $user['per_area']; ?>">
							</div>
							<div class="clearfix"></div>
							<div class="form-group col-md-4 text-left">
								<label for="per_city">Pincode</label>
								<input type="text" class="form-control" id="per_pincode" name="per_pincode" placeholder="Pincode" value="<?php echo $user['per_pincode']; ?>">
							</div>
							<div class="form-group col-md-4 text-left">
								<label for="per_state">State</label>
									<select class="per_state form-control" name="per_state" id="per_state">
													<option value="">--State--</option>
													<?php foreach($states as $state){ ?>
														<option <?php echo ($state['state_name']=$user['per_state']) ? 'selected=""' : ''; ?> value="<?php echo $state['state_name']; ?>"><?php echo $state['state_name']; ?></option>
													<?php } ?>
													<option value="other">Other</option>
												</select>
								<input type="text" value="" class="form-control" id="other_per_state" name="other_per_state" style="display: none;">
							</div>
							<div class="form-group col-md-4 text-left">
								<label for="per_city">City</label>
								<input type="text" class="form-control" id="per_city" name="per_city" placeholder="City" value="<?php echo $user['per_city']; ?>">
							</div>
							<div class="form-group col-md-4 text-left">
								<label for="per_district">District</label>
								<select class="form-control valid" name="per_district" id="per_district" aria-invalid="false">		
										<option value="">--District--</option>
                                                                                <?php if(!empty($user['per_district'])) { ?>
																				<option value="<?php echo $user['per_district']; ?>" selected=""><?php echo $user['per_district']; ?></option>
																				
																				<?php } ?>
										<option value="other">Other</option>
								</select>

								<input type="text" value="" class="form-control" id="other_per_district" name="other_per_district" style="display: none;">
							</div>
							<div class="form-group col-md-4 text-left">
								<label for="per_taluka">Taluka</label>
								<select class="form-control" name="per_taluka" id="per_taluka">		<option value="">--District--</option>
                                                                    <?php if(!empty($user['per_taluka'])) { ?>
																				<option value="<?php echo $user['per_taluka']; ?>" selected=""><?php echo $user['per_taluka']; ?></option>
																				
																				<?php } ?>
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
									<input type="text" class="form-control" id="current_society" name="current_society" placeholder="Society">
								</div>
								<div class="form-group col-md-4 text-left">
									<label for="per_area">Area</label>
									<input type="text" class="form-control" id="current_area" name="current_area" placeholder="Area">
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
                                        <div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title text-left">Profile Picture</h3>
						</div>				  
						<div class="panel-body">
								<div class="form-group col-md-4 text-left">
									<label for="per_housenumber">Profile Pic</label>
									 <div class="avatar-view" title="Change the avatar">
                                                                            <img src="<?php echo base_url('img/blankAvatar.jpg'); ?>" alt="Avatar" class="picture" data-location="profile_picture">
                                                                          </div>
                                                                        <input type="hidden" class="profile_picture" name="profie_picture" id="profile_picture" value=""/>
								</div>
						</div>
					</div>
					<div class="row">
                                            <input type="hidden" name="parent_id" id="parent_id" value="<?php echo $user['id']; ?>"/>
                                            <input type="hidden" name="mode" value="add" id="mode"/>
						<div class="col-md-3">
							<input type="submit" name="submit" id="register" class="form-control" value="Save &amp; Add More Member">
						
                                                </div>
                                                <div class="col-md-3">
							<input type="button" name="complete" id="complete" class="form-control" value="Save &amp; Complete">
                                                </div>
                                                <div class="col-md-3">
							<input type="button" name="viewprofile" id="viewprofile" class="form-control" value="Cancle & View Profile">
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
    
    
    <div class="row">
		<div class="box orange-bg">
            <div class="form-group col-md-12 custom-marging-right">
                <div id="accordion">
                    <h3><?php echo $user['first_name'].' '.$user['middle_name'].' '.$user['last_name']; ?></h3>
				<div>
				<div class="form-group col-md-4 text-left">
					<label for="first_name">First Name</label>
					<div class="form-control"><?php echo $user['first_name']; ?></div>
				</div>
			    <div class="form-group col-md-4 text-left">
					<label for="first_name">Middle Name</label>
					<div class="form-control"><?php echo $user['middle_name']; ?></div>
				</div>
                <div class="form-group col-md-4 text-left">
					<label for="first_name">Last Name</label>
					<div class="form-control"><?php echo $user['last_name']; ?></div>
				</div>
				<div class="clearfix"></div>
				<div class="form-group col-md-4 text-left">
					<label for="first_name">Gender</label>
					<div class="form-control"><?php echo $user['gender']; ?></div>
				</div>
			    <div class="form-group col-md-4 text-left">
					<label for="first_name">Marital Status</label>
					<div class="form-control"><?php echo $user['marital']; ?></div>
				</div>
			    <div class="form-group col-md-4 text-left">
					<label for="first_name">Education</label>
					<div class="form-control"><?php echo $user['education']; ?></div>
				</div>
				<div class="clearfix"></div>
				<div class="form-group col-md-4 text-left">
					<label for="first_name">Home</label>
					<div class="form-control"><?php echo $user['home']; ?></div>
				</div>
				<div class="form-group col-md-4 text-left">
                    <label for="first_name">Birthdate</label>
                    <div class="form-control"><?php echo $user['birthdate']; ?></div>
				</div>
				<div class="form-group col-md-4 text-left">
					<label for="first_name">Blood Group</label>
					<div class="form-control"><?php echo $user['bloodgroup']; ?></div>
				</div>
				<div class="clearfix"></div>
                <div class="form-group col-md-4 text-left">
					<label for="first_name">Email Address</label>
					<div class="form-control"><?php echo $user['email']; ?></div>
				</div>
				<div class="clearfix"></div>
				<div class="panel panel-default">
					<div class="panel-heading text-left"><h3 class="panel-title">Permanant Address</h3></div>
					<div class="panel-body">
						<div class="form-group col-md-4 text-left">
							<label for="first_name">House Number</label>
							<div class="form-control"><?php echo $user['per_housenumber']; ?></div>
						</div>
                        <div class="form-group col-md-4 text-left">
							<label for="first_name">Society</label>
							<div class="form-control"><?php echo $user['per_society']; ?></div>
						</div>
						<div class="form-group col-md-4 text-left">
                            <label for="first_name">Area</label>
                            <div class="form-control"><?php echo $user['per_area']; ?></div>
						</div>
                        <div class="form-group col-md-4 text-left">
                            <label for="first_name">Pincode</label>
                            <div class="form-control"><?php echo $user['per_pincode']; ?></div>
						</div>
						<div class="form-group col-md-4 text-left">
                            <label for="first_name">State</label>
                            <div class="form-control"><?php echo $user['per_state']; ?></div>
						</div>
						<div class="form-group col-md-4 text-left">
                            <label for="first_name">City</label>
                            <div class="form-control"><?php echo $user['per_city']; ?></div>
						</div>
                        <div class="form-group col-md-4 text-left">
                            <label for="first_name">District</label>
                            <div class="form-control"><?php echo $user['per_district']; ?></div>
						</div>
                        <div class="form-group col-md-4 text-left">
                            <label for="first_name">Taluka</label>
                            <div class="form-control"><?php echo $user['per_taluka']; ?></div>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading text-left"><h3 class="panel-title">Current Address</h3></div>
					<div class="panel-body">
						<div class="form-group col-md-4 text-left">
                            <label for="first_name">House Number</label>
                            <div class="form-control"><?php echo $user['current_housenumber']; ?></div>
						</div>
                        <div class="form-group col-md-4 text-left">
                            <label for="first_name">Society</label>
                            <div class="form-control"><?php echo $user['current_society']; ?></div>
						</div>
                        <div class="form-group col-md-4 text-left">
                            <label for="first_name">Area</label>
                            <div class="form-control"><?php echo $user['current_area']; ?></div>
						</div>
                        <div class="form-group col-md-4 text-left">
                            <label for="first_name">Pincode</label>
                            <div class="form-control"><?php echo $user['current_pincode']; ?></div>
						</div>
						<div class="form-group col-md-4 text-left">
                            <label for="first_name">State</label>
                            <div class="form-control"><?php echo $user['current_state']; ?></div>
						</div>
                        <div class="form-group col-md-4 text-left">
							<label for="first_name">City</label>
							<div class="form-control"><?php echo $user['current_city']; ?></div>
						</div>
                        <div class="form-group col-md-4 text-left">
							<label for="first_name">District</label>
							<div class="form-control"><?php echo $user['current_district']; ?></div>
						</div>
                        <div class="form-group col-md-4 text-left">
							<label for="first_name">Taluka</label>
							<div class="form-control"><?php echo $user['current_taluka']; ?></div>
						</div>
					</div>
				</div>
				</div>
                <?php foreach($members as $user){ ?>
                <h3><?php echo $user['first_name'].' '.$user['middle_name'].' '.$user['last_name']; ?></h3>
				<div>    
				<div class="form-group col-md-4 text-left">
					<label for="first_name">First Name</label>
					<div class="form-control"><?php echo $user['first_name']; ?></div>
				</div>
				<div class="form-group col-md-4 text-left">
					<label for="first_name">Middle Name</label>
					<div class="form-control"><?php echo $user['middle_name']; ?></div>
				</div>
				<div class="form-group col-md-4 text-left">
					<label for="first_name">Last Name</label>
					<div class="form-control"><?php echo $user['last_name']; ?></div>
				</div>
				<div class="form-group col-md-4 text-left">
                    <label for="first_name">Gender</label>
                    <div class="form-control"><?php echo $user['gender']; ?></div>
				</div>
				<div class="form-group col-md-4 text-left">
					<label for="first_name">Marital Status</label>
					<div class="form-control"><?php echo $user['marital']; ?></div>
				</div>
			    <div class="form-group col-md-4 text-left">
					<label for="first_name">Education</label>
					<div class="form-control"><?php echo $user['education']; ?></div>
				</div>
			    <div class="form-group col-md-4 text-left">
					<label for="first_name">Home</label>
					<div class="form-control"><?php echo $user['home']; ?></div>
				</div>
				<div class="form-group col-md-4 text-left">
					<label for="first_name">Birthdate</label>
					<div class="form-control"><?php echo $user['birthdate']; ?></div>
				</div>
                <div class="form-group col-md-4 text-left">
					<label for="first_name">Blood Group</label>
					<div class="form-control"><?php echo $user['bloodgroup']; ?></div>
				</div>
				<div class="form-group col-md-4 text-left">
					<label for="first_name">Email Address</label>
					<div class="form-control"><?php echo $user['email']; ?></div>
				</div>
				<div class="clearfix"></div>
                <div class="panel panel-default">
					<div class="panel-heading text-left"><h3 class="panel-title">Permanant Address</h3></div>
					<div class="panel-body">
						<div class="form-group col-md-4 text-left">
							<label for="first_name">House Number</label>
							<div class="form-control"><?php echo $user['per_housenumber']; ?></div>
						</div>
                        <div class="form-group col-md-4 text-left">
							<label for="first_name">Society</label>
							<div class="form-control"><?php echo $user['per_society']; ?></div>
						</div>
                        <div class="form-group col-md-4 text-left">
							<label for="first_name">Area</label>
							<div class="form-control"><?php echo $user['per_area']; ?></div>
						</div>
                        <div class="form-group col-md-4 text-left">
							<label for="first_name">Pincode</label>
							<div class="form-control"><?php echo $user['per_pincode']; ?></div>
						</div>
						<div class="form-group col-md-4 text-left">
							<label for="first_name">State</label>
							<div class="form-control"><?php echo $user['per_state']; ?></div>
						</div>
					    <div class="form-group col-md-4 text-left">
							<label for="first_name">City</label>
							<div class="form-control"><?php echo $user['per_city']; ?></div>
						</div>
                        <div class="form-group col-md-4 text-left">
							<label for="first_name">District</label>
							<div class="form-control"><?php echo $user['per_district']; ?></div>
						</div>
                        <div class="form-group col-md-4 text-left">
							<label for="first_name">Taluka</label>
							<div class="form-control"><?php echo $user['per_taluka']; ?></div>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading text-left"><h3 class="panel-title">Current Address</h3></div>
					<div class="panel-body">
					<div class="form-group col-md-4 text-left">
						<label for="first_name">House Number</label>
						<div class="form-control"><?php echo $user['current_housenumber']; ?></div>
					</div>
                    <div class="form-group col-md-4 text-left">
						<label for="first_name">Society</label>
						<div class="form-control"><?php echo $user['current_society']; ?></div>
					</div>
                    <div class="form-group col-md-4 text-left">
						<label for="first_name">Area</label>
						<div class="form-control"><?php echo $user['current_area']; ?></div>
					</div>
                    <div class="form-group col-md-4 text-left">
						<label for="first_name">Pincode</label>
						<div class="form-control"><?php echo $user['current_pincode']; ?></div>
					</div>
					<div class="form-group col-md-4 text-left">
						<label for="first_name">State</label>
						<div class="form-control"><?php echo $user['current_state']; ?></div>
					</div>
					<div class="form-group col-md-4 text-left">
						<label for="first_name">City</label>
						<div class="form-control"><?php echo $user['current_city']; ?></div>
					</div>
                    <div class="form-group col-md-4 text-left">
						<label for="first_name">District</label>
						<div class="form-control"><?php echo $user['current_district']; ?></div>
					</div>
					<div class="form-group col-md-4 text-left">
						<label for="first_name">Taluka</label>
						<div class="form-control"><?php echo $user['current_taluka']; ?></div>
					</div>
					</div>
				</div>
				</div>
                <?php } ?>
				</div>
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
<script src="<?php echo base_url('dist/cropper.min.js');?>"></script>
<script src="<?php echo base_url('js/main.js'); ?>"></script>