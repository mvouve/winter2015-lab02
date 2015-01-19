<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Controller for the about class.
 *
 * @author Marc
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class About extends Application
{
    
    /**
     * Displays the index of the about class.
     */
    public function index()
    {
        //$this->load->view('welcome');
        $this->data['pagebody'] = 'about';
        $this->render();
    }
}
