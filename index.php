<?php
require_once('ZzZ/zzz.main.php');
require_once('ZzZ/zzz.functions.php');
?><html><head><title>Heroes</title>
<meta http-equiv="cache-control" content="no-cache">
<?php
//iGAME//iGAME//iGAME//iGAME//iGAME//iGAME//iGAME
?>
<script src="jquery.js"></script>
<script type="text/javascript">
var TableBackgroundNormalColor = "#000000";
var TableBackgroundMouseoverColor = "#FFFFFF";

function changetilecolors(row,tiles,col,cola) {
row.style.backgroundColor = TableBackgroundMouseoverColor;

var tilesarray = tiles.toString();
console.log(tilesarray.match(/.{1,3}/g));
var arrayLength = tilesarray.length;
for (var i = 0; i < arrayLength; i++) {
	if (tilesarray[(i+1)]) {
		var tile = ("gb" + tilesarray[i] + tilesarray[(i+1)]);
		document.getElementById(tile).style.backgroundColor = TableBackgroundNormalColor;
		document.getElementById(tile).style.color = TableBackgroundMouseoverColor;
		i++;
	}
}


}

function restoretilecolors(row,tiles,col,cola) {
row.style.backgroundColor = TableBackgroundNormalColor;

var tilesarray = tiles.toString();
console.log(tilesarray.match(/.{1,3}/g));
var arrayLength = tilesarray.length;
for (var i = 0; i < arrayLength; i++) {
	if (tilesarray[(i+1)]) {
		var tile = ("gb" + tilesarray[i] + tilesarray[(i+1)]);
		document.getElementById(tile).style.backgroundColor = '#'+col;
		document.getElementById(tile).style.color = '#'+cola;
		i++;
	}
}

}

</script>
<?php
//iGAME//iGAME//iGAME//iGAME//iGAME//iGAME//iGAME
?>
<style>
body{
color:#ffffff;
background-color:#000000;
font-family:Arial,Tahoma,Verdana;
}

a {
color:#FFF888;
text-decoration:none;
font-size:18px;
}

a:hover{
color:#ffffff;
font-size:18px;
  -webkit-animation: fade 5s 0.1s infinite;
          animation: fade 5s 0.1s infinite;
}

th,.th,#th {
border:1px #456789 solid;
margin:1px;
background-color:#012345;
padding-left:1px;
padding-right:1px;
color:#FFFFFF;
}

div.floater {
position:fixed;
z-index:100;
width:100%;
height:200%
left: 0;
top: 8%;
opacity:0.8;
max-height: 55em;
overflow-y: scroll;
}

div.chats {
position:fixed;
z-index:100;
width:100%;
height:100%
left: 0;
top: 0%;
opacity:0.8;
color:#456789;
}

div.bottom-menu {
position:fixed;
z-index:100;
width:100%;
left: 0;
bottom: 0;
background: #000000;
opacity:0.95;
}

div.right-menu {
position:fixed;
z-index:100;
right: 0;
top: 1%;
background: #000000;
opacity:0.95;
}

div.warning {
position:fixed;
z-index:100;
left: 0;
top: 33%;
opacity:0.75;
margin:0px;
border:0px;
font-size: 20px;
color: #FFFFFF;
text-align: left;
-webkit-animation: glow 1s ease-in-out infinite alternate;
-moz-animation: glow 1s ease-in-out infinite alternate;
animation: glow 1s ease-in-out infinite alternate;
}
div.silentlink {
position:fixed;
z-index:100;
right: 10;
bottom: 10;
opacity:0.75;
margin:0px;
border:0px;
font-size: 12px;
color: #FFFFFF;
text-align: center;
}

