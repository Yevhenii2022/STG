jQuery(function ($) {
	$(document).ready(function () {
		/* Load more posts */
		$('#load-more-posts a').on('click', function (e) {
			e.preventDefault();
			const button = $(this);
			const wrapper = $('#load-more-posts');
			const totalPages = parseInt(wrapper.data('totalpages'));
			const postType = wrapper.data('post-type');
			const catID = wrapper.attr('data-cat') || 0;
			const sortOrder = wrapper.attr('data-sort') || 'DESC';
			const searchTerm = $('#search-input').val();

			let currentPage = parseInt(wrapper.attr('data-page'));
			currentPage++;
			wrapper.attr('data-page', currentPage);

			$.ajax({
				type: 'post',
				url: '/wp-admin/admin-ajax.php',
				data: {
					action: 'load_more_posts',
					paged: currentPage,
					sort_order: sortOrder,
					postType: postType,
					search_term: searchTerm,
					catID: catID,
				},
				beforeSend: function () {
					button.text('Loading...');
				},
				success: function (response) {
					let data = JSON.parse(response);
					$('#post-list').append(data.html);

					wrapper.attr('data-totalpages', data.total_pages);

					if (currentPage >= data.total_pages) {
						button.hide();
					} else {
						button.text('Load more').show();
					}
				},
				error: function (error) {
					console.error('Failed to fetch posts. Error:', error);
				},
			});
		});

		/* Search functionality */
		let searchTimeout;
		$('#search-input').on('input', function () {
			const searchTerm = $(this).val();
			const wrapper = $('#load-more-posts');
			const postType = wrapper.data('post-type');
			const catID = wrapper.attr('data-cat') || 0;
			const sortOrder = wrapper.attr('data-sort') || 'DESC';
			const button = $('#load-more-posts a');
			button.text('Load more');
			wrapper.attr('data-page', 1);

			clearTimeout(searchTimeout);

			searchTimeout = setTimeout(function () {
				$.ajax({
					type: 'post',
					url: '/wp-admin/admin-ajax.php',
					data: {
						action: 'filter_posts',
						search_term: searchTerm,
						postType: postType,
						sort_order: sortOrder,
						paged: 1,
						catID: catID,
					},
					success: function (response) {
						let data = JSON.parse(response);
						$('#post-list').html(data.html);
						wrapper.attr('data-totalpages', data.total_pages);

						if (data.total_pages <= 1) {
							button.hide();
						} else {
							button.show().text('Load more');
						}
					},
					error: function (error) {
						console.error('Failed to fetch posts. Error:', error);
					},
				});
			}, 600);
		});

		/* Category filter */
		$('.select__item').on('click', function () {
			const catID = $(this).data('cat');
			const wrapper = $('#load-more-posts');
			const postType = wrapper.data('post-type');
			const sortOrder = wrapper.attr('data-sort') || 'DESC';
			const searchTerm = $('#search-input').val();
			const button = $('#load-more-posts a');

			wrapper.attr('data-cat', catID);
			wrapper.attr('data-page', 1);
			button.text('Load more');

			$.ajax({
				type: 'post',
				url: '/wp-admin/admin-ajax.php',
				data: {
					action: 'filter_posts',
					sort_order: sortOrder,
					postType: postType,
					search_term: searchTerm,
					paged: 1,
					catID: catID,
				},
				success: function (response) {
					let data = JSON.parse(response);
					$('#post-list').html(data.html);
					wrapper.attr('data-totalpages', data.total_pages);

					if (data.total_pages <= 1) {
						button.hide();
					} else {
						button.show().text('Load more');
					}
				},
				error: function (error) {
					console.error('Failed to fetch posts. Error:', error);
				},
			});
		});

		/* Custom select dropdown */
		$('.select').on('click', '.select__head', function () {
			if ($(this).hasClass('open')) {
				$(this).removeClass('open');
				$(this).next().fadeOut();
			} else {
				$('.select__head').removeClass('open');
				$('.select__list').fadeOut();
				$(this).addClass('open');
				$(this).next().fadeIn();
			}
		});

		$('.select').on('click', '.select__item', function () {
			$('.select__head').removeClass('open');
			$(this).parent().fadeOut();
			$(this).parent().prev().text($(this).text());
			$(this).parent().prev().prev().val($(this).text());
		});

		$(document).click(function (e) {
			if (!$(e.target).closest('.select').length) {
				$('.select__head').removeClass('open');
				$('.select__list').fadeOut();
			}
		});
	});
});
