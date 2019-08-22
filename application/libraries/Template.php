<?php  
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Template 
{
    var $ci;
        
    function __construct() 
    {
        $this->ci =& get_instance();
    }

    function load($tpl_view, $config, $data = null) 
    {

        if ( ! is_null( $config['page_css_view'] ) )
        {
            if ( file_exists( APPPATH . 'views/' . $tpl_view . '/' . $config['page_css_view'] ) ) 
            {
                $page_css_view_path = $tpl_view . '/' . $config['page_css_view'];
            }
            else if ( file_exists( APPPATH . 'views/' . $tpl_view . '/' . $config['page_css_view'] . '.php' ) ) 
            {
                $page_css_view_path = $tpl_view . '/' . $config['page_css_view'] . '.php';
            }
            else if ( file_exists( APPPATH . 'views/' . $config['page_css_view'] ) ) 
            {
                $page_css_view_path = $config['page_css_view'];
            }
            else if ( file_exists( APPPATH . 'views/' . $config['page_css_view'] . '.php' ) ) 
            {
                $page_css_view_path = $config['page_css_view'] . '.php';
            }
            else
            {
                show_error('Unable to load the requested file: ' . $tpl_view . '/' . $config['page_css'] . '.php');
            }
            
            $page_css = $this->ci->load->view($page_css_view_path, $data, TRUE);
            
            if ( is_null($data) ) 
            {
                $data = array('page_css' => $page_css);
            }
            else if ( is_array($data) )
            {
                $data['page_css'] = $page_css;
            }
            else if ( is_object($data) )
            {
                $data->page_css = $page_css;
            }
        }

        if ( ! is_null( $config['content_view'] ) )
        {
            if ( file_exists( APPPATH . 'views/' . $tpl_view . '/' . $config['content_view'] ) ) 
            {
                $body_view_path = $tpl_view . '/' . $config['content_view'];
            }
            else if ( file_exists( APPPATH . 'views/' . $tpl_view . '/' . $config['content_view'] . '.php' ) ) 
            {
                $body_view_path = $tpl_view . '/' . $config['content_view'] . '.php';
            }
            else if ( file_exists( APPPATH . 'views/' . $config['content_view'] ) ) 
            {
                $body_view_path = $config['content_view'];
            }
            else if ( file_exists( APPPATH . 'views/' . $config['content_view'] . '.php' ) ) 
            {
                $body_view_path = $config['content_view'] . '.php';
            }
            else
            {
                show_error('Unable to load the requested file: ' . $tpl_view . '/' . $config['content_view'] . '.php');
            }
            
            $body = $this->ci->load->view($body_view_path, $data, TRUE);
            
            if ( is_null($data) ) 
            {
                $data = array('body' => $body);
            }
            else if ( is_array($data) )
            {
                $data['body'] = $body;
            }
            else if ( is_object($data) )
            {
                $data->body = $body;
            }
        }

        if ( ! is_null( $config['page_script_view'] ) )
        {
            if ( file_exists( APPPATH . 'views/' . $tpl_view . '/' . $config['page_script_view'] ) ) 
            {
                $page_script_view_path = $tpl_view . '/' . $config['page_script_view'];
            }
            else if ( file_exists( APPPATH . 'views/' . $tpl_view . '/' . $config['page_script_view'] . '.php' ) ) 
            {
                $page_script_view_path = $tpl_view . '/' . $config['page_script_view'] . '.php';
            }
            else if ( file_exists( APPPATH . 'views/' . $config['page_script_view'] ) ) 
            {
                $page_script_view_path = $config['page_script_view'];
            }
            else if ( file_exists( APPPATH . 'views/' . $config['page_script_view'] . '.php' ) ) 
            {
                $page_script_view_path = $config['page_script_view'] . '.php';
            }
            else
            {
                show_error('Unable to load the requested file: ' . $tpl_view . '/' . $config['page_script_view'] . '.php');
            }
            
            $page_script = $this->ci->load->view($page_script_view_path, $data, TRUE);
            
            if ( is_null($data) ) 
            {
                $data = array('page_script' => $page_script);
            }
            else if ( is_array($data) )
            {
                $data['page_script'] = $page_script;
            }
            else if ( is_object($data) )
            {
                $data->page_script = $page_script;
            }
        }

        $this->ci->load->view('templates/' . $tpl_view, $data);
    }
    
}

