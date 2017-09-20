Phone
=====

Création d'un site e-commerce pour une société de réparations de téléphonie principalement, basées sur Aix-En-Provence.

Commande symfony : 

alias sf="php bin/console"

créer un nouveau projet : symfony new NomduProjet
créer une entité dans la table : sf doctrine:generate:entity PhoneBundle:NomEntity
mise à jour de la base de donnée : sf doctrine:migrations:diff
                                   sf doctrine:migrations:migrate
création d'un Form : sf doctrine:generate:form PhoneBundle:NomduForm
démarrer le serveur : sf server:run
création d'un crud : sf doctrine:generate:crud

Pour l'instant tu peux utiliser que celle ci 


