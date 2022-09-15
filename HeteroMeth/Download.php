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
<script type="text/javascript" src="statics/jquery-1.12.4.min.js"></script>
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
<script  src="js/DynamicOptionList.js"></script>
<script language="javascript">
function Outputofdownload()
{
  var namespe = document.getElementById('species');
  if (namespe.value == ""){
    alert("Please  select a species!");
    return false;
  }
}
</script>
</head>
<body onload="initDynamicOptionLists();">
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
          <a  href="index.html">Home</a>
        </li>
        <li>
          <a href="SymbolSearch.php">Gene Search</a>
        </li>
        <li>
          <a href="Browse.html">Genome Browser</a>
        </li>
        <li>
          <a class="current" href="Download.php">Browse & Download</a>
        </li>
        <li>
          <a href="Contact.php">Contact us</a>
        </li>
    </div>
    <div id="area"></div>
    <div id="main">
      <div id="content_left">
        <form name="atstatesearch" method="post" action="" onsubmit="return checkquery()" enctype="multipart/form-data">
          <fieldset  class="query">
            <legend>Browse & Download</legend>
          <table align="left" id="query">
        		<tbody><tr height="30" style="width:150px"><td><b>Species:</td>
        			<td style="width:100px"><select name="species" width = "70px" style="font-style:italic">
        				<option value="Homo sapiens" selected="">Homo sapiens</option>
        				<option value="Mus musculus">Mus musculus</option>
        			  <option value="Arabidopsis thaliana">Arabidopsis thaliana</option>
                <option value="Oryza Sativa">Oryza sativa</option>
              </select>
        		</td></tr>
        		<tr height="30"><td>
        			<button type="submit" class="btn btn-green btn-fill-vert"  onclick="return Outputofgene();">Submit</button>
            </td>
        	</tbody></table>
        	</form>
        </fieldset>
        <table  width="550"  border="0" style="display: table" align="center" id="table-5">
          <caption style="height:40px;padding:40px 0 0 10px"><b> No. of DNA methylomes stored in HeteroMeth</caption>
            <thead><tr><th>Species</th><th>Genome assembly</th><th>No. of methylomes</th><tr></thead>
            <tbody><tr>
            </tr>
              <tr>
                <td><i>Homo sapiens</i></td><td>GRCh38</td><td>12</td>
              </tr>
              <tr>
                <td><i>Mus musculus</i></td><td>GRCm38</td><td>26</td>
              </tr>
              <tr>
                <td><i>Arabidopsis thaliana</i></td><td>TAIR10</td><td>94</td>
              </tr>
              <tr>
                <td><i>Oryza sativa</i></td><td>RGAP7</td><td>9</td>
              </tr>
        </tbody></table>
        <table  height="5px" width="700" border="0" bgcolor="#409f89" style="display: none">
            <tbody>
              <tr>
                <td><span class="style2">Browse the results </span></td>
              </tr>
          </tbody>
        </table>
        <table  width="700" border="1" cellpadding="0" cellspacing="0" align="center" bordercolor="#CCCCCC" style="display: none;font-size:15px">
          <tbody>
            <tr align='center'><td>Species</td><td>Assembly</td><td>Sample</td><td>Context</td><td style="font-size:9px">PubMed/ENCODE</td><td>GEO</td><td>Result</td></tr>
            <tr id="insert" style="display: none"><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
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
//define a link switch function
function link_check($x){
  if(substr($x,0,1)=='P'){
    return "https://www.ncbi.nlm.nih.gov/pmc/articles/".$x;
  }
  else{
    return "https://www.encodeproject.org/experiments/".$x;
  }
}
// redifine some variable
$genearray = $species="";
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
  //Query the database
  $myquery = "SELECT *  FROM `download` WHERE `SPECIES`='$species' ";
  $mydatabase_result=$mysqli->query($myquery);
  //判断返回结果是否为空
  if($mydatabase_result->num_rows ==0){
    echo "<font color = red>Sorry,There is no such records in our database</font>";
  }
  else
  {
    echo "<script>";
    echo '$(document).ready(function(){';
    echo '$("#content_left").children("table").eq(0).css({"display":"none"});
          $("#content_left").children("table").eq(1).css({"display":"table"});
          $("#content_left").children("table").eq(2).css({"display":"table"});';
          while($row=$mydatabase_result->fetch_assoc()){
                      $species = $row['Species'];
                      $assembly = $row['Assembly'];
                      $type = $row['type'];
                      $sample = $row['Samples'];
                      if ($type == 'wt')
                      {
                       $sample = $sample;
                      }
                      else
                      {
                       $sample = "<i>".$sample."</i>";
                      }
                      $tissus = $row['Tissues'];
                      $context = $row['Context'];
                      $pubmed = $row['PubMed/ENCODE'];
                      $geo = $row['GEO'];
                      $result = $row['Results'];
                    //echo $genename;
                    //echo '$("#insert").before("<tr><td>'.$species.'</td><td>'+$genename+'</td><td>'+$gene_l+'</td><td>'+$gene_e+'</td></tr>");';
                    //echo '$("#insert").before("<tr><td>'.$row['gene'].'</td><td>'.$row['gene'].'</td><td>'.$row['gene'].'</td><td>'.$row['gene'].'</td></tr>");';
                    echo  '$("#insert").before("';
                    echo "<tr align='center'><td><i>".$species."</i></td><td>".$assembly.
                    "</td><td>".$sample.
                    "</td><td>".$context."</td><td><a href='".link_check($pubmed)."'>Link</a></td><td><a href='https://www.ncbi.nlm.nih.gov/sra/?term=".$geo."'>Link</a></td><td><a href='Files/Segments/".$geo."_segment.txt' download=''>File</a></td></tr>";
                    //echo "<tr><td>".$species."</td><td>".$sample."</td><td>".$sample."</td><td>".$sample."</td></tr>";
                    echo '");';
                    //echo  '$("#insert").before("<tr><td>ms   </td><td>ms   </td><td>ms   </td></tr>");';
          }
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
