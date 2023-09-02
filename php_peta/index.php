<?php

require_once 'lib.php';

$json = json_decode('{"type": "GeometryCollection", "geometries": [{"type": "Polygon", "coordinates": [[[110.686557, -6.571649], [110.686407, -6.571948], [110.686579, -6.572065], [110.686616, -6.571948], [110.687115, -6.572188], [110.687223, -6.571932], [110.687405, -6.571884], [110.687502, -6.571612], [110.687072, -6.571436], [110.68718, -6.571212], [110.686557, -6.570977], [110.686514, -6.571143], [110.686348, -6.571036], [110.686214, -6.571457], [110.686557, -6.571649]]]}]}
');

$text = 'POLYGON((110.675683 -6.582548,110.676456 -6.582921,110.675823 -6.583657,110.675297 -6.583337,110.675683 -6.582548))';

$polygon = new Polygon();
$array = [];
if (isset($json->geometries) && is_array($json->geometries)) {
    $arr = $json->geometries;
    foreach ($arr as $key => $value) {
        array_push($array, $value->coordinates);
    }
} else {
    $array = $json->coordinates;
}

foreach ($array as $key => $value) {
    if (is_array($value)) {
        foreach ($value as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    $polygon->setCoordinate($v2[1], $v2[0]);
                }
            } else {
                $polygon->setCoordinate($v[1], $v[0]);
            }
        }
    } else {
        $polygon->setCoordinate($value[1], $value[0]);
    }
}

$luas = $polygon->getArea();
echo $luas.' ';

?>