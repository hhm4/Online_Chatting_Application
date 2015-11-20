<?php

$username = "sheik";


$mysqli = mysqli_connect();

$call = mysqli_prepare($mysqli, 'CALL Test_OutProcedure(?, @result)');
mysqli_stmt_bind_param($call, 's', $username);
mysqli_stmt_execute($call);
mysqli_stmt_bind_result($call, $result);
mysqli_stmt_fetch($call);
echo $result;
           
/>