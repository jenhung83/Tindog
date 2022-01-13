<?php $font_path = get_template_directory_uri().'/assets-fonts/';?>

<style>

/*

	U1 SETTINGS
	U2 COLOR 
	U3 TYPOGRAPHY
	U4 LAYOUTS

*/

@font-face {
	font-family: "Montserrat";
	src: url(<?php echo $font_path.'font-fontname-regular.woff2';?>) format("woff2");
	font-weight: 400;
	font-style: normal;
	font-display: block;
}

/* 
	INSTALL THE LATEST VERSION FROM 
	github.com/View-Source-Dev/starter-elements/blob/main/_installs/utilities.css
*/
  
/*	U1 SETTINGS	*/

:root {
	--cr-black: #212529;
	--cr-black-o: #343a4080;
	--cr-dark: #343a40;
	--cr-grey: #8f8f8f;
	--cr-white: #ffffff;
	--cr-white-s1: #e2e6ea; /* shades */
	--cr-white-s2: #e2e6ea;
	--cr-white-o: #ffffff89; /* opacity */
	--cr-subdued: #dddddd;
	--cr-subtle: #f9f9f9;
	--cr-main: #ff4c68;
	--cr-sec: #ef8172;

	--t-h-1: 900 3.5rem/1.5 'Montserrat-black', sans-serif;
	--t-h-2: 400 3.5rem/1.5 'Montserrat-bold', sans-serif;
	--t-h-3: 400 28px/1.5 'Montserrat-bold', sans-serif;
	--t-h-4: 400 18px/1.5 'Montserrat-bold', sans-serif;
	
	--t-b-1: 1.2rem/1.5 'Montserrat', sans-serif;
	--t-b-2: 16px/1.5 'Montserrat', sans-serif;

	--t-l-1: 1.25rem/1.5 'Montserrat', sans-serif;

	--s-1: 5px;
	--s-2: 10px;
	--s-3: 20px;
	--s-4: 40px;
	--s-5: 80px;
	--s-6: 160px;

	--w-1: 1200px;
	--w-2: 900px;
	--w-3: 600px;
	--w-4: 420px;
	--w-5: 300px;

	--s-section: var(--s-5);
	--s-section-half: var(--s-4);
	--s-contain: 4vw;
	--s-contain-max: 1600px;
	--s-edge: var(--s-contain);

	--a-panel: cubic-bezier(0.36, 0.07, 0.19, 0.97);
	--a-bounce: cubic-bezier(0.5, -0.5, 0.5, 1.5);
	--a-swift: cubic-bezier(0, 0.99, 0.6, 0.99);
}

::selection {
	text-shadow: none;
	background-color: var(--cr-dark); /* 在這邊設定反白文字的效果 */
}

::-moz-selection {
	text-shadow: none;
	background-color: rgba(125, 125, 125, 0.3);
}

::placeholder {
	color: inherit;
}

::-webkit-input-placeholder {
	color: inherit;
}

:-moz-placeholder {
	color: inherit;
}

:-ms-input-placeholder {
	color: inherit;
}


@media screen and (max-width: 600px) {
	:root {
		--s-section: var(--s-4);
		--s-section-half: var(--s-3);
	}
}

/*	
	update edge spacing when .c reaches its max width	
	1600 var(--s-contain-max) / 1 - var(--s-contain)*2
*/

@media screen and (min-width: 1740px) {
	:root {
		--s-edge: calc((100vw - var(--s-contain-max)) / 2);
	}
}

@media (hover: hover) {
	* {
		outline-offset: 3px;
		outline-color: transparent;
	}

	*:focus-visible {
		outline: 1px dotted rgba(125, 125, 125, 0.8);
	}
}

/*	U1 SETTINGS - END	*/

/*	U2 COLOR	*/

html {
	color: var(--cr-black);
}

.cr-black {
	color: var(--cr-black);
}
	.cr-dark {
		color: var(--cr-dark);
	}
	.cr-grey {
		color: var(--cr-grey);
	}
