<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HeteroMeth-Home</title>
<link rel="stylesheet" type="text/css" href="statics/indexstyle.css">
<link rel="stylesheet" href="statics/style.css">
<link rel="stylesheet" href="statics/prettify.css">
<style>
</style>
<script  src="statics/jquery-1.12.4.min.js"></script>
<script language="javascript">
$(function(){
var heightLeft= $("#content_left").height();
var heightRight= $("#content_right").height();
if (heightLeft > heightRight)
{
$("#content_right").height(heightLeft);
}
})
</script>
<script language="javascript">
function Outputofgene()
{
  var namegene = document.getElementById('gene');
  var namespe = document.getElementById('species');
  if (namegene.value == "" && namespe.value == "" ){
    alert("Please input the gene id and select a species!");
    return false;
  }
  else if (namegene.value == "" ){
    alert("Please input the gene id !");
    return false;
  }
  else if(namespe.value == ""){
    alert("Please select a species!");
    return false;
  }
}

function assignValueath()
{
var id = "AT1G01090\n";
id+= "AT1G01110\n";
id+= "AT1G01220\n";
id+= "AT1G01210\n";
id+= "AT1G01430\n";
document.getElementById("gene").value=id;
}
function assignValueosa()
{
var id = "LOC_Os01g18560\n";
id+= "LOC_Os01g19500\n";
id+= "LOC_Os01g49370\n";
id+= "LOC_Os01g57400\n";
id+= "LOC_Os01g58010\n";
document.getElementById("gene").value=id;
}
function assignValuehuman()
{
var id = "ENSG00000007350\n";
id+= "ENSG00000004766\n";
id+= "ENSG00000005007\n";
id+= "ENSG00000005073\n";
id+= "ENSG00000005156\n";
document.getElementById("gene").value=id;
}
function assignValuemouse()
{
var id = "ENSMUSG00000000182\n";
id+= "ENSMUSG00000000194\n";
id+= "ENSMUSG00000000275\n";
id+= "ENSMUSG00000000282\n";
document.getElementById("gene").value=id;
}
</script>
</head>
<body>
<header>
<div id="headercontainer"></div>
<p id="description">A Database of Cell-to-cell <strong><font color="#fdfd05"size="4">Hetero</font></strong>geneity in DNA <strong><font color="#fdfd05"size="4">Meth</font></strong>ylation</p>
<p id="description_2"></p>
</header>
  <div id="container">
    <div id="head">
      <h1></h1>
      <!--  Figure move, i will consider if we need this or not -->
      <div id="mrp">
        <div id="Marquee_x">
        </div>
      </div>
      <ul id="menu">
        <li>
          <a href="index.html">Home</a>
        </li>
        <li>
          <a  class="current" href="SymbolSearch.php">Gene Search</a>
        </li>
        <li>
          <a href="Browse.html">Genome Browser</a>
        </li>
        <li>
          <a href="Download.php">Browse & Download</a>
        </li>
        <li>
          <a href="Contact.php">Contact us</a>
        </li>
    </div>
    <div id="area"></div>
    <div id="main">
      <div id="content_left">
        <form id="form1" name="form1" method="post" action=''>
          <div style="display:none">
            <input type="hidden" name="csrfmiddlewaretoken" value="BvAHIAzRXzvJq9T1wQYB11wEaPFnLDLo">
          </div>
          <div class="title"><img src="images/search-icon.png" width="50px" style="margin-bottom:-10px;"> Search</div>
          <fieldset  class="query">
          <legend>Querying </legend>
          <table align="left" id="query">
            <tbody>
              <tr>
                <td height="60px" width="100px"><b>Species:</td>
                  <td style="width:100px"><select name="species" id="species" style="font-style:italic">
                    <option value="" >Select a species</option>
                    <option value="mouse">Mus musculus</option>
                    <option value="human">Homo sapiens</option>
                    <option value="rice">Oryza sativa</option>
                    <option value="Arabidopsis">Arabidopsis thaliana</option>
                  </select></td>
              </tr>
              <tr>
                <td height="60px"><b>Regions:</td>
                <td><select name="region" id="region">
                    <option value="(Upstream500)">Upstream 500</option>
                    <option value="(Upstream1000)">Upstream 1000</option>
                    <option value="(Gene body)">Gene body</option>
                    <option value="(Downstream500)">Downstream 500</option>
                    <option value="(Downstream1000)">Downstream 1000</option>
                  </select>
                </td>
              </tr>
			  <tr>
                <td><b>Download file format:</td>
                <td><select name="output" id="output">
                    <option value="csv">CSV</option>
                    <option value="tsv">TSV</option>
					<option value="txt">TXT</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td><b>Gene ID:</td>
                <td><textarea name="gene" type="textarea" class="box" id="gene"  size="20" align="absmiddle"></textarea>
                    <p style="font-size:16px">Example: <a href = "javascript:void(0)" onclick="assignValueath()">[Arabidopsis]</a>
                    <a href = "javascript:void(0)" onclick="assignValueosa()">[Rice]</a>
                    <a href = "javascript:void(0)" onclick="assignValuehuman()">[Human]</a>
                    <a href = "javascript:void(0)" onclick="assignValuemouse()">[Mouse]</a></p></td>
              </tr>
              <tr>
                <td>
                  <button type="submit" class="btn btn-green btn-fill-vert"  onclick="return Outputofgene();">Submit</button>
                </td>
                <td>
                  <button type="reset" class="btn btn-red btn-fill-vert" >Reset</button>
                </td>
              </tr>
            </tbody>
          </table>
        </form>
      </fieldset>
        <table height="5px" width="700" border="0" bgcolor="#409f89" style="display: none">
            <tbody>
              <tr>
                <td><span class="style2">Query result </span></td>
              </tr>
          </tbody>
        </table>
        <table width="700" border="1" cellpadding="0" cellspacing="0" align="center" bordercolor="#CCCCCC" style="display: none;font-size:10px;text-align:center">
          <tbody>
            <tr><td>Gene</td><td>DNA methylation level</td><td>Shannon entropy</td><td>No. of segments</td><td>Sample</td><td>Plot</td></tr>
            <tr id="insert" style="display: none"><td></td><td></td><td></td></tr>
          </tbody>
        </table>
      </div>
      <div id="content_right">
        <h4>Accessing HeteroMeth</h4>
        <div class="item_box">
          <h5><a class="current" href="" title="Gene Search">Gene Search</a></h5>
          <p style="font-size:13px">After submitting a list of gene IDs, the DNA methylation level and Shannon entropy for each gene can be browsed and downloaded.</p>
        </div>
        <div class="item_box">
          <h5><a href="" title="Region Browse">Genome Browser</a></h5>
          <p style="font-size:13px">The landscape of heterogeneity in DNA methylation is shown in the UCSC Genome Browser.</p>
        </div>
        <div class="item_box">
          <h5><a href="" title="Download and browse">Browse and Download</a></h5>
          <p style="font-size:13px">Browse and download the processed HeteroMeth data.</p>
        </div>
      </div>
      <div class="spacer"></div>
    </div>
    <div id="footer">
        <div style="float:left; padding-left:10px;"><a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://licensebuttons.net/l/by-nc-sa/4.0/88x31.png"></a> Copyright 2018 &copy;<a href="http://qianlab.genetics.ac.cn/"> QianLab</a> </div>
        <div id="madeby"></div>
      </div>
  </div>
