<?php

namespace App\Controller;

use App\Entity\Eleve;
use App\Entity\Promotion;
use App\UserStory\AjouterPromotion;
use App\UserStory\AjouterEleve;
use Doctrine\DBAL\Exception\ConnectionException;
use Doctrine\ORM\EntityManager;

use League\Csv\Reader;

class ClasseController extends AbstractController
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        session_start();
    }

    public function ajouterpromotion():void
    {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nom = $_POST['promotion'];
            $annee = $_POST['annee'];

            try {
                $promotion = new AjouterPromotion($this->entityManager);
                $promotion->execute($nom, $annee);
                $this->redirect('/');
            } catch (ConnectionException $e) {
                $erreurs = "Le serveur de base de données est actuellement indisponible. Veuillez réessayer plus tard.";
            } catch (\Exception $e) {
                $erreurs = $e->getMessage();
            }
        }
        $this->render('classe/ajouterpromotion',['erreurs'=>$erreurs ?? null,]);
    }

    public function ajoutereleve():void
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $csv=$_FILES['fichier']['tmp_name'];
            $classe = $_POST['classe'];
            try {
                $eleve = new AjouterEleve($this->entityManager);
                $eleve->execute($csv,$classe);
            } catch (ConnectionException $e) {
                $erreurs = "Le serveur de base de données est actuellement indisponible. Veuillez réessayer plus tard.";
            } catch (\Exception $e) {
                $erreurs = $e->getMessage();
            }
        }

        $promotions = $this->entityManager->getRepository(Promotion::class)
            ->findBy([]);

        $this->render('classe/ajoutereleve',
            [
                'erreurs'=>$erreurs ?? null,
                'promotions'=>$promotions ?? null
                ]);
    }
}