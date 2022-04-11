<?php
unlink($_GET["name"]);

// redirecting back
header("Location:".$_SERVER["HTTP_REFERER"]);

?>