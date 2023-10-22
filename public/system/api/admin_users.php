<?php


function api_user_update_data(){
    $log = addslashes(!empty($_POST['log']) ? $_POST['log'] : '');
    $data = addslashes(!empty($_POST['data']) ? $_POST['data'] : '');
    $user_id = addslashes(!empty($_POST['select_user_id']) ? $_POST['select_user_id'] : '');

	$sql = 'SELECT * FROM `users` WHERE `user_id` = "'.$user_id.'"';
	$g = database($sql, '*', $t = "+");
	$user_row=mysqli_fetch_array($g);

    $ans = array();

    if ($log == 'lastname'){
        if ($data != ''){
            $sql = 'UPDATE `users` SET `lastname`="'.$data.'" WHERE `user_id` = "'.$user_id.'"';
            $a = database($sql);
            $ans['status'] = 'ok';
        }else{
            $ans['status'] = 'error_empty';
        }
        $ans['status'] = 'error_user_role';
    
    }else if ($log == 'firstname'){
        if ($data != ''){
            $sql = 'UPDATE `users` SET `firstname`="'.$data.'" WHERE `user_id` = "'.$user_id.'"';
            $a = database($sql);
            $ans['status'] = 'ok';
        }else{
            $ans['status'] = 'error_empty';
        }
    }else if ($log == 'middlename'){
        $sql = 'UPDATE `users` SET `middlename`="'.$data.'" WHERE `user_id` = "'.$user_id.'"';
        $a = database($sql);
        $ans['status'] = 'ok';
    }else if ($log == 'role'){
        $sql = 'UPDATE `users` SET `role`="'.$data.'" WHERE `user_id` = "'.$user_id.'"';
        $a = database($sql);
        $ans['status'] = 'ok';
    }else if ($log == 'phone'){
        $data = intval(preg_replace('/[^0-9]+/', '', $data));
        $sql = 'UPDATE `users` SET `phone`="'.$data.'" WHERE `user_id` = "'.$user_id.'"';
        $a = database($sql);
        $ans['status'] = 'ok';
    }else if ($log == 'link'){
        $sql = 'UPDATE `users` SET `link`="'.$data.'" WHERE `user_id` = "'.$user_id.'"';
        $a = database($sql);
        $ans['status'] = 'ok';            
    }else if ($log == 'status'){
        $status = $user_row[11];
        if ($status == 'true'){
            $status = 'false';
        }else{
            $status = 'true';
        }
        $sql = 'UPDATE `users` SET `status`="'.$status.'" WHERE `user_id` = "'.$user_id.'"';
        $a = database($sql, '');
        $ans['status'] = 'ok';
    }else if ($log == 'is_admin'){
        $is_admin = $user_row[10];
        if ($is_admin == 'true'){
            $is_admin = '';
        }else{
            $is_admin = 'true';
        }
        $sql = 'UPDATE `users` SET `is_admin`="'.$is_admin.'" WHERE `user_id` = "'.$user_id.'"';
        $a = database($sql, '');
        $ans['status'] = 'ok'; 
    }else if ($log == 'is_speaker'){
        $is_speaker = $user_row[9];
        if ($is_speaker == 'true'){
            $is_speaker = '';
        }else{
            $is_speaker = 'true';
        }
        $sql = 'UPDATE `users` SET `is_speaker`="'.$is_speaker.'" WHERE `user_id` = "'.$user_id.'"';
        $a = database($sql, '');
        $ans['status'] = 'ok';  
    }else if ($log == 'speaker_desc'){
        $sql = 'UPDATE `users` SET `speaker_desc`="'.$data.'" WHERE `user_id` = "'.$user_id.'"';
        $a = database($sql);
        $ans['status'] = 'ok';   
    }else{
        $ans['status'] = 'error_api';
    }

    return json_encode($ans);
}

function api_admin_users_get_users_list(){
    $search = addslashes(!empty($_POST['search']) ? $_POST['search'] : '');
    if ($search == ''){
        $pars = '1';
    }else{
        $pars = '((`firstname` LIKE "%'.$search.'%")OR(`lastname` LIKE "%'.$search.'%")OR(`email` LIKE "%'.$search.'%"))';
    }
    $ans = array("status"=>'ok');
    $sql = 'SELECT COUNT(*) FROM `users` WHERE '.$pars;
    $count = database($sql, 'COUNT(*)');
    if ($count != '0'){
        $sql = 'SELECT * FROM `users` WHERE '.$pars;
        $g = database($sql, '', '+');
        while($user_row=mysqli_fetch_array($g)){
            $ans['data'][] = array(
                'user_id' => $user_row[0],
                'firstname' => $user_row[1],
                'lastname' => $user_row[2],
                'email' => $user_row[4],
                'img_url' => $user_row[5],
                'speaker' => $user_row[9],
                'admin' => $user_row[10]
            );
        }
    }else{
        $ans['data'] = [];
    }
    return json_encode($ans);
}


function api_h_admin_users_start(){
    // запуск функции API USER
    $api = !empty($_REQUEST['api']) ? $_REQUEST['api'] : '';

    if ($api == 'con'){
        return "ok";//
    }else if ($api == 'api_user_update_data') {
        return api_user_update_data();
    }else if ($api == 'api_admin_users_get_users_list') {
        return api_admin_users_get_users_list();      
    }else{
        return 'error_api_log';
    }
}

?>