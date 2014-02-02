<?php
class admin extends CI_Controller
{
	var $min_password = 4;
	var $max_password = 20;
	var $min_username = 4;
	var $max_username = 20;

	function __construct()
	{
		parent::__construct();
		
		$this->load->library('Table');
		$this->load->library('Pagination');
		$this->load->library('DX_Auth');
		
		//	$this->load->helper('form');
		//	$this->load->helper('url');
				
		// Protect entire controller so only admin, 
		// and users that have granted role in permissions table can access it.
		$this->dx_auth->check_uri_permissions();
	} 
	
	function index()
	{
		$this->home();
	}

	function home(){
		urlmenu();

		$this->load->view('plantilla');
	}

	function ajax(){

		$val = $this->form_validation;
			$val->set_rules('username', 'Username', 'trim|required|xss_clean|min_length['.$this->min_username.']|max_length['.$this->max_username.']|callback_username_check|alpha_dash');
			$val->set_rules('email', 'Email', 'trim|required|xss_clean|callback_email_check|valid_email');
			$val->set_rules('password', 'Password', 'trim|required|xss_clean|min_length['.$this->min_password.']|max_length['.$this->max_password.']|matches[confirmpassword]');
			$val->set_rules('confirmpassword', 'Confirm Password', 'trim|required|xss_clean');
			$this->load->model('dx_auth/users');

/*
			if ($this->dx_auth->captcha_registration)
			{
				// Set recaptcha rules.
				// IMPORTANT: Do not change 'recaptcha_response_field' because it's used by reCAPTCHA API,
				// This is because the limitation of reCAPTCHA, not DX Auth library
				$val->set_rules('recaptcha_response_field', 'Confirmation Code', 'trim|xss_clean|required|callback_recaptcha_check');
			}

			*/



		if($this->input->post('ajax')&&(!$val->run())){
				$datos = array('algo' => 2 );
				$error = $this->form_validation->error_array();
				$error['success']= 0;
				echo json_encode($error);
		}else{
		//	$this->dx_auth->register($val->set_value('username'), $val->set_value('password'), $val->set_value('email'))
				$usuario_E = $this->input->post();
				$result = $this->dx_auth->register_Estudiante($usuario_E);		
		/*	$this->load->model('estudiante');
			$data = array('id' => 2 , 'carrera_id' => 1);
			$this->estudiante->agregar($data); 
		*/
				//var_dump($result);
				$datos = array('success' => 1 );
				//var_dump($datos);
				echo json_encode($datos);
		}
	}

	function newuser()
	{
		if (  $this->dx_auth->is_admin() AND $this->dx_auth->allow_registration)
		{	
			$val = $this->form_validation;
			
				//var_dump('MOSTRAR');
			// Set form validation rules
			$val->set_rules('username', 'Username', 'trim|required|xss_clean|min_length['.$this->min_username.']|max_length['.$this->max_username.']|callback_username_check|alpha_dash');
			$val->set_rules('password', 'Password', 'trim|required|xss_clean|min_length['.$this->min_password.']|max_length['.$this->max_password.']|matches[confirm_password]');
			$val->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean');
			$val->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email|callback_email_check');
			
			// Is registration using captcha
			if ($this->dx_auth->captcha_registration)
			{
				// Set recaptcha rules.
				// IMPORTANT: Do not change 'recaptcha_response_field' because it's used by reCAPTCHA API,
				// This is because the limitation of reCAPTCHA, not DX Auth library
				$val->set_rules('recaptcha_response_field', 'Confirmation Code', 'trim|xss_clean|required|callback_recaptcha_check');
			}

			// Run form validation and register user if it's pass the validation
			if ($val->run() AND $this->dx_auth->register($val->set_value('username'), $val->set_value('password'), $val->set_value('email')))
			{	
				// Set success message accordingly
				//var_dump($this->dx_auth->email_activation);
				if ($this->dx_auth->email_activation)
				{
					$data['auth_message'] = 'You have successfully registered. Check your email address to activate your account.';
				}
				else
				{					
					$data['auth_message'] = 'You have successfully registered. '.anchor(site_url($this->dx_auth->login_uri), 'Login');
				}
				
				// Load registration success page
				$this->load->view($this->dx_auth->register_success_view, $data);
			}
			else
			{

				//var_dump('MOSTRAR');
				// Load registration page
					//$datos_plantilla['data'] = $data;

					$this->load->model('Carreras');
					$data = $this->Carreras->all();
					//var_dump($data[0]);
					$datos_plantilla['carreras'] =  (isset($data[0]))? $data[0]:array(0 => 'Cargue Carreras' );
					$datos_plantilla['css']= 'jquery-ui-1.9.2.custom.min';
					$datos_plantilla['js']= 'admin/users.js';
					$datos_plantilla['contenido'] = 'backend/user_form';

					$this->load->view('plantilla',$datos_plantilla);
				//$this->load->view('backend/user_form');
			}
		}
		elseif ( ! $this->dx_auth->allow_registration)
		{
			$data['auth_message'] = 'Registration has been disabled.';
			$this->load->view($this->dx_auth->register_disabled_view, $data);
		}
		else
		{
			$data['auth_message'] = 'You have to logout first, before registering.';
			$this->load->view($this->dx_auth->logged_in_view, $data);
		}
	}





