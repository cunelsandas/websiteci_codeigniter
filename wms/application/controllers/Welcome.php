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
        /*if ($_SERVER['SERVER_PORT'] != 8080) {
            $this->load->view('notfound');
        } else {*/
        $this->load->view('component/head');
        $this->load->view('backend/login');
        $this->session->sess_destroy();
        /*}*/
    }

    public function login()
    {
        $User = new Users_model();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $set_user = $User->CheckLogin($username, $password);
        if ($set_user != []) {
            $session = $this->session->set_userdata($set_user);
            if ($this->session->has_userdata('user_name')) {
                redirect('home');
            }
        } else {
            echo '<script>alert(\'ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง\');window.location.href = \'' . site_url() . '\'</script>';
        }
    }
}
