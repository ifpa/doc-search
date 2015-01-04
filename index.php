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
    <div class="row">
        <div class="col-md-3">
            <form method="post" action="auth.php">
                <h3>Please log in</h3>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <input type="submit" value="Log in" name="submit" class="btn btn-success">
            </form>
        </div>
    </div>
</div>
<?php
    require_once('layout/_footer.php');
?>
<?php
$_SESSION['show_error'] = false;
?>