.menuitem{
border:1px #ff0000 solid; background-color:#333333; padding-left:3px; padding-right:3px; color:#FFFFFF;margin:1px;
}
.menuitem:hover{ background-color:#000000; }

.menuitemb{
border:1px #ff0000 solid; background-color:#333333; padding-left:3px; padding-right:3px; width:100;color:#FFFFFF;margin:1px;
}
.menuitemb:hover{ background-color:#000000; }

.buildings{
border:1px #ff0000 solid; background-color:#333333; padding-left:3px; padding-right:3px; color:#FFFFFF;margin:1px;font-size: 18px;
}
.buildings:hover{ background-color:#000000; }

.actionitems{
border:1px #FFF000 solid; background-color:#333333; padding-left:3px; padding-right:3px; color:#FFFFFF;margin:1px;
}
.actionitems:hover{ background-color:#000000; }

.actionitemsfeed{
border:1px #FFF000 solid; background-color:#333333; padding-left:3px; padding-right:3px; color:#FFFFFF;margin:1px;width:100%;
}

#button, input {
background-color:#000000;
color:#000000;
text-decoration:none;
}

#button:hover, input {
color:#ffffff;
}

.glow {
margin:0px;
border:0px;
font-size: 50px;
color: #000;
text-align: center;
-webkit-animation: glow 1s ease-in-out infinite alternate;
-moz-animation: glow 1s ease-in-out infinite alternate;
animation: glow 1s ease-in-out infinite alternate;
}

@-webkit-keyframes glow {
from {
text-shadow: 0 0 10px #000000, 0 0 20px #123456, 0 0 30px #000000, 0 0 40px #123456, 0 0 50px #000000, 0 0 60px #123456, 0 0 70px #000000;
}
to {
text-shadow: 0 0 20px #fff888, 0 0 30px #000000, 0 0 40px #fff888, 0 0 50px #000000, 0 0 60px #fff888, 0 0 70px #000000, 0 0 80px #fff888;
}
}

.dropdown {
position: relative;
display: inline-block;
}

.dropdown-content {
display: none;
position: absolute;
background-color: #456789;
min-width: 250px;
box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
padding: 5px 5px;
z-index: 1;
opacity:0.88;
border:1px #FFF888 solid;
}

.dropdown-contents {
display: block;
position: absolute;
background-color: #456789;
min-width: 250px;
box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
padding: 5px 5px;
z-index: 1;
opacity:0.88;
border:1px #FFF888 solid;
}


.dropdown:hover .dropdown-content {
display: block;
}




#blocks {
width: 80%;
}
#blocks ul {
list-style: none;
margin: 1;
padding: 1;
line-height: 1;
display: block;
}
#blocks ul:after {
content: " ";
display: block;
font-size: 0;
height: 0;
clear: both;
visibility: hidden;
}
#blocks ul li {
display: inline-block;
padding: 0;
margin: 3;
}
#blocks.align-right ul li {
float: right;
}
#blocks.align-center ul {
text-align: center;
}
#blocks ul li a {
color: #FFF888;
text-decoration: none;
display: block;
padding: 10px 15px;

font-weight: 700;
text-transform: uppercase;
font-size: 14px;
position: relative;
-webkit-transition: color .25s;
-moz-transition: color .25s;
-ms-transition: color .25s;
-o-transition: color .25s;
transition: color .25s;
}
#blocks ul li a:hover {
color: #123456;
}
#blocks ul li a:hover:before {
width: 100%;
}
#blocks ul li a:after {
content: "";
display: block;
position: absolute;
right: -3px;
top: 19px;
height: 6px;
width: 6px;
background: #fff333;
opacity: .8;
}
#blocks ul li a:before {
content: "";
display: block;
position: absolute;
left: 0;
bottom: 0;
height: 3px;
width: 0;
background: #8d101a;
-webkit-transition: width .25s;
-moz-transition: width .25s;
-ms-transition: width .25s;
-o-transition: width .25s;
transition: width .25s;
}
#blocks ul li.last > a:after,
#blocks ul li:last-child > a:after {
display: none;
}
#blocks ul li.active a {
color: #8d101a;
}
#blocks ul li.active a:before {
width: 100%;
}
#blocks.align-right li.last > a:after,
#blocks.align-right li:last-child > a:after {
display: block;
}
#blocks.align-right li:first-child a:after {
display: none;
}
@media screen and (max-width: 300px) {
#blocks ul li {
float: none;
display: block;
}
#blocks ul li a {
idth: 100%;
-moz-box-sizing: border-box;
-webkit-box-sizing: border-box;
box-sizing: border-box;
border-bottom: 1px solid #fb998c;
}
#blocks ul li.last > a,
#blocks ul li:last-child > a {
border: 0;
}
#blocks ul li a:after {
display: none;
}
#blocks ul li a:before {
display: none;
}
}
    
<?php
//IGAME//IGAME//IGAME//IGAME//IGAME//IGAME//IGAME//IGAME//IGAME//IGAME//IGAME//IGAME//IGAME//IGAME//IGAME
foreach ($diamond_colors as $key=>$val) {
print '.'.$key.' {width: 50px; height: 50px; background-color:#'.$val[0].';color:#'.$val[1].';}';

}

foreach ($diamond_colors as $key=>$val) {
print '#'.$key.' {background-color:#'.$val[0].';color:#'.$val[1].';}';

}
?>

#moveable, #shuffle{
border:1px #FFF000 solid;
font-weight: bold;
width:50;
height:50;
}

#moveable:hover{
border:1px #000000 solid;
font-weight: bold;
background-color:#FFFFFF;
color:#000000;
}

div.floating-anouncement {
	position:fixed;
	z-index:100;
	width:100%;
	left: 0;
	top: 200px;
	background: #000000;
	opacity:0.9;
	}
<?php
//IGAME//IGAME//IGAME//IGAME//IGAME//IGAME//IGAME//IGAME//IGAME//IGAME//IGAME//IGAME//IGAME//IGAME//IGAME
?>

</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
//////////////////////////////////////////////
function loaded(str) {
if (str.length == 0) {
document.getElementById("inc").innerHTML = "";
return;
} else {
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
document.getElementById("inc").innerHTML = this.responseText;
}
};
xmlhttp.open("GET", "loaded.php?o=1&q=" + str, true);
xmlhttp.send();
}

if (document.getElementById(str)) {
document.getElementById(str).value = parseFloat(document.getElementById(str).value) + 1;
}
}

