<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
<script src="<?php echo base_url('js/repeatable-fields.js'); ?>"></script>
<style>
    .repeaterheader {
        width: 100%;
        height: 25px;
        background-color: bisque;
        font-weight: bold;
    }
	.acc{
		background-color: azure;
		padding-bottom: 15px;
		padding-top: 20px;
		margin-top: 15px;
	}
</style>
<script>
	$(document).ready(function(){
		$("#userregistration").validate();	
		
                $("body").on("change",".education",function(){
			var val=$(this).val();
                        var id=$(this).attr('data-id');
                       
			if(val=="other")
				$("#other_education_"+id).show();
			else
				$("#other_education_"+id).hide();
		});
                //per_state
		 $("body").on("change",".per_state",function(){
			var val=$(this).val();
                        var id=$(this).attr('data-id');
			if(val=="other")
				$("#other_per_state_"+id).show();
			else
				$("#other_per_state_"+id).hide();			
			getdistrict(val,"per_district_"+id);
		});
                 $("body").on("change",".current_state",function(){
			var val=$(this).val();
                        var id=$(this).attr('data-id');
			if(val=="other")
				$("#other_current_state_"+id).show();
			else
				$("#other_current_state_"+id).hide();			
			getdistrict(val,"current_district_"+id);
		});
                
                $("body").on("change",".per_district",function(){
			var val=$(this).val();
                         var id=$(this).attr('data-id');
			if(val=="other")
				$("#other_per_district_"+id).show();
			else
				$("#other_per_district_"+id).hide();
			gettaluka(val,"per_taluka_"+id);

		});
		$("body").on("change",".current_district",function(){
			var val=$(this).val();
                         var id=$(this).attr('data-id');
			if(val=="other")
				$("#other_current_district_"+id).show();
			else
				$("#other_current_district_"+id).hide();
			gettaluka(val,"current_taluka_"+id);

		});
		//other_per_taluka
		$("body").on("change",".per_taluka",function(){
			var val=$(this).val();
                         var id=$(this).attr('data-id');
			if(val=="other")
				$("#other_per_taluka_"+id).show();
			else
				$("#other_per_taluka_"+id).hide();
		});
		$("body").on("change",".current_taluka",function(){
			var val=$(this).val();
                         var id=$(this).attr('data-id');
			if(val=="other")
				$("#other_current_taluka_"+id).show();
			else
				$("#other_current_taluka_"+id).hide();
		});
		    $('.repeat').each(function() {
		        $(this).repeatable_fields({
		        	after_add:function(container, new_row){
		        			var added_row = new_row;
						
						var row_count = $(container).attr('data-rf-row-count');
					
						row_count++;
						
						$('*', new_row).each(function(index) {
							$.each(this.attributes, function(index, element) {
								this.value = this.value.replace('{{row-count-placeholder}}', row_count - 1);
							});
						});
						
						$(container).attr('data-rf-row-count', row_count);
						$(".first_name,.last_name,.middle_name,.relation").each(function(){
							$(this).rules("add", {
								required: true,
							});	
						});					
					}
				});
		    });	
		  $('body').on('click','a.showhide',function(){
		  	$(this).parent().parent().find('.acc').toggle();
		  	return false;
		  })
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
                $("body").on('change',".sameasabove",function(){
                    var id=$(this).attr('data-id');
                    if($(this).is(':checked'))
                        $(".currentaddress[data-id="+id+"]").fadeOut();
                    else
                        $(".currentaddress[data-id="+id+"]").fadeIn();
                });
                $('body').on('change',".mobile_number,.marital",function(){	
                        var id=$(this).attr('data-id');                        
			var birthdate_date=$("#birthdate_date_"+id).val();
			var birthdate_month=$("#birthdate_month_"+id).val();
			var birthdate_year=$("#birthdate_year_"+id).val();
			var marital=$(".marital[data-id="+id+"]:checked").val();
			console.log(marital);
			if(marital=='single'){
				//now check 		
                                console.log(birthdate_date);
                                console.log(birthdate_month);
                                console.log(birthdate_year);
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
                                                $("iframe#maritalform").attr('src','<?php echo base_url('registration/matrimonial'); ?>');
						$("#matrimonialform").click();
					}
				}
			}
		});
	});
	
