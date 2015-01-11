<?php
require_once('core.php');
require_once('../layout/_header.php');
require_once('../layout/_nav.php');
?>
    <div class="container">
        <div class="panel">
            <h2 class="panel-heading">PIPAC Documents</h2>
            <div class="panel-body">
                <?php

                $result = array();
                $pageToken = NULL;

                do {
                    try {
                        $parameters = array(
                            'q' => "'0B6tLr9V7FuanSW8wTXlSVjdJajg' in parents"
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

                $filesort = array();
                foreach ($result as $key=>$row) {
                    $filesort[$key] = $row['createdDate'];
                }

                array_multisort($filesort, SORT_DESC, $result);

                ?>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="file-list">
                            <?php foreach ($result as $file): ?>
                                <?php if ($file['fileExtension'] == 'pdf' || $file['fileExtension'] == 'htm' || $file['fileExtension'] == 'xls' || $file['fileExtension'] == 'csv' || $file['fileExtension'] == 'xlsx'): ?>
                                    <ul>
                                <?php endif; ?>
                                <li>
                                    <img src="<?=$file['iconLink'];?>" />&nbsp;
                                    <a href="<?=$file['alternateLink'];?>" target="_blank"><span class="filename"><?=$file['title'];?></span></a>
                                </li>
                                <?php if ($file['fileExtension'] == 'pdf' || $file['fileExtension'] == 'htm' || $file['fileExtension'] == 'xls' || $file['fileExtension'] == 'csv' || $file['fileExtension'] == 'xlsx'): ?>
                                    </ul>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <!--<div class="row">
                    <div class="col-md-12">
                        <pre>
                            <?php /*var_dump($result); */?>
                        </pre>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
<?php
require_once('layout/_footer.php');
?>