.cr-white {
	color: var(--cr-white);
}
	.cr-white-o {
		color: var(--cr-white-o);
	}
.cr-subdued {
	color: var(--cr-subdued);
}
.cr-subtle {
	color: var(--cr-subtle);
}
.cr-main {
	color: var(--cr-main);
}
.cr-sec {
	color: var(--cr-sec);
}

.bg-black {
	background-color: var(--cr-black);
}
	.bg-dark {
		background-color: var(--cr-dark);
	}
.bg-white {
	background-color: var(--cr-white);
}
.bg-subdued {
	background-color: var(--cr-subdued);
}
.bg-subtle {
	background-color: var(--cr-subtle);
}
.bg-main {
	background-color: var(--cr-main);
}
.bg-sec {
	background-color: var(--cr-sec);
}

/*	U3 COLOR - END	*/

/*	U3 TYPOGRAPHY	*/

body {
	font: var(--t-b-2);
	line-height: 1;
	-webkit-font-smoothing: subpixel-antialiased;
}

h1,
.t-h-1 {
	font: var(--t-h-1);
}

h2,
.t-h-2 {
	font: var(--t-h-2);
}

h3,
.t-h-3 {
	font: var(--t-h-3);
}

h4,
.t-h-4 {
	font: var(--t-h-4);
}

.t-b-1 {
	font: var(--t-b-1);
}

.t-b-2 {
	font: var(--t-b-2);
}

.t-l-1 {
	text-transform: uppercase;
	letter-spacing: 0.1em;
	font: var(--t-l-1);
}

/*	U3 TYPOGRAPHY - END	*/

/*	U4 LAYOUTS	*/

@media screen and (min-width: 2000px) {
	/*	cap full width content at 2000px so that it doesn't infinitely extend	*/

	html {
		background-color: var(--cr-subtle);
	}

	/* header needed separately in case it is fixed */
	body,
	header {
		max-width: 2000px;
		margin-left: auto;
		margin-right: auto;
	}

	body {
		background-color: var(--cr-white);
	}
}

.c,
.c-1,
.c-2,
.c-3,
.c-4,
.c-5 {
	/* c for contain */
	position: relative;
	width: calc(100vw - var(--s-contain) * 2);
	max-width: var(--s-contain-max);
	margin-left: auto;
	margin-right: auto;
}

.c-1,
.w-1 {
	max-width: var(--w-1);
}
.c-2,
.w-2 {
	max-width: var(--w-2);
}
.c-3,
.w-3 {
	max-width: var(--w-3);
}
.c-4,
.w-4 {
	max-width: var(--w-4);
}
.c-5,
.w-5 {
	max-width: var(--w-5);
}

.f-h {
	display: flex;
	align-items: flex-start;
	justify-content: space-between;
}

.f-v {
	display: flex;
	flex-direction: column;
}

	.f-w {
		flex-wrap: wrap;
	}
	.f-nw {
		flex-wrap: nowrap;
	}
	.f-a-s {
		align-items: stretch;
	}
	.f-a-c {
		align-items: center;
	}
	.f-a-e {
		align-items: flex-end;
	}
	.f-j-s {
		justify-content: flex-start;
	}
	.f-j-c {
		justify-content: center;
	}
	.f-j-e {
		justify-content: flex-end;
	}
	.f-j-b {
		justify-content: space-between;
	}

.g {
	display: grid;
	grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
}

	.g-1 {
		grid-template-columns: repeat(1, 1fr);
	}
	.g-2 {
		grid-template-columns: repeat(2, 1fr);
	}
	.g-3 {
		grid-template-columns: repeat(3, 1fr);
	}
	.g-4 {
		grid-template-columns: repeat(4, 1fr);
	}
	.g-5 {
		grid-template-columns: repeat(5, 1fr);
	}
	.g-6 {
		grid-template-columns: repeat(6, 1fr);
	}

	.g-gap-1 {
		grid-gap: var(--s-1);
	}
	.g-gap-2 {
		grid-gap: var(--s-2);
	}
	.g-gap-3 {
		grid-gap: var(--s-3);
	}
	.g-gap-4 {
		grid-gap: var(--s-4);
	}

