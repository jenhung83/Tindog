<style>

@-webkit-keyframes fadeIn {
	0% {
		opacity: 0;
	}
	100% {
		opacity: 1;
	}
}

@keyframes fadeIn {
	0% {
		opacity: 0;
	}
	100% {
		opacity: 1;
	}
}

@-webkit-keyframes fadeOut {
	0% {
		opacity: 1;
	}
	100% {
		opacity: 0;
	}
}

@keyframes fadeOut {
	0% {
		opacity: 1;
	}
	100% {
		opacity: 0;
	}
}

@-webkit-keyframes fadeInUp {
	0% {
		opacity: 0;
		-webkit-transform: translate3d(0, 45px, 0);
		transform: translate3d(0, 45px, 0);
	}
	100% {
		opacity: 1;
		-webkit-transform: translate3d(0, 0, 0);
		transform: translate3d(0, 0, 0);
	}
}

@keyframes fadeInUp {
	0% {
		opacity: 0;
		-webkit-transform: translate3d(0, 45px, 0);
		transform: translate3d(0, 45px, 0);
	}
	100% {
		opacity: 1;
		-webkit-transform: translate3d(0, 0, 0);
		transform: translate3d(0, 0, 0);
	}
}

@-webkit-keyframes shake {
	10%, 90% {
		transform: translate3d(-1px, 0, 0) rotate(-1deg);
	}
	
	20%, 80% {
		transform: translate3d(2px, 0, 0) rotate(2deg);
	}

	30%, 50%, 70% {
		transform: translate3d(-4px, 0, 0) rotate(-4deg);
	}

	40%, 60% {
		transform: translate3d(4px, 0, 0) rotate(4deg);
	}
}

@keyframes shake {
	10%, 90% {
		transform: translate3d(-1px, 0, 0) rotate(-1deg);
	}
	
	20%, 80% {
		transform: translate3d(2px, 0, 0) rotate(2deg);
	}

	30%, 50%, 70% {
		transform: translate3d(-4px, 0, 0) rotate(-4deg);
	}

	40%, 60% {
		transform: translate3d(4px, 0, 0) rotate(4deg);
	}
}

html.is_loaded {}

	#main,
	.global-footer {
		opacity: 0;
	}

	html.is_loaded #main,
	html.is_loaded .global-footer {
		-webkit-animation: 0.8s 0.4s fadeIn both;
		animation: 0.8s 0.4s fadeIn both;
	}

	html.is_leaving #main,
	html.is_leaving .global-footer {
		-webkit-animation: 0.4s fadeOut both;
		animation: 0.4s fadeOut both;
	}

[data-animate] {}

	[data-animate] > * {
		opacity: 0;
	}

	[data-animate].is-animated > * {
		-webkit-animation: fadeIn 1.6s ease-out both;
		animation: fadeIn 1.6s ease-out both;
	}

</style>