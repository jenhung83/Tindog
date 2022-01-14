// pieces and components

const initFields = () => {
	const fields = document.querySelectorAll('.field');

	fields.forEach((item) => {
		let input = item.querySelector(`input[type="text"],
			input[type="email"], 
			input[type="tel"],
			input[type="url"],
			input[type="password"],
			input[type="file"],
			textarea`);
		let determineHasValue = () => {
			input.value
				? item.classList.add('has-value')
				: item.classList.remove('has-value');
		};

		if (input) {
			determineHasValue();
			input.addEventListener('change', determineHasValue);
			input.addEventListener('blur', determineHasValue);
		}
	});
};

const initAccordion = () => {
	const accordion = document.querySelectorAll('.comp-accordion');

	accordion.forEach((el) => {
		el.querySelector('.accordion-label').addEventListener('click', (e) => {
			// activate current accordion
			slide('toggle', el.querySelector('.accordion-content'));

			!el.classList.contains('active')
				? el.classList.add('active')
				: el.classList.remove('active');

			accordion.forEach((el2) => {
				if (el2 != el) {
					// inactive all other accordions
					slide('up', el2.querySelector('.accordion-content'));
					el2.classList.remove('active');
				}
			});
		});
	});
};

// global elements and pages

const initPageTransition = () => {
	document.querySelectorAll('a[href]').forEach((item) => {
		// if href points to anchor, or points to anchor that exists on page
		if (
			item.href.startsWith('#') ||
			item.href.split('#')[0] == location.href.split('#')[0]
		) {
			item.setAttribute('data-page-transition', 'scroll');
		} else if (
			(item.href.includes(siteUrl) || item.href.startsWith('/')) &&
			item.target != '_blank' &&
			!item.href.includes('mailto:')
		) {
			item.setAttribute('data-page-transition', 'internal');
		} else {
			item.rel = 'noopener';
			item.target = item.target || '_blank';
		}
	});

	document.querySelectorAll('[data-page-transition]').forEach((item) => {
		item.addEventListener('click', (e) => {
			let target = e.target.hasAttribute('data-page-transition')
				? e.target
				: e.target.closest('[data-page-transition]');

			target.blur();

			if (
				target.dataset.pageTransition == 'internal' &&
				!root.classList.contains('key-is-down')
			) {
				e.preventDefault();
				root.classList.remove(
					'header-is-sticky',
					'menu-is-active',
					'mobile-menu-is-active'
				);
				root.classList.add('is_leaving');

				setTimeout(() => {
					location.href = target.href;
				}, 400);
			} else if (target.dataset.pageTransition == 'scroll') {
				e.preventDefault();
				seamless.elementScrollIntoView(
					document.querySelector(`#${target.href.split('#')[1]}`),
					{
						behavior: 'smooth',
					}
				);
			}
		});
	});

	window.addEventListener('keydown', () => {
		root.classList.add('key-is-down');
	});

	window.addEventListener('keyup', () => {
		root.classList.remove('key-is-down');
	});
};

const initPageAnimation = () => {
	document.querySelectorAll('[data-animate]').forEach((item) => {
		let observer = new IntersectionObserver(
			(el) => {
				if (
					el[0].isIntersecting === true &&
					!el[0].target.classList.contains('is-animated')
				) {
					el[0].target.classList.add('is-animated');
				}
			},
			{
				root: null,
				threshold: [0.4], // 0 = page start; 1 = page bottom, items only revealed when in full view
			}
		);

		observer.observe(item);
	});
};

const initBlogIndex = () => {
	let infiniteScroll = new InfiniteScroll('.blog-load-more', {
		path: '.blog-pagination-next',
		append: '.blog-post',
		button: '.blog-load-more-trigger',
		scrollThreshold: false,
		history: false,
	});

	infiniteScroll.on('last', (body, path) => {
		let loadMoreTrigger = document.querySelector('.blog-load-more-trigger');

		loadMoreTrigger.style.display = 'block';
		loadMoreTrigger.disabled = true;
		loadMoreTrigger.innerHTML = 'You’ve reached the end';
	});
};

///////這段扣放在 https://github.com/View-Source-Dev/starter-elements/tree/main/marquee
/*
	Description: Infinite looping marquee element
	Options:
	1. data-marquee-speed: speed of marquee, defaults to 1.5
		• you can overwrite the default animation speed in a few ways:
			1. assigning data-speed via a CMS setting
			2. assigning data-speed by a function of blocks uploaded
				Liquid example: assign speed = 20 | times: section.blocks.size
	make it into a component easily with a setup like:
	render 'comp-marquee',
	speed: speed,
	classes: 'section-name bg-green',
	content: content
*/
const initMarquee = () => {
	const marquees = document.querySelectorAll('.marquee');

	marquees.forEach((marquee) => {
		let maruqeeBlocks = marquee.querySelectorAll('.marquee-block');
		let maruqeeBlockWidth = maruqeeBlocks[0].clientWidth;
		// block content must be greater the window's innerWidth
		let factor = Math.ceil(innerWidth / maruqeeBlockWidth);
		let marqueeHtml = maruqeeBlocks[0].innerHTML;

		maruqeeBlocks.forEach((block) => {
			// override default speed if specified?
			if (marquee.hasAttribute('data-speed')) {
				block.style.animationDuration = marquee.dataset.speed + 's';
			}

			// should we replicate content to fill the window's innerWidth?
			for (i = 0; i < factor; i++) {
				// if so, repeat block content
				block.innerHTML += marqueeHtml;
			}
		});
	});
};

// initiate site
window.addEventListener('DOMContentLoaded', () => {
	// execute global and component functions
	initPageTransition();
	initPageAnimation();
	initFields();
	initAccordion();
	initMarquee();
	// execute page specific functions
	switch (root.id) {
		case 'frontpage':
			// initFrontpage();
			break;
	}

	// iframe fit vids
	reframe(
		'.content-layout iframe[src*="vimeo.com"], .content-layout iframe[src*="youtube.com"]',
		'video-reframe'
	);

	// make visible .avoid-style-flash elements
	setTimeout(() => {
		document.querySelectorAll('.avoid-style-flash').forEach((el) => {
			el.style.visibility = 'visible';
		});
	}, 400);
});
