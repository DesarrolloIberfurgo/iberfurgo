(function ($, elementor) {
    "use strict";
    

	var ElementskitLite = {
		init: function () {
			elementor.hooks.addAction('frontend/element_ready/global', function($scope){
				new EkitStickyHandler({ $element: $scope });
			});
		}
	};
	$(window).on('elementor/frontend/init', ElementskitLite.init);

	var CompareVersion = function (v1, v2) {
		if (typeof v1 !== 'string') return false;
		if (typeof v2 !== 'string') return false;
		v1 = v1.split('.');
		v2 = v2.split('.');
		const k = Math.min(v1.length, v2.length);
		for (let i = 0; i < k; ++ i) {
			v1[i] = parseInt(v1[i], 10);
			v2[i] = parseInt(v2[i], 10);
			if (v1[i] > v2[i]) return 1;
			if (v1[i] < v2[i]) return -1;        
		}
		return v1.length == v2.length ? 0: (v1.length < v2.length ? -1 : 1);
	}


	var ElementsKitModule = (typeof window.elementorFrontend.version !== 'undefined' && CompareVersion(window.elementorFrontend.version, '2.6.0' ) < 0)
							? elementorFrontend.Module
							: elementorModules.frontend.handlers.Base;

	var EkitStickyHandler = ElementsKitModule.extend({

		bindEvents: function bindEvents() {
			elementorFrontend.addListenerOnce(this.getUniqueHandlerID() + 'ekit_sticky', 'resize', this.run);
		},

		unbindEvents: function unbindEvents() {
			elementorFrontend.removeListeners(this.getUniqueHandlerID() + 'ekit_sticky', 'resize', this.run);
		},

		isActive: function isActive() {
			return undefined !== this.$element.data('ekit_sticky');
		},

		activate: function activate() {
			var elementSettings = this.getElementSettings(),
				stickyOptions = {
					to: elementSettings.ekit_sticky,
					offset: elementSettings.ekit_sticky_offset.size,
					effectsOffset: elementSettings.ekit_sticky_effect_offset.size,
					classes: {
						sticky: 'ekit-sticky',
						stickyActive: 'ekit-sticky--active ekit-section--handles-inside',
						stickyEffects: 'ekit-sticky--effects',
						spacer: 'ekit-sticky__spacer'
					}
				},
				$wpAdminBar = elementorFrontend.getElements('$wpAdminBar');

			if (elementSettings.ekit_sticky_parent) {
				stickyOptions.parent = '.ekit-widget-wrap';
			}

			if ($wpAdminBar.length && 'top' === elementSettings.ekit_sticky && 'fixed' === $wpAdminBar.css('position')) {
				stickyOptions.offset += $wpAdminBar.height();
			}

			this.$element.ekit_sticky(stickyOptions);
		},

		deactivate: function deactivate() {
			if (!this.isActive()) {
				return;
			}

			this.$element.ekit_sticky('destroy');
		},

		run: function run(refresh) {
			if (!this.getElementSettings('ekit_sticky')) {
				this.deactivate();

				return;
			}

			var currentDeviceMode = elementorFrontend.getCurrentDeviceMode(),
				activeDevices = this.getElementSettings('ekit_sticky_on');

			if (-1 !== activeDevices.indexOf(currentDeviceMode)) {
				if (true === refresh) {
					this.reactivate();
				} else if (!this.isActive()) {
					this.activate();
				}
			} else {
				this.deactivate();
			}
		},

		reactivate: function reactivate() {
			this.deactivate();

			this.activate();
		},

		onElementChange: function onElementChange(settingKey) {
			if (-1 !== ['ekit_sticky', 'ekit_sticky_on'].indexOf(settingKey)) {
				this.run(true);
			}

			if (-1 !== ['ekit_sticky_offset', 'ekit_sticky_effects_offset', 'ekit_sticky_parent'].indexOf(settingKey)) {
				this.reactivate();
			}
		},

		onInit: function onInit() {
			ElementsKitModule.prototype.onInit.apply(this, arguments);
	
			this.run();
		},

		onDestroy: function onDestroy() {
			ElementsKitModule.prototype.onDestroy.apply(this, arguments);
	
			this.deactivate();
		}
	});
}(jQuery, window.elementorFrontend));