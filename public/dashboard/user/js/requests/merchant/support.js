const supportRequests=function (){
    const createTicket=function (){
        $('#ticketCreation').submit(function(e) {
            e.preventDefault();
            var baseURL = $('#ticketCreation').attr('action');
            var baseURLs='';
            var formData = new FormData(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: baseURL,
                method: "POST",
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                dataType:"json",
                beforeSend:function(){
                    $('#submit').attr('disabled', true);
                    $("#ticketCreation :input").prop("readonly", true);
                    $("#submit").LoadingOverlay("show",{
                        text        : "creating...",
                        size        : "20"
                    });
                },
                success:function(data)
                {
                    if(data.error===true)
                    {
                        toastr.options = {
                            "closeButton" : true,
                            "progressBar" : true
                        }
                        toastr.error(data.data.error);

                        //return to natural stage
                        setTimeout(function(){
                            $('#submit').attr('disabled', false);
                            $("#submit").LoadingOverlay("hide");
                            $("#ticketCreation :input").prop("readonly", false);
                            // $("#ticketCreation")[0].reset();
                        }, 3000);
                    }
                    if(data.error === 'ok')
                    {
                        toastr.options = {
                            "closeButton" : true,
                            "progressBar" : true
                        }
                        toastr.info(data.message);
                        //return to natural stage
                        setTimeout(function(){
                            $('#submit').attr('disabled', false);
                            $("#submit").LoadingOverlay("hide");
                            $("#ticketCreation :input").prop("readonly", false);
                            window.location.href=data.data.redirectTo
                        }, 5000);
                    }
                },
                error:function (jqXHR, textStatus, errorThrown){
                    toastr.options = {
                        "closeButton" : true,
                        "progressBar" : true
                    }
                    toastr.error(errorThrown);
                    $("#ticketCreation :input").prop("readonly", false);
                    $('#submit').attr('disabled', false);
                    $("#submit").LoadingOverlay("hide");
                },
            });
        });
    }

    const sendReply=function (){
        $('#sendResponse').submit(function(e) {
            e.preventDefault();
            var baseURL = $('#sendResponse').attr('action');
            var baseURLs='';
            var formData = new FormData(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: baseURL,
                method: "POST",
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                dataType:"json",
                beforeSend:function(){
                    $('#submit').attr('disabled', true);
                    $("#sendResponse :input").prop("readonly", true);
                    $("#submit").LoadingOverlay("show",{
                        text        : "sending...",
                        size        : "20"
                    });
                },
                success:function(data)
                {
                    if(data.error===true)
                    {
                        toastr.options = {
                            "closeButton" : true,
                            "progressBar" : true
                        }
                        toastr.error(data.data.error);

                        //return to natural stage
                        setTimeout(function(){
                            $('#submit').attr('disabled', false);
                            $("#submit").LoadingOverlay("hide");
                            $("#sendResponse :input").prop("readonly", false);
                            // $("#ticketCreation")[0].reset();
                        }, 3000);
                    }
                    if(data.error === 'ok')
                    {
                        toastr.options = {
                            "closeButton" : true,
                            "progressBar" : true
                        }
                        toastr.info(data.message);
                        //return to natural stage
                        setTimeout(function(){
                            $('#submit').attr('disabled', false);
                            $("#submit").LoadingOverlay("hide");
                            $("#sendResponse :input").prop("readonly", false);
                            window.location.href=data.data.redirectTo
                        }, 5000);
                    }
                },
                error:function (jqXHR, textStatus, errorThrown){
                    toastr.options = {
                        "closeButton" : true,
                        "progressBar" : true
                    }
                    toastr.error(errorThrown);
                    $("#sendResponse :input").prop("readonly", false);
                    $('#submit').attr('disabled', false);
                    $("#submit").LoadingOverlay("hide");
                },
            });
        });
    }

    return {
        init: function() {
            createTicket();
            sendReply();
        }
    };
}();

jQuery(document).ready(function() {
    supportRequests.init();
});
