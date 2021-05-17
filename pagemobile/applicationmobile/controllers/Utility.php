<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 5/5/2561
 * Time: 14:32
 */

class Utility extends CI_Controller
{
    public function SetCaptcha()
    {
        if ($this->session->has_userdata('SETSS')) {
            $this->session->unset_userdata('SETSS');
        }
        $SS = $_POST['ss'];
        $this->session->set_userdata(['SETSS' => $SS]);
        $SS = $this->session->has_userdata('SETSS');
        return JsonEncode($SS);
    }
}