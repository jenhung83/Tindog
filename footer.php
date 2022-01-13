	</main>

	<?php include( locate_template( 'inc/global-footer.php', false, false ));?>

	<script>
		// prevent safari to load from cache
		window.onpageshow = function (event) {
			if (event.persisted) {
				window.location.reload();
			}
		};

		// prevent chrome to load from cache
		const perfEntries = performance.getEntriesByType("navigation");
		if (typeof (perfEntries[0]) != 'undefined') {
			if (perfEntries[0].type === "back_forward") { 
				location.reload(true)
			}
		}

		// dynamically set spacing variables
		const globalAnnouncement = document.querySelector('global-announcement');
		const globalHeader = document.querySelector('global-header');

		root.style.setProperty(
			'--s-viewport-height-initial', `${window.innerHeight}px`
		);

		const setSpacingVariables = () => {
			root.style.setProperty(
				'--s-announcement', 
				`${(globalAnnouncement ? globalAnnouncement.offsetHeight : 0)}px`
			);

			root.style.setProperty(
				'--s-header', 
				`${(globalHeader ? globalHeader.offsetHeight : 0)}px`
			);

			root.style.setProperty(
				'--s-viewport-height', `${window.innerHeight}px`
			);
		}

		setSpacingVariables();
		window.addEventListener('resize', setSpacingVariables);

		// set min container height to fill screen, so footer is always at bottom
		const main = document.getElementById('main');
		const globalFooter = document.querySelector('.global-footer');

		main.style.minHeight = `calc(100vh - ${
			(globalFooter ? globalFooter.offsetHeight : 0)}px)`;

		// assign loaded state to root
		root.classList.add('is_loaded');
	</script>

	<?php wp_footer();?>
</body>
</html>