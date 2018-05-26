<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_m extends CI_Model
{

//    public $db = "";
    function __construct()
   {
       parent::__construct();
   }
    function get_admin_user_details($userid)
    {
     // $sql = "CALL sp_admin_get_user_details(?)";
      $sql = "CALL sp_get_user_profile_details(?)";
        $parameter = array($userid);
        $query = $this->db->query($sql,$parameter);
        $this->db->close();
        if($query)
        {
          return $query->result();
         
        }
        else
        {
            return Null;
        }
    }
    function getUserDashboardSub($userSubscriptionId)
    {
        $sql = 'CALL sp_get_dashboard_details_academy(?)';          
        $parameters = array($userSubscriptionId);
        $query = $this->db->query($sql, $parameters);
        $this->db->close();
        if ($query)
        {
            return $query->result();
        }
         else {
             return null;
         }
    }

    function listChapters($subjectId)
    {
        $sql = 'CALL sp_get_chapter_details_academy(?,?,?)';          
        $parameters = array(1,$subjectId,1);
        $query = $this->db->query($sql, $parameters);
        $this->db->close();
        if ($query)
        {
            return $query->result();
        }
         else {
             return null;
         }
    }
    function listTopics($userSubscriptionId, $chapterId)
    {
        $sql = 'SELECT topic_id topicId, topic_name topicName FROM vwsubjectchapterstopics where chapter_id = '.$chapterId.' and exam_id = '.$userSubscriptionId.';';          
        $query = $this->db->query($sql);
        $this->db->close();
        if ($query)
        {
            return $query->result();
        }
         else {
             return null;
         }
    }

    function listUserNotes($userSubscriptionId, $topicId)
    {
        $sql = 'CALL sp_get_user_notes_list(?,?,?,?)';          
        $parameters = array(1,1,$userSubscriptionId, $topicId);
        $query = $this->db->query($sql, $parameters);
        $this->db->close();
        if ($query)
        {
            return $query->result();
        }
         else {
             return null;
         }
    }

    function listUserVideos($userSubscriptionId, $topicId)
    {
        $sql = 'CALL sp_get_user_videos_list(?,?,?,?)';          
        $parameters = array(1,1,$userSubscriptionId, $topicId);
        $query = $this->db->query($sql, $parameters);
        $this->db->close();
        if ($query)
        {
            return $query->result();
        }
         else {
             return null;
         }
    }

    function listUserQuesSet($userSubscriptionId, $chapterId)
    {
        $sql = 'CALL sp_get_user_Ques_set_list(?,?,?,?)';          
        $parameters = array(1,1,$userSubscriptionId, $chapterId);
        $query = $this->db->query($sql, $parameters);
        $this->db->close();
        if ($query)
        {
            return $query->result();
        }
         else {
             return null;
         }
    }

    
}

?>
