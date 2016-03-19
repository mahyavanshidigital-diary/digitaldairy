<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('mdl_user');
		$this->load->model('mdl_state');
	}
        public function login(){
            $mobilenumber=$this->input->post('mobilenumber');
            $password=$this->input->post('password');
            $user=$this->mdl_user->checkuser($mobilenumber,$password);
            if(!empty($user)){
                //authorized
                redirect('user/profile');
            }
            else
            {
                $this->session->set_flashdata('loginerror','Invalid Mobile Number or Password');
                redirect('home');
            }
        }
	public function index()
	{
		//get all state information
		$states=$this->mdl_state->getAll();
		$data=array(
			'main_content'=>'user/index',
			'states'=>$states
		);
		$this->load->view('template/front',$data);
	}
	public function edit($id)
	{
		if($this->input->post('submit'))
		{
			$id=$this->input->post('id');
			$first_name=$this->input->post('first_name');
			$middle_name=$this->input->post('middle_name');
			$last_name=$this->input->post('last_name');
			$gender=$this->input->post('gender');
			$marital=$this->input->post('marital');
			$education=$this->input->post('education');
			if($education=="other")
				$education=$this->input->post('other_education');
			$education_status=$this->input->post('education_status');
			$current_education_status=$this->input->post('current_education_status');
			$home=$this->input->post('home');
			$occupation=$this->input->post('occupation');
			$birthdate_date=$this->input->post('birthdate_date');
			$birthdate_month=$this->input->post('birthdate_month');
			$birthdate_year=$this->input->post('birthdate_year');
			$mobile_number=$this->input->post('mobile_number');
			$annualincome=$this->input->post('annualincome');
			$bloodgroup=$this->input->post('bloodgroup');
			$email=$this->input->post('email');
			$per_housenumber=$this->input->post('per_housenumber');
			$per_society=$this->input->post('per_society');
			$per_area=$this->input->post('per_area');
			$per_pincode=$this->input->post('per_pincode');
			$per_state=$this->input->post('per_state');
			if($per_state=="other")
				$per_state=$this->input->post('other_per_state');
			$per_city=$this->input->post('per_city');
			$per_district=$this->input->post('per_district');
			if($per_district=="other")
				$per_district=$this->input->post('other_per_district');
			$per_taluka=$this->input->post('per_taluka');
			if($per_taluka=="other")
				$per_taluka=$this->input->post('other_per_taluka');
			$sameasabove=$this->input->post('sameasabove');
			if(empty($sameasabove))
			{
				$current_housenumber=$this->input->post('current_housenumber');
				$current_society=$this->input->post('current_society');
				$current_area=$this->input->post('current_area');
				$current_pincode=$this->input->post('current_pincode');
				$current_state=$this->input->post('current_state');
				if($current_state=="other")
						$current_state=$this->input->post('other_current_state');
				$current_city=$this->input->post('current_city');
				$current_district=$this->input->post('current_district');
				if($current_district=="other")
						$current_district=$this->input->post('other_current_district');
				$current_taluka=$this->input->post('current_taluka');
				if($current_taluka=="other")
						$current_taluka=$this->input->post('other_current_taluka');
			}
			else
			{
				$current_housenumber=$per_housenumber;
				$current_society=$per_society;
				$current_area=$per_area;
				$current_pincode=$per_pincode;
				$current_state=$per_state;
				$current_city=$per_city;
				$current_district=$per_district;
				$current_taluka=$per_taluka;
			}
			$updatedata=array(
				'first_name'=>$first_name,
				'middle_name'=>$middle_name,
				'last_name'=>$last_name,
				'marital'=>$marital,
				'gender'=>$gender,
				'education'=>$education,
				'education_status'=>$education_status,
				'current_education_status'=>$current_education_status,
				'home'=>$home,
				'occupation'=>$occupation,
				'birthdate'=>$birthdate_year.'-'.$birthdate_month.'-'.$birthdate_date,
				'mobile_number'=>$mobile_number,
				'annualincome'=>$annualincome,
				'bloodgroup'=>$bloodgroup,
				'email'=>$email,
				'per_housenumber'=>$per_housenumber,
				'per_society'=>$per_society,
				'per_area'=>$per_area,
				'per_pincode'=>$per_pincode,
				'per_state'=>$per_state,
				'per_city'=>$per_city,
				'per_district'=>$per_district,
				'per_taluka'=>$per_taluka,
				'current_housenumber'=>$current_housenumber,
				'current_society'=>$current_society,
				'current_area'=>$current_area,
				'current_pincode'=>$current_pincode,
				'current_state'=>$current_state,
				'current_city'=>$current_city,
				'current_district'=>$current_district,
				'current_taluka'=>$current_taluka,
				'updated'=>date('Y-m-d h:i:s'),
			);	
			$this->mdl_user->update($updatedata, $id);
			//redirect user to add family member screen
			redirect('/user/edit/'.$id);
		}
		else
		{
			//get all state information
			$user=$this->mdl_user->getUserDetail($id);
			$states=$this->mdl_state->getAll();
			$data=array(
				'main_content'=>'user/edit',
				'states'=>$states,
				'user'=>$user
			);
			$this->load->view('template/front',$data);
		}
	}
	function checkmobile() {
        if (array_key_exists('mobile_number', $_POST)) {
            if ($this->mobile_exists($this->input->post('mobile_number'),$this->input->post('id')) == TRUE) {
                echo json_encode(FALSE);
            } else {
                echo json_encode(TRUE);
            }
        }
    }

    function mobile_exists($mobile_number,$id) {
        $this->db->where('mobile_number', $mobile_number);
		$this->db->where('id <>',$id);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
	function getDistrict()
	{
		$id=$this->input->post('id');
		$user=$this->mdl_user->getUserDetail($id);
		$statename=$this->input->post('state');
		$districts=$this->mdl_state->getDistrictByStateName($statename);
		?>
		<option value="">--District--</option>
		<?php
		foreach($districts as $district){
			?>
			<option value="<?php echo $district['districts_name']; ?>" <?php echo($user['per_district'] == $district['districts_name']) ? "selected":""; ?>><?php echo $district['districts_name']; ?></option>
			<?php
		}
		?>
		<option value="other">Other</option>
		<?php
	}
	function getTaluka(){
		$id=$this->input->post('id');
		$user=$this->mdl_user->getUserDetail($id);
		$district=$this->input->post('district');
		$districts=$this->mdl_state->getTalukaByDistrictName($district);
		?>
		<option value="">--District--</option>
		<?php
		foreach($districts as $district){
			?>
			<option value="<?php echo $district['taluka_name']; ?>" <?php echo($user['per_taluka'] == $district['taluka_name']) ? "selected":""; ?>><?php echo $district['taluka_name']; ?></option>
			<?php
		}
		?>
		<option value="other">Other</option>
		<?php
	}
	function getDistrictcurrent()
	{
		$id=$this->input->post('id');
		$user=$this->mdl_user->getUserDetail($id);
		$statename=$this->input->post('state');
		$districts=$this->mdl_state->getDistrictByStateName($statename);
		?>
		<option value="">--District--</option>
		<?php
		foreach($districts as $district){
			?>
			<option value="<?php echo $district['districts_name']; ?>" <?php echo($user['current_district'] == $district['districts_name']) ? "selected":""; ?>><?php echo $district['districts_name']; ?></option>
			<?php
		}
		?>
		<option value="other">Other</option>
		<?php
	}
	function getTalukacurrent(){
		$id=$this->input->post('id');
		$user=$this->mdl_user->getUserDetail($id);
		$district=$this->input->post('district');
		$districts=$this->mdl_state->getTalukaByDistrictName($district);
		?>
		<option value="">--District--</option>
		<?php
		foreach($districts as $district){
			?>
			<option value="<?php echo $district['taluka_name']; ?>" <?php echo($user['current_taluka'] == $district['taluka_name']) ? "selected":""; ?>><?php echo $district['taluka_name']; ?></option>
			<?php
		}
		?>
		<option value="other">Other</option>
		<?php
	}
}
