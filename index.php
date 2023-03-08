
<html>
<head>
<title>Happy Diwali Wishes From <?php echo $_GET["name"]; ?> - Happyfest.co.nf</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta charset="UTF-8">
<link href="animate.css"rel="stylesheet">
<link rel="stylesheet" type="text/css" href="./font/flaticon.css">
<meta name="KeyWords" content="">
<link href="https://fonts.googleapis.com/css?family=Coming+Soon|Kaushan+Script" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://unpkg.com/aos@2.3.0/dist/aos.css">
<script src="https://unpkg.com/aos@2.3.0/dist/aos.js"></script>

</head>

<body bgcolor="black" text="white" LINK="yellow" ALINK="red" VLINK="red">

<script type="text/javascript">
// <![CDATA[
var bits=55; // how many bits
var speed=10; // how fast - smaller is faster
var bangs=2; // how many can be launched simultaneously (note that using too many can slow the script down)
var colours=new Array("#03f", "#f03", "#0e0", "#93f", "#0cf", "#f93", "#f0c");
//                     blue    red     green   purple  cyan    orange  pink

/****************************
*      Fireworks Effect     *
*(c)2004-14 mf2fm web-design*
*  http://www.mf2fm.com/rv  *
* DON'T EDIT BELOW THIS BOX *
****************************/
var bangheight=new Array();
var intensity=new Array();
var colour=new Array();
var Xpos=new Array();
var Ypos=new Array();
var dX=new Array();
var dY=new Array();
var stars=new Array();
var decay=new Array();
var swide=800;
var shigh=600;
var boddie;

if (typeof('addRVLoadEvent')!='function') function addRVLoadEvent(funky) {
  var oldonload=window.onload;
  if (typeof(oldonload)!='function') window.onload=funky;
  else window.onload=function() {
    if (oldonload) oldonload();
    funky();
  }
}

addRVLoadEvent(light_blue_touchpaper);

function light_blue_touchpaper() { if (document.getElementById) {
  var i;
  boddie=document.createElement("div");
  boddie.style.position="absolute";
  boddie.style.top="0px";
  boddie.style.left="0px";
  boddie.style.overflow="visible";
  boddie.style.width="1px";
  boddie.style.height="1px";
  boddie.style.backgroundColor="transparent";
  document.body.appendChild(boddie);
  set_width();
  for (i=0; i<bangs; i++) {
    write_fire(i);
    launch(i);
    setInterval('stepthrough('+i+')', speed);
  }
}}

function write_fire(N) {
  var i, rlef, rdow;
  stars[N+'r']=createDiv('|', 12);
  boddie.appendChild(stars[N+'r']);
  for (i=bits*N; i<bits+bits*N; i++) {
    stars[i]=createDiv('*', 13);
    boddie.appendChild(stars[i]);
  }
}

function createDiv(char, size) {
  var div=document.createElement("div");
  div.style.font=size+"px monospace";
  div.style.position="absolute";
  div.style.backgroundColor="transparent";
  div.appendChild(document.createTextNode(char));
  return (div);
}

function launch(N) {
  colour[N]=Math.floor(Math.random()*colours.length);
  Xpos[N+"r"]=swide*0.5;
  Ypos[N+"r"]=shigh-5;
  bangheight[N]=Math.round((0.5+Math.random())*shigh*0.4);
  dX[N+"r"]=(Math.random()-0.5)*swide/bangheight[N];
  if (dX[N+"r"]>1.25) stars[N+"r"].firstChild.nodeValue="/";
  else if (dX[N+"r"]<-1.25) stars[N+"r"].firstChild.nodeValue="\\";
  else stars[N+"r"].firstChild.nodeValue="|";
  stars[N+"r"].style.color=colours[colour[N]];
}

function bang(N) {
  var i, Z, A=0;
  for (i=bits*N; i<bits+bits*N; i++) {
    Z=stars[i].style;
    Z.left=Xpos[i]+"px";
    Z.top=Ypos[i]+"px";
    if (decay[i]) decay[i]--;
    else A++;
    if (decay[i]==15) Z.fontSize="7px";
    else if (decay[i]==7) Z.fontSize="2px";
    else if (decay[i]==1) Z.visibility="hidden";
	if (decay[i]>1 && Math.random()<.1) {
	   Z.visibility="hidden";
	   setTimeout('stars['+i+'].style.visibility="visible"', speed-1);
	}
    Xpos[i]+=dX[i];
    Ypos[i]+=(dY[i]+=1.25/intensity[N]);

  }
  if (A!=bits) setTimeout("bang("+N+")", speed);
}

function stepthrough(N) {
  var i, M, Z;
  var oldx=Xpos[N+"r"];
  var oldy=Ypos[N+"r"];
  Xpos[N+"r"]+=dX[N+"r"];
  Ypos[N+"r"]-=4;
  if (Ypos[N+"r"]<bangheight[N]) {
    M=Math.floor(Math.random()*3*colours.length);
    intensity[N]=5+Math.random()*4;
    for (i=N*bits; i<bits+bits*N; i++) {
      Xpos[i]=Xpos[N+"r"];
      Ypos[i]=Ypos[N+"r"];
      dY[i]=(Math.random()-0.5)*intensity[N];
      dX[i]=(Math.random()-0.5)*(intensity[N]-Math.abs(dY[i]))*1.25;
      decay[i]=16+Math.floor(Math.random()*16);
      Z=stars[i];
      if (M<colours.length) Z.style.color=colours[i%2?colour[N]:M];
      else if (M<2*colours.length) Z.style.color=colours[colour[N]];
      else Z.style.color=colours[i%colours.length];
      Z.style.fontSize="13px";
      Z.style.visibility="visible";
    }
    bang(N);
    launch(N);
  }
  stars[N+"r"].style.left=oldx+"px";
  stars[N+"r"].style.top=oldy+"px";
}

