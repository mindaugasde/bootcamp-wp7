<?php
$lat = get_field('i_mp_latitude', 'option');
$lan = get_field('i_mp_longtitude', 'option');

if( (isset($lat) && $lat) && (isset($lan) && $lan) ):
?>
<div id="mapwrapper">
    <div id="map"></div>
</div>
<?php endif; ?>