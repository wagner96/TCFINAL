$('input.btnReset').on('click', function() {


    $('div.reset').find('input').val('');

});
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
    interval: 2500
});

$(function () {
    $('#sendEmail').ajaxForm(function () {
        alert("Thank you for your comment!");
    });
});

function ocultarMostrar(selectObject) {
    var x = selectObject.value;
    if (x === 'ong') {
        document.getElementById('bairro').style.display = '';
        document.getElementById('complemento').style.display = '';
        document.getElementById('rdSocial').style.display = '';
        document.getElementById('acoes').style.display = '';
        document.getElementById('sexo').style.display = 'none';
    }

    else {
        document.getElementById('bairro').style.display = 'none';
        document.getElementById('complemento').style.display = 'none';
        document.getElementById('rdSocial').style.display = 'none';
        document.getElementById('acoes').style.display = 'none';
        document.getElementById('sexo').style.display = '';

    }

}

function oculMostTypeAd(selectObject) {
    var x = selectObject.value;
    if (x === 'petDs') {
        document.getElementById('petApA').style.display = 'none';
        document.getElementById('petAd').style.display = '';

        document.getElementById('bread').style.display = 'none';
        document.getElementById('breadDs').style.display = '';
        document.getElementById('breadApA').style.display = 'none';
    }

    else if (x === 'petAb') {
        document.getElementById('petAd').style.display = 'none';
        document.getElementById('petApA').style.display = '';

        document.getElementById('bread').style.display = 'none';
        document.getElementById('breadDs').style.display = 'none';
        document.getElementById('breadApA').style.display = '';
    }
    else if (x === 'null'){
        document.getElementById('petAd').style.display = 'none';
        document.getElementById('petApA').style.display = 'none';
        document.getElementById('bread').style.display = '';
        document.getElementById('breadDs').style.display = 'none';
        document.getElementById('breadApA').style.display = 'none';
    }
}

setTimeout(function () {
    $('#des').fadeOut('last');
}, 4000);

setTimeout(function () {
    $('#des2').fadeOut('last');
}, 8000);

function preview_images()
{
    var total_file=document.getElementById("photos").files.length;
    for(var i=0;i<total_file;i++)
    {
        $('#image_preview').append("<div class='col-md-3'><img class='img-responsive' src='"+URL.createObjectURL(event.target.files[i])+"'></div>");
    }
}
$('#add_more').click(function() {
    "use strict";
    $(this).before($("<div/>", {
        id: 'filediv'
    }).fadeIn('slow').append(
        $("<input/>", {
            name: 'file[]',
            type: 'file',
            id: 'file',
            multiple: 'multiple',
            accept: 'image/*'
        })
    ));
});

$('#upload').click(function(e) {
    "use strict";
    e.preventDefault();

    if (window.filesToUpload.length === 0 || typeof window.filesToUpload === "undefined") {
        alert("No files are selected.");
        return false;
    }

    // Now, upload the files below...
    // https://developer.mozilla.org/en-US/docs/Using_files_from_web_applications#Handling_the_upload_process_for_a_file.2C_asynchronously
});

deletePreview = function (ele, i) {
    "use strict";
    try {
        $(ele).parent().remove();
        window.filesToUpload.splice(i, 1);
    } catch (e) {
        console.log(e.message);
    }
}

$("#file").on('change', function() {
    "use strict";

    // create an empty array for the files to reside.
    window.filesToUpload = [];

    if (this.files.length >= 1) {
        $("[id^=previewImg]").remove();
        $.each(this.files, function(i, img) {
            var reader = new FileReader(),
                newElement = $("<div id='previewImg" + i + "' class='previewBox'><img /></div>"),
                deleteBtn = $("<span class='delete' onClick='deletePreview(this, " + i + ")'>X</span>").prependTo(newElement),
                preview = newElement.find("img");

            reader.onloadend = function() {
                preview.attr("src", reader.result);
                preview.attr("alt", img.name);
            };

            try {
                window.filesToUpload.push(document.getElementById("file").files[i]);
            } catch (e) {
                console.log(e.message);
            }

            if (img) {
                reader.readAsDataURL(img);
            } else {
                preview.src = "";
            }

            newElement.appendTo("#filediv");
        });
    }
});
function preview_images()
{
    var total_file=document.getElementById("photos").files.length;
    for(var i=0;i<total_file;i++)
    {
        $('#image_preview').append("<div class='col-md-3 imagePreview' align='center'><img style=\"width: 100px; height: 100px;\" class='img-responsive'  src='"+URL.createObjectURL(event.target.files[i])+"'><span  class='remove'><a class='fa fa-trash fa-lg' style='color: #FF0000'></a></span></div>");

        $(".remove").click(function(){
            $('#photos').val('');
            $(this).parent(".imagePreview").remove();
        });
    }
}

// $(document).ready(function() {
//     $('#getRequest').click(function(){
//         alert($(this).text());
//     });
//
// });