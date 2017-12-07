<?php include('simple_html_dom.php'); 

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>
	
	<title>Web Crawler</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="css/style.css">
	
	<link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/form-search.css">

	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	
	   <script src="export/jquery.min.js" type="text/javascript" ></script>
	   <script src="export/jquery.tabletoCSV.js" type="text/javascript" charset="utf-8"></script>
    <script>
        $(function(){
            $("#export").click(function(){
                $("#export_table").tableToCSV();
            });
        });
    </script>
	
	<!--[if !IE]><!-->
	<style>
	
	/* 
	Max width before this PARTICULAR table gets nasty
	This query will take effect for any screen smaller than 760px
	and also iPads specifically.
	*/
	@media 
	only screen and (max-width: 760px),
	(min-device-width: 768px) and (max-device-width: 1024px)  {
	
		/* Force table to not be like tables anymore */
		table, thead, tbody, th, td, tr { 
			display: block; 
		}
		
		/* Hide table headers (but not display: none;, for accessibility) */
		thead tr { 
			position: absolute;
			top: -9999px;
			left: -9999px;
		}
		
		tr { border: 1px solid #ccc; }
		
		td { 
			/* Behave  like a "row" */
			border: none;
			border-bottom: 1px solid #eee; 
			position: relative;
			padding-left: 50%; 
		}
		
		td:before { 
			/* Now like a table header */
			position: absolute;
			/* Top/left values mimic padding */
			top: 6px;
			left: 6px;
			width: 45%; 
			padding-right: 10px; 
			white-space: nowrap;
		}
		
		/*
		Label the data
		*/
		td:nth-of-type(1):before { content: "First Name"; }
		td:nth-of-type(2):before { content: "Last Name"; }
		td:nth-of-type(3):before { content: "Job Title"; }
		td:nth-of-type(4):before { content: "Favorite Color"; }
		td:nth-of-type(5):before { content: "Wars of Trek?"; }
		td:nth-of-type(6):before { content: "Porn Name"; }
		td:nth-of-type(7):before { content: "Date of Birth"; }
		td:nth-of-type(8):before { content: "Dream Vacation City"; }
		td:nth-of-type(9):before { content: "GPA"; }
		td:nth-of-type(10):before { content: "Arbitrary Data"; }
	}
	
	/* Smartphones (portrait and landscape) ----------- */
	@media only screen
	and (min-device-width : 320px)
	and (max-device-width : 480px) {
		body { 
			padding: 0; 
			margin: 0; 
			width: 320px; }
		}
	
	/* iPads (portrait and landscape) ----------- */
	@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
		body { 
			width: 495px; 
		}
	}
	
	.exp
	{
		    border-bottom-right-radius: 2px;
    border-top-right-radius: 2px;
    background-color: #6caee0;
    box-shadow: 1px 2px 4px 0 rgba(0, 0, 0, 0.08);
    color: #ffffff;
    padding: 15px 22px;
    margin-left: -4px;
    cursor: pointer;
    border: none;
    outline: none;
	}
	
	</style>
	<!--<![endif]-->

</head>

<body>
		
	<header>
		<h1 style="text-align:center;float: none;">Web Warehousing and Web Mining - Crawler</h1>
    </header>
	
	 <div class="main-content">

        <!-- You only need this form and the form-search.css -->

        <form class="form-search" method="post">
            <input type="text" name="crawlid" style="display:none;" placeholder="div#id or div.class"> <br>
            <input type="text" name="crawl" placeholder="Enter Url to crawl.."> <br><br>
           <input type="checkbox" name="links" value="1" style="width: 14px;" />  Crawl URLs <br><br>
            <button type="submit" name="submit">Crawl</button>
             
        </form>

    </div>
	
	<div id="page-wrap">

	<h1 style="text-align: center;color: #596771;">Crawled Data of NUST University Faculty</h1>
  
	 
	<table>
	<tr>
	<td> <button id="export" data-export="export" class="exp" style="float: right;">Export</button></td>
	</tr>
	</table>
	<table id="export_table">
	<tr>
		<td nowrap>Name</td>
		<td>Degree</td>
	</tr>
	<?php
	
	if(isset($_POST["submit"]))
	{
	$crawl 		= $_POST["crawl"];
	$crawlid 	= $_POST["crawlid"];
	//$links	 	= $_POST["links"];
	
	$arr1 = array();
	$arr2 = array();
	$arr3 = array();
	
	$html = file_get_html($crawl);
	
	/////////////////////////////
	/*if($links == 1)
	{
		foreach($html->find('a') as $e) 
	{
     echo $e->href . '<br>';
	}
	//////////////////////////////
	
	}*/
	//$i = 0;
	/*foreach($html->find($crawlid) as $e)
	{	
		 
		 //echo $e->innertext."<br>";  
		
		//echo $e->find("p strong")->plaintext."--<br>";
		
			 echo $e->plaintext."<br>"; 
			 
		 
	}*/
	$i = 0;
	$j = 0;
	$k = 0;
	//foreach($html->find("div#article-box-middle p strong") as $e)
	foreach($html->find("ul.dfwp-list li div.Generic_title") as $e)
	{	
		 
		 //echo $e->innertext."<br>";  
		
		//echo $e->find("p strong")->plaintext."--<br>";
		
			 //echo $e->plaintext."<br>"; 
			 //echo $e->first_child(); //name
			 //echo $i = $i + 1;
			 //echo $e->last_child()."<br>"; //name
			 //echo "<tr><td>";
			  $val1 = $e->plaintext; //name
			 array_push($arr1,$val1);
			 //echo "</td></tr>";
			 //echo $e->plaintext."<br>"; //name
			//echo "<br>";
	}
	
	foreach($html->find("ul.dfwp-list li span.Generic_txt_facultyRollup") as $e)
	{
			//echo $e->plaintext."<br>";  
			//echo $j = $j + 1;
			 //echo $e->last_child()."<br>"; //name
			 //echo $e->next_sibling()."<br>"; //qual
			 //$Links = $e->find('tr')[0]->find('td')[1]->find('p')[1];
			  $val2 = $e->plaintext; //name
			 array_push($arr2,$val2);
	
	}
	
	/*foreach($html->find("div#article-box-middle table") as $e)
	{
		
		$Link = $e->find('tr')[1]->find('td')[1];
		
			//echo $k = $k + 1;
			 //echo $e->last_child()."<br>"; //name
			 //echo $Link->plaintext."<br>"; //qual
			 $val3 = $Link->plaintext; //name
			 array_push($arr3,$val3);
	
	}*/
	//echo $html->getElementById("article-box-middle")->childNodes(1)->childNodes(1)->childNodes(2)->getAttribute('id');
	
	//print_r($arr1)."<br>";
	//print_r($arr2)."<br>";
	//print_r($arr3)."<br>";
	
		foreach($arr1 as $key=>$val1_)
		{ // Loop though one array
		$val2_ = $arr2[$key]; // Get the values from the other arrays
		//$val3_ = $arr3[$key];
		 ?>
		<tr>
		<td nowrap><?php echo $val1_; ?></td>
		<td><?php echo $val2_; ?></td>
		</tr>
		 
	<?php	
		}
  
	}
	
	?>
	</td></tr>	 
	</table>
	
	</div>
		
</body>
</html>