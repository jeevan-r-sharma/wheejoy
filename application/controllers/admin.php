<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
include ('Classes/PHPExcel/IOFactory.php');

class admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('subscription_m');
        $this->load->library('pagination');
    }

    function editUserProfile() {
        $userId = $_POST['userId'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $phone = $_POST['phone'];
        $emailId = $_POST['emailId'];
        $password = $_POST['password'];
        $g_value = $_POST['g_value'];
        $this->load->model("subscription_m");
        $array = $this->subscription_m->edit_user_profile($userId, $firstName, $lastName, $phone, $emailId, $password, $g_value);
        $json = json_encode($array);
        echo $json;
    }    

    function checkUserEmailExist() {
        $readEmail = $_POST['readEmail'];
        $this->load->model("subscription_m");
        $array = $this->subscription_m->checkUserEmailExist($readEmail);
        $json = json_encode($array);
        echo $json;
    }

    function checkUserPhoneExist() {
        $readPhone = $_POST['readPhone'];
        $this->load->model("subscription_m");
        $array = $this->subscription_m->checkUserPhoneExist($readPhone);
        $json = json_encode($array);
        echo $json;
    }
}
?>