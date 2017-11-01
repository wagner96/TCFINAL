$(document).ready(function () {

    //Esconde preloader
    $(window).load(function () {
        $('#preloader').fadeOut(2000);
    });

});


$(document).ready(function () {

    $(document).ready(function ($) {
        $("#phone").mask("(99)9 9999-9999");
        $("#cep").mask("99999-999");
        $("#birth_date").mask("99/99/9999");

    });
    // $(document).ready(function () {
    //     var date_input = $('input[name="birth_date"]'); //our date input has the name "date"
    //     var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
    //     var options = {
    //         format: 'dd/mm/yyyy',
    //         container: container,
    //         todayHighlight: true,
    //         autoclose: true,
    //     };
    //     date_input.datepicker(options);
    // });
    $(document).ready(function () {
        $('#rootwizard').bootstrapWizard({
            onTabShow: function (tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index + 1;
                var $percent = ($current / $total) * 100;
                $('#rootwizard .progress-bar').css({width: $percent + '%'});
            }
        });
    });
    // function sub() {
    //     document.getElementById('form').submit();
    //
    // }
    // ("div#dropzone").dropzone({ url: "" });
    // // Dropzone.options.imageUpload = {
    // //     maxFilesize: 1,
    // //     acceptedFiles: ".jpeg,.jpg,.png,.gif"
    // // };
});
$('.carousel').carousel({
    interval: 3500
});
$(function(){

    $('#sendEmail').on('submit',function(e){
        $.ajaxSetup({
            header:$('meta[name="_token"]').attr('content')
        })
        e.preventDefault(e);

        $.ajax({

            type:"POST",
            url:host+'/adverts/abandoned/sendEmail',
            data:$(this).serialize(),
            dataType: 'json',
            success: function(data){
                console.log(data);
            },
            error: function(data){

            }
        })
    });
});


// $(document).ready(function() {
//     $('#getRequest').click(function(){
//         alert($(this).text());
//     });
//
// });