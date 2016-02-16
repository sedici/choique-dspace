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
        var divFilter = 'div.seleccionada'
        
	var conditionalAuthor = divFilter +' #conditionally-author ';
	var checkAuthor = divFilter +' #pshow-author input:radio[value="author"]';
	
	var conditionaDescription = divFilter + ' p.conditionally-description';
	var description = divFilter +' p.description input:checkbox';
	
	var conditionalFilter = divFilter +' span.conditionally-filter';
	var checkFilter = divFilter +' p.show-filter';
        var conditionalTypes = divFilter +' ul.subtipos'
	
	var conditionalLimit = divFilter +' p.conditionally-limit';
	var checkLimit = divFilter +' p.limit';

	var filters = new Array ( {selector:description, conditional:conditionaDescription } ,
                               {selector:checkFilter, conditional:conditionalFilter},
                               {selector:checkFilter, conditional:conditionalTypes},
                               {selector:checkLimit, conditional:conditionalLimit});
        
	
        jQuery('#menu-selector div:gt(0)').hide();
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
        jQuery.each( filters, function( i, value ) {
            jQuery(value.selector).live('change', function() {
		jQuery(value.conditional).toggle();
         }); 
        });
         
	jQuery('div.seleccionada #pshow-author input:radio').live('change', function() {
		jQuery(conditionalAuthor).toggle(jQuery(checkAuthor).is(':checked'));
	}); 
});

function justNumbers(e) {
	var keynum = window.event ? window.event.keyCode : e.which;
	if ((keynum == 8) || (keynum == 9)) return true;
	return /\d/.test(String.fromCharCode(keynum));
}

