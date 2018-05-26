<?php

class Dashboard extends CI_Controller {

    public $pagination = "";

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('subscription_m');
        $this->load->model('dashboard_m');
        $this->load->library('pagination');
    }
    /* old index */
    // function index() {
    //     $login_id = $this->session->userdata('usr_session');
    //     if ($login_id) {
    //         $limit = 5;
    //         $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3) : 0);
    //         $this->load->model('dashboard_m');
    //         $config['base_url'] = base_url() . "dashboard/index";
    //         $total_row = $this->dashboard_m->today_registration_count();
    //         $config['total_rows'] = $total_row[0]->count; //$this->db->query($qry)->num_rows();
    //         $config['uri_segment'] = 3;
    //         $config['per_page'] = $limit;
    //         $config['num_links'] = 2;
    //         $config['full_tag_open'] = '<div id="pagination">';
    //         $config['full_tag_close'] = '</div>';
    //         $this->session->unset_userdata('count', $offset);
    //         $this->session->set_userdata('count', $offset);
    //         $this->pagination->initialize($config);
    //         $this->load->model('dashboard_m');
    //         $result['result_per_page'] = $this->dashboard_m->get_daily_subscription_adm($limit, $offset);
    //         $this->load->view("dashboard",$result);
    //     } else {
    //         $this->session->set_userdata("redirect", $_SERVER['REQUEST_URI']);
    //         redirect('signin', 'refresh');
    //     }
    // }

    function index() {
        $login_id = $this->session->userdata('usr_session');
        if ($login_id) {
         $userSubscriptionId = $login_id[0]->subscription_id;
         $this->load->model('dashboard_m');
         $result['dashboardSub'] = $this->dashboard_m->getUserDashboardSub($userSubscriptionId);
            // print_r($result);
         $this->load->view("dashboard",$result);
     } else {
        $this->session->set_userdata("redirect", $_SERVER['REQUEST_URI']);
        redirect('signin', 'refresh');
    }
}

function subjectContents(){
        // $login_id = $this->session->userdata('usr_session');
        // if ($login_id) {
        //    $userSubscriptionId = $login_id[0]->subscription_id;
 $subjectId = $this->uri->slash_segment(3);
 $this->load->model('dashboard_m');
 $result['chaptersList'] = $this->dashboard_m->listChapters($subjectId);
            // print_r($result);
 $this->load->view('listChapters',$result);
        // } else {
        //     $this->session->set_userdata("redirect", $_SERVER['REQUEST_URI']);
        //     redirect('signin', 'refresh');
        // }    
}

function chapterContents(){
    $login_id = $this->session->userdata('usr_session');
    if ($login_id) {
     $userSubscriptionId = $login_id[0]->subscription_id;
     $chapterId = $this->uri->slash_segment(3);
     $chapterId = str_replace('/', '', $chapterId);
     $this->load->model('dashboard_m');
     $result['topicList'] = $this->dashboard_m->listTopics($userSubscriptionId, $chapterId);
            // print_r($result);
            // print_r($userSubscriptionId."-".$chapterId);
     $this->load->view('listTopics',$result);
 } else {
    $this->session->set_userdata("redirect", $_SERVER['REQUEST_URI']);
    redirect('signin', 'refresh');
}    
}

function quesSet(){
    $login_id = $this->session->userdata('usr_session');
    if ($login_id) {
        $userSubscriptionId = $login_id[0]->subscription_id;
        $chapterId = $this->uri->slash_segment(3);
        $this->load->model('dashboard_m');
        $result['a'] = $this->dashboard_m->listUserQuesSet($userSubscriptionId,$chapterId);
            // print_r($result);
        $this->load->view('listQuesSet',$result);
    }
    else {
        $this->session->set_userdata("redirect", $_SERVER['REQUEST_URI']);
        redirect('signin', 'refresh');
    }
}

function notes(){
   $login_id = $this->session->userdata('usr_session');
   if ($login_id) {
    $userSubscriptionId = $login_id[0]->subscription_id;
    $topicId = $this->uri->slash_segment(3);
    $this->load->model('dashboard_m');
    $result['a'] = $this->dashboard_m->listUserNotes($userSubscriptionId,$topicId);
                // print_r($result);
    $this->load->view('listUserNotes',$result);
}
else {
    $this->session->set_userdata("redirect", $_SERVER['REQUEST_URI']);
    redirect('signin', 'refresh');
}
}

function videos(){
    $login_id = $this->session->userdata('usr_session');
    if ($login_id) {
        $userSubscriptionId = $login_id[0]->subscription_id;
        $topicId = $this->uri->slash_segment(3);
        $this->load->model('dashboard_m');
        $result['a'] = $this->dashboard_m->listUserVideos($userSubscriptionId,$topicId);
            // print_r($result);
        $this->load->view('listUserVideos',$result);
    }
    else {
        $this->session->set_userdata("redirect", $_SERVER['REQUEST_URI']);
        redirect('signin', 'refresh');
    }
}

function userProfile() {
    $login_id = $this->session->userdata('usr_session');
    if ($login_id) {     
        $this->load->model('dashboard_m');
        $loginid = $this->session->userdata('usr_session');
        $userid = $loginid[0]->userid;
        $userdata = $this->dashboard_m->get_admin_user_details($userid);
        $array['g'] = array($userdata);
        // print_r($array);
        $this->load->view("user_profile", $array);
    } else {
        $this->session->set_userdata("redirect", $_SERVER['REQUEST_URI']);
        redirect('signin', 'refresh');
    }
}

}

?>