	//forgot_password($login)
	function editUser($id = null){
		$this->load->model('dx_auth/users', 'users');		
		$val = $this->form_validation;	


		if($this->input->post()){		
			// Set form validation rules
		//	var_dump($this->input->post('password',true));
			if ($this->input->post('password',true)) {
				$val->set_rules('password', 'Password', 'trim|required|xss_clean|min_length['.$this->min_password.']|max_length['.$this->max_password.']|matches[confirm_password]');
				$val->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean');

			}

			$dataNotInsert = array('password','confirmpassword','submit');
			$val->set_rules('name', 'name', 'trim|required');
			$val->set_rules('last_name', 'Apellido', 'trim|required');
			$val->set_rules('email', 'email', 'trim|required|xss_clean|valid_email');
			$val->set_rules('birth_date', 'Fecha Nacimiento', 'date');
			$val->set_rules('addres', 'Direccion', 'trim');
			$val->set_rules('gender', 'Sexo', 'trim|exact_length[1]');
			$val->set_rules('civil_status', 'Estado Civil', 'trim|exact_length[1]');
			$val->set_rules('blood_type', 'Tipo de sangre', 'trim|min_length[2]|max_length[3]');	
			$val->set_rules('name', 'name', 'trim|required');
			//$val->set_rules('email', 'email', 'trim|required|xss_clean|valid_email|callback_email_check');
			$val->set_rules('observations', 'name', 'trim|observations');
			if($val->run()){
				foreach ($this->input->post() as $key => $value) {
					if (!in_array($key, $dataNotInsert)) {
						$data[$key] = $value;
					}
					//var_dump($data);
				}
				$this->users->set_user($id, $data);
			}
		}

		 if($query = $this->users->get_user_by_id($id) AND $query->num_rows() == 1)
		{
			$user['usuario'] = $query->row();
			$data = null;
		//	var_dump($user);
					$datos_plantilla['data'] = $user;
					$datos_plantilla['contenido'] = 'backend/editUser';
					$this->load->view('plantilla',$datos_plantilla);			
		//	$this->load->view('backend/editUser', $user);
	 	}else{
				$data['auth_message'] = 'You have successfully registered. '.anchor(site_url($this->dx_auth->login_uri), 'Login');
				// Load registration success page
					$datos_plantilla['data'] = $data;
					$datos_plantilla['contenido'] = $this->dx_auth->register_success_view;
					$this->load->view('plantilla',$datos_plantilla);
					//$this->load->view($this->dx_auth->register_success_view, $data);
	 	}
	}

/*
	function email_check($email)
	{
		$result = true;
		if($this->dx_auth->userData('email') == $email)
			$result = $this->dx_auth->is_email_available($email);
		if ( ! $result)
		{
			$this->form_validation->set_message('email_check', 'Este correo ya está siendo usado por otra persona. Por favor introduzca otro correo valido.');
		}
				var_dump($result);
		return $result;
	}
*/
	function email_check($email)
	{
		//var_dump($email,$this->session->all_userdata());
		if(!($email == $this->dx_auth->userData('email'))){
			$result = $this->dx_auth->is_email_available($email);
			if ( ! $result)
			{
				$this->form_validation->set_message('email_check', 'Este correo ya está siendo usado por otra persona.');
			}
		}else{
			$result = true;
		}


				
		return $result;
	}	

