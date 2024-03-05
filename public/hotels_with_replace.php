<?php
require_once '../vendor/autoload.php';

use OnPHPoint\WebtCoreViewsInMvc\Hotel;


$hotels = [
    new Hotel('Luxor Oasis Resort & Casino', "Experience the grandeur of ancient Egypt amidst the modern luxury of the Las Vegas Strip at Luxor Oasis Resort & Casino. Indulge in lavish accommodations, world-class dining, and thrilling entertainment, all within the iconic pyramid structure that defines Las Vegas's skyline. Unveil the secrets of the pharaohs while enjoying unparalleled hospitality and excitement.", 4),
    new Hotel('Mirage Heights Hotel & Spa', "Elevate your Las Vegas experience at Mirage Heights Hotel & Spa, where luxury meets serenity. Nestled along the vibrant Strip, our resort offers breathtaking views, exquisite dining options, and rejuvenating spa treatments. Unwind in style amidst lush surroundings and indulge in the ultimate Vegas getaway at Mirage Heights.", 4),
    new Hotel('Stardust Skyline Resort & Casino', "Experience the grandeur of ancient Egypt amidst the modern luxury of the Las Vegas Strip at Luxor Oasis Resort & Casino. Indulge in lavish accommodations, world-class dining, and thrilling entertainment, all within the iconic pyramid structure that defines Las Vegas's skyline. Unveil the secrets of the pharaohs while enjoying unparalleled hospitality and excitement.", 4)
];


$handle = fopen('../templates/template.html', "r");
$contents = fread($handle, filesize('../templates/template.html'));

$output = '';
$replacements = [
    'title1' => $hotels[0]->name,
    'description1' => $hotels[0]->description,
    'stars1' => str_repeat('⭐', $hotels[0]->stars),
    'title2' => $hotels[1]->name,
    'description2' => $hotels[1]->description,
    'stars2' => str_repeat('⭐', $hotels[1]->stars),
    'title3' => $hotels[2]->name,
    'description3' => $hotels[2]->description,
    'stars3' => str_repeat('⭐', $hotels[2]->stars),
];

foreach ($replacements as $key => $value) {
    $contents = str_replace("##$key##", $value, $contents);
}

echo $contents;