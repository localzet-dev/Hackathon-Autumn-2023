function api_events_get_events_list(){
    var form = new FormData();
    form.append('api', 'api_events_get_events_list');
    //form.append('search', document.getElementById("search_user").value);
    axios.post('https://hackathon.localzet.com/events/api/', form)
    .then(function (response) {
        if (response.data['status'] == 'ok'){
            var block = '';
            response.data['data'].forEach(async (event) => {
                url = 'https://hackathon.localzet.com/events/'+event['event_id']+'/';
               
                block = block + '<div class="col-md-4"> <div class="card-xl-stretch me-md-6"> <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="'+url+'"> <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url('+event['img_url']+')"> </div> <div class="overlay-layer card-rounded bg-dark bg-opacity-25"> <i class="ki-duotone ki-eye fs-2x text-white"> <span class="path1"></span> <span class="path2"></span> <span class="path3"></span> </i> </div> </a> <div class="mt-5"> <a href="#" class="fs-4 text-dark fw-bold text-hover-primary text-dark lh-base">'+event['title']+' </a> <div class="fw-semibold fs-5 text-gray-600 text-dark mt-3"> '+event['description']+' </div> <div class="fs-6 fw-bold mt-5 d-flex flex-stack"> <span class="badge border border-dashed fs-2 fw-bold text-dark p-2"> <a href="'+url+'" class="btn btn-sm btn-primary">Перейти</a> </span></div> </div> </div> </div>';
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

function triger_api_events_get_events_list(){
    clearTimeout(window.timer);
    window.timer = setTimeout(() => api_events_get_events_list(), 1000);
}

function api_events_user_member(){
    var form = new FormData();
    form.append('api', 'api_events_user_member');
    form.append('event_id', window.event_id);
    axios.post('https://hackathon.localzet.com/events/api/', form)
        .then(function (response) {
            if (response.data['status'] == 'ok'){
                window.location.reload();
            }else{
                api_alert_error_callback();
            }
        }).catch(function (error) {
            console.log(error);
            api_alert_error_callback();
        });
    }