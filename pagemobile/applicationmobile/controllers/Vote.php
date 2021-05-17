<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 23/3/2561
 * Time: 15:45
 */

class Vote extends CI_Controller
{
    public $ci_name;
    public $session_id;

    public function __construct()
    {
        parent::__construct();
        $this->ci_name = $this->router->fetch_class();
        $this->load->model('wbs_model');
        session_id();
        $this->session_id = session_id();
    }

    public function index($name_type)
    {
        $theme = new theme();
        $data = [];
        $set = get_view($name_type);
        $ci = $this->ci_name;
        $view = $set['view_path'] . 'index';
        $data['head'] = $set['sub_name'];
        $data['table_name'] = $set['table_name'];
        $data['folder_name'] = $set['folder_name'];
        $data['site'] = $data['site'] = site_url($ci . '/detail/' . $name_type . '/');
        $theme->_loadfrontend($view, $data);
    }

    public function view($name_type, $id)
    {
        if (isset($_POST['view'])):
            $set = get_view($name_type);
            $table_name = $set['table_name'];
            $table_name_sub = 'vote_detail';
            $view = $set['view_path'] . 'view';
            $session = $this->session_id;
            $ip = $_SERVER['REMOTE_ADDR'];
            $data['check_vote'] = $this->db->select('*')->where('ip', $ip)->where('masterid', $id)->get('vote_result')->row_array();
            $data['set'] = $this->db->select('*')->where('id', $id)->get($table_name)->row_array();
            $data['set_sub'] = $this->db->select('*')->where('masterid', $id)->get($table_name_sub)->result_array();
            $data['vote_result'] = $this->db->select('detailid')->where('masterid', $id)->get('vote_result')->result_array();
            $data['table_name'] = $set['table_name'];
            $data['folder_name'] = $set['folder_name'];
            $data['head'] = $set['sub_name'];
            $data['site_vote'] = site_url('vote/vote');
//            if ($data['check_vote']) {
            $data['process'] = self::get_process($data['vote_result'], $data['set_sub'], $id);
//            }
            $view = 'frontend/' . $view;
            $this->load->view($view, $data);
        endif;
    }

    private function get_process($result, $sub, $id)
    {
        $results = [];
        $count_all = count($result) == 0 ? 1 : count($result);
        foreach ($sub as $sKey => $sVal) {
            $results[$sKey]['name'] = $sVal['name'];
            $results[$sKey]['count'] = $this->db->where('masterid', $id)->where('detailid', $sVal['id'])->get('vote_result')->num_rows();
            $results[$sKey]['process'] = round((100 / $count_all) * $results[$sKey]['count'], 2);
        }
        return $results;
    }

    public function Vote()
    {
        $result = false;
        $browser = getBrowser();
        $device = $browser['device'];
        $platform = $browser['platform'];
        $ip = $_SERVER['REMOTE_ADDR'];
        $session = $this->session_id;
        $table_name = 'vote_result';
        if (isset($_POST['vote'])) {
            $Wbs_Model = new Wbs_model();
            $Vote = $_POST['vote'];
            $Field = $_POST['field'];
            $data = ['masterid' => $Field, 'detailid' => $Vote, 'ip' => $ip, 'device' => $device, 'platform' => $platform, 'session' => $session];
            $SS = $this->session->has_userdata('SETSS');
            if ($SS) {
                $result = $Wbs_Model->Insert($table_name, $data);
                $this->session->unset_userdata('SETSS');

            }
            return JsonEncode($data);
        }
    }

    public function detail($name_type, $page = 1)
    {
        $set = get_view($name_type);
        $ci = $this->ci_name;
        if (isset($_POST['data'])) {
            $Search = $_POST['data'];
            $limil = 5;
            $page = $page - 1;
            $offset = $limil * $page;
            $table_name = $set['table_name'];

            $data['data'] = $this->db->select('*')
                ->like('name', $Search)
                ->where('status', 1)
                ->limit($limil, $offset)
                ->order_by('date DESC , id DESC')
                ->get($table_name)
                ->result_array();
            $pageAll = $this->db->select('*')
                ->like('name', $Search)
                ->where('status', 1)
                ->get($table_name)
                ->num_rows();

            $data['page'] = ceil($pageAll / $limil);
            $data['site'] = site_url($ci . '/detail/' . $name_type . '/');
            $data['site_view'] = site_url($ci . '/view/' . $name_type . '/');
            $data['table_name'] = $table_name;
            $data['folder_name'] = $set['folder_name'];
            $data['pageNow'] = $page + 1;
            $data['offset'] = $offset;
            $view = 'frontend/' . $set['view_path'] . 'detail';
            $this->load->view($view, $data);
        }
    }
}