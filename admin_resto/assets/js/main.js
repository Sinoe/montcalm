// $(window).load(200,function(){
//     $('input:-webkit-autofill').each(function(){
//         if ($(this).val().length !== "") {
//             $(this).siblings('label').addClass('active');
//         }
//     });
// })
(function($, undefined) {
    '$:nomunge'; // Used by YUI compressor.

    $.fn.serializeObject = function() {
        var obj = {};

        $.each(this.serializeArray(), function(i, o) {
            var n = o.name,
                v = o.value;

            obj[n] = obj[n] === undefined ? v :
                $.isArray(obj[n]) ? obj[n].concat(v) : [obj[n], v];
        });

        return obj;
    };

})(jQuery);

function helpForChrono(el) {
    //el.bind('keyup','keydown', function(e){
    $(document).on('keydown keyup', el, function(e) {
        //To accomdate for backspacing, we detect which key was pressed - if backspace, do nothing:
        if (e.which !== 8) {
            var numChars = el.val().length;
            if (numChars === 2 || numChars === 5) {
                var thisVal = el.val();
                thisVal += ':';
                el.val(thisVal);
            }
        }
    });
}
$(document).ready(function() {

    /*INIT DOWNLOADS*/
    $(".download").click(function(e) {
        e.preventDefault();
        filetype = $(this).data("filetype");
        filename = $(this).data("filename");
        table = $(this).data("table");
        console.log("CLICK ");
        $(table).tableExport({ type: filetype, fileName: filename, ignoreCols: 1 });
    });

    /*MATERIAL INIT*/
    $('select').formSelect();
    // document.querySelectorAll('.select-wrapper').forEach(t => t.addEventListener('click', e=>e.stopPropagation()))
    $('.modal').modal({
        onOpenStart: function(el, id) {
            console.log('Méchant méchant');
            console.log(el);
            console.log(id);
            console.log($(this).el);
        }
    });

    //$(".button-collapse").sidenav();
    $('.sidenav').sidenav();


    //User delete click populate user_id in delete link on click => Use only one Modal for all userz
    $('.item-delete').click(function(e) {
        console.log('CLICK');
        e.preventDefault;
        var item_id = $(this).attr('data-itemid');
        console.log("item ID " + item_id);
        //PASS URL IN MODAL
        var url = "item_delete.php?item=" + item_id;
        $('.delete-item-link').attr("href", url);
        //OPEN MODAL
        $('#modal-item-delete').modal('open');
    });

    /*VALIDATES*/



    /*USER PAGE OPEN MODAL IF #*/
    if (window.location.hash) {
        hash = window.location.hash;
        console.log(hash);
        if (hash.match("^#modal-user")) {
            $(hash).modal('open');
        } else if (hash.match("^#toast=1")) {
            M.toast({
                html: "Le plat a bien été supprimé"
            });
        } else if (hash.match("^#toast=2")) {
            M.toast({
                html: "Une erreur s'est produite"
            });
        }
    }

    /*RUNS PAGES*/
    var user_data;
    /*AUTOCOMPLETE INIT*/
    $('input.autocomplete').each(function() {
        $(this).autocomplete({
            data: autocompleteData,
            onAutocomplete: function(val) {
                console.log($(this));
                //alert(val);
                var regExp = /\ID{(.*)\}/;
                var matches = regExp.exec(val);
                console.log(matches[1]);
                //$(this).parent().find('input.user_id').val(matches[1]);
                $(this).closest('.user_id').val(matches[1]);
            }
        });
    });

    /*MODAL NEW FORM VALIDATION*/
    // ADD USER FORM (RUN & SESSION)

    //ADD ITEM FROM ADMIN
    $('#addItemForm').validate({
        rules: {
            nom: {
                required: true
            },
            price: {
                required: true,
                digits: true
            }
        },
        messages: {
            nom: {
                required: "Il manque le nom du plat"
            },
            price: {
                required: "Il manque le prix",
                digits: "Le prix doit être sous forme de chiffre"
            }
        },
        errorElement: 'div',
        submitHandler: function(form) {
            console.log('SUBMIT');
            var url = "ajax/addItemFromAdmin.php"; // the script where you handle the form input. 
            var formdata = $(form).serialize();
            var formdataArray = $(form).serializeObject();
            $.ajax({
                type: "POST",
                url: url,
                dataType: "html",
                data: formdata, // serializes the form's elements.
                success: function(data) {
                    console.log(data);
                    console.log(formdataArray);
                    if (data != "Error") {
                        //Page reload
                        location.reload();
                        //alert('NO PROBLEME');
                    } else {
                        alert('PROBLEME ZER => ' + data);
                    }
                },
                error: function(resultat, statut, erreur) {
                    // alert('error' + resultat + ', ' +statut + ', ' +erreur);
                    console.log('error' + resultat + ', ' + statut + ', ' + erreur);
                    var err = eval("(" + resultat.responseText + ")");
                    // alert(resultat.responseText);
                },
                complete: function(resultat, statut) {
                    // alert('complete' + resultat + ', ' +statut);
                    console.log('complete' + resultat + ', ' + statut);
                }
            });
        }
    });









    //BACK TO TOP
    if ($('#go-to-top').length) {
        var scrollTrigger = 300, // px
            backToTop = function() {
                var scrollTop = $(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    $('#go-to-top').addClass('show');
                } else {
                    $('#go-to-top').removeClass('show');
                }
            };
        backToTop();
        $(window).on('scroll', function() {
            backToTop();
        });
        $('#go-to-top').on('click', function(e) {
            e.preventDefault();
            $('html,body').animate({
                scrollTop: 0
            }, 500);
        });
    }

});