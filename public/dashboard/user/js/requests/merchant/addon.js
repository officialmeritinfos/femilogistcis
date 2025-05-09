const addonRequests = function () {
    //process new link addition
    const processNewLinkAddition = function (){
        //process the form submission
        $('#processAddonEnrollment').submit(function(e) {
            e.preventDefault();
            var baseURL = $('#processAddonEnrollment').attr('action');

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
                    $('.submit').attr('disabled', true);
                    $("#processAddonEnrollment :input").prop("readonly", true);
                    $(".submit").LoadingOverlay("show",{
                        text        : "processing...",
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
                            $("#processAddonEnrollment :input").prop("readonly", false);
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
                            $('.submit').attr('disabled', false);
                            $(".submit").LoadingOverlay("hide");
                            $("#processAddonEnrollment :input").prop("readonly", false);
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
                    $("#processAddonEnrollment :input").prop("readonly", false);
                    $('.submit').attr('disabled', false);
                    $(".submit").LoadingOverlay("hide");
                },
            });
        });
    }
    //form dom
    const addonDom = function (){
        $(function (){
            $('#debitAccount').change(function (){
                var asset = $('option:selected', this).data('asset');
                var balance = $('option:selected', this).data('balance');
                var rate = $('option:selected', this).data('rate');
                var price = $('option:selected', '#paymentType').data('price');
                var duration = $('option:selected', '#paymentType').data('duration');
                var cryptoAmount = price/rate;
                var CryptAmt = Number(cryptoAmount)+Number(0.00000001);
                var balanceFiat = balance*rate;

                $('#crypto').html('('+asset+')');
                $('#cryptoAmount').html(CryptAmt.toFixed(8));
                $('#fiatAmount').html('$'+price);
                $('#duration').html(duration);
                $('#accBalance').html(balance.toFixed(8)+' '+asset+'($'+balanceFiat.toFixed(2)+')')
                $('#accountInfo').show()

            });
            //check for change in duration
            $('#paymentType').change(function (){

                var asset = $('option:selected', '#debitAccount').data('asset');
                var balance = $('option:selected', '#debitAccount').data('balance');
                var rate = $('option:selected', '#debitAccount').data('rate');
                var price = $('option:selected', this).data('price');
                var duration = $('option:selected', this).data('duration');
                var cryptoAmount = price/rate;
                var CryptAmt = Number(cryptoAmount)+Number(0.00000001);

                $('#crypto').html('('+asset+')');
                $('#cryptoAmount').html(CryptAmt.toFixed(8));
                $('#fiatAmount').html('$'+price);
                $('#duration').html(duration);
            });
        })
    }

    return {
        init: function() {
            processNewLinkAddition();
            addonDom();
        }
    };
}();

jQuery(document).ready(function() {
    addonRequests.init();
});
