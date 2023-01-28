<?php

class Messages extends Controller
{

    private $to_id_user; 

    public function __construct()
    {
       $this->to_id_user = $_SESSION['id_user']; 
       $this->messageModel = $this->model('Message');
    }

    public function get_messages() {
           
         $parents = $this->messageModel->user_teacher();

         $data = [

                 'parents' => $parents

                ];

         $this->view('teacher/messages/index', $data);
    }
  
     //Read all teacher 
    public function get_parent() {
        
        $teacher = $this->messageModel->user_parent(); 

        $data = [
              'teacher'  => $teacher
            ];

            $this->view('parent/messages/index', $data);
    }


    public function new_message() {

        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            
            
            $id = $_GET['id']; 
            $message_content = $_GET['message_content']; 

            $data = [
                'to_id_user' => $id, 
                'from_id_user' => $this->to_id_user, 
                'message_content' => $message_content, 
                'message_status' => "1"
            ];
            
            $message = $this->messageModel->new_message($data);

            return $message; 
        } 
    }

    public function get_all()
    {
        if($_SERVER['REQUEST_METHOD'] == 'GET') {

            $id = $_GET['id']; 

            $data = ['to_id_user' => $id,

                     'from_id_user' => $this->to_id_user 
                     ]; 
            
        $messages =  $this->messageModel->getAll($data);

        $data = [ 'messages' => $messages ]; 
        

        foreach($data['messages'] as $message) {
           
          if($message->to_id_user == $this->to_id_user){
              $status = $this->messageModel->update_status($message->id_messages);
              echo "<div class='incoming_msg'>"; 
              echo "<div class='received_msg message'>";
              echo "<div class='received_withd_msg'>";
              echo "<p>".$message->message_content."</p>";
              echo "<span class='time_date'>".$message->message_time."</span>";
              echo "</div>";
              echo "</div>"; 
              echo "</div>";     

          } else {
              
            echo "<div class='outgoing_msg message'>";
            echo "<div class='sent_msg'>"; 
            echo "<p>".$message->message_content."</p>"; 
            echo " <span class='time_date'>".$message->message_time."</span>";
            echo "</div>"; 
            echo "</div>";  
          }

         }
        }
    }

    public function get_msg()
    {
        if($_SERVER['REQUEST_METHOD'] == 'GET') {

            $id = $_GET['id']; 

            $data = [
                'to_id_user' => $this->to_id_user, 
                'from_id_user' => $id, 
                'message_status' => "1"
            ]; 

            $messages = $this->messageModel->getMessage($data); 

               $data = ['messages' => $messages]; 

               foreach($data['messages'] as $message) {
                
                echo "<div class='incoming_msg'>"; 
                echo "<div class='received_msg message'>";
                echo "<div class='received_withd_msg'>";
                echo "<p>".$message->message_content."</p>";
                echo "<span class='time_date'>".$message->message_time."</span>";
                echo "</div>";
                echo "</div>"; 
                echo "</div>"; 

                $status = $this->messageModel->update_status($message->id_messages); 
            }
        }
    }

    ///Message notification 
    public function notification()
    {
        $notificatione = $this->messageModel->notificatione(); 
        
       echo (int)$notificatione->number; 
       
    }
     //Count all messages 
    public function notificationAll()
    {
        $notificatione = $this->messageModel->notificationeAll(); 
        
       echo (int)$notificatione->number; 
       
    }
} 
