
var Ajax = {

    get: function (url, success, data = null, beforeSend = null) {

        $.ajax({

            cache: false,
            url: base_url + '/' + url,
            type: "GET",
            data: data,
            success: function(response){

            App[success](response);

            },
            beforeSend: function(){

            if(beforeSend)
            App[beforeSend]();

            }

        });
    }


};

var App = {


    GetReservationData: function (id, date) {

        Ajax.get('ajaxGetReservationData', 'AfterGetReservationData',{room_id: id, date: date},'BeforeGetReservationData');


    },
    BeforeGetReservationData: function() {



    },
    AfterGetReservationData: function(response) {



    }


};
