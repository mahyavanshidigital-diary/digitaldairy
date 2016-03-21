<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"> 
<style>
    .resulttxt{color:blue;font-weight: bold}
    #accordion h3{color:red}
</style>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
$(function() {
    $( "#accordion" ).accordion();
    $(".form-control").each(function(){
       $(this).addClass('resulttxt'); 
    });
});
</script>

<div class="container">
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