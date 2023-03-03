<?php 

class DoctorController extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('CommonModel');
    }

    public function doctor(){

        $this->load->library('pagination');
        $config = [
                    'base_url' =>   base_url('doctor'),
                    'per_page' =>   2,
                    'total_rows'=>  $this->CommonModel->total_rows($tablename = 'appointments'),
                    
                ];

        $this->pagination->initialize($config);
        
        $limit = $config['per_page'];
        
        $offset = $this->uri->segment(2);
    
        if($this->session->userdata('user_id'))
        {  
            $usersdata = $this->CommonModel->get_all_pa_table_data($tablename ='appointments',$limit,$offset);

            if($usersdata)
            {   
                foreach($usersdata as $ud)
                {
                    $where = '(user_id = "'.$ud['user_id'].'")';
                    $getuserdetails = $this->CommonModel->get_pa_data($table='users',$where);
                    
                    $userfinaldata[] = array(
                                                'user_id'=>$getuserdetails['user_id'],
                                                'username'=>$getuserdetails['name'],
                                                'email'=>$getuserdetails['email'],
                                                'appo_no'=>$ud['appo_no'],
                                                'appo_title'=>$ud['appo_title'],
                                                'appo_date'=>$ud['appo_date'],
                                                'appo_time'=>$ud['appo_time'],
                                                'status'=>$ud['status'],
                                                'offset'=>$offset,
                                             );                           
                }
            }
            $data['appointments'] = $userfinaldata;
       
            $this->load->view('DoctorViewAppointment',$data);

        }else
        {
            redirect(base_url('login'));
        }
    }

    public function Change_st()
    {   
          if(isset($_POST['user_id']))
          {  
            $user_id = $_POST['user_id'];
            $appo_no = $_POST['appo_no'];
            $status = $_POST['st_flag'];

            $where = '(user_id = "'.$user_id.'" AND appo_no = "'.$appo_no.'" )';
            $status = array('status'=>$status);
            $updatestatus = $this->CommonModel->edit_data($tablename='appointments',$where,$status);
            if($updatestatus)
                echo "success";
            else
                echo "failure";
          }   
    }
}

?>