# PHP: messenger

> Simple messenger in PHP

* * *

Le but de cet exercice est de réaliser une petite messagerie web (un mélange entre un webmail et un slack/ryver), en PHP/MySQL.

> **NOTE:** nous vous avons préparé un environnement de développement tout compris basé sur [docker](https://www.docker.com). Plus de détails dans la section **Mise en place**, un peu plus bas.

## Consignes

Votre objectif ici est de créer une messagerie _à la Slack/Ryver_, mais bien plus simple, afin de découvrir PHP & les bases de données MySQL.

### Fonctionnalités

Une fois connecté via son email et mot de passe, **l'utilisateur** a la possibilité de créer des **conversations** qui contiendront un ou plusieurs **membres** (d'autres utilisateurs), qui y posteront des **messages**. Les **membres** auront aussi la possibilité d'ajouter des **réactions** à un message, sous la forme d'un _emoji_.

Il va de soit qu'un utilisateur peut éditer et supprimer ses messages (messages qui seront alors visuellement marqués comme édités/supprimés), peut ajouter/retirer une réaction, et peut éditer (mais pas supprimer) une conversation.  
Chaque utilisateur doit pouvoir voir quel message n'a pas encore été lu par lui-même, et doit être prévenu, _par mail_, d'un nouveau message dans une conversation auquel il participe.
Dans la même idée, un utilisateur peut modifier son profil (mot de passe, nom, prénom).

> **NOTE:** l'environnement de développement qu'on vous a préparé contient un _mailcatcher_, un outil qui va intercepter les mails envoyés, aucun risque de spammer vos utilisateurs pendant le dev.

### Présentation

Vous trouverez des _wireframe_ pour le projet dans le dossier du même nom.

Concernant le design de la messagerie, ça n'est pas le sujet principal : utilisez [Bootstrap](https://getbootstrap.com/) pour gagner du temps.

### Structures

Vous êtes libres de structurer votre base de données comme bon vous semble, mais chaque modèle doit contenir, à minima :

- **users :** email, password, firstname, lastname
- **conversations :** author, subject
- **messages :** date, content, conversation, author
- **reactions :** message, author, emoji

**Attention :** veillez à stocker les mots de passe dans les règles de l'art !

### Consignes bonus

Pour ceux d'entre vous qui avancent un peu plus vite et/ou veulent un peu plus de _challenge_, voici quelques consignes bonus :

- Pouvoir uploader des fichiers joints à ses messages

## Modalités

Vous allez travailler en petits groupes de trois ou quatre. À vous d'organiser votre travail comme vous le voulez, mais n'oubliez pas que vous êtes sensés _comprendre_ l'ensemble du projet.

Vous avez deux semaines pour livrer le code. Cette livraison s'accompagnera d'un entretien de _passation technique_ : nous figurerons une équipe qui va reprendre la maintenance du projet à votre suite, et vous poserons des questions techniques à ce sujet.

> **NOTE:** n'oubliez pas de nous fournir un *dump* MySQL de votre base de données !

## Mise en place

PHP, comme MySQL, ont besoin d'un serveur pour fonctionner. Nous pourrions passer par des systèmes comme [WAMP](http://www.wampserver.com/) (sur Windows), [MAMP](https://www.mamp.info/en/) (sur macOS), voire installer chaque élement _à la main_ sur Linux.
Nous allons plutôt utiliser [Docker](https://www.docker.com/), une solution performante, utilisable en développement comme en production, devenu un standard de l'industrie.

> *"Ouais, mais, c'est quoi, Docker, comment ça marche ?"* : pour être honnête, Docker, c'est assez complexe, et on va donc pas se tracasser du _quoi_ pour le moment. On va utiliser l'outil, et on se penchera sur ses possibilités plus tard.

### Installer docker

Pour commencer, nous devons installer **docker** sur nos machines :

- Sur macOS, suivez la procédure expliquée sur [cette page](https://docs.docker.com/docker-for-mac/install/)
- Sur windows, suivez la procédure expliquée sur [cette page](https://docs.docker.com/docker-for-windows/install/)
- Sur Linux, suivez la procédure expliquée sur [cette page](https://docs.docker.com/install/linux/docker-ce/ubuntu/)

Pour tester votre installation, lancez la commande `docker run hello-world`.

> **NOTE :** sur linux, il est possible que vous ayez une erreur de droits, que vous pouvez corriger en vous référant à [cette adresse](https://techoverflow.net/2017/03/01/solving-docker-permission-denied-while-trying-to-connect-to-the-docker-daemon-sockethttps://techoverflow.net/2017/03/01/solving-docker-permission-denied-while-trying-to-connect-to-the-docker-daemon-socket//).

Ensuite, installez **docker-compose** :

- Sur macOS et windows, c'est déjà installé avec docker
- Sur Linux, suivez la procédure expliquée sur [cette page](https://docs.docker.com/compose/install/#install-compose)

### Lancer docker

Une fois docker installé, il vous suffit de la lancer pour commencer à travailler.
Pour ce faire, depuis le dossier du repo, lancez la commande suivante :

    docker-compose up

Une fois lancé, les services suivants seront accessibles :

- le site sur l'adresse [localhost:8000](http://localhost:8000)
- _phpmyadmin_ sur l'adresse [localhost:8001](http://localhost:8001)
- _mailcatcher_ (utilisé dans une consigne bonus) sur l'adresse [localhost:8002](http://localhost:8002)

### Accès à MySQL

Pour connecter vos scripts PHP à la base de données MySQL, utilisez les paramètres suivants :

- host : `mysql`
- login : `messenger`
- password : `messenger`

> **NOTE:** ce mot de passe n'est pas très _safe_, mais cet environnement de travail est uniquement accessible en local.

* * *

Bon travail !
