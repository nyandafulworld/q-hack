<?php
function get_relative_path() {
    return ltrim($_SERVER['REQUEST_URI'], '/');
}

$relative_path = get_relative_path(); // ex: solution/youtube/area
$area_parent = get_page_by_path($relative_path);
if ($area_parent) {
    $area_top_id = $area_parent->ID;
$area_top_id = $area_parent->ID;


$area_pages = get_pages([
    'child_of'     => $area_top_id,
    'parent'       => $area_top_id,
    'sort_column'  => 'menu_order',
]);
echo '<div class="fixbox-narrow"><div class="area-table">';
echo '<table>';
echo '<tbody>';

foreach ($area_pages as $area) {
    $area_title = esc_html($area->post_title);
    $area_link  = esc_url(get_permalink($area->ID));

    $pref_pages = get_pages([
        'child_of'     => $area->ID,
        'parent'       => $area->ID,
        'sort_column'  => 'menu_order',
    ]);

    echo '<tr>';
    echo '<th><a href="' . $area_link . '">' . $area_title . '</a></th>';
    echo '<td>';

    if (!empty($pref_pages)) {
        foreach ($pref_pages as $pref) {
            $pref_title = esc_html($pref->post_title);
            $pref_link  = esc_url(get_permalink($pref->ID));
            echo '<a href="' . $pref_link . '">' . $pref_title . '</a> ';
        }
    }

    echo '</td>';
    echo '</tr>';
}

echo '</tbody>';
echo '</table>';
echo '</div></div>';
}
?>
