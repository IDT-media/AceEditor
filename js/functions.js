jQuery(function() {
	jQuery(".pagemcontainer,.pageerrorcontainer").each(function() {
		var c = jQuery(this);
		window.setTimeout(function() {
			c.hide();
		}, 9000);
	});
});
