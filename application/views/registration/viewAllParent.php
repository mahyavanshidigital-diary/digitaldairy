<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
<script type="text/javascript" class="init">
$(document).ready(function() {
	$('#example').DataTable();
} );
</script>
<div class="content-body">
    <div class="container">
        <div class="row custom-marging-top">
            <div class="form-group col-md-12 custom-marging-right">
                 <table id="example" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>First Name</th>
							<th>Middle Name</th>
							<th>Last Name</th>
                                                        <th>Mobile Number</th>
							<th>Email</th>
							<th>Profile</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>First Name</th>
							<th>Middle Name</th>
							<th>Last Name</th>
                                                        <th>Mobile Number</th>
							<th>Email</th>
							<th>Profile</th>
						</tr>
					</tfoot>
					<tbody>
                                            <?php foreach($users as $user) { ?>
						<tr>
							<td><?php echo $user['first_name']; ?></td>
							<td><?php echo $user['middle_name']; ?></td>
                                                        <td><?php echo $user['last_name']; ?></td>
                                                        <td><?php echo $user['mobile_number']; ?></td>
                                                        <td><?php echo $user['email']; ?></td>
                                                        <td><a href="<?php echo base_url('/registration/profile/'.$user['id']); ?>">View</a></td>
						</tr>
                                            <?php } ?>
					</tbody>
				</table>   
            </div>
    </div>
</div>