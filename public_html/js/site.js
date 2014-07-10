var sidebar = {
	isOpen: false,
	openId: '.open-sidebar',
	closeId: '.sidebar > .item',
	sidemenuId: '.sidebar',
	init: function() {
		$(sidebar.openId).on('click', function() {
			sidebar.toggleMenu();
		});
		$(sidebar.closeId).on('click', function() {
			sidebar.toggleMenu();
		});
	},
	toggleMenu: function() {
		if (sidebar.isOpen) {
			sidebar.isOpen = false;
			$(sidebar.sidemenuId).css('-webkit-transform', 'translate(-100%, 0)')
								  .css('-moz-transform', 'translate(-100%, 0)')
								  .css('-ms-transform', 'translate(-100%, 0)')
								  .css('-o-transform', 'translate(-100%, 0)')
								  .css('transform', 'translate(-100%, 0)');
		} else {
			sidebar.isOpen = true;
			$(sidebar.sidemenuId).css('-webkit-transform', 'translate(0, 0)')
								  .css('-moz-transform', 'translate(0, 0)')
								  .css('-ms-transform', 'translate(0, 0)')
								  .css('-o-transform', 'translate(0, 0)')
								  .css('transform', 'translate(0, 0)');
		}
	}
}

$(document).on('ready', function() {
	sidebar.init();
});