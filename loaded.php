<?php
#!/usr/local/bin/php


/*
precheck cookie autologin or autosignup

functions:
cookie check/ip check /device check

game design:
autofight system

heroes
element race class
items
gems
charms
max capped unless endeless levelup with same hero
ascend
unlimited ascend with 1 another max level capped

max 5 star heroes capped per 100 players
troops

change tile color

level ascend evolve

trphies cant go down win3 per win 1 equal

*/
require_once('ZzZ/zzz.main.php');
require_once('ZzZ/zzz.functions.php');
require_once('ZzZ/zzz.heroes.php');
require_once('ZzZ/zzz.pets.php');

//LOGOUT
if(isset($_REQUEST['q']) && !empty($_REQUEST['q']) && $_REQUEST['q'] == 'logout') {
setcookie('cookie','',time()-100+$main['cookie_time']);
unset($_COOKIE['cookie']);
$_COOKIE['cookie']='';
}
//LOGOUT
//LOGIN
$password='';
if(isset($_REQUEST['q']) && !empty($_REQUEST['q']) && preg_match("/^login/",$_REQUEST['q']) && isset($_REQUEST['u']) && !empty($_REQUEST['u'])) {
$cookie_hash = cc($_REQUEST['u']);
setcookie('cookie',$cookie_hash,time()+$main['cookie_time']);
$_COOKIE['cookie']=$cookie_hash;
if (isset($_REQUEST['p']) && !empty($_REQUEST['p'])) {
$password=pass_hash($_REQUEST['p'],10);
//print 'c7b721aa ['.$password.']';
}
//print '['.$cookie_hash.']';
}
//LOGIN
//_______________-=TheSilenT.CoM=-_________________

//PASSWORD CHECK
if (isset($password) && isset($cookie_hash)) {
$query = "SELECT * FROM `".$main['tbl_members']."` WHERE `account` = '$cookie_hash' ORDER by `id` DESC LIMIT 1";
if ($result = mysqli_query($link, $query)) {
if (mysqli_num_rows($result) >= 1) {
if ($row = mysqli_fetch_object($result)) {
	if ($row->password == $password) {
		$cookie_hash = $row->account;
	}else{
		$cookie_hash='';
		setcookie('cookie','',time()-100+$main['cookie_time']);
	}
	mysqli_free_result($result);
}
}else{
		$cookie_hash='';
		setcookie('cookie','',time()-100+$main['cookie_time']);
}
}
}

//PFSL PRINT STATS

$row = PFSL($stats=0);


