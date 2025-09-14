jQuery(function ($) {
	$(document).ready(function () {
		/* Load more posts */
		$('#load-more-posts a').on('click', function (e) {
			e.preventDefault();
			const button = $(this);
			const totalPages = button.closest('#load-more-posts').data('totalpages');
			const postType = button.closest('#load-more-posts').data('post-type');
			let currentPage = $('#load-more-posts').attr('data-page');
			const sortOrder = $('#load-more-posts').attr('data-sort');
			const searchTerm = $('#search-input').val().toLowerCase();

			currentPage++;
			$('#load-more-posts').attr('data-page', currentPage);

			$.ajax({
				type: 'post',
				url: '/wp-admin/admin-ajax.php',
				data: {
					action: 'load_more_posts',
					paged: currentPage,
					sort_order: sortOrder,
					postType: postType,
					search_term: searchTerm,
				},
				beforeSend: function () {
					button.text('Loading...');
				},
				success: function (response) {
					$('#post-list').append(response);

					if (
						currentPage >= totalPages ||
						$('.search-result-header').data('pages') == currentPage
					) {
						button.hide();
					} else {
						button.text('Load more');
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
			const searchTerm = $(this).val().toLowerCase();
			const postType = $('#load-more-posts').data('post-type');
			const sortOrder = $('#sort-order').val();
			let sortOrder2;
			const button = $('#load-more-posts a');
			button.text('Load more');

			if (sortOrder === 'From Newest to Oldest') {
				sortOrder2 = 'DESC';
			} else if (sortOrder === 'From Oldest to Newest') {
				sortOrder2 = 'ASC';
			} else {
				sortOrder2 = '';
			}

			$('#load-more-posts').attr('data-page', 1);

			clearTimeout(searchTimeout);

			searchTimeout = setTimeout(function () {
				$.ajax({
					type: 'post',
					url: '/wp-admin/admin-ajax.php',
					data: {
						action: 'filter_posts',
						search_term: searchTerm,
						postType: postType,
						sort_order: sortOrder2,
						paged: 1,
					},
					beforeSend: function () {
						$('.load-more-posts__loader').addClass('loading');
					},
					success: function (response) {
						$('.load-more-posts__loader').removeClass('loading');
						$('#post-list').empty().html(response);
						const noPosts = $('.search-no-posts').length;

						if (
							$('.search-result-header').data('pages') <= $('#load-more-posts').data('page') ||
							noPosts == 1
						) {
							button.hide();
						} else {
							button.show();
						}
					},
					error: function (error) {
						console.error('Failed to fetch posts. Error:', error);
					},
				});
			}, 600);
		});

		/* Sort functionality */
		$('.select__item').on('click', function () {
			const sortOrder = $(this).data('sort');
			$('#load-more-posts').attr('data-sort', sortOrder);
			$('#load-more-posts').attr('data-page', 1);

			const button = $('#load-more-posts a');
			const totalPages = button.closest('#load-more-posts').data('totalpages');
			button.text('Load more');
			let currentPage = button.closest('#load-more-posts').data('page');
			const postType = $('#load-more-posts').data('post-type');
			const searchTerm = $('#search-input').val();

			$.ajax({
				type: 'post',
				url: '/wp-admin/admin-ajax.php',
				data: {
					action: 'filter_posts',
					sort_order: sortOrder,
					postType: postType,
					search_term: searchTerm,
					paged: 1,
				},
				beforeSend: function () {
					$('.load-more-posts__loader').addClass('loading');
				},
				success: function (response) {
					$('.load-more-posts__loader').removeClass('loading');
					$('#post-list').empty().html(response);
					const noPosts = $('.search-no-posts').length;

					if (
						currentPage >= totalPages ||
						$('.search-result-header').data('pages') <= 1 ||
						noPosts == 1
					) {
						button.hide();
					} else {
						button.show();
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
