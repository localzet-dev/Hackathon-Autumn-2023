<?php

function api_events_get_events_list(){
    $search = addslashes(!empty($_POST['search']) ? $_POST['search'] : '');
    if ($search != ''){
        $pars = 'AND (`title` LIKE "%'.$search.'%") ';
    }else{
        $pars = '';
    }
    $pars = '`status` = "true" AND `view` = "true" '.$pars;

    $ans = array("status"=>'ok');
    $sql = 'SELECT COUNT(*) FROM `events_info` WHERE '.$pars;
    $count = database($sql, 'COUNT(*)');
    if ($count != '0'){
        $sql = 'SELECT * FROM `events_info` WHERE '.$pars;
        $g = database($sql, '', '+');
        while($event_row=mysqli_fetch_array($g)){
            $ans['data'][] = array(
                'event_id' => $event_row[0],
                'title' => mb_strimwidth($event_row[1], 0, 50, "..."),
                'description' => mb_strimwidth($event_row[2], 0, 80, "..."),
                'img_url' => $event_row[5]
            );
        }
    }else{
        $ans['data'] = [];
    }
    return json_encode($ans);
}

function api_events_user_member(){
    $event_id = addslashes(!empty($_POST['event_id']) ? $_POST['event_id'] : '');
    $user_id = user_id();

    $sql = 'SELECT `status` FROM `events_members` WHERE `event_id` = "'.$event_id.'" AND `user_id` = "'.$user_id.'"';
    $status = database($sql, 'status');

    if ($status == ''){
        $sql = 'INSERT INTO `events_members`(`event_id`, `user_id`, `is_speaker`, `status`) VALUES ("'.$event_id.'", "'.$user_id.'", "", "true")';
    }else{
        $sql = 'DELETE FROM `events_members` WHERE `event_id` = "'.$event_id.'" AND `user_id` = "'.$user_id.'"';
    }
    $a = database($sql);
    $ans = array("status"=>'ok');
    return json_encode($ans);
}

function api_h_event_view_start(){
    // запуск функции API USER
    $api = !empty($_REQUEST['api']) ? $_REQUEST['api'] : '';

    if ($api == 'con'){
        return "ok";//
    }else if ($api == 'api_events_get_events_list') {
        return api_events_get_events_list();  
    }else if ($api == 'api_events_user_member') {
        return api_events_user_member();      
    }else{
        return 'error_api_log';
    }
}

?>