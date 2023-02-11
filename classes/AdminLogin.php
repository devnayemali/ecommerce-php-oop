<?php

require_once('../lib/Session.php');
require_once('../lib/Database.php');
require_once('../helpers/Format.php');

// Session::checkSession();


class AdminLogin
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function adminLogin($adminUser, $adminPass)
    {
        $adminUser = $this->fm->validation($adminUser);
        $adminPass = $this->fm->validation($adminPass);

        $adminUser = mysqli_escape_string($this->db->link, $adminUser);
        $adminPass = md5(mysqli_escape_string($this->db->link, $adminPass));

        if (empty($adminUser) || empty($adminPass)) {
            $loginmsg = "User Name Or Password must not be empty";
            return $loginmsg;
        } else {
            $query = "SELECT * FROM `tbl_admin` WHERE adminUser = '{$adminUser}' AND adminPass = '{$adminPass}'";
            if ($result = $this->db->select($query)) {
                $value = $result->fetch_assoc();

                // set session value 
                Session::set('adminlogin', true);
                Session::set('adminId', $value['adminId']);
                Session::set('adminUser', $value['adminUser']);
                Session::set('adminPass', $value['adminPass']);
                

                header('Location:' . admin_base_url . '/dashboard.php');


            }else{
                $loginmsg = "User Name Or Password are not match";
                return $loginmsg;
            }
        }
    }
}
