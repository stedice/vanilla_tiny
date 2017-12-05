<?php if (!$this) { exit(header('HTTP/1.0 403 Forbidden')); } ?>

<div class="container">
    <?php         
    	require APP . 'views/home/menu-left.php';
    	require APP . 'views/home/list.php';
    	require APP . 'views/home/details.php';
    ?>
</div>
