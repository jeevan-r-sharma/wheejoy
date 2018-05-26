<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Subscription_m extends CI_Model {

    function __construct() {
            parent::__construct();
    }

    function edit_user_profile($userId, $firstName, $lastName, $phone, $emailId, $password, $g_value) {
            $sql = "call sp_admin_edit_user_profile(?,?,?,?,?,?,?)";
            $parameters = array($userId, $firstName, $lastName, $phone, $emailId, $password, $g_value);
            $query = $this->db->query($sql, $parameters);
            $this->db->close();
            if ($query) {
                return $query->result();
            } else {
                return null;
            }
    }    
    function checkUserEmailExist($readEmail) {
            $sql = "call sp_check_user_email_exist(?)";
            $parameters = array($readEmail);
            $query = $this->db->query($sql, $parameters);
            $this->db->close();
            if ($query) {
                return $query->result();
            } else {
                return null;
            }
    }
    function checkUserPhoneExist($readPhone) {
            $sql = "call sp_check_user_phone_exist(?)";
            $parameters = array($readPhone);
            $query = $this->db->query($sql, $parameters);
            $this->db->close();
            if ($query) {
                return $query->result();
            } else {
                return null;
            }
    }
    
}