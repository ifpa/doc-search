<?php
require_once('core.php');
require_once('../layout/_header.php');
require_once('../layout/_nav.php');
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Property/Casualty Documents</h2>
                <?php

                $result = array();
                $pageToken = NULL;

                do {
                    try {
                        $parameters = array(
                            'q' => "'0B6tLr9V7FuancWVaWlkteE96RXM' in parents"
                        );

                        if ($pageToken) {
                            $parameters['pageToken'] = $pageToken;
                        }

                        $files = $service->files->listFiles($parameters);

                        $result = array_merge($result, $files->getItems());

                        $pageToken = $files->getNextPageToken();
                    } catch (Exception $e) {
                        echo "<br />A fatal error occurred: " . $e->getMessage();
                        $pageToken = NULL;
                    }
                } while ($pageToken);

                ?>
                <ul class="file-list">
                    <?php foreach ($result as $file): ?>
                        <li>
                            <img src="<?=$file['iconLink'];?>" />&nbsp;
                            <a href="<?=$file['alternateLink'];?>" target="_blank"><span class="filename"><?=$file['title'];?></span></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
<?php
require_once('layout/_footer.php');
?>