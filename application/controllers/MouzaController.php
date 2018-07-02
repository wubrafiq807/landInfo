<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MouzaController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array( "Common_model" => "Common_model"));
        $this->load->library('session');
    }

    

    public function addMouza() {
         $final_result['unionList'] = $this->Common_model->getTableAllData('tbl_union');
        $this->load->view('addMouza',$final_result);
    }

    public function saveMouza() {
        
        if (isset($_POST['id'])) {
            $data = array(
                'name' => $_POST['name'],
                'union_id'=>$_POST['union_id']
                
            );
           
           
            $this->Common_model->updateFromArray('tbl_mouza', $data, array('id' => $_POST['id']));
            $this->session->set_flashdata('message', "Mouza Updated By You.");
        } else {
            $data = array(
               'name' => $_POST['name'],
                'union_id'=>$_POST['union_id']
                
            );
            $this->Common_model->saveTableDataByArray('tbl_mouza', $data);
            $this->session->set_flashdata('message', "New Mouza Created By You.");
        }
        redirect(base_url('admin/getMouzaList'));
    }

    

    public function getMouzaList() {
       
        
        $final_result['mouzaList'] = $this->Common_model->getTableAllData('tbl_mouza');
       
        $this->load->view('mouzaList', $final_result);
    }

    public function editMouza() {
        $data['mouza'] = $modifiedBy = $this->Common_model->getTableDataByArrayRow('tbl_mouza', array('id' => $_GET['id']));
        $data['edit'] = TRUE;
         $data['unionList'] = $this->Common_model->getTableAllData('tbl_union');
         
        $this->load->view('addMouza', $data);
    }

    public function deleteUnion() {
       
       
       $this->db->query('delete from tbl_mouza where id ='.$_GET['id'].'');
        $this->session->set_flashdata('message', "Mouza Deleted By You.");
        redirect(base_url('admin/getMouzaList'));
    }

}