</body>
</html>



<?php
//define a check function
error_reporting(0);
function print_check($x){
  if($x===null){
    return 'NA';
  }
  else{
    return round($x,3);
  }
}
//
function clean_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
// redifine some variable
$genearray = $species="";
$dml = "DNA methylation level";
$dme = "DNA methylation entropy";
$dmn = "Number of DNA methylation regions";
if(isset($_POST)){
  if(!empty($_POST)){
  //connect the database
  require "confzyl.php";
  //connect the  mysql database
  //connect the database and import the data
      $mysqli = new mysqli($DB_SERVER, $DB_USER, $DB_PASS, $DB_NAME);
      //test the connection
      if ($mysqli->connect_error)
      {
        die("Connection Fail: " . $conn->connect_error."<br>");
      }
  $species = $_POST['species'];
  $region = $_POST['region'];
  $region_p = str_replace(["(", ")"],"\"",$region);
  $output_format = $_POST['output'];
  //consider some download file select
  $dml_r = $dml.$region;
  $dme_r = $dme.$region;
  $dmn_r = $dmn.$region;
  $gene = (explode("\r\n",$_POST['gene']));
  //$gene = (explode(",",$_POST['gene']));
  //echo $gene[1].$gene[2];
  //echo implode("','", $gene);
  //Query the database
  $species_gene_name = $species ."_gene_name";
  $index = rand(1,2000);
  $myquery = "SELECT *  FROM `$species` where `Gene_ID` IN ('" . implode("','", $gene) . "')";
  $mydownload = "SELECT *  FROM $species INNER JOIN $species_gene_name ON $species.Gene_ID = $species_gene_name.gene_id WHERE $species.Gene_ID IN ('" . implode("','", $gene) . "')";
  //$mydownload = "SELECT * INTO OUTFILE 'E:/xampp/htdocs/HeteroMeth/QuertResult$index.csv' FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n'  FROM `arabidopsisgene` where `gene` IN ('" . implode("','", $gene) . "')";
  $mydatabase_download=$mysqli->query($mydownload);
  $mydatabase_result=$mysqli->query($myquery);
  //if (!copy("/tmp/QuertResult$index.csv", "/opt/lampp/htdocs/website/HeteroMeth/tmp/QuertResult$index.csv")){
    //echo 'copy fail';
 // }
  $title = array("Gene_ID","DNA methylation level(Upstream1000)","DNA methylation level(Upstream500)","DNA methylation level(gene body)","DNA methylation level(Downstream500)",  "DNA methylation level(Downstream1000)","DNA methylation entropy(Upstream1000)","DNA methylation entropy(Upstream500)","DNA methylation entropy(gene body)","DNA methylation entropy(Downstream500)","DNA methylation entropy(Downstream1000)","Number of DNA methylation regions(Upstream1000)","Number of DNA methylation regions(Upstream500)","Number of DNA methylation regions(gene body)","Number of DNA methylation regions(Downstream500)","Number of DNA methylation regions(Downstream1000)","GEO","gene_id","gene_name");
   if ($output_format == 'csv')
  {
	  $filename = "/home/lampp/htdocs/website/HeteroMeth/tmp/QuertResult$index.$output_format";
	  $out = fopen($filename,'w');
	  fputcsv($out,$title,",",chr(127));
	  while ($row=$mydatabase_download->fetch_assoc()) fputcsv($out,$row,",",chr(127));
  }
  else
  {
	  $filename = "/home/lampp/htdocs/HeteroMeth/tmp/QuertResult$index.$output_format";
	  $out = fopen($filename,'w');
	  fputcsv($out,$title,"\t",chr(127));
	  while ($row=$mydatabase_download->fetch_assoc()) fputcsv($out,$row,"\t",chr(127));
  }
  
  //判断返回结果是否为空
  if($mydatabase_result->num_rows ==0){
    echo "<font color = red>Sorry,There is no such records in our database</font>";
  }
  else
  {
    echo "<script>";
    echo '$(document).ready(function(){';
    echo '$("#content_left").children("table").eq(0).css({"display":"table"});
          $("#content_left").children("table").eq(1).css({"display":"table"});';
	echo "$('.style2').html('Query result of $species at $region_p');";

    while($row=$mydatabase_result->fetch_assoc()){
              $genename = $row['Gene_ID'];
              $gene_l = $row[$dml_r];
              $gene_e = $row[$dme_r];
              $gene_n = $row[$dmn_r];
              $geo = $row['GEO'];
              //echo $genename;
              //echo '$("#insert").before("<tr><td>'.$species.'</td><td>'+$genename+'</td><td>'+$gene_l+'</td><td>'+$gene_e+'</td></tr>");';
              //echo '$("#insert").before("<tr><td>'.$row['gene'].'</td><td>'.$row['gene'].'</td><td>'.$row['gene'].'</td><td>'.$row['gene'].'</td></tr>");';
              echo  '$("#insert").before("';
              echo "<tr><td>".$genename."</td><td>".print_check($gene_l)."</td><td>".print_check($gene_e)."</td><td>".print_check($gene_n)."</td><td>".$geo."</td><td witdh='48'><a href='plot.php?species=$species&gene=$genename&geo=$geo' target='_blank'>Show all</a></tr>";
              echo '");';
              //echo  '$("#insert").before("<tr><td>ms   </td><td>ms   </td><td>ms   </td></tr>");';
    }
    //insert the download div
    echo '$("#content_left").children("table").eq(0).before("';
    echo "<div height='5px' width='650'><p style='font-size:20px'>Download the query ,click <a href='tmp/QuertResult$index.$output_format' download='QueryResult.$output_format'>here</a>";
    echo '");';
    echo 'var heightLeft= $("#content_left").height();
          var heightRight= $("#content_right").height();
          console.log(heightLeft);
          console.log(heightRight);
          if (heightLeft > heightRight)
          {
          $("#content_right").height(heightLeft);
          }';
    echo  '});';
    echo '</script>';
    }
  }
}
?>
