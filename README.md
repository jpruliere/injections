# Injections SQL

## Process

- Créer un base `test` et importer [db.sql](db.sql)
- Modifier le constructeur PDO dans [form.php](form.php) ligne 8 (volontairement écrit à l'arrache pour ne pas s'attarder sur le code)
- En profiter pour expliquer ce que fait le code
- Ouvrir PMA et montrer le contenu de la table `user`
- Ouvrir l'appli et se connecter avec `jamel` ou `edouard` puis avec `admin` et illustrer la différence : ici, elle est minime mais elle pourrait être beaucoup plus importante (accès à des données ou des fonctionnalités très sensibles par exemple)
- Rentrer `' OR 1=1; -- ` dans le champ utilisateur et n'importe quoi (ou rien du tout) dans le champ mot de passe => :boom: **Welcome aboard, cap'n**
- Passé la surprise, ouvrir un onglet dans VSCode et indiquer SQL comme "Language Mode" (dans la barre d'état, à droite, cliquer sur "Plain Text") : la coloration syntaxique devrait aider à comprendre ce qu'il se passe
- Coller la requête `SELECT * FROM user WHERE username = 'edouard' AND password = 'otis';` puis mettre l'injection à la place de `edouard`
- Rappeler qu'un filtre WHERE, c'est un ensemble de tests renvoyant un booléen : si `true`, la ligne est conservée ; si `false`, la ligne est retirée
- Pour chaque ligne, le `username` n'est jamais une chaîne vide mais... 1 est toujours égal à 1 (les scientifiques sont unanimes) et le `OR` fait que _l'une ou l'autre_ des conditions suffit à conserver la ligne
- Conclusion : la requête renvoie tous les résultats et le `fetch` ligne 12 de [form.php](form.php) récupère le premier => l'utilisateur `admin`
