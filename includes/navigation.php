<?php
include('code/getCategories.php');
echo "<nav>";
echo getCategories($objConnection);
echo "</nav>";
?>