/*
$skippy = array('id', 'username', 'password', 'name', 'province', 'town', 'cookie', 'timer');
                        //MAP,RAID,TITAN,WAR,SUMMON,

$max_timer_values[0] += ($row->level/5);
$max_timer_values[1] += ($row->level/10);
$max_timer_values[2] += ($row->level/15);
$max_timer_values[3] += ($row->level/25);
$max_timer_values[4] += ($row->level/50);

//LEVELUP PLAYER
$nextlev = doubleup(100,$row->level,2,1000);
$nextlevp = ($row->exp/$nextlev)*100;
if ($row->exp >= $nextlev) {
    $umquery = "UPDATE `".$main['tbl_members']."` SET `level`=`level`+1,`land`=`land`+1 WHERE `id`='$row->id' LIMIT 1";
    if (mysqli_query($link, $umquery)) {}else{print  '1005'.mysqli_error($link);}
print '<div class=warning>LEVELUP!!!</div>';
}
print '<table><tr><td>';
$xxt=1;
foreach ($row as $key=>$val) {
    //if ($key == 'world energy'){ print '</td><tr><tr><td>';}

	if (!in_array($key,$skippy)) {
        if ($key == 'map') {
    print '<button id=".$key." class="th">'.$key.'<br>'.floor(timetable(time()-$row->map,$main['map_time'],$max_timer_values[0],'map',$row)).' '.number_format(((time()-$row->map)/$main['map_time'])*100/$max_timer_values[0]).'%'.
    '<br><sup id="xxt'.$xxt.'">'.clockit(($max_timer_values[0]*$main['map_time'])-(time()-$row->map)).'</sup></button>';$xxt++;
        }elseif ($key == 'raid') {
    print '<button id=".$key." class="th">'.$key.'<br>'.floor(timetable(time()-$row->raid,$main['raid_time'],$max_timer_values[1],'raid',$row)).' '.number_format(((time()-$row->raid)/$main['raid_time'])*100/$max_timer_values[1]).'%'.
    '<br><sup id="xxt'.$xxt.'">'.clockit(($max_timer_values[1]*$main['raid_time'])-(time()-$row->raid)).'</sup></button>';$xxt++;
        }elseif ($key == 'titan') {
    print '<button id=".$key." class="th">'.$key.'<br>'.floor(timetable(time()-$row->titan,$main['titan_time'],$max_timer_values[2],'titan',$row)).' '.number_format(((time()-$row->titan)/$main['titan_time'])*100/$max_timer_values[2]).'%'.
    '<br><sup id="xxt'.$xxt.'">'.clockit(($max_timer_values[2]*$main['titan_time'])-(time()-$row->titan)).'</sup></button>';$xxt++;
        }elseif ($key == 'war') {
    print '<button id=".$key." class="th">'.$key.'<br>'.floor(timetable(time()-$row->war,$main['war_time'],$max_timer_values[3],'war',$row)).' '.number_format(((time()-$row->war)/$main['war_time'])*100/$max_timer_values[3]).'%'.
    '<br><sup id="xxt'.$xxt.'">'.clockit(($max_timer_values[3]*$main['war_time'])-(time()-$row->war)).'</sup></button>';$xxt++;
        }elseif ($key == 'summon') {
    print '<button id=".$key." class="th">'.$key.'<br>'.floor(timetable(time()-$row->summon,$main['summon_time'],$max_timer_values[4],'summon',$row)).' '.number_format(((time()-$row->summon)/$main['summon_time'])*100/$max_timer_values[4]).'%'.
    '<br><sup id="xxt'.$xxt.'">'.clockit(($max_timer_values[4]*$main['summon_time'])-(time()-$row->summon)).'</sup></button>';$xxt++;
            //(time()-$row->summon)
        }elseif ($key == 'level') {
    print ($val >= 1?'<button id=".$key." class="th">'.$key.'<br>'.(is_numeric($val)?number_format($val):$val).' '.number_format($nextlevp,2).'%</button>':'');
        }elseif ($key == 'exp' || $key == 'credits' || $key == 'evolve' || $key == 'ascension') {
    print ($val >= 1?'<button id=".$key." class="th">'.$key.'<br>'.(is_numeric($val)?number_format($val):$val).'</button>':'');
        }else{
	print '<button id=".$key." class="th">'.$key.'<br>'.(is_numeric($val)?number_format($val):$val).'</button>';
        }
	}
}
print '</td></tr></table>';
//PFSL PRINT STATS
*/

