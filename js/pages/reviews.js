$(document).ready(function(){
    $more.on('click', function () { // {{{1
		if ($more.data('process')) return false;
		$more.data('process', true);
		$more.addClass('loading');

		setTimeout(function () {

			function stopping() {
				$more.removeClass('loading');
				setTimeout(function () {
					$more.removeData('process');
				}, getVal('animationSpeed'));
			}

			var getData = {
				page: parseInt($more.attr("data-next-page"), 10),
			};

			if ($more.attr('data-count'))
				getData.count = parseInt($more.attr('data-count'), 10);

			$.ajax({ // {{{2
				url: getVal('moreEventsAjaxURL'),
				type: 'GET',
				cache: false,
				dataType: 'text',
				data: getData,
				success: function (data) {
					var jsonAnswer = require('../basics/json_answer');
					jsonAnswer.validate(data, function (err, json) {
						if (err) {
							if (
								err instanceof jsonAnswer.exceptions.UnknownStatusValue &&
								err.json && err.json.status === 'end_of_list'
							) {
								$more.slideUp(getVal('animationSpeed') * 6, function () {
									$more.remove();
									$w.off('scroll' + bindSuffix);
								});
								if (!err.json.items) return;
								else json = err.json;
							} else {
								alert(getLocalText('ERR', 'AJAX') + '\n\n' + err.toString());
								return stopping();
							}
						}

						if (!$.isArray(json.items)) {
							alert(getLocalText('ERR', 'AJAX_PARSE'));
							return stopping();
						}

						$more.attr("data-next-page", ++(getData.page));

						var items = json.items;
						var i = 0;

						var loopEnd = stopping;

						function loadItemLoop() { // {{{3
							if (items.length <= i) return loopEnd();

							var item = items[i++];

							var $newEl = $('<div/>', { class: 'event_item' });
							if (item.id) $newEl.attr('id', item.id);
							$newEl.css('opacity', '0');

							var $h3 = $('<h3/>');
							var $title = $('<span/>').html(item.title);
							var $link;
							if (item.link) {
								$link = $('<a/>', { href: item.link });
								$link.append($title);
								$h3.append($link);
							} else {
								$h3.append($title);
							}
							$newEl.append($h3);

							var $date = $('<h4/>').html(item.date);
							$newEl.append($date);

							var $previewText;
							if (item.preview_text) {
								$previewText = $('<div/>', { class: 'preview_text' });
								$previewText.html(item.preview_text);
								$newEl.append($previewText);
							}

							

							$els.last().after( $newEl );

							reInit();

							setTimeout(function () {
								var $el = $els.last();
								$el.animate(
									{ opacity: 1 },
									getVal('animationSpeed'),
									getVal('animationCurve'),
									loadItemLoop
								);
							}, 0);
						} // loadItemLoop() }}}3

						loadItemLoop();
					}); // jsonAnswer.validate()
				}, // "success"
				error: function () {
					alert(getLocalText('ERR', 'AJAX'));
					stopping();
				}
			}); // .ajax() }}}2

		}, getVal('animationSpeed')); // setTimeout()

		return false;
	}); // $more.click }}}1

	$w.on('scroll' + bindSuffix, function () {
		if ($d.scrollTop() + $w.height() >= $more.offset().top)
			$more.trigger('click');
	});
});//ready