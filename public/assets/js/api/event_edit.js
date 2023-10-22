function start_to_create_event(){
    if (document.getElementById('start_to_create_event_item').value == ''){
        hh = '<p style="color:red">Укажите название для создания мероприятия</p>';
    }else{
        hh = '<a onclick="api_events_create_event();" class="btn btn-primary">Продолжить</a>';
    }
    document.getElementById('create_button_place').innerHTML = hh;
}

function api_events_create_event(){
    var form = new FormData();
    form.append('api', 'api_events_create_event');
    form.append('title', document.getElementById('start_to_create_event_item').value);
    axios.post('https://hackathon.localzet.com/events/edit/api/', form)
    .then(function (response) {
        if (response.data['status'] == 'ok'){
            window.location.href = response.data['url'];
        }else{
            api_alert_error_callback();
        }
    }).catch(function (error) {
        console.log(error);
        api_alert_error_callback();
    });
}

function api_event_update_data_title(){
    data = document.getElementById("event_title").value;
    api_event_update_data('title', data);
}

function api_user_update_data_description(){
    data = document.getElementById("user_description").value;
    api_event_update_data('description', data);
}

function api_user_update_data_event_type(){
    data = '';
    api_event_update_data('event_type', data);
}

function api_user_update_data_place(){
    data = document.getElementById("user_place").value;
    api_event_update_data('place', data);
}

function api_user_update_data_view(){
    data = '';
    api_event_update_data('view', data);
}

function api_event_update_data(log, data=''){
    var form = new FormData();
    form.append('api', 'api_event_update_data');
    form.append('log', log);
    form.append('data', data);
    form.append('event_id', window.event_id);
    axios.post('https://hackathon.localzet.com/events/edit/api/', form)
    .then(function (response) {
        if (response.data['status'] == 'ok'){
            clearTimeout(window.timer);
            window.timer = setTimeout(() => api_alert_success_save(), 1000);
        }else{
            api_alert_error_callback();
        }
    }).catch(function (error) {
        console.log(error);
        api_alert_error_callback();
    });
}