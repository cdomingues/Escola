<?php require_once('../Connections/conn.php'); ?>
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

mysql_select_db($database_conn, $conn);
$query_Recordset1 = "SELECT *  FROM alunos ORDER BY rgm DESC LIMIT 1";
$Recordset1 = mysql_query($query_Recordset1, $conn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<style type="text/css">
	body {
  background: rgb(204, 204, 204);
}
page {
  background: white;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
  box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
}
page[size="A4"] {
  width: 21cm;
  height: 29.7cm;
}
page[size="A4"][layout="portrait"] {
  width: 29.7cm;
  height: 21cm;
}
@media print {
  body,
  page {
    margin: 0;
    box-shadow: 0;
	width:100%;
  }
}
.header {
  padding-top: 10px;
  text-align: center;
  border: 2px solid #ddd;
}
table {
	border-collapse: collapse;
	width: 90%;
	font-size: 80%;
	margin-left: 1cm;
	background-color: #FFFFFF;
	margin-top: 2px;
	color: #000000;
}
table th {
  background-color: #4caf50;
  color: white;
  text-align: center;
}
th,
td {
  border: 1px solid #ddd;
  text-align: left;
  font-family:Arial, Helvetica, sans-serif;
  font-size:16px;

  
}


	
	
.style1 {font-family: Arial, Helvetica, sans-serif;

font-size:20px;}

.style2
{border:#000000 solid 1px;}

h4{font-size:14px;
font-family:Arial, Helvetica, sans-serif;
}
.style3 {
	font-size: 16px;
	font-weight: bold;
}
</style>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<page size="A4">

<table width="93%" border="1">
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td width="27%" height="123"><img src="../img/logo.jpg" width="158" height="139" /></td>
    <td width="73%"><table border="1" cellspacing="0" cellpadding="0">
      
      
    </table>
      <p align="center" class="style1"><strong> PREFEITURA MUNICIPAL DE MOGI DAS    CRUZES</strong></p>
      <p align="center" class="style1"><strong>SECRETARIA MUNICIPAL DE EDUCAÇÃO</strong></td>
  </tr>
  <tr>
    <td height="93">


 <p align="center" class="style1"><img src="../img/quadrado.png" width="104" height="106" /></p></td>
    <td height="93"><p align="center" class="style1"><strong>FICHA CADASTRAL DO ALUNO</strong></p></td>
  </tr>
  <tr bordercolor="#000000">
    <td class="style2" colspan="2"><h2 align="center" class="style3">ESCOLA MUNICIPAL &quot;PROFESSOR HÉLIO DOS SANTOS NEVES&quot;</h2></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><div align="center" class="style3">ENSINO FUNDAMENTAL DE 9 ANOS</div></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><div align="center"><span class="style3">IDENTIFICAÇÃO DO ALUNO</span></div></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
  </table>
  
  <table width="92%">
    <tr>
      <td width="24%">RGM: <?php echo $row_Recordset1['RGM']; ?></td>
      <td width="28%">&nbsp;</td>
      <td width="18%">RA:<?php echo $row_Recordset1['RA']; ?></td>
      <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td>NOME:</td>
    <td colspan="2"><?php echo $row_Recordset1['Nome']; ?></td>
    <td width="15%">SEXO:</td>
    <td width="15%"><?php echo $row_Recordset1['Sexo']; ?></td>
  </tr>
  <tr>
    <td>LOCAL DE NASC.:</td>
    <td colspan="2"><?php echo $row_Recordset1['Nlocal']; ?></td>
    <td>ESTADO</td>
    <td><?php echo $row_Recordset1['NEs']; ?></td>
  </tr>
  <tr>
    <td>DATA DE NASC.:</td>
    <td><?php echo $row_Recordset1['Nasc']; ?></td>
    <td>NACIONALIDADE:</td>
    <td colspan="2">Brasileira</td>
    </tr>
  <tr>
    <td>CERT. DE NASC.:<?php echo $row_Recordset1['NCert']; ?> </td>
    <td>FOLHA: <?php echo $row_Recordset1['NFolha']; ?></td>
    <td>LIVRO: <?php echo $row_Recordset1['NLivro']; ?></td>
    <td>EMISSÃO:</td>
    <td><?php echo $row_Recordset1['NEmiss']; ?></td>
  </tr>
  <tr>
    <td>Nº DO RG:</td>
    <td><?php echo $row_Recordset1['RG']; ?></td>
    <td>ESTADO:<?php echo $row_Recordset1['RGEs']; ?></td>
    <td>EMISSÃO: <?php echo $row_Recordset1['RGEmiss']; ?></td>
    <td>COR: <?php echo $row_Recordset1['Cor']; ?></td>
  </tr>
  <tr>
    <td>NOME DA MÃE:</td>
    <td colspan="4"><?php echo $row_Recordset1['Mae']; ?></td>
    </tr>
  <tr>
    <td>NOME DO PAI:</td>
    <td colspan="4"><?php echo $row_Recordset1['Pai']; ?></td>
    </tr>
  <tr>
    <td>RESIDÊNCIA:</td>
    <td colspan="2"><?php echo $row_Recordset1['Endereco']; ?></td>
    <td>Nº <?php echo $row_Recordset1['Nu']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>BAIRRO: </td>
    <td><?php echo $row_Recordset1['Bairro']; ?></td>
    <td>CIDADE:</td>
    <td colspan="2"><?php echo $row_Recordset1['Cidade']; ?></td>
    </tr>
  <tr>
    <td>TELEFONE: <?php echo $row_Recordset1['Telefone']; ?></td>
    <td><?php echo $row_Recordset1['TelRec']; ?></td>
    <td><?php echo $row_Recordset1['Celular']; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>NECESSIDADE ESPECIAL:</td>
    <td><?php echo $row_Recordset1['NesEsp']; ?></td>
    <td>DESCRIÇÃO DA NECESSIDADE:</td>
    <td colspan="2"><?php echo $row_Recordset1['NesDESC']; ?></td>
    </tr>
  <tr>
    <td colspan="2">PARTICIPA DO BOLSA FAMÍLIA:</td>
    <td><?php echo $row_Recordset1['BolsaF']; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">ESCOLA ANTERIOR:</td>
    <td colspan="3"><?php echo $row_Recordset1['EsAnterior']; ?></td>
    </tr>
</table>

<br />

<TABLE>	
<tr>
<td><p align="center">DECLARO ACATAR AS NORMAS REGIMENTAIS  DESTE<br />
  ESTABELECIMENTO DE ENSINO.</p>
  ASS. DO PAI OU  RESPONSÁVEL:........................................................................</td>
</tr>
</TABLE>
<br />
<TABLE>	
<tr>
<td><p align="center">MOGI DAS CRUZES, <?php echo date("d/m/Y"); ?><br />
  </td>
</tr>	
</TABLE>

  <p>&nbsp;</p>
</page>
<page size="A4">
  <table width="200" border="1">
    <tr>
      <td width="11%">&nbsp;</td>
      <td width="11%">&nbsp;</td>
      <td width="30%">&nbsp;</td>
      <td width="11%">&nbsp;</td>
      <td width="25%">&nbsp;</td>
      <td width="12%">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="6"><div align="center"><?php echo $row_Recordset1['Nome']; ?></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="6"><div align="center"><strong>MOVIMENTAÇÃO DO ALUNO</strong></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td bordercolor="#000000"><div align="center"><strong>ANO</strong></div></td>
      <td bordercolor="#000000"><div align="center"><strong>TURNO</strong></div></td>
      <td bordercolor="#000000"><div align="center"><strong>SÉRIE / TURMA</strong></div></td>
      <td bordercolor="#000000"><div align="center"><strong>Nº CH</strong></div></td>
      <td bordercolor="#000000"><div align="center"><strong>ASSINATURA DO PAI OU RESPONSÁVEL</strong></div></td>
      <td bordercolor="#000000"><div align="center"><strong>VISTO DIRETOR</strong></div></td>
    </tr>
    <tr>
      <td bordercolor="#000000"><div align="center"><?php echo date("Y"); ?><php? echo data</div></td>
      <td bordercolor="#000000"><div align="center"><?php echo $row_Recordset1['Periodo']; ?></div></td>
      <td bordercolor="#000000"><div align="center"><?php echo $row_Recordset1['Classe']; ?></div></td>
      <td bordercolor="#000000"><div align="center"></div></td>
      <td bordercolor="#000000"><div align="center"></div></td>
      <td bordercolor="#000000"><div align="center"></div></td>
    </tr>
    <tr>
      <td bordercolor="#000000">&nbsp;</td>
      <td bordercolor="#000000">&nbsp;</td>
      <td bordercolor="#000000">&nbsp;</td>
      <td bordercolor="#000000">&nbsp;</td>
      <td bordercolor="#000000">&nbsp;</td>
      <td bordercolor="#000000">&nbsp;</td>
    </tr>
    <tr>
      <td bordercolor="#000000">&nbsp;</td>
      <td bordercolor="#000000">&nbsp;</td>
      <td bordercolor="#000000">&nbsp;</td>
      <td bordercolor="#000000">&nbsp;</td>
      <td bordercolor="#000000">&nbsp;</td>
      <td bordercolor="#000000">&nbsp;</td>
    </tr>
    <tr>
      <td bordercolor="#000000">&nbsp;</td>
      <td bordercolor="#000000">&nbsp;</td>
      <td bordercolor="#000000">&nbsp;</td>
      <td bordercolor="#000000">&nbsp;</td>
      <td bordercolor="#000000">&nbsp;</td>
      <td bordercolor="#000000">&nbsp;</td>
    </tr>
    <tr>
      <td bordercolor="#000000">&nbsp;</td>
      <td bordercolor="#000000">&nbsp;</td>
      <td bordercolor="#000000">&nbsp;</td>
      <td bordercolor="#000000">&nbsp;</td>
      <td bordercolor="#000000">&nbsp;</td>
      <td bordercolor="#000000">&nbsp;</td>
    </tr>
    <tr>
      <td bordercolor="#000000">&nbsp;</td>
      <td bordercolor="#000000">&nbsp;</td>
      <td bordercolor="#000000">&nbsp;</td>
      <td bordercolor="#000000">&nbsp;</td>
      <td bordercolor="#000000">&nbsp;</td>
      <td bordercolor="#000000">&nbsp;</td>
    </tr>
  </table>
  </BR>
  	<div align="center">
  	  <h3>OBS: A MATRICULA SÓ SERÁ EFETUADA OU RENOVADA, </BR>
  	    COM A ASSINATURA DO PAI OU RESPONSÁVEL	  	    
      </h3>
  	</div>
    
    <table width="200" border="1">
  <tr>
    <td colspan="2"><div align="center"><strong>Solicito transferência para outro estabelecimento de ensino</strong></div></td>
    </tr>
  <tr>
    <td width="48%" height="156"><p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>Ass. do Responsável</p></td>
    <td width="52%"><p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>Ass. do diretor</p></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">Mogi das Cruzes, ____de______________de 20___</div></td>
    </tr>
</table>
<br />
<table width="200" border="1">
  <tr>
    <td><strong>Observações:</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

<br />
<table width="200" border="1">
  <tr>
    <td colspan="2"><div align="center"><strong>Documentos entregues no ato da matrícula</strong></div></td>
    </tr>
  <tr>
    <td width="14%">&nbsp;</td>
    <td width="86%">Xerox da certidão de nascimento</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Xerox do cartão de vacina</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Xerox do R.G.</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Xerox do comprovante de Endereço</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Histórico escolar</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>01 fotos 3x4</td>
  </tr>
</table>



</page>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
