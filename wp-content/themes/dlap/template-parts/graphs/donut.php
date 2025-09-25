<?php
// generating unique id for each donut to avoid conflicts with the data
if (isset($args['donut-id'])) {
	// this should be required
	$id = $args['donut-id'];
} else {
	// fallback in case id is not passed
	$time = time();
	$randomNumber = rand(0,10000);
	$id = 'donut-'. md5($time . $randomNumber);
}

$progress = $args['progress'] ?? 0;

if (is_array($progress)) {
	$value = isset($progress[0]) ? $progress[0] : 0;
	$color = isset($progress[1]) ? $progress[1] : '#D9DC42';
} else {
	$value = $progress ?? 0;
	$color = $args['progress_color'] ?? '#D9DC42';
}

$class = 'class="'.colorClasses($color).' '.$id.'"';

?>
<div <?php echo $class; ?>></div>

<script>

new CircleProgress(".<?php echo $id; ?>", {
	max: 100,
	value: <?php echo $value; ?>,
	// textFormat: donutPercentage, // need to fix display
	textFormat: 'percent',
});
</script>