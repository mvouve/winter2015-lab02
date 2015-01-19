<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Application
 *
 * @author Marc
 */
class Application extends CI_Controller {
    protected $data     = array();  // parameters for view components.
    protected $id;                  // content id
    protected $choices  = array     // menu nav bar
    (
       'Home'    => '/',
       'Gallery' => '/gallery',
        'About'  => '/about'
    );
    
    function __construct()
    {
        parent::__construct();
        $this->data = array();
        $this->data['pagetitle'] = 'Sample Image Gallery';
    }
    
    
    function render()
    {
        /* loading in required files */
        $this->load->helper('url');
        $this->load->helper('common_helper.php');
        $this->load->library('parser');
        
        $this->data['menubar'] = build_menu_bar($this->choices);
        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true );
        $this->data['data']    = &$this->data;
        $this->parser->parse('_template', $this->data);
    }
}
