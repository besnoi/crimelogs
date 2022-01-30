<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
session_destroy();
header('Location: /form/login.php');

?>

</body>
</html>