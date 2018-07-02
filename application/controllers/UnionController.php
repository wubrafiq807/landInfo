<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UnionController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array( "Common_model" => "Common_model"));
        $this->load->library('session');
    }

    

    public function addUnion() {
        
        $this->load->view('addUnion');
    }

    public function saveUnion() {
        
        if (isset($_POST['id'])) {
            $data = array(
                'name' => $_POST['name'],
                
                
            );
           
           
            $this->Common_model->updateFromArray('tbl_union', $data, array('id' => $_POST['id']));
            $this->session->set_flashdata('message', "Union Updated By You.");
        } else {
            $data = array(
                'name' => $_POST['name'],
                
            );
            $this->Common_model->saveTableDataByArray('tbl_union', $data);
            $this->session->set_flashdata('message', "New Union Created By You.");
        }
        redirect(base_url('admin/getUnionList'));
    }

    

    public function getUnionList() {
       
        
        $final_result['unionList'] = $this->Common_model->getTableAllData('tbl_union');
       
        $this->load->view('unionList', $final_result);
    }

    public function editUnion() {
        $data['union'] = $modifiedBy = $this->Common_model->getTableDataByArrayRow('tbl_union', array('id' => $_GET['id']));
        $data['edit'] = TRUE;
        $this->load->view('addUnion', $data);
    }

    public function deleteUnion() {
       
       
       $this->db->query('delete from tbl_union where id ='.$_GET['id'].'');
        $this->session->set_flashdata('message', "Union Deleted By You.");
        redirect(base_url('admin/getUnionList'));
    }

}
