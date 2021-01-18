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