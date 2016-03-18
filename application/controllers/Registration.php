<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Registration extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('mdl_registration');
		$this->load->model('mdl_state');
	}
	public function index()
	{
		//get all state information
		$states=$this->mdl_state->getAll();
		$data=array(
			'main_content'=>'registration/index',
			'states'=>$states
		);
		$this->load->view('template/front',$data);
	}
	public function matrimonial()
	{
		//get all state information
		$states=$this->mdl_state->getAll();
		$data=array(
			'main_content'=>'registration/matrimonial',
			'states'=>$states
		);
		$this->load->view('template/popup',$data);
	}
	public function add(){
		$first_name=$this->input->post('first_name');
		$middle_name=$this->input->post('middle_name');
		$last_name=$this->input->post('last_name');
        $gender=$this->input->post('gender');
		$marital=$this->input->post('marital');
		$education=$this->input->post('education');
		if($education=="other")
			$education=$this->input->post('other_education');
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
                if(empty($sameasabove)){
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
                else{
                    $current_housenumber=$per_housenumber;
                    $current_society=$per_society;
                    $current_area=$per_area;
                    $current_pincode=$per_pincode;
                    $current_state=$per_state;
                    $current_city=$per_city;
                    $current_district=$per_district;
                    $current_taluka=$per_taluka;
                }
		$insertdata=array(
			'first_name'=>$first_name,
			'middle_name'=>$middle_name,
			'last_name'=>$last_name,
			'marital'=>$marital,
            'gender'=>$gender,
			'education'=>$education,
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
			'created'=>date('Y-m-d h:i:s')
		);	
		$id=$this->mdl_registration->add($insertdata);
		//redirect user to add family member screen
		redirect('registration/addfamily/'.$id);
	}
	function addfamily($id){
		//get all state information
		if($this->input->post('submit')){
			//get the post count
			$first_name=$this->input->post('first_name');
			$no=count($first_name);
			$middle_name=$this->input->post('middle_name');
			$last_name=$this->input->post('last_name');
			 $gender=$this->input->post('gender');
			$marital=$this->input->post('marital');
			$education=$this->input->post('education');
			
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
			$relation=$this->input->post('relation');
		  
			$per_city=$this->input->post('per_city');
			$per_district=$this->input->post('per_district');
		   
			$per_taluka=$this->input->post('per_taluka');
			
			$current_housenumber=$this->input->post('current_housenumber');
			$current_society=$this->input->post('current_society');
			$current_area=$this->input->post('current_area');
			$current_pincode=$this->input->post('current_pincode');
			$current_state=$this->input->post('current_state');
			
			$current_city=$this->input->post('current_city');
			$current_district=$this->input->post('current_district');
			
			$current_taluka=$this->input->post('current_taluka');
			
			$other_education=$this->input->post('other_education');
			$other_per_state=$this->input->post('other_per_state');
			$other_per_district=$this->input->post('other_per_district');
			$other_per_taluka=$this->input->post('other_per_taluka');
			$other_current_state=$this->input->post('other_current_state');
			$other_current_district=$this->input->post('other_current_district');
			$other_current_taluka=$this->input->post('other_current_taluka');
			$sameasabove=$this->input->post('sameasabove');
			for($i=1;$i<=$no;$i++){
				
				if($education[$i]=="other")
					$education[$i]=$other_education[$i];
				if($per_state[$i]=="other")
					$per_state[$i]=$other_per_state[$i];
				if($per_district[$i]=="other")
					$per_district[$i]=$other_per_district;
				if($per_taluka[$i]=="other")
					$per_taluka[$i]=$other_per_taluka[$i];
				if($current_state[$i]=="other")
					$current_state[$i]=$other_current_state[$i];
				if($current_district[$i]=="other")
					$current_district[$i]=$other_current_district[$i];
				if($current_taluka[$i]=="other")
					$current_taluka[$i]=$other_current_taluka[$i];
				if(!empty($sameasabove[$i])){
					$current_housenumber[$i]=$per_housenumber[$i];
					$current_society[$i]=$per_society[$i];
					$current_area[$i]=$per_area[$i];
					$current_pincode[$i]=$per_pincode[$i];
					$current_state[$i]=$per_state[$i];
					$current_city[$i]=$per_city[$i];
					$current_district[$i]=$per_district[$i];
					$current_taluka[$i]=$per_taluka[$i];
				}
				$insertdata=array(
					'first_name'=>$first_name[$i],
					'middle_name'=>$middle_name[$i],
					'last_name'=>$last_name[$i],
					'marital'=>$marital[$i],
					'education'=>$education[$i],
					'home'=>$home[$i],
					'gender'=>$gender[$i],
					'occupation'=>$occupation[$i],
					'birthdate'=>$birthdate_year[$i].'-'.$birthdate_month[$i].'-'.$birthdate_date[$i],
					'mobile_number'=>$mobile_number[$i],
					'annualincome'=>$annualincome[$i],
					'bloodgroup'=>$bloodgroup[$i],
					'email'=>$email[$i],
					'per_housenumber'=>$per_housenumber[$i],
					'per_society'=>$per_society[$i],
					'per_area'=>$per_area[$i],
					'per_pincode'=>$per_pincode[$i],
					'per_state'=>$per_state[$i],
					'per_city'=>$per_city[$i],
					'per_district'=>$per_district[$i],
					'per_taluka'=>$per_taluka[$i],
					'current_housenumber'=>$current_housenumber[$i],
					'current_society'=>$current_society[$i],
					'current_area'=>$current_area[$i],
					'current_pincode'=>$current_pincode[$i],
					'current_state'=>$current_state[$i],
					'current_city'=>$current_city[$i],
					'current_district'=>$current_district[$i],
					'current_taluka'=>$current_taluka[$i],
					'created'=>date('Y-m-d h:i:s'),
					'relation'=>$relation[$i],
					'parent_id'=>$id,
				);
				$this->mdl_registration->add($insertdata);
			}
			$this->load->view('registration/insertmatrimonial');
		}
		else{
			$states=$this->mdl_state->getAll();
			 $user=$this->mdl_registration->getUserById($id);
			$data=array(
					'main_content'=>'registration/addFamily',
					'states'=>$states,
					'user'=>$user
			);
			$this->load->view('template/front',$data);
		}
	}
	function checkmobile(){
		$mobile=$this->input->post('mobile');
		if(empty($mobile)){
			//check for the another
			$mobilearr=$this->input->post('mobile_number');
			$mobile=end($mobilearr);
		}
		$user=$this->mdl_registration->findByMobile($mobile);
		if(empty($user))
			echo json_encode(TRUE);
		else
			echo json_encode(FALSE);
	}
	function getDistrict(){
		$statename=$this->input->post('state');
		$districts=$this->mdl_state->getDistrictByStateName($statename);
		?>
		<option value="">--District--</option>
		<?php
		foreach($districts as $district){
			?>
			<option value="<?php echo $district['districts_name']; ?>"><?php echo $district['districts_name']; ?></option>
			<?php
		}
		?>
		<option value="other">Other</option>
		<?php
	}
	function getTaluka(){
		$district=$this->input->post('district');
		$districts=$this->mdl_state->getTalukaByDistrictName($district);
		?>
		<option value="">--District--</option>
		<?php
		foreach($districts as $district){
			?>
			<option value="<?php echo $district['taluka_name']; ?>"><?php echo $district['taluka_name']; ?></option>
			<?php
		}
		?>
		<option value="other">Other</option>
		<?php
	}
	function insertMatrimonial(){
		$full_name=$this->input->post('full_name');
		$father_name=$this->input->post('father_name');
		$mother_name=$this->input->post('mother_name');
		$birth_time=$this->input->post('birth_time');
		$education=$this->input->post('education');
		$zodiac_sign=$this->input->post('zodiac_sign');
		$color=$this->input->post('color');
		$height=$this->input->post('height');
		$weight=$this->input->post('weight');
		if($education=="other")
			$education=$this->input->post('other_education');
		$occupation=$this->input->post('occupation');
		$annualincome=$this->input->post('annualincome');
		$position=$this->input->post('position');
		$companyname=$this->input->post('companyname');
		$departmentname=$this->input->post('departmentname');
		$job_type=$this->input->post('job_type');
		$noofyears=$this->input->post('noofyears');
		$nativeplace=$this->input->post('nativeplace');
		$mama=$this->input->post('mama');
		$currentaddress=$this->input->post('currentaddress');
		$email=$this->input->post('email');
		$phonenumber=$this->input->post('phonenumber');
		$hobbies=$this->input->post('hobbies');
		$other_details=$this->input->post('other_details');
		
		$birthdate_date=$this->input->post('birthdate_date');
		$birthdate_month=$this->input->post('birthdate_month');
		$birthdate_year=$this->input->post('birthdate_year');
		
		
		$insertdata=array(
			'full_name'=>$full_name,
			'father_name'=>$father_name,
			'mother_name'=>$mother_name,
			'birthdate'=>$birthdate_year.'-'.$birthdate_month.'-'.$birthdate_date,
			'birth_time'=>$birth_time,
			'zodiac_sign'=>$zodiac_sign,
			'color'=>$color,
			'height'=>$height,
			'weight'=>$weight,
			'education'=>$education,
			'occupation'=>$occupation,
			'annualincome'=>$annualincome,
			'position'=>$position,
			'companyname'=>$companyname,
			'departmentname'=>$departmentname,
			'job_type'=>$job_type,
			'noofyears'=>$noofyears,
			'nativeplace'=>$nativeplace,
			'mama'=>$mama,
			'currentaddress'=>$currentaddress,
			'email'=>$email,
			'phonenumber'=>$phonenumber,
			'hobbies'=>$hobbies,
			'other_details'=>$other_details,
		);	
		$id=$this->mdl_registration->addMatrimonial($insertdata);
		$this->load->view('registration/insertmatrimonial');
	}
	public function viewAllParent(){
		$users=$this->mdl_registration->getAllparentUsers();
		$data=array(
		'main_content'=>'registration/viewAllParent',
		'users'=>$users
	);
	$this->load->view('template/front',$data);
	}
	public function profile($id){
		$user=$this->mdl_registration->getUserById($id);
		$members=$this->mdl_registration->getUserByParentId($id);
		$data=array(
		'main_content'=>'registration/profile',
		'user'=>$user,
					'members'=>$members,
	);
	$this->load->view('template/front',$data);
	}
}
