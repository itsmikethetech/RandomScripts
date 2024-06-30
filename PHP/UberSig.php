<?php

header("Content-type: image/png");

error_reporting(E_ALL ^ E_NOTICE);

$host = "localhost";
$dbname = "db_name";
$dbuser = "user";
$dbpass = "pass";

$link = mysql_connect($host, $dbuser, $dbpass)
	or die("Could not connect: " . mysql_error());
mysql_select_db($dbname) or die("Could not select database");

$stats = mysql_query("SELECT * FROM ibf_cache_store WHERE `cs_key` = 'stats'");
$stats = mysql_fetch_array($stats);
$stats = unserialize($stats['cs_value']);
$most_count = $stats['most_count'];
$last_mem_name = $stats['last_mem_name'];

$sql1 = mysql_query("SELECT `mgroup` FROM ibf_members");
$members = mysql_num_rows($sql1);

$sql2 = mysql_query("SELECT `pid` FROM ibf_posts");
$posts = mysql_num_rows($sql2);
$sql3 = mysql_query("SELECT `tid` FROM ibf_topics");
$topics = mysql_num_rows($sql3);
$replies = $posts + $topics;

 function getmicrotime(){
list($usec1, $sec1) = explode(" ",microtime());
return ((float)$usec1 + (float)$sec1);
}
$time_start1 = getmicrotime();
for ($i=0; $i <1000; $i++){
}

$differencetolocaltime=0;
$new_U=date("U")-$differencetolocaltime*3600;
$times10 = date("n/j/y g:ia", $new_U);

$date1 = date("n/j/y");

// Simple OS Detection
$os = $HTTP_USER_AGENT;
$oslist = Array (

// Windows
"Win|Windows",
"Win16|Windows",
"Win95|Windows 95",
"Win98|Windows 98",
"WinME|Windows ME",
"Win32|Windows",
"WinNT|Windows NT",
"Windows 3.1|Windows 3.1",
"Windows 95|Windows 95",
"Windows CE|Windows CE",
"Windows 98|Windows 98",
"Windows ME|Windows ME",
"Windows NT|Windows NT",
"Windows NT 5.0|Windows 2000",
"Windows NT 5.1|Windows XP",

// Macintosh
"Mac_68000|MacOS m68K",
"Mac_68K|MacOS m68K",
"Mac_PowerPC|MacOS PPC",
"Mac_PPC|MacOS PPC",
"Macintosh|MacOS",

// Unices
"X11|UNIX",
"BSD|BSD",
"SunOS|SunOS",
"IRIX|IRIX",
"HP-UX|HP-UX",
"AIX|AIX",
"QNX|QNX",
"SCO_SV|SCO UNIX",
"FreeBSD|FreeBSD",
"NetBSD|NetBSD",

// Linux
"Linux|Linux",
"Debian|Debian GNU/Linux",

// Other
"BeOS|BeOS",
"OS/2|OS/2",
"AmigaOS|AmigaOS",

);

foreach ($oslist as $osnow) {
$osnow = explode ("|", $osnow);
if (eregi ($osnow[0], $os)) {
$endos = $osnow[1];
$check = "No";
} elseif ($check != "No") {
$endos = "Unknown";
}
}

