<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MX_Controller {

    public function __construct()
    {
        parent::__construct();

        if(!ini_get('date.timezone'))
           date_default_timezone_set($this->config->item('timezone'));

        if(!$this->m_permissions->getMaintenance())
            redirect(base_url(),'refresh');

        $this->load->model('pages_model');
    }

    public function index($id)
    {
        if (empty($id) || is_null($id) || $id == '0')
            redirect(base_url(),'refresh');

        if ($this->pages_model->getVerifyExist($id) < 1)
            redirect(base_url(),'refresh');

        $data['idlink'] = $id;
        $data['fxtitle'] = '';
        
        $this->load->view('header', $data);
        $this->load->view('page', $data);
        $this->load->view('footer');
    }
}
