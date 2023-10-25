<?php
include_once 'system/api/core.php';
include_once 'system/api/trg.php';
include_once 'pages.php';

function t_time(){
    return date('Y-m-d H:i:s');
}

function router()
{
    $url = $_SERVER['REQUEST_URI'];
    if ($url[0] == '/') {
        $url = substr($url, 1);
    }
    if ($url == '') {
        
         include_once 'system/pages/landing.php';
         return landing_page();
    } else {
        if (auth()) {

            $user_id = user_id();
            $sql = 'SELECT * FROM `users` WHERE `user_id` = "'.$user_id.'"';
            $g = database($sql, '*', $t = "+");
            $user_row=mysqli_fetch_array($g);
            
            $url = $url . '/';
            if (strpos($url, '/')) {
                $url_p = explode('/', $url); //
                if ($url_p[0] == 'user') {
                    return pages_main_user_profile();
                } else if ($url_p[0] == 'events') {
                    if ($url_p[1] == '') {
                        return pages_main_events();
                    }else if ($url_p[1] == 'add') {    
                        return pages_main_events_add();
                    }else if ($url_p[1] == 'api') {    
                        include_once "system/api/event_view.php";
                        return api_h_event_view_start(); 
                    }else if ($url_p[1] == 'edit') {
                        if ($url_p[2] == 'api') {
                            include_once "system/api/event_edit.php";
                            return api_h_event_edit_start();
                        } else {
                            return pages_main_events_edit_event($url_p[2]);
                        }  
                    } else {
                        return pages_main_event_view($url_p[1]);
                    }

                } else if ($url_p[0] == 'admin') {
                    if ($user_row[10] == 'true'){
                    if ($url_p[1] == 'users') {
                        if ($url_p[2] == '') {
                            return pages_main_admin_users();
                        } else {
                            return pages_main_admin_users_view_user($url_p[2]);
                        }
                    } else {
                        return pages_main_events();
                    }
                    }else{
                        return 'error_user_role_router';
                    }

                } else if ($url_p[0] == 'api') {
                    if ($url_p[1] == 'user') {
                        include_once "system/api/user.php";
                        return api_h_user_start();
                    }else if ($url_p[1] == 'admin') {
                        if ($url_p[2] == 'users') {
                            include_once "system/api/admin_users.php";
                            return api_h_admin_users_start();
                        } else {
                            return error_404();
                        }    
                    } else {
                        return error_404();
                    }
                } else {
                    return error_404();
                }
            } else {
                return error_404();
            }
        } else {
            header('Location: https://hackathon.localzet.com/auth.php');
        }
    }
}

echo (router());
?>