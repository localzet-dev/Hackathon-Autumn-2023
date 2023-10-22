/*function (){
    // Имя и Фамилия
    var xhr = new XMLHttpRequest();
    var fn = document.getElementById("acc_eid_user_fn").value;
    var sn = document.getElementById("acc_eid_user_sn").value;
    var params = 'api=up_eid_user_fnsn&fn='+encodeURIComponent(fn)+'&sn='+encodeURIComponent(sn);
    xhr.open("POST", "hhttps://hackathon.localzet.com/api/user/", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(params);
    xhr.onreadystatechange = function() {
        if (xhr.readyState != 4) return;
        if (xhr.status != 200) {
            console.log(xhr.status + ": Ошибка подключения");
        } else {
            console.log(xhr.responseText);

        }
    }
}
*/


function api_user_update_data_lastname(){
    data = document.getElementById("user_lastname").value;
    api_user_update_data('lastname', data);
}

function api_user_update_data_firstname(){
    data = document.getElementById("user_firstname").value;
    api_user_update_data('firstname', data);
}

function api_user_update_data_middlename(){
    data = document.getElementById("user_middlename").value;
    api_user_update_data('middlename', data);
}

function api_user_update_data_status(){
    data = '';
    api_user_update_data('status', data);
}

function api_user_update_data_is_speaker(){
    data = '';
    api_user_update_data('is_speaker', data);
}

function api_user_update_data_is_admin(){
    data = '';
    api_user_update_data('is_admin', data);
}
function api_user_update_data_role(){
    data = document.getElementById("user_role").value;
    api_user_update_data('role', data);
}

function api_user_update_data_phone(){
    data = document.getElementById("user_phone").value;
    api_user_update_data('phone', data);
}

function api_user_update_data_link(){
    data = document.getElementById("user_link").value;
    api_user_update_data('link', data);
}

function api_user_update_data_speaker_desc(){
    data = document.getElementById("user_speaker_desc").value;
    api_user_update_data('speaker_desc', data);
}

function api_user_update_data(log, data=''){
    var form = new FormData();
    form.append('api', 'api_user_update_data');
    form.append('log', log);
    form.append('data', data);
    axios.post('https://hackathon.localzet.com/api/user/', form)
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