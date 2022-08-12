<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->role = $this->session->userdata('role');
        $this->id = $this->session->userdata('id');
        $this->login = $this->session->userdata('login');
    }
    public function loadDb($dbName = 'default')
    {
        $this->db = $this->load->database($dbName, TRUE);
    }

    public function template($data)
    {
        $data['companyProfile'] = $this->getDataRow('profile_company', '*', '', 1);
        $data['companyName'] = $data['companyProfile'][0]['name'];
        $this->load->view('template/base.php', $data);
    }

    public function templatePublic($data)
    {
        $this->load->view('public/base.php', $data);
    }

    public function getDataRow($tbl, $row = '*', $arrWhere = '', $limit = '', $arrJoin = array()/*array in array*/, $orderBy = '', $arrWhereIn = array(), $groupBy = array(), $sum = array())
    {
        $this->load->model('Base_model');
        return $this->Base_model->getDataRow($tbl, $row, $arrWhere, $limit, $arrJoin, $orderBy, $arrWhereIn, $groupBy, $sum);
    }

    public function insert($tbl, $arrData)
    {
        $this->load->model('Base_model');
        return $this->Base_model->insert($tbl, $arrData);
    }

    public function delete($tbl, $where)
    {
        $this->load->model('Base_model');
        return $this->Base_model->delete($tbl, $where);
    }

    public function update($table, $arrData, $where)
    {
        $this->load->model('Base_model');
        return $this->Base_model->update($table, $arrData, $where);
    }
    public function set($table, $where, $data = array())
    {
        $this->load->model('Base_model');
        return $this->Base_model->set($table, $where, $data);
    }

    public function query($query)
    {
        $this->load->model('Base_model');
        return $this->Base_model->query($query);
    }

    public function addErrMsg($arrErrMsg)
    {
        $this->arrErrMsg = $arrErrMsg;
        $_SESSION['arrErrMsg'] = $arrErrMsg;
    }

    public function uploadImg($param /*arr id tablename colomname  postname*/)
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 10000;
        $config['max_width']            = 10240;
        $config['max_height']           = 7680;
        $config['overwrite'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($param['postname'])) {
            return $this->upload->display_errors();
        } else {
            $data = array('dataFile' => $this->upload->data())['dataFile'];
            $filename = strtotime("now") . $data['file_ext'];
            if (isset($param['loop']) && !empty($param['loop']))
                $filename = strtotime("now") . $param['loop'] . $data['file_ext'];
            $target = './uploads/' . $filename;
            rename('./uploads/' . $data['file_name'], $target);
            $arrData = array(
                $param['colomname'] => $filename,
            );
            if (isset($param['replace']) && !empty($param['replace']) && $param['replace']) {
                $oldName = $this->getDataRow($param['tablename'], $param['colomname'], 'pkey=' . $param['pkey'])[0][$param['colomname']];
                $this->load->helper("file");
                unlink('./uploads/' . $oldName);
            }
            $this->update($param['tablename'], $arrData, 'pkey=' . $param['pkey']);
            return true;
        }
    }

    public function uploadImgDetail($param)
    {

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 1000;
        $config['max_width']            = 10240;
        $config['max_height']           = 7680;
        $config['overwrite'] = true;

        $this->load->library('upload', $config);
        $images = array();

        $_FILES['images[]']['name'] = $param['postname']['name'][$param['arrnumber']];
        $_FILES['images[]']['type'] = $param['postname']['type'][$param['arrnumber']];
        $_FILES['images[]']['tmp_name'] = $param['postname']['tmp_name'][$param['arrnumber']];
        $_FILES['images[]']['error'] = $param['postname']['error'][$param['arrnumber']];
        $_FILES['images[]']['size'] = $param['postname']['size'][$param['arrnumber']];


        $fileName = strtotime("now") . '_Detail' . $param['arrnumber'];
        $images[] = $fileName;
        $config['file_name'] = $fileName;

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('images[]')) {
            return $this->upload->display_errors();
        } else {
            $data = array('dataFile' => $this->upload->data())['dataFile'];
            if (isset($param['replace']) && !empty($param['replace']) && $param['replace']) {
                $oldName = $this->getDataRow($param['tablename'], $param['colomname'], 'id=' . $param['id'])[0][$param['colomname']];
                $this->load->helper("file");
                unlink('./uploads/' . $oldName);
            }
            $arrData = array(
                $param['colomname'] => $fileName . $data['file_ext'],
            );
            $this->update($param['tablename'], $arrData, 'id=' . $param['id']);
        }
    }

    public function genrateErr()
    {
        $arrMsgErr = $this->session->flashdata('arrMsgErr');

        $number = 1;
        if (isset($arrMsgErr)) {
            $err = '';
            foreach ($arrMsgErr as $value) {
                $err .= '<div class="alert alert-danger" role="alert">' . $number++ . '. ' . $value . '</div>';
            }
            return $err;
        }
    }

    public function setLog($logs = '', $status = false)
    {
        $this->load->helper('file');
        $path = './application/logs/' . date("Y-m-d") . '.text';
        if ($status) {
            write_file($path, $logs);
        }
    }

    public function dataForm($formData)
    {
        $data = array();
        foreach ($formData as $key => $value) {
            if (is_array($value) && $value[1] == 'md5') {
                $_POST[$value[0]] = md5($_POST[$value[0]]);
                $value = $value[0];
            }

            if (is_array($value) && $value[1] == 'number') {
                $_POST[$value[0]] = str_replace(",", "", $_POST[$value[0]]);
                $value = $value[0];
            }

            if (is_array($value) && $value[1] == 'date') {
                $_POST[$value[0]] = strtotime($_POST[$value[0]]);
                $value = $value[0];
            }
            if ($value == 'sesionid')
                $_POST[$value] = $this->id;
            if ($value == 'time')
                $_POST[$value] = strtotime("now");


            $data[$key] = $_POST[$value];
        }
        return $data;
    }

    public function dataFormEdit($formData, $dataRow)
    {
        $data = array();
        foreach ($formData as $key => $value) {

            if (is_array($value) && $value[1] == 'date') {
                $dataRow[$key] = date("Y-m-d", $dataRow[$key]);
                $value = $value[0];
            }

            if (is_array($value) && $value[1] == 'number') {
                $dataRow[$key] = number_format($dataRow[$key]);
                $value = $value[0];
            }

            if (is_array($value))
                $value = $value[0];

            $_POST[$value] = $dataRow[$key];
        }
        $_POST['action'] = 'update';
        return $data;
    }

    public function insertDetail($tableDetail, $formDetail, $refkey)
    {
        if (!empty(count($formDetail)) && !empty($formDetail) && isset($_POST['detailKey'])) {
            foreach ($_POST['detailKey'] as $item => $val) {
                $dataDetail = array();
                foreach ($formDetail as $key => $value) {
                    if ($value == 'refkey')
                        $_POST[$value][$item] = $refkey;

                    if (is_array($value) && $value[1] == 'date') {
                        $_POST[$value[0]] = strtotime($_POST[$value[0]]);
                        $value = $value[0];
                    }

                    if (is_array($value) && $value[1] == 'number') {
                        $_POST[$value[0]] = str_replace(",", "", $_POST[$value[0]]);
                        $value = $value[0];
                    }

                    if (is_array($value) && $value[1] == 'md5') {
                        $_POST[$value[0]] = md5($_POST[$value[0]]);
                        $value = $value[0];
                    }



                    $dataDetail[$key] = $_POST[$value][$item];
                }
                $this->insert($tableDetail, $dataDetail);
            }
        }
    }

    public function updateDetail($tableDetail, $formDetail, $detailRef, $id)
    {
        if (!empty($tableDetail)) {

            $oldDataDetail = $this->getDataRow($tableDetail, 'pkey', array($detailRef => $_POST['pkey']));
            foreach ($_POST['detailKey'] as $i => $value) {
                if (!empty($_POST['detailKey'][$i])) {
                    $status = false;
                    $arrNumber = 0;
                    foreach ($oldDataDetail as $key => $item) {

                        if ($item['pkey'] == $_POST['detailKey'][$i]) {
                            $status = true;
                            $arrNumber = $key;
                        }
                    }
                    if ($status)
                        unset($oldDataDetail[$arrNumber]);
                }

                $dataDetail = array();
                foreach ($formDetail as $key => $value) {
                    if ($value == 'refkey')
                        $_POST[$value][$i] = $id;

                    if (is_array($value) && $value[1] == 'number') {
                        $_POST[$value[0]] = str_replace(",", "", $_POST[$value[0]]);
                        $value = $value[0];
                    }
                    $dataDetail[$key] = $_POST[$value][$i];
                }
                if (empty($_POST['detailKey'][$i])) {
                    echo 'insert';
                    $this->insert($tableDetail, $dataDetail);
                } else {
                    echo 'update';
                    $this->update($tableDetail, $dataDetail, 'pkey=' . $_POST['detailKey'][$i]);
                }
            }
            //delete detail
            $deleteId = '';
            foreach ($oldDataDetail as $item) {
                if (empty($deleteId)) {
                    $deleteId = $item['pkey'];
                } else {
                    $deleteId .= ', ' . $item['pkey'];
                }
            }
            if (!empty($deleteId))
                $this->delete($tableDetail, 'pkey in(' . $deleteId . ')');
        }
    }

    public function implode($data, $keys)
    {
        $implode = '';
        if (!empty(count($data)))
            foreach ($data as $dataKey => $value) {
                if (empty($implode)) {
                    $implode = $value[$keys];
                } else {
                    $implode .= ', ' . $value[$keys];
                }
            }
        return $implode;
    }

    public function exportExcel($heder, $index, $data, $fileName)
    {

        $alphas = range('A', 'Z');
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        for ($i = 0; $i < count($heder); $i++) { //head
            $sheet->setCellValue($alphas[$i] . '1', $heder[$i]);
        }

        $j = 1;
        $row = 2;
        foreach ($data as $dataKey => $dataValue) {
            $k = 0;
            foreach ($index as $item) {
                if ($item == 'number')
                    $dataValue[$item] = $j . " ";
                if (is_array($item) && $item[1] == 'time') {
                    $item = $item[0];
                    $dataValue[$item] =   date("Y/m/d", $dataValue[$item]);
                }

                $sheet->setCellValue($alphas[$k++] . $row, $dataValue[$item]);
            }
            $j++;
            $row++;
        }
        ob_end_clean();
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $fileName . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
