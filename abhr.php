<?php 

/* GET stuff... */
$weed = $_GET['req'] ?? '';
$type = $_GET['type'] ?? '';
$id = $_GET['id'] ?? '';
$format = $_GET['f'] ?? '';

/* random shitt */
switch ($weed) {
   case "help": 
   echo '
   Understanding how [abhp] API works.

   For those who are smart: This project
   does NOT utilize POST requests. It is essential
   for Host. This project has no "server list" to
   maintain the status of Hosts. Just remember that
   this is an anonymous project.

   help - Shows this page;
   avatarhelp - Help page regarding avatars;
   asset [requires stuff in next order: type,id,f]:
     type - Asset type. There are currently next type of assets:
      - face [formats: 2]
      - tshirt [formats: 2]
      - shirt [formats: 2]
      - pants [formats: 2]
      - hat [formats: 1,2]
      - tool [formats: 1,2]
      - head [formats: 1]
      - torso [formats: 1]
      - larm [formats: 1]
      - rarm [formats: 1]
      - lleg [formats: 1]
      - rleg [formats: 1]
      - decal [formats: 2]
      - sound [formats: 3]
      - mesh [formats: 1,2]
      - script [formats: 4]

     f - Asset format. There are currently 4 asset formats:
      - Mesh: 1 [.obj]
      - Image: 2 [.png]
      - Sound: 3 [.wav]
      - Script: 4 [.gml]
   ';
   break;
   case "avatarhelp":
   echo"
   Since this project does not provide any 'default' avatars,
   here's how you can implement it via your Brick Hill Revival:

   Network packet #1, also known as Auth is responsible for sending
   initial stuff to Host (unique key, client version) whereas later 
   Host would send client's network id and amount of bricks within 
   the set.

   So, what if you'll send the avatar information instead of Host
   doing all the work?

   Let's see how avatar information should be sent theoretically.
   Host receieves your avatar information in a simple, divided by
   commas array which consists of:

   - Head Color       [
   - Torso Color           such things are
   - Right Arm Color       recieved via HEX format (ffffff),
   - Left Arm Color        other stuff is sent via id format.
   - Right Leg Color       
   - Left Leg Color                                           ]

   - Face
   - TShirt
   - Shirt
   - Pants

   - Hat1
   - Hat2
   - Hat3

   Which in total, result into this example which client will send to host: 
   |fffbce,00ff00,fffbce,fffbce,ffff00,ffff00|,|0,1,0,0,|2,0,0|
             [avatar colors]                      [2d]   [3d]

   for virto!2017L support, it is required to add Hat4, Hat5 [after hat1-3 values]
   and Packages:
   
   - Head
   - Left Arm
   - Right Arm
   - Torso
   - Left Leg
   - Right Leg

   Which in total would result this example:
   |fffbce,00ff00,fffbce,fffbce,ffff00,ffff00|,|0,1,0,0|,|2,0,0,0,0|,|3,0,0,4,0,0|
            [avatar colors]                      [2d]       [3d]      [packages]

   Best way you can send your own avatar information is to send 
   it via the Auth packet, like down below:

   [start of auth packet]
   - Unique key [string]
   - Client version [string]
   - Avatar information array [string]
   [end]

   ";
   break;

   case "asset":
     $file = "";
     $additions = "";

     switch ($type) {
	case "hat":
	$file = $_SERVER['DOCUMENT_ROOT']."/assets/hat/";
        break;
	case "face":
	$file = $_SERVER['DOCUMENT_ROOT']."/assets/face/";
        break;
	case "shirt":
	$file = $_SERVER['DOCUMENT_ROOT']."/assets/shirt/";
        break;
	case "tshirt":
	$file = $_SERVER['DOCUMENT_ROOT']."/assets/tshirt/";
        break;
	case "pants":
	$file = $_SERVER['DOCUMENT_ROOT']."/assets/pants/";
        break;
	case "tool":
	$file = $_SERVER['DOCUMENT_ROOT']."/assets/tool/";
        break;
	case "head":
	$file = $_SERVER['DOCUMENT_ROOT']."/assets/head/";
        break;
	case "torso":
	$file = $_SERVER['DOCUMENT_ROOT']."/assets/torso/";
        break;
	case "larm":
	$file = $_SERVER['DOCUMENT_ROOT']."/assets/larm/";
        break;
	case "rarm":
	$file = $_SERVER['DOCUMENT_ROOT']."/assets/rarm/";
        break;
	case "lleg":
	$file = $_SERVER['DOCUMENT_ROOT']."/assets/lleg/";
        break;
	case "rleg":
	$file = $_SERVER['DOCUMENT_ROOT']."/assets/rleg/";
        break;
	case "decal":
	$file = $_SERVER['DOCUMENT_ROOT']."/assets/decal/";
        break;
	case "sound":
	$file = $_SERVER['DOCUMENT_ROOT']."/assets/sound/";
        break;
	case "mesh":
	$file = $_SERVER['DOCUMENT_ROOT']."/assets/mesh/";
        break;
	case "script":
	$file = $_SERVER['DOCUMENT_ROOT']."/assets/script/";
        break;
     }
 
     switch($format){
        case 1:
	$additions = $id.".obj";
        include($file.$additions);
	die();
        break;
        case 2:
        header('Content-type: image/png');
	$additions = $id.".png";
        $im = imageCreateFromPng($file.$additions);
        imagealphablending( $im, false );
        imagesavealpha( $im, true );
        imagepng($im);
        imagedestroy($im);
        break;
        case 3:
	$additions = $id.".mp3"; 
	$wholething = $file.$additions;
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($wholething).'"');
        readfile($wholething);
        break;
        case 4:
	$additions = $id.".gml";
        include($file.$additions);
        die();
        break;
     }
   break;

}

