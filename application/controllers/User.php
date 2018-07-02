<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array("User_model" => "User_model", "Common_model" => "Common_model"));
        $this->load->library('session');
    }

    public function checkLogin() {
        if (!$this->session->has_userdata('user_session')) {
            redirect(base_url('login'));
        }
    }

    public function authenticate() {
        $result = $this->User_model->loginfunctioncheck($_POST);
        if ($result) {
            $this->session->set_userdata('user_session', $result);
            redirect(base_url());
        } else {
            $this->session->set_flashdata('loginFailed', 'Email or Password Does Not Match');
            redirect(base_url('login'));
        }
    }

    public function logout() {
        $this->session->unset_userdata('user_session');
        redirect(base_url('login'));
    }

    public function userProfile() {
        $this->checkLogin();
        $data['userInfo'] = $this->Common_model->getResuqltByQuery('select * from users where id="' . $this->session->userdata('user_session')['id'] . '"');

        $this->load->view('userProfile', $data);
    }

    public function checkUniqEmail() {
        $this->checkLogin();
        $result = $this->Common_model->getTableDataByArray('users', $_POST);
        if ($result) {
            echo json_encode(array("status" => true));
        } else {
            echo json_encode(array("status" => false));
        }
    }

    public function checkUniqUserName() {
        $this->checkLogin();
        $result = $this->Common_model->getTableDataByArray('users', $_POST);
        if ($result) {
            echo json_encode(array("status" => true));
        } else {
            echo json_encode(array("status" => false));
        }
    }

    public function updateUserInfo() {
        $this->checkLogin();
        $data = array(
            'email' => $_POST['email'],
            'full_name' => $_POST['full_name'],
            'phone' => $_POST['phone'],
            'modified_by' => $this->session->userdata('user_session')['id'],
            'modified_date' => date('y-m-d H:i:s')
        );
        if (isset($_POST['password']) && !empty($_POST['password'])) {
            $data = array_merge($data, array('password' => md5($_POST['password'])));
        }
        if (isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name'])) {

            move_uploaded_file($_FILES['image']['tmp_name'], str_replace('\application', "", APPPATH . 'images/users/' . $this->session->userdata('user_session')['username'] . '.png'));

            $data = array_merge($data, array('image' => $this->session->userdata('user_session')['username'] . '.png'));
        }

        $this->Common_model->updateFromArray('users', $data, array('id' => $this->session->userdata('user_session')['id']));

        $this->session->set_flashdata('message', 'You Profile Information Hass Been Updated.');
        redirect(base_url('logout'));
    }

    public function addUsers() {
        $this->checkLogin();
        $this->load->view('addUser');
    }

    public function createUser() {
        $this->checkLogin();
        $data = array(
            'full_name' => $_POST['full_name'],
            'phone' => $_POST['phone'],
            'status' => (int) $_POST['status'],
            'user_role' => (int) $_POST['user_role'],
            'gender'=>(int)$_POST['gender']
        );
        
        
        if (isset($_POST['id']) && $_POST['id']) {
            $extraforupdate = array(
            'modified_by' => $this->session->userdata('user_session')['id'],
            'modified_date' => date('y-m-d H:i:s'),
        );
            $data = array_merge($data, $extraforupdate);
        } else {
            $extraforInsert = array(
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => md5($_POST['password']),
            'created_by' => $this->session->userdata('user_session')['id'],
            'created_date' => date('y-m-d H:i:s'),
        );
            $data = array_merge($data, $extraforInsert);
        }
        if (isset($_POST['is_userCreation_permit'])) {
            $data = array_merge($data, array('is_userCreation_permit' => 1));
        }
        if (isset($_POST['is_cat_permit'])) {
            $data = array_merge($data, array('is_cat_permit' => 1));
        }
        if (isset($_POST['is_subcat_permit'])) {
            $data = array_merge($data, array('is_subcat_permit' => 1));
        }
        if (isset($_POST['is_que_permit'])) {
            $data = array_merge($data, array('is_que_permit' => 1));
        }
        if (isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name'])) {
            
            if($_FILES['image']['type']='image/jpeg' || $_FILES['image']['type']='image/png' || $_FILES['image']['type']='image/gif'){
            move_uploaded_file($_FILES['image']['tmp_name'], str_replace('\application', "", APPPATH . 'images/users/' . $_POST['username'] . '.png'));
            
    
            }else{
                $this->session->set_flashdata('error', 'Please upload only png or jpeg or gif');
                redirect(base_url('getUserList'));
            }
            
            $data = array_merge($data, array('image' => $_POST['username'] . '.png'));
        }

        if (isset($_POST['id']) && $_POST['id']) {
            $this->Common_model->updateFromArray('users', $data, array('id' => $_POST['id']));

            $this->session->set_flashdata('message', 'The User Has Been Updated By You.');
        } else {
            $this->Common_model->saveTableDataByArray('users', $data);

            $this->session->set_flashdata('message', 'New User has been Created By You.');
        }


        redirect(base_url('getUserList'));
    }

    function getUserList() {
        $result = $this->Common_model->getTableDataByArray('users', array('user_role>' => $this->session->userdata('user_session')['user_role']));


        foreach ($result as $key => $value) {
            $value['creatorInfo'] = $this->Common_model->getTableDataByArrayRow('users', array('id' => $value['created_by']));
            $value['modificatorInfo'] = $this->Common_model->getTableDataByArrayRow('users', array('id' => $value['modified_by']));

            $final[] = $value;
        }
        if (isset($final) && !empty($final)) {
            $data['listUser'] = $final;
        } else {
            $data['listUser'] = NULL;
        }
        $this->load->view('userList', $data);
    }

    function editUser() {
        $data['userInfo'] = $this->Common_model->getTableDataByArrayRow('users', array('id' => $_GET['id']));
        $data['edit'] = true;
        $this->load->view('addUser', $data);
    }

}
