<?php error_reporting(0); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>
	
	<title>Assignment 4</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="css/style.css">
	
	<link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/form-search.css">

	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	
	   <script src="export/jquery.min.js" type="text/javascript" ></script>
	 
	
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
		<h1 style="text-align:center;float: none;">Web Warehousing and Web Mining </h1>
    </header>
	
	 <div class="main-content">

        <!-- You only need this form and the form-search.css -->
	<h1 style="text-align:center;"> Vector Space Retrieval Model </h2>
       

    </div>
	
	<div id="page-wrap">
	
	<table>
	<tr> <td> <h3>  Consider a very small collection C that consists in the following three documents: </h3>  </td> </tr>
	</table>
	
	<table id="export_table">
	
	<?php


$first = "new york times";
$firstarr   = preg_split('/\s+/', $first);
$second = "new york post";
$secondarr   = preg_split('/\s+/', $second);
$third = "los angeles times";
$thirdarr   = preg_split('/\s+/', $third);

$fourth = "new new times";
$fourtharr   = preg_split('/\s+/', $fourth);

$group = $first." ".$second." ".$third ;

//echo $group;
$data   = preg_split('/\s+/', $group);
//print_r($data);
$array = array_unique($data);

//echo $fourth;

$array2 = array_unique($fourtharr);

//print_r($array2);

$vals = array_count_values($data);

$vals2 = array_count_values($fourtharr);
$frequency = max(array_count_values($fourtharr));

//print_r($vals2);


/*echo "<br>";
foreach ($vals as $key => $value) {
	echo $key." => ".$value."<br>";
}*/


// echo "<br>";

 /*foreach ($array as $key => $value) {
 	if (in_array($value, $firstarr)) {
 		echo "found in firstarr = ".$value." <br>";
 		//continue;
 	}else{
 		echo "Not found in firstarr ".$value."<br>";
 	}
	
 	if (in_array($value, $secondarr)) {
 		echo "found in secondarr = ".$value." <br>";
 		//continue;
 	}else{
 		echo "Not found in secondarr ".$value."<br>";
 	}
	
 	if (in_array($value, $thirdarr)) {
 		echo "found in thirdarr = ".$value." <br>";
 		//continue;
 	}
 	else{
 		echo "Not found in thirdarr ".$value."<br>";
 	}
 	//echo " ".$value."  --  ";
 }*/



// print_r(array_intersect($thirdarr,$array));
// print_r(array_intersect($array,$secondarr));
// print_r(array_intersect($array,$firstarr));


// $str = "Hello world. It's a beautiful day.";
// print_r (explode(" ",$str));

?>

	<tr><th>d1 : <?php echo $first; ?> </th></tr>
	<tr><th>d2 : <?php echo $second; ?> </th></tr>
	<tr><th>d3 : <?php echo $third; ?> </th></tr>
	 	 
	</table>
	
	<table>
	<tr> <td> <h3> Some terms appear in two documents, some appear only in one document. The total
number of documents is N=3. Therefore, the idf values for the terms are:   </h3>  </td> </tr>
	</table>
	
	<table>
	<?php 
	foreach ($vals as $key => $value) {
		?>
	<tr><th><?php echo $key; ?> </th> <th> <?php echo "log(3/$value)"; ?> </th> <th> <?php echo (log(3/$value,2)); ?> </th> </tr>
	<?php }
	?>
	</table>
	
	<table>
	<tr> <td> <h2> Words in Vector </h2> </td> </tr>
	</table>
	
	<table>
	<tr> <td> <h3> For all the documents, we calculate the tf scores for all the terms in C. </h3>  </td> </tr>
	</table>
	
	<table>
	
	<tr><th>  </th> 
	<th> d1 </th> 
	<th> d2 </th> 
	<th> d3 </th> </tr>
	
	<?php 
	foreach ($vals as $keys => $values) {
		?>
	<tr><th width="20%"><?php  echo $keys;  ?> </th> 
	<th> <?php if (in_array($keys, $firstarr)) { echo 1; } else { echo 0; }  ?>  </th>
	<th> <?php if (in_array($keys, $secondarr)) { echo 1; } else { echo 0; }  ?> </th>
	<th> <?php if (in_array($keys, $thirdarr)) { echo 1; } else { echo 0; }  ?> </th>
	</tr>
	<?php 
	
	} ?>
	</table>
	
	
	
	<table>
	<tr> <td> <h3> Now we multiply the tf scores by the idf values of each term, obtaining the following
matrix of documents-by-terms: (All the terms appeared only once in each document in our
small collection, so the maximum value for normalization is 1.)  </h3>  </td> </tr>
	</table>
	
	<table>
	
	<tr><th>  </th> 
	<th> d1 </th> 
	<th> d2 </th> 
	<th> d3 </th> </tr>
	
	<?php 
	$lengthd1 = 0;
	$lengthd2 = 0;
	$lengthd3 = 0;
	$test = array();
	foreach ($vals as $keys => $values) {
		?>
	<tr><th width="20%"><?php  echo $keys;  ?> </th> 
	<th> <?php if (in_array($keys, $firstarr)) { echo $log1 = (log(3/$values,2)); $test[] =  array($keys=>(log(3/$values,2))); } else { echo 0; } ?>  </th>
	<th> <?php if (in_array($keys, $secondarr)) { echo $log2 = (log(3/$values,2)); } else { echo 0; }  ?> </th>
	<th> <?php if (in_array($keys, $thirdarr)) { echo $log3 = (log(3/$values,2)); } else { echo 0; }  ?> </th>
	</tr>
	<?php 
	$lengthd1 = $lengthd1 + pow($log1,2);
	$lengthd2 = $lengthd2 + pow($log2,2);
	$lengthd3 = $lengthd3 + pow($log3,2);
	$log1 = 0;
	$log2 = 0;
	$log3 = 0;
	} 
	//print_r($test);
	//echo $lengthd1."<br>";
	//echo $lengthd2."<br>";
	//echo $lengthd3."<br>";
	?>
	</table>
	
	<table>
	<tr> <td> <h3> Given the following query: “new new times”, we calculate the tf-idf vector for the
