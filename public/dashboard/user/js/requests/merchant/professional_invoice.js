const professionalInvoice = function (){
    const addInvoiceItem = function (){
        $("#rowAdder").click(function () {
            newRowAdd =
                '<div class="row mb-3" id="row">' +
                '<div class="col-md-4"> <input type="text" class="form-control mb-3" id="inputFirstName" name="item[]" placeholder="Invoice Item"> </div>' +
                '<div class="col-md-4"><input type="number" class="form-control mb-3" id="inputFirstName" name="qty[]" placeholder="Quantity"></div>' +
                '<div class="col-md-3"><input type="text" class="form-control mb-3" id="inputFirstName" name="cost[]" placeholder="Unit Cost"></div>' +
                '<div class="col-md-1"> <span class="btn btn-danger" id="DeleteRow" type="button"><i class="bx bx-trash"></i></span></div> ' +
                '</div>';

            $('#newinput').append(newRowAdd);
        });

        $("body").on("click", "#DeleteRow", function () {
            $(this).parents("#row").remove();
        })
    }
    const getInvoiceDetails=function (){
        var invoiceId = $("#invoiceRef").val();
        //invoice Id setting
        $("#invoiceRef").on("input", function() {
            $('#invoiceId').html(this.value);
        });
        $('#invoiceId').html(invoiceId);
        //note to customer
        $("#notes").on("keyup", function() {
            $('.notice').html(this.value);
        });
        //customer details
        $("#custName").on("keyup", function() {
            $('#customerName').html(this.value);
        });
        $("#custEmail").on("keyup", function() {
            $('#customerEmail').html(this.value);
        });
        $("#custPhone").on("keyup", function() {
            $('#customerPhone').html(this.value);
        });
        $("#dueDates").on("change", function() {
            var date = new Date(this.value);
            var day = date.getDate();
            var month = date.getMonth() + 1;
            var year = date.getFullYear();
            $('#dueDate').html([day, month, year].join('/'));
        });
    }
    //add link
    const addInvoice = function (){
        //process the form submission
        $('#professionalInvoice').submit(function(e) {
            e.preventDefault();
            var baseURL = $('#professionalInvoice').attr('action');
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
                    $("#professionalInvoice :input").prop("readonly", true);
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
                            $("#professionalInvoice :input").prop("readonly", false);
                            //$("#professionalInvoice")[0].reset();
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
                            $("#professionalInvoice :input").prop("readonly", false);
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
                    $("#professionalInvoice :input").prop("readonly", false);
                    $('#submit').attr('disabled', false);
                    $("#submit").LoadingOverlay("hide");
                },
            });
        });
    }
    return {
        init: function() {
            addInvoiceItem();
            getInvoiceDetails();
            addInvoice();
        }
    };
}();

jQuery(document).ready(function() {
    professionalInvoice.init();
});
