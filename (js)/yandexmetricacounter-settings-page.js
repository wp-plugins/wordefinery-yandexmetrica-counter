jQuery(document).ready(function($){
    var customize_sel = $('#wordefinery-yandexmetricacounter-customize');
    var show_informer_sel = $('#wordefinery-yandexmetricacounter-show_informer');

    var show_informer_f = function() {
        if ($(this).is(':checked')) {
            customize_sel.fadeTo(0, 1);
            customize_sel.children().first().hide();
        } else {
            customize_sel.fadeTo(0, 0.3);
            customize_sel.children().first().show();
        };
    }
    show_informer_sel.change(show_informer_f);
    show_informer_sel.change();

    var align = $('#wordefinery-yandexmetricacounter-align');
    var align_sel = $('#wordefinery-yandexmetricacounter-preview').find('div.align');
    var preview_sel = $('#wordefinery-yandexmetricacounter-preview').find('div.preview');

    var align_f = function() {
        align_sel.find('a').removeClass('selected');
        $(this).addClass('selected');
        align.val($(this).prop('name'));
        preview_sel.css('text-align', align.val());
    }
    align_sel.find('a').click(align_f);
    if (align.val()!='0' && align.val()!='') align_sel.find('a[name='+align.val()+']').click();

    var preview_f = function() {
        var img_url = size.filter(':checked').val() +
            '_' + arrow.filter(':checked').val() +
            '_' + color_top.val() + alpha_top.val() +
            '_' + color_top.val() + alpha_top.val() +
            '_' + text.filter(':checked').val() +
            '_' + info.filter(':checked').val();
        if (1 || typeof(yandexmetrica_site_id) == 'undefined' || !$.isNumeric(yandexmetrica_site_id)) {
            preview_sel.find('iframe').get(0).contentWindow.postMessage(img_url, 'http://wordefinery.com');
        } else {
            img_url = 'http://bs.yandex.ru/informer/' + yandexmetrica_site_id + '/' + img_url;
            preview_sel.find('img').attr('src', img_url);
        }
    }

    if (1 || typeof(yandexmetrica_site_id) == 'undefined' || !$.isNumeric(yandexmetrica_site_id)) {
        preview_sel.html('<iframe width=88 height=36></iframe>');
        preview_sel.find('iframe').attr('src', 'http://wordefinery.com/i/metrica.htm');
        preview_sel.find('iframe').load(preview_f);
    }

    var size_sel = $('#wordefinery-yandexmetricacounter-settings').find('div.size');
    var arrow_sel = $('#wordefinery-yandexmetricacounter-settings').find('div.arrow');
    var text_sel = $('#wordefinery-yandexmetricacounter-settings').find('div.text');
    var info_sel = $('#wordefinery-yandexmetricacounter-settings').find('div.info');
    var color_top_sel = $('#wordefinery-yandexmetricacounter-settings').find('div.color-top');
    var alpha_top_sel = $('#wordefinery-yandexmetricacounter-settings').find('div.alpha-top');

    var size = size_sel.find('input');
    var arrow = arrow_sel.find('input');
    var text = text_sel.find('input');
    var info = info_sel.find('input');
    var color_top = $('#wordefinery-yandexmetricacounter-color_top');
    var alpha_top = $('#wordefinery-yandexmetricacounter-alpha_top');

    var selector_f = function() {
        $(this).parent().parent().find('label').removeClass('selected');
        $(this).parent().addClass('selected');
        preview_f();
    }
    $('#wordefinery-yandexmetricacounter-settings').find('.selector label input').click(selector_f);
    $('#wordefinery-yandexmetricacounter-settings').find('.selector label input:checked').parent().addClass('selected');

    var size_f = function() {
        if ($(this).val() == 3) {
            info_sel.find('label input').first().click();
            info_sel.find('label input').prop('disabled', true);
            preview_f();
        } else {
            info_sel.find('label input').prop('disabled', false);
        };
    }
    size_sel.find('label input').click(size_f);
    size_sel.find('label input:checked').click();

    pick_color_f = function(a) {
  		a = a.replace(/[^a-fA-F0-9]+/, '');
        color_top.val(a);
  		if ( a.length === 6 ) {
        	farbtastic.setColor('#' + a);
		    color_top_sel.find('a.color-top-pick').css('background-color', '#' + a);
            preview_f();
        }
    }
    if (color_top_sel.length) {
	    farbtastic = $.farbtastic(color_top_sel.find('div.color-top-picker'), pick_color_f);
	  	pick_color_f( color_top.val() );
	
	  	color_top.keyup( function() { pick_color_f(color_top.val()); });
	    color_top_sel.find('.color-top-pick').click( function(e) { color_top_sel.find('div.color-top-picker').show(); e.preventDefault(); });
	    $(document).mousedown( function() { color_top_sel.find('div.color-top-picker').hide(); });
    }

    alpha_top_sel.find('.slider').slider({
			value: parseInt(alpha_top.val(), 16),
			min: 0,
			max: 255,
			step: 16,
			slide: function( event, ui ) {
				alpha_top.val( ui.value<256?ui.value.toString(16).toUpperCase():'FF' );
                preview_f();
			}
		});
  	alpha_top.keyup( function() {
        var a = parseInt(alpha_top.val(), 16);
        if (isNaN(a) || a<0 || a>255) {
            if (a>255) a = 255;
            if (a<0) a = 0;
            if (isNaN(a)) a = 0;
        }
        alpha_top.val(a.toString(16).toUpperCase());
        preview_f();
        alpha_top_sel.find('.slider').slider('value', a);
    });

});
