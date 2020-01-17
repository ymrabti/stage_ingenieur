<head>
    <title>Recherche</title>
    <link rel="icon" href="images/1.png"  />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<div id="primary">
    <div id="content" class="clearfix">
        <?php
        include "connexion.php";
        function resultotab($resultat, $champs)
        {
            $array = array();
            while ($element = mysqli_fetch_assoc($resultat)) {
                array_push($array, $element[$champs]);
            }
            return $array;
        }
        $sqll = "SELECT * FROM ecoles";
        $sqlf = "SELECT * FROM formations";
        $sql1 = "SELECT * FROM villes";
        $sql2 = "SELECT * FROM dformations";
        $sql3 = "SELECT * FROM types";
        $sql4 = "SELECT * FROM admission";
        $sql5 = "SELECT * FROM typesdiplomes";
        $sql11 = "SELECT * FROM villes";
        $sql22 = "SELECT * FROM dformations";
        $sql33 = "SELECT * FROM types";
        $sql44 = "SELECT * FROM admission";
        $sql55 = "SELECT * FROM typesdiplomes";
        $reqq = requette($hote, $database, $username, $password, $sqll);
        $reqf = requette($hote, $database, $username, $password, $sqlf);
        $req1 = requette($hote, $database, $username, $password, $sql1);
        $req2 = requette($hote, $database, $username, $password, $sql2);
        $req3 = requette($hote, $database, $username, $password, $sql3);
        $req4 = requette($hote, $database, $username, $password, $sql4);
        $req5 = requette($hote, $database, $username, $password, $sql5);
        $req11 = requette($hote, $database, $username, $password, $sql11);
        $req22 = requette($hote, $database, $username, $password, $sql22);
        $req33 = requette($hote, $database, $username, $password, $sql33);
        $req44 = requette($hote, $database, $username, $password, $sql44);
        $req55 = requette($hote, $database, $username, $password, $sql55);
        $ecoletab = resultotab($reqq, 'nom');
        $forms = resultotab($reqf, 'intitule');
        ?>
        <div id="flip-card">
            <div id="ecoles_card">
                <div class="header">
                    <h2>Rechercher une ecole</h2>
                </div>
                <form autocomplete="off" action="result.php" method="post">
                    <div class="autocomplete">
                        <input id="ecole" type="search" placeholder="Rechercher une école" aria-label="Search" name="eq">
                    </div>
                    <input type="text" name="page" value="1" class="display-none">
                    <input type="submit" value="Search">
                </form>
                <form class="form1" action="result.php" method="post">
                    <label>Type d’Etablissement :</label>
                    <select name="typeEtablissement">
                        <option value="1">Tout *</option>
                        <?php while ($type = mysqli_fetch_assoc($req3)) { ?>
                            <option value="<?= $type['id'] ?>"><?= addslashes(utf8_encode($type['nom'])) ?> </option>
                        <?php } ?>
                    </select><br>
                    <label>Type de Diplôme :</label>
                    <select name="typeDiplome">
                        <option value="1">Tout *</option>
                        <?php while ($diplome = mysqli_fetch_assoc($req5)) { ?>
                            <option value="<?= $diplome['id'] ?>"><?= addslashes(utf8_encode($diplome['nom'])) ?> </option>
                        <?php } ?>
                    </select><br>
                    <label>Niveau d’accès à l'établissement :</label>
                    <select name="acces-ecole">
                        <option value="1">Tout *</option>
                        <?php while ($admission = mysqli_fetch_assoc($req4)) { ?>
                            <option value="<?= $admission['id'] ?>"><?= utf8_encode($admission['nom']) ?> </option>
                        <?php } ?>
                    </select><br>
                    <label>Domaine de formation :</label>
                    <select name="domaineFormation">
                        <option value="1">Tout *</option>
                        <?php while ($domaine = mysqli_fetch_assoc($req2)) { ?>
                            <option value="<?= $domaine['id'] ?>"><?= utf8_encode($domaine['nom']) ?> </option>
                        <?php } ?>
                    </select><br>
                    <label>Ville :</label>
                    <select name="ville-ecole">
                        <option value="1">Tout *</option>
                        <?php while ($ville = mysqli_fetch_assoc($req1)) { ?>
                            <option value="<?= $ville['id'] ?>"><?= utf8_encode($ville['nom']) ?> </option>
                        <?php } ?>
                    </select><br><br><br>
                    <input type="text" name="page" value="1" class="display-none">
                    <button class="button1" name="ecolerecherche">Lancer la recherche</button>


                </form>
                <h3>vous recherchez une <a id="flip-card-btn-turn-to-back" class="button1">formation</a> ?</h3>


            </div>

            <div id="formations_card">
                <div class="header">
                    <h2>Rechercher une formation</h2>
                </div>
                <form autocomplete="off" action="result.php" method="post">
                    <div class="autocomplete">
                        <input id="formation" type="search" placeholder="Rechercher une formation"
                               aria-label="Search" name="ef">
                    </div>
                    <input type="text" name="page" value="1" class="display-none">
                    <input type="submit" value="Search">
                </form>
                <form class="form1" action="result.php" method="post">
                    <label>Type de formation :</label>
                    <select name="typeFormation">
                        <option value="1">Tout *</option>
                        <?php while ($type = mysqli_fetch_assoc($req33)) { ?>
                            <option value="<?= $type['id'] ?>"><?= addslashes(utf8_encode($type['nom'])) ?> </option>
                        <?php } ?>
                    </select><br>
                    <label>Type de Diplôme :</label>
                    <select name="typeDiplomeff">
                        <option value="1">Tout *</option>
                        <?php while ($diplome = mysqli_fetch_assoc($req55)) { ?>
                            <option value="<?= $diplome['id'] ?>"><?= addslashes(utf8_encode($diplome['nom'])) ?> </option>
                        <?php } ?>
                    </select><br>
                    <label>Niveau d’accès à la formation :</label>
                    <select name="acces-formation">
                        <option value="1">Tout *</option>
                        <?php while ($admission = mysqli_fetch_assoc($req44)) { ?>
                            <option value="<?= $admission['id'] ?>"><?= utf8_encode($admission['nom']) ?> </option>
                        <?php } ?>
                    </select><br>
                    <label>Domaine de formation :</label>
                    <select name="domaineFormationff">
                        <option value="1">Tout *</option>
                        <?php while ($domaine = mysqli_fetch_assoc($req22)) { ?>
                            <option value="<?= $domaine['id'] ?>"><?= utf8_encode($domaine['nom']) ?> </option>
                        <?php } ?>
                    </select><br>
                    <label>Ville :</label>
                    <select name="ville-formation">
                        <option value="1">Tout *</option>
                        <?php while ($ville = mysqli_fetch_assoc($req11)) { ?>
                            <option value="<?= $ville['id'] ?>"><?= utf8_encode($ville['nom']) ?> </option>
                        <?php } ?>
                    </select><br><br><br>
                    <input type="text" name="page" value="1" class="display-none">
                    <button class="button1" name="formationrecherche">Lancer la recherche</button>

                </form>
                <!--<button id="flip-card-btn-turn-to-front" class="button" style="vertical-align:middle"><span>rechercher une école</span></button>-->
                <h3>vous recherchez une <a id="flip-card-btn-turn-to-front" class="button1">ecole</a> ?</h3>

            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {

                document.getElementById('ecoles_card').className = 'display-block';
                document.getElementById('formations_card').className = 'display-none';
                document.getElementById('flip-card-btn-turn-to-back').className = 'button1';
                document.getElementById('flip-card-btn-turn-to-front').className = 'button11';

                document.getElementById('flip-card-btn-turn-to-back').onclick = function () {
                    document.getElementById('ecoles_card').className = 'display-none';
                    document.getElementById('formations_card').className = 'display-block';
                    document.getElementById('flip-card-btn-turn-to-back').className = 'button11';
                    document.getElementById('flip-card-btn-turn-to-front').className = 'button1';
                };
                document.getElementById('flip-card-btn-turn-to-front').onclick = function () {
                    document.getElementById('ecoles_card').className = 'display-block';
                    document.getElementById('formations_card').className = 'display-none';
                    document.getElementById('flip-card-btn-turn-to-back').className = 'button1';
                    document.getElementById('flip-card-btn-turn-to-front').className = 'button11';
                };
            });
            jQuery("#ecole").autocomplete({
                source:  <?php echo json_encode($ecoletab);?>,
                minLength:2
            });
            jQuery("#formation").autocomplete({
                source:  <?php echo json_encode($forms);?>,
                minLength:2
            });
        </script>
    </div>
</div>