<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $Theme = new theme();
        $data['someVar'] = 'someVar';
        $view = 'default/index';
        $Theme->_loadfrontend($view, $data);

       
// ส่วนนี้เก็บเค้าเตอ
// Grab client IP
		$ip = $_SERVER['REMOTE_ADDR']; //เก็บ ip มาก่อนยังไม่รุ้เอาทำไร
		$date = date('Y-m-d');
// Check for previous visits 
        $querycounter = $this->db->get_where('tb_kaz_counter', array('date' => $date), 1, 0);
        $querycounter = $querycounter->row_array();
        error_reporting(0); //ถ้าไม่ปิด error เว็ปจะฟ้อง warning เพราะครั้งแรกที่เข้า if ยังเรียก array ไม่ได้
      //  ถ้า คิวรี่ซ้ำ
        if (count($querycounter) < 1 )
        {
        $querycounter = $this->db->insert('tb_kaz_counter', array('date' => $date , 'hits' => 0));
        }
        //ให้ hits+1 ถ้าออกเงื่อนไข if
        $this->db->set('hits','hits+1',false);
        $this->db->where('date',$date);
        $this->db->update('tb_kaz_counter');
        
    }
}