	function username_check($username)
	{
		$result = $this->dx_auth->is_username_available($username);
		if ( ! $result)
		{
			$this->form_validation->set_message('username_check', 'Username already exist. Please choose another username.');
		}
				
		return $result;
	}


	function pre_inscritos()
	{

		$this->load->model('dx_auth/users', 'users');			
		
		// Search checkbox in post array
/*		foreach ($_POST as $key => $value)
		{
			// If checkbox found
			if (substr($key, 0, 9) == 'checkbox_')
			{
				// If ban button pressed
				if (isset($_POST['ban']))
				{
					// Ban user based on checkbox value (id)
					$this->users->ban_user($value);
				}
				// If unban button pressed
				else if (isset($_POST['unban']))
				{
					// Unban user
					$this->users->unban_user($value);
				}
				else if (isset($_POST['reset_pass']))
				{
					// Set default message
					$data['reset_message'] = 'Reset password failed';
				
					// Get user and check if User ID exist
					if ($query = $this->users->get_user_by_id($value) AND $query->num_rows() == 1)
					{		
						// Get user record				
						$user = $query->row();
						
						// Create new key, password and send email to user
						if ($this->dx_auth->forgot_password($user->username))
						{
							// Query once again, because the database is updated after calling forgot_password.
							$query = $this->users->get_user_by_id($value);
							// Get user record
							$user = $query->row();
														
							// Reset the password
							if ($this->dx_auth->reset_password($user->username, $user->newpass_key))
							{							
								$data['reset_message'] = 'Reset password success';
							}
						}
					}
				}
			}				
		}*/
		
		/* Showing page to user */
		
		// Get offset and limit for page viewing
		$offset = (int) $this->uri->segment(3);
		// Number of record showing per page
		$row_count = 10;
		
		// Get all users
		$data['users'] = $this->users->get_all_rol(1,$offset, $row_count)->result();
		
		// Pagination config
		$p_config['base_url'] = base_url().'/admin/users/';
		$p_config['uri_segment'] = 3;
		$p_config['num_links'] = 2;
		$p_config['total_rows'] = $this->users->get_all()->num_rows();
		$p_config['per_page'] = $row_count;
				
		// Init pagination
		$this->pagination->initialize($p_config);		
		// Create pagination links
		$data['pagination'] = $this->pagination->create_links();
		
		// Load view
		//$this->load->view('backend/users', $data);
			//$data['auth_message'] = 'You are already logged in.';
			$datos_plantilla['js'] = 'admin.js';
			$datos_plantilla['data'] = $data;
			$datos_plantilla['contenido'] = 'backend/users';
		//	$this->load->view($this->dx_auth->logged_in_view, $datos_plantilla);
			$this->load->view('plantilla',$datos_plantilla);
	}

	function alumnos(){

		$this->load->model('dx_auth/users', 'users');		
		// Get offset and limit for page viewing
		$offset = (int) $this->uri->segment(3);
		// Number of record showing per page
		$row_count = 10;
		
		// Get all users
		$data['users'] = $this->users->get_all_rol(1,$offset, $row_count)->result();
		
		// Pagination config
		$p_config['base_url'] = base_url().'/admin/users/';
		$p_config['uri_segment'] = 3;
		$p_config['num_links'] = 2;
		$p_config['total_rows'] = $this->users->get_all()->num_rows();
		$p_config['per_page'] = $row_count;
				
		// Init pagination
		$this->pagination->initialize($p_config);		
		// Create pagination links
		$data['pagination'] = $this->pagination->create_links();
		
		// Load view
		//$this->load->view('backend/users', $data);
			//$data['auth_message'] = 'You are already logged in.';
			$datos_plantilla['js'] = 'admin.js';
			$datos_plantilla['data'] = $data;
			$datos_plantilla['contenido'] = 'backend/users';
		//	$this->load->view($this->dx_auth->logged_in_view, $datos_plantilla);
			$this->load->view('plantilla',$datos_plantilla);	

	}




