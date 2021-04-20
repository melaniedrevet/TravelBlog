{"changed":true,"filter":false,"title":"process.php","tooltip":"/process.php","value":"<?php\n\n\nsession_start();\n\n// connexion à la base \n\ntry { // on tente la connexion, si elle c'est réussi alors...\n        $mysqli = new PDO('mysql:host=localhost; dbname=wp_gp; charset=utf8', 'grandprojet', 'grandprojet'); //chaine de connexion à la base (PDO représente la connexion entre le php et la db)\n        echo \"Vous êtes connecté à la base de données !\" . \"</br>\";\n    }catch(Exception $e) { // si la connexion échoue alors...\n        die('Erreur : ' . $e->getMessage()); // affiche le message d'erreur\n    }\n\n\n// Ajout d'article dans significations\n\nif (isset($_POST[\"titre_principal\"], $_POST[\"introduction\"]) && !empty($_POST[\"titre_principal\"]) && !empty($_POST[\"introduction\"]) && !empty($_POST[\"auteur\"])){ // le isset détermine si une variable est déclarée. Le !empty est une sécurité pour le formulaire (le if vérifie que les input correspondent bien)\n\n    $titre_principal = $_POST[\"titre_principal\"]; \n    $introduction = $_POST[\"introduction\"];\n    $auteur = $_POST[\"auteur\"];\n    $now = date(\"Y-m-d H:i:s\");\n\n    $sql = \"INSERT INTO significations (titre_principal, introduction, auteur, date) VALUES (:titre_principal, :introduction, :auteur, :date)\"; // Permet d'inserer du contenu dans la db grace au formulaire\n    $request = $mysqli->prepare($sql);\n    $request->bindParam(':titre_principal', $titre_principal);\n    $request->bindParam(':introduction', $introduction);\n    $request->bindParam(':auteur', $auteur);\n    $request->bindParam(':date', $now);\n    $request->execute();\n        \n    $_SESSION['messageAjout'] = \"L'article : $titre_principal à été ajouté !\";\n    header(\"Location:connexion/landing.php\");\n}\n\n// Suppression d'articles\n\nif (isset($_GET['delete'])) {\n    $id = $_GET['delete'];\n    $sql = $mysqli->prepare(\"DELETE FROM significations WHERE id=$id LIMIT 1\") or die($mysqli->error());\n    $sql->bindValue(':id', $_GET['id'], PDO::PARAM_INT);\n    \n    $executeIsOk = $sql->execute();\n\n    if($executeIsOk) { //si executeIsOk est vrai alors...\n\n        $_SESSION['message'] = 'Article supprimé avec succés !';\n        header(\"location: connexion/landing.php\");\n    \n    }else {\n        echo \"Échec de la suppression de l'article\";\n    }\n}\n\n","undoManager":{"mark":34,"position":37,"stack":[[{"start":{"row":15,"column":18},"end":{"row":15,"column":19},"action":"insert","lines":[" "],"id":19},{"start":{"row":15,"column":19},"end":{"row":15,"column":20},"action":"insert","lines":["d"]},{"start":{"row":15,"column":20},"end":{"row":15,"column":21},"action":"insert","lines":["a"]},{"start":{"row":15,"column":21},"end":{"row":15,"column":22},"action":"insert","lines":["n"]},{"start":{"row":15,"column":22},"end":{"row":15,"column":23},"action":"insert","lines":["s"]}],[{"start":{"row":15,"column":23},"end":{"row":15,"column":24},"action":"insert","lines":[" "],"id":20},{"start":{"row":15,"column":24},"end":{"row":15,"column":25},"action":"insert","lines":["s"]},{"start":{"row":15,"column":25},"end":{"row":15,"column":26},"action":"insert","lines":["i"]},{"start":{"row":15,"column":26},"end":{"row":15,"column":27},"action":"insert","lines":["g"]},{"start":{"row":15,"column":27},"end":{"row":15,"column":28},"action":"insert","lines":["n"]},{"start":{"row":15,"column":28},"end":{"row":15,"column":29},"action":"insert","lines":["i"]},{"start":{"row":15,"column":29},"end":{"row":15,"column":30},"action":"insert","lines":["f"]},{"start":{"row":15,"column":30},"end":{"row":15,"column":31},"action":"insert","lines":["i"]},{"start":{"row":15,"column":31},"end":{"row":15,"column":32},"action":"insert","lines":["c"]},{"start":{"row":15,"column":32},"end":{"row":15,"column":33},"action":"insert","lines":["a"]}],[{"start":{"row":15,"column":33},"end":{"row":15,"column":34},"action":"insert","lines":["t"],"id":21},{"start":{"row":15,"column":34},"end":{"row":15,"column":35},"action":"insert","lines":["i"]},{"start":{"row":15,"column":35},"end":{"row":15,"column":36},"action":"insert","lines":["o"]},{"start":{"row":15,"column":36},"end":{"row":15,"column":37},"action":"insert","lines":["n"]},{"start":{"row":15,"column":37},"end":{"row":15,"column":38},"action":"insert","lines":["s"]}],[{"start":{"row":36,"column":0},"end":{"row":37,"column":0},"action":"remove","lines":["",""],"id":22},{"start":{"row":35,"column":0},"end":{"row":36,"column":0},"action":"remove","lines":["",""]},{"start":{"row":34,"column":1},"end":{"row":35,"column":0},"action":"remove","lines":["",""]}],[{"start":{"row":53,"column":1},"end":{"row":54,"column":0},"action":"insert","lines":["",""],"id":23},{"start":{"row":54,"column":0},"end":{"row":55,"column":0},"action":"insert","lines":["",""]},{"start":{"row":55,"column":0},"end":{"row":55,"column":1},"action":"insert","lines":["/"]},{"start":{"row":55,"column":1},"end":{"row":55,"column":2},"action":"insert","lines":["*"]}],[{"start":{"row":55,"column":2},"end":{"row":55,"column":3},"action":"insert","lines":[" "],"id":24},{"start":{"row":55,"column":3},"end":{"row":55,"column":4},"action":"insert","lines":["*"]},{"start":{"row":55,"column":4},"end":{"row":55,"column":5},"action":"insert","lines":["/"]}],[{"start":{"row":55,"column":2},"end":{"row":55,"column":3},"action":"insert","lines":["."],"id":25},{"start":{"row":55,"column":3},"end":{"row":55,"column":4},"action":"insert","lines":["."]},{"start":{"row":55,"column":4},"end":{"row":55,"column":5},"action":"insert","lines":["."]},{"start":{"row":55,"column":5},"end":{"row":55,"column":6},"action":"insert","lines":["."]},{"start":{"row":55,"column":6},"end":{"row":55,"column":7},"action":"insert","lines":["."]},{"start":{"row":55,"column":7},"end":{"row":55,"column":8},"action":"insert","lines":["."]},{"start":{"row":55,"column":8},"end":{"row":55,"column":9},"action":"insert","lines":["."]},{"start":{"row":55,"column":9},"end":{"row":55,"column":10},"action":"insert","lines":["."]},{"start":{"row":55,"column":10},"end":{"row":55,"column":11},"action":"insert","lines":["."]},{"start":{"row":55,"column":11},"end":{"row":55,"column":12},"action":"insert","lines":["."]},{"start":{"row":55,"column":12},"end":{"row":55,"column":13},"action":"insert","lines":["."]},{"start":{"row":55,"column":13},"end":{"row":55,"column":14},"action":"insert","lines":["."]},{"start":{"row":55,"column":14},"end":{"row":55,"column":15},"action":"insert","lines":["."]},{"start":{"row":55,"column":15},"end":{"row":55,"column":16},"action":"insert","lines":["."]},{"start":{"row":55,"column":16},"end":{"row":55,"column":17},"action":"insert","lines":["."]},{"start":{"row":55,"column":17},"end":{"row":55,"column":18},"action":"insert","lines":["."]},{"start":{"row":55,"column":18},"end":{"row":55,"column":19},"action":"insert","lines":["."]},{"start":{"row":55,"column":19},"end":{"row":55,"column":20},"action":"insert","lines":["."]},{"start":{"row":55,"column":20},"end":{"row":55,"column":21},"action":"insert","lines":["."]},{"start":{"row":55,"column":21},"end":{"row":55,"column":22},"action":"insert","lines":["."]},{"start":{"row":55,"column":22},"end":{"row":55,"column":23},"action":"insert","lines":["."]},{"start":{"row":55,"column":23},"end":{"row":55,"column":24},"action":"insert","lines":["."]},{"start":{"row":55,"column":24},"end":{"row":55,"column":25},"action":"insert","lines":["."]},{"start":{"row":55,"column":25},"end":{"row":55,"column":26},"action":"insert","lines":["."]},{"start":{"row":55,"column":26},"end":{"row":55,"column":27},"action":"insert","lines":["."]},{"start":{"row":55,"column":27},"end":{"row":55,"column":28},"action":"insert","lines":["."]}],[{"start":{"row":55,"column":28},"end":{"row":55,"column":29},"action":"insert","lines":["C"],"id":26},{"start":{"row":55,"column":29},"end":{"row":55,"column":30},"action":"insert","lines":["O"]},{"start":{"row":55,"column":30},"end":{"row":55,"column":31},"action":"insert","lines":["N"]},{"start":{"row":55,"column":31},"end":{"row":55,"column":32},"action":"insert","lines":["T"]},{"start":{"row":55,"column":32},"end":{"row":55,"column":33},"action":"insert","lines":["I"]},{"start":{"row":55,"column":33},"end":{"row":55,"column":34},"action":"insert","lines":["N"]},{"start":{"row":55,"column":34},"end":{"row":55,"column":35},"action":"insert","lines":["E"]},{"start":{"row":55,"column":35},"end":{"row":55,"column":36},"action":"insert","lines":["N"]},{"start":{"row":55,"column":36},"end":{"row":55,"column":37},"action":"insert","lines":["T"]}],[{"start":{"row":55,"column":37},"end":{"row":55,"column":38},"action":"insert","lines":[" "],"id":27}],[{"start":{"row":55,"column":37},"end":{"row":55,"column":38},"action":"remove","lines":[" "],"id":28}],[{"start":{"row":55,"column":37},"end":{"row":55,"column":38},"action":"insert","lines":["S"],"id":29},{"start":{"row":55,"column":38},"end":{"row":55,"column":39},"action":"insert","lines":["."]},{"start":{"row":55,"column":39},"end":{"row":55,"column":40},"action":"insert","lines":["."]},{"start":{"row":55,"column":40},"end":{"row":55,"column":41},"action":"insert","lines":["."]},{"start":{"row":55,"column":41},"end":{"row":55,"column":42},"action":"insert","lines":["."]},{"start":{"row":55,"column":42},"end":{"row":55,"column":43},"action":"insert","lines":["."]},{"start":{"row":55,"column":43},"end":{"row":55,"column":44},"action":"insert","lines":["."]},{"start":{"row":55,"column":44},"end":{"row":55,"column":45},"action":"insert","lines":["."]},{"start":{"row":55,"column":45},"end":{"row":55,"column":46},"action":"insert","lines":["."]},{"start":{"row":55,"column":46},"end":{"row":55,"column":47},"action":"insert","lines":["."]},{"start":{"row":55,"column":47},"end":{"row":55,"column":48},"action":"insert","lines":["."]},{"start":{"row":55,"column":48},"end":{"row":55,"column":49},"action":"insert","lines":["."]},{"start":{"row":55,"column":49},"end":{"row":55,"column":50},"action":"insert","lines":["."]},{"start":{"row":55,"column":50},"end":{"row":55,"column":51},"action":"insert","lines":["."]},{"start":{"row":55,"column":51},"end":{"row":55,"column":52},"action":"insert","lines":["."]},{"start":{"row":55,"column":52},"end":{"row":55,"column":53},"action":"insert","lines":["."]},{"start":{"row":55,"column":53},"end":{"row":55,"column":54},"action":"insert","lines":["."]}],[{"start":{"row":55,"column":54},"end":{"row":55,"column":55},"action":"insert","lines":["."],"id":30},{"start":{"row":55,"column":55},"end":{"row":55,"column":56},"action":"insert","lines":["."]},{"start":{"row":55,"column":56},"end":{"row":55,"column":57},"action":"insert","lines":["."]},{"start":{"row":55,"column":57},"end":{"row":55,"column":58},"action":"insert","lines":["."]},{"start":{"row":55,"column":58},"end":{"row":55,"column":59},"action":"insert","lines":["."]},{"start":{"row":55,"column":59},"end":{"row":55,"column":60},"action":"insert","lines":["."]},{"start":{"row":55,"column":60},"end":{"row":55,"column":61},"action":"insert","lines":["."]},{"start":{"row":55,"column":61},"end":{"row":55,"column":62},"action":"insert","lines":["."]},{"start":{"row":55,"column":62},"end":{"row":55,"column":63},"action":"insert","lines":["."]},{"start":{"row":55,"column":63},"end":{"row":55,"column":64},"action":"insert","lines":["."]},{"start":{"row":55,"column":64},"end":{"row":55,"column":65},"action":"insert","lines":["."]},{"start":{"row":55,"column":65},"end":{"row":55,"column":66},"action":"insert","lines":["."]}],[{"start":{"row":55,"column":66},"end":{"row":55,"column":67},"action":"remove","lines":[" "],"id":31}],[{"start":{"row":55,"column":68},"end":{"row":56,"column":0},"action":"insert","lines":["",""],"id":32},{"start":{"row":56,"column":0},"end":{"row":57,"column":0},"action":"insert","lines":["",""]}],[{"start":{"row":57,"column":0},"end":{"row":74,"column":1},"action":"insert","lines":["if (isset($_POST[\"titre_principal\"], $_POST[\"introduction\"]) && !empty($_POST[\"titre_principal\"]) && !empty($_POST[\"introduction\"]) && !empty($_POST[\"auteur\"])){ // le isset détermine si une variable est déclarée. Le !empty est une sécurité pour le formulaire (le if vérifie que les input correspondent bien)","","    $titre_principal = $_POST[\"titre_principal\"]; ","    $introduction = $_POST[\"introduction\"];","    $auteur = $_POST[\"auteur\"];","    $now = date(\"Y-m-d H:i:s\");","","    $sql = \"INSERT INTO significations (titre_principal, introduction, auteur, date) VALUES (:titre_principal, :introduction, :auteur, :date)\"; // Permet d'inserer du contenu dans la db grace au formulaire","    $request = $mysqli->prepare($sql);","    $request->bindParam(':titre_principal', $titre_principal);","    $request->bindParam(':introduction', $introduction);","    $request->bindParam(':auteur', $auteur);","    $request->bindParam(':date', $now);","    $request->execute();","        ","    $_SESSION['messageAjout'] = \"L'article : $titre_principal à été ajouté !\";","    header(\"Location:connexion/landing.php\");","}"],"id":33}],[{"start":{"row":57,"column":23},"end":{"row":57,"column":32},"action":"remove","lines":["_principa"],"id":34}],[{"start":{"row":57,"column":23},"end":{"row":57,"column":24},"action":"remove","lines":["l"],"id":35}],[{"start":{"row":57,"column":35},"end":{"row":57,"column":47},"action":"remove","lines":["introduction"],"id":36},{"start":{"row":57,"column":35},"end":{"row":57,"column":36},"action":"insert","lines":["e"]},{"start":{"row":57,"column":36},"end":{"row":57,"column":37},"action":"insert","lines":["d"]},{"start":{"row":57,"column":37},"end":{"row":57,"column":38},"action":"insert","lines":["i"]},{"start":{"row":57,"column":38},"end":{"row":57,"column":39},"action":"insert","lines":["t"]}],[{"start":{"row":57,"column":61},"end":{"row":57,"column":76},"action":"remove","lines":["titre_principal"],"id":37},{"start":{"row":57,"column":61},"end":{"row":57,"column":62},"action":"insert","lines":["t"]},{"start":{"row":57,"column":62},"end":{"row":57,"column":63},"action":"insert","lines":["i"]},{"start":{"row":57,"column":63},"end":{"row":57,"column":64},"action":"insert","lines":["t"]},{"start":{"row":57,"column":64},"end":{"row":57,"column":65},"action":"insert","lines":["r"]},{"start":{"row":57,"column":65},"end":{"row":57,"column":66},"action":"insert","lines":["e"]}],[{"start":{"row":57,"column":88},"end":{"row":57,"column":100},"action":"remove","lines":["introduction"],"id":38},{"start":{"row":57,"column":88},"end":{"row":57,"column":89},"action":"insert","lines":["e"]},{"start":{"row":57,"column":89},"end":{"row":57,"column":90},"action":"insert","lines":["d"]},{"start":{"row":57,"column":90},"end":{"row":57,"column":91},"action":"insert","lines":["i"]},{"start":{"row":57,"column":91},"end":{"row":57,"column":92},"action":"insert","lines":["t"]}],[{"start":{"row":59,"column":36},"end":{"row":59,"column":46},"action":"remove","lines":["_principal"],"id":39}],[{"start":{"row":60,"column":28},"end":{"row":60,"column":40},"action":"remove","lines":["introduction"],"id":40},{"start":{"row":60,"column":28},"end":{"row":60,"column":32},"action":"insert","lines":["edit"]}],[{"start":{"row":60,"column":5},"end":{"row":60,"column":16},"action":"remove","lines":["introductio"],"id":41}],[{"start":{"row":60,"column":5},"end":{"row":60,"column":6},"action":"remove","lines":["n"],"id":42}],[{"start":{"row":60,"column":5},"end":{"row":60,"column":9},"action":"insert","lines":["edit"],"id":43}],[{"start":{"row":59,"column":10},"end":{"row":59,"column":20},"action":"remove","lines":["_principal"],"id":44}],[{"start":{"row":64,"column":24},"end":{"row":64,"column":38},"action":"remove","lines":["significations"],"id":45},{"start":{"row":64,"column":24},"end":{"row":64,"column":25},"action":"insert","lines":["c"]},{"start":{"row":64,"column":25},"end":{"row":64,"column":26},"action":"insert","lines":["o"]},{"start":{"row":64,"column":26},"end":{"row":64,"column":27},"action":"insert","lines":["n"]},{"start":{"row":64,"column":27},"end":{"row":64,"column":28},"action":"insert","lines":["t"]},{"start":{"row":64,"column":28},"end":{"row":64,"column":29},"action":"insert","lines":["i"]},{"start":{"row":64,"column":29},"end":{"row":64,"column":30},"action":"insert","lines":["n"]},{"start":{"row":64,"column":30},"end":{"row":64,"column":31},"action":"insert","lines":["e"]},{"start":{"row":64,"column":31},"end":{"row":64,"column":32},"action":"insert","lines":["n"]},{"start":{"row":64,"column":32},"end":{"row":64,"column":33},"action":"insert","lines":["t"]},{"start":{"row":64,"column":33},"end":{"row":64,"column":34},"action":"insert","lines":["s"]}],[{"start":{"row":64,"column":41},"end":{"row":64,"column":51},"action":"remove","lines":["_principal"],"id":46}],[{"start":{"row":64,"column":43},"end":{"row":64,"column":55},"action":"remove","lines":["introduction"],"id":47},{"start":{"row":64,"column":43},"end":{"row":64,"column":44},"action":"insert","lines":["e"]},{"start":{"row":64,"column":44},"end":{"row":64,"column":45},"action":"insert","lines":["d"]},{"start":{"row":64,"column":45},"end":{"row":64,"column":46},"action":"insert","lines":["i"]},{"start":{"row":64,"column":46},"end":{"row":64,"column":47},"action":"insert","lines":["t"]}],[{"start":{"row":64,"column":77},"end":{"row":64,"column":87},"action":"remove","lines":["_principal"],"id":48}],[{"start":{"row":64,"column":80},"end":{"row":64,"column":92},"action":"remove","lines":["introduction"],"id":49},{"start":{"row":64,"column":80},"end":{"row":64,"column":81},"action":"insert","lines":["e"]},{"start":{"row":64,"column":81},"end":{"row":64,"column":82},"action":"insert","lines":["d"]},{"start":{"row":64,"column":82},"end":{"row":64,"column":83},"action":"insert","lines":["i"]},{"start":{"row":64,"column":83},"end":{"row":64,"column":84},"action":"insert","lines":["t"]}],[{"start":{"row":66,"column":31},"end":{"row":66,"column":41},"action":"remove","lines":["_principal"],"id":50}],[{"start":{"row":66,"column":40},"end":{"row":66,"column":50},"action":"remove","lines":["_principal"],"id":51}],[{"start":{"row":67,"column":41},"end":{"row":67,"column":54},"action":"remove","lines":["$introduction"],"id":52},{"start":{"row":67,"column":41},"end":{"row":67,"column":42},"action":"insert","lines":["$"]},{"start":{"row":67,"column":42},"end":{"row":67,"column":43},"action":"insert","lines":["e"]},{"start":{"row":67,"column":43},"end":{"row":67,"column":44},"action":"insert","lines":["d"]},{"start":{"row":67,"column":44},"end":{"row":67,"column":45},"action":"insert","lines":["i"]},{"start":{"row":67,"column":45},"end":{"row":67,"column":46},"action":"insert","lines":["t"]}],[{"start":{"row":67,"column":26},"end":{"row":67,"column":38},"action":"remove","lines":["introduction"],"id":53},{"start":{"row":67,"column":26},"end":{"row":67,"column":27},"action":"insert","lines":["e"]},{"start":{"row":67,"column":27},"end":{"row":67,"column":28},"action":"insert","lines":["d"]},{"start":{"row":67,"column":28},"end":{"row":67,"column":29},"action":"insert","lines":["i"]},{"start":{"row":67,"column":29},"end":{"row":67,"column":30},"action":"insert","lines":["t"]}],[{"start":{"row":72,"column":51},"end":{"row":72,"column":61},"action":"remove","lines":["_principal"],"id":54}],[{"start":{"row":57,"column":0},"end":{"row":74,"column":1},"action":"remove","lines":["if (isset($_POST[\"titre\"], $_POST[\"edit\"]) && !empty($_POST[\"titre\"]) && !empty($_POST[\"edit\"]) && !empty($_POST[\"auteur\"])){ // le isset détermine si une variable est déclarée. Le !empty est une sécurité pour le formulaire (le if vérifie que les input correspondent bien)","","    $titre = $_POST[\"titre\"]; ","    $edit = $_POST[\"edit\"];","    $auteur = $_POST[\"auteur\"];","    $now = date(\"Y-m-d H:i:s\");","","    $sql = \"INSERT INTO continents (titre, edit, auteur, date) VALUES (:titre, :edit, :auteur, :date)\"; // Permet d'inserer du contenu dans la db grace au formulaire","    $request = $mysqli->prepare($sql);","    $request->bindParam(':titre', $titre);","    $request->bindParam(':edit', $edit);","    $request->bindParam(':auteur', $auteur);","    $request->bindParam(':date', $now);","    $request->execute();","        ","    $_SESSION['messageAjout'] = \"L'article : $titre à été ajouté !\";","    header(\"Location:connexion/landing.php\");","}"],"id":55}],[{"start":{"row":53,"column":1},"end":{"row":55,"column":68},"action":"remove","lines":["","","/*..........................CONTINENTS............................*/"],"id":56}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":3,"column":0},"end":{"row":12,"column":5},"isBackwards":true},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1616690913163}