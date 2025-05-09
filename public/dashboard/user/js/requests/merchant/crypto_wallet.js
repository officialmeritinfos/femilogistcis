const CryptoWalletRequest = function (){
    const fundBalanceDom = function (){
        $('#receive_crypto').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var modal = $(this)
            var asset = button.data('asset');
            var url = button.data('url');
            var balance =0;
            $('#walletCode').html('');

            modal.find('.modal-title').html('Fund '+asset+' balance');

            //fetch balance details
            var balanceUrl=url

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: balanceUrl,
                method: "GET",
                data:$(this).serialize(),
                dataType:"json",
                beforeSend:function(){
                    modal.find('#loading').LoadingOverlay("show",{
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
                            modal.find('#loading').LoadingOverlay("hide");

                        }, 3000);
                    }
                    if(data.error === 'ok')
                    {
                        modal.find('.modal-title').html('Fund '+data.data.customCode+' Balance');

                        $('#walletCode').qrcode({
                            text:data.data.address,
                        });

                        modal.find('#address').html(data.data.address);
                        modal.find('#warningsText').html(data.data.notes);

                        modal.find('#loading').LoadingOverlay("hide");

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
    //transfer from main wallet dom
    const transferBalanceDom = function (){
        $('#transfer_crypto').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var modal = $(this)
            var asset = button.data('asset');
            var balance = Number(button.data('balance'));
            modal.find('.modal-title').html('Convert To Fiat' );
            var url = button.data('url');

            //fetch balance details
            var balanceUrl=url

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: balanceUrl,
                method: "GET",
                data:$(this).serialize(),
                dataType:"json",
                beforeSend:function(){
                    modal.find('#submitTransfer').LoadingOverlay("show",{
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
                            modal.find('#submitTransfer').LoadingOverlay("hide");

                        }, 3000);
                    }
                    if(data.error === 'ok')
                    {

                        minSend = Number(data.data.minConvert);
                        networkFee = Number(data.data.networkFee);
                        usdRateCoin = Number(data.data.coinUsdRate);
                        fiatRateUsd = Number(data.data.fiatRate);
                        balance = Number(data.data.balanceRaw);


                        modal.find('.assetDropdown').html(data.data.customCode);

                        modal.find('input[name="asset"]').val(asset)

                        modal.find('#sendBalanceNote').html('Your current ' +
                            ''+data.data.customCode+' balance is <b>'+data.data.balance+''+data.data.customCode+'</b>');

                        modal.find('.withdrawIcon').attr('src',data.data.icons)
                        modal.find('#submitTransfer').LoadingOverlay("hide");

                        $(modal.find('input[name="amount"]')).on('keyup',function () {

                            var amounts = $(this).val();
                            amounts = Number(amounts);

                            if (amounts>balance){


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
                                toastr.error('Amount is less than minimum transfer of '+minSend+data.data.customCode);

                            }

                            amountCredited = amounts - networkFee;

                            var amountCredit = amountCredited*usdRateCoin*fiatRateUsd

                            modal.find('.amountCredited').html(data.data.fiat+''+amountCredit.toLocaleString());
                            modal.find('.networkFee').html(networkFee+data.data.customCode);
                            modal.find('.fees').show();

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
    //process transfer from main wallet
    const processMainWalletTransfer = function (){
        //process the form submission
        $('#transferMainCrypto').submit(function(e) {
            e.preventDefault();
            var baseURL = $('#transferMainCrypto').attr('action');

            var formData = new FormData(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:'POST',
                url:baseURL,
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                dataType:"json",
                beforeSend:function(){
                    $('#submitTransfer').attr('disabled', true);
                    $("#transferMainCrypto :input").prop("readonly", true);
                    $("#submitTransfer").LoadingOverlay("show",{
                        text        : "submitting...",
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
                            $('#submitTransfer').attr('disabled', false);
                            $("#submitTransfer").LoadingOverlay("hide");
                            $("#transferMainCrypto :input").prop("readonly", false);
                        }, 3000);
                    }
                    if(data.error === 'ok')
                    {
                        toastr.options = {
                            "closeButton" : true,
                            "progressBar" : true
                        }
                        toastr.info(data.message);

                        setTimeout(function(){
                            $('#submitTransfer').attr('disabled', false);
                            $("#submitTransfer").LoadingOverlay("hide");
                            $("#transferMainCrypto :input").prop("readonly", false);
                            window.location.replace(data.data.redirectTo)
                        }, 5000);
                    }
                },
                error:function (jqXHR, textStatus, errorThrown){
                    toastr.options = {
                        "closeButton" : true,
                        "progressBar" : true
                    }
                    toastr.error(errorThrown);
                    $("#transferMainCrypto :input").prop("readonly", false);
                    $('#submitTransfer').attr('disabled', false);
                    $("#submitTransfer").LoadingOverlay("hide");
                },
            });
        });
    }

    return {
        init: function() {
            fundBalanceDom();
            transferBalanceDom();
            processMainWalletTransfer();
        }
    };
}();

jQuery(document).ready(function() {
    CryptoWalletRequest.init();
});