	function users()
	{

		$this->load->model('dx_auth/users', 'users');			
		
		// Search checkbox in post array
		foreach ($_POST as $key => $value)
		{
			// If checkbox found
			if (substr($key, 0, 9) == 'checkbox_')
			{
				// If ban button pressed
				if (isset($_POST['ban']))
				{
					// Ban user based on checkbox value (id)
					$this->users->ban_user($value);
				}
				// If unban button pressed
				else if (isset($_POST['unban']))
				{
					// Unban user
					$this->users->unban_user($value);
				}
				else if (isset($_POST['reset_pass']))
				{
					// Set default message
					$data['reset_message'] = 'Reset password failed';
				
					// Get user and check if User ID exist
					if ($query = $this->users->get_user_by_id($value) AND $query->num_rows() == 1)
					{		
						// Get user record				
						$user = $query->row();
						
						// Create new key, password and send email to user
						if ($this->dx_auth->forgot_password($user->username))
						{
							// Query once again, because the database is updated after calling forgot_password.
							$query = $this->users->get_user_by_id($value);
							// Get user record
							$user = $query->row();
														
							// Reset the password
							if ($this->dx_auth->reset_password($user->username, $user->newpass_key))
							{							
								$data['reset_message'] = 'Reset password success';
							}
						}
					}
				}
			}				
		}
		
		/* Showing page to user */
		
		// Get offset and limit for page viewing
		$offset = (int) $this->uri->segment(3);
		// Number of record showing per page
		$row_count = 10;
		
		// Get all users
		$data['users'] = $this->users->get_all($offset, $row_count)->result();
		
		// Pagination config
		$p_config['base_url'] = base_url().'/admin/users/';
		$p_config['uri_segment'] = 3;
		$p_config['num_links'] = 2;
		$p_config['total_rows'] = $this->users->get_all()->num_rows();
		$p_config['per_page'] = $row_count;
				
		// Init pagination
		$this->pagination->initialize($p_config);		
		// Create pagination links
		$data['pagination'] = $this->pagination->create_links();
		
		// Load view
		//$this->load->view('backend/users', $data);
			//$data['auth_message'] = 'You are already logged in.';
			$datos_plantilla['js'] = 'admin.js';
			$datos_plantilla['data'] = $data;
			$datos_plantilla['contenido'] = 'backend/users';
		//	$this->load->view($this->dx_auth->logged_in_view, $datos_plantilla);
			$this->load->view('plantilla',$datos_plantilla);
	}
	
	function unactivated_users()
	{
		$this->load->model('dx_auth/user_temp', 'user_temp');
		
		/* Database related */
		
		// If activate button pressed
		if ($this->input->post('activate'))
		{
			// Search checkbox in post array
			foreach ($_POST as $key => $value)
			{
				// If checkbox found
				if (substr($key, 0, 9) == 'checkbox_')
				{
					// Check if user exist, $value is username
					if ($query = $this->user_temp->get_login($value) AND $query->num_rows() == 1)
					{
						// Activate user
						$this->dx_auth->activate($value, $query->row()->activation_key);
					}
				}				
			}
		}
		
		/* Showing page to user */
		
		// Get offset and limit for page viewing
		$offset = (int) $this->uri->segment(3);
		// Number of record showing per page
		$row_count = 10;
		
		// Get all unactivated users
		$data['users'] = $this->user_temp->get_all($offset, $row_count)->result();
		
		// Pagination config
		$p_config['base_url'] = '/backend/unactivated_users/';
		$p_config['uri_segment'] = 3;
		$p_config['num_links'] = 2;
		$p_config['total_rows'] = $this->user_temp->get_all()->num_rows();
		$p_config['per_page'] = $row_count;
				
		// Init pagination
		$this->pagination->initialize($p_config);		
		// Create pagination links
		$data['pagination'] = $this->pagination->create_links();
		
		// Load view
		//$this->load->view('backend/unactivated_users', $data);
		$datos_plantilla['data'] = $data;
		$datos_plantilla['contenido'] = 'backend/unactivated_users';
	//	$this->load->view($this->dx_auth->logged_in_view, $datos_plantilla);
		$this->load->view('plantilla',$datos_plantilla);
	}
	
