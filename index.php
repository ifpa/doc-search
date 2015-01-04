<?php
    require_once('layout/_header.php');
?>
<?php
    require_once('layout/_nav.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Homepage</h1>
            <?php if ($_SESSION['show_error'] === true): ?>
                <div class="alert alert-danger">
                    <p>You must log in to access this page.</p>
                </div>
            <?php endif; ?>
            
        </div>
    </div>
</div>
<?php
    require_once('layout/_footer.php');
?>
<?php
$_SESSION['show_error'] = false;
?>