if ( strpos($_SERVER['HTTP_USER_AGENT'], 'Gecko') )
{
   if ( strpos($_SERVER['HTTP_USER_AGENT'], 'Netscape') )
   {
     $browser = 'Netscape';
   }
   else if ( strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') )
   {
     $browser = 'Mozilla Firefox';
   }
   else
   {
     $browser = 'Mozilla';
   }
}
else if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') )
{
   if ( strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') )
   {
     $browser = 'Opera';
   }
   else
   {
     $browser = 'Internet Explorer';
   }
}
else
{
   $browser = 'Others browsers';
}

   $ip = $_SERVER['REMOTE_ADDR'];
   $fullhost = gethostbyaddr($ip);
   $host = preg_replace("/^[^.]+./", "", $fullhost);

if ($_SERVER["HTTP_X_FORWARDED_FOR"]){
$UserIP = $_SERVER["HTTP_X_FORWARDED_FOR"];
}else{
$UserIP = $_SERVER["REMOTE_ADDR"];
}

if(!$_SERVER["HTTP_REFERER"]){
$CameFrom = "Unknown";
}else{
$CameFrom = $_SERVER["HTTP_REFERER"];
}

$viewss = file("file/views.txt");
$views = $viewss[0]; $views++;
$fp = fopen("file/views.txt", "w");
fwrite($fp, $views);
fclose($fp);

$number = rand(1,9);
if($number==1)$Saying = "Pyro Owns You?";
if($number==2)$Saying = "You have been haxxored";
if($number==3)$Saying = "Ph34r the poWeR of PhP";
if($number==4)$Saying = "My Sig > yurz";
if($number==5)$Saying = "Plays with matches";
if($number==6)$Saying = "PyRo > Scott";
if($number==7)$Saying = "AnarchyZERO!";
if($number==8)$Saying = "Creativity?";
if($number==9)$Saying = "Nutty = squirrels turd.";

$RandTitle1 = "PyRo PwNz j00!";
$RandTitle2 = "ph34r PyRo";
$RandTitle3 = "Pyro > Scott";
$RandTitle4 = "Welcome to AZ";
$RandTitle5 = "Bow before PyRo";
$RandTitle6 = "Peace, Love, Anarchy!";
$RandTitle7 = "Ph34r the pow3r of pHp";
$RandTitle8 = "Teh pow3r of pHp";
$RandTitle9 = "R U Addicted?";

$time_end = getmicrotime();
$time2 = $time_end - $time_start1;
$time2 = round($time2,6);

$Line1 = "Your IP is: " . $UserIP;
$Line2 = "UserAgent is: " . $agent;
$Line4 = "Came from: " . $CameFrom;
$Line5 = $Saying;
$Line7 = "Random Shit:";
$Line8 = "AnarchyZERO.com Stats:"; 
$Line9 = "Total Members: " . $members;
$Line10 = "Total Posts: " . $posts;
$Line11 = "Total Topics: " . $topics;
$Line12 = "Total Replies: " . $replies;
$Line13 = "Your Browser: " . $browser;
$Line14 = "Your ISP: " . $host;
$Line15 = "Your OS: " . $endos;
$Line16 = "AnarchyZERO.com";
$Line17 = "Most Online: " . $most_count;
$Line18 = "Last Member: " . $last_mem_name;
$Line19 = "Viewed " . $views . " times.";
$Line20 = "Date: " . $times10;
$Line21 = "Render Time: " . $time2;

$RandomBGImage = rand(1,6);
if($RandomBGImage==1)$BGImage = imagecreatefromjpeg("images/sig1.jpg");
if($RandomBGImage==2)$BGImage = imagecreatefromjpeg("images/sig2.jpg");
if($RandomBGImage==3)$BGImage = imagecreatefromjpeg("images/sig3.jpg");
if($RandomBGImage==4)$BGImage = imagecreatefromjpeg("images/sig4.jpg");
if($RandomBGImage==5)$BGImage = imagecreatefromjpeg("images/sig5.jpg");
if($RandomBGImage==6)$BGImage = imagecreatefromjpeg("images/sig6.jpg");

$textcolorwhite = imagecolorallocate($BGImage, 255, 255, 255);
/*$textcolorgreen = imagecolorallocate($BGImage, 0, 255, 102);
$textcolorred = imagecolorallocate($BGImage, 255, 0, 51);
$textcolorlgreen = imagecolorallocate($BGImage, 102, 255, 51);
$textcolorblue = imagecolorallocate($BGImage, 0, 51, 255);
$textcoloryellow = imagecolorallocate($BGImage, 102, 204, 255);
$textcolororange = imagecolorallocate($BGImage, 255, 153, 0);
$textcolorpurple = imagecolorallocate($BGImage, 153, 0, 153); */

$RandomColor2 = $textcolorwhite;

$x=4;
$y=2;

imagestring($BGImage, 2,$x, $y+17, $Line1, $RandomColor2);
imagestring($BGImage, 2,$x, $y+30, $Line13, $RandomColor2);
imagestring($BGImage, 2,$x, $y+43, $Line14, $RandomColor2);
imagestring($BGImage, 2,$x, $y+57, $Line15, $RandomColor2);
imagestring($BGImage, 2,$x+200, $y, $Line8, $RandomColor2);
imagestring($BGImage, 2,$x+200, $y+15, $Line9, $RandomColor2);
imagestring($BGImage, 2,$x+200, $y+29, $Line10, $RandomColor2);
imagestring($BGImage, 2,$x+200, $y+43, $Line17, $RandomColor2);
imagestring($BGImage, 2,$x+200, $y+57, $Line18, $RandomColor2);
imagestring($BGImage, 2,$x+355, $y, $Line20, $RandomColor2);
imagestring($BGImage, 2,$x+355, $y+15, $Line21, $RandomColor2);
imagestring($BGImage, 2,$x+355, $y+29, $Line19, $RandomColor2);
imagestring($BGImage, 2,$x, $y+74, $Line4, $RandomColor2);
imagestring($BGImage, 2,$x+355, $y+43, $Line5, $RandomColor2);

$title = rand(1,9);
if($title==1)$Title1 = imagestring($BGImage, 4,$x+5, $y-1, $RandTitle1, $RandomColor2);
if($title==2)$Title1 = imagestring($BGImage, 4,$x+5, $y-1, $RandTitle2, $RandomColor2);
if($title==3)$Title1 = imagestring($BGImage, 4,$x+5, $y-1, $RandTitle3, $RandomColor2);
if($title==4)$Title1 = imagestring($BGImage, 4,$x+5, $y-1, $RandTitle4, $RandomColor2);
if($title==5)$Title1 = imagestring($BGImage, 4,$x+5, $y-1, $RandTitle5, $RandomColor2);
if($title==6)$Title1 = imagestring($BGImage, 4,$x+5, $y-1, $RandTitle6, $RandomColor2);
if($title==7)$Title1 = imagestring($BGImage, 4,$x+5, $y-1, $RandTitle7, $RandomColor2);
if($title==8)$Title1 = imagestring($BGImage, 4,$x+5, $y-1, $RandTitle8, $RandomColor2);
if($title==9)$Title1 = imagestring($BGImage, 4,$x+5, $y-1, $RandTitle9, $RandomColor2);

imagepng($BGImage);

imagedestroy($BGImage);
?>
