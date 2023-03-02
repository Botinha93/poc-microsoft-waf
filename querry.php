<html>
<head>
<title>Resultado</title>
<style>
  body{
    background-color: #171717;
    position: absolute;
    margin: 0;
    width: 100vw;
    height: 100vh;
    color:#2e2e2e ;
  }
  #able{
    padding: 10px;
    border-radius:5px;
    position: absolute;
    background-color:#e3e3e3;
    top:50px;
    left: calc(50vw - 370px );
    width: 700px;
  }
</style>
</head>
<body>
  <div id="able">
<?php

$serverName = "unicooperbancoportal.eastus.cloudapp.azure.com"; //serverName\instanceName
$connectionInfo = array( "Database"=>"teste", "UID"=>"unicooper", "PWD"=>"P@ssw0rdUnicooper");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
  echo "<br />";
  $sql = "SELECT * FROM users WHERE (Cast(id as varchar(max)) = '" . $_POST["id"] . "' AND Cast(pass as varchar(max)) = '" . $_POST["pass"] . "')";
  echo $sql . "</br>";
  echo "<br />";
  $query = sqlsrv_query($conn, $sql);
  ?>
  <table width="700" border="1">
    <tr>
      <th width="91"> <div align="center">User </div></th>
      <th width="98"> <div align="center">Pass User </div></th>
      <th width="298"> <div align="center">Num. Cartao </div></th>
      <th width="97"> <div align="center">Data </div></th>
      <th width="59"> <div align="center">Senha</div></th>
      <th width="71"> <div align="center">Status</div></th>
    </tr>
  <?php
  while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC))
  {
  ?>
    <tr>
      <td><div align="center"><?php echo $result["id"];?></div></td>
      <td><?php echo $result["pass"];?></td>
      <td><?php echo $result["cardid"];?></td>
      <td><div align="center"><?php echo $result["carddate"];?></div></td>
      <td align="right"><?php echo $result["cardpass"];?></td>
      <td align="right"><?php echo $result["accountstatus"];?></td>
    </tr>
  <?php
  }
}else{
  echo "Connection could not be established.<br />";
  die( print_r( sqlsrv_errors(), true));
}
?>
</table>
</div>
<?php
sqlsrv_close($conn);
?>
</body>
</html>