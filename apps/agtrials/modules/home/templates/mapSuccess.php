<?php
$connection = Doctrine_Manager::getInstance()->connection();
$QUERY00 = "SELECT T.id_trial,CR.crpname,TL.trlclatitude,TL.trlclongitude ";
$QUERY00 .= "FROM tb_trial T INNER JOIN tb_trialinfo TI ON T.id_trial = TI.id_trial ";
$QUERY00 .= "INNER JOIN tb_crop CR ON TI.id_crop = CR.id_crop ";
$QUERY00 .= "INNER JOIN tb_triallocation TL ON T.id_triallocation = TL.id_triallocation ";
$QUERY00 .= "WHERE TL.trlclatitude IS NOT NULL AND TL.trlclongitude IS NOT NULL";
$st = $connection->execute($QUERY00);
$Resultado00 = $st->fetchAll();
$a = 0;
$puntos = "";
foreach ($Resultado00 AS $fila) {
    $id_trial = $fila['id_trial'];
    $Crop = $fila['crpname'];
    $latitud = $fila['trlclatitude'];
    $longitud = $fila['trlclongitude'];

    $Desc_punto = "<b>Crop:</b> $Crop<br>";
    $Desc_punto .= "<br><img width='16' height='16' src='/images/lens-icon.png'><A HREF=\"#\" onClick=\"wopen({$id_trial})\"> More information</A>";
    $puntos['info'][$a] = array('title' => "$Crop", 'context' => $Desc_punto, 'lat' => $latitud, 'log' => $longitud);
    $a++;
}
$maps = json_encode($puntos);
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <link rel="shortcut icon" href="/images/favicon.ico" />
        <meta http-equiv="content-type" content="text/html" />
        <meta name="title" content="The Global Agricultural Trial Repository - CGIAR - CCAFS - CIAT" />
        <meta name="description" content="The Global Agricultural Trial Repository" />
        <meta name="keywords" content="Trial, Site, Bibliography, CGIAR, CCAFS, CIAT, Crop, Technology, Variety/Race, Variables measured" />
        <meta name="language" content="en" />
        <meta name="robots" content="index, follow" />
        <title>The Global Agricultural Trial Repository - CGIAR - CCAFS - CIAT</title>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQ3AuoynudzyBkbJ6uTVbC3PdQDObXjfc"></script>
        <script type="text/javascript" src="/GoogleMapsV3/GoogleMapsV3-Map.js"></script>
        <script type="text/javascript" src="/GoogleMapsV3/GoogleMapsV3-MarkerClusterer.js"></script>
        <script type="text/javascript" src="/GoogleMapsV3/GoogleMapsV3-MarkerManager.js"></script>
        <script type="text/javascript">
            function wopen(trial) {
                window.open("/trial/" + trial, "_blank");
            }
        </script>
        <script type="text/javascript" >var markers = <?php echo $maps; ?></script>
    </head>
    <div class="Mapa">
        <input type="hidden" id="mgr-cb" name="mgr-cb" />
        <input type="hidden" id="mc-cb" name="mc-cb" checked/>
        <div id="map" style="width:100%; height:100%; text-align: center;">Loading Map...</div>
    </div>    
</html>