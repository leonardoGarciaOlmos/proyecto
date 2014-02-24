<?php
class Auth_Controller extends CI_Controller
{
	// Used for registering and changing password form validation
	var $min_username = 4;
	var $max_username = 20;
	var $min_password = 4;
	var $max_password = 20;

	function __construct()
	{
		parent::__construct();
		if($this->uri->segment(1)=='auth'){
		//	echo 'activetop';
		}
		if($this->uri->segment(2,'')=='login'){
		//	echo 'activeInner';
		}
	}
	
	function index()
	{

		$this->login();
	}
	
	/* Callback function */
	
	function username_check($username)
	{
		$result = $this->dx_auth->is_username_available($username);
		if ( ! $result)
		{
			$this->form_validation->set_message('username_check', 'Username already exist. Please choose another username.');
		}
				
		return $result;
	}

	function email_check($email)
	{
		//var_dump($email,$this->session->all_userdata());
		if(!($email == $this->dx_auth->userData('email'))){
			$result = $this->dx_auth->is_email_available($email);
			if ( ! $result)
			{
				$this->form_validation->set_message('email_check', 'Email is already used by another user. Please choose another email address.');
			}
		}else{
			$result = true;
		}


				
		return $result;
	}

	
	function recaptcha_check()
	{
		$result = $this->dx_auth->is_recaptcha_match();
		if ( ! $result)
		{
			$this->form_validation->set_message('recaptcha_check', 'Your confirmation code does not match the one in the image. Try again.');
		}
		
		return $result;
	}
	
	/* End of Callback function */
	
	
	function login()
	{
		if ( ! $this->dx_auth->is_logged_in())
		{
			$val = $this->form_validation;

			$sdas = crypt($this->dx_auth->_encode($this->input->post('password')));

			// Set form validation rules
			$val->set_rules('Usuario', 'Usuario', 'trim|required|xss_clean');
			$val->set_rules('Clave', 'Clave', 'trim|required|xss_clean');
			$val->set_rules('remember', 'Remember me', 'integer');

			// Set captcha rules if login attempts exceed max attempts in config
		/*	if ($this->dx_auth->is_max_login_attempts_exceeded())
			{
				$val->set_rules('captcha', 'Confirmation Code', 'trim|required|xss_clean|callback_captcha_check');
			}*/

				if ($this->dx_auth->is_max_login_attempts_exceeded())
			{
				// Set recaptcha rules.
				// IMPORTANT: Do not change 'recaptcha_response_field' because it's used by reCAPTCHA API,
				// This is because the limitation of reCAPTCHA, not DX Auth library
				$val->set_rules('recaptcha_response_field', 'Confirmation Code', 'trim|xss_clean|required|callback_recaptcha_check');
			}
			



			if ($val->run() AND $this->dx_auth->login($this->input->post('Usuario'), $this->input->post('Clave'), $this->input->post('remember')))
			{
				// Redirect to homepage
				//echo ' redirect(, location);';//redirect('', 'location');
				$response['redirect'] = 'usuario/preInscripcion/add';
				echo json_encode($response);
			}
			else
			{
				// Check if the user is failed logged in because user is banned user or not
				$response['redirect'] = FALSE;
				$response['error_msg'] = array('errorAll' => 'Usuario o Clave invalido' );
				$data['show_captcha'] = FALSE;
				if ($this->dx_auth->is_banned())
				{
					// Redirect to banned uri
					//$this->dx_auth->deny_access('banned');
					$response['userBlock'] = $data['show_captcha'];
				}
				else
				{
					// Default is we don't show captcha until max login attempts eceeded
					
				
					// Show captcha if login attempts exceed max attempts in config
					if ($this->dx_auth->is_max_login_attempts_exceeded())
					{
						// Create catpcha						
						//$this->dx_auth->captcha();
						//$catpcha = $this->dx_auth->get_recaptcha_html();					
						// Set view data to show captcha on view file
						$data['show_captcha'] = TRUE;
					}
				
					//$this->load->view('plantilla',$datos_plantilla);
				//var_dump($data);
					//$this->load->view($this->dx_auth->login_view, $data);
					$response['show_captcha'] = $data['show_captcha'];
				if(!$this->input->is_ajax_request()){
					$base_url = base_url();
					$this->smarty->assign('base_url',$base_url);
					$this->smarty->assign('data',$data);
					$this->smarty->display('auth/login.tpl');
				}else{
				//	$response['error_msg'] = $val->error_array();
					//var_dump($response);
					echo json_encode($response);
				}

					
				}
			}
		}
		else
		{
			if(!$this->input->is_ajax_request()){
				redirect('/', 'refresh');	
			}else{
				$response['redirect'] = '/';
				echo json_encode($response);
			}
					
		}
	}
	
