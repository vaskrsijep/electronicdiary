<?php

class Notifications extends Controller
{

  public function __construct()
  {
    $this->notificationModel = $this->model('Notification');
 
  }

  public function insert()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
        $data = [
          'notification_content' => trim($_POST['notification_content']),
    
          'notification_content_err' => '',
        ];


        if (empty($data['notification_content_err'])) {
           
            if ($this->notificationModel->insertNotification($data)) {
            
              flash('notification_message', 'Notification Added');
              redirect('notifications');
            } else {
              die('Something went wrong');
            }
          } else {
            
            $this->view('notification/insert', $data);
          }
        } else {
          $data = [
            'notification_content' => '',
          ];

    
          $this->view('admin/notification/insert', $data);
        }
      }



      public function edit($id){
        $notification = $this->notificationModel->getNotificationId($id);

        $data = [
            'notification' => $notification
            
        ];

        $this->view('admin/notification/edit', $data);
    }

         public function show($id)
         {
      
           $notification = $this->notificationModel()->getMessageById($id);
      
           $data = [
      
            'notification' => $notification
      
           ];
      
           $this->view();
         }

        public function index()
        {
          $notifications = $this->notificationModel->getMessage();
          $data = [
            'notifications' => $notifications
          ];
          $this->view('admin/notification/index', $data);

        }


        public function delete($id){
          if($_SERVER['REQUEST_METHOD'] == 'POST') {
              if($this->notificationModel->deleteNotification($id)) {
                  flash('notification_deleted_msg', 'Notification Deleted');
                  redirect('notifications');
              } else {
                  die('Something went wrong');
              }
          } else {
              redirect('pages');
          }
      }

      public function update(){

      
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'notification_content' => trim($_POST['notification_content']),
                'id_parent_notification' => trim($_POST['id_parent_notification']),

                'notification_content_err' => ''
            ];


        // Validate for notification_content
        if(empty($data['notification_content'])) {
            $data['notification_content_err'] = 'Please enter a notification';
        }

        if(empty($data['notification_content_err'])) {
            if($this->notificationModel->update($data)) {
                flash('notification_updated', 'Notification Updated');
                redirect('notifications');
            } else {
                die('Something went wrong');
            }
        } else {
            $this->view('admin/notification/update', $data);
        }

        }
    }
    
    public function parent(){
      
      $notifications = $this->notificationModel->getMessage();
      $data = [
        'notifications' => $notifications
      ];
      $this->view('parent/notification/index', $data);

    }
          
    }
  
  
  

