<?php require_once('Connections/conn.php'); ?>
<?php ini_set('default_charset','UTF-8'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_exibeAlunos = 10;
$pageNum_exibeAlunos = 0;
if (isset($_GET['pageNum_exibeAlunos'])) {
  $pageNum_exibeAlunos = $_GET['pageNum_exibeAlunos'];
}
$startRow_exibeAlunos = $pageNum_exibeAlunos * $maxRows_exibeAlunos;

mysql_select_db($database_conn, $conn);
$query_exibeAlunos = "SELECT *, date_format(nasc, '%d/%m/%Y') as nasc FROM alunos ORDER BY RGM DESC";
$query_limit_exibeAlunos = sprintf("%s LIMIT %d, %d", $query_exibeAlunos, $startRow_exibeAlunos, $maxRows_exibeAlunos);
$exibeAlunos = mysql_query($query_limit_exibeAlunos, $conn) or die(mysql_error());
$row_exibeAlunos = mysql_fetch_assoc($exibeAlunos);

if (isset($_GET['totalRows_exibeAlunos'])) {
  $totalRows_exibeAlunos = $_GET['totalRows_exibeAlunos'];
} else {
  $all_exibeAlunos = mysql_query($query_exibeAlunos);
  $totalRows_exibeAlunos = mysql_num_rows($all_exibeAlunos);
}
$totalPages_exibeAlunos = ceil($totalRows_exibeAlunos/$maxRows_exibeAlunos)-1;

$queryString_exibeAlunos = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_exibeAlunos") == false && 
        stristr($param, "totalRows_exibeAlunos") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_exibeAlunos = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_exibeAlunos = sprintf("&totalRows_exibeAlunos=%d%s", $totalRows_exibeAlunos, $queryString_exibeAlunos);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="css/style1.css" rel="stylesheet">

<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {
	color: #CC3300;
	font-weight: bold;
}
-->
</style>
</head>



<body>
<div id="site">
            <div id="topo">
                <p>Topo </p>
                <p>&nbsp;</p>
            </div>
           
<div id="esquerda">
               
               <ul id="menu" name="menu">
                <li><a href="consulta_individual.php">Consulta por RGM</a> </li>  <br />
               
                <li><a href="lista_alunos.php"> Lista de alunos</a></li>  <br />
                
                <li><a href="alunos/cadastra.php">Cadastro Aluno</a></li>
  </ul>
</div>
            
<div id="centro">

 
  <?php do { ?>
   
  <P> Lista de Alunos</P>
   
   
    
        <table border="1" align="center">
          <tr>
            <td width="136"><div align="center"><strong>RGM</strong></div></td>
            <td width="139"><div align="center"><strong>Nome</strong></div></td>
            <td width="122"><div align="center"><strong>RA</strong></div></td>
            <td width="141"><div align="center"><strong>Classe</strong></div></td>
            <td width="141"><strong>Periodo</strong></td>
            <td width="141"><div align="center">Data de Nascimento</div></td>
          </tr>
          <?php do { ?>
            <tr>
              <td><a href="exibe_aluno.php?recordID=<?php echo $row_exibeAlunos['RGM']; ?>" target="_blank"> <span class="style1"><?php echo $row_exibeAlunos['RGM']; ?></span>&nbsp; </a> </td>
              <td><?php echo $row_exibeAlunos['Nome']; ?>&nbsp; </td>
              <td><?php echo $row_exibeAlunos['RA']; ?>&nbsp; </td>
              <td><?php echo $row_exibeAlunos['Classe']; ?>&nbsp; </td>
              <td><?php echo $row_exibeAlunos['Periodo']; ?></td>
              <td><?php echo $row_exibeAlunos['Nasc']; ?></td>
            </tr>
            <?php } while ($row_exibeAlunos = mysql_fetch_assoc($exibeAlunos)); ?>
        </table>
        <br />
        <table border="0">
          <tr>
            <td><?php if ($pageNum_exibeAlunos > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_exibeAlunos=%d%s", $currentPage, 0, $queryString_exibeAlunos); ?>">Primeiro</a>
                  <?php } // Show if not first page ?>            </td>
            <td><?php if ($pageNum_exibeAlunos > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_exibeAlunos=%d%s", $currentPage, max(0, $pageNum_exibeAlunos - 1), $queryString_exibeAlunos); ?>">Anterior</a>
                  <?php } // Show if not first page ?>            </td>
            <td><?php if ($pageNum_exibeAlunos < $totalPages_exibeAlunos) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_exibeAlunos=%d%s", $currentPage, min($totalPages_exibeAlunos, $pageNum_exibeAlunos + 1), $queryString_exibeAlunos); ?>">Próximo</a>
                  <?php } // Show if not last page ?>            </td>
            <td><?php if ($pageNum_exibeAlunos < $totalPages_exibeAlunos) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_exibeAlunos=%d%s", $currentPage, $totalPages_exibeAlunos, $queryString_exibeAlunos); ?>">Último</a>
                  <?php } // Show if not last page ?>            </td>
          </tr>
        </table>
      Registros <?php echo ($startRow_exibeAlunos + 1) ?> até <?php echo min($startRow_exibeAlunos + $maxRows_exibeAlunos, $totalRows_exibeAlunos) ?> de <?php echo $totalRows_exibeAlunos ?> </td>
    </tr>
    <?php } while ($row_exibeAlunos = mysql_fetch_assoc($exibeAlunos)); ?>


</div>
</body>
</html>
<?php
mysql_free_result($exibeAlunos);
?>
