<?php
require_once '../vendor/autoload.php';

use OnPHPoint\WebtCoreViewsInMvc\Hotel;


$hotels = [
    new Hotel('Luxor Oasis Resort & Casino', <<<DESC
    Experience the grandeur of ancient Egypt amidst the modern luxury of the Las Vegas Strip at Luxor Oasis Resort & Casino. Indulge in lavish accommodations, world-class dining, and thrilling entertainment, all within the iconic pyramid structure that defines Las Vegas's skyline. Unveil the secrets of the pharaohs while enjoying unparalleled hospitality and excitement.
    DESC, 4),
    new Hotel('Mirage Heights Hotel & Spa', <<<DESC
    Elevate your Las Vegas experience at Mirage Heights Hotel & Spa, where luxury meets serenity. Nestled along the vibrant Strip, our resort offers breathtaking views, exquisite dining options, and rejuvenating spa treatments. Unwind in style amidst lush surroundings and indulge in the ultimate Vegas getaway at Mirage Heights.
    DESC, 3),
    new Hotel('Stardust Skyline Resort & Casino', <<<DESC
    Experience the grandeur of ancient Egypt amidst the modern luxury of the Las Vegas Strip at Luxor Oasis Resort & Casino. Indulge in lavish accommodations, world-class dining, and thrilling entertainment, all within the iconic pyramid structure that defines Las Vegas's skyline. Unveil the secrets of the pharaohs while enjoying unparalleled hospitality and excitement.
    DESC, 5)
];


$handle = fopen('../templates/template_loop.html', "r");
$contents = fread($handle, filesize('../templates/template_loop.html'));

$output = '';


$atCharacter = 0;

$data = [
    'key' => 'value',
    'hotels' => $hotels
];


$inLoop = false;
$loopKey = '';
$loopStart = 0;
$loopIndex = 0;

while ($atCharacter < strlen($contents)) {
    $current = substr($contents, $atCharacter);
    $atCharacter++;

    if ($inLoop && str_starts_with($current, '@@end')) {
        if ($loopIndex < count($data[$loopKey]) - 1) {
            $loopIndex++;
            $atCharacter = $loopStart;
        } else {
            $loopIndex = 0;
            $inLoop = false;
            $atCharacter += 4;
        }
    } elseif (str_starts_with($current, '##')) {
        $end = strpos($current, '##', 2);
        $key = substr($current, 2, $end - 2);
        if ($inLoop) {
            $output .= $data[$loopKey][$loopIndex]->$key;
        } else {
            $output .= $data[$key];
        }
        $atCharacter += $end + 1;
    } elseif (str_starts_with($current, '@@for(')) {
        $end = strpos($current, ')', 6);
        $key = substr($current, 6, $end - 6);
        $inLoop = true;
        $loopKey = $key;
        $atCharacter += $end + 1;
        $loopStart = $atCharacter;
    } else {
        $output .= $current[0];
    }
}


echo $output;
