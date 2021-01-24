function showErrors(divId, message){
    $(`#${divId}`).html("");

    let errorMessage = "";
    if (message != null && typeof message !== "undefined") {
        errorMessage += `<ul class="alert alert-danger">`
        $.each(message, function(key, data){
            errorMessage += `<li>${data}</li>`;
        });
        errorMessage += `</ul>`;
    }

    $(`#${divId}`).html(errorMessage);
}

function clearValidations(){
    $(".is-invalid").each(function(key, data){
        $(this).removeClass('is-invalid');
    });
}

function showValidations(message){
    if (message != null && typeof message !== "undefined") {
        $.each(message, function(key, data){
            console.log(`[name='${key}']`);
            $(`[name='${key}']`).addClass('is-invalid');
        });
    }

}

function isJson(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}

function CreateGuid() {  
    function _p8(s) {  
       var p = (Math.random().toString(16)+"000000000").substr(2,8);  
       return s ? "-" + p.substr(0,4) + "-" + p.substr(4,4) : p ;  
    }  
    return _p8() + _p8(true) + _p8(true) + _p8();  
 } 

$(document).on("blur", ".number", function(){
    let val = $(this).val().replace(/,/g,'');

    if(!isNaN(val) && val!="" ){
        $(this).val(parseInt(val).toLocaleString("en"));
    }else{
        $(this).val('0');
    }
 });