<?php
/**
 * Created by JetBrains PhpStorm.
 * User: dylan
 * Date: 2013-04-30
 * Time: 4:34 PM
 * This page manages our navbar
 */


?>
</head>
<BODY>

<div id="wrap">

    <div class="navbar-wrapper">

            <div class="navbar navbar-inverse navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container-fluid">

                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".new-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a href="index.php" class="brand">fiddleCal</a>

                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <?php

                            if (!isset($_SESSION['loginForm'])) {
                                include('navNoSession.html');

                            }

                            if (isset($_SESSION['loginForm']) && $_SESSION['loginForm'] != '') {
                                echo "<li class=\"active\">";
                                echo "<a href=\"/project/project/php/logout.php?s=logout\">Logout</a>";
                                echo "</li>";
                            }

                            ?>


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

