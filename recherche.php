<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Résultats de la Recherche</title>
    <link rel="icon" href="images/1.png"  />
    <link rel="stylesheet" href="css/style.css">
    <style>
        #informations_generales {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #informations_generales td, #informations_generales th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #informations_generales tr:nth-child(even){background-color: #f2f2f2;}

        #informations_generales tr:hover {background-color: #ddd;}

        #informations_generales th {
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
include 'connexion.php';
$page = get_current_page();
$limite = 5;
function genere_sql($tab,$wtm,$champs)
{
    $sqlr = "SELECT distinct SQL_CALC_FOUND_ROWS ".$wtm;
    $i    = 0;
    foreach ( $tab as $mot )
    {
        $mot = strtoupper( $mot );
        $mot = addslashes( $mot );
        if ( $i == 0 ) {
            $sqlr .= " WHERE ";
        } else {
            $sqlr .= " AND ";
        }
        $sqlr .= "UPPER(".$champs.") like '%$mot%'";
        $i ++;
    }
    return $sqlr;
}
function navigation_pages($currentpage,$totalpages){
    $range = 2;$link = $_SERVER['REQUEST_URI'];
    $links  = explode( "&page=".$currentpage, $link );
    $link = $links[0].$links[1];
    echo " <a id='page1' class='button1' href='$link&page=1'><<</a> ";
    $prevpage = $currentpage - 1;
    echo " <a id='avant' class='button1' href='$link&page=$prevpage'><</a> ";

    for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
        if (($x > 0) && ($x <= $totalpages)) {
            if ($x == $currentpage) {
                echo "<div id='actual' class='button1'> [<b>$x</b>]</div> ";
            } else {
                echo " <a class='button1' href='$link&page=$x'>$x</a> ";
            }
        }
    }
    $nextpage = $currentpage + 1;
    echo " <a id='apres' class='button1' href='$link&page=$nextpage'>></a> ";
    echo " <a id='fin' class='button1' href='$link&page=$totalpages'>>></a> ";

    if ($currentpage == 1) {
        echo "
            <script>
                document.getElementById('page1').style.visibility ='hidden';
                document.getElementById('avant').style.visibility ='hidden';
            </script>";
    }
    if ($currentpage == $totalpages) {
        echo "
            <script>
                document.getElementById('apres').style.visibility ='hidden';
                document.getElementById('fin').style.visibility ='hidden';
            </script>";
    }
    if ($totalpages == 1) {
        echo "
            <script>
                document.getElementById('actual').style.visibility ='hidden';
            </script>";
    }

}
function nombre_de_pages_($pages_count,$query){
    $result = requette($query);
    $r = mysqli_num_rows($result);
    $nbr = ceil($r / $pages_count);
    echo "<div style='position: center'>
<h2 >nombre de resultats est : <span style='color:darkolivegreen;font-weight:bold'>$r</span></h2> 
</div> ";
    echo " 
<h2 >pages : <span style='color:darkolivegreen;font-weight:bold'>$nbr</span></h2> ";
    return $nbr;
}
function get_current_page(){
    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
        $currentpage = (int) $_GET['page'];
    } else {
        $currentpage = 1;
    }
    return $currentpage;
}
function contenue($nombreDePages,$query1,$tab,$values_and_attributues)
{
    if ( $nombreDePages == 0 )
    {
        echo "<h1>Pas de resultat!</h1><br>";
        echo "
            <script>
                document.getElementById('page1').style.visibility ='hidden';
                document.getElementById('avant').style.visibility ='hidden';
            </script>";
    }
    else
    {
        list($val1,$val2,$val3,$val4,$val5,$att1,$att2,$att3,$att4,$source) = $values_and_attributues;
        echo "<form action='infos.php' method='post'>
                    <table id='informations_generales'>
                        <th >$att1</th>
                        <th >$att2</th>
                        <th >$att3</th>
                        <th >$att4</th>";
        if ($source==2){echo "<th >Ecole</th>";}
        while ( $d  = mysqli_fetch_assoc($query1))
        {
            $identifiant =$d[$val1];$c = $d[$val2];$site_web =$d[$val3];$utf8_inf = utf8_encode($d[$val4] );$logo_img = $d[$val5];
            $c = utf8_encode($c);
            foreach ( $tab as $mot ) {
                $c = str_ireplace( $mot, '<span class="surlign1">'.$mot. '</span>', $c );
            }
            echo "<tr style='height: 100px'>
                <td>{$c }</td>
				<td><div><img alt='no data' src= '$logo_img' style='height: 150px'/></div></td>
                <td><input type='button' class='sitecole' OnClick=\"window.open('{$site_web}')\" value='$site_web'></td>
                <td><p>{$utf8_inf }</p> </td>";
            if ($source==2){$idd = $d['ecoleoffert'];echo "<td><button style='vertical-align:middle'><span style='color: white;'><a href='infos.php?sr=1&idd=$idd'>{$d['nom']}</a></span></button></td>";}
            echo "
   <td><button style='vertical-align:middle'><span style='color: white;'><a href='infos.php?sr=$source&idd=$identifiant'>plus d'informations ?</a></span></button></td>";
            echo "</tr>";
        }
        echo "</table></form>";
    }
}
$sqlr = "";
$values_and_attributues_ecoles = array('id', 'nom','siteweb','infos','chemin','Nom','Logo','Site Web','Informations','1');
$values_and_attributues_formations = array('id','intitule','lien','infos','pathe','Intitule','Logo','Site Web','Informations','2');
$values_and_attributues = array();
$table_vide = array();

