(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

    $(function() {
        var scntDiv = $('#options');
        var i = $('#options p').size() + 1;

        $('#addScnt').live('click', function() {
            $('<p>'+
                '<select id="pet-select" name="bb_data['+i+'][department]"> ' +
            '<option value="">--Please choose--</option> ' +
            '<option  value="coming-in">Money Coming In</option> ' +
            '<option  value="going-out">Money Going Out</option> ' +
            '</select>'+
            '<label for="title">' +
            '<input type="text" name="bb_data['+i+'][title]" value="" placeholder="Title" />' +
            '</label>' +
            '<label for="short_info">' +
            '<input type="text" name="bb_data['+i+'][short_info]" value="" placeholder="Short Info" />' +
            '</label>' +
            '<label for="long_info">' +
            '<textarea placeholder="Long info" name="bb_data['+i+'][long_info]" rows="4" cols="50" ></textarea>' +
            '</label>' +
                '<label for="url">' +
            '<input type="text" name="bb_data['+i+'][url]"  placeholder="Url address"/> ' +
            '</label>' +
            '<a href="#" id="remScnt">Remove</a>' +
            '</p>').appendTo(scntDiv);
            i++;
            return false;
        });

        $('#remScnt').live('click', function() {
            if( i > 2 ) {
                $(this).parents('p').remove();
                i--;
            }
            return false;
        });
    });


})( jQuery );
