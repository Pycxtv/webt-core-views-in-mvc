<?php
// namespace OnPHPoint\WebtCoreViewsInMvc;

require_once '../vendor/autoload.php';
use TYPO3Fluid\Fluid\View\TemplatePaths;
// use \Type3Fluid\Fluid\View\TemplatePaths;


$paths = new TemplatePaths();
$paths->setTemplateRootPaths(['../Resources/Templates/']);
$paths->setLayoutRootPaths(['../Resources/Layouts/']);
$paths->setPartialRootPaths(['../Resources/Partials/']);
// pass the constructed TemplatePaths instance to the View
$view = new TemplateView($paths);

// assign variables to the view
// $view->assign('hotels', $hotels);

// render the view
echo $view->render('Default.html');

