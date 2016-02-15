/**
 * Plugin Name: Sedici-Plugin
 * Plugin URI: http://sedici.unlp.edu.ar/
 * Description: This plugin connects the repository SEDICI in wordpress, with the purpose of showing the publications of authors or institutions
 * Version: 1.0
 * Author: SEDICI - Paula Salamone Lacunza
 * Author URI: http://sedici.unlp.edu.ar/
 * Copyright (c) 2015 SEDICI UNLP, http://sedici.unlp.edu.ar
 * Distributed under the GNU GPL v3. For full terms see the file docs/COPYING.
 */


jQuery(document).ready(function() {
	// inicializacion
	var conditionalAuthor = 'div.seleccionada #conditionally-author ';
	var checkAuthor = 'div.seleccionada #pshow-author input:radio[value="author"]';
	
	var conditionaDescription = 'div.seleccionada p.conditionally-description';
	var description = 'div.seleccionada p.description input:checkbox';
	
	var conditionalFilter = 'div.seleccionada span.conditionally-filter';
	var checkFilter = 'div.seleccionada p.show-filter';
        var conditionalTypes = 'div.seleccionada ul.subtipos'
	
	var conditionalLimit = 'div.seleccionada p.conditionally-limit';
	var checkLimit = 'div.seleccionada p.limit';

	
	
        jQuery('#menu-selector div').not(':first').hide();
        jQuery('#menu-selector ul li:first a').addClass('aqui');
        jQuery('#menu-selector div:first').addClass('seleccionada');
        jQuery('#menu-selector a').click(function(){
        jQuery('#menu-selector div').removeClass('seleccionada');
        jQuery('#menu-selector a').removeClass('aqui');
        jQuery(this).addClass('aqui');
        jQuery('#menu-selector div').fadeOut(350).filter(this.hash).fadeIn(350);
        jQuery('#menu-selector div').filter(this.hash).addClass('seleccionada');
        //alert(imprimir);
        return false;
         });
         
         	// binding
	jQuery('div.seleccionada #pshow-author input:radio').live('change', function() {
		jQuery(conditionalAuthor).toggle(jQuery(checkAuthor).is(':checked'));
	}); 
	jQuery(description).live('change', function() {
		jQuery(conditionaDescription).toggle();
	});
	jQuery(checkFilter).live('change', function() {
		jQuery(conditionalFilter).toggle();
	});
        jQuery(checkFilter).live('change', function() {
		jQuery(conditionalTypes).toggle();
	});
	jQuery(checkLimit).live('change', function() {
		jQuery(conditionalLimit).toggle();
	});


});

function justNumbers(e) {
	var keynum = window.event ? window.event.keyCode : e.which;
	if ((keynum == 8) || (keynum == 9)) return true;
	return /\d/.test(String.fromCharCode(keynum));
}

