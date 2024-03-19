<?php
require_once '../vendor/autoload.php';
use TYPO3Fluid\Fluid\View\TemplateView;

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

$view->assign('foobar', 'It works 🔥');
// $view->getTemplatePaths()->setTemplatePathAndFilename(__DIR__ . '/../Resources/Templates/Default.html');

echo $view->render('Default');
