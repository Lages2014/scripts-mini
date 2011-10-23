#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
$host = "http://127.0.0.1/cgi-bin";
$img = "/usr/local/etc/www/cgi-bin/scripts/clip/image/myvideo_de.jpg";
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
	itemWidthPC="50"
	itemHeightPC="8"
	capXPC="8"
	capYPC="25"
	capWidthPC="50"
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

  	<text redraw="yes" offsetXPC="85" offsetYPC="12" widthPC="10" heightPC="6" fontSize="20" backgroundColor="10:105:150" foregroundColor="60:160:205">
		  <script>sprintf("%s / ", focus-(-1))+itemCount;</script>
		</text>
  	<text  redraw="yes" align="center" offsetXPC="0" offsetYPC="90" widthPC="100" heightPC="8" fontSize="17" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>print(annotation); annotation;</script>
		</text>
		<image  redraw="yes" offsetXPC=60 offsetYPC=35 widthPC=30 heightPC=30>
  <?php echo $img; ?>
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
					  location = getItemInfo(idx, "location");
					  annotation = getItemInfo(idx, "title");
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
ret;
</script>
</onUserInput>
	</mediaDisplay>
	<searchLink>
	  <link>
	    <script>"<?php echo $host."/scripts/clip/php/myvideo_de_s.php?query=1,"; ?>" + urlEncode(keyword) + "," + urlEncode(keyword);</script>
	  </link>
	</searchLink>
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
<title>myVideo.de</title>

<item>
<title>Search</title>
<onClick>
  keyword = getInput();
  if (keyword != null)
  {
    jumpToLink("searchLink");
  }
</onClick>
</item>

<?php
$link="http://www.myvideo.de/Videos_A-Z?lpage=";
$title="Videos A-Z";
echo '
<item>
<title>'.$title.'</title>
<link>'.$host.'/scripts/clip/php/myvideo_de.php?query=1,'.urlencode($link).','.urlencode($title).'</link>
</item>
';
?>
<!--
<item>
<title>Musik Videos</title>
<link><?php echo $host; ?>/scripts/clip/php/myvideo_de_mus.php?query=1</link>
</item>
-->
<item>
<title>Alle Serien</title>
<link><?php echo $host; ?>/scripts/clip/php/myvideo_de_ser.php</link>
</item>

<item>
<title>Serien - Neue Folgen</title>
<link><?php echo $host; ?>/scripts/clip/php/myvideo_de_ser1.php?query=1</link>
</item>

<item>
<title>Serien - Top 100 Serien</title>
<link><?php echo $host; ?>/scripts/clip/php/myvideo_de_ser1.php?query=2</link>
</item>

<item>
<title>Serien - Beliebte Highlight Clips</title>
<link><?php echo $host; ?>/scripts/clip/php/myvideo_de_ser1.php?query=3</link>
</item>
<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
///Videos_A-Z?searchChannelID=2&amp;searchChannel=Autos+%26+Verkehr&amp;searchOrder=5
///Videos_A-Z?searchChannelID=1&amp;searchChannel=Animation&amp;searchOrder=5
//http://www.myvideo.de/Videos_A-Z?lpage=2&searchWord=&searchChannelID=1&searchChannel=Animation&searchOrder=5
$html = file_get_contents("http://www.myvideo.de/Videos_A-Z/Videos_in_Kategorien");
//$html=str_between($html,"Kategorien </div>","</table>");
$videos = explode("<div class='vThumb kThumb'>", $html);
unset($videos[0]);
$videos = array_values($videos);

foreach($videos as $video) {
  $t2=explode("href='",$video);
  $t3=explode("'",$t2[1]);
  $link="http://www.myvideo.de".$t3[0];
  $link=str_replace("searchOrder=5","searchOrder=1",$link);
  $link=$link."&searchWord=&lpage=";
  $link=str_replace("&amp;","&",$link);
  $t4=explode(">",$t2[2]);
  $t5=explode("<",$t4[1]);
  $title=trim($t5[0]);
echo '
<item>
<title>'.$title.'</title>
<link>'.$host.'/scripts/clip/php/myvideo_de.php?query=1,'.urlencode($link).','.urlencode($title).'</link>
</item>
';
}
?>
</channel>
</rss>
