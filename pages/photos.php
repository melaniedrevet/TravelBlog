<html lang="fr">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Galerie Photos</title>
      <link rel="stylesheet" href="../css/style.css">
      <link rel="stylesheet" href="../css/page.css">
      <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.css">
      <link rel="stylesheet" href="../lib/grid/css/demo.css" type="text/css" />
      <link rel="stylesheet" href="../lib/grid/css/component.css" type="text/css" />
      <link rel="stylesheet" href="../lib/grid/css/elastic_grid.css" type="text/css" />
  </head>
  <body>
    <header class="photos">
      <div class="container-titre">
        <h1>Mes photos</h1>
      </div>

      <nav class="mb-5 header navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
        <a class="navbar-brand active" href="../index.php">
          <img class="logo" src="../images/logo.png" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav flex-wrap ms-md-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded=false>
                Signification
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php 
                    $db = new PDO('mysql:host=localhost; dbname=wp_gp; charset=utf8', 'grandprojet', 'grandprojet');
                    $sql = "SELECT * FROM articles WHERE categorie = 'signification' ORDER BY date DESC"; // on formule une requette sql qu'on stock dans $sql
                    $request = $db->query($sql); // on execute la requete ci dessus dans la db et on stock le resulat dans $request
                    while($row = $request->fetch()) { // temps qu'il y a des lignes dans la db on parcours la db pour l'afficher
                        ?>  
                            <li><a class="dropdown-item" href="../../articles/article.php?id=<?= $row['id']; ?>"><?= $row["titre"]?></a></li>
                        <?php
                    }
                ?>
              </ul>
            </li>
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded=false>
                Continents
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php 
                    $db = new PDO('mysql:host=localhost; dbname=wp_gp; charset=utf8', 'grandprojet', 'grandprojet');
                    $sql = "SELECT * FROM articles WHERE categorie = 'continent' ORDER BY date DESC"; // on formule une requette sql qu'on stock dans $sql
                    $request = $db->query($sql); // on execute la requete ci dessus dans la db et on stock le resulat dans $request
                    while($row = $request->fetch()) { // temps qu'il y a des lignes dans la db on parcours la db pour l'afficher
                        ?>  
                            <li><a class="dropdown-item" href="../../articles/article.php?id=<?= $row['id']; ?>"><?= $row["titre"]?></a></li>
                        <?php
                    }
                ?>
              </ul>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="photos.php">Mes photos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="videos.php">Mes vid??os</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="propos.php">A propos</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    

    <div class="mt-5 mb-5" id="grid-photo"></div>   
    
    
    <footer>
        <nav class="navbar navbar-expand-lg navbar-dark">
          <div class="container-fluid">
            <a class="navbar-brand active" href="../../connexion/page-connexion.php">Se connecter</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="#">Mentions l??gales</a>
                </li>
              </ul>
              <ul class="navbar-nav flex-row flex-wrap ms-md-auto">
                <li class="nav-item">
                  <a class="nav-link" href=""> Suivez mes aventures </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="https://twitter.com/?lang=fr" target="_blank"> <img src="../images/twitter.png" alt="twitter"/></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="https://www.instagram.com/?hl=fr" target="_blank"> <img src="../images/instagram.png" alt="instagram"/></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="https://www.youtube.com/" target="_blank"> <img src="../images/youtube.png" alt="youtube"/></a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
    </footer>
    
    <script src="../lib/bootstrap/js/bootstrap.js"></script>
  <!--  <script src="../lib/jquery.js"></script>-->
    <script src="../lib/grid/js/grid-jquery.js"></script>
    <script src="../lib/grid/js/classie.js"></script>
    <script src="../lib/grid/js/elastic_grid.js"></script>
    <script src="../lib/grid/js/modernizr.custom.js"></script>
    <script src="../lib/grid/js/jquery.hoverdir.js"></script>
    <script src="../lib/grid/js/jquery.elastislide.js"></script>
    
    
    <script type="text/javascript">
      $(function() {
        $("#grid-photo").elastic_grid({
          'showAllText' : 'Tout',
          'filterEffect': 'scaleup',
          'hoverDirection': true,
          'hoverDelay': 0,
          'hoverInverse': false,
          'expandingSpeed': 500,
          'expandingHeight': 500,
          'items' : 
          [
            // Premi??re ligne
            {
              'title'         : 'La poign??e de main',
              'description'   : `En effet, de nos jours la fa??on de se dire bonjour la plus commune 
              dans le monde occidental est la poign??e de main. Tout le monde se dit bonjour de cette 
              mani??re au moins une fois dans sa vie. La poign??e de main est utilis??e par les enfants, 
              les amis et dans le monde professionnel pour se saluer. Elle peut aussi avoir pour signification 
              un remerciement ou un march?? conclu.`,
              'thumbnail'     : ['../images/photos/small/poignee.png'],
              'large'         : ['../images/photos/large/poignee.png'],
              'img_title'     : ['poigneedemain'],
              'button_list'   :
                    [
                        { 'title':'En savoir plus', 'url' : 'https://6d456eb5ca534bce8741561f31cdcf9b.vfs.cloud9.us-east-1.amazonaws.com/articles/article.php?id=37', 'new_window' : false }
                      
                    ],
              'tags'          : ['Saluts communs']
            },
            {
              'title'         : 'Le salut des Indiens des plaines',
              'description'   : `Les Indiens des plaines sont les peuples compos??s de diverses tribus, qui occupaient les grandes 
              plaines d???Am??rique du Nord avant la colonisation europ??enne. La fa??on de saluer la plus courante et  la plus connue 
              qu???utilisent les Indiens des plaines est ??videmment ?? Ugh ?? signifiant ?? Salut ?? toi ?? en sioux. C???est un salut de 
              reconnaissance et de respect. ?? Ugh ?? se prononce haut et fort, en levant une main, la paume ouverte vers l???avant.`,
              'thumbnail'     : ['../images/photos/small/ugh.png'],
              'large'         : ['../images/photos/large/ugh.png'],
              'img_title'     : ['salutsindiens'],
              'button_list'   :
                    [
                        { 'title':'En savoir plus', 'url' : 'https://6d456eb5ca534bce8741561f31cdcf9b.vfs.cloud9.us-east-1.amazonaws.com/articles/article.php?id=53', 'new_window' : false }
                      
                    ],
              'tags'          : ['Saluts traditionnels']
            },
            {
              'title'         : 'Le salut militaire',
              'description'   : `Le salut militaire fut d???abord le signe de paix et de fraternit?? 
              ??chang??, de loin, par deux voyageurs qui se rencontraient. En ??levant leur main droite 
              largement ouverte, ils montraient l???un ?? l???autre l???absence d???armes dans leur main. 
              L???origine remonterait ?? l???Antiquit??. Il s???agissait avant tout d???un signe de paix. `,
              'thumbnail'     : ['../images/photos/small/salutmilitaire.png'],
              'large'         : ['../images/photos/large/salutmilitaire.png'],
              'img_title'     : ['salutmilitaire'],
              'button_list'   :
                    [
                        { 'title':'En savoir plus', 'url' : 'https://6d456eb5ca534bce8741561f31cdcf9b.vfs.cloud9.us-east-1.amazonaws.com/articles/article.php?id=44', 'new_window' : false }
                        
                    ],
              'tags'          : ['Saluts communs']
            },
            {
              'title'         : 'Le salut Japonais',
              'description'   : `?? l???inverse de notre culture europ??enne, dans le 
              continent asiatique et plus pr??cis??ment au Japon, il est conseill?? 
              de garder une certaine distance pour se saluer. Le salut japonais est une 
              des formes de politesse les plus importantes et fondamentales de la culture nippone.`,
              'thumbnail'     : ['../images/photos/small/japonais.png'],
              'large'         : ['../images/photos/large/japonais.png'],
              'img_title'     : ['salutjaponais'],
              'button_list'   :
                    [
                        { 'title':'En savoir plus', 'url' : 'https://6d456eb5ca534bce8741561f31cdcf9b.vfs.cloud9.us-east-1.amazonaws.com/articles/article.php?id=57', 'new_window' : false }
                      
                    ],
              'tags'          : ['Saluts traditionnels']
            },
            // Deuxi??me ligne
            {
              'title'         : 'Le salut des Premi??res Nations',
              'description'   : `Les Am??rindiens ou membres des premi??res Nations sont les peuples habitant 
              l???Am??rique qui ??tait pr??sente avant la colonisation europ??enne et leurs descendants. Les peuples 
              am??rindiens occupent la totalit?? des Am??riques que ce soit Am??rique du Nord, Am??rique centrale, 
              Am??rique du Sud, ainsi que les Cara??bes. Mais aujourd???hui nous allons nous concentrer sur les peuples 
              habitant uniquement le continent nord-am??ricain.`,
              'thumbnail'     : ['../images/photos/small/premierenation.png'],
              'large'         : ['../images/photos/large/premierenation.png'],
              'img_title'     : ['salutamerindien'],
              'button_list'   :
                    [
                        { 'title':'En savoir plus', 'url' : 'https://6d456eb5ca534bce8741561f31cdcf9b.vfs.cloud9.us-east-1.amazonaws.com/articles/article.php?id=53', 'new_window' : false }
                      
                    ],
              'tags'          : ['Saluts traditionnels']
            },
            {
              'title'         : 'Coucou',
              'description'   : `Une des mani??res de se dire bonjour les plus s??curis??es est tout simplement le salut de la main lev??e.
              Bien s??r, le salut de la main, plus commun??ment appel?? "faire coucou" est une fa??on de se dire bonjour que les enfants utilisent ou qui 
              te sert quand tu salues des personnes de loin`,
              'thumbnail'     : ['../images/photos/small/coucou.png'],
              'large'         : ['../images/photos/large/coucou.png'],
              'img_title'     : ['coucou'],
              'button_list'   :
                    [
                        { 'title':'En savoir plus', 'url' : 'https://6d456eb5ca534bce8741561f31cdcf9b.vfs.cloud9.us-east-1.amazonaws.com/articles/article.php?id=58', 'new_window' : false }
                      
                    ],
              'tags'          : ['Saluts communs']
            },
            {
              'title'         : 'Le salut Malaisien',
              'description'   : `La r??gion du Pacifique est peut-??tre la r??gion du monde la plus diversifi??e 
              sur le plan culturel avec pour cause, ??a tr??s lente colonisation par les peuples venus d???Asie du
              Sud ?? l???antiquit?? qui se sont m??lang??s avec les populations d??j?? pr??sentes depuis la pr??histoire 
              qui ??taient d??j?? culturellement vari??s, car r??partie sur un tr??s grand nombre d?????les.`,
              'thumbnail'     : ['../images/photos/small/malaisie.png'],
              'large'         : ['../images/photos/large/malaisie.png'],
              'img_title'     : ['salutmalaisie'],
              'button_list'   :
                    [
                        { 'title':'En savoir plus', 'url' : 'https://6d456eb5ca534bce8741561f31cdcf9b.vfs.cloud9.us-east-1.amazonaws.com/articles/article.php?id=52', 'new_window' : false }
                      
                    ],
              'tags'          : ['Saluts traditionnels']
            },
            {
              'title'         : 'Le salut au S??n??gal',
              'description'   : `Au S??n??gal, la main est l'un des membres essentiels de la communication.`,
              'thumbnail'     : ['../images/photos/small/senegal.png'],
              'large'         : ['../images/photos/large/senegal.png'],
              'img_title'     : ['salutsenegal'],
              'button_list'   :
                    [
                        { 'title':'En savoir plus', 'url' : 'https://6d456eb5ca534bce8741561f31cdcf9b.vfs.cloud9.us-east-1.amazonaws.com/articles/article.php?id=55', 'new_window' : false }
                      
                    ],
              'tags'          : ['Saluts traditionnels']
            },
            // Troisi??me ligne
            {
              'title'         : 'Le salut Africain',
              'description'   : `Le continent africain est ?? la fois vaste et plein de contrastes.
              Dans toutes les soci??t??s africaines, la salutation occupe une place de choix dans les 
              relations sociales. Elle est m??me le rituel qui annonce toute conversation. Son absence 
              ou la baisse de sa ferveur dans un milieu africain est mal per??ue et s???interpr??te comme 
              un signe de conflit entre les hommes.`,
              'thumbnail'     : ['../images/photos/small/sawabona.png'],
              'large'         : ['../images/photos/large/sawabona.png'],
              'img_title'     : ['salutafricain'],
              'button_list'   :
                    [
                        { 'title':'En savoir plus', 'url' : 'https://6d456eb5ca534bce8741561f31cdcf9b.vfs.cloud9.us-east-1.amazonaws.com/articles/article.php?id=55', 'new_window' : false }
                      
                    ],
              'tags'          : ['Saluts traditionnels']
            },
            {
              'title'         : 'Se dire bonjour',
              'description'   : `La solution la plus ??vidente, m??me si elle peut para??tre impersonnelle, aust??re et
              manquer de chaleur humaine pour certaines personnes est de tout simplement se dire bonjour.`,
              'thumbnail'     : ['../images/photos/small/bonjour.png'],
              'large'         : ['../images/photos/large/bonjour.png'],
              'img_title'     : ['bonjour'],
              'button_list'   :
                    [
                        { 'title':'En savoir plus', 'url' : 'https://6d456eb5ca534bce8741561f31cdcf9b.vfs.cloud9.us-east-1.amazonaws.com/articles/article.php?id=58', 'new_window' : false }
                      
                    ],
              'tags'          : ['Saluts communs']
            },
            {
              'title'         : 'Le check de coude',
              'description'   : `Le check du coude consiste, comme son nom l'indique, ?? percuter les extr??mit??es de nos coudes pour se saluer.`,
              'thumbnail'     : ['../images/photos/small/coude.png'],
              'large'         : ['../images/photos/large/coude.png'],
              'img_title'     : ['checkcoude'],
              'button_list'   :
                    [
                        { 'title':'En savoir plus', 'url' : 'https://6d456eb5ca534bce8741561f31cdcf9b.vfs.cloud9.us-east-1.amazonaws.com/articles/article.php?id=58', 'new_window' : false }
                      
                    ],
              'tags'          : ['Saluts communs']
            },
            {
              'title'         : 'Le check de main',
              'description'   : `La poign??e de mains a su se r??inventer et se transformer depuis 
              quelques ann??es avec une personnalisation appartenant ?? chaque personne ou ?? chaque 
              groupe d???individus avec le check.`,
              'thumbnail'     : ['../images/photos/small/check.png'],
              'large'         : ['../images/photos/large/check.png'],
              'img_title'     : ['checkmain'],
              'button_list'   :
                    [
                        { 'title':'En savoir plus', 'url' : 'https://6d456eb5ca534bce8741561f31cdcf9b.vfs.cloud9.us-east-1.amazonaws.com/articles/article.php?id=58', 'new_window' : false }
                      
                    ],
              'tags'          : ['Saluts communs']
            },
          ]
        });
      });
      
    </script>
  </body>
</html>