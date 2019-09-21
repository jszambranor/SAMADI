//Creado con Ardora - www.webardora.net
//bajo licencia Attribution-NonCommercial-NoDerivatives 4.0 International (CC BY-NC-ND 4.0)
//para otros usos contacte con el autor
var timeAct=360; timeIni=360; timeBon=0;
var successes=0; successesMax=4; attempts=0; attemptsMax=3;
var score=0; scoreMax=4; scoreInc=1; scoreDec=1
var typeGame=0;
var tiTime=true;
var tiTimeType=0;
var tiButtonTime=true;
var textButtonTime="Comenzar";
var tiSuccesses=true;
var tiAttempts=true;
var tiScore=true;
var startTime;
var colorBack="#FFFDFD"; colorButton="#91962F"; colorText="#000000"; colorSele="#FF8000";
var goURLNext=false; goURLRepeat=false;tiAval=false;
var scoOk=0; scoWrong=0; scoOkDo=0; scoWrongDo=0; scoMessage=""; scoPtos=10;
var fMenssage="Verdana, Geneva, sans-serif";
var fActi="Verdana, Geneva, sans-serif";
var fEnun="Verdana, Geneva, sans-serif";
var timeOnMessage=5; messageOk="Lo lograste!"; messageTime=""; messageError="Lo lamento"; messageErrorG="Lo lamento"; messageAttempts="Lo intentaste mucho"; isShowMessage=false;
var urlOk=""; urlTime=""; urlError=""; urlAttempts="";
var goURLOk="_blank"; goURLTime="_blank"; goURLAttempts="_blank"; goURLError="_blank"; 
borderOk="#008000"; borderTime="#FF0000";borderError="#FF0000"; borderAttempts="#FF0000";
var wordsGame="ZWplbXA"; wordsStr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
function giveZindex(typeElement){var valueZindex=0; capas=document.getElementsByTagName(typeElement);
for (i=0;i<capas.length;i++){if (parseInt($(capas[i]).css("z-index"),10)>valueZindex){valueZindex=parseInt($(capas[i]).css("z-index"),10);}}return valueZindex;}
var cL=["<p>perro</p>","<p>hombre</p>","<p>gato</p>","<p>mujer</p>"];
var iL=["","","",""];
var order=["","","",""]; orderR=["","","",""];indexR=0; indexL=0;
var cR=["","","",""]; ansRL=["Mg","MQ","MA","Mw"];
var iR=["<div  align='center'><img src='ejemp_resources/media/gato.jpg'></div>","<div  align='center'><img src='ejemp_resources/media/hombre.jpg'></div>","<div  align='center'><img src='ejemp_resources/media/perro.jpg'></div>","<div  align='center'><img src='ejemp_resources/media/mujer.jpg'></div>"];
var auR=[3,2,1,4];
