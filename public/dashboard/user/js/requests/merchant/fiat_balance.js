const fiatBalanceRequests=function (){
    //perform withdrawal DOM
    const withdrawalDom = function (){
        $('#withdraw_balance').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var modal = $(this)
            var fiat = button.data('currency');
            var bankUrl = button.data('bank');
            var accountChargeUrl = button.data('account');

            var balance = 0;



            modal.find('.modal-title').html('Withdraw '+fiat+' balance');
            modal.find('#withdrawIcon').attr('src','../../currency/'+fiat.toLowerCase()+'.png');

            modal.find('#withdrawNGN').trigger('reset');
            var account = modal.find('select[name="account"]');
            modal.find('#fiatDropdown').html(fiat);


            modal.find('input[name="currency"]').val(fiat);

            var bankURL=bankUrl;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: bankURL,
                method: "GET",
                data:$(this).serialize(),
                dataType:"json",
                beforeSend:function(){
                    modal.find('#submit').LoadingOverlay("show",{
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
                            modal.find('#submit').LoadingOverlay("hide");

                        }, 3000);
                    }
                    if(data.error === 'ok')
                    {

                        $(account).empty();
                        $(account).append('<option value=""> Select Bank</option>');
                        for (var t = "", o = 0; o < data.data.banks.length; o++) {

                            t += '<option value="' + data.data.banks[o].id + '"> ' +data.data.banks[o].bankName+
                                ' (' + data.data.banks[o].accName +' - '+data.data.banks[o].accNumber+ ' )'+
                                "</option>";
                        }
                        $(account).append(t)
                        modal.find('#submit').LoadingOverlay("hide");
                        balance = data.data.balance;
                        modal.find('input[name="balance"]').val(balance);

                        modal.find('#sendBalanceNote').html('Your current '+fiat+' balance is ' +
                            '<b>'+fiat+' '+Number(balance).toLocaleString("en-US")+'</b>');

                    }
                },
                error:function (jqXHR, textStatus, errorThrown){
                    toastr.options = {
                        "closeButton" : true,
                        "progressBar" : true
                    }
                    toastr.error(errorThrown);

                    modal.find('#submit').LoadingOverlay("hide");
                },
            });

            //fetch the charges
            modal.find('input[name="fiatAmount"]').keyup(function (){
                var amount = $(this).val();
                var bal = modal.find('input[name="balance"]').val();

                modal.find('#submit').attr('disabled',false)

                var feeURL=accountChargeUrl+'/'+amount;

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: feeURL,
                    method: "GET",
                    data:$(this).serialize(),
                    dataType:"json",
                    beforeSend:function(){
                        modal.find('#submit').LoadingOverlay("show",{
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
                                modal.find('#submit').LoadingOverlay("hide");

                            }, 3000);
                        }
                        if(data.error === 'ok')
                        {
                            modal.find('#fiat').html(data.data.fiat);
                            modal.find('#fiats').html(data.data.fiat);
                            modal.find('#chargeRate').html(data.data.fee.toLocaleString());

                            modal.find('#submit').LoadingOverlay("hide");

                            var minAmount = Number(data.data.minAmount);
                            if(amount < minAmount){
                                modal.find('#submit').attr('disabled',true);
                                toastr.options = {
                                    "closeButton" : true,
                                    "progressBar" : true,
                                    "preventDuplicates":true
                                }
                                toastr.error('Withdrawal amount cannot be less than '+fiat+minAmount);

                            }else{
                                modal.find('#submit').attr('disabled',false);
                            }

                            modal.find('#amountGet').html(data.data.amountDebit.toLocaleString());
                            var amountDebit = data.data.amountDebit;
                            if(amountDebit > bal){
                                toastr.options = {
                                    "closeButton" : true,
                                    "progressBar" : true,
                                    "preventDuplicates":true
                                }
                                toastr.error('Insufficient Balance');

                                modal.find('#submit').attr('disabled',true);
                            }else{
                                modal.find('#submit').attr('disabled',false);
                            }
                            modal.find('#charges').show();
                        }
                    },
                    error:function (jqXHR, textStatus, errorThrown){
                        toastr.options = {
                            "closeButton" : true,
                            "progressBar" : true
                        }
                        toastr.error(errorThrown);

                        modal.find('#submit').LoadingOverlay("hide");
                    },
                });
            });
        });
    }
    const withdrawFiatBalance=function () {
        $('#withdrawNGN').submit(function (e) {
            e.preventDefault();

            var baseURL = $('#withdrawNGN').attr('action');
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
                    $("#withdrawNGN :input").prop("readonly", true);
                    $("#submit").LoadingOverlay("show",{
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
                            $('#submit').attr('disabled', false);
                            $("#submit").LoadingOverlay("hide");
                            $("#withdrawNGN :input").prop("readonly", false);
                            // $("#withdrawNGN")[0].reset();
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
                            $("#withdrawNGN :input").prop("readonly", false);
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
                    $("#withdrawNGN :input").prop("readonly", false);
                    $('#submit').attr('disabled', false);
                    $("#submit").LoadingOverlay("hide");
                },
            });
        });
    }

    return {
        init: function() {
            withdrawalDom();
            withdrawFiatBalance();
        }
    };
}();

jQuery(document).ready(function() {
    fiatBalanceRequests.init();
});