</script>
<div class="row custom-marging-top">
    <div class="form-group col-md-12">
        <h1>Add Family Member</h1>
    </div>
</div>
<form id="userregistration" class="form-horizontal" method="post" action="">
<div class="repeat">
<div class="content-body wrapper" >
	<div class="container">
		<div class="template">
                        <div class="repeaterheader">
                            <a href="#" class="showhide" >Show/Hide</a>
                        </div>
			<div class="acc">
				<div class="row custom-marging-top">
					<div class="form-group col-md-3 custom-marging-right">
						<label for="first_name[{{row-count-placeholder}}]">First Name</label>
						<input class="form-control first_name" name="first_name[{{row-count-placeholder}}]" id="first_name[{{row-count-placeholder}}]" placeholder="First Name">
					</div>
					<div class="form-group col-md-3 custom-marging-right">
						<label for="middle_name[{{row-count-placeholder}}]">Middle Name</label>
						<input class="form-control middle_name" id="middle_name[{{row-count-placeholder}}]" name="middle_name[{{row-count-placeholder}}]" placeholder="Middle Name">
					</div>
					<div class="form-group col-md-3 custom-marging-right">
						<label for="last_name[{{row-count-placeholder}}]">Last Name</label>
						<input class="form-control last_name" name="last_name[{{row-count-placeholder}}]" id="last_name[{{row-count-placeholder}}]" placeholder="Last Name">
					</div>
					<div class="form-group col-md-3 custom-marging-right">
						<label for="last_name[{{row-count-placeholder}}]">Relation</label>
						<div>
							<select class="relation form-control" name="relation[{{row-count-placeholder}}]" id="relation[{{row-count-placeholder}}]">
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
					</div>
				</div>
				<div class="row custom-marging-top">
				<div class="form-group col-md-3 custom-marging-right">
					<label for="gender_male[{{row-count-placeholder}}]">Gender</label>
					<div>
						<input type="radio" value="male" name="gender[{{row-count-placeholder}}]" id="gender_male[{{row-count-placeholder}}]" checked=""> Male
						<input type="radio" value="female" name="gender[{{row-count-placeholder}}]" id="gender_female[{{row-count-placeholder}}]" > Female
					</div>
				</div>
				<div class="form-group col-md-3 custom-marging-right">
					<label for="marital_single_{{row-count-placeholder}}">Marital Status</label>
					<div>
						<input class="marital" data-id="{{row-count-placeholder}}" type="radio" value="single" name="marital[{{row-count-placeholder}}]" id="marital_single[{{row-count-placeholder}}]" checked=""> Single
						<input class="marital" data-id="{{row-count-placeholder}}" type="radio" value="merried" name="marital[{{row-count-placeholder}}]" id="marital_merried[{{row-count-placeholder}}]" > Merried
						<input class="marital" data-id="{{row-count-placeholder}}" type="radio" value="divorcy" name="marital[{{row-count-placeholder}}]" id="martial_divorcy[{{row-count-placeholder}}]" > Divorcy
					</div>
				</div>
				<div class="form-group col-md-3 custom-marging-right">
					<label for="education[{{row-count-placeholder}}]">Education</label>
					<div>
						<select class="education form-control" id="education[{{row-count-placeholder}}]" data-id="{{row-count-placeholder}}" name="education[{{row-count-placeholder}}]">
							<option value="">--Education--</option>
							<option value="SSC">SSC</option>
							<option value="HSC">HSC</option>
							<option value="BCom">BCom</option>
							<option value="BSc">BSc</option>
							<option value="MSc">MSc</option>
							<option value="other">Other</option>
						</select>
						<input type="text" value="" class="form-control" id="other_education_{{row-count-placeholder}}" name="other_education[{{row-count-placeholder}}]" style="display: none"/>
					</div>
				</div>
				<div class="form-group col-md-3 custom-marging-right">
					<label for="home_own[{{row-count-placeholder}}]">Home</label>
					<div>
						<input type="radio" name="home[{{row-count-placeholder}}]" value="own" id="home_own[{{row-count-placeholder}}]" checked=""> Own
						<input type="radio" name="home[{{row-count-placeholder}}]" value="rent" id="home_rent[{{row-count-placeholder}}]" > Rent
					</div>
				</div>
			</div>
			<div class="row custom-marging-top">
				<div class="form-group col-md-4 custom-marging-right">
					<label for="occupation_business[{{row-count-placeholder}}]">Occupation</label>
					<div>
						<input type="radio" name="occupation[{{row-count-placeholder}}]" value="business" id="occupation_business[{{row-count-placeholder}}]" > Business
						<input type="radio" name="occupation[{{row-count-placeholder}}]" value="job" id="occupation_job[{{row-count-placeholder}}]" checked=""> Job
					</div>
				</div>
				<div class="form-group col-md-4 custom-marging-right">
					<label for="birthdate_date_{{row-count-placeholder}}">Birth Date</label>
					<div>
						<select class="form-control" id="birthdate_date_{{row-count-placeholder}}" name="birthdate_date[{{row-count-placeholder}}]">
							<option value="">--Date--</option>
							<?php for($i=1;$i<=31;$i++) { ?>
								<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
							<?php } ?>
						</select>
						<select class="form-control" id="birthdate_month_{{row-count-placeholder}}" name="birthdate_month[{{row-count-placeholder}}]">
							<option value="">--Month--</option>
							<?php for($i=1;$i<=12;$i++) { ?>
								<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
							<?php } ?>
						</select>
						<select class="form-control" id="birthdate_year_{{row-count-placeholder}}" name="birthdate_year[{{row-count-placeholder}}]">
							<option value="">--Year--</option>
							<?php for($i=1900;$i<=2016;$i++) { ?>
								<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="form-group col-md-4 custom-marging-right">
					<label for="mobile_number[{{row-count-placeholder}}]">Mobile Number</label>
					<input data-id="{{row-count-placeholder}}" type="number" class="form-control mobile_number" name="mobile_number[{{row-count-placeholder}}]" id="mobile_number[{{row-count-placeholder}}]" placeholder="Mobile Number">
				</div>
			</div>
			<div class="row custom-marging-top">
				<div class="form-group col-md-4 custom-marging-right">
					<label for="annualincome_below_1[{{row-count-placeholder}}]">Annunal Income Group</label>
					<div>
						<input type="radio" name="annualincome[{{row-count-placeholder}}]" value="below 1" id="annualincome_below_1[{{row-count-placeholder}}]" checked=""> Less than 1 Lakh
						<input type="radio" name="annualincome[{{row-count-placeholder}}]" value="1 to 2" id="annualincome_1_2[{{row-count-placeholder}}]" > 1 Lakh to 2 lakh
						<input type="radio" name="annualincome[{{row-count-placeholder}}]" value="2 to 5" id="annualincome_2_5[{{row-count-placeholder}}]" > 2 lakh to 5 lakh
						<input type="radio" name="annualincome[{{row-count-placeholder}}]" value="5 to 10" id="annualincome_5_10[{{row-count-placeholder}}]" > 5 lakh to 10 lakh
						<input type="radio" name="annualincome[{{row-count-placeholder}}]" value="above 10" id="annualincome_10[{{row-count-placeholder}}]" > 10 lakh & Above
					</div>
				</div>
				<div class="form-group col-md-4 custom-marging-right">
					<label for="bloodgroup[{{row-count-placeholder}}]">Blood Group</label>
					<div>
						<select id="bloodgroup[{{row-count-placeholder}}]" name="bloodgroup[{{row-count-placeholder}}]" class="form-control">
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
					<label for="email[{{row-count-placeholder}}]">Email Address</label>
					<input type="email" class="form-control" id="email[{{row-count-placeholder}}]" name="email[{{row-count-placeholder}}]">
				</div>
			</div>
			<div class="row custom-marging-top">
				<h4>Permanant Address</h4>
				<div class="form-group col-md-3 custom-marging-right">
					<label for="per_housenumber[{{row-count-placeholder}}]">House No</label>
                                        <input type="text" class="form-control" id="per_housenumber[{{row-count-placeholder}}]" name="per_housenumber[{{row-count-placeholder}}]" placeholder="House No" value="<?php echo $user['per_housenumber']; ?>"/>
				</div>
				<div class="form-group col-md-3 custom-marging-right">
					<label for="per_society[{{row-count-placeholder}}]">Society</label>
					<input type="text" class="form-control" id="per_society[{{row-count-placeholder}}]" name="per_society[{{row-count-placeholder}}]" placeholder="Society" value="<?php echo $user['per_society']; ?>"/>
				</div>
				<div class="form-group col-md-3 custom-marging-right">
					<label for="per_area[{{row-count-placeholder}}]">Area</label>
					<input type="text" class="form-control" id="per_area[{{row-count-placeholder}}]" name="per_area[{{row-count-placeholder}}]" placeholder="Area" value="<?php echo $user['per_area']; ?>"/>
				</div>
				<div class="form-group col-md-3 custom-marging-right">
					<label for="per_city[{{row-count-placeholder}}]">Pincode</label>
					<input type="text" class="form-control" id="per_pincode[{{row-count-placeholder}}]" name="per_pincode[{{row-count-placeholder}}]" placeholder="Pincode" value="<?php echo $user['per_pincode']; ?>"/>
				</div>
			</div>
			<div class="row custom-marging-top">
				<div class="form-group col-md-3 custom-marging-right">
					<label for="per_state_{{row-count-placeholder}}">State</label>
					<div>
						<select class="per_state form-control" name="per_state[{{row-count-placeholder}}]" id="per_state_{{row-count-placeholder}}" data-id="{{row-count-placeholder}}">
							<option value="">--State--</option>
							<?php foreach($states as $state){ ?>
								<option <?php echo ($state['state_name']=$user['per_state']) ? 'selected=""' : ''; ?> value="<?php echo $state['state_name']; ?>"><?php echo $state['state_name']; ?></option>
							<?php } ?>
							<option value="other">Other</option>
						</select>
					</div>
					<input type="text" value="" class="form-control" id="other_per_state_{{row-count-placeholder}}" name="other_per_state[{{row-count-placeholder}}]" style="display: none"/>
				</div>
				<div class="form-group col-md-3 custom-marging-right">
					<label for="per_city[{{row-count-placeholder}}]">City</label>
					<input type="text" class="form-control" id="per_city[{{row-count-placeholder}}]" name="per_city[{{row-count-placeholder}}]" placeholder="City" value="<?php echo $user['per_city']; ?>"/>
				</div>
				<div class="form-group col-md-3 custom-marging-right">
					<label class="per_district" for="per_district[{{row-count-placeholder}}]">District</label>
					<div>
						<select class="per_district form-control" name="per_district[{{row-count-placeholder}}]" id="per_district_{{row-count-placeholder}}" data-id="{{row-count-placeholder}}">
							<option value="">--District--</option>
                                                        <?php if(!empty($user['per_district'])) { ?>
                                                        <option value="<?php echo $user['per_district']; ?>" selected=""><?php echo $user['per_district']; ?></option>
                                                        <option value="other">Other</option>
                                                        <?php } ?>
                                                        
						</select>
					</div>
					<input type="text" value="" class="form-control" id="other_per_district_{{row-count-placeholder}}" name="other_per_district[{{row-count-placeholder}}]" style="display: none"/>
				</div>
				<div class="form-group col-md-3 custom-marging-right">
					<label  for="per_taluka_{{row-count-placeholder}}">Taluka</label>
					<div>
						<select class="per_taluka form-control" name="per_taluka[{{row-count-placeholder}}]" id="per_taluka_{{row-count-placeholder}}" data-id="{{row-count-placeholder}}">
							<option value="">--Taluka--</option>
                                                        <?php if(!empty($user['per_taluka'])) { ?>
                                                        <option value="<?php echo $user['per_taluka']; ?>" selected=""><?php echo $user['per_taluka']; ?></option>
                                                        <option value="other">Other</option>
                                                        <?php } ?>
						</select>
					</div>
					<input type="text" value="" class="form-control" id="other_per_taluka_{{row-count-placeholder}}" name="other_per_taluka[{{row-count-placeholder}}]" style="display: none"/>
				</div>
			</div>
			<div class="row custom-marging-top">
				<h4>Current Address</h4>
                                <div class="form-group col-md-12 custom-marging-right">
                                    <input type="checkbox" class="sameasabove" data-id="{{row-count-placeholder}}" name="sameasabove[{{row-count-placeholder}}]" value="1"/>
                                    Same As Above
                                </div>
                                <div class="currentaddress" data-id="{{row-count-placeholder}}">
				<div class="form-group col-md-3 custom-marging-right">
					<label for="per_housenumber[{{row-count-placeholder}}]">House No</label>
					<input type="text" class="form-control" id="current_housenumber[{{row-count-placeholder}}]" name="current_housenumber[{{row-count-placeholder}}]" placeholder="House No"/>
				</div>
				<div class="form-group col-md-3 custom-marging-right">
					<label for="per_society[{{row-count-placeholder}}]">Society</label>
					<input type="text" class="form-control" id="current_society[{{row-count-placeholder}}]" name="current_society[{{row-count-placeholder}}]" placeholder="House No"/>
				</div>
				<div class="form-group col-md-3 custom-marging-right">
					<label for="per_area">Area</label>
					<input type="text" class="form-control" id="current_area[{{row-count-placeholder}}]" name="current_area[{{row-count-placeholder}}]" placeholder="House No"/>
				</div>
				<div class="form-group col-md-3 custom-marging-right">
					<label for="per_city[{{row-count-placeholder}}]">Pincode</label>
					<input type="text" class="form-control" id="current_pincode[{{row-count-placeholder}}]" name="current_pincode[{{row-count-placeholder}}]" placeholder="Pincode"/>
				</div>
                                </div>
			</div>
			<div class="row custom-marging-top">
                            <div class="currentaddress" data-id="{{row-count-placeholder}}">
				<div class="form-group col-md-3 custom-marging-right">
					<label for="current_state_{{row-count-placeholder}}_">State</label>
					<div>
						<select class="current_state form-control" name="current_state[{{row-count-placeholder}}]" id="current_state_{{row-count-placeholder}}" data-id="{{row-count-placeholder}}">
							<option value="">--State--</option>
							<?php foreach($states as $state){ ?>
								<option value="<?php echo $state['state_name']; ?>"><?php echo $state['state_name']; ?></option>
							<?php } ?>
							<option value="other">Other</option>
						</select>
					</div>
					<input type="text" value="" class="form-control" id="other_current_state_{{row-count-placeholder}}" name="other_current_state[{{row-count-placeholder}}]" style="display: none"/>
				</div>
				<div class="form-group col-md-3 custom-marging-right">
					<label for="current_city[{{row-count-placeholder}}]">City</label>
					<input type="text" class="form-control" id="current_city[{{row-count-placeholder}}]" name="current_city[{{row-count-placeholder}}]" placeholder="City"/>
				</div>
				<div class="form-group col-md-3 custom-marging-right">
					<label for="current_district[{{row-count-placeholder}}]">District</label>
					<div>
						<select class="current_district form-control" name="current_district[{{row-count-placeholder}}]" id="current_district_{{row-count-placeholder}}" data-id="{{row-count-placeholder}}">
							<option value="">--District--</option>
						</select>
					</div>
					<input type="text" value="" class="form-control" id="other_current_district_{{row-count-placeholder}}" name="other_current_district[{{row-count-placeholder}}]" style="display: none"/>
				</div>
				<div class="form-group col-md-3 custom-marging-right">
					<label for="current_taluka[{{row-count-placeholder}}]">Taluka</label>
					<div>
						<select class="current_taluka form-control" name="current_taluka[{{row-count-placeholder}}]" id="current_taluka_{{row-count-placeholder}}" data-id="{{row-count-placeholder}}">
							<option value="">--Taluka--</option>
						</select>
					</div>
					<input type="text" value="" class="form-control" id="other_current_taluka_{{row-count-placeholder}}" name="other_current_taluka[{{row-count-placeholder}}]" style="display: none"/>
				</div>
                            </div>
			</div>
                                
			</div>
		</div>
	</div>
        <div class="row custom-marging-top">
            <div class="form-group col-md-4 custom-marging-right">
                <a class="add" href="#"><span>Add</span></a>
            </div>
        </div>
</div>

</div>

	<div class="row custom-marging-top">
				<div class="form-group col-md-4 custom-marging-right">
					<input type="submit" name="submit" id="register" class="form-control" value="Save & Continue"/>
				</div>
			</div>		
</form>
<button id="matrimonialform" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg" style="display: none">Large modal</button>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
     	<iframe id="maritalform" frameborder="0" height="650px" width="100%" src=""></iframe> 
    </div>
  </div>
</div>