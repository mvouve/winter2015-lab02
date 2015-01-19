<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Controller for the gallery class.
 *
 * @author Marc
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends Application
{
    
    /**
     * Displays the index of the gallery class.
     */
    public function index()
    {
        // get all the iumages from model
        $pix = $this->images->all();
        
        // build an array of cells
        foreach($pix as $picture)
        {
            $cells[] = $this->parser->parse('_cell', (array) $picture, true);
        }
        
        //prime table class
        $this->load->library('table');
        $params = array
        (
            'table_open' => '<table class="gallery">',
            'cell_start' => '<td class="oneimage">',
            'cell_alt_start' => '<td class="oneimage">'                
        );
        
        $this->table->set_template($params);
        
        //generate the table
        $rows = $this->table->make_columns($cells, 3);
        $this->data['thetable'] = $this->table->generate($rows);
        
        
        //$this->load->view('welcome');
        $this->data['pagebody'] = 'gallery';
        $this->render();
    }
}
