function api_admin_users_get_users_list(){
    var form = new FormData();
    form.append('api', 'api_admin_users_get_users_list');
    form.append('search', document.getElementById("search_user").value);
    axios.post('https://hackathon.localzet.com/api/admin/users/', form)
    .then(function (response) {
        if (response.data['status'] == 'ok'){
            var block = '';
            response.data['data'].forEach(async (user) => {
                url = 'https://hackathon.localzet.com/admin/users/'+user['user_id']+'/';
                if (user['speaker'] == 'true'){
                    speaker = '<img style="width:10%"  src="https://help.apple.com/assets/6393A71314463956C33C81DA/6393A71314463956C33C81E1/ru_RU/f8eaeb68e34424a04708382571477465.png">';
                }else{
                    speaker = '';
                }
                if (user['admin'] == 'true'){
                    admin = '<img style="width:10%" src="https://help.apple.com/assets/6393A71314463956C33C81DA/6393A71314463956C33C81E1/ru_RU/f8eaeb68e34424a04708382571477465.png">';
                }else{
                    admin = '';
                }
                block = block + '<tr class="even"> <td class="d-flex align-items-center"><div class="symbol symbol-circle symbol-50px overflow-hidden me-3"> <a href="'+url+'"> <div class="symbol-label"> <img src="'+user['img_url']+'" alt="Dan Wilson" class="w-100"> </div> </a> </div><div class="d-flex flex-column"> <a href="'+url+'" class="text-gray-800 text-hover-primary mb-1">'+user['firstname']+' '+user['lastname']+'</a> <span>'+user['email']+'</span> </div> </td> <td>'+speaker+'</td> <td> '+admin+' </td> </tr>';
              });
            document.getElementById('block_data').innerHTML = block
        }else{
            api_alert_error_callback();
        }
    }).catch(function (error) {
        console.log(error);
        api_alert_error_callback();
    });
}

function triger_api_admin_users_get_users_list(){
    clearTimeout(window.timer);
    window.timer = setTimeout(() => api_admin_users_get_users_list(), 1000);
}

function api_alert_error_callback(){
    Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      }).fire({
        icon: 'error',
        title: 'Ошибка API'
      });
}

function api_alert_success_save(text='Данные сохранены'){
    Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      }).fire({
        icon: 'success',
        title: text
      });
}

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
    form.append('select_user_id', window.select_user_id);
    axios.post('https://hackathon.localzet.com/api/admin/users/', form)
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