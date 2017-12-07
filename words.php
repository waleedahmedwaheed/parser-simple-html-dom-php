<?php //include('simple_html_dom.php'); ?>
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

        

    </div>
	
	<div id="page-wrap">

	 
<?php 
	 
//The string you want to explode
$strings = "This is a test check";
$strings2 = "This is not test checker";
$strings3 = "This not test checker";
//$strings4 = "Is not test chker";
//explode your $string, which will create an array which we will call $words
$words = explode(' ', $strings);
$words2 = explode(' ', $strings2);

$result = array_intersect($words,$words2);
print_r($result);
//for each $word in $words
foreach($words as $word)
{	
	if(in_array($word,$words2,true))
	{
		echo $word;
	}
	else
	{
		echo $word."<br>";
	}
	/* foreach($words2 as $word2)
	{
    //check if $word length if larger then 4
    //if(strlen($word) > 4)
    //{
        //echo the $word
		if($word==$word2)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
        echo $word."<br>";
    //}
	} */
}

/*function extractCommonWords($string) {
    $stopWords = array('i','a','about','an','and','are','as','at','be','by','com','de','en','for','from','how','in','is','it','la','of','on','or','that','the','this','to','was','what','when','where','who','will','with','und','the','www');

    $string = preg_replace('/\s\s+/i', '', $string); //echo $string, "<br /><br />"; // replace whitespace
    $string = trim($string); // trim the string
    $string = preg_replace('/[^a-zA-Z0-9 -_]/', '', $string); // only take alphanumerical characters, but keep the spaces and dashes too…
    $string = strtolower($string); // make it lowercase

    preg_match_all('/([a-zA-Z]|\xC3[\x80-\x96\x98-\xB6\xB8-\xBF]|\xC5[\x92\x93\xA0\xA1\xB8\xBD\xBE]){4,}/', $string, $matchWords);
    $matchWords = $matchWords[0];

    foreach($matchWords as $key => $item) {
        if($item == '' || in_array(strtolower($item), $stopWords) || strlen($item) <= 3) {
            unset($matchWords[$key]);
        }
    }

    $wordCountArr = array();
    if(is_array($matchWords)) {
        foreach($matchWords as $key => $val) {
            $val = strtolower($val);
            if(isset($wordCountArr[$val])) {
                $wordCountArr[$val]++;
            } else {
                $wordCountArr[$val] = 1;
            }
        }
    }

    arsort($wordCountArr);
    $wordCountArr = array_slice($wordCountArr, 0, 10);
    return $wordCountArr;
}

//echo extractCommonWords($string);*/
/* 
$str='Sus azahares presentan gruesos pétalos blancos teñidos de rosa o violáceo en la parte externa con numerosos estambres';
preg_match_all('/([^0-9\s]){4,}/i', $str, $matches);
echo '<pre>';
var_dump($matches);
echo '</pre>';
 */
//echo strrchr("Hello world! What a beautiful day!");

	?>
	
	
	</div>
		
</body>
</html>