window.onresize=set_width;
function set_width() {
  var sw_min=999999;
  var sh_min=999999;
  if (document.documentElement && document.documentElement.clientWidth) {
    if (document.documentElement.clientWidth>0) sw_min=document.documentElement.clientWidth;
    if (document.documentElement.clientHeight>0) sh_min=document.documentElement.clientHeight;
  }
  if (typeof(self.innerWidth)!="undefined" && self.innerWidth) {
    if (self.innerWidth>0 && self.innerWidth<sw_min) sw_min=self.innerWidth;
    if (self.innerHeight>0 && self.innerHeight<sh_min) sh_min=self.innerHeight;
  }
  if (document.body.clientWidth) {
    if (document.body.clientWidth>0 && document.body.clientWidth<sw_min) sw_min=document.body.clientWidth;
    if (document.body.clientHeight>0 && document.body.clientHeight<sh_min) sh_min=document.body.clientHeight;
  }
  if (sw_min==999999 || sh_min==999999) {
    sw_min=800;
    sh_min=600;
  }
  swide=sw_min;
  shigh=sh_min;
}
// ]]>
</script>

<script type="text/javascript">
AOS.init({
  duration: 500,
})
</script>
<br>
    <?php 
    date_default_timezone_set("Asia/Kolkata");
    $ip = $_SERVER['REMOTE_ADDR'];
    $page = "http://".$_SERVER['HTTP_HOST'];
    $datetime = date("F j, Y, g:i a");
    $useragent = $_SERVER['HTTP_USER_AGENT'];
        
    $host = "fdb19.biz.nf";
    $user = "2674802_root";
    $pass = "anmol@2604";
    $db = "2674802_root";
    $conn = new mysqli($host, $user, $pass,$db);
    $sql = "INSERT INTO visitor_details (ip,current_page,time,user_agent) VALUES ('$ip','$page','$datetime','$useragent')";

    if ($conn->query($sql) === TRUE) {
        echo "";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }    
    ?>
    <br><br><br>
<div class="name animated slideInLeft">
<?php echo $_GET["name"]; ?>
</div>
<div class="by animated zoomIn delay-1s">
  wishes you
</div>
<div class="wish animated bounceIn delay-2s">
<span class="anmol">Happy</span> <span class="anmol">Diwali</span>
</div>
<br><br>
<div class="message">
  <span>आपको </span><span>एवं </span><span>आपके </span><span>परिवार </span><span>को </span><span><?php echo $_GET["name"]; ?> </span><span>की </span><span>ओर</span><span> से </span><span>दिवाली </span><span>की </span><span>हार्दिक </span><span>शुभकामनाएं</span>

</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<img src="./image/diya.gif" height="60px" class="" >
<br><br>
<div class="whatsapp" >
  <div ng-app="">
<i class="flaticon-happiness" ></i>
<input type="text" ng-model="nme" placeholder="Enter Your Name..."><i class="flaticon-attachment" ></i>
<i class="flaticon-photo-camera" ></i>

<a href="https://api.whatsapp.com/send?text=http://happyfest.c1.biz/?name={{nme}}"   class="flaticon-right-arrow" ></a>
</div>

</div>
<div class="abc" >
<div class="" data-aos="fade-right">
  <img src="./image/ramsita.png" class="go-right" height="270px"  >
  </div>
  <div class="go-left text-larger" data-aos="zoom-out"> दीप जलते जगमगाते रहे,<br>
  हम आपको आप हमें याद आते रहे,<br>
  जब तक ज़िन्दगी है, दुआ है हमारी<br>
  आप यूँ ही दिये की तरह जगमगाते रहे...</div>

</div>
<div class="def" >

<div class="" data-aos="fade-right">
<img src="./image/oridiya.png" class="go-right" height="70px" >
</div>
  <div class="go-left text-larger" data-aos="fade-left"> May this Diwali bring in u the
  most brightest and choicest
  happiness and love you have ever
  Wished for</div>
</div>
<div class="ghi" >

<div class="" data-aos="fade-up">
<img src="./image/crackerhd.png" class="go-right animated slideInRight" height="270px" >
</div>

  <div class="go-left text-larger" data-aos="fade-down"> आपको आशीर्वाद मिले गणेश से विद्या मिले
  सरस्वती से दौलत मिले लक्ष्मी से प्यार मिले
  सब से दिवाली के अवसर पर यही दुआ है।
  दिल से हैप्पी दिवाली</div>
 </div>
 <div class="def" >

 <div class="" data-aos="zoom-in">
 <img src="./image/flame-diya.png" class="" height="210px" width="310px" >
 </div>
 <div class="go-center" data-aos="zoom-in">Enter Your Name and Hit Send button</div>
 </div>
</body>
</html>