if ( isset( $_GET["eq"] ) ) {
    $word = $_GET['eq'];
    $table_vide  = explode( " ", $word );
    $sqlr = genere_sql($table_vide,' id,infos,siteweb,nom,chemin FROM ecoles,images ','nom');
    $sqlr .=" and ecoles.img = images.img_id ";

    $values_and_attributues = $values_and_attributues_ecoles;
}
elseif ( isset($_GET["ecolerecherche"])  )  {
    $sqlr = "SELECT distinct SQL_CALC_FOUND_ROWS idecole as id ,infos, siteweb,nom,chemin FROM ecoles,admecoles,dformecoless,diplomationecoles,images where ecoles.img = images.img_id and ecoles.id = idecole AND ecoles.id = idecole1 AND ecoles.id = ecole";

    $typeEtablissement = $_GET['typeEtablissement'] ;if ($typeEtablissement!=1){$sqlr.=" AND typeEtablissement=".$typeEtablissement;}
    $villeecole = $_GET['ville-ecole'] ;if ($villeecole!=1){$sqlr.=" AND ville=".$villeecole;}
    $typeDiplome = $_GET['typeDiplome'] ;if ($typeDiplome!=1){$sqlr.=" AND typediplome=".$typeDiplome;}
    $accessecole = $_GET['acces-ecole'] ;if ($accessecole!=1){$sqlr.=" AND idadmis=".$accessecole;}
    $domaineFormation = $_GET['domaineFormation'] ;if ($domaineFormation!=1){$sqlr.=" AND idforma=".$domaineFormation;}

    $values_and_attributues= $values_and_attributues_ecoles;
}
elseif (isset($_GET["ef"])   ) {
    $word = $_GET['ef'];
    $table_vide  = explode( " ", $word );
    $sqlr = genere_sql($table_vide,
        ' formations.infos,lien,intitule,ecoleoffert,formations.id,nom,
        images.chemin as pathe FROM formations,ecoles,images','intitule');
    $sqlr.=' and ecoleoffert=ecoles.id and formations.img = images.img_id';
    $values_and_attributues = $values_and_attributues_formations;

}
elseif ( isset($_GET["formationrecherche"] )  ) {
    $sqlr = "SELECT distinct SQL_CALC_FOUND_ROWS formations.infos,lien,intitule,ecoleoffert,formations.id,
                        nom,images.chemin as pathe FROM formations,ecoles,images where
                                    ecoleoffert=ecoles.id and formations.img = images.img_id";

    $typeFormation = $_GET['typeFormation'] ;if ($typeFormation!=1){$sqlr.=" AND typeformation=".$typeFormation;}
    $typeDiplomeff = $_GET['typeDiplomeff'] ;if ($typeDiplomeff!=1){$sqlr.=" AND typediplome=".$typeDiplomeff;}
    $accessformation = $_GET['acces-formation'] ;if ($accessformation!=1){$sqlr.=" AND admisformation=".$accessformation;}
    $domaineFormationff = $_GET['domaineFormationff'] ;if ($domaineFormationff!=1){$sqlr.=" AND domaineformation=".$domaineFormationff;}
    $villeformation = $_GET['ville-formation'] ;if ($villeformation!=1){$sqlr.=" AND ville=".$villeformation;}

    $values_and_attributues = $values_and_attributues_formations;

}
else
{
    $sqlr = "SELECT distinct SQL_CALC_FOUND_ROWS idecole as id ,infos, siteweb,nom,chemin
FROM ecoles,admecoles,dformecoless,diplomationecoles, images where ecoles.img = images.img_id and ecoles.id = idecole 
        AND ecoles.id = idecole1 AND ecoles.id = ecole";

    $values_and_attributues = $values_and_attributues_ecoles;

}

$nombreDePages = nombre_de_pages_($limite,$sqlr);
if ($page < 1) {
    $page = 1;
}
if ($page > $nombreDePages) {
    $page = $nombreDePages;
}
$debut = ($page - 1) * $limite;
if ($debut < 0) {
    $debut = 0;
}
$sqlr.="  LIMIT $limite OFFSET $debut ";
$query1 = requette($sqlr);
contenue($nombreDePages,$query1,$table_vide,$values_and_attributues);
navigation_pages($page,$nombreDePages);
?>
</body>
</html>