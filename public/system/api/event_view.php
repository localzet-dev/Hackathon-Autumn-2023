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

function api_h_event_view_start(){
    // запуск функции API USER
    $api = !empty($_REQUEST['api']) ? $_REQUEST['api'] : '';

    if ($api == 'con'){
        return "ok";//
    }else if ($api == 'api_events_get_events_list') {
        return api_events_get_events_list();  
    }else{
        return 'error_api_log';
    }
}

?>