//ACTIONS//ACTIONS//ACTIONS//ACTIONS//ACTIONS//ACTIONS//ACTIONS//ACTIONS//ACTIONS//ACTIONS
//CHATSCHATSCHATSCHATSCHATSCHATSCHATSCHATSCHATSCHATSC
if(isset($_REQUEST['q']) && $_REQUEST['q'] == 'chats') {
	chats($row);
}
//CHATSCHATSCHATSCHATSCHATSCHATSCHATSCHATSCHATSCHATSC
//BASEBASEBASEBASEBASEBASEBASEBASEBASEBASEBASEBASEBASE
if(isset($_REQUEST['q']) && $_REQUEST['q'] == 'base') {
	base($row,'base');
print ($row->level <=10?'Build quarries first to build more buildings.':'');
}
//BASEBASEBASEBASEBASEBASEBASEBASEBASEBASEBASEBASEBASE
if(isset($_REQUEST['q']) && $_REQUEST['q'] == 'heroes') {
	heroes($row,'heroes');
print ($row->level <=10?'Heroes ascend and evolve and after everything maxed. <br>Heroes can continue level up if feeding the same heroes only one random stats is leveled.':'');
}
//MAPMAPMAPMAP//MAPMAPMAPMAP//MAPMAPMAPMAP//MAPMAPMAPMAP//MAPMAPMAPMAP
if(isset($_REQUEST['q']) && $_REQUEST['q'] == 'map') {
    if (timetable(time()-$row->map,$main['map_time'],$max_timer_values[0],'map',$row) >= 1) {
    map($row,'map');
    }else{
        print '<div class=warning>next map available in '.number_format(($main['map_time']-(time()-$row->map))/3600,2).' hours</div>';
    }
print ($row->level <=10?'<br>Start at 1-1 win to progress.':'');
}
//MAPMAPMAPMAP//MAPMAPMAPMAP//MAPMAPMAPMAP//MAPMAPMAPMAP//MAPMAPMAPMAP
//RAID//RAID//RAID//RAID//RAID//RAID//RAID//RAID//RAID//RAID
if(isset($_REQUEST['q']) && $_REQUEST['q'] == 'raid') {
    if (timetable(time()-$row->raid,$main['raid_time'],$max_timer_values[1],'raid',$row) >= 1) {
if ($row->food >= 50) {
    $umquery = "UPDATE `".$main['tbl_members']."` SET `food`=`food`-50 WHERE `id`='$row->id' LIMIT 1";
    if (mysqli_query($link, $umquery)) {}else{print  '1004'.mysqli_error($link);}
    raid($row,'raid');
    
}else{
    print '<div class=warning>Require 50 food for raid roll.</div>';
}
    }else{
        print '<div class=warning>next raid available in '.number_format(($main['raid_time']-(time()-$row->raid))/3600,2).' hours</div>';
    }
print ($row->level <=10?'<br>Win raids to win rewards.':'');
}
//RAID//RAID//RAID//RAID//RAID//RAID//RAID//RAID//RAID//RAID
if(isset($_REQUEST['q']) && $_REQUEST['q'] == 'rankings') {
    rankings();
}
//TITAN//TITAN//TITAN//TITAN//TITAN//TITAN//TITAN//TITAN//TITAN
if(isset($_REQUEST['q']) && $_REQUEST['q'] == 'titan') {
 if (timetable(time()-$row->titan,$main['titan_time'],$max_timer_values[2],'titan',$row) >= 1) {
    titan($row,'titan');
 }else{
     print '<div class=warning>next titan available in '.number_format(($main['titan_time']-(time()-$row->titan))/3600,2).' hours</div>';

 }

//DAMAGE TITAN//DAMAGE TITAN//DAMAGE TITAN//DAMAGE TITAN//DAMAGE TITAN
print '<p>Top 10 titan damages<br>';
$tquery = "SELECT * FROM `".$main['tbl_titans_damage']."` WHERE `damage` ORDER BY `damage` DESC LIMIT 10";
	if ($tresult = mysqli_query($link, $tquery)) {
	if (mysqli_num_rows($tresult) >= 1) {
    while ($trow = mysqli_fetch_object($tresult)) {
        print number_format($trow->damage).' ';
    }
    }
    }
print '</p>';
//TITAN STATUS AND REWARD//TITAN STATUS AND REWARD//TITAN STATUS AND REWARD
print ($row->level <=10?'Top 10 damage dealers get rewards.':'');
}

