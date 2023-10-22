<?php

function api_events_create_event(){
    $title = addslashes(!empty($_POST['title']) ? $_POST['title'] : '');

    $user_id = user_id();
    $ans = array();
    $ans['status'] = 'ok';

    // Получаем новый event_id
    $sql = 'SELECT COUNT(*)+1 FROM `events_info` WHERE 1';
    $event_id = database($sql, 'COUNT(*)+1');

    $img_url = 'https://capyba.ru/upload/iblock/f79/f79fe3b02e503f4e432a56f5c11107b8.jpg';
    $sql = 'INSERT INTO `events_info`(`event_id`, `title`, `url_img`, `date`, `status`, `owner_id`) VALUES ("'.$event_id.'", "'.$title.'", "'.$img_url.'", "'.t_time().'", "true", "'.$user_id.'")';
    $a = database($sql, '');

    $url = 'https://hackathon.localzet.com/events/edit/'.$event_id.'/';
    $ans['url'] = $url;
    return json_encode($ans);
}

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
                'title' => $event_row[1],
                'description' => $event_row[2],
                'img_url' => $event_row[5]
            );
        }
    }else{
        $ans['data'] = [];
    }
    return json_encode($ans);
}

function api_event_update_data(){
    $log = addslashes(!empty($_POST['log']) ? $_POST['log'] : '');
    $data = addslashes(!empty($_POST['data']) ? $_POST['data'] : '');
    $event_id = addslashes(!empty($_POST['event_id']) ? $_POST['event_id'] : '');

    $user_id = user_id();
	$sql = 'SELECT * FROM `events_info` WHERE `event_id` = "'.$event_id.'"';
	$g = database($sql, '*', $t = "+");
	$event_row=mysqli_fetch_array($g);

    $ans = array();

    if ($log == 'title'){
        if ($data != ''){
            $sql = 'UPDATE `events_info` SET `title`="'.$data.'" WHERE `event_id` = "'.$event_id.'"';
            $a = database($sql);
            $ans['status'] = 'ok';
        }else{
            $ans['status'] = 'error_empty';
        }
    }else if ($log == 'description'){
        $sql = 'UPDATE `events_info` SET `description`="'.$data.'" WHERE `event_id` = "'.$event_id.'"';
        $a = database($sql);
        $ans['status'] = 'ok'; 
    }else if ($log == 'place'){
        $sql = 'UPDATE `events_info` SET `place`="'.$data.'" WHERE `event_id` = "'.$event_id.'"';
        $a = database($sql);
        $ans['status'] = 'ok'; 
    }else if ($log == 'event_type'){
        $event_row = $event_row[3];
        if ($event_row == 'online'){
            $event_row = '';
        }else{
            $event_row = 'online';
        }
        $sql = 'UPDATE `events_info` SET `event_type`="'.$event_row.'" WHERE `event_id` = "'.$event_id.'"';
        $a = database($sql, '');
        $ans['status'] = 'ok';  
    }else if ($log == 'view'){
        $view = $event_row[9];
        if ($view == 'true'){
            $view = '';
        }else{
            $view = 'true';
        }
        $sql = 'UPDATE `events_info` SET `view`="'.$view.'" WHERE `event_id` = "'.$event_id.'"';
        $a = database($sql, '');
        $ans['status'] = 'ok';      
    }else{
        $ans['status'] = 'error_api';
    }

    return json_encode($ans);
}


function api_h_event_edit_start(){
    // запуск функции API USER
    $api = !empty($_REQUEST['api']) ? $_REQUEST['api'] : '';

    if ($api == 'con'){
        return "ok";//
    }else if ($api == 'api_events_create_event') {
        return api_events_create_event();
    }else if ($api == 'api_event_update_data') {
        return api_event_update_data();      
    }else if ($api == 'api_events_get_events_list') {
        return api_events_get_events_list();       
    }else{
        return 'error_api_log';
    }
}

?>