query, and compute the score of each document in C relative to this query, using the cosine
similarity measure. When computing the tf-idf values for the query terms we divide the
frequency by the maximum frequency (2) and multiply with the idf values.   </h3>  </td> </tr>
	</table>
	
	<table>
	
	<tr> <th> q </th> </tr>
	
	<?php 
	foreach($test as $row => $innerArray){
  foreach($innerArray as $innerRow => $value){
    //echo $value . "<br/>";
	if (in_array($vals2, $innerArray)) { echo (log(3/$values2,2)); }
		}
	}
	
	$qlength = 0;
	foreach ($vals2 as $keys2 => $values2) {
		//echo $frequency;
	?>
	<tr><th width="20%"><?php  echo $keys2; //echo $values2; 
	if (in_array($keys2, $fourtharr)) { (log(3/$frequency,2)); }  ?> </th> 
	<th> <?php echo $q1 = $values2/$frequency * (log(3/$frequency,2));
	$qp1 = pow($q1,2);	?>  </th>
	
	</tr>
	<?php 
	$qlength = $qlength + $qp1;
	} ?>
	</table>
	
	<table>
	<tr> <td> <h3> We calculate the length of each document and of the query.  </h3>  </td> </tr>
	</table>
	
	<table>
	<tr> <th width="20%"> Length of d1 </th> <th> <?php echo sqrt($lengthd1); ?> </th> </tr>
	<tr> <th width="20%"> Length of d2 </th> <th> <?php echo sqrt($lengthd2); ?> </th> </tr>
	<tr> <th width="20%"> Length of d3 </th> <th> <?php echo sqrt($lengthd3); ?> </th> </tr>
	<tr> <th width="20%"> Length of q </th> <th> <?php echo sqrt($qlength); ?> </th> </tr>
	</table>
	
	<table>
	<tr> <td> <h3> Then the similarity values are.  </h3>  </td> </tr>
	</table>
	 
	 
	 
	<table>
	
	<tr><th>  </th> 
	<th> cosSim(d1,q) </th> 
	<th> cosSim(d2,q) </th> 
	<th> cosSim(d3,q) </th> </tr>
	
	<?php 
	$lengthqd1 = 0;
	$lengthqd2 = 0;
	$lengthqd3 = 0;
	//$test = array();
	foreach ($vals as $keys => $values) {
		//echo $vals2["$keys"];
		//echo $values;
		//echo (($vals2["$keys"]/$frequency)* (log(3/$values,2))) * (log(3/$values,2));
		?>
	<tr>
	<th width="20%"><?php  echo $keys."sqrt".sqrt($qlength)*sqrt($lengthd2) ;  ?> </th> 
	<th> <?php if (in_array($keys, $firstarr)) { echo $logq1_ = (($vals2["$keys"]/$frequency)* (log(3/$values,2))) * (log(3/$values,2)) ; } else { echo 0; } ?>  </th>
	<th> <?php if (in_array($keys, $secondarr)) { echo $logq2_ = (($vals2["$keys"]/$frequency)* (log(3/$values,2))) * (log(3/$values,2)); } else { echo 0; }  ?> </th>
	<th> <?php if (in_array($keys, $thirdarr)) { echo $logq3_ = (($vals2["$keys"]/$frequency)* (log(3/$values,2))) * (log(3/$values,2)); } else { echo 0; }  ?> </th>
	</tr>
	<?php 
	$lengthqd1 = $lengthqd1 + $logq1_;
	$lengthqd2 = $lengthqd2 + $logq2_;
	$lengthqd3 = $lengthqd3 + $logq3_;
	$logq1_ = 0;
	$logq2_ = 0;
	$logq3_ = 0;
	$sqrt1 = sqrt($qlength)*sqrt($lengthd1);
	$sqrt2 = sqrt($qlength)*sqrt($lengthd2);
	$sqrt3 = sqrt($qlength)*sqrt($lengthd3);
	
	 
	}
	//echo $lengthqd1."///";	
	//echo $lengthqd1 / $sqrt1;	
	//echo $lengthqd2 / $sqrt2;	
	//print_r($test);
	//echo $lengthd1."<br>";
	//echo $lengthd2."<br>";
	//echo $lengthd3."<br>";
	?>
	<tr>
	<th></th>
	<th><?php echo $lengthqd1 / $sqrt1; ?></th>
	<th><?php echo $lengthqd2 / $sqrt2; ?></th>
	<th><?php echo $lengthqd3 / $sqrt3; ?></th>
	</tr>
	</table>
	 
	 <table>
	<tr> <td> <h3> According to the similarity values, the final order in which the documents are
presented as result to the query will be: d1, d2, d3.   </h3>  </td> </tr>
	</table>
	
	</div>
		
</body>
</html>