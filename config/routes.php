<?php
return [
    '/' => ['AccueilController', 'index'],
    '/auths' => ['AuthentificationController', 'index'],
    '/inscription' => ['AuthentificationController', 'inscription'],
    '/connexion' => ['AuthentificationController', 'connexion'],
    '/mentionlegal' => ['AccueilController', 'mentionlegal']
];