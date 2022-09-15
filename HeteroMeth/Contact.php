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
<script language="javascript">
function Outputofdownload()
{
  var namespe = document.getElementById('species');
  if(namespe.value == ""){
    alert("Please select a species!");
    return false;
  }
}
</script>
<script>
$(document).ready(function(){
  $("#check").click(function(){
    var spcname = $("#species").find("option:selected").val();
    //alert($("#species").find("option:selected").val());
    if(spcname != ''){
    $("#content_left").children("table").eq(0).css({"display":"none"});
    $("#content_left").children("table").eq(1).css({"display":"table"});
    $("#content_left").children("table").eq(2).css({"display":"table"});
  }
  });
});
</script>
</head>
<body>
<header>
<div id="headercontainer"></div>
<p id="description">A Database of Cell-to-cell <strong><font color="#fdfd05"size="4">Hetero</font></strong>geneity in DNA <strong><font color="#fdfd05"size="4">Meth</font></strong>ylation</p>
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
          <a href="Browse.html">Genome Browse</a>
        </li>
        <li>
          <a href="Download.php">Browse & Download</a>
        </li>
        <li>
          <a class="current" href="Contact.php">Contact us</a>
        </li>
    </div>
    <div id="area"></div>
    <div id="main">
      <div id="content_left">
        <h3 style="font-size:20px">Contact Information</h3>
        <div class="contact_info">
          <h3 style="font-size:18px">QianLab Information</h3>
                <ul style="font-size:16px">
                    <li>Institute of Genetics and Developmental Biology </li>
                    <li>Chinese Academy of Sciences</li>
                    <li>No.1 West Beichen Road, Chaoyang District, Beijing 100101, China</li>
                    <br>
                    <li>Email  : <a href="qhuan@genetics.ac.cn" title="contact us" >qhuan@genetics.ac.cn, zyl@genetics.ac.cn, wfqian@genetics.ac.cn</a></li>
                </ul>
        </div>
        <table width="445" border="0" style="display: table">
            <tbody><tr>
              <td>&nbsp;</td>
            </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
        </tbody></table>
      </div>
      <div id="content_right">
        <h4>Accessing HeteroMeth</h4>
        <div class="item_box">
          <h5><a class="current" href="" title="Gene Search">Gene Search</a></h5>
          <p style="font-size:13px">After submitting a list of gene IDs, the DNA methylation level and Shannon entropy for each gene can be browsed and downloaded.</p>
        </div>
        <div class="item_box">
          <h5><a href="" title="Region Browse">Genome Browse</a></h5>
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
