<!DOCTYPE html>
<!-- <html manifest="minhex.appcache"> -->
<html lang="it">

<head>
    <title>MinHex</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta name="Description" content="MinHex is spin-off of the old glory Mines, made with an hexagonal lattice instead. With modern UI made with Snap.svg"> -->
    <meta name="Description" content="MinHex è una rivisitazione della vecchia gloria 'Campo Minato'/'Prato Fiorito', fatto sul reticolo esagonale. Creato con Snap.svg e una moderna esperienza utente.">
    <meta name="keywords" content="HTML,CSS,JavaScript,Snap.Svg,Game,Mines,JS,Prato fiorito,Campo minato,bombe,arcade,videogame,opensource,freesoftware,GPL">
    <meta name="author" content="Nunzio e Diego Turtulici">

    <!-- JS external Libraries  -->
    <script src="js/snap.svg.min.js"></script>

    <!-- for IE support sorry... -->
    <script src="js/es6-promise.auto.min.js"></script>
    <script src="js/sweetalert2.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/sweetalert2.min.css">
    
    <!-- MinHex style -->
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="css/style.min.css">

    <!-- Mobile Specifics -->
    <link rel="manifest" href="manifest.json">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="true"/>
    <meta name="MobileOptimized" content="320"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5 maximum-scale=1.0">

    <!-- Colors and bars -->
    <!-- Chrome, Firefox OS and Opera -->
    <!-- <meta name="theme-color" content="#1B0D09"> -->
    <meta name="theme-color" content="#140906">

    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#140906">

    <!-- Apple bar specific -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <!-- Favicon -->
    <link rel="icon" href="img/favicon72.png" type="image/x-icon">
    <link rel="shortcut icon" href="#">

    <link rel="icon" sizes="114x114" href="img/favicon114.png" type="image/x-icon">
    <link rel="icon" sizes="72x72" href="img/favicon72.png" type="image/x-icon">
    <link rel="icon" sizes="144x144" href="img/favicon144.png" type="image/x-icon">
    <link rel="icon" sizes="256x256" href="img/favicon256.png" type="image/x-icon">

    <!-- Apple favicon -->
    <link rel="apple-touch-icon" sizes="114x114" href="img/favicon114.png" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="72x72" href="img/favicon72.png" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="144x144" href="img/favicon144.png" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="256x256" href="img/favicon256.png" type="image/x-icon">


    <script src="js/minhex.min.js" defer></script>
    <!-- <script src='js/minhex.js' defer></script> -->
    <script src="js/minhex_ui.min.js" defer></script>
    <!-- <script src="js/minhex_ui.js" defer></script> -->

    <!-- font -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet" defer> -->
</head>

