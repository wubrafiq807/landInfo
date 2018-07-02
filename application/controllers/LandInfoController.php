<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LandInfoController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array("Common_model" => "Common_model"));
        $this->load->library('session');
    }

    public function addLandInfo() {
        $final_result['razassaList'] = $this->Common_model->getTableAllData('tbl_razassa');
        $final_result['unionList'] = $this->Common_model->getTableAllData('tbl_union');
        $this->load->view('addLandInfo', $final_result);
    }

    public function saveLandInfo() {

        if (isset($_POST['id'])) {
            $this->Common_model->updateFromArray('tbl_info', $_POST, array('id' => $_POST['id']));
            $this->session->set_flashdata('message', "Info Updated By You.");
        } else {

            $this->Common_model->saveTableDataByArray('tbl_info', $_POST);
            $this->session->set_flashdata('message', "New Info Created By You.");
        }
        redirect(base_url('admin/getLandInfoList'));
    }

    public function getLandInfoList() {


        $result = $this->Common_model->getTableAllData('tbl_info');
        foreach ($result as $value) {
            $final_result['landInfoList'][] = array(
                'id' => $value['id'],
                'name' => $value['name'],
                'amount' => $value['amount'],
                'union' => $this->Common_model->getTableDataByArrayRow('tbl_union', array('id' => $value['union_id']))['name'],
                'mouza' => $this->Common_model->getTableDataByArrayRow('tbl_mouza', array('id' => $value['mouza_id']))['name'],
                'razassa' => $this->Common_model->getTableDataByArrayRow('tbl_razassa', array('id' => $value['razassa_id']))['name'],
                'holding' => $this->Common_model->getTableDataByArrayRow('tbl_holding', array('id' => $value['holding_id']))['holding_no'],
            );
        }
        if (!isset($final_result['landInfoList'])) {
            $final_result['landInfoList'] = array();
        }

        $this->load->view('landInfoList', $final_result);
    }

    public function editLandInfo() {
        $data['landInfo'] = $this->Common_model->getTableDataByArrayRow('tbl_info', array('id' => $_GET['id']));
        $data['edit'] = TRUE;
        $data['mouzaList'] = $this->Common_model->getTableAllData('tbl_mouza');
        $data['unionList'] = $this->Common_model->getTableAllData('tbl_union');
        $data['razassaList'] = $this->Common_model->getTableAllData('tbl_razassa');
        $data['holdingList'] = $this->Common_model->getTableAllData('tbl_holding');
        $this->load->view('addLandInfo', $data);
    }

    public function deleteLandInfo() {


        $this->db->query('delete from tbl_info where id =' . $_GET['id'] . '');
        $this->session->set_flashdata('message', "One Land Info Deleted By You.");
        redirect(base_url('admin/getLandInfoList'));
    }

    public function getMouzaListByUnion() {
        $final_result['mouzaList'] = $this->Common_model->getTableDataByArray('tbl_mouza', $_POST);
        echo json_encode($final_result);
    }

    public function getHoldingListByMouza() {
        $final_result['holdingList'] = $this->Common_model->getTableDataByArray('tbl_holding', $_POST);
        echo json_encode($final_result);
    }

    public function viewInfo() {
      $value=   $this->Common_model->getTableDataByArrayRow('tbl_info', $_GET);
     
        $data['info']=array(
                'id' => $value['id'],
                'name' => $value['name'],
                'amount' => $value['amount'],
                'union' => $this->Common_model->getTableDataByArrayRow('tbl_union', array('id' => $value['union_id']))['name'],
                'mouza' => $this->Common_model->getTableDataByArrayRow('tbl_mouza', array('id' => $value['mouza_id']))['name'],
                'razassa' => $this->Common_model->getTableDataByArrayRow('tbl_razassa', array('id' => $value['razassa_id']))['name'],
                'holding' => $this->Common_model->getTableDataByArrayRow('tbl_holding', array('id' => $value['holding_id']))['holding_no'],
            );
            $this->load->view('infoDetails',$data);
    }

}
