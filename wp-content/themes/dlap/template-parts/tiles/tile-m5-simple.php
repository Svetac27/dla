<?php // print_r($args); ?>


<div class="tile-block tile-simple box py-5 items-center" >
    <h3 class="tile-title"><?php echo $args['title'] ?? ''; ?></h3>
    <span class="tile-text">
        <?php
            if (!empty($args['text'])) {
                echo $args['text'] ?? '';
            }
        ?>
    </span>
</div>
