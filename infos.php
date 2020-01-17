	<html lang="en">
	<head>
		<title>informations</title>
        <link rel="icon" href="images/1.png"  />
		<link rel="stylesheet" type="text/css" href="https://openlayers.org/en/master/css/ol.css"/>
        <link rel="stylesheet" type="text/css" href="https://openlayers.org/en/v3.20.1/css/ol.css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
		<script src="https://openlayers.org/en/v3.20.1/build/ol.js"></script>
		<script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://openlayers.org/en/master/build/ol.js"></script>
        <style>
            table {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            table td, table th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            table tr:nth-child(even){background-color: #f2f2f2;}

            table tr:hover {background-color: #ddd;}

            table th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
            }
        </style>
	</head>
	<body>
    <?php
include "connexion.php";


$id = $_GET['idd'];$source = $_GET['sr'];
if ($source==1){
	$sqll = "SELECT chemin,ecoles.nom as nomecole,ecoles.siteweb,types.nom as nomtype,villes.nom as vil,adresse,tel,fax,infos,lambda,phi FROM ecoles,types,villes,images WHERE ecoles.img = images.img_id and ville=villes.id and typeEtablissement=types.id and ecoles.id=$id";

	$reqq = requette($sqll);
	$ecoles = mysqli_fetch_assoc( $reqq );
	$site=$ecoles['siteweb'];$nom =$ecoles['nomecole'];$nomtype =$ecoles['nomtype'];$ville = $ecoles['vil'];
	$chemin = $ecoles['chemin'];
	$adresse = $ecoles['adresse'];$tel = $ecoles['tel'];$fax = $ecoles['fax'];$info = $ecoles['infos'];
	$E = $ecoles['lambda'];$N = $ecoles['phi'];
    $nom =utf8_encode($nom);
	$nomtype =utf8_encode($nomtype);$adresse = utf8_encode($adresse);$ville = utf8_encode($ville);
	$site=utf8_encode($site);
	$info = utf8_encode($info);


	$sql0 = "SELECT DISTINCT nom FROM dformecoless,dformations WHERE idforma=dformations.id and idecole1=$id";
	$req = requette($sql0);


	$sql2 = "SELECT DISTINCT nom FROM admecoles,admission WHERE idadmis=admission.id and idecole=$id";
	$req2 = requette($sql2);


	$sql3 = "SELECT DISTINCT id,intitule FROM formations WHERE ecoleoffert=$id";
	$req3 = requette($sql3);


	echo "
    <div class='map' id='map'>
        <div id='popup'></div>
    </div>
<div class='photo'>
    <div class='logo'>
        <img alt='nodata' class='logo1' src=$chemin />
    </div>
    <div class='nom'>
        <h1>$nom</h1>
    </div>
</div>
<div class='infos'>
    <table>
        <tr aria-disabled='true'>
            <td >Nom de l’école</td>
            <td>$nom </td>
        </tr>
        <tr aria-disabled='true'>
            <td >Type de l’école</td>
            <td>$nomtype </td>
        </tr>
        <tr aria-disabled='true'>
            <td >Filières :</td>
            <td><ul>";
	while ( $domaines = mysqli_fetch_assoc( $req ) )
	{
		$dm = utf8_encode($domaines['nom']);
            	echo "
						  <li>$dm</li>
						";
	} echo "</ul></td>
        </tr>
        <tr aria-disabled='true'>
            <td >Admission (Accès):</td>
            <td><ul>";
	while ( $ads = mysqli_fetch_assoc( $req2 ) )
	{
		$ads =utf8_encode($ads['nom']);
		echo "
				  <li>$ads</li>
				";
	}
	echo "</ul> </td>
        </tr>
        <tr aria-disabled='true'>
            <td >Ville(s) :</td>
            <td>$ville </td>
        </tr>
        <tr aria-disabled='true'>
            <td >Adresse :</td>
            <td>$adresse </td>
        </tr>
        <tr aria-disabled='true'>
            <td >Tél :</td>
            <td>$tel </td>
        </tr>
        <tr aria-disabled='true'>
            <td >Fax :</td>
            <td>$fax </td>
        </tr>
        <tr aria-disabled='true'>
            <td >Site web :</td>
            <td>$site </td>
        </tr>
        <tr aria-disabled='true'>
            <td >Informations supplémentaires :</td>
            <td>$info </td>
        </tr>
        <tr aria-disabled='true'>
            <td >Formations disponibles :</td>
            <td><ul>";
	while ( $formations = mysqli_fetch_assoc( $req3 ) )
	{
		$dm = utf8_encode($formations['intitule']);$line = $formations['id'];
            	echo "<li><a href='infos.php?sr=2&idd=$line'>$dm</a></li>";
	} echo "</ul> </td>
        </tr>
    </table>
</div>";
}
else
{
	$sqll = "SELECT lambda,phi,chemin,formations.*,admission.nom as nomadmission,dformations.nom as nomformation,ecoles.nom as nomecole,types.nom as nomtype,typesdiplomes.nom as diplome,villes.nom as city FROM images,formations,admission,dformations,ecoles,types,typesdiplomes,villes where formations.img=images.img_id and admisformation=admission.id and domaineformation=dformations.id and ecoleoffert=ecoles.id and typeformation=types.id and typediplome=typesdiplomes.id and ecoles.ville=villes.id and formations.id=$id";

	$reqq = requette($sqll);
	$resultat = mysqli_fetch_assoc( $reqq );
	$nom =$resultat['intitule'];$admis = $resultat['nomadmission'];$domaine =$resultat['nomformation'];$ecoffert = $resultat['nomecole'];
	$nomtype =$resultat['nomtype'];$diplome = $resultat['diplome'];$ville = $resultat['city'];
	$site=$resultat['lien'];$ide= $resultat['ecoleoffert'];$idf=$resultat['id'];
	$info = $resultat['infos'];$E = $resultat['lambda'];$N = $resultat['phi'];
	$chemine = $resultat['chemin'];
	$nom =utf8_encode($nom);$admis = utf8_encode($admis);$domaine =utf8_encode($domaine);$ecoffert = utf8_encode($ecoffert);
	$nomtype =utf8_encode($nomtype);$diplome = utf8_encode($diplome);$ville = utf8_encode($ville);
	$site=utf8_encode($site);
	$info = utf8_encode($info);

	echo "
    <div class='map' id='map'>
        <div id='popup'></div>
    </div>
<div class='photo'>
    <div class='logo'>
        <img alt='nodata' class='logo1' src=$chemine />
    </div>
    <div class='nom'>
        <h1>$nom</h1>
    </div>
</div>
<div class='infos'>
    <table >
        <tr aria-disabled='true'>
            <td >Intitulé de la formation</td>
            <td>$nom </td>
        </tr>
        <tr aria-disabled='true'>
            <td >Type de la formation</td>
            <td>$nomtype </td>
        </tr>
        <tr aria-disabled='true'>
            <td >domaine de la Formation</td>
            <td> $domaine </td>
        </tr>
        <tr aria-disabled='true'>
            <td >Admission (Accès):</td>
            <td>$admis </td>
        </tr>
        <tr aria-disabled='true'>
            <td >Ville :</td>
            <td>$ville </td>
        </tr>
        <tr aria-disabled='true'>
            <td >Type de diplome</td>
            <td>$diplome </td>
        </tr>
        <tr aria-disabled='true'>
            <td >Site web :</td>
            <td>$site </td>
        </tr>
        <tr aria-disabled='true'>
            <td >Informations supplémentaires :</td>
            <td>$info </td>
        </tr>
        <tr aria-disabled='true'>
            <td >Ecole offert</td>
            <td><form action='infos.php'><a href='infos.php?sr=1&idd=$ide' >$ecoffert</a> </form></td>
        </tr>
    </table>
</div>";
}

?>
<script>
    lambda=<?php echo $N; ?>;phi=<?php echo $E; ?>;
    var iconFeature = new ol.Feature({
        geometry: new ol.geom.Point(ol.proj.transform([lambda,phi ], "EPSG:4326", "EPSG:3857")),
        name: '<?php echo $nom; ?>'
    });

    var iconStyle = new ol.style.Style({
        image: new ol.style.Icon(/** @type {olx.style.IconOptions}  */({
            anchor: [0.5, 46],
            anchorXUnits: 'fraction',
            anchorYUnits: 'pixels',
            src: 'https://openlayers.org/en/v3.20.1/examples/data/icon.png'
        }))
    });

    iconFeature.setStyle(iconStyle);

    var vectorSource = new ol.source.Vector({
        features: [iconFeature]
    });

    var vectorLayer = new ol.layer.Vector({
        source: vectorSource
    });
    var map = new ol.Map({
        target: "map",
        layers: [
            new ol.layer.Tile({
                source: new ol.source.OSM()
            }), vectorLayer],
        view: new ol.View({
            center: ol.proj.transform([lambda,phi ], "EPSG:4326", "EPSG:3857"),
            zoom: 17
        })
    });
    var element = document.getElementById('popup');

    var popup = new ol.Overlay({
        element: element,
        positioning: 'bottom-center',
        stopEvent: false,
        offset: [0, -50]
    });
    map.addOverlay(popup);

    // display popup on click
    map.on('click', function(evt) {
        var feature = map.forEachFeatureAtPixel(evt.pixel,
            function(feature) {
                return feature;
            });
        if (feature) {
            var coordinates = feature.getGeometry().getCoordinates();
            popup.setPosition(coordinates);
            $(element).popover({
                'placement': 'top',
                'html': true,
                'content': feature.get('name')
            });
            $(element).popover('show');
        } else {
            $(element).popover('destroy');
        }
    });

    // change mouse cursor when over marker
    map.on('pointermove', function(e) {
        if (e.dragging) {
            $(element).popover('destroy');
            return;
        }
        var pixel = map.getEventPixel(e.originalEvent);
        var hit = map.hasFeatureAtPixel(pixel);
    });
    map.addControl(new ol.control.ScaleLine());
    map.addControl(new ol.control.OverviewMap());
    map.addControl(new ol.control.MousePosition({coordinateFormat: ol.coordinate.createStringXY(4),projection: "EPSG:4326"}));
    map.addControl(new ol.control.FullScreen());
    map.addControl(new ol.control.ZoomToExtent());
    map.addControl(new ol.control.ZoomSlider());


</script>


	</body>
	</html>