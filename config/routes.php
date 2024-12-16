<?php
return [
    '/' => ['AccueilController', 'index'],
    '/inscription' => ['AuthentificationController', 'inscription'],
    '/connexion' => ['AuthentificationController', 'connexion'],
    '/deconnexion' => ['AuthentificationController', 'deconnexion'],
    '/mentionlegal' => ['AccueilController', 'mentionlegal'],
    '/ajouterpromotion' => ['ClasseController', 'ajouterpromotion'],
    '/ajoutereleve' => ['ClasseController', 'ajoutereleve']
];