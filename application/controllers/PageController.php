<?php
class PageController extends CI_controller
{
    public function login(){
        $this->load->view('LoginUser');
    }
    public function register(){
        $this->load->view('RegisterPatient');
    }

    public function chat()
    {
        $this->load->view('chat_page');
    }
    public function doctor()
    {
        if($this->session->userdata('user_id'))
        {   
           
            $this->load->view('DoctorViewAppointment');
        }else
        {
            redirect(base_url('login'));
        }
        
    }
    public function user_appointments()
    {
        if($this->session->userdata('user_id'))
        {  
            $user_id = $_SESSION['user_id']; 
            $this->load->model('CommonModel');
            $where = "(user_id ='$user_id')";
            $data['appointments'] = $this->CommonModel->get_all_data($tablename = 'appointments',$where);
            $this->load->view('AppointmentHistory',$data);
        }else
        {
            redirect(base_url('login'));
        }
    
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }

    public function user(){
        if($this->session->userdata('user_id'))
        {
            $this->load->view('UserPage');
        }else
        {
            redirect(base_url('login'));
        }
        
    }
    public function make_appointment(){
        if($this->session->userdata('user_id'))
        {
            $this->load->view('MakeAppointment');
        }else
        {
            redirect(base_url('login'));
        }  
    }
}

?>