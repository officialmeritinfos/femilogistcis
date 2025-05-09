const bankRequest=function (){

    const fetchBank =function (){
        //fetch banks
        $( "#addBank" ).on('shown.bs.modal', function(event){
            var button = $(event.relatedTarget)
            var modal = $(this)
            var bank = modal.find('select[name="bank"]');

            var baseURL = bank.data('url');

            bank.empty();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: baseURL,
                method: "GET",
                dataType:"json",
                beforeSend:function(){
                    $(bank).attr('disabled', true);
                    $(bank).prop("readonly", true);
                    $(bank).LoadingOverlay("show",{
                        text        : "please wait ...",
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
                            $(bank).attr('disabled', false);
                            $(bank).LoadingOverlay("hide");
                            $(bank).prop("readonly", false);
                        }, 3000);
                    }
                    if(data.error === 'ok')
                    {
                        //console.log(data.data);

                        for (var t = "", o = 0; o < data.data.data.length; o++){
                            t += '<option value="' + data.data.data[o].code + '">' + data.data.data[o].name + "</option>";
                        }
                        $(bank).append(t);

                        $(bank).attr('disabled', false);
                        $(bank).LoadingOverlay("hide");
                        $(bank).prop("readonly", false);

                        $("#banks").selectize()
                    }
                },
                error:function (jqXHR, textStatus, errorThrown){
                    toastr.options = {
                        "closeButton" : true,
                        "progressBar" : true
                    }
                    toastr.error(errorThrown);
                    $(bank).prop("readonly", false);
                    $(bank).attr('disabled', false);
                    $(bank).LoadingOverlay("hide");
                },
            });

        });
    }
    const fetchAccountName=function (){

        $('#accNumber').on('input', function(e) {
            var bank = $('#banks').val();

            if (bank===''){
                toastr.options = {
                    "closeButton" : true,
                    "progressBar" : true
                }
                toastr.error('Please select bank first');
            }

            var value = $(this).val();

            if (value.length === 10) {


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '../dashboard/resolve-account/'+value+'/'+bank,
                    method: "GET",
                    dataType:"json",
                    beforeSend:function(){
                        $('#submitBank').attr('disabled', true);
                        $('#submitBank').prop("readonly", true);
                        $('#submitBank').LoadingOverlay("show",{
                            text        : "please wait ...",
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
                                $('#submitBank').attr('disabled', false);
                                $('#submitBank').LoadingOverlay("hide");
                                $('#submitBank').prop("readonly", false);
                            }, 3000);
                        }
                        if(data.error === 'ok')
                        {
                            $('#accName').val(data.data.account_name);
                            $('#accNamespan').text(data.data.account_name);

                            $('#accNameHolder').show();
                            $('#submitBank').attr('disabled', false);
                            $('#submitBank').LoadingOverlay("hide");
                            $('#submitBank').prop("readonly", false);
                        }
                    },
                    error:function (jqXHR, textStatus, errorThrown){
                        toastr.options = {
                            "closeButton" : true,
                            "progressBar" : true
                        }
                        toastr.error(errorThrown);
                        $('#submitBank').prop("readonly", false);
                        $('#submitBank').attr('disabled', false);
                        $('#submitBank').LoadingOverlay("hide");
                    },
                });
            }
        });

    }

    return {
        init: function() {
            fetchBank();
            fetchAccountName();
        }
    };
}();

jQuery(document).ready(function() {
    bankRequest.init();
});

