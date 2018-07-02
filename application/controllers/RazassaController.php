<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RazassaController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array( "Common_model" => "Common_model"));
        $this->load->library('session');
    }

    

    public function addRazassa() {
        
        $this->load->view('addRazassa');
    }

    public function saveRazassa() {
        
        if (isset($_POST['id'])) {
            $data = array(
                'name' => $_POST['name'],
                
                
            );
           
           
            $this->Common_model->updateFromArray('tbl_razassa', $data, array('id' => $_POST['id']));
            $this->session->set_flashdata('message', "Razassa Updated By You.");
        } else {
            $data = array(
                'name' => $_POST['name'],
                
            );
            $this->Common_model->saveTableDataByArray('tbl_razassa', $data);
            $this->session->set_flashdata('message', "New Razassa Created By You.");
        }
        redirect(base_url('admin/getRazassaList'));
    }

    

    public function getRazassaList() {
       
        
        $final_result['razassaList'] = $this->Common_model->getTableAllData('tbl_razassa');
       
        $this->load->view('RazassaList', $final_result);
    }

    public function editRazassa() {
        $data['razassa'] = $modifiedBy = $this->Common_model->getTableDataByArrayRow('tbl_razassa', array('id' => $_GET['id']));
        $data['edit'] = TRUE;
        $this->load->view('addRazassa', $data);
    }

    public function deleteRazassa() {
       
       
       $this->db->query('delete from tbl_razassa where id ='.$_GET['id'].'');
        $this->session->set_flashdata('message', "Razassa Deleted By You.");
        redirect(base_url('admin/getRazassaList'));
    }

}
