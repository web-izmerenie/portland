/** 
	* Global object for the whole web project. 
	* Use prefix with app. to add new functions.
	* Don't clog in the code, please.
*/
var app = (function() {

	return {

		DEBUG: true,

		/** 
			* Default settings for the current page.
			* These settings use in the all functions.
			* Keep it right.
		*/
		DEFAULT_SETTINGS: {
			"SITE_PATH": ".",
			"SITE_JS_PATH": "../js",
			"SITE_IMAGES_PATH": "../i",
			"SITE_UPLOAD_PATH": "../dummy"
		},

		/** Real used settings. */
		SETTINGS: {},

		/**
			* All used javascripts that defined in init.settings method
			* But we need load JQuery firstly
		*/
		SCRIPTS: {
			JQUERY: {
				CDN: "http://code.jquery.com/jquery-1.10.1.min.js"
			}
		},

		/**
			* Default messages. Used for multilanguaging
		*/
		MESSAGES: {
			RU: {
				PRELOADER: {
					LOADING: "Пожалуйста, подождите"
				}
			}
		},

		/** Web project initialization. */
		init: {

			/** 
				* Set up global params for the current page.
				* @param {object} settings - The settings object. Sample format is DEFAULT_SETTINGS.
			*/
			settings: function(settings) {

				app.log("Init settings", "time");

				// Checkup for settings
				if(!settings) {
					return null;
				}

				// Set up params from input param
				for(var option in settings) {

					if(!settings.hasOwnProperty(option) || !app.DEFAULT_SETTINGS.hasOwnProperty(option)) {
						continue;
					}

					app.SETTINGS[option] = settings[option];

				}

				/**
					* All used javascripts
				*/
				app.SCRIPTS = {
					JQUERY: {
						CDN: "http://code.jquery.com/jquery-1.10.1.min.js",
						LOCAL: app.SETTINGS.SITE_JS_PATH + "/vendor/jquery-1.10.2.min.js"
					},
					JQUERYUI: {
						LOCAL: app.SETTINGS.SITE_JS_PATH + "/vendor/jquery-ui.min.js"
					},
					UNIFORM: {
						LOCAL: app.SETTINGS.SITE_JS_PATH + "/vendor/jquery.uniform.js"
					},
					GOOGLEMAPS: {
						CDN: "http://maps.googleapis.com/maps/api/js?key=AIzaSyDMJfb274yP35aQlI2rTASmL_-q2ZqZZpU&sensor=true&callback=contactsMapsInit"
					}
				}

				app.log("Init settings", "timeEnd");

			},

			methods: function() {

				app.log("Init methods", "time");

				if(!app.methods) {
					return false;
				}

				for(var method in app.methods) {

					if (!app.methods.hasOwnProperty(method)) {
						continue;
					}

					app.methods[method] = app.methods[method](jQuery);

				}

				app.log("Init methods", "timeEnd");

			}


		},

		/** Web project asynchronous loader. */
		loader: {

			/**
				* JavaScript loader.
				* Yepnope is used for loading (Modernizr is consits of yepnope.js): 
				* @param {string} src - The path to the script. It can be CDN.
				* @param {string} mirror - The local project mirror.
				* @param {function} test - The test function for checking up script loading.
				* @param {function} callback - The callback function. Call when script is loaded.
			*/
			loadScript: function(code, test, callback) {

				if(!app.SCRIPTS[code]) {
					return false;
				}

				if(app.SCRIPTS[code]["loaded"]) {
					if(callback) {
						callback();
					}
					return true;
				}

				if(window.Modernizr === undefined || !code || !test) {
					return false;
				}

				var src = app.SCRIPTS[code].CDN ? app.SCRIPTS[code].CDN : app.SCRIPTS[code].LOCAL,
					mirror = (app.SCRIPTS[code].CDN && app.SCRIPTS[code].LOCAL) ? app.SCRIPTS[code].LOCAL : false;

				Modernizr.load([{
					load: src,
					complete: function() {

						if(!test() && mirror) {

							Modernizr.load([{
								load: mirror,
								complete: function() {

									app.SCRIPTS[code]["loaded"] = true;
							   		if(callback) {
							        	callback();
							        }

								}
							}]);

						} else {

							app.SCRIPTS[code]["loaded"] = true;
					   		if(callback) {
					        	callback();
					        }

						}

					}

				}]);

			},

			/**
				* Image loader.
				* @param {string} src - A path to the image.
				* @callback {function} callback - The callback function. Call when image is loaded. 
			*/
			loadImage: function(src, callback) {

				if(callback) {
					callback();
				}

			}

		},

		/**
			* Simple logger for debugging.
			* @param {string} msg - Message for logger
			* @param {string} type - Message type/ It may be: log, info, warn, error
		*/
		log: function(msg, type) {

			if(!app.DEBUG || !window.console) {
				return false;
			}

			if(!msg || !type) {
				return false;
			}

			if(!console[type]) {
				return false;
			}

			console[type](msg);

		}

	}

})();

// Methods
app.methods = {};