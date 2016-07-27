
import $ from 'jquery';
import {ProductAction} from '../actions/ProductAction';

const range = require('./ion.rangeSlider.min');

$("#range").ionRangeSlider({
    type: "double",
    grid: true,
    min: 0,
    max: 5000,
    prefix: "$",
    onFinish:(data)=>{
        $('#price-from').val(data.from);
        $('#price-to').val(data.to);      
        reload();  
    }
});

let slider = $("#range").data("ionRangeSlider");

function setInitialValues(){
    let hash = decodeURI(window.location.hash);
    let data = hash.substr(hash.indexOf('[')+1, hash.length-hash.indexOf('[')-2).split('&');
    let obj_params = {};
    let wasCalled = false;
    $.each(data, function(i,param){
        let part = param.split('=');
        obj_params[part[0]] = part[1].split('|');
    });


    //set values for each field
    for(let name in obj_params){
        for(let item in obj_params[name]){
            if(name == 'price' && !wasCalled){
                $('#price-from').val(obj_params[name][0]);
                $('#price-to').val(obj_params[name][1]);

                slider.update({
                    from: obj_params[name][0],
                    to: obj_params[name][1],
                });

                wasCalled = true;

            } else {
                $('[value="'+obj_params[name][item]+'"]').prop('checked', true);
            }
        }
    }
}
let sh = true;

//ajax calls based on selected filter
function reload(showHash = true){
    sh = showHash;
    $('.filtering').submit();

    let hash = decodeURI(window.location.hash);
    let data = hash.substr(hash.indexOf('[')+1, hash.length-hash.indexOf('[')-2);

    $.ajax({
        type:'GET',
        url:window.location.origin+'/filter',
        data:data,
        success:function(res){
            //update data
            ProductAction.update_products(JSON.parse(res));
        }
    });
}

//form submit
$('.filtering').on('submit', function(e){
    e.preventDefault();

    //querystring to sending string
    let params = decodeURI($(this).serialize()).split('&');
    let obj_params = {};
    let sending_string = "";
    $.each(params, function(inx, param){
        let part = param.split('=');
        let name = part[0].replace('[]', '');
        if(!obj_params.hasOwnProperty(name))
            obj_params[name] = part[1].toLowerCase();
        else    
            obj_params[name]+='|'+part[1].toLowerCase();
    });

    for(let param in obj_params){
        sending_string += param+'='+obj_params[param]+'&';
    }
    sending_string = sending_string.substr(0, sending_string.length-1);

    if(sh)
        window.location.assign( window.location.origin+'#filter['+encodeURI(sending_string)+']');
});

//update once checkbox was clicked
$('.from-group .row').find('[type="checkbox"]').on('click', function(e){
    //update filter
    reload();
});

export {
    reload,
    setInitialValues
}