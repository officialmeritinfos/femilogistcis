const payQInvoiceRequest=function () {
    const payQInvoiceFromAccount=function (){
        $('#payQuickInvoiceFromAccount').submit(function (e) {
            e.preventDefault();

            var baseURL = $('#payQuickInvoiceFromAccount').attr('action');
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
                    $('.submit').attr('disabled', true);
                    $("#payQuickInvoiceFromAccount :input").prop("readonly", true);
                    $(".submit").LoadingOverlay("show",{
                        text        : "please wait...",
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
                            $("#payQuickInvoiceFromAccount :input").prop("readonly", false);
                            // $("#payQuickInvoiceFromAccount")[0].reset();
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
                            $('.submit').attr('disabled', false);
                            $(".submit").LoadingOverlay("hide");
                            $("#payQuickInvoiceFromAccount :input").prop("readonly", false);
                            if (data.data.redirectTo!==false){
                                window.location.href=data.data.redirectTo
                            }
                        }, 5000);
                    }
                },
                error:function (jqXHR, textStatus, errorThrown){
                    toastr.options = {
                        "closeButton" : true,
                        "progressBar" : true
                    }
                    toastr.error(errorThrown);
                    $("#payQuickInvoiceFromAccount :input").prop("readonly", false);
                    $('.submit').attr('disabled', false);
                    $(".submit").LoadingOverlay("hide");
                },
            });
        });
    }

    const generateQInvoicePaymentInformation=function (){
        $('#getQuickInvoiceAddress').submit(function (e) {
            e.preventDefault();

            var baseURL = $('#getQuickInvoiceAddress').attr('action');
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
                    $('.generate').attr('disabled', true);
                    $("#getQuickInvoiceAddress :input").prop("readonly", true);
                    $(".generate").LoadingOverlay("show",{
                        text        : "please wait...",
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
                            $('.generate').attr('disabled', false);
                            $(".generate").LoadingOverlay("hide");
                            $("#getQuickInvoiceAddress :input").prop("readonly", false);
                            // $("#payQuickInvoiceFromAccount")[0].reset();
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
                            $('.generate').attr('disabled', false);
                            $(".generate").LoadingOverlay("hide");
                            $("#getQuickInvoiceAddress :input").prop("readonly", false);
                            if (data.data.redirectTo!==false){
                                window.location.href=data.data.redirectTo
                            }
                        }, 5000);
                    }
                },
                error:function (jqXHR, textStatus, errorThrown){
                    toastr.options = {
                        "closeButton" : true,
                        "progressBar" : true
                    }
                    toastr.error(errorThrown);
                    $("#getQuickInvoiceAddress :input").prop("readonly", false);
                    $('.generate').attr('disabled', false);
                    $(".generate").LoadingOverlay("hide");
                },
            });
        });
    }

    return {
        init: function() {
            payQInvoiceFromAccount();
            generateQInvoicePaymentInformation();
        }
    };
}();

jQuery(document).ready(function() {
    payQInvoiceRequest.init();
});
