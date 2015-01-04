<?php
require_once('core.php');
require_once('../layout/_header.php');
require_once('../layout/_nav.php');
?>
    <div class="container">
        <div class="panel">
            <h2 class="panel-heading">Document Search</h2>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3">
                        <h3>New Search</h3>
                        <form action="doc_search.php" method="post">
                            <div class="form-group">
                                <label for="fullText">Search Query</label>
                                <input type="text" name="fullText" value="" id="fullText" class="form-control">
                            </div>
                            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                        </form>
                    </div>
                    <div class="col-md-9">
                <?php
                $search_query = str_ireplace("'", '', $_POST['fullText']);
                $search_query = str_ireplace('"', '', $search_query);
                $search_query = str_ireplace('/', '', $search_query);

                if ($_POST['submit'] && trim($search_query) != '' && trim($search_query) != '&nbsp;'):
                    $result = array();
                    $files = array();
                    $pageToken = NULL;

                    do {
                        try {
                            $parameters = array(
                                'corpus' => 'DOMAIN',
                                'q' => "fullText contains '" . $search_query . "'"
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
                <div class="row">
                    <div class="col-md-12">
                        <h3>Search Results</h3>
                        <?php if (count($result) > 0): ?>
                        <p>Documents containing the phrase <em><?=$search_query;?>:</em></p>
                        <ul class="file-list">
                            <?php foreach ($result as $file): ?>
                                <li>
                                    <img src="<?=$file['iconLink'];?>" />&nbsp;
                                    <a href="<?=$file['alternateLink'];?>" target="_blank"><span class="filename"><?=$file['title'];?></span></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php else: ?>
                        <p>No documents were found with your search criteria</p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            </div>
                </div>
        </div>
    </div>
<?php
require_once('layout/_footer.php');
?>