<body>
    <div id="grad">
        <img id="scroll_hint" src="img/menu/hint.png" />
    </div>

    <ol class="menu left">
        <!-- <li><a class="menu btn" target="_blank" href="hof/"><span>Classifica</span><img src="css/img/menu_itm_hof.png"></span></a></li>
        <li><a class="menu btn" href="#" onclick="refreshNewGame();"><span>Rigioca</span><img src="css/img/menu_itm_rematch.png"></span></a></li> -->
        <li><a class="menu btn modal" href="#HT1"><span>Aiuto</span><img src="css/img/menu_itm_help.png"></span></a></li>
        <li><a class="menu btn modal" href="#credits"><span>Credits</span><img src="css/img/menu_itm_info.png"></span></a></li>
    </ol>

    <ol class="menu right">
        <li><a class="menu btn" target="_blank" href="hof/"><img src="css/img/menu_itm_hof.png"><span>Classifica</span></a></li>
        <li><a class="menu btn" href="#" onclick="refreshNewGame();"><img src="css/img/menu_itm_rematch.png"><span>Rigioca</span></a></li>
        <!-- <li><a class="menu btn modal" href="#HT1"><span>Aiuto</span><img src="css/img/menu_itm_help.png"></span></a></li>
        <li><a class="menu btn modal" href="#credits"><span>Credits</span><img src="css/img/menu_itm_info.png"></span></a></li> -->
    </ol>
    
    <div class="label score" id="score_box">        
        <h2 id="Score"></h2>
        <h4 data-label="Punti"></h4>
    </div>
    
    <div class="label bombs" id="bombs_box">
        <h2 id="Bombs"></h2>
        <h4 data-label="Bombe"></h4>
    </div>
    
    <!-- <h2 id="rematch" class="nodisplay" onclick="refreshNewGame();" onmouseover=""></h2> -->
    <!-- <h2 id="RemainingBombs" class="nodisplay" onmouseover="showRematch();" onclick="showRematch();"></h2> -->

    <svg id="field" height="90%" width="95%"></svg>

    <svg id="menu" height="95%" width="100%"></svg>


    <!-- <a class="button modal HowTo open" href="#HT1">MinHex</a> -->
    
    <!-- <a class="button hof nodisplay" id="hofLink" href="hof/">Hall of Fame</a> -->


    <div id="howtos" class="modal container hidden">
        <a class="button modal close closeHowTo" href="#close">chiudi</a>

        <div id="credits" class="HowTo modal panel hidden">
            <h1>Credits</h1>
            <p>Questa versione in JavaScript nasce nel 2016 dalla collaborazione di Nunzio e Diego Turtulici. Ma il gioco originale fu scritto in Python (con Pygame) già qualche tempo prima. Dopo essere stato così tanto in cantiere, la quarantena ha permesso - finalmente - di fargli vedere migliore luce con grafiche rinnovate, punteggio, classifica ed una migliore esperienza utente.
                <br>Il gioco è rilasciato sotto licenza: <a href="https://www.gnu.org/licenses/agpl-3.0.en.html">AGPLv3</a>.
                <br><br>
                hosting: <a href="https://eigenlab.org">eigenLab</a> @ <a href="https://flowin.space">FlowIn.Space</a>
                <a class="btn modal button" href="https://github.com/NuxTuxSux/MinHex">Guarda il codice!</a>
            </p>
        </div>

        <!-- <div id="HT3" class="HowTo modal panel hidden">
            <img src="img/howto/rethex.png" alt="reticolo esagonale" />
            <h1>Perché?</h1>
            <p>Il nome MinHex viene dalla contrazione di <b><a href="#">Mines</a></b> ed <b>Hexagonal</b>. Le celle sono infatti disposte a formare il cosiddetto <a target="_blank" href="https://en.wikipedia.org/wiki/Hexagonal_lattice">reticolo esagonale</a>. Famosissimo in natura e agli uomini per proprietà di parsimonia nell'ingombro dello spazio, godendo - tra le altre - della proprietà di garantire la più "densa" disposizione di oggetti rotondi. Esso emerge infatti negli alveari e viene utilizzato da tempo immemore nella disposizione di oggetti di ogni natura, dalle arance a <i>celle</i> di atomi di carbonio.<br> Tale reticolo ha inoltre interessantissime proprietà matematiche e nella fattispecie anche algebriche, realizzando tra l'altro il più stretto analogo dei numeri interi nel campo dei <a target="_blank" href="https://it.wikipedia.org/wiki/Numero_complesso">numeri complessi</a>. In tale contesto ogni punto di contatto tra le celle triangolari è un numero complesso e l'insieme di questi punti-numeri prende il nome di <a target="_blank" href="https://it.wikipedia.org/wiki/Intero_di_Gauss">Interi di Gauss</a>.
                <a class="button modal" href="#close">Gioca!</a>
                <br><br>
            </p>
        </div> -->
        
        <div id="HT2" class="HowTo modal panel hidden">
            <img src="img/howto/neighbours.png" alt="vicini" />
            <h1>Come si gioca?</h1>
            <p>In questo campo minato ogni cella confina con altre 12. Cliccandone una (che non nasconda una bomba!) vi appariranno dei numeri che vi indicheranno le bombe in quell'intorno. Se pensate che una cella nasconda una bomba, segnalatela con una bandierina (pulsante destro o <i>tap</i> prolungato). Una volta esplorato tutto il campo se avrete disposto correttamente le bandierine sarete salvi e voi e i vostri compagni potrete attraversare il campo indenni, altrimenti...KABOOOM!
                <br><br>
                <!-- <a class="button modal" href="#HT3">Vuoi saperne di più?</a> -->
                <a class="button modal" href="#close">Gioca!</a>
            </p>
        </div>
        
        <div id="HT1" class="HowTo modal panel hidden">
            <img src="img/howto/logo.png" alt="MinHex logo" />
            <h1>Cos'è MinHex?</h1>
            <p>MinHex è un campo minato in cui avete l'obbiettivo di sopravvivere spianando la strada per i vostri compagni. Siete stati catapultati su di un campo minato suddiviso in celle di forma triangolare e disposte secondo il reticolo esagonale. Il primo passo che farete sarà un passo sicuro, ma poi vi converrà prestare attenzione, già il secondo potrebbe essere il vostro ultimo!
                <br><br>
                <a class="button modal" href="#HT2">Come si gioca?</a>
            </p>
        </div>

        <!-- <div id="grad_ht"></div> -->
    </div>

<?php
    date_default_timezone_set('Europe/Rome');
    $now = date('Y/m/d H:i:s');

    // using the same hof file, using different sections, obvsly
    $json = file_get_contents('hof/data.json');
    $data = json_decode($json, true);
    
    // pushes in the head of the list the $now timestamp
    array_unshift($data["timestamps"], $now);
    // adds one hit counter
    $data["hits"] += 1;

    
    // adding and writing to file
    $added = json_encode($data);
    file_put_contents('hof/data.json', $added);
?>

</body>

</html>
