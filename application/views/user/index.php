<link href="<?php echo base_url() ?>css/jquery.dataTables.min.css" rel="stylesheet">
<script src="<?php echo base_url() ?>js/jquery.dataTables.min.js"></script>
<script type="text/javascript" class="init">
$(document).ready(function() {
	$('#example').DataTable();
} );
</script>

<div class="content-body">
    <div class="container">
		
		<div style="float: left;">
		Hello, <?php echo $this->session->userdata['first_name']; ?>
		</div>
		<div style="float: right;">
		<a href="<?php echo base_url() ?>user/logout">Logout</a>
		</div>
	
        <div class="row custom-marging-top">
			<hr>
				<h2 class="intro-text text-center">
					<strong>Family Member List</strong>
				</h2>
			<hr>
            <div class="form-group col-md-12 custom-marging-right">
                 <table id="example" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>First Name</th>
							<th>Middle Name</th>
							<th>Last Name</th>
                            <th>Gender</th>
							<th>Relation</th>
							<th>Profile</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>First Name</th>
							<th>Middle Name</th>
							<th>Last Name</th>
                            <th>Gender</th>
							<th>Relation</th>
							<th>Profile</th>
						</tr>
					</tfoot>
					<tbody>
                        <?php foreach($users as $user) { ?>
						<tr>
							<td><?php echo $user['first_name']; ?></td>
							<td><?php echo $user['middle_name']; ?></td>
							<td><?php echo $user['last_name']; ?></td>
							<td><?php echo $user['gender']; ?></td>
							<td><?php echo $user['relation']; ?></td>
							<td><a href="<?php echo base_url('/user/edit/'.$user['id']); ?>">View</a></td>
						</tr>
                        <?php } ?>
					</tbody>
				</table>   
            </div>
    </div>
</div>