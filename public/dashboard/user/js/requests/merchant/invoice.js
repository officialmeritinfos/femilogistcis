const invoiceRequest = function (){
    //delete invoice
    const deleteInvoice = function (){
        //process the form submission
        $('#deleteInvoice').submit(function(e) {
            e.preventDefault();
            var baseURL = $('#deleteInvoice').attr('action');
            var baseURLs='';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: baseURL,
                method: "POST",
                data:$(this).serialize(),
                dataType:"json",
                beforeSend:function(){
                    $('#submitDelete').attr('disabled', true);
                    $("#deleteInvoice :input").prop("readonly", true);
                    $("#submitDelete").LoadingOverlay("show",{
                        text        : "deleting...",
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
                            $('#submitDelete').attr('disabled', false);
                            $("#submitDelete").LoadingOverlay("hide");
                            $("#deleteInvoice :input").prop("readonly", false);
                            $("#deleteInvoice")[0].reset();
                        }, 3000);
                    }
                    if(data.error === 'ok')
                    {
                        localStorage.setItem('webTk',data.data.token);


                        var pageTo = data.data.redirectTo;

                        toastr.options = {
                            "closeButton" : true,
                            "progressBar" : true
                        }
                        toastr.info(data.message);
                        //return to natural stage
                        setTimeout(function(){
                            $('#submitDelete').attr('disabled', false);
                            $("#submitDelete").LoadingOverlay("hide");
                            $("#deleteInvoice :input").prop("readonly", false);
                            location.href=pageTo;
                        }, 5000);
                    }
                },
                error:function (jqXHR, textStatus, errorThrown){
                    toastr.options = {
                        "closeButton" : true,
                        "progressBar" : true
                    }
                    toastr.error(errorThrown);
                    $("#deleteInvoice :input").prop("readonly", false);
                    $('#submitDelete').attr('disabled', false);
                    $("#submitDelete").LoadingOverlay("hide");
                },
            });
        });
    }

    //cancel invoice
    const cancelInvoice = function (){
        //process the form submission
        $('#cancelInvoice').submit(function(e) {
            e.preventDefault();
            var baseURL = $('#cancelInvoice').attr('action');
            var baseURLs='';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: baseURL,
                method: "POST",
                data:$(this).serialize(),
                dataType:"json",
                beforeSend:function(){
                    $('#submitCancel').attr('disabled', true);
                    $("#cancelInvoice :input").prop("readonly", true);
                    $("#submitCancel").LoadingOverlay("show",{
                        text        : "cancelling...",
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
                            $('#submitCancel').attr('disabled', false);
                            $("#submitCancel").LoadingOverlay("hide");
                            $("#cancelInvoice :input").prop("readonly", false);
                            //$("#cancelInvoice")[0].reset();
                        }, 3000);
                    }
                    if(data.error === 'ok')
                    {
                        localStorage.setItem('webTk',data.data.token);


                        var pageTo = data.data.redirectTo;

                        toastr.options = {
                            "closeButton" : true,
                            "progressBar" : true
                        }
                        toastr.info(data.message);
                        //return to natural stage
                        setTimeout(function(){
                            $('#submitCancel').attr('disabled', false);
                            $("#submitCancel").LoadingOverlay("hide");
                            $("#cancelInvoice :input").prop("readonly", false);
                            location.href=pageTo;
                        }, 5000);
                    }
                },
                error:function (jqXHR, textStatus, errorThrown){
                    toastr.options = {
                        "closeButton" : true,
                        "progressBar" : true
                    }
                    toastr.error(errorThrown);
                    $("#cancelInvoice :input").prop("readonly", false);
                    $('#submitCancel').attr('disabled', false);
                    $("#submitDelete").LoadingOverlay("hide");
                },
            });
        });
    }

    //cancel invoice
    const payInvoice = function (){
        //process the form submission
        $('#payInvoice').submit(function(e) {
            e.preventDefault();
            var baseURL = $('#payInvoice').attr('action');
            var baseURLs='';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: baseURL,
                method: "POST",
                data:$(this).serialize(),
                dataType:"json",
                beforeSend:function(){
                    $('#submit').attr('disabled', true);
                    $("#payInvoice :input").prop("readonly", true);
                    $("#submit").LoadingOverlay("show",{
                        text        : "updating...",
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
                            $("#payInvoice :input").prop("readonly", false);
                            //$("#cancelInvoice")[0].reset();
                        }, 3000);
                    }
                    if(data.error === 'ok')
                    {
                        localStorage.setItem('webTk',data.data.token);


                        var pageTo = data.data.redirectTo;

                        toastr.options = {
                            "closeButton" : true,
                            "progressBar" : true
                        }
                        toastr.info(data.message);
                        //return to natural stage
                        setTimeout(function(){
                            $('#submit').attr('disabled', false);
                            $("#submit").LoadingOverlay("hide");
                            $("#payInvoice :input").prop("readonly", false);
                            location.href=pageTo;
                        }, 5000);
                    }
                },
                error:function (jqXHR, textStatus, errorThrown){
                    toastr.options = {
                        "closeButton" : true,
                        "progressBar" : true
                    }
                    toastr.error(errorThrown);
                    $("#payInvoice :input").prop("readonly", false);
                    $('#submit').attr('disabled', false);
                    $("#submit").LoadingOverlay("hide");
                },
            });
        });
    }

    //send invoice reminder
    const sendInvoiceReminder = function (){
        //process the form submission
        $('#notifyPayer').submit(function(e) {
            e.preventDefault();
            var baseURL = $('#notifyPayer').attr('action');
            var baseURLs='';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: baseURL,
                method: "POST",
                data:$(this).serialize(),
                dataType:"json",
                beforeSend:function(){
                    $('.submit').attr('disabled', true);
                    $("#notifyPayer :input").prop("readonly", true);
                    $(".submit").LoadingOverlay("show",{
                        text        : "sending reminder...",
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
                            $('.submit').attr('disabled', false);
                            $(".submit").LoadingOverlay("hide");
                            $("#notifyPayer :input").prop("readonly", false);
                            //$("#cancelInvoice")[0].reset();
                        }, 3000);
                    }
                    if(data.error === 'ok')
                    {
                        localStorage.setItem('webTk',data.data.token);


                        var pageTo = data.data.redirectTo;

                        toastr.options = {
                            "closeButton" : true,
                            "progressBar" : true
                        }
                        toastr.info(data.message);
                        //return to natural stage
                        setTimeout(function(){
                            $('.submit').attr('disabled', false);
                            $(".submit").LoadingOverlay("hide");
                            $("#notifyPayer :input").prop("readonly", false);
                            location.href=pageTo;
                        }, 5000);
                    }
                },
                error:function (jqXHR, textStatus, errorThrown){
                    toastr.options = {
                        "closeButton" : true,
                        "progressBar" : true
                    }
                    toastr.error(errorThrown);
                    $("#notifyPayer :input").prop("readonly", false);
                    $('.submit').attr('disabled', false);
                    $(".submit").LoadingOverlay("hide");
                },
            });
        });
    }


    return {
        init: function() {
            deleteInvoice();
            cancelInvoice();
            payInvoice();
            sendInvoiceReminder();
        }
    };
}();

jQuery(document).ready(function() {
    invoiceRequest.init();
});
