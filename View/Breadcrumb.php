<?php

/**
* Generate breacrumb links to display on page with defined values on each page
*
* @param array $breadcrumbItem
*
**/
function buildBreacrumbLink($breadcrumbItem) {
    if(isset($breadcrumbItem['url'])) {
        return '<li class="breadcrumb-item"><a href="' . $breadcrumbItem['url'] . '">' . $breadcrumbItem['title'] . '</a></li>';
    }
    else {
        return '<li class="breadcrumb-item">' . $breadcrumbItem['title'] . '</li>';        
    }
}
?>

<!-- Generate HTML -->
<div class="breadcrumb">
<nav aria-label="breadcrumb">
    <ul>
        <?php foreach ($breadcrumb as $breadcrumbItem) {
            echo buildBreacrumbLink($breadcrumbItem);
        }
        ?>
    </ul>
</nav>
</div>

