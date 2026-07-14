/**
 * RYM Authority Hub — vanilla-JS port of the Lovable page's React behavior.
 * Covers: desktop nav dropdowns, mobile drawer, interest-rate tabs,
 * reviews carousel, loan-estimate lightbox, and the training lead modal
 * (which every training CTA opens, exactly like the original page).
 */
(function () {
	'use strict';

	/* ------------------------------------------------ desktop dropdowns -- */
	var dropdowns = Array.prototype.slice.call(document.querySelectorAll('.rym-nav-dropdown'));

	function closeDropdowns(except) {
		dropdowns.forEach(function (dd) {
			if (dd === except) { return; }
			dd.querySelector('[data-rym-dropdown]').setAttribute('aria-expanded', 'false');
			dd.querySelector('.rym-nav-menu').hidden = true;
		});
	}

	dropdowns.forEach(function (dd) {
		var btn = dd.querySelector('[data-rym-dropdown]');
		var menu = dd.querySelector('.rym-nav-menu');
		btn.addEventListener('click', function (e) {
			e.stopPropagation();
			var open = btn.getAttribute('aria-expanded') === 'true';
			closeDropdowns(dd);
			btn.setAttribute('aria-expanded', String(!open));
			menu.hidden = open;
		});
		menu.addEventListener('click', function () { closeDropdowns(); });
	});

	document.addEventListener('click', function () { closeDropdowns(); });

	/* --------------------------------------------------- mobile drawer -- */
	var drawer = document.querySelector('[data-rym-drawer]');

	function setDrawer(open) {
		if (!drawer) { return; }
		drawer.hidden = !open;
		document.body.classList.toggle('rym-no-scroll', open || openModal !== null);
	}

	var drawerOpenBtn = document.querySelector('[data-rym-drawer-open]');
	if (drawerOpenBtn) {
		drawerOpenBtn.addEventListener('click', function () { setDrawer(true); });
	}
	if (drawer) {
		drawer.addEventListener('click', function (e) {
			if (e.target.closest('[data-rym-drawer-close]') || e.target.closest('[data-rym-drawer-link]')) {
				setDrawer(false);
			}
		});
	}

	/* ------------------------------------------------------- rate tabs -- */
	// Same table the React component ships (interest % of each payment).
	var RATES = {
		3: { repay: '$607k', totalInterest: '$207,110', bars: [66, 61, 54, 45, 34, 20, 3] },
		5: { repay: '$773k', totalInterest: '$372,715', bars: [82, 76, 67, 55, 40, 22, 3] },
		7: { repay: '$958k', totalInterest: '$558,036', bars: [93, 88, 79, 66, 48, 25, 3] }
	};
	var TAB_ACTIVE = ['bg-[color:var(--navy-deep)]', 'text-white', 'shadow-sm'];
	var TAB_IDLE = ['text-[color:var(--graphite)]/70', 'hover:text-[color:var(--navy-deep)]'];

	var rateTabs = Array.prototype.slice.call(document.querySelectorAll('[data-rym-rate]'));
	var rateInterest = document.querySelector('[data-rym-rate-interest]');
	var rateRepay = document.querySelector('[data-rym-rate-repay]');
	var rateLabel = document.querySelector('[data-rym-rate-label]');
	var barsWrap = document.querySelector('[data-rym-rate-bars]');

	function selectRate(rate) {
		var data = RATES[rate];
		if (!data) { return; }
		rateTabs.forEach(function (tab) {
			var active = tab.getAttribute('data-rym-rate') === String(rate);
			tab.setAttribute('aria-selected', String(active));
			TAB_ACTIVE.forEach(function (c) { tab.classList.toggle(c, active); });
			TAB_IDLE.forEach(function (c) { tab.classList.toggle(c, !active); });
		});
		if (rateInterest) { rateInterest.textContent = data.totalInterest; }
		if (rateRepay) { rateRepay.textContent = data.repay; }
		if (rateLabel) { rateLabel.textContent = String(rate); }
		if (barsWrap) {
			var rows = barsWrap.children;
			data.bars.forEach(function (interestPct, i) {
				var row = rows[i];
				if (!row) { return; }
				var segments = row.querySelectorAll('[style]');
				var principalPct = 100 - interestPct;
				if (segments[0]) {
					segments[0].style.width = interestPct + '%';
					segments[0].textContent = interestPct >= 18 ? interestPct + '%' : '';
				}
				if (segments[1]) {
					segments[1].style.width = principalPct + '%';
					segments[1].textContent = principalPct >= 18 ? principalPct + '%' : '';
				}
			});
		}
	}

	rateTabs.forEach(function (tab) {
		tab.addEventListener('click', function () {
			selectRate(tab.getAttribute('data-rym-rate'));
		});
	});

	/* ------------------------------------------------ reviews carousel -- */
	var track = document.querySelector('[data-rym-reviews-track]');

	function scrollReviews(dir) {
		if (!track) { return; }
		var card = track.querySelector('[data-story-card]');
		var step = card ? card.offsetWidth + 24 : track.clientWidth * 0.9;
		track.scrollBy({ left: dir * step, behavior: 'smooth' });
	}

	Array.prototype.forEach.call(document.querySelectorAll('[data-rym-reviews-prev]'), function (btn) {
		btn.addEventListener('click', function () { scrollReviews(-1); });
	});
	Array.prototype.forEach.call(document.querySelectorAll('[data-rym-reviews-next]'), function (btn) {
		btn.addEventListener('click', function () { scrollReviews(1); });
	});

	/* ----------------------------------------------------------- modals -- */
	var openModal = null;

	function showModal(name) {
		var modal = document.querySelector('[data-rym-modal="' + name + '"]');
		if (!modal) { return; }
		hideModal();
		modal.hidden = false;
		openModal = modal;
		document.body.classList.add('rym-no-scroll');
	}

	function hideModal() {
		if (!openModal) { return; }
		openModal.hidden = true;
		openModal = null;
		if (drawer && drawer.hidden !== false) {
			document.body.classList.remove('rym-no-scroll');
		}
	}

	Array.prototype.forEach.call(document.querySelectorAll('[data-rym-modal]'), function (modal) {
		modal.addEventListener('click', function (e) {
			if (e.target.closest('[data-rym-modal-close]')) { hideModal(); }
		});
	});

	document.addEventListener('keydown', function (e) {
		if (e.key !== 'Escape') { return; }
		hideModal();
		setDrawer(false);
		closeDropdowns();
	});

	// The original page intercepts every training CTA (capture phase) and
	// opens the lead modal instead of scrolling. Mirror that here.
	document.addEventListener('click', function (e) {
		if (!(e.target instanceof Element)) { return; }
		if (e.target.closest("a[href='#training'], a[href='#training-form'], [data-training-cta]")) {
			e.preventDefault();
			e.stopPropagation();
			setDrawer(false);
			showModal('training');
			return;
		}
		if (e.target.closest('[data-loan-estimate-lightbox]')) {
			e.preventDefault();
			e.stopPropagation();
			showModal('loan-estimate');
		}
	}, true);

	/* ---------------------------------------------- training lead form -- */
	// NOTE: like the Lovable prototype, this form does not post anywhere yet.
	// Wire it to a CRM/webhook by replacing the body of submitLead().
	var form = document.querySelector('[data-rym-training-form]');
	var successPanel = document.querySelector('[data-rym-training-success]');

	function submitLead(fields, done) {
		void fields;
		window.setTimeout(done, 500); // simulate the prototype's fake request
	}

	if (form) {
		form.addEventListener('submit', function (e) {
			e.preventDefault();
			if (!form.reportValidity()) { return; }
			var submitBtn = form.querySelector('button[type="submit"]');
			var label = form.querySelector('[data-rym-submit-label]');
			submitBtn.disabled = true;
			if (label) { label.textContent = 'Submitting...'; }
			submitLead(new FormData(form), function () {
				form.hidden = true;
				if (successPanel) { successPanel.hidden = false; }
				window.setTimeout(function () {
					hideModal();
					form.reset();
					form.hidden = false;
					if (successPanel) { successPanel.hidden = true; }
					submitBtn.disabled = false;
					if (label) { label.textContent = 'Watch the Free Training'; }
				}, 2200);
			});
		});
	}
})();