?>

<head>
<title>[abhp]</title>
</head>

<body>

   ╔═             b      h               ═╗
   ║              b      h                ║
   ║         a    b      h                ║
   ║     aaaaa    bbbb   hhhh    ppppp    ║
   ║    a    a    b   b  h   h   p   p    ║
   ║    a    a    b   b  h   h   p   p    ║
   ╚═    aaaa aa  bbbb   h   h   pppp    ═╝
                                 p
                                 p

        Anonymous Brick Hill Project,
                  by denny.

   ╔ WHY DOES IT MATTER.
   ║  We all hate Sandbox Community by obvious reasons.
   ║  I don't want myself to associate with this terrible
   ║  community anymore and this is the last project I am
   ║  working on.
   ║
   ║  We hate the corporation design. We hate the "old roblox"
   ║  slop going towards ourselves. We hate freaks who don't care
   ║  about the community safety.
   ║
   ║  Remember who you are. You're free. Free from deciding what's
   ║  right and wrong [maybe even morally]. You're a man.
   ║
   ║  Freedom unites. Creativity brings the light. 
   ║  Technology brings the evolution.
   ║
   ║  We cannot wait until VERTEXIA finally introduces packages
   ║  when in August 2025 people already got what they wanted.
   ║
   ║  We cannot wait until some person will make a Roblox Revival
   ║  better than Roblox itself. It's all on us. We should start
   ║  doing it now.
   ║
   ║  Disgrace the ones with the corporation will. Disgrace the
   ║  people who tend to ruin lifes. Disgrace propaganda.
   ╚

   ╔ "Is this public?"
   ║  This is NOT a public but more of an experimental project about
   ║  making freedom as it is, with no rules.
   ╚

   ╔ TECHNICAL OVERVIEW
   ║  Believe it or not, but the page you see right now is the whole
   ║  project. It is enough for you to download this file, get some
   ║  webserver with PHP support and you're ready to go.
   ║
   ║  Everything Legacy 2017 client needs is there. No need to send
   ║  requests to database, no vulnerabilities which would cause
   ║  wreckage and insane misunderstatement within the database.
   ║  
   ║  Assets are uploaded manually, by the webserver owner (you).
   ║  It's up to you to decide whether some asset could be hosted
   ║  and which assets should be not hosted at all. Of course you
   ║  can hire people you trust, but that's up to you only.
   ║
   ║  Assets are stored within the "assets" folder, categorized.
   ║   This means, that you'll have to make categorized folders
   ║   within the assets folder. Example:
   ║      [ - assets          
   ║         - faces        Besides this example, the client
   ║          * 1.png       also should recieve assets via
   ║         - tshirts      such folders.
   ║          * 2.png      
   ║         + shirts       
   ║         + pants        
   ║         + hats         
   ║         + tools        
   ║         + etc.  ]      
   ╚

   ╔ DESIGN WEIRDNESS.
   ║  This project was meant to be simple.
   ║  As much "simple" as possible.
   ║  Everything you see is readable to you.
   ║  No matter what design you'll put on this,
   ║  it will be simple.
   ║
   ║  ASCII Art is not dead by itself.
   ║  You could have seen this in game crack
   ║  descriptions, leaks, etc.
   ║
   ║  This is a way to show off your art.
   ║  Art can be anything. Your life, the
   ║  landscapes of your town. This is the
   ║  light you really love to see.
   ║
   ║  Creativity comes through different methods.
   ║  I am bad at painting. Bad at making music but
   ║  I can probably make anyone wonder how my code
   ║  even works... hehe.
   ║
   ║  Either way, I mean that showing off what you've
   ║  done does not need its beautiful cover. It is
   ║  enough to make a man with good coding expertise
   ║  happy over technical solutions you've done through
   ║  the long time. It is enough for an artist to make
   ║  happy over your art. Some of them may look terrible. 
   ║  But this is your experience. I still use Windows 
   ║  default application Notepad to write this text, though 
   ║  other people use Nano, Vim, Vi or Emacs on their Linux
   ║  distrubutives.
   ║
   ║  I love stuff being simple without overwhelming it with
   ║  "AI". You might love this too. Though it's useful, I also
   ║  don't care about syntax highlighting. You'd also love to
   ║  use auto-completion feature but I don't really care about it.
   ║
   ║  I am responsible for the most stuff I make. I hate hipocrisy
   ║  and people who keep lying instead of simply telling the truth.
   ║
   ║  This site might be janky to you, maybe not even up to your
   ║  standarts but it's fine. It is made by a man with enough
   ║  experience in his own hobby.
   ╚


</body>

<style>
* {
    font-family: monospace;
    white-space: pre;
}
</style>
