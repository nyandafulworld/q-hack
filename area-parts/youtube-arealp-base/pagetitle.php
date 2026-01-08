<?php
$request_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path_parts = array_values(array_filter(explode('/', $request_path)));
$depth = count($path_parts);
?>
<?php if ($depth === 5): ?>
    <?php echo get_main_title(); ?>
<?php elseif ($depth === 6): ?>
    <?php
    $parent_id = wp_get_post_parent_id(get_the_ID());
    if ($parent_id) {
        echo trim(get_the_title($parent_id)) . '';
    }
    echo get_main_title(); ?><?php else: ?><?php endif; ?>
