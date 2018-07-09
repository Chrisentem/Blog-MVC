<?php $url=strtok($_SERVER["REQUEST_URI"],'?'); ?>

<nav aria-label="pagination">
	<div class="pagination">
		<?php
		function build_page_button($id, $text, $clickable=true) {
			$url=strtok($_SERVER["REQUEST_URI"],'?');
			if ($clickable) {
				return '<li class="page-item"><a class="page-link" href="' . $url . '?page=' . $id . '">' . $text . '</a></li>';
			} else {
				return '<li class="page-item"><a class="current-page">' . $text . '</a></li>';
			}

		}
		$nb_neighbors = 3;
		if (!empty($maxPage) && $maxPage > 1 && $curPage <= $maxPage) {
			// << fast rewind
			echo build_page_button(max(1, $curPage - 10), '<<');
			// first + (optional elipsis)
			if ($curPage - 1 > $nb_neighbors) {
				echo build_page_button(1, '1');
				if ($curPage - 1 > $nb_neighbors + 1) {
					echo "...";
				}
			}
			// n-left-neighbors
			for ($i = max(1, $curPage - $nb_neighbors); $i < $curPage; $i++) {
				echo build_page_button($i, $i);
			}
			// current (non clickable)
			echo build_page_button($curPage, $curPage, false);
			// n-right-neighbors
			for ($i = $curPage + 1; $i <= min($maxPage, $curPage + $nb_neighbors); $i++) {
				echo build_page_button($i, $i);
			}
			// (optional elipsis) + last
			if ($maxPage - $curPage > $nb_neighbors) {
				if ($maxPage - $curPage > $nb_neighbors + 1) {
					echo "...";
				}
				echo build_page_button($maxPage, $maxPage);
			}
			// >> fast forward
			echo build_page_button(min($maxPage, $curPage + 10), '>>');
		} ?>
	</div>
</nav>
