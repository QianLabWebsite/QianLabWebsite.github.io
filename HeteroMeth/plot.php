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
<script src="js/highcharts.js"></script>
<script src="js/highcharts-more.js"></script>
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
    </div>
    <ul id="menu">
      <li>
        <a href="index.html">Home</a>
      </li>
      <li>
        <a href="SymbolSearch.php">Gene Search</a>
      </li>
      <li>
        <a href="Browse.html">Genome browser</a>
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
      <?php
      function plot_check($x){
        if(empty($x)){
          return 0;
        }
        else{
          return $x;
        }
      }
      if(isset($_GET)){
        if(!empty($_GET)){
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
            $species = $_GET['species'];
            $gene = (explode("\r\n",$_GET['gene']));
            $geo = $_GET['geo'];
            $myquery = "SELECT *  FROM `$species` where `Gene_ID` IN ('" . implode("','", $gene) . "') AND `GEO` = '$geo'";
            $mydatabase_result=$mysqli->query($myquery);
        if($mydatabase_result->num_rows ==0){
          echo "<font color = red>Sorry,There is no such records in our database</font>";
        }
        else
        {
          $row=$mydatabase_result->fetch_assoc();
          $genename = $row['Gene_ID'];
          $ml_u1000 = $row['DNA methylation level(Upstream1000)'];
          $ml_u500 = $row['DNA methylation level(Upstream500)'];
          $ml_body = $row['DNA methylation level(Gene body)'];
          $ml_d500 = $row['DNA methylation level(Downstream500)'];
          $ml_d1000 = $row['DNA methylation level(Downstream1000)'];
          //
          $me_u1000 = $row['DNA methylation entropy(Upstream1000)'];
          $me_u500 =  $row['DNA methylation entropy(Upstream500)'];
          $me_body =  $row['DNA methylation entropy(Gene body)'];
          $me_d500 =  $row['DNA methylation entropy(Downstream500)'];
          $me_d1000 = $row['DNA methylation entropy(Downstream1000)'];
          $geo = $row['GEO'];
          echo "
          <script type=\"text/javascript\">
           $(function () {
               $('#plot_gene').highcharts({
               chart: {
                   type: 'bar'
               },
               title: {
                   text: 'DNA methylation status'
               },
              xAxis: [{
                 labels: {
                   style: {
           	   color: 'black',
                   fontSize: '10.5px'
                     }
                   },
               tickColor:'#000000',
               tickLength:7,
               tickWidth:2,
               lineWidth:2,
               lineColor:'#000000',
               categories: [
           'DNA methylation level (Upstream 1000)',
           'DNA methylation level (Uptream 500)',
           'DNA methylation level (Gene body)',
           'DNA methylation level (Downstream 500)',
           'DNA methylation level (Downstream 1000)',
           'Shannon entropy (Upstream 1000)',
           'Shannon entropy (Upstream 500)',
           'Shannon entropy (Gene body)',
           'Shannon entropy (Downstream 500)',
           'Shannon entropy (Downstream 1000)',
           ]
               }],

               yAxis: [{
               //min: 0,
               //max:1,
               tickColor:'#000000',
               tickLength:7,
               tickWidth:2,
               gridLineWidth:0,
               lineWidth:2,
               lineColor:'#000000',
               labels: {
                      style:{
                           color:'black',
                           fontSize:'13px'
                            }

                       },
                       title: {
                           text: '',
                 }
             }],
                plotOptions: {
                      series: {
                          pointWidth: 15,                //柱子的大�?会影响到柱子的大�?
                      }
                  },
               tooltip: {
                       shared: true
                   },

               series: [{
                       name: ' ',
                       type: 'bar',
                 color:'white',
           data: [
           {y:".plot_check($ml_u1000).",color:'#63c49b'},
           {y:".plot_check($ml_u500).",color:'#63c49b'},
           {y:".plot_check($ml_body).",color:'#63c49b'},
           {y:".plot_check($ml_d500).",color:'#63c49b'},
           {y:".plot_check($ml_d1000).",color:'#63c49b'},
           {y:".plot_check($me_u1000).",color:'#c385b8'},
           {y:".plot_check($me_u500).",color:'#c385b8'},
           {y:".plot_check($me_body).",color:'#c385b8'},
           {y:".plot_check($me_d500).",color:'#c385b8'},
           {y:".plot_check($me_d1000).",color:'#c385b8'},
           ],
                 tooltip: {
                           pointFormat: '<span style=\"font-weight: bold; color: {series.color}\">{series.name}</span> <b>{point.y:.3f}</b> '
                       }
                   }]
               });
            var heightLeft= $(\"#content_left\").height();
            var heightRight= $(\"#content_right\").height();
               if (heightLeft > heightRight)
               {
               $(\"#content_right\").height(heightLeft);
               }
           });
          </script>
          ";
          }
        }
      }
       ?>
    <div id="plot_gene" style="margin: auto; height: auto;" data-highcharts-chart="0"></div>
   </div>
<div id="content_right">
  <h4>Accessing HeterMeth</h4>
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
