$(document).ready(function(){

    //Esconde preloader
    $(window).load(function(){
        $('#preloader').fadeOut(2000);
    });

});



$( document ).ready(function(){

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
    $(document).ready(function() {
        $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index+1;
            var $percent = ($current/$total) * 100;
            $('#rootwizard .progress-bar').css({width:$percent+'%'});
        }});
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
jQuery(document).ready(function($) {

    $('#myCarousel').carousel({
        interval: 3000
    });

    $('#carousel-text').html($('#slide-content-0').html());

    //Handles the carousel thumbnails
    $('[id^=carousel-selector-]').click( function(){
        var id = this.id.substr(this.id.lastIndexOf("-") + 1);
        var id = parseInt(id);
        $('#myCarousel').carousel(id);
    });


    // When the carousel slides, auto update the text
    $('#myCarousel').on('slid.bs.carousel', function (e) {
        var id = $('.item.active').data('slide-number');
        $('#carousel-text').html($('#slide-content-'+id).html());
    });
});