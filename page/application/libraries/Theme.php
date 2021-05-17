<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13/1/2561
 * Time: 9:58
 */
class Theme
{

    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function _loadfrontend($view, $data = array())
    {
        $view = 'frontend/' . $view;
        $this->CI->load->view('frontend/frontend', array('view' => $view, 'data' => $data));
    }

    public function _loadbackend($view, $data = array())
    {
        $view = 'backend/' . $view;
        $this->CI->load->view('backend/backend', array('view' => $view, 'data' => $data));
    }
    public function _loadmodules($view, $data = array())
{
    $view = 'modules/' . $view;
    $this->CI->load->view('backend/backend', array('view' => $view, 'data' => $data));
}
}