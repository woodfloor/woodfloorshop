			$(document).ready(function() {								
				//syntax highlighter
				hljs.tabReplace = '    ';
				hljs.initHighlightingOnLoad();								
				$.fn.slideFadeToggle = function(speed, easing, callback) {
					return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback);
				};								
				//collapsible management
				$('.collapsible').collapsible({
					defaultOpen: 'section1',
					cookieName: 'nav',
					speed: 'slow',
					animateOpen: function (elem, opts) {
						elem.next().slideFadeToggle(opts.speed);
					},
					animateClose: function (elem, opts) {
						elem.next().slideFadeToggle(opts.speed);
					},
					loadOpen: function (elem) {
						elem.next().show();
					},
					loadClose: function (elem, opts) {
						elem.next().hide();
					}
				});
				$('.page_collapsible').collapsible({
					defaultOpen: 'body_section1',
					cookieName: 'body2',
					speed: 'slow',
					animateOpen: function (elem, opts) {
						elem.next().slideFadeToggle(opts.speed);
					},
					animateClose: function (elem, opts) {
						elem.next().slideFadeToggle(opts.speed);
					},
					loadOpen: function (elem) {
						elem.next().show();
					},
					loadClose: function (elem, opts) {
						elem.next().hide();
					}								
				});								
			});