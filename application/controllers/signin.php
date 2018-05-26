<?php

class signin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('user_login_m');
    }

    function index() {
		// $sess_data = $this->session->userdata('usr_session');
		// $user_id = $sess_data[0]->registration_no;
		// print_r($user_id);
		// if($user_id){
			// $this->load->view("dashboard");
		// }
		// else{
			$this->load->view("signin_v");
		// }
        
    }

    function checkInputs() {
            $userName = $_POST['user_name'];
            $userPassword = $_POST['password'];
            $imei = -1;
            $result = $this->user_login_m->user_login($userName, $userPassword, $imei);
        if ($result[0]->result_status == 1) {
            $this->session->unset_userdata('usr_session');
            $this->session->set_userdata('usr_session', $result);
            $redirect=($this->session->userdata('redirect')) ?  $this->session->userdata('redirect') :'';
            $response = array("status" => 1,"redirect" => "$redirect");
            echo json_encode($response);
        }    
    }

    function subscription_detail() {
        $session_data = $this->session->userdata('user_profile');
        $data = $session_data;
        $userid = $data['item']['userid'];
        if ($userid) {
            $session_id = 1;
            $json = $this->user_login_m->Subscriptiondetails_get($userid, $session_id);
            $array = json_decode($json);
            echo $array;
        } else
            redirect("SignIn", "Refresh");
    }

    function signOut() {
        $login_id = $this->session->userdata('login_id');
        $this->user_login_m->logout($login_id);
       $this->session->unset_userdata('redirect');
        $this->session->unset_userdata('usr_session');
        redirect("signin");
    }

    function update_user_details() {
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $user_id = $_POST['user_id'];
        $type = $_POST['type'];
        $imei = $_POST['imei'];
        $is_first_login = $_POST['is_first_login'];
        $phone = $_POST['phone'];
        if ($type == 3) {
            $this->user_login_m->update_user_details($user_id, $user_name, $password, $email, $first_name, $last_name, $imei, $is_first_login, $phone);
            $this->send_update_mail($user_name, $password, $email, $first_name);
        } else if ($type == 2) {
            $this->user_login_m->update_user_details($user_id, $user_name, $password, $email, $first_name, $last_name, $imei, $is_first_login, $phone);
            $response = $this->user_login_m->reset_user_password($email);
            $response = json_decode(json_encode($response), TRUE);
            $new_password = $response[0]['passwrd'];
            if ($response[0]['message'] == 'success') {
                $this->forgot_password($email, $user_name, $new_password);
            }
        } else if ($type == 1) {
            $activation_code = random_string('alnum', 16);
            $this->user_login_m->update_activation_link($user_id, $user_name, $password, $email, $first_name, $last_name, $activation_code, $imei, $is_first_login, $phone);
            $this->send_activation_link($first_name, $email, $activation_code);
        }
    }

    

    function forgot_password() {
        $email_id = $_POST['email'];
        $res = $this->user_login_m->reset_user_password($email_id);
        if ($res[0]->message == "success") {
            $user_name = $res[0]->user_name;
            $password = $res[0]->password;
            $From = $this->config->item('email');
            $To = $email_id;
            $Subject = "New Password For CET Success";
            $Message = "As per your request for your new password, we have sent you a new password for your account. In this email please find your new password details for your Smart IQ account. 
                        Your User name is $user_name 
                        Your new password is: $password                            
                        Please change your password soon after you login to your account with this password.
                        With SincereRegards & Cheers,
                        The Smart IQ team.
                        Happy Practising!";
            //------ To be included for every mail --------------//  
            $this->load->library('email');
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'mocha3001.mochahost.com';
            $config['smtp_port'] = '25';
            $config['smtp_timeout'] = '7';
            $config['smtp_user'] = 'contact@codefruxtechnology.com';
            $config['smtp_pass'] = 'contact123#';
            $config['charset'] = 'utf-8';
            $config['newline'] = "\r\n";
            $config['mailtype'] = 'text'; // or text
            $config['validation'] = TRUE; // bool whether to validate email or not   
            $this->email->initialize($config);
            //----------------------------------------------------//
            $this->email->from($From);
            $this->email->to($To);
            $this->email->subject($Subject);
            $this->email->message($Message);
            if ($this->email->send()) {
                echo "success";
            } else
                show_error($this->email->print_debugger());
        } else
            echo 'email failed';
    }

    
}

?>
