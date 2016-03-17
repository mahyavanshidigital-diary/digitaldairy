<!DOCTYPE html>
<html>
	<head>
		<title>Digital Dairy</title>

		<!-- meta -->
		<meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

	    <!-- css -->
		<link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css">
		
	    <link rel="stylesheet" href="<?php echo base_url() ?>css/custom.css">
	    <link rel="stylesheet" href="<?php echo base_url() ?>css/custom_bootstrap.css">
	    
	    <!-- js -->
	    <script src="<?php echo base_url() ?>js/jquery-2.1.3.min.js"></script>
	    <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
	</head>

	<body id="page">
<?php
$this->load->view($main_content);
?>
	</body>
</html>