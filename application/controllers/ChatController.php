<?php 

class ChatController extends CI_controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ChatModel');
    }

    public function chat_page()
    {    

        if($this->session->userdata('user_id'))
        {   
            $receiver_id=$this->uri->segment(2);
            $receiver['receiver'] =$receiver_id;
            
            $this->load->view('chat_page',$receiver);
            
        }else
        {
            redirect(base_url('login'));
        }
           
    }

    public function load_chat()
    {   
        if($this->session->userdata('user_id'))
        {  
            $receiver_id = $_POST['receiver'];
            $user_id = $_SESSION['user_id'];
          
            $where =  '(sender_id="'.$user_id.'" AND receiver_id= "'.$receiver_id.'" OR sender_id="'.$receiver_id.'" AND receiver_id= "'.$user_id.'")';
            
            $chats =  $this->ChatModel->get_all_chats($tablename='chat_messeges',$where);   
           
            foreach($chats as $chat)
            {  
                if($user_id == $chat['sender_id']){

                    ?>
                    <div style ="text-align:end;">
                        <div>
                            <span style="border-radius: 15px;background-color: rgba(57, 192, 237,.2);padding:10px;padding:bottom:30px;" >
                              <?php echo $chat['chat_text']; ?>
                            </span>
                        </div>
                        <div>
                            <span style="font-size: 12px;padding-right: 12px;">
                                <?php $time =$chat['time']; echo date("g:i a", strtotime($time)); ?>
                            </span>
                        </div>
                    </div>
                        <div>
                            <br/>
                        </div>
                <?php }
                else if($user_id == $chat['receiver_id'])
                { 
                    ?>
                    <div style ="text-align:start;">
                        <div>
                            <span style="border-radius: 15px;background-color: rgb(18 19 19 / 20%);padding:10px;padding:bottom:30px;" >
                              <?php echo $chat['chat_text']; ?>
                            </span>
                        </div>
                        <div>
                            <span style="font-size: 12px;padding-left: 10px;">
                                <?php $time =$chat['time']; echo date("g:i a", strtotime($time)); ?>
                            </span>
                        </div>
                    </div>  
                    
                    <div>
                        <br/>
                    </div>
            <?php }
            }
        }else
        {
            redirect(base_url('login'));
        }
    }

    public function send_chat()
    {   
        $receiver_id = $_POST['receiver'];
       
        if(isset($_POST['messege']))
            $messege = $_POST['messege']; 
        else
            $messege = '';

        date_default_timezone_set('Asia/Calcutta'); 
        $now = date('Y-m-d');
        $nowtime = date('H:i:s');
        $user_id = $_SESSION['user_id'];
        
        $insertarray = array(
                            'sender_id' => $user_id,
                            'receiver_id' => $receiver_id,
                            'chat_text' => $messege,
                            'date' => $now,
                            'time'=>$nowtime,
                            );
        
        $insert_id = $this->ChatModel->insert_chat($table='chat_messeges',$insertarray);
        echo "messege sent successfully! ";
    }

}

?>