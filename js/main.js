$(document).ready(function() {

    $(document).on("scroll", onScroll);

    //smoothscroll
    // $('a[href^="#"]').on('click', function(e) {
    $(document).on('click', '#menu_nav a[href^="#"], .home-link', function(e) {

        e.preventDefault();
        $(document).off("scroll");

        $('a').each(function() {
            $(this).removeClass('active');
        })
        $(this).addClass('active');

        var target = this.hash,
            menu = target;
        $target = $(target);
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top + 1
        }, 500, '', function() {
            window.location.hash = target;
            $(document).on("scroll", onScroll);
        });
        $(this).removeClass('is-active');
        $('#mobile-nav').removeClass('open');
        $('.open-menu').removeClass('is-active')
        $('.open-menu').data('iteration', 1);
    });

    $("#date_pick").flatpickr({
        inline: true,
        "disable": [
            function(date) {
                // return true to disable
                return (date.getDay() === 1 || date.getDay() === 0);
            }
        ],
        "locale": "fr",
        dateFormat: "l d F Y",
        altFormat: "l F Y",
    });

    $('#reponse .modal_close, #reponse').click(function(e) {
        e.stopPropagation();
        e.preventDefault();
        $('#reponse').removeClass('show');
    });

    $('.open-resa').click(function(e) {
        e.preventDefault();
        $('#reservation').addClass('open');
    });
    $('#close_reservation').click(function(e) {
        e.preventDefault();
        $('#reservation').removeClass('open');
    })


    /* FORM */

    /* COMMANDE */

    $('#commandeForm').validate({
        rules: {
            'item[][]': {
                required: true,
                minlength: 1,
                number: true,
            },
            getDate: {
                required: true
            },
            nom: {
                required: true
            },
            tel: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 10
            },
            email: {
                email: true,
                required: true,
            }
        },
        messages: {
            'item[][]': {
                required: "Veuillez choisir au moins un plat",
                digits: "Veuillez choisir au moins un plat",
                minlength: "Veuillez choisir au moins un plat",
            },
            getDate: {
                required: "Veuillez sélectionner une date de récupération"
            },
            nom: {
                required: "Veuillez indiquer votre nom",
            },
            tel: {
                required: "Veuillez saisir un numéro de Télephone",
                digits: "Le numéro de télephone doit être composé de 10 chiffre uniquement",
                minlength: "Le numéro de télephone doit être composé de 10 chiffre uniquement",
                maxlength: "Le numéro de télephone doit être composé de 10 chiffre uniquement"
            },
            email: { required: "Veuillez saisir une adresse email valide", email: "Veuillez saisir une adresse email valide" },
        },
        errorElement: 'div',
        submitHandler: function(form) {
            //console.log('SUBMIT');
            var url = "ajaxCmd.php"; // the script where you handle the form input. 
            var formdata = $(form).serialize();
            $('.valid .btn').prop('disabled', true);
            //SHOW LOADER
            $('#loader-container').fadeIn(100);
            //var formdataArray = $(form).serializeObject();
            $.ajax({
                type: "POST",
                url: url,
                dataType: "html",
                data: formdata, // serializes the form's elements.
                success: function(data) {
                    console.log(data);
                    //console.log(formdataArray);
                    if (data == "OK") {
                        //alert('OK -- show message OK + merci');
                        line = "";
                        $('.itemQty').each(function() {
                            if (parseInt($(this).val()) > 0) {
                                line = line + "<li>" + $(this).val() + " " + $(this).parent().parent().find('.item_name').html() + "</li>";
                            }
                        });
                        idVal = '';
                        $("input[type='radio']:checked").each(function() {
                            idVal = $(this).attr("id");
                        });
                        //show message OK + merci
                        //1. Content message titre = Merci pour votre commande.
                        $('#reponse .modal_head__title h3').html('Merci de votre commande&nbsp;!');
                        //2. Content message = Votre commande de + liste + sera prête / aujourd'hui ou demain / le paiement sera a effectué sur place
                        $('#reponse .modal_content').html('<p class="mt-4">On vous prépare :</p><ul>' + line + '</ul><p class="mt-2">A venir chercher <b>' + idVal + ' entre 17h00 et 20h00</b>.<br>Le total de <b>' + $('#total-value').html() + '€</b> est à régler au moment de la récupération.</p>');
                        //3. Show #reponse
                        $('#reponse').addClass('show');
                        //4. Empty from cmd + close.
                        $('#commande').removeClass('show');
                        $('.valid .btn').prop('disabled', false);
                        $('#loader-container').fadeOut(100);
                    } else {
                        //alert('PROBLEME ZER => ' + data);
                        //show Erreur
                        //1. Content message titre = Un problème est survenu.
                        $('#reponse .modal_head__title h3').html('Un problème est survenu');
                        //2. Content message = data
                        $('#reponse .modal_content').html('<p class="mt-4">' + data + '</p>');
                        //3.Show #reponse
                        $('#response').addClass('show');
                        $('.valid .btn').prop('disabled', false);
                        $('#loader-container').fadeOut(100);
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

    $("#next").click(function() {
        var form = $("#reservation_form");
        form.validate({
            errorElement: 'div',
            rules: {
                horaire: {
                    required: true,
                },
                convives: {
                    required: true,
                },
                date: {
                    required: true,
                },
                nom: {
                    required: true,
                    minlength: 3
                },
                prenom: {
                    required: true,
                    minlength: 3
                },
                tel: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    digits: true
                },
                email: {
                    required: true,
                    email: true,
                },

            },
            messages: {
                horaire: {
                    required: "Veuillez sélectionner un horaire",
                },
                convives: {
                    required: "Veuillez sélectionner un nombre de convives",
                },
                date: {
                    required: "Veuillez sélectionner une date",
                },
                nom: {
                    required: "Veuillez saisir un nom",
                    minlength: "Le nom saisi semble incomplet"
                },
                prenom: {
                    required: "Veuillez saisir un prénom",
                    minlength: "Le prénom saisi semble incomplet"
                },
                tel: {
                    required: "Veuillez saisir un télephone",
                    minlength: "Le numéro de télephone doit être composé de 10 chiffres",
                    maxlength: "Le numéro de télephone doit être composé de 10 chiffres",
                    digits: "Le numéro de télephone doit être composé de 10 chiffres",
                },
                email: {
                    required: "Veuillez saisir une adresse email",
                    email: "Veuillez saisir une adresse email valide"
                },
            }
        });
        if (form.valid() === true) {
            if ($('#form-vue-1').is(":visible")) {
                current_fs = $('#form-vue-1');
                next_fs = $('#form-vue-2');
            }
            next_fs.show();
            current_fs.hide();
        }
    });

    $('#previous').click(function() {
        if ($('#form-vue-2').is(":visible")) {
            current_fs = $('#form-vue-2');
            next_fs = $('#form-vue-1');
        }
        next_fs.show();
        current_fs.hide();
    });

    /*MOBILE BURGER*/
    $('.open-menu').click(function(e) {
        //console.log('CLICKKKC');
        e.preventDefault();
        var iteration = $(this).data('iteration');
        switch (iteration) {
            case 1:
                $(this).addClass('is-active');
                $('#mobile-nav').addClass('open');
                break;

            case 2:
                $(this).removeClass('is-active');
                $('#mobile-nav').removeClass('open');
                break;
        }
        iteration++;
        if (iteration > 2) iteration = 1;
        $(this).data('iteration', iteration);
        //console.log(iteration);
    });

    $('.open-cmd').click(function(e) {
        e.preventDefault();
        $('#commande').addClass('show');
    });
    $('#commande .close').click(function(e) {
        e.preventDefault();
        $('#commande').removeClass('show');
    });

    /*COMMANDE */
    $(".button").on("click", function() {

        var $button = $(this);
        var oldValue = $button.parent().find("input").val();

        if ($button.text() == "+") {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }

        $button.parent().find("input").val(newVal);
        //console.log('CHANGE - TOTAL');

        subtotal = newVal * parseInt($button.parent().find("input").data('price'));
        //console.log('subtotal ' + subtotal);
        $button.parent().parent().find('.line_total').html(subtotal);
        //console.log('WRIGHT')
        Total()
    });
    $(".itemQty").bind("propertychange change click keyup input paste", function() {
        //$(".itemQty").on("change paste keyup", function() {
        val = $(this).val();
        //console.log('val ' + val);
        subtotal = $(this).val() * parseInt($(this).data('price'));
        //console.log('subtotal ' + subtotal);
        $(this).parent().parent().find('.line_total').html(subtotal);
        //console.log('WRIGHT')
        Total()
    });
});

function Total() {
    total = 0;
    item_num = 0;
    $('.line_total').each(function() {
        if ($(this).html() != '')
        //console.log($(this).html());
            total += parseInt($(this).html());
    });

    $('.itemQty').each(function() {
        if (parseInt($(this).val()) > 0) {
            item_num += parseInt($(this).val());
        }
    });

    //console.log('total ' + total);
    $('#total-value').html(total);
    $('#total-meel').html(item_num);
    if (total > 0) {
        $('#cmd_valid').addClass('show');
    } else {
        $('#cmd_valid').removeClass('show');
    }
}

function onScroll(event) {
    var scrollPos = $(document).scrollTop();
    $("#menu_nav a").each(function() {
        var currLink = $(this);
        var refElement = $(currLink.attr("href"));
        if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
            $("#menu_nav a").removeClass("active");
            currLink.addClass("active");
        } else {
            currLink.removeClass("active");
        }
    });
}