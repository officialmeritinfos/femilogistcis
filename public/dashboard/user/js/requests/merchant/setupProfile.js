const setupProfileRequest=function (){

    const claimHandle =function (){
        $('#claimHandle').on('click',function (e){
           var baseURL = $(this).data('link');
           var data = $('#basicUrl').serialize();
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: baseURL,
                method: "POST",
                data:data,
                dataType:"json",
                beforeSend:function(){
                    $('#claimHandle').attr('disabled', true);
                    $("#updateProfile :input").prop("readonly", true);
                    $("#claimHandle").LoadingOverlay("show",{
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
                            $('#claimHandle').attr('disabled', false);
                            $("#claimHandle").LoadingOverlay("hide");
                            $("#updateProfile :input").prop("readonly", false);
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
                            $('#claimHandle').attr('disabled', false);
                            $("#claimHandle").LoadingOverlay("hide");
                            $("#updateProfile :input").prop("readonly", false);
                        }, 5000);
                    }
                },
                error:function (jqXHR, textStatus, errorThrown){
                    toastr.options = {
                        "closeButton" : true,
                        "progressBar" : true
                    }
                    toastr.error(errorThrown);
                    $("#updateProfile :input").prop("readonly", false);
                    $('#claimHandle').attr('disabled', false);
                    $("#claimHandle").LoadingOverlay("hide");
                },
            });
        });
    }
    //update profile
    const submitProfile=function (){
        //process the form submission
        $('#updateProfile').submit(function(e) {
            e.preventDefault();
            var baseURL = $('#updateProfile').attr('action');
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
                    $('#submitProfile').attr('disabled', true);
                    $("#updateProfile :input").prop("readonly", true);
                    $("#submitProfile").LoadingOverlay("show",{
                        text        : "updating ...",
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
                            $('#submitProfile').attr('disabled', false);
                            $("#submitProfile").LoadingOverlay("hide");
                            $("#updateProfile :input").prop("readonly", false);
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
                            $('#submitProfile').attr('disabled', false);
                            $("#submitProfile").LoadingOverlay("hide");
                            $("#updateProfile :input").prop("readonly", false);
                            location.reload();
                        }, 5000);
                    }
                },
                error:function (jqXHR, textStatus, errorThrown){
                    toastr.options = {
                        "closeButton" : true,
                        "progressBar" : true
                    }
                    toastr.error(errorThrown);
                    $("#updateProfile :input").prop("readonly", false);
                    $('#submitProfile').attr('disabled', false);
                    $("#submitProfile").LoadingOverlay("hide");
                },
            });
        });
    }
    //upload photo
    var updateProfilePhoto = function (){
        $('#updateProfilePic').on('submit',(function(e) {

            var baseURL = $('#file').data('link');
            e.preventDefault();
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
                    $('#file').attr('disabled', true);
                    $("#updateProfilePic :input").prop("readonly", true);
                    $("#file").LoadingOverlay("show",{
                        text        : "uploading",
                        size        : "20"
                    });
                },
                success:function(data)
                {
                    if(data.error ===true)
                    {
                        toastr.options = {
                            "closeButton" : true,
                            "progressBar" : true
                        }
                        toastr.error(data.data.error);
                        //return to natural stage
                        setTimeout(function(){
                            $('#file').attr('disabled', false);
                            $("#file").LoadingOverlay("hide");
                            $("#updateProfilePic :input").prop("readonly", false);
                        }, 3000);
                    }
                    if(data.error === 'ok')
                    {
                        toastr.options = {
                            "closeButton" : true,
                            "progressBar" : true
                        }
                        toastr.success(data.message);
                        //return to natural stage
                        setTimeout(function(){
                            $('#file').attr('disabled', false);
                            $("#file").LoadingOverlay("hide");
                            location.reload();
                        }, 3000);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown){
                    toastr.options = {
                        "closeButton" : true,
                        "progressBar" : true
                    }
                    toastr.error(errorThrown);
                    //return to natural stage
                    setTimeout(function(){
                        $('#file').attr('disabled', false);
                        $("#file").LoadingOverlay("hide");
                        $("#updateProfilePic :input").prop("readonly", false);
                    }, 3000);
                }
            });
        }));
        $("#file").on("change", function() {
            $("#updateProfilePic").submit();
        });
    }
    //add settlement bank
    const addSettlementBank=function (){
        //process the form submission
        $('#addSettlementAccountNGN').submit(function(e) {
            e.preventDefault();
            var baseURL = $('#addSettlementAccountNGN').attr('action');
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
                    $('#submitBank').attr('disabled', true);
                    $("#addSettlementAccountNGN :input").prop("readonly", true);
                    $("#submitBank").LoadingOverlay("show",{
                        text        : "adding ...",
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
                            $("#submitBank").LoadingOverlay("hide");
                            $("#addSettlementAccountNGN :input").prop("readonly", false);
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
                            $('#submitBank').attr('disabled', false);
                            $("#submitBank").LoadingOverlay("hide");
                            $("#addSettlementAccountNGN :input").prop("readonly", false);
                            location.reload();
                        }, 5000);
                    }
                },
                error:function (jqXHR, textStatus, errorThrown){
                    toastr.options = {
                        "closeButton" : true,
                        "progressBar" : true
                    }
                    toastr.error(errorThrown);
                    $("#addSettlementAccountNGN :input").prop("readonly", false);
                    $('#submitBank').attr('disabled', false);
                    $("#submitBank").LoadingOverlay("hide");
                },
            });
        });
    }
    //submit business kyc
    const submitBusinessKyc=function (){
        //process the form submission
        $('#businessKyc').submit(function(e) {
            e.preventDefault();
            var baseURL = $('#businessKyc').attr('action');

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
                    $('#submitBizKyc').attr('disabled', true);
                    $("#businessKyc :input").prop("readonly", true);
                    $("#submitBizKyc").LoadingOverlay("show",{
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
                            $('#submitBizKyc').attr('disabled', false);
                            $("#submitBizKyc").LoadingOverlay("hide");
                            $("#businessKyc :input").prop("readonly", false);
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
                            $('#submitBizKyc').attr('disabled', false);
                            $("#submitBizKyc").LoadingOverlay("hide");
                            $("#businessKyc :input").prop("readonly", false);
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
                    $("#businessKyc :input").prop("readonly", false);
                    $('#submitBizKyc').attr('disabled', false);
                    $("#submitBizKyc").LoadingOverlay("hide");
                },
            });
        });
    }
    //submit individual kyc
    const submitIndividualKyc=function (){
        //process the form submission
        $('#individualKyc').submit(function(e) {
            e.preventDefault();
            var baseURL = $('#individualKyc').attr('action');

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
                    $('#submitIndividualKyc').attr('disabled', true);
                    $("#individualKyc :input").prop("readonly", true);
                    $("#submitIndividualKyc").LoadingOverlay("show",{
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
                            $('#submitIndividualKyc').attr('disabled', false);
                            $("#submitIndividualKyc").LoadingOverlay("hide");
                            $("#individualKyc :input").prop("readonly", false);
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
                            $('#submitIndividualKyc').attr('disabled', false);
                            $("#submitIndividualKyc").LoadingOverlay("hide");
                            $("#individualKyc :input").prop("readonly", false);
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
                    $("#individualKyc :input").prop("readonly", false);
                    $('#submitIndividualKyc').attr('disabled', false);
                    $("#submitIndividualKyc").LoadingOverlay("hide");
                },
            });
        });
    }
    return {
        init: function() {
            claimHandle();
            submitProfile();
            updateProfilePhoto();
            addSettlementBank();
            submitBusinessKyc();
            submitIndividualKyc();
        }
    };
}();

jQuery(document).ready(function() {
    setupProfileRequest.init();
});
