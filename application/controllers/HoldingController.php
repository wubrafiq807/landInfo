<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class HoldingController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array( "Common_model" => "Common_model"));
        $this->load->library('session');
    }

    

    public function addHolding() {
        $final_result['mouzaList'] = $this->Common_model->getTableAllData('tbl_mouza');
        $this->load->view('addHolding',$final_result);
    }

    public function saveHolding() {
        
        if (isset($_POST['id'])) {
            $data = array(
                'holding_no' => $_POST['holding_no'],
                'mouza_id'=>$_POST['mouza_id']
                
            );
           
           
            $this->Common_model->updateFromArray('tbl_holding', $data, array('id' => $_POST['id']));
            $this->session->set_flashdata('message', "Holding Updated By You.");
        } else {
            $data = array(
                'holding_no' => $_POST['holding_no'],
                'mouza_id'=>$_POST['mouza_id']
                
            );
            $this->Common_model->saveTableDataByArray('tbl_holding', $data);
            $this->session->set_flashdata('message', "New Holding Created By You.");
        }
        redirect(base_url('admin/getHoldingList'));
    }

    

    public function getHoldingList() {
       
        
        $final_result['holdingList'] = $this->Common_model->getTableAllData('tbl_holding');
       
        $this->load->view('holdingList', $final_result);
    }

    public function editHolding() {
        $data['holding'] = $this->Common_model->getTableDataByArrayRow('tbl_holding', array('id' => $_GET['id']));
        $data['edit'] = TRUE;
        $data['mouzaList'] = $this->Common_model->getTableAllData('tbl_mouza');
        $this->load->view('addHolding', $data);
    }

    public function deleteHolding() {
       
       
       $this->db->query('delete from tbl_holding where id ='.$_GET['id'].'');
        $this->session->set_flashdata('message', "Holding Deleted By You.");
        redirect(base_url('admin/getHoldingList'));
    }
public function checkUniqHolding() {
        
        $result = $this->Common_model->getTableDataByArray('tbl_holding', $_POST);
        
        if ($result) {
            echo json_encode(array("status" => true));
           
        } else {
           
            echo json_encode(array("status" => false));
           
        }
    }
}
