<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Maps extends MY_Controller
{
    public function index()
    {


        $data['html'][''] = '';
        $data['url'] = 'public/body';
        $this->templatePublic($data);
    }
    public function ajax($action)
    {

        switch ($action) {
            case 'getData':
                echo json_encode($this->getDataRow('map', '*'));
                break;
            case 'search':
                $query = "SELECT * FROM map WHERE CONCAT(koordinat,obj,ukuran,catatan) LIKE '%" . $_POST['search'] . "%' ";
                echo json_encode($this->query($query)->result_array());
                break;
            default:
                # code...
                break;
        }
    }
    public function repair()
    {
        die;
        $data = $this->getDataRow('map');

        foreach ($data as $key => $value) {
            $arrParam = explode(" ", $value['koordinat']);
            // if (count($arrParam) < 1)
            //     continue;

            $value['koordinat'] = str_replace(" ", "", $value['koordinat']);
            // $value['koordinat'] = str_replace(",", ".", $value['koordinat']);
            // $value['koordinat'] = str_replace("_", ",", $value['koordinat']);


            // $this->update('map', ['koordinat' => $value['koordinat']], ['id' => $value['id']]);
            echo count($arrParam) . '_' . $value['koordinat'] . '<br>';
        }
    }
}