/*
	Example usage:
	<div class="image">
		<span class="object-fit"><img></span>
	</div>
	Often times used when parent container should be sized with a specific aspect ratio:
	.image:after {
		content: '';
		display: block;
		padding-top: 120%;
	}
*/

.object-fit,
.object-contain {
	position: absolute;
	display: block;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	overflow: hidden;
	-o-user-select: none;
	-moz-user-select: none;
	-webkit-user-select: none;
	user-select: none;
}

	.object-fit > *,
	.object-contain > * {
		position: relative;
		max-width: none;
		top: 50%;
		left: 50%;
		-webkit-transform: translate3d(-50%, -50%, 0);
		transform: translate3d(-50%, -50%, 0);
		-webkit-backface-visibility: hidden;
	}

	.object-fit > * {
		width: calc(100% + 4px * 2);
		height: calc(100% + 2px * 2) !important;
		object-fit: cover;
	}

	.object-contain > * {
		width: 100%;
		height: 100% !important;
		object-fit: contain;
	}

	.object-fit > picture,
	.object-fit > iframe {
		top: -2px;
		left: -2px;
		-webkit-transform: unset;
		transform: unset;
		object-fit: unset;
	}

	.object-fit > picture > img {
		width: 100%;
		height: 101% !important;
		object-fit: cover;
		-webkit-backface-visibility: hidden;
	}


/*
	Example usage:
	<div class="image-wrapper child-contain">
		<img src="foo"><img>
	</div>
	When dealing with a variety of media sizes that need some size guardrails, object-fit let's us;
	1) *contain* the media within some bounds (200px is the limit of the media's width/height in this example), or
	2) *cover* the bounds without warping the media
	.image-wrapper {
		width: 200px;
		height: 200px;
	}
*/

.child-cover > *,
.child-contain > * {
	width: 100%;
	height: 101%;
	-webkit-backface-visibility: hidden;
	backface-visibility: hidden;
}

	.child-cover > * {
		object-fit: cover;
	}
	
	.child-contain > * {
		object-fit: contain;
	}

.p-fill {
	/* p for position */
	position: absolute;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
}

.p-center {
	position: absolute;
	top: 50%;
	left: 50%;
	-webkit-transform: translate3d(-50%, -50%, 0);
	transform: translate3d(-50%, -50%, 0);
}

/* hidden at page load. animated in via the css-animations file */
.avoid-style-flash {
	visibility: hidden;
}

/* no highlighting (via ::selection) */
.user-select-disable {
	-webkit-user-select: none;
	-moz-user-select: none;
	-o-user-select: none;
	user-select: none;
}

/* for accessibility (e.g. a form label that isn't needed for regular users) */
.screen-reader-only {
	position: absolute !important;
	left: -10000px !important;
	top: auto !important;
	width: 1px !important;
	height: 1px !important;
	overflow: hidden !important;
}

/*
for smooth-scrolling to targets while there is a sticky header 
there currently is no native way of smooth scrolling on iOS
*/
.anchor {
	display: block;
	position: relative;
	top: calc(0px - var(--s-announcement) - var(--s-header) - var(--s-4));
	visibility: hidden;
}

.is-hidden {
	display: none !important;
}

@media (max-width: 900px) {
	.tablet-up-only {
		display: none !important;
	}
}

@media (min-width: 901px) {
	.tablet-down-only {
		display: none !important;
	}
}

@media (max-width: 600px) {
	.mobile-up-only {
		display: none !important;
	}
}

@media (min-width: 601px) {
	.mobile-down-only {
		display: none !important;
	}
}

/*	U4 LAYOUTS - END	*/
</style>