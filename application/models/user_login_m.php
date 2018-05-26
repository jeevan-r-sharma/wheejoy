<?php
Class user_login_m extends CI_Model
{
     function __construct()
   {
       parent::__construct();
        //connect to database
        $this->load->database();
   }
     function user_login($userName, $userPassword, $imei)   //same as API
        {
          $qry = 'call sp_user_login_academy(?,?,?)';
          $parameters = array($userName, $userPassword, $imei);
          $result = $this->db->query($qry, $parameters);
          $this->db->close();
          if ($result) {
             return  $result->result();
        }
		else {
            return 1;
        }
        }
    
        function verify_user($user_id)
    {
        $sql = 'CALL sp_verify_user(?)';          
        $parameters = array($user_id);
        //print_r($parameters);
        $query = $this->db->query($sql, $parameters);
        if ($query)
        {
            
             return $query->result();
            //print_r($query->result());
        }
         else {
             return null;
         }
    }
    function logout($login_id)
    {
        $sql = 'call sp_admin_logout(?)';
         $parameters = array($login_id);
        //print_r($parameters);
        $query = $this->db->query($sql, $parameters);
        if ($query)
        {
            
             return $query->result();
            //print_r($query->result());
        }
         else {
             return null;
         }
        
    }
    
    function update_user_details($user_id,$user_name,$password,$email,$first_name,$last_name,$imei,$is_first_login,$phone)
    {
        $sql = 'call sp_update_user_data(?,?,?,?,?,?,?,?,?)';
        $parameters = array($user_id,$user_name,$password,$email,$first_name,$last_name,$imei,$is_first_login,$phone);
        $query = $this->db->query($sql, $parameters);
        if ($query)
        {
            return $query->result();
        }
    }
    
    function update_activation_link($user_id,$user_name,$password,$email,$first_name,$last_name,$activation_code,$imei,$is_first_login,$phone)
    {
        $sql = 'call sp_update_activation_link(?,?,?,?,?,?,?,?,?,?)';
        $parameters = array($user_id,$user_name,$password,$email,$first_name,$last_name,$activation_code,$imei,$is_first_login,$phone);
        $query = $this->db->query($sql, $parameters);
        if ($query)
        {
            return $query->result();
        }
    }
    
    function reset_user_password($email_id)
    {
        $sql = 'CALL sp_admin_reset_password(?)';
        $parameters = array($email_id);
        $query = $this->db->query($sql, $parameters);
        if ($query)
        {
            if ($query->num_rows >0)
            {
                 return $query->result();
            }
            else {
            $data_array[] = array(
                    'message'=>'No Records Found',
                    'result_status'=>'0'
                    );
        } 
         return $data_array;
      }
       else {  $data_array[] = array(
                    'message'=>'Something went wrong!',
                    'result_status'=>'0'
                    );}
     }
   
}
