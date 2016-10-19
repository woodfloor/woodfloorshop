;
jQuery(document).ready(function() {
    $.validator.setDefaults({
        errorElement: 'small',
        errorPlacement: function(error, element) {
            if (element.is(":radio") || element.is(":checkbox")) {
                var errorLocation = element.attr('rel');
                if ($('#' + errorLocation).length) {
                    error.insertAfter('#' + errorLocation);
                } else {
                    element.removeClass("error");
                    alert(error.text());
                }
            } else {
                error.insertAfter(element);
            }
        }
    });
    $.validator.addMethod("phone", function(phone, element) {
        phone = phone.replace(/\s+/g, "");
        return this.optional(element) || phone.match(/^[0-9-+()]+$/);
    }, $('#validate_phone').text());
    $.extend(jQuery.validator.messages, {
        required: $('#validate_field_required').text()
    });

    $("form.add_to_basket").each(function(index, el)  {
        $(el).validate({
            submitHandler: function(form) {
                add_to_basket(form);
            }
        });
    });

    $("#recover_password").validate({
        rules: {
            'email': {
                required: true,
                email: true
            }
        },
        messages: {
            'email': {
                required: $('#validate_email').text(),
                review: $('#validate_email').text()
            }
        }
    });
    $("#review_form").validate({
        rules: {
            'review[name]': {
                required: true
            },
            'review[review]': {
                required: true
            },
            'review[title]': {
                required: true
            },
            'review[email]': {
                required: true,
                email: true
            }
        },
        messages: {
            'review[email]': {
                required: $('#validate_email').text(),
                review: $('#validate_email').text()
            }
        }
    });
    $("#contact_form").validate({
        rules: {
            'contact[subject]': {
                required: true
            },
            'contact[dept]': {
                required: true
            },
            'contact[enquiry]': {
                required: true
            },
            'contact[name]': {
                required: true
            },
            'contact[email]': {
                required: true,
                email: true
            }
        },
        messages: {
            'contact[email]': {
                required: $('#validate_email').text(),
                email: $('#validate_email').text()
            }
        }
    });
    $("#gc_form").validate({
        rules: {
            'gc[email]': {
                required: true,
                email: true
            }
        },
        messages: {
            'gc[email]': {
                required: $('#validate_email').text(),
                email: $('#validate_email').text()
            }
        }
    });
    $("#newsletter_form, #newsletter_form_box").validate({
        rules: {
            subscribe: {
                required: true,
                email: true,
                remote: {
                    url: "?_g=ajax_email&source=newsletter",
                    type: "post",
                    data: {
                        username: function() {
                            return $("#newsletter_email").val();
                        }
                    }
                }
            },
        },
        messages: {
            subscribe: {
                required: $('#validate_email').text(),
                email: $('#validate_email').text(),
                remote: $('#validate_already_subscribed').text()
            },
        }
    });
    $("#checkout_form").validate({
        rules: {
            username: {
                required: true,
                email: true
            },
            'user[first_name]': {
                required: true
            },
            'user[last_name]': {
                required: true
            },
            'user[email]': {
                required: true,
                email: true,
                remote: {
                    url: "?_g=ajax_email",
                    type: "post",
                    data: {
                        username: function() {
                            return $("#user_email").val();
                        }
                    }
                }
            },
            'user[phone]': {
                required: true,
                phone: true
            },
            'user[mobile]': {
                phone: true
            },
            'billing[line1]': {
                required: true
            },
            'billing[town]': {
                required: true
            },
            'billing[country]': {
                required: true
            },
            'billing[state]': {
                required: true
            },
            'billing[postcode]': {
                required: true
            },
            'delivery[line1]': {
                required: true
            },
            'delivery[town]': {
                required: true
            },
            'delivery[country]': {
                required: true
            },
            'delivery[state]': {
                required: true
            },
            'delivery[postcode]': {
                required: true
            },
            password: {
                required: true
            },
            passconf: {
                equalTo: "#reg_password"
            },
            terms_agree: {
                required: true
            },
            gateway: {
                required: true
            }
        },
        messages: {
            username: {
                required: $('#validate_email').text(),
                email: $('#validate_email').text()
            },
            'user[email]': {
                required: $('#validate_email').text(),
                email: $('#validate_email').text(),
                remote: $('#validate_email_in_use').text()
            },
            'user[phone]': {
                required: $('#validate_phone').text(),
                phone: $('#validate_phone').text()
            },
            'user[mobile]': {
                phone: $('#validate_mobile').text()
            },
            password: {
                required: $('#validate_password').text()
            },
            passconf: {
                required: $('#validate_password_mismatch').text(),
                equalTo: $('#validate_password_mismatch').text()
            },
            terms_agree: {
                required: $('#validate_terms_agree').text()
            },
            gateway: {
                required: $('#validate_gateway_required').text()
            }
        }
    });

    $("#checkout_form").on("click", '#checkout_register', function() {
        $("#reg_password").rules("add", {
            minlength: 6,
            messages: {
                minlength: $('#validate_password_length').text()
            }
        });
    });

    $("#checkout_form").on("click", '#checkout_login', function() {
        $("#reg_password").rules("remove","minlength");
    });

    $("#addressbook_form").validate({
        rules: {
            first_name: {
                required: true
            },
            last_name: {
                required: true
            },
            line1: {
                required: true
            },
            town: {
                required: true
            },
            country: {
                required: true
            },
            state: {
                required: true
            },
            postcode: {
                required: true
            }
        }
    });
    $("#lookup_order").validate({
        rules: {
            cart_order_id: {
                required: true
            },
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            email: {
                required: $('#validate_email').text(),
                email: $('#validate_email').text()
            },
        }
    });
    $("#search_form, #small_search_form").validate({
        rules: {
            'search[keywords]': {
                required: true
            }
        },
        messages: {
            'search[keywords]': {
                required: $('#validate_search').text()
            }
        }
    });
    $("#advanced_search_form").validate({
        rules: {
            'search[keywords]': {
                required: true
            }
        },
        messages: {
            'search[keywords]': {
                required: $('#validate_search').text()
            }
        }
    });
    $("#login_form").validate({
        rules: {
            username: {
                required: true,
                email: true
            },
            password: {
                required: true
            }
        },
        messages: {
            username: {
                required: $('#validate_email').text(),
                email: $('#validate_email').text()
            },
            password: {
                required: $('#empty_password').text()
            }
        }
    });
    $("#registration_form").validate({
        rules: {
            first_name: {
                required: true
            },
            last_name: {
                required: true
            },
            email: {
                required: true,
                email: true,
                remote: {
                    url: "?_g=ajax_email",
                    type: "post",
                    data: {
                        username: function() {
                            return $("#email").val();
                        }
                    }
                }
            },
            phone: {
                required: true,
                phone: true
            },
            mobile: {
                required: false,
                phone: true
            },
            password: {
                required: true,
                minlength: 6
            },
            passconf: {
                equalTo: "#password"
            },
            terms_agree: {
                required: true
            }
        },
        messages: {
            first_name: {
                required: $('#validate_firstname').text()
            },
            last_name: {
                required: $('#validate_lastname').text()
            },
            email: {
                required: $('#validate_email').text(),
                email: $('#validate_email').text(),
                remote: $('#validate_email_in_use').text()
            },
            phone: {
                required: $('#validate_phone').text(),
                phone: $('#validate_phone').text()
            },
            mobile: {
                phone: $('#validate_mobile').text()
            },
            password: {
                required: $('#validate_password').text(),
                minlength: $('#validate_password_length').text()
            },
            passconf: {
                required: $('#validate_password_mismatch').text(),
                equalTo: $('#validate_password_mismatch').text()
            },
            terms_agree: {
                required: $('#validate_terms_agree').text()
            }
        }
    });
    $("#profile_form").validate({
        rules: {
            first_name: {
                required: true
            },
            last_name: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                phone: true
            },
            mobile: {
                required: false,
                phone: true
            },
            passnew: {
                minlength: 6,
            },
            passconf: {
                equalTo: "#passnew",
            }
        },
        messages: {
            first_name: {
                required: $('#validate_firstname').text()
            },
            last_name: {
                required: $('#validate_lastname').text()
            },
            email: {
                required: $('#validate_email').text(),
                email: $('#validate_email').text()
            },
            phone: {
                required: $('#validate_phone').text(),
                phone: $('#validate_phone').text()
            },
            mobile: {
                phone: $('#validate_mobile').text()
            },
            passnew: {
                minlength: $('#validate_password_length').text()
            },
            passconf: {
                equalTo: $('#validate_password_mismatch').text()
            }
        }
    }); /* Reset Form */
    $('input:reset').click(function() {
        $(this).parents('form:first').validate().resetForm();
    });
});