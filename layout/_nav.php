<?php
    $page = $_SERVER['PHP_SELF'];
    $home_class = (strpos($page, 'index.php') !== false) ? "active" : "";
    $doc_class = (strpos($page, 'doc_') !== false) ? "active open" : "";
    $health_class = (strpos($page, 'doc_health.php') !== false) ? "active" : "";
    $life_class = (strpos($page, 'doc_life.php') !== false) ? "active" : "";
    $pc_class = (strpos($page, 'doc_pc.php') !== false) ? "active" : "";
    $wc_class = (strpos($page, 'doc_wc.php') !== false) ? "active" : "";
    $pipac_class = (strpos($page, 'doc_pipac.php') !== false) ? "active" : "";
    $min_class = (strpos($page, 'doc_min.php') !== false) ? "active" : "";
    $all_class = (strpos($page, 'doc_all.php') !== false) ? "active" : "";
    $search_class = (strpos($page, 'doc_search.php') !== false) ? "active" : "";
    $calendar_class = (strpos($page, 'calendar.php') !== false) ? "active" : "";
    $pls_class = (strpos($page, 'pls.php') !== false) ? "active" : "";
?>
<nav>
    <!-- Static navbar -->
    <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">IFP Members' Area</a>
            </div>

            <div class="navbar-collapse collapse horiz-nav navbar-ex1-collapse">
                <ul id="menu-header" class="nav navbar-nav navbar-left">
                    <li class="<?=$home_class?>">
                        <a title="Home" href="/index.php">Home</a>
                    </li>
                    <li class="<?=$doc_class?>">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Documents <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li class="<?=$health_class?>">
                                <a href="/documents/doc_health.php">Health</a>
                            </li>
                            <li class="<?=$life_class?>">
                                <a href="/documents/doc_life.php">Life</a>
                            </li>
                            <li class="<?=$pc_class?>">
                                <a href="/documents/doc_pc.php">Property/Casualty</a>
                            </li>
                            <li class="<?=$wc_class?>">
                                <a href="/documents/doc_wc.php">Worker&rsquo;s Compensation</a>
                            </li>
                            <li class="<?=$pipac_class?>">
                                <a href="/documents/doc_pipac.php">PIPAC</a>
                            </li>
                            <li class="<?=$min_class?>">
                                <a href="/documents/doc_min.php">Minutes</a>
                            </li>
                            <li class="<?=$all_class?>">
                                <a href="/documents/doc_all.php">All Steering Committees</a>
                            </li>
                            <li class="<?=$search_class?>">
                                <a href="/documents/doc_search.php">Search</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?=$pls_class?>">
                        <a href="/pls.php">Tracked Legislation</a>
                    </li>
                    <li class="<?=$calendar_class?>">
                        <a href="/calendar.php">Calendar of Events</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>