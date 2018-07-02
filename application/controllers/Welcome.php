<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    function __construct() {
        parent::__construct();
        $this->load->model(array("User_model" => "User_model", "Common_model" => "Common_model", "Category_model" => "Category_model"));
        $this->load->library('session');
    }

    public function checkLogin() {
        if (!$this->session->has_userdata('user_session')) {
            redirect(base_url('login'));
        }
    }

    public function admin() {


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

    function array_multi_unique($multiArray) {

        $uniqueArray = array();

        foreach ($multiArray as $subArray) {

            if (!in_array($subArray, $uniqueArray)) {
                $uniqueArray[] = $subArray;
            }
        }
        return $uniqueArray;
    }

    public function index() {
        if (isset($_POST['holding_no'])) {
            $resultHolding = $this->Common_model->getTableDataByArray(' tbl_holding', array('holding_no' => $_POST['holding_no']));
            // $myarry[] = array();
            foreach ($resultHolding as $keyHolding => $holding) {

                $resultls = $this->Common_model->getTableDataByArray('tbl_info', array('holding_id' => $holding['id']));
                foreach ($resultls as $key => $value) {
                    $result[] = $value;
                    if (isset($result[0])) {
                        array_push($result, $value);
                    }
                }
            }
            // $unique = array_map("unserialize", array_unique(array_map("serialize", $result)));
           if(isset($result)){
                $result = $this->array_multi_unique($result);
           }
           

            
        } else {
            $result = $this->Common_model->getTableAllData('tbl_info');
        }

        if (isset($result)) {
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
        }

        if (!isset($final_result['landInfoList'])) {
            $final_result['landInfoList'] = array();
        }

        $this->load->view('index', $final_result);
    }

}
