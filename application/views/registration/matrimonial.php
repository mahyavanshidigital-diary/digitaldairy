<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
<script>
	$(document).ready(function(){
		$("#userregistration").validate({
			rules:{
				full_name:'required',
				father_name:'required',
				mother_name:'required',
				birthdate_date:'required',
				birthdate_month:'required',
				birthdate_year:'required',
			}
		});
		$("#education").change(function(){
			var val=$(this).val();
			if(val=="other")
				$("#other_education").show();
			else
				$("#other_education").hide();
		});
	});
</script>
<form id="userregistration" class="form-horizontal" method="post" action="<?php echo base_url('registration/insertMatrimonial'); ?>">
<div class="content-body">
	<div class="container">
			<div class="row custom-marging-top">
				<div class="form-group col-md-4 custom-marging-right">
					<label for="full_name">Full Name</label>
					<input class="form-control" name="full_name" id="full_name" placeholder="Full Name">
				</div>
				<div class="form-group col-md-4 custom-marging-right">
					<label for="father_name">Father's Name</label>
					<input class="form-control" id="father_name" name="father_name" placeholder="Father's Name">
				</div>
				<div class="form-group col-md-4 custom-marging-right">
					<label for="last_name">Mother's Name</label>
					<input class="form-control" name="mother_name" id="mother_name" placeholder="Mother's Name">
				</div>
				<div class="form-group col-md-4 custom-marging-right">
					<label for="birthdate_date">Birth Date</label>
					<div>
						<select id="birthdate_date" name="birthdate_date">
							<option value="">--Date--</option>
							<?php for($i=1;$i<=31;$i++) { ?>
								<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
							<?php } ?>
						</select>
						<select id="birthdate_month" name="birthdate_month">
							<option value="">--Month--</option>
							<?php for($i=1;$i<=12;$i++) { ?>
								<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
							<?php } ?>
						</select>
						<select id="birthdate_year" name="birthdate_year">
							<option value="">--Year--</option>
							<?php for($i=1900;$i<=2016;$i++) { ?>
								<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="form-group col-md-4 custom-marging-right">
					<label for="birth_time">Birth Time</label>
					<input class="form-control" name="birth_time" id="birth_time" placeholder="Birth Time">
				</div>
				<div class="form-group col-md-4 custom-marging-right">
					<label for="zodiac_sign">Zodiac Sign</label>
					<input class="form-control" name="zodiac_sign" id="zodiac_sign" placeholder="Zodiac Sign">
				</div>
				<div class="form-group col-md-4 custom-marging-right">
					<label for="birth_time">Color</label>
					<input class="form-control" name="color" id="color" placeholder="Birth Time">
				</div>
				<div class="form-group col-md-4 custom-marging-right">
					<label for="birth_time">Height</label>
					<input class="form-control" name="height" id="height" placeholder="Height">
				</div>
				<div class="form-group col-md-4 custom-marging-right">
					<label for="birth_time">Weight</label>
					<input class="form-control" name="weight" id="weight" placeholder="Weight">
				</div>
				<div class="form-group col-md-4 custom-marging-right">
					<label for="education">Education</label>
					<div>
						<select id="education" name="education">
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
				<div class="form-group col-md-4 custom-marging-right">
					<label for="occupation_business">Occupation</label>
					<div>
						<input type="radio" name="occupation" value="business" id="occupation_business" > Business
						<input type="radio" name="occupation" value="job" id="occupation_job" checked=""> Job
					</div>
				</div>
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
						<label for="position">Position</label>
						<input class="form-control" name="position" id="position" placeholder="Position">
					</div>
					<div class="form-group col-md-4 custom-marging-right">
						<label for="position">Comapany name ( If private Job )</label>
						<input class="form-control" name="companyname" id="companyname" placeholder="Company Name">
					</div>
					<div class="form-group col-md-4 custom-marging-right">
						<label for="position">Department name ( If Government Job )</label>
						<input class="form-control" name="departmentname" id="departmentname" placeholder="Department Name">
					</div>
					<div class="form-group col-md-4 custom-marging-right">
						<label for="job_type_temp">Job Type</label>
						<div>
							<input type="radio" name="job_type" value="Temporary" id="job_type_temp" checked=""> Temporary
							<input type="radio" name="job_type" value="Permenant" id="job_type_per" > Permenant
						</div>
					</div>
					<div class="form-group col-md-4 custom-marging-right">
						<label for="noofyears">No. of years</label>
						<input class="form-control" name="noofyears" id="noofyears" placeholder="Number of years Job">
					</div>
					<div class="form-group col-md-4 custom-marging-right">
						<label for="nativeplace">Native Place</label>
						<input class="form-control" name="nativeplace" id="nativeplace" placeholder="Native Place">
					</div>
					<div class="form-group col-md-4 custom-marging-right">
						<label for="mama">Mama Mosal Details</label>
						<textarea class="form-control" name="mama" id="mama"></textarea>
					</div>
					<div class="form-group col-md-4 custom-marging-right">
						<label for="currentaddress">Current Address</label>
						<textarea class="form-control" name="currentaddress" id="currentaddress"></textarea>
					</div>
					<div class="form-group col-md-4 custom-marging-right">
						<label for="email">Email</label>
						<input class="form-control" name="email" id="email" placeholder="email">
					</div>
					<div class="form-group col-md-4 custom-marging-right">
					
						<label for="phonenumber">Phone Number</label>
						<input class="form-control" name="phonenumber" id="phonenumber" placeholder="Phone Number">
					</div>
					<div class="form-group col-md-4 custom-marging-right">
						<label for="hobbies">Hobbies</label>
						<textarea class="form-control" name="hobbies" id="hobbies"></textarea>
					</div>
					<div class="form-group col-md-4 custom-marging-right">
						<label for="hobbies">Other Details</label>
						<textarea class="form-control" name="other_details" id="other_details"></textarea>
					</div>
					<div class="row custom-marging-top">
				<div class="form-group col-md-4 custom-marging-right">
					<input type="submit" name="submit" id="Save" class="form-control" value="Save"/>
				</div>
			</div>			
			</div>
	</div>
</div>
</form>