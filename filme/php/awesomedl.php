#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
echo "<?xml version='1.0' encoding='UTF8' ?>";
$query = $_GET["query"];
$queryArr = explode(',', $query);
$link = urldecode($queryArr[0]);
$link=str_replace(" ","%20",$link);
$tit = urldecode($queryArr[1]);
$html = file_get_contents($link);

?>
<rss version="2.0">
<onEnter>
  startitem = "middle";
  setRefreshTime(1);
</onEnter>

<onRefresh>
  setRefreshTime(-1);
  itemCount = getPageInfo("itemCount");
</onRefresh>

<mediaDisplay name="threePartsView"
	sideLeftWidthPC="0"
	sideRightWidthPC="0"
	
	headerImageWidthPC="0"
	selectMenuOnRight="no"
	autoSelectMenu="no"
	autoSelectItem="no"
	itemImageHeightPC="0"
	itemImageWidthPC="0"
	itemXPC="8"
	itemYPC="25"
	itemWidthPC="45"
	itemHeightPC="8"
	capXPC="8"
	capYPC="25"
	capWidthPC="45"
	capHeightPC="64"
	itemBackgroundColor="0:0:0"
	itemPerPage="8"
  itemGap="0"
	bottomYPC="90"
	backgroundColor="0:0:0"
	showHeader="no"
	showDefaultInfo="no"
	imageFocus=""
	sliding="no"
	idleImageXPC="5" idleImageYPC="5" idleImageWidthPC="8" idleImageHeightPC="10"
>
		
  	<text align="center" offsetXPC="0" offsetYPC="0" widthPC="100" heightPC="20" fontSize="30" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>getPageInfo("pageTitle");</script>
		</text>
  	<text align="left" offsetXPC="6" offsetYPC="15" widthPC="50" heightPC="4" fontSize="16" backgroundColor="10:105:150" foregroundColor="100:200:255">
    Press 1 or 2 to jump +- 100
		</text>
  	<text redraw="no" offsetXPC="85" offsetYPC="12" widthPC="10" heightPC="6" fontSize="20" backgroundColor="10:105:150" foregroundColor="60:160:205">
		  <script>sprintf("%s / ", focus-(-1))+itemCount;</script>
		</text>

		<text align="center" redraw="yes" 
          lines="10" fontSize=17
		      offsetXPC=55 offsetYPC=55 widthPC=40 heightPC=42 
		      backgroundColor=0:0:0 foregroundColor=200:200:200>
			<script>print(annotation); annotation;</script>
		</text>
		<image  redraw="yes" offsetXPC=60 offsetYPC=22.5 widthPC=20 heightPC=25>
  <script>print(img); img;</script>
		</image>
        <idleImage>image/POPUP_LOADING_01.png</idleImage>
        <idleImage>image/POPUP_LOADING_02.png</idleImage>
        <idleImage>image/POPUP_LOADING_03.png</idleImage>
        <idleImage>image/POPUP_LOADING_04.png</idleImage>
        <idleImage>image/POPUP_LOADING_05.png</idleImage>
        <idleImage>image/POPUP_LOADING_06.png</idleImage>
        <idleImage>image/POPUP_LOADING_07.png</idleImage>
        <idleImage>image/POPUP_LOADING_08.png</idleImage>

		<itemDisplay>
			<text align="left" lines="1" offsetXPC=0 offsetYPC=0 widthPC=100 heightPC=100>
				<script>
					idx = getQueryItemIndex();
					focus = getFocusItemIndex();
					if(focus==idx) 
					{
					  annotation = getItemInfo(idx, "annotation");
					  img = getItemInfo(idx,"image");
					}
					getItemInfo(idx, "title");
				</script>
				<fontSize>
  				<script>
  					idx = getQueryItemIndex();
  					focus = getFocusItemIndex();
  			    if(focus==idx) "16"; else "14";
  				</script>
				</fontSize>
			  <backgroundColor>
  				<script>
  					idx = getQueryItemIndex();
  					focus = getFocusItemIndex();
  			    if(focus==idx) "10:80:120"; else "-1:-1:-1";
  				</script>
			  </backgroundColor>
			  <foregroundColor>
  				<script>
  					idx = getQueryItemIndex();
  					focus = getFocusItemIndex();
  			    if(focus==idx) "255:255:255"; else "140:140:140";
  				</script>
			  </foregroundColor>
			</text>

		</itemDisplay>
		
<onUserInput>
<script>
ret = "false";
userInput = currentUserInput();

