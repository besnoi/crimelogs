<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
session_destroy();
header('Location: /crimelogs/login.php');

?>

</body>
</html>