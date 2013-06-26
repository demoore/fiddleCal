<?php
/**
 * User: dylan
 * Date: 2013-04-30
 * Time: 4:39 PM
 */

if (!isset($pageTitle)){
    $pageTitle = "fiddleCal";
}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel = "icon" type="image/ico" href="project/img/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="project/css/calendar.css"/>


    <!-- Scripts -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="project/js/bootstrap.min.js"></script>
    <script src="project/js/jquery.validate.js"></script>
    <script src="project/js/validator.js"></script>
    <script src="project/js/evaluate.js"></script>



    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="project/css/bootstrap.min.css" media="screen"/>
    <link rel="stylesheet" href="project/css/style.css" media="screen"/>


    <title><?php echo $pageTitle; ?></title>
