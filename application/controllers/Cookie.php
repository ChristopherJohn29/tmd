<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cookie extends CI_Controller {

    public function index()
    {

        
    }


    public function generate_cookie(){

        $cookie_name = "computer_cookie";
        $cookie_value = uniqid();

        echo "<center><br><br>
        <br>
        <br>The EHR System is restricted to The Mobile Drs employees only.
        <br>
        <br>
        If you are an employee and wish to access the EHR System,<br> send the unique Computer Cookie below to your admin.  <br> <br>
        ";
        
        if(!isset($_COOKIE['computer_cookie'])) {
            setcookie('computer_cookie', $cookie_value, time() + (86400 * 300), "/"); // 86400 = 1 day
            echo 'Your unique Computer Cookie is <label style="color:green;">' . $cookie_value . "<br>";
        } else {
            echo 'Your unique Computer Cookie is <label style="color:green;">' . $_COOKIE['computer_cookie'] . "<br>";
        }   

        echo "</center>";

        $this->load->model('authentication/user_model');

        if(!isset($_COOKIE['computer_cookie'])){
            $result = $this->user_model->checkCookie($cookie_value);
        } else {
            $result = $this->user_model->checkCookie($_COOKIE['computer_cookie']);
        }

        

        if(!empty($result)) {
            redirect('authentication/user');
        } 

    }
}