	function logout()
	{
		$this->dx_auth->logout();
		
		$data['auth_message'] = 'Gracias por visitarnos, Feliz Día.';		
		$this->load->view($this->dx_auth->logout_view, $data);
	}
	
	
	function register()
	{
		if ( ! $this->dx_auth->is_logged_in() AND $this->dx_auth->allow_registration)
		{	
			$val = $this->form_validation;
			
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
				// Load registration page
				//$this->load->view('auth/register_form');
				$datos_plantilla['contenido'] = 'auth/register_form';
				$this->load->view('plantilla',$datos_plantilla);
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
	
	function activate()
	{
		// Get username and key
		$username = $this->uri->segment(3);
		$key = $this->uri->segment(4);

		// Activate user
		if ($this->dx_auth->activate($username, $key)) 
		{
			$data['auth_message'] = 'Your account have been successfully activated. '.anchor(site_url($this->dx_auth->login_uri), 'Login');
			$this->load->view($this->dx_auth->activate_success_view, $data);
		}
		else
		{
			$data['auth_message'] = 'The activation code you entered was incorrect. Please check your email again.';
			$this->load->view($this->dx_auth->activate_failed_view, $data);
		}
	}
	
	function forgot_password()
	{
		$val = $this->form_validation;
		
		// Set form validation rules
		$val->set_rules('login', 'Username or Email address', 'trim|required|xss_clean');

		// Validate rules and call forgot password function
		if ($val->run() AND $this->dx_auth->forgot_password($val->set_value('login')))
		{
			//$data['auth_message'] = 'An email has been sent to your email with instructions with how to activate your new password.';
		
				$response['success'] = FALSE;
				$response['message'] = 'Un correo electrónico ha sido enviada a su correo electrónico con instrucciones de cómo activar con su nueva contraseña.';
				echo json_encode( $response );

			//$this->load->view($this->dx_auth->forgot_password_success_view, $data);

		}
		else
		{
			//$this->load->view($this->dx_auth->forgot_password_view);
				$response['success'] = FALSE;
				$response['message'] = 'Su solicitud de cambio de contraseña ya se ha enviado. Por favor revise su correo electrónico';
				echo json_encode( $response );
		}
	}
	
	function reset_password()
	{
		// Get username and key
		$username = $this->uri->segment(3);
		$key = $this->uri->segment(4);

		// Reset password
		if ($this->dx_auth->reset_password($username, $key))
		{
			$data['auth_message'] = 'You have successfully reset you password, '.anchor(site_url($this->dx_auth->login_uri), 'Login');
			$this->load->view($this->dx_auth->reset_password_success_view, $data);
		}
		else
		{
			$data['auth_message'] = 'Reset failed. Your username and key are incorrect. Please check your email again and follow the instructions.';
			$this->load->view($this->dx_auth->reset_password_failed_view, $data);
		}
	}
	
	function change_password()
	{
		// Check if user logged in or not
		if ($this->dx_auth->is_logged_in())
		{			
			$val = $this->form_validation;
			
			// Set form validation
			$val->set_rules('old_password', 'Old Password', 'trim|required|xss_clean|min_length['.$this->min_password.']|max_length['.$this->max_password.']');
			$val->set_rules('new_password', 'New Password', 'trim|required|xss_clean|min_length['.$this->min_password.']|max_length['.$this->max_password.']|matches[confirm_new_password]');
			$val->set_rules('confirm_new_password', 'Confirm new Password', 'trim|required|xss_clean');
			
			// Validate rules and change password
			if ($val->run() AND $this->dx_auth->change_password($val->set_value('old_password'), $val->set_value('new_password')))
			{
				$data['auth_message'] = 'Your password has successfully been changed.';
				$this->load->view($this->dx_auth->change_password_success_view, $data);
			}
			else
			{
				$datos_plantilla['contenido'] = $this->dx_auth->change_password_view;
				$this->load->view('plantilla',$datos_plantilla);
				//$this->load->view();
			}
		}
		else
		{
			// Redirect to login page
			$this->dx_auth->deny_access('login');
		}
	}	
	
	function cancel_account()
	{
		// Check if user logged in or not
		if ($this->dx_auth->is_logged_in())
		{			
			$val = $this->form_validation;
			
			// Set form validation rules
			$val->set_rules('password', 'Password', "trim|required|xss_clean");
			
			// Validate rules and change password
			if ($val->run() AND $this->dx_auth->cancel_account($val->set_value('password')))
			{
				// Redirect to homepage
				redirect('', 'location');
			}
			else
			{
				$datos_plantilla['contenido'] = $this->dx_auth->cancel_account_view;
				$this->load->view('plantilla',$datos_plantilla);
				//$this->load->view($this->dx_auth->cancel_account_view);
			}
		}
		else
		{
			// Redirect to login page
			$this->dx_auth->deny_access('login');
		}
	}

	// Example how to get permissions you set permission in /backend/custom_permissions/
	function custom_permissions()
	{
		if ($this->dx_auth->is_logged_in())
		{
			echo 'My role: '.$this->dx_auth->get_role_name().'<br/>';
			echo 'My permission: <br/>';
			
			if ($this->dx_auth->get_permission_value('edit') != NULL AND $this->dx_auth->get_permission_value('edit'))
			{
				echo 'Edit is allowed';
			}
			else
			{
				echo 'Edit is not allowed';
			}
			
			echo '<br/>';
			
			if ($this->dx_auth->get_permission_value('delete') != NULL AND $this->dx_auth->get_permission_value('delete'))
			{
				echo 'Delete is allowed';
			}
			else
			{
				echo 'Delete is not allowed';
			}
		}
	}


	function edit(){

		$id = $this->dx_auth->get_user_id();

		$this->load->model('dx_auth/users', 'users');		
		$val = $this->form_validation;	


		if($this->input->post()){		
			// Set form validation rules
			//var_dump($this->input->post('password',true));
			if ($this->input->post('password',true)) {
				$val->set_rules('password', 'Password', 'trim|required|xss_clean|min_length['.$this->min_password.']|max_length['.$this->max_password.']|matches[confirm_password]');
				$val->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean');

			}

			$dataNotInsert = array('password','confirmpassword','submit');
			$val->set_rules('name', 'name', 'trim|required');
			$val->set_rules('last_name', 'Apellido', 'trim|required');
			$val->set_rules('email', 'email', 'trim|required|xss_clean|valid_email|callback_email_check');
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
			//$this->load->view('backend/editUser', $user);
			$datos_plantilla['data'] = $user;
			$datos_plantilla['contenido'] = 'backend/editUser';
			$this->load->view('plantilla',$datos_plantilla);
	 	}else{
				$data['auth_message'] = 'You have successfully registered. '.anchor(site_url($this->dx_auth->login_uri), 'Login');
				// Load registration success page
				//$this->load->view($this->dx_auth->register_success_view, $data);
								// Load registration success page
				$datos_plantilla['data'] = $data;
				$datos_plantilla['contenido'] = $this->dx_auth->register_success_view;
				$this->load->view('plantilla',$datos_plantilla);
	 	}
	}





}
?>