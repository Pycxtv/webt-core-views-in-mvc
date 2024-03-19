<?php
require_once '../vendor/autoload.php';
use TYPO3Fluid\Fluid\View\TemplateView;
use OnPHPoint\WebtCoreViewsInMvc\Hotel;

$view = new TemplateView();

$paths = $view->getTemplatePaths();
$paths->setTemplateRootPaths([
    __DIR__ . '/../Resources/Templates/'
]);
$paths->setLayoutRootPaths([
    __DIR__ . '/../Resources/Layouts/'
]);
$paths->setPartialRootPaths([
    __DIR__ . '/../Resources/Partials/'
]);

// $view->assign('foobar', 'It works 🔥');
// $view->getTemplatePaths()->setTemplatePathAndFilename(__DIR__ . '/../Resources/Templates/Default.html');

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

$view->assign('hotels', $hotels);

echo $view->render('Default');
