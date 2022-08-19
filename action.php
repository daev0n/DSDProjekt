<?php
require_once('connection.php');
if(isset($_POST["editPassword"]))
{
$query = "
SELECT * FROM ad
WHERE editPassword = '".$_POST["editPassword"]."'
";
$result = $conn->prepare($query);
if(rowCount($result) > 0)
{
$_SESSION['editPassword'] = $_POST['editPassword'];
echo 'Yes';
}
else
{
echo 'No';
}
}
?>