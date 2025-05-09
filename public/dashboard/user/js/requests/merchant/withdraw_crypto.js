const withdrawCryptoRequest=function (){

    const withdrawDom = function (){
        $('#send_crypto').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var modal = $(this)
            var asset = button.data('asset');
            var url = button.data('url');

            var networkFee=0;
            var amountCredited=0;
            var balance=0;
            var minSend=0;
            var amount = 0;


            modal.find('.modal-title').html('Withdraw');

            modal.find('#withdrawCrypto').trigger('reset');

            modal.find('input[name="amount"]').attr('type', 'number');

            modal.find('input[name="amount"]').attr('step', '0.000000002');



            var balanceURL=url;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: balanceURL,
                method: "GET",
                data:$(this).serialize(),
                dataType:"json",
                beforeSend:function(){
                    modal.find('.submit').LoadingOverlay("show",{
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
                            modal.find('.submit').LoadingOverlay("hide");

                        }, 3000);
                    }
                    if(data.error === 'ok')
                    {

                        minSend = Number(data.data.minWithdrawal);
                        networkFee = Number(data.data.networkFee);
                        balance = Number(data.data.balanceRaw);

                        modal.find('.modal-title').html('Withdraw');


                        modal.find('#assetDropdown').html(data.data.customCode);

                        modal.find('input[name="asset"]').val(asset)

                        modal.find('#sendBalanceNote').html('Your current ' +
                            ''+data.data.customCode+' balance is <b>'+data.data.balance+''+data.data.customCode+'</b>');

                        modal.find('.withdrawIcon').attr('src',data.data.icons)
                        modal.find('.submit').LoadingOverlay("hide");

                        $(modal.find('input[name="amount"]')).on('keyup',function () {


                            var amounts = $(this).val();
                            amounts = Number(amounts);

                            amountCredited = amounts + networkFee;

                            if (amountCredited>balance){


                                toastr.options = {
                                    "closeButton" : true,
                                    "progressBar" : true,
                                    "preventDuplicates":true
                                }
                                toastr.error('Insufficient Balance.');
                            }

                            if (amounts<minSend){

                                toastr.options = {
                                    "closeButton" : true,
                                    "progressBar" : true,
                                    "preventDuplicates":true
                                }
                                toastr.error('Amount is less than minimum withdrawal of '+minSend+data.data.customCode);

                            }


                            modal.find('#amountCredited').html(amountCredited+data.data.customCode);
                            modal.find('#networkFee').html(networkFee+data.data.customCode);
                            modal.find('#fees').show();

                        });


                    }
                },
                error:function (jqXHR, textStatus, errorThrown){
                    toastr.options = {
                        "closeButton" : true,
                        "progressBar" : true
                    }
                    toastr.error(errorThrown);

                    modal.find('#loading').LoadingOverlay("hide");
                },
            });

        });
    }
    const sendCrypto=function () {
        $('#withdrawCrypto').submit(function (e) {
            e.preventDefault();

            var baseURL = $('#withdrawCrypto').attr('action');
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
                    $("#withdrawCrypto :input").prop("readonly", true);
                    $(".submit").LoadingOverlay("show",{
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
                            $('.submit').attr('disabled', false);
                            $(".submit").LoadingOverlay("hide");
                            $("#withdrawCrypto :input").prop("readonly", false);
                            // $("#withdrawCrypto")[0].reset();
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
                            $("#withdrawCrypto :input").prop("readonly", false);
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
                    $("#withdrawCrypto :input").prop("readonly", false);
                    $('.submit').attr('disabled', false);
                    $(".submit").LoadingOverlay("hide");
                },
            });
        });
    }
    const cancelWithdrawDom = function (){
        $('#cancelWithdrawal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var modal = $(this)
            var reference = button.data('reference');
            var transRef = button.data('ref');
            var url = button.data('url');


            modal.find('.modal-title').html('Cancel Withdrawal');

            modal.find('input[name="reference"]').val(reference);
            modal.find('input[name="transRef"]').val(transRef);

        });
    }
    const cancelWithdraw=function () {
        $('#cancelWithdraw').submit(function (e) {
            e.preventDefault();

            var baseURL = $('#cancelWithdraw').attr('action');
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
                    $("#cancelWithdraw :input").prop("readonly", true);
                    $(".submit").LoadingOverlay("show",{
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
                            $('.submit').attr('disabled', false);
                            $(".submit").LoadingOverlay("hide");
                            $("#cancelWithdraw :input").prop("readonly", false);
                            // $("#withdrawCrypto")[0].reset();
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
                            $("#cancelWithdraw :input").prop("readonly", false);
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
                    $("#cancelWithdraw :input").prop("readonly", false);
                    $('.submit').attr('disabled', false);
                    $(".submit").LoadingOverlay("hide");
                },
            });
        });
    }

    return {
        init: function() {
            withdrawDom();
            sendCrypto();
            cancelWithdrawDom();
            cancelWithdraw();
        }
    };
}();

jQuery(document).ready(function() {
    withdrawCryptoRequest.init();
});
