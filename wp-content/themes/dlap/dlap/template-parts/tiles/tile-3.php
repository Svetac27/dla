<?php
    $progress = $args['progress'] ?? [];
    if (gettype($progress) === 'string') {
        $value = $progress;
        $color = isset($args['progress_color']) ? $args['progress_color'] : 'green';
    } else {
        $value = isset($progress[0]) ? $progress[0] : 0; 
        $color = isset($progress[1]) ? $progress[1] : 'green'; 
    }

    $number = isset($args['number']) ? $args['number'] : (isset($args['figure']) ? $args['figure'] : '');

    $text = $args['text'] ?? '';
    if (isset($args['small_text'])) {
        $text = $text . ' <small class="currency">'.$args['small_text'].'</small>';
    }
?>

<div class="progress-bar-with-figure box inline-flex items-center py-2">
    <div class="w-full text-left leading-loose">
        <div class="tile-text"><?php echo $text; ?></div>
        <progress class="<?php echo $color; ?>" value="<?php echo $value; ?>" max="100"></progress>
    </div>
    <div class="min-w-12 w-auto text-right contents">
        <div class="numbers-big pl-4"><?php echo $number; ?><span class="symbols-small"><?php echo $args['symbol'] ?? ''; ?></span></div>
    </div>
</div>