//ACTIONS//ACTIONS//ACTIONS//ACTIONS//ACTIONS//ACTIONS//ACTIONS//ACTIONS//ACTIONS//ACTIONS
//SUMMON HEROES//SUMMON HEROES//SUMMON HEROES//SUMMON HEROES//SUMMON HEROES
if(isset($_REQUEST['q']) && $_REQUEST['q'] == 'summon heroes') {
    //print timetable(time()-$row->summon,$main['summon_time'],3,'summon');
    if (timetable(time()-$row->summon,$main['summon_time'],$max_timer_values[4],'summon',$row) >= 1) {
insert_heroes($row,'summon heroes',1);
        //print time().' '.$row->summon.' '.$main['summon_time'];
    $umquery = "UPDATE `".$main['tbl_members']."` SET `summon`=`summon`+".$main['summon_time']." WHERE `id`='$row->id' LIMIT 1";
    if (mysqli_query($link, $umquery)) {}else{print  '1004'.mysqli_error($link);}
    }else{
        print '<div class=warning>next summon available in '.number_format(($main['summon_time']-(time()-$row->summon))/3600,2).' hours</div>';
    }
}
//SUMMON PETS//SUMMON PETS//SUMMON PETS//SUMMON PETS//SUMMON PETS
if(isset($_REQUEST['q']) && $_REQUEST['q'] == 'summon pets') {
    //print timetable(time()-$row->summon,$main['summon_time'],3,'summon');
    if (timetable(time()-$row->summon,$main['summon_time'],$max_timer_values[4],'summon',$row) >= 1) {
insert_pets($row,'summon pets',1);
        //print time().' '.$row->summon.' '.$main['summon_time'];
    $umquery = "UPDATE `".$main['tbl_members']."` SET `summon`=`summon`+".$main['summon_time']." WHERE `id`='$row->id' LIMIT 1";
    if (mysqli_query($link, $umquery)) {}else{print  '1004'.mysqli_error($link);}
    }else{
        print '<div class=warning>next summon available in '.number_format(($main['summon_time']-(time()-$row->summon))/3600,2).' hours</div>';
    }
}
//HELP//HELP//HELP//HELP//HELP//HELP//HELP//HELP//HELP//HELP//HELP
if(isset($_REQUEST['q']) && $_REQUEST['q'] == 'help') {
    help($row,'help');
}
//PETS//PETS//PETS//PETS//PETS//PETS//PETS//PETS//PETS//PETS//PETS//PETS
if(isset($_REQUEST['q']) && $_REQUEST['q'] == 'pets') {
    pets($row,'pets');
    print ($row->level <=10?'Your strongest pet helps your in battle!':'');
}
//SHOP//SHOP//SHOP//SHOP//SHOP//SHOP//SHOP//SHOP//SHOP//SHOP//SHOP
if(isset($_REQUEST['q']) && $_REQUEST['q'] == 'shop') {
    shop($row,'shop');
    print ($row->level <=10?'Shop till you drop!':'');
}
//SETTINGS//SETTINGS//SETTINGS//SETTINGS//SETTINGS//SETTINGS//SETTINGS
if(isset($_REQUEST['q'])) {
	if ($_REQUEST['q'] == 'settings' || preg_match("/^change settings/",$_REQUEST['q'])) {
    settings($row,'settings');
  }
}
//LADDER//LADDER//LADDER//LADDER//LADDER//LADDER//LADDER//LADDER//LADDER
if(isset($_REQUEST['q']) && $_REQUEST['q'] == 'ladders') {
    ladder($row,'ladders');
}
//GAME//GAME//GAME//GAME//GAME//GAME//GAME//GAME//GAME//GAME
if(isset($_REQUEST['q']) && $_REQUEST['q'] == 'game') {
		if (timetable(time()-$row->war,$main['war_time'],$max_timer_values[4],'war',$row) >= 1) {
    	game($row,'game');
    }else{
        print '<div class=warning>next game available in '.number_format(($main['war_time']-(time()-$row->war))/3600,2).' hours</div>';
    }
}
//insert_heroes($row,'summon heroes',1);
//SUMMON HEROES//SUMMON HEROES//SUMMON HEROES//SUMMON HEROES//SUMMON HEROES
//DEBUGDEBUGDEBUGDEBUGDEBUGDEBUGDEBUGDEBUGDEBUGDEBUGDEBUGDEBUGDEBUGDEBUGDEBUGDEBUGDEBUGDEBUGDEBUG
//wtf($_COOKIE);
wtf($_REQUEST);
//wtf($_SERVER);
//DEBUGDEBUGDEBUGDEBUGDEBUGDEBUGDEBUGDEBUGDEBUGDEBUGDEBUGDEBUGDEBUGDEBUGDEBUGDEBUGDEBUGDEBUGDEBUG
//_______________-=TheSilenT.CoM=-_________________


/*
    $umquery = "UPDATE `".$main['tbl_members']."` SET `titan`=`titan`-".$main['titan_time']." WHERE `id`='$row->id' LIMIT 1";
    if (mysqli_query($link, $umquery)) {}else{print  '1004'.mysqli_error($link);}

    $umquery = "UPDATE `".$main['tbl_members']."` SET `raid`=`raid`-".$main['raid_time']." WHERE `id`='$row->id' LIMIT 1";
    if (mysqli_query($link, $umquery)) {}else{print  '1004'.mysqli_error($link);}

    $umquery = "UPDATE `".$main['tbl_members']."` SET `summon`=`summon`-".$main['summon_time']." WHERE `id`='$row->id' LIMIT 1";
    if (mysqli_query($link, $umquery)) {}else{print  '1004'.mysqli_error($link);}

    $umquery = "UPDATE `".$main['tbl_members']."` SET `map`=`map`-".$main['summon_time']*$max_timer_values[0]." WHERE `id`='$row->id' LIMIT 1";
    if (mysqli_query($link, $umquery)) {}else{print  '1004'.mysqli_error($link);}

    $umquery = "UPDATE `".$main['tbl_members']."` SET `war`=`war`-".$main['war_time']*$max_timer_values[4]." WHERE `id`='$row->id' LIMIT 1";
    if (mysqli_query($link, $umquery)) {}else{print  '1004'.mysqli_error($link);}
*/
?>