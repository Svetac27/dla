<?php // print_r($args); ?>


<div class="tile-block tile-list box items-center" >
    <div class="tile-header">
        <img class="tile-icon <?php echo $args['smallerImage'] ?? false ? 'smaller-image' : ''; ?>" src="<?php echo $args['image'] ?? ''; ?>" alt="info-icon" />
        <h3 class="tile-title"><?php echo $args['title'] ?? ''; ?></h3>
    </div>
    <div class="blured-background px-4 py-5">
        <ul class="blured-content">
            <?php
                if( !empty($args['list']) ){
                    foreach( $args['list'] as $item ){
                        ?>
                        <li class="tile-item flex items-start mb-3">
                            <div class="tile-bullet" style="background-color: <?php echo $args['bulletColor'] ?? '#ffffff'; ?>;"></div>
                            <span class="tile-item-text"><?php echo $item; ?></span>
                        </li>
                        <?php
                    }
                }
            ?>
        </ul>
    </div>
</div>
