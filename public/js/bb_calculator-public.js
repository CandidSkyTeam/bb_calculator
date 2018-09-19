(function( $ ) {
    'use strict';

    var accordion = (function(){

        var $accordion = $('.js-accordion');
        var $accordion_header = $accordion.find('.js-accordion-header');
        var $accordion_item = $('.js-accordion-item');

        var settings = {
            // animation speed
            speed: 400,

            oneOpen: false
        };

        return {
            // pass configurable object literal
            init: function($settings) {
                $accordion_header.on('click', function() {
                    accordion.toggle($(this));

                });

                $.extend(settings, $settings);

                // ensure only one accordion is active if oneOpen is truea
                if(settings.oneOpen && $('.js-accordion-item.active').length > 1) {
                    $('.js-accordion-item.active:not(:first)').removeClass('active');
                }

                // reveal the active accordion bodies
                $('.js-accordion-item.active').find('> .js-accordion-body').show();
            },
            toggle: function($this) {

                if(settings.oneOpen && $this[0] != $this.closest('.js-accordion').find('> .js-accordion-item.active > .js-accordion-header')[0]) {
                    $this.closest('.js-accordion')
                        .find('> .js-accordion-item')
                        .removeClass('active')
                        .find('.js-accordion-body')
                        .slideUp()
                }

                // show/hide the clicked accordion item
                $this.closest('.js-accordion-item').toggleClass('active');
                $this.next().stop().slideToggle(settings.speed);

                var idi = $this.attr('id');
                console.log(idi);

                $('html, body').animate({
                    scrollTop: $("#bb_calculator").offset().top
                }, 500)

            }
        }
    })();

    $(document).ready(function(){
        accordion.init({ speed: 300, oneOpen: true });
    });

    var money_in = $('#in');


    $(".number").on("keypress keyup blur",function (event) {
        $(this).val($(this).val().replace(/[^\d].+/, ""));
        if ((event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });

    $(".number_out").on("keypress keyup blur",function (event) {
        $(this).val($(this).val().replace(/[^\d].+/, ""));
        if ((event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });



    $('#m_in_calc').on('change keyup', 'input', function(event) {

        var charCode = ($(this).which) ? $(this).which : event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

        var sum = 0;
        var sum_out = 0;

        $('#m_in_calc input.final_number').each(function(){

            var id = $(this).attr('id');
            var res = id.split("_");
            var idi = res[2];

            var value='monthly';
            var list = $('#list-'+idi);

            var monthly = 0;
            var number = $('#number_'+idi).val();
            var out = number;

            var ll = list.find('li.selected').attr('data-value');

            if(ll == 'yearly'){
                out = (number / 12);
            } else if(ll == 'weekly'){
                out = (number *4.33);
            }

            $('#final_number_'+idi).val(out);
            sum += +out;

        });

        money_in.html(Math.round(sum));

    });


    var money_out = $('#out');
    $('#m_out_calc').on('change keyup', 'input', function(event) {

        var charCode = ($(this).which) ? $(this).which : event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

        var sum = 0;
        var sum_out = 0;

        $('#m_out_calc input.final_number_out').each(function(){

            var id = $(this).attr('id');
            var res = id.split("_");
            var idi = res[2];

            console.log('call');

            var value='monthly';
            var list = $('#list-'+idi);
            var ll = list.find('li.selected').attr('data-value');

            var monthly = 0;
            var number = $('#numberout_'+idi).val();
            var out = number;


            if(ll == 'yearly'){
                out = (number / 12);
            } else if(focus == 'weekly'){
                out = (number *4.33);
            }

            $('#final_numberout_'+idi).val(out);
            sum_out += +out;

        });

        money_out.html(Math.round(sum_out));

    });


    $('#left-item').click(function(){

        var total_in = $('#in').html();
        var total_out = $('#out').html();
        var left_out = (total_in - total_out);
        $('#left_out').html(left_out);

    });



    function storeData(id,opt,number){

        var eventData = JSON.parse(localStorage.getItem(id));

        if(eventData ==null){
            eventData=[];
        }

        var details ={};

        details["opt"]=opt;
        details["number"]=number;

        eventData.push(details);

        localStorage.setItem(id, JSON.stringify(eventData));
    }


    var testObject = { };



    function create_custom_dropdowns() {
        $('select').each(function(i, select) {
            var id = $(this).attr('data-id');

            if (!$(this).next().hasClass('dropdown')) {
                $(this).after('<div class="dropdown ' + ($(this).attr('class') || '') + '" tabindex="0"><span class="current"></span><div class="list" data-id="'+id+'"><ul id="list-'+id+'"></ul></div></div>');
                var dropdown = $(this).next();
                var options = $(select).find('option');
                var selected = $(this).find('option:selected');
                dropdown.find('.current').html(selected.data('display-text') || selected.text());
                options.each(function(j, o) {
                    var display = $(o).data('display-text') || '';
                    dropdown.find('ul').append('<li class="option ' + ($(o).is(':selected') ? 'selected' : '') + ' ' + '" data-value="' + $(o).val() + '" data-display-text="' + display + '">' + $(o).text() + '</li>');
                });
            }
        });
    }

// Event listeners

// Open/close
    $(document).on('click', '.dropdown', function(event) {
        $('.dropdown').not($(this)).removeClass('open');
        $(this).toggleClass('open');
        if ($(this).hasClass('open')) {
            $(this).find('.option').attr('tabindex', 0);
            $(this).find('.selected').focus();
        } else {
            $(this).find('.option').removeAttr('tabindex');
            $(this).focus();
        }
    });
// Close when clicking outside
    $(document).on('click', function(event) {
        if ($(event.target).closest('.dropdown').length === 0) {
            $('.dropdown').removeClass('open');
            $('.dropdown .option').removeAttr('tabindex');
        }
        event.stopPropagation();
    });
// Option click
    $(document).on('click', '.dropdown .option', function(event) {
        $(this).closest('.list').find('.selected').removeClass('selected');
        $(this).addClass('selected');
        var text = $(this).data('display-text') || $(this).text();
        $(this).closest('.dropdown').find('.current').text(text);

        var focus = $(this).attr('data-value');
        var idi = $(this).parent().parent().attr('data-id');

        var number_val = $('#number_'+idi).val();
        var number_val_out = $('#numberout_'+idi).val();

        var monthly = '';
        var monthly_out = '';

        if(focus == 'yearly'){
            monthly = (number_val / 12);
            monthly_out = (number_val_out / 12);
        } else if(focus == 'weekly'){
            monthly = (number_val *4.33);
            monthly_out = (number_val_out *4.33);
        }else{
            monthly = number_val;
            monthly_out = number_val_out;
        }

        $('#final_number_'+idi).val(monthly);
        $('#final_numberout_'+idi).val(monthly_out);

        var money_in = $('#in');
        var sum = 0;

        var money_out = $('#out');
        var sum_out = 0;

        $('#m_in_calc input.final_number').each(function(){

            sum += +$(this).val();

        });

        $('#m_out_calc input.final_number_out').each(function(){

            sum_out += +$(this).val();

        });

        money_in.html(Math.round(sum));
        money_out.html(Math.round(sum_out));

        $(this).closest('.dropdown').prev('select').val($(this).data('value')).trigger('change');
    });

// Keyboard events
    $(document).on('keydown', '.dropdown', function(event) {
        var focused_option = $($(this).find('.list .option:focus')[0] || $(this).find('.list .option.selected')[0]);
        // Space or Enter
        if (event.keyCode == 32 || event.keyCode == 13) {
            if ($(this).hasClass('open')) {
                focused_option.trigger('click');
            } else {
                $(this).trigger('click');
            }
            return false;
            // Down
        } else if (event.keyCode == 40) {
            if (!$(this).hasClass('open')) {
                $(this).trigger('click');
            } else {
                focused_option.next().focus();
            }
            return false;
            // Up
        } else if (event.keyCode == 38) {
            if (!$(this).hasClass('open')) {
                $(this).trigger('click');
            } else {
                var focused_option = $($(this).find('.list .option:focus')[0] || $(this).find('.list .option.selected')[0]);
                focused_option.prev().focus();
            }
            return false;
            // Esc
        } else if (event.keyCode == 27) {
            if ($(this).hasClass('open')) {
                $(this).trigger('click');
            }
            return false;
        }
    });

    $(document).ready(function() {
        create_custom_dropdowns();
    });








})( jQuery );