if (userInput == "pagedown" || userInput == "pageup")
{
  idx = Integer(getFocusItemIndex());
  if (userInput == "pagedown")
  {
    idx -= -8;
    if(idx &gt;= itemCount)
      idx = itemCount-1;
  }
  else
  {
    idx -= 8;
    if(idx &lt; 0)
      idx = 0;
  }

  print("new idx: "+idx);
  setFocusItemIndex(idx);
	setItemFocus(0);
  redrawDisplay();
  "true";
}
else if(userInput == "one" || userInput == "1")
{
    idx = Integer(getFocusItemIndex());
    idx -= -100;
    if(idx &gt;= itemCount)
    idx = itemCount-1;

  print("new idx: "+idx);
  setFocusItemIndex(idx);
	setItemFocus(0);
  redrawDisplay();
  "true";
}
else if(userInput == "two" || userInput == "2")
{
    idx = Integer(getFocusItemIndex());
    idx -= 100;
    if(idx &lt; 0)
      idx = 0;

  print("new idx: "+idx);
  setFocusItemIndex(idx);
	setItemFocus(0);
  redrawDisplay();
  "true";
}
ret;
</script>
</onUserInput>
		
	</mediaDisplay>
	
	<item_template>
		<mediaDisplay  name="threePartsView" idleImageXPC="5" idleImageYPC="5" idleImageWidthPC="8" idleImageHeightPC="10">
        <idleImage>image/POPUP_LOADING_01.png</idleImage>
        <idleImage>image/POPUP_LOADING_02.png</idleImage>
        <idleImage>image/POPUP_LOADING_03.png</idleImage>
        <idleImage>image/POPUP_LOADING_04.png</idleImage>
        <idleImage>image/POPUP_LOADING_05.png</idleImage>
        <idleImage>image/POPUP_LOADING_06.png</idleImage>
        <idleImage>image/POPUP_LOADING_07.png</idleImage>
        <idleImage>image/POPUP_LOADING_08.png</idleImage>
		</mediaDisplay>

	</item_template>
<channel>
	<title><?php echo $tit; ?></title>
	<menu>main menu</menu>

<?php
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
$new=str_between($html,"<span id='blog-pager-newer-link'>","</span>");
if($new) {
  $t1=explode("href='",$new);
  $t2=explode("'",$t1[1]);
  $l=$t2[0];
  $prev = 'http://127.0.0.1'.$_SERVER['SCRIPT_NAME']."?query=".urlencode($l).",".urlencode($tit);
  echo '
<item>
<title>Previous Page</title>
<link>'.$prev.'</link>
<annotation>Previous Page</annotation>
<image>image/left.jpg</image>
<mediaDisplay name="threePartsView"/>
</item>
';
}
$host = "http://127.0.0.1/cgi-bin";
$videos = explode("class='post-title", $html);

unset($videos[0]);
$videos = array_values($videos);
foreach($videos as $video) {
    $t1=explode("href='",$video);
    $t2=explode("'",$t1[1]);
    $link=$t2[0];
    
    $t3=explode(">",$t1[1]);
    $t4=explode("<",$t3[1]);
    $title=$t4[0];

    $t1=explode('src="',$video);
    $t2=explode('"',$t1[1]);
    $image=$t2[0];
    $image=str_replace(" ","%20",$image);

    $data=$title;
   if (strpos($title,'<') === false) {
    if ($link <> "") {
       $down = $tit." ".$title;
       $link = 'http://127.0.0.1/cgi-bin/scripts/filme/php/filme1_link.php?file='.$link.','.urlencode($down);

  echo '
  <item>
  <title>'.$title.'</title>
  <link>'.$link.'</link>
  <annotation>'.$data.'</annotation>
  <image>'.$image.'</image>
  <media:thumbnail url="'.$image.'" />
  <mediaDisplay name="threePartsView"/>
  </item>
  ';
}
}
}
$old=str_between($html,"<span id='blog-pager-older-link'>","</span>");
if($old) {
  $t1=explode("href='",$old);
  $t2=explode("'",$t1[1]);
  $l=$t2[0];
  $next = 'http://127.0.0.1'.$_SERVER['SCRIPT_NAME']."?query=".urlencode($l).",".urlencode($tit);
  echo '
<item>
<title>Next Page</title>
<link>'.$next.'</link>
<annotation>Next Page</annotation>
<image>image/right.jpg</image>
<mediaDisplay name="threePartsView"/>
</item>
';
}
?>

</channel>
</rss>