	function roles()
	{		
		$this->load->model('dx_auth/roles', 'roles');
		
		/* Database related */
					
		// If Add role button pressed
		if ($this->input->post('add'))
		{
			// Create role
			$this->roles->create_role($this->input->post('role_name'), $this->input->post('role_parent'));
		}
		else if ($this->input->post('delete'))
		{				
			// Loop trough $_POST array and delete checked checkbox
			foreach ($_POST as $key => $value)
			{
				// If checkbox found
				if (substr($key, 0, 9) == 'checkbox_')
				{
					// Delete role
					$this->roles->delete_role($value);
				}				
			}
		}

		/* Showing page to user */
	
		// Get all roles from database
		$data['roles'] = $this->roles->get_all()->result();
		
		// Load view
		$datos_plantilla['data'] = $data;
		$datos_plantilla['contenido'] = 'backend/roles';
	//	$this->load->view($this->dx_auth->logged_in_view, $datos_plantilla);
		$this->load->view('plantilla',$datos_plantilla);		
		//$this->load->view('backend/roles', $data);
	}
	
	function uri_permissions()
	{
		function trim_value(&$value) 
		{ 
			$value = trim($value); 
		}
	
		$this->load->model('dx_auth/roles', 'roles');
		$this->load->model('dx_auth/permissions', 'permissions');
		
		if ($this->input->post('save'))
		{
			// Convert back text area into array to be stored in permission data
			$allowed_uris = explode("\n", $this->input->post('allowed_uris'));
			
			// Remove white space if available
			array_walk($allowed_uris, 'trim_value');
		
			// Set URI permission data
			// IMPORTANT: uri permission data, is saved using 'uri' as key.
			// So this key name is preserved, if you want to use custom permission use other key.
			$this->permissions->set_permission_value($this->input->post('role'), 'uri', $allowed_uris);
		}
		
		/* Showing page to user */		
		
		// Default role_id that will be showed
		$role_id = $this->input->post('role') ? $this->input->post('role') : 1;
		
		// Get all role from database
		$data['roles'] = $this->roles->get_all()->result();
		// Get allowed uri permissions
		$data['allowed_uris'] = $this->permissions->get_permission_value($role_id, 'uri');
		
		// Load view
		$datos_plantilla['data'] = $data;
		$datos_plantilla['contenido'] = 'backend/uri_permissions';
		$this->load->view('plantilla',$datos_plantilla);
		//$this->load->view('backend/uri_permissions', $data);
	}
	
	function custom_permissions()
	{
		// Load models
		$this->load->model('dx_auth/roles', 'roles');
		$this->load->model('dx_auth/permissions', 'permissions');
	
		/* Get post input and apply it to database */
		
		// If button save pressed
		if ($this->input->post('save'))
		{
			// Note: Since in this case we want to insert two key with each value at once,
			// it's not advisable using set_permission_value() function						
			// If you calling that function twice that means, you will query database 4 times,
			// because set_permission_value() will access table 2 times, 
			// one for get previous permission and the other one is to save it.
			
			// For this case (or you need to insert few key with each value at once) 
			// Use the example below
		
			// Get role_id permission data first. 
			// So the previously set permission array key won't be overwritten with new array with key $key only, 
			// when calling set_permission_data later.
			$permission_data = $this->permissions->get_permission_data($this->input->post('role'));
		
			// Set value in permission data array
			$permission_data['edit'] = $this->input->post('edit');
			$permission_data['delete'] = $this->input->post('delete');
			
			// Set permission data for role_id
			$this->permissions->set_permission_data($this->input->post('role'), $permission_data);
		}
	
		/* Showing page to user */		
		
		// Default role_id that will be showed
		$role_id = $this->input->post('role') ? $this->input->post('role') : 1;
		
		// Get all role from database
		$data['roles'] = $this->roles->get_all()->result();
		// Get edit and delete permissions
		$data['edit'] = $this->permissions->get_permission_value($role_id, 'edit');
		$data['delete'] = $this->permissions->get_permission_value($role_id, 'delete');
	
		// Load view
		$datos_plantilla['data'] = $data;
		$datos_plantilla['contenido'] = 'backend/custom_permissions';
		$this->load->view('plantilla',$datos_plantilla);
		//$this->load->view('backend/custom_permissions', $data);
	}
}
?>