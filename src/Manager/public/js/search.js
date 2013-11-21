$(document).ready(function () {
	$('#omnisearch').typeahead({
        remote: '/Manager/api/search?q=%QUERY',
        limit: 20,
        template: '<div class="ui teal ribbon label">{{type}}</div>{{value}}',                                                                 
  		engine: Hogan
    });
    $("#omnisearch").on('typeahead:selected', function(evt, data) {
        if (data['id'] == '' || data['id'] == null) {
            return;
        }
        window.location = data['id'];
    });
    $("#omnisearch").on('typeahead:autocompleted', function(evt, data) {
        if (data['id'] == '' || data['id'] == null) {
            return;
        }
        window.location = data['id'];
    });
    $("#omnisearch").on('typeahead:opened', function(evt, data) {
        $('#omnigo').attr('data-href', '');
    });
    $('.item.manager').hover(
    	function () {
       		itemIn(this);
    	},
    	function () {
    		itemOut(this);
    	}
    );
});

var itemIn = function (item) {
	$(item).find('.ui.buttons').css({display: 'none'});
	$(item).find('a.star').css({display: 'none'});
	$(item).attr('data-in', 't');
	//setTimeout(function () {
		if ($(item).attr('data-in') == 'f') {
			return;
		}
		$(item).find('.ui.buttons').stop().fadeIn(600).css('display', 'inline-block');
		$(item).find('a.star').stop().fadeIn(1200);
	//}, 500);
};

var itemOut = function (item) {
	$(item).attr('data-in', 'f');
	$(item).find('a.star').css({display: 'none'});
	$(item).find('.ui.buttons').stop().fadeOut(50);
};