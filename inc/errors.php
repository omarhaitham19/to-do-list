<?php
if ($session->get("errors")) {
    $errors = $session->get("errors");

    if (is_array($errors) || is_object($errors)) {
        foreach ($errors as $error) {
            ?>
            <div class="alert alert-danger"><?php echo $error ?></div>
            <?php
        }
    } 
    
    $session->remove("errors");
}
?>
