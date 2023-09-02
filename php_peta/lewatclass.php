<?php

require_once 'lib.php';

$polygon = new Polygon();

$polygon->setCoordinate(round(-6.571486892817839, 6), round(110.73466907842398, 6));
$polygon->setCoordinate(round(-6.571683006278656, 6), round(110.73530006372387, 6));
$polygon->setCoordinate(round(-6.572032599795928, 6), round(110.7350468112319, 6));
$polygon->setCoordinate(round(-6.57188764652722, 6), round(110.73452742870288, 6));

echo $polygon->getCount();
echo '<br>';
echo $polygon->getArea();