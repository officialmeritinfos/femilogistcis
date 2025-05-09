const creatorWishlistRequest = function () {
    //process new wishlist addition
    const processNewWishListAddition = function (){
        //process the form submission
        $('#newWishlist').submit(function(e) {
            e.preventDefault();
            var baseURL = $('#newWishlist').attr('action');

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
                    $("#newWishlist :input").prop("readonly", true);
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
                            $("#newWishlist :input").prop("readonly", false);
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
                            $("#newWishlist :input").prop("readonly", false);
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
                    $("#newWishlist :input").prop("readonly", false);
                    $('.submit').attr('disabled', false);
                    $(".submit").LoadingOverlay("hide");
                },
            });
        });
    }
    //process new wishlist deletion
    const processNewWishListDeletion = function (){
        //process the form submission
        $('#deleteWishlist').submit(function(e) {
            e.preventDefault();
            var baseURL = $('#deleteWishlist').attr('action');

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
                    $("#deleteWishlist :input").prop("readonly", true);
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
                            $("#deleteWishlist :input").prop("readonly", false);
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
                            $("#deleteWishlist :input").prop("readonly", false);
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
                    $("#deleteWishlist :input").prop("readonly", false);
                    $('.submit').attr('disabled', false);
                    $(".submit").LoadingOverlay("hide");
                },
            });
        });
    }
    const wishlistDom=function (){
        $('#deleteWishlist').on('show.bs.modal', function(event){
            const button = event.relatedTarget;

            const id = button.getAttribute('data-value');
            const title = button.getAttribute('data-title');
            $('input[name="id"]').val(id);
            $('.modal-title').html('Delete Wishlist: '+title);

        });

        $('#shareModal').on('show.bs.modal', function(event){
            const button = event.relatedTarget;

            const title = button.getAttribute('data-title');
            const link = button.getAttribute('data-link');

            $('#tweetButton').on('click',function (){
                var tweetText = "I just created a new wishlist on @getnextropay: " +title;
                var tweetUrl = encodeURIComponent(link);
                var twitterIntentUrl = `https://twitter.com/intent/tweet?text=${encodeURIComponent(tweetText)}&url=${tweetUrl}`;
                window.open(twitterIntentUrl, '_blank');
            });
            $('#whatsappButton').on('click',function (){
                var message = "I just created a new wishlist on Nextropay: " +title;
                var intentUrl = `https://api.whatsapp.com/send?text=${encodeURIComponent(message+'. ' +
                    '<br/>See it here '+link)}`;
                window.open(intentUrl, '_blank');
            });
            $('#telegramButton').on('click',function (){
                var message = "I just created a new wishlist on Nextropay: " +title+'. Check it out';
                var intentUrl = 'https://t.me/share/url?url=' + encodeURIComponent(link) + '' +
                    '&text=' + encodeURIComponent(message);
                window.open(intentUrl, '_blank');
            });
            $('#linkedinButton').on('click',function (){
                var message = "I just created a new wishlist on Nextropay: " +title+'. Check it out';
                var intentUrl =  'https://www.linkedin.com/sharing/share-offsite/?url=' + encodeURIComponent(message+' '+link);
                window.open(intentUrl, '_blank');
            });

        });
    }

    return {
        init: function() {
            processNewWishListAddition();
            wishlistDom();
            processNewWishListDeletion();
        }
    };
}();

jQuery(document).ready(function() {
    creatorWishlistRequest.init();
});

