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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO alunos (Nome, Sexo, NLocal, registro, NEs, NCert, NFolha, NLivro, NEmiss, RG, RGEs, RGEmiss, Cor, Nasc, Pai, Mae, Endereco, Nu, Comp, Bairro, Cidade, Telefone, TelRec, contato, Celular, NesEsp, NesDESC, BolsaF, EsAnterior, RA, Classe, Periodo) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Nome'], "text"),
                       GetSQLValueString($_POST['Sexo'], "text"),
                       GetSQLValueString($_POST['NLocal'], "text"),
                       GetSQLValueString($_POST['registro'], "text"),
                       GetSQLValueString($_POST['NEs'], "text"),
                       GetSQLValueString($_POST['NCert'], "double"),
                       GetSQLValueString($_POST['NFolha'], "text"),
                       GetSQLValueString($_POST['NLivro'], "text"),
                       GetSQLValueString($_POST['NEmiss'], "date"),
                       GetSQLValueString($_POST['RG'], "text"),
                       GetSQLValueString($_POST['RGEs'], "text"),
                       GetSQLValueString($_POST['RGEmiss'], "text"),
                       GetSQLValueString($_POST['Cor'], "text"),
                       GetSQLValueString($_POST['Nasc'], "date"),
                       GetSQLValueString($_POST['Pai'], "text"),
                       GetSQLValueString($_POST['Mae'], "text"),
                       GetSQLValueString($_POST['Endereco'], "text"),
                       GetSQLValueString($_POST['Nu'], "double"),
                       GetSQLValueString($_POST['Comp'], "text"),
                       GetSQLValueString($_POST['Bairro'], "text"),
                       GetSQLValueString($_POST['Cidade'], "text"),
                       GetSQLValueString($_POST['Telefone'], "text"),
                       GetSQLValueString($_POST['TelRec'], "text"),
                       GetSQLValueString($_POST['contato'], "text"),
                       GetSQLValueString($_POST['Celular'], "text"),
                       GetSQLValueString($_POST['NesEsp'], "text"),
                       GetSQLValueString($_POST['NesDESC'], "text"),
                       GetSQLValueString($_POST['BolsaF'], "text"),
                       GetSQLValueString($_POST['EsAnterior'], "text"),
                       GetSQLValueString($_POST['RA'], "text"),
                       GetSQLValueString($_POST['Classe'], "text"),
                       GetSQLValueString($_POST['Periodo'], "text"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($insertSQL, $conn) or die(mysql_error());

  $insertGoTo = "../confirma.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>


<html >
    <head>
    	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <link href="../css/style1.css" rel="stylesheet">
                <link href="../css/style.css" rel="stylesheet">
        <script type="text/javascript" src="../js/jquery-3.2.1.slim.min.js"></script>
        <script src="../js/jquery.maskedinput.js" type="text/javascript"></script>
        <script src="../js/jquery.maskedinput.min.js" type="text/javascript"></script>
        
        

<script> 

jQuery(function($)
{
   $("#NEmiss").mask("99/99/9999");
   $("#Celular").mask("99999-9999");
   $("#RG").mask("99.999.999-*");
   $("#Nasc").mask("99/99/9999"); 
   $("#Telefone").mask("99999-9999");	
   $("#TelRec").mask("99999-9999");	
   $("#placa").mask("aaa - 9999"); 
});
</script> 
    
    	<title>Sem título 4</title>

</head>
 <body>
        
          
  <div id="main">
    	<div class="container">
        
        	<div id="header">
            
            	<ul id="menu">
                	<li><a href="index.php">Inicio</a></li>
                	<li><a href="alunos/cadastra.php">Cadastro</a></li>
                	<li><a href="lista_alunos.php">Lista geral</a></li>
                	<li><a href="consulta_individual.php">Consulta Individual</a></li>
                	<li><a href=""></a></li>
                </ul>
                
            	<div id="logo">
                	<h1>Creatif</h1>
                    <small>A Family of Rockstar Wordpress Themes</small>
                </div>
            
            </div>
            
            <div id="block_featured" class="block">
            <form method="post" autocomplete="off"  name="form1" action="<?php echo $editFormAction; ?>" >
  <table align="center">
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap><h3 align="center">Cadastro de Aluno</h3>
        <h3 align="center">Campos com * são obrigatórios</h3></td>
      </tr>
    <tr valign="baseline">
      <td width="157" align="right" nowrap>* Nome:</td>
      <td width="192"><input type="text" name="Nome"  value="" size="32" required x-moz-errormessage="Não esqueça de preencher este campo."></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"> *Sexo:</td>
      <td><select name="Sexo">
        <option value="M" <?php if (!(strcmp("M", ""))) {echo "SELECTED";} ?>>M</option>
        <option value="F" <?php if (!(strcmp("F", ""))) {echo "SELECTED";} ?>>F</option>
        </select>        </td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">* Local do nascimento:</td>
      <td><input type="text" name="NLocal" value="" size="32" required x-moz-errormessage="Não esqueça de preencher este campo."></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">* Local do registro</td>
      <td><input type="text" name="registro" value="" size="32" required x-moz-errormessage="Não esqueça de preencher este campo."></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">* Estado:</td>
      <td><select name="NEs">
        <option value="AC" <?php if (!(strcmp("AC", ""))) {echo "SELECTED";} ?>>AC</option>
        <option value="AL" <?php if (!(strcmp("AL", ""))) {echo "SELECTED";} ?>>AL</option>
        <option value="AP" <?php if (!(strcmp("AP", ""))) {echo "SELECTED";} ?>>AP</option>
        <option value="AM" <?php if (!(strcmp("AM", ""))) {echo "SELECTED";} ?>>AM</option>
        <option value="BA" <?php if (!(strcmp("BA", ""))) {echo "SELECTED";} ?>>BA</option>
        <option value="CE" <?php if (!(strcmp("CE", ""))) {echo "SELECTED";} ?>>CE</option>
        <option value="DF" <?php if (!(strcmp("DF", ""))) {echo "SELECTED";} ?>>DF</option>
        <option value="ES" <?php if (!(strcmp("ES", ""))) {echo "SELECTED";} ?>>ES</option>
        <option value="GO" <?php if (!(strcmp("GO", ""))) {echo "SELECTED";} ?>>GO</option>
        <option value="MA" <?php if (!(strcmp("MA", ""))) {echo "SELECTED";} ?>>MA</option>
        <option value="MS" <?php if (!(strcmp("MS", ""))) {echo "SELECTED";} ?>>MS</option>
        <option value="MT" <?php if (!(strcmp("MT", ""))) {echo "SELECTED";} ?>>MT</option>
        <option value="MG" <?php if (!(strcmp("MG", ""))) {echo "SELECTED";} ?>>MG</option>
        <option value="PA" <?php if (!(strcmp("PA", ""))) {echo "SELECTED";} ?>>PA</option>
        <option value="PB" <?php if (!(strcmp("PB", ""))) {echo "SELECTED";} ?>>PB</option>
        <option value="PE" <?php if (!(strcmp("PE", ""))) {echo "SELECTED";} ?>>PE</option>
        <option value="PR" <?php if (!(strcmp("PR", ""))) {echo "SELECTED";} ?>>PR</option>
        <option value="PI" <?php if (!(strcmp("PI", ""))) {echo "SELECTED";} ?>>PI</option>
        <option value="RJ" <?php if (!(strcmp("RJ", ""))) {echo "SELECTED";} ?>>RJ</option>
        <option value="RN" <?php if (!(strcmp("RN", ""))) {echo "SELECTED";} ?>>RN</option>
        <option value="RS" <?php if (!(strcmp("RS", ""))) {echo "SELECTED";} ?>>RS</option>
        <option value="RO" <?php if (!(strcmp("RO", ""))) {echo "SELECTED";} ?>>RO</option>
        <option value="RR" <?php if (!(strcmp("RR", ""))) {echo "SELECTED";} ?>>RR</option>
        <option value="SC" <?php if (!(strcmp("SC", ""))) {echo "SELECTED";} ?>>SC</option>
        <option value="SP" <?php if (!(strcmp("SP", ""))) {echo "SELECTED";} ?>>SP</option>
        <option value="SE" <?php if (!(strcmp("SE", ""))) {echo "SELECTED";} ?>>SE</option>
        <option value="TO" <?php if (!(strcmp("TO", ""))) {echo "SELECTED";} ?>>TO</option>
        <option value="PE" <?php if (!(strcmp("PE", ""))) {echo "SELECTED";} ?>>PE</option>
        <option value="PR" <?php if (!(strcmp("PR", ""))) {echo "SELECTED";} ?>>PR</option>
        <option value="PI" <?php if (!(strcmp("PI", ""))) {echo "SELECTED";} ?>>PI</option>
      </select>      </td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">* Número da certidão</td>
      <td><input type="text" name="NCert" value="" size="32" required x-moz-errormessage="Não esqueça de preencher este campo."></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">* Número da folha:</td>
      <td><input type="text" name="NFolha" value="" size="32" required x-moz-errormessage="Não esqueça de preencher este campo."></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">* Número do livro:</td>
      <td><input type="text" name="NLivro" value="" size="32" required x-moz-errormessage="Não esqueça de preencher este campo."></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">* Data da emissão:</td>
      <td><input type="text" name="NEmiss" id="NEmiss" value="" size="32" required x-moz-errormessage="Não esqueça de preencher este campo."></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">RG:</td>
      <td><input type="text" name="RG" id="RG"  value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Estado do RG:</td>

      <td><select name="RGEs">
        <option value="AC" <?php if (!(strcmp("AC", ""))) {echo "SELECTED";} ?>>AC</option>
        <option value="AL" <?php if (!(strcmp("AL", ""))) {echo "SELECTED";} ?>>AL</option>
        <option value="AP" <?php if (!(strcmp("AP", ""))) {echo "SELECTED";} ?>>AP</option>
        <option value="AM" <?php if (!(strcmp("AM", ""))) {echo "SELECTED";} ?>>AM</option>
        <option value="BA" <?php if (!(strcmp("BA", ""))) {echo "SELECTED";} ?>>BA</option>
        <option value="CE" <?php if (!(strcmp("CE", ""))) {echo "SELECTED";} ?>>CE</option>
        <option value="DF" <?php if (!(strcmp("DF", ""))) {echo "SELECTED";} ?>>DF</option>
        <option value="ES" <?php if (!(strcmp("ES", ""))) {echo "SELECTED";} ?>>ES</option>
        <option value="GO" <?php if (!(strcmp("GO", ""))) {echo "SELECTED";} ?>>GO</option>
        <option value="MA" <?php if (!(strcmp("MA", ""))) {echo "SELECTED";} ?>>MA</option>
        <option value="MS" <?php if (!(strcmp("MS", ""))) {echo "SELECTED";} ?>>MS</option>
        <option value="MT" <?php if (!(strcmp("MT", ""))) {echo "SELECTED";} ?>>MT</option>
        <option value="MG" <?php if (!(strcmp("MG", ""))) {echo "SELECTED";} ?>>MG</option>
        <option value="PA" <?php if (!(strcmp("PA", ""))) {echo "SELECTED";} ?>>PA</option>
        <option value="PB" <?php if (!(strcmp("PB", ""))) {echo "SELECTED";} ?>>PB</option>
        <option value="PE" <?php if (!(strcmp("PE", ""))) {echo "SELECTED";} ?>>PE</option>
        <option value="PR" <?php if (!(strcmp("PR", ""))) {echo "SELECTED";} ?>>PR</option>
        <option value="PI" <?php if (!(strcmp("PI", ""))) {echo "SELECTED";} ?>>PI</option>
        <option value="RJ" <?php if (!(strcmp("RJ", ""))) {echo "SELECTED";} ?>>RJ</option>
        <option value="RN" <?php if (!(strcmp("RN", ""))) {echo "SELECTED";} ?>>RN</option>
        <option value="RS" <?php if (!(strcmp("RS", ""))) {echo "SELECTED";} ?>>RS</option>
        <option value="RO" <?php if (!(strcmp("RO", ""))) {echo "SELECTED";} ?>>RO</option>
        <option value="RR" <?php if (!(strcmp("RR", ""))) {echo "SELECTED";} ?>>RR</option>
        <option value="SC" <?php if (!(strcmp("SC", ""))) {echo "SELECTED";} ?>>SC</option>
        <option value="SP" <?php if (!(strcmp("SP", ""))) {echo "SELECTED";} ?>>SP</option>
        <option value="SE" <?php if (!(strcmp("SE", ""))) {echo "SELECTED";} ?>>SE</option>
        <option value="TO" <?php if (!(strcmp("TO", ""))) {echo "SELECTED";} ?>>TO</option>
        <option value="PE" <?php if (!(strcmp("PE", ""))) {echo "SELECTED";} ?>>PE</option>
        <option value="PR" <?php if (!(strcmp("PR", ""))) {echo "SELECTED";} ?>>PR</option>
        <option value="PI" <?php if (!(strcmp("PI", ""))) {echo "SELECTED";} ?>>PI</option>
      </select>      </td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Data de emissão do RG:</td>
      <td><input type="text" name="RGEmiss" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">* Cor:</td>
     
       <td><select name="Cor">
        <option value="1 - Branca" <?php if (!(strcmp("1 - Branca", ""))) {echo "SELECTED";} ?>>1 - Branca</option>
        <option value="2 - Preta" <?php if (!(strcmp("2 - Preta", ""))) {echo "SELECTED";} ?>>2 - Preta</option>
        <option value="3 - Parda" <?php if (!(strcmp("3 - Parda", ""))) {echo "SELECTED";} ?>>3 - Parda</option>
        <option value="4 - Amarela" <?php if (!(strcmp("4 - Amarela", ""))) {echo "SELECTED";} ?>>4 - Amarela</option>
        <option value="5 - Ind&iacute;gena" <?php if (!(strcmp("5 - Indígena", ""))) {echo "SELECTED";} ?>>5 - Indígena</option>
        <option value="6 - N&atilde;o Declarada" <?php if (!(strcmp("6 - Não Declarada", ""))) {echo "SELECTED";} ?>>6 - Não Declarada</option>
      </select>      </td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">* Nascimento:</td>
      <td><input type="text" name="Nasc" id="Nasc" value="" size="32"  data-mask="00/00/0000" required x-moz-errormessage="Não esqueça de preencher este campo."></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Pai:</td>
      <td><input type="text" name="Pai" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">* Mãe:</td>
      <td><input type="text" name="Me" value="" size="32" required x-moz-errormessage="Não esqueça de preencher este campo."></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">* Endereço:</td>
      <td><input type="text" name="Endereco" value="" size="32" required x-moz-errormessage="Não esqueça de preencher este campo."></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">* Número:</td>
      <td><input type="text" name="Nu" value="" size="32" required x-moz-errormessage="Não esqueça de preencher este campo."></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Complemento:</td>
      <td><input type="text" name="Comp" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">* Bairro: </td>
      <td><input type="text" name="Bairro" value="" size="32" required x-moz-errormessage="Não esqueça de preencher este campo."></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">* Cidade: </td>
      <td><input type="text" name="Cidade" value="" size="32" required x-moz-errormessage="Não esqueça de preencher este campo."></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Telefone: </td>
      <td><input   type="tel" id ="Telefone" name="Telefone" value="" size="32" x-moz-errormessage="Preencha no seguinte formato xxxx-xxxx"  required></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Telefone Recado: </td>
      <td><input type="text" name="TelRec" id="TelRec" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Contato:</td>
      <td><input type="text" name="contato" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Celular:</td>

      <td><input type="text" id="Celular" name="Celular" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Necessidade especial:</td>

       <td><select name="Periodo">
        <option value="Não" <?php if (!(strcmp("Não", ""))) {echo "SELECTED";} ?>>Não</option>
        <option value="Sim" <?php if (!(strcmp("Sim", ""))) {echo "SELECTED";} ?>>Sim</option>
      </select>      </td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Descrição da necessidade:</td>
      <td><input type="text" name="NesDESC" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Bolsa família::</td>
      <td><input type="text" name="BolsaF" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Escola anterior:</td>
      <td><input type="text" name="EsAnterior" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">RA:</td>
      <td><input type="text" name="RA" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Classe:</td>
      <td><input type="text" name="Classe" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Periodo:</td>

       <td><select name="Periodo">
        <option value="Manh&atilde;" <?php if (!(strcmp("Manh&atilde;", ""))) {echo "SELECTED";} ?>>Manh&atilde;</option>
        <option value="Tarde" <?php if (!(strcmp("Tarde", ""))) {echo "SELECTED";} ?>>Tarde</option>
      </select>      </td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input name="Submit" type="submit" value="   Cadastrar   "> <input name="Submit2" type="reset" value="Limpar"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>
              <div class="block_inside">
                <div class="text_block">
                        <h2></h2>
                        
                        
                        <p>&nbsp;</p>
                        <br />
                        <a href="alunos/cadastra.php" class="button">Cadastro de alunos</a>
               	        <a href="lista_alunos.php" class="button">lista geral</a> 
                        <a href="onsulta_individual.php" class="button">consulta individual</a></div>
                    
                </div>
            </div>
            
            <div id="block_portfolio"></div>
   	  </div>
    </div>

    <div id="footer">
   	  <div class="container">
        
        	<div class="footer_column long">
                <h3>&nbsp;</h3>
          </div>

	        <div class="footer_column">
                <h3>Links Úteis</h3>
				<ul>
                    <li><a href="http://www.se-pmmc.com.br" target="_blank">se-pmmc.com.br</a></li>
           		  <li><a href="http://www.pmmc.com.br" target="_blank">Site da Prefeitura</a></li>
            		
                </ul>
            </div>
            
      </div>
    </div>         
          



        
    </body>
    
</html>


