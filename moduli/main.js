
	
$(function() {
    $('#sidebarMenuInner > li').click(function(e) {
        e.stopPropagation();
        var $el = $('ul',this);
        $('#sidebarMenuInner > li > ul').not($el).slideUp();
        $el.stop(true, true).slideToggle(400);
    });
        $('#sidebarMenuInner > li > ul > li').click(function(e) {
        e.stopImmediatePropagation();  
    });
});