//////////////////////////////////////////////
setInterval(chats, 1000);
function chats() {
  $.ajax({
    url: 'chats.php?o=1&q=chats',
    type: 'GET',
    dataType: 'html',
    success: function(data) {
      $('#chats').html(data); // data came back ok, so display it
    },
    error: function() {
      $('#chats').prepend('Error retrieving new messages..');
    }
  });
}
//////////////////////////////////////////////
$(function () {

  $('form').on('submit', function (e) {

    e.preventDefault();

    $.ajax({
      type: 'post',
      url: 'chats.php?q=chats',
      data: $('form').serialize(),
      success: function () {

      }
    });

  });

});
//////////////////////////////////////////////

</script>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
<?php

print '<div class="chats"><span id="chats">';
doubleup(100,50,2,500);
print '</span></div><center>';

//MENU BOTTOM BUTTONS//teams pets
$files = array(

//'sign-out-alt'=>'logout'
); 
print '<div class="bottom-menu"><table><tr><td>';

foreach ($files as $key=>$val) {
	print (strlen($val) >= 1?'<button class="menuitemb" value="'.$val.'" onmousedown="loaded(this.value)"><i class="fas fa-'.$key.'" style="font-size:16px;color:yellow"></i> '.strtoupper($val).'</button> ':'');
}
print '</td></tr></table></div>';
//MENU BOTTOM BUTTONS
?>
<center><div class="floater">
<span id="inc">
<!--
03-09-2005 06:16 launched
12-1-2006 16:34 lol.net
4/19/2016 3:07:44 PM last updated version
2/22/2019 2:47:43 AM FINAL MODIFIED VERSION!
-->
<br><br>
<br><br>
<button value="play" onmousedown="loaded(this.value)" class=glow id=button>Heroes</button>
<br><br>
<br><br>
A browser text based heroe game
<br><br>
Quick start click Heroes and then click Pets to get 15 free heroes and pets!
<br>
Auto click or macro mouse is recommended.<br>
Something like Corsair Scimitar Pro <a href="https://amzn.to/35giuUd" target="_BLANK">new model</a>
<a href="https://amzn.to/2W8ecKA" target="_BLANK">old model</a> <br>
<br>
<br>
<br>
<form method=post><input type=password name=account placeholder=account class="menuitemb"><input type=password name=password placeholder=password class="menuitemb"><input type=submit class="menuitemb" onmousedown="loaded(this.value + '&u=' +account.value + '&p=' + password.value)" value=login></form>
</span></div>


<div class="right-menu"><form>
<input type="text" name="chat" class="menuitemb" placeholder="chat here" id="chat" value="" size=8 maxlength="125"><br>
<input type="submit" name="submit" class="menuitemb" value="send">
</form>
<?php
//MENU RIGHT BUTTONS//pets items gems

foreach ($filesb as $key=>$val) {
	print (strlen($val) >= 1?'<button class="menuitemb" value="'.$val.'" onmousedown="loaded(this.value)"><i class="fas fa-'.$key.'" style="font-size:16px;color:yellow"></i> <span class="describe" id="describe">'.strtoupper($val).'</span></button>':'');
    print '<br>';
}

?></div><div class="silentlink"><a href="/" alt="thesilent.com for other games" tittle="thesilent.com for other games"><br>beta<br><i class="fas fa-volume-mute"></i></a> <a href="https://twitter.com/adminSilenT" alt="twitter" tittle="twitter"><i class="fab fa-twitter"></i></a> <div id="zzt1">00:00:01</div></div>
</center>
<script>
function counter(docid,inner){

var t = document.getElementById(docid).innerHTML;

var tm=t.split("\:");
h=tm[0];
m=tm[1];
s=tm[2];

if (inner == 1) {
ss=s+(m*60)+(h*3600);

if (h>=1 && m<=0 && s<=0){
	h--;
	m=60;
}

if (m>=1 && s<=0){
	m--;
	s=60;
}

ss--;
s--;
}

if (inner == 2) {

ss=s+(m*60)+(h*3600);

if (m>=59){
	h++;
	m=0;
}

if (s>=59){
	m++;
	s=-1;
}

ss++;
s++;
}

h=""+h+"";
m=""+m+"";
s=""+s+"";

if(h.length<2 && h<10){h="0"+h;}
if(m.length<2 && m<10){m="0"+m;}
if(s.length<2 || s<10){s="0"+s;}

if (ss > 1) {
	document.getElementById(docid).innerHTML=h+":"+m+":"+s;
	setTimeout("counter(\""+docid+"\",\""+inner+"\")",999);
} else {
	document.getElementById(docid).innerHTML="00:00:00";
}

}

function scandoc(){
var pref="xxt";
for(i=1;i<=100;++i){
		var pid=pref+i;
		if (document.getElementById(pid)){
			counter(pid,1);
		}
}

var pref="zzt";
for(i=1;i<=100;++i){
		var pid=pref+i;
		if (document.getElementById(pid)){
			counter(pid,2);
		}
}
}

scandoc();
</script>
</body></html>