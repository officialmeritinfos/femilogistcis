const simpleInvoice = function (){
    //add link
    const addInvoice = function (){
        //process the form submission
        $('#simpleInvoice').submit(function(e) {
            e.preventDefault();
            var baseURL = $('#simpleInvoice').attr('action');
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
                    $("#simpleInvoice :input").prop("readonly", true);
                    $("#submit").LoadingOverlay("show",{
                        text        : "creating",
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
                            $("#simpleInvoice :input").prop("readonly", false);
                            //$("#simpleInvoice")[0].reset();
                        }, 3000);
                    }
                    if(data.error === 'ok')
                    {

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
                            $("#simpleInvoice :input").prop("readonly", false);
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
                    $("#simpleInvoice :input").prop("readonly", false);
                    $('#submit').attr('disabled', false);
                    $("#submit").LoadingOverlay("hide");
                },
            });
        });
    }
    const fetchCurrencyDetails = function (){
        $('#currency').on('change',function (){
           let curr = this.value;
            var baseURL='../../../../invoices/get_currency/'+curr+'/details'
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
                    $("#submit").LoadingOverlay("show",{
                        text        : "fetching",
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

                        }, 3000);
                    }
                    if(data.error === 'ok')
                    {
                        $('#submit').attr('disabled', false);
                        $("#submit").LoadingOverlay("hide");
                        $("#curr").html(curr);
                        $("#amt").html(data.data.minDeposit);


                    }
                },
                error:function (jqXHR, textStatus, errorThrown){
                    toastr.options = {
                        "closeButton" : true,
                        "progressBar" : true
                    }
                    toastr.error(errorThrown);
                    $("#simpleInvoice :input").prop("readonly", false);
                    $('#submit').attr('disabled', false);
                    $("#submit").LoadingOverlay("hide");
                },
            });
        });
    }

    return {
        init: function() {
            addInvoice();
            fetchCurrencyDetails();
        }
    };
}();

jQuery(document).ready(function() {
    simpleInvoice.init();
});
