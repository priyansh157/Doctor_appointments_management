<?php 

class PatientController extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('CommonModel');
    }

   public function login_form(){
       
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required');

        if($this->form_validation->run() == false){
            redirect(base_url('login'));
        }else
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            
            $where = '(email="'.$email.'" AND password= "'.$password.'")';
            $user = $this->CommonModel->get_data($tablename= 'users',$where);
          
            if($user)
            {  
                $usersession=array(
                                        'user_id'=>$user['user_id'],
                                        'user_email'=>$user['email'],
                                        'user_name' =>$user['name'],
                                        'user_type' =>$user['user_type'],
                                    );    
                $this->session->set_userdata($usersession);
                
                $this->session->set_tempdata('success','Login successfull! ',5);

                if($user['user_type']=="patient")
                {
                    redirect(base_url('user'));
                }else
                {
                    redirect(base_url('doctor'));
                }
                
            }else
            { 
                $this->session->set_tempdata('failure','Incorrect credentials',5);
                redirect(base_url('login'));
            }
        } 
   }

   public function register_form(){
      
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required');

        if($this->form_validation->run() == false)
        {
            redirect(base_url('register'));
        }
        else
        {   
            $username = $this->input->post('name');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            
            $insertarray = array(
                                    'name'=> $username,
                                    'email'=> $email,
                                    'user_type'=>"patient",
                                    'password'=> $password
                                );
            $insert_id = $this->CommonModel->insert_data($table='users', $insertarray);

            if($insert_id)
            {
                $this->session->set_tempdata('success','Registration succesfull, Please login',5);
                redirect(base_url('login'));
            }else
            {   
                $this->session->set_tempdata('failure','Something went wrong',5);
                redirect(base_url('register'));
            }
        }
   }

   public function appointment_form(){

        $user_id = $_SESSION['user_id'];
        $email = $_SESSION['user_email'];
        $appo_date = $this->input->post('date');
        $appo_time = $this->input->post('time');
        $appo_title = $this->input->post('title');
        $insertarray = array(
                        'user_id'=>$user_id,
                        'appo_date'=> $appo_date,
                        'appo_time'=> $appo_time,
                        'email'=> $email,
                        'appo_title' =>$appo_title
                        );
        
        $user_id = $this->CommonModel->insert_data($tablename='appointments', $insertarray);
        
        redirect(base_url('appointments'));

   }

}

?>