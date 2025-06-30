<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return new Response('<html><body><h1>Welcome to Symfony 7.3!</h1><p>This is a basic Symfony application.</p></body></html>');
    }

    #[Route('/offres', name: 'pricing')]
    public function pricing(): Response
    {
        $html = '
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Nos Offres - Tarification</title>
            <style>
                body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background-color: #f5f5f5; }
                .container { max-width: 1200px; margin: 0 auto; }
                h1 { text-align: center; color: #333; margin-bottom: 40px; }
                .pricing-grid { display: flex; gap: 20px; justify-content: center; flex-wrap: wrap; }
                .pricing-card { background: white; border-radius: 8px; padding: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); text-align: center; flex: 1; min-width: 280px; max-width: 350px; }
                .pricing-card.featured { border: 3px solid #007bff; transform: scale(1.05); }
                .plan-name { font-size: 24px; font-weight: bold; color: #333; margin-bottom: 10px; }
                .plan-price { font-size: 36px; font-weight: bold; color: #007bff; margin-bottom: 20px; }
                .plan-price .currency { font-size: 18px; }
                .plan-price .period { font-size: 16px; color: #666; }
                .plan-features { list-style: none; padding: 0; margin: 20px 0; }
                .plan-features li { padding: 8px 0; border-bottom: 1px solid #eee; }
                .plan-features li:last-child { border-bottom: none; }
                .btn { background: #007bff; color: white; padding: 12px 30px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; text-decoration: none; display: inline-block; margin-top: 20px; }
                .btn:hover { background: #0056b3; }
                .btn-secondary { background: #6c757d; }
                .btn-secondary:hover { background: #545b62; }
            </style>
        </head>
        <body>
            <div class="container">
                <h1>Nos Offres de Service</h1>
                <div class="pricing-grid">
                    <div class="pricing-card">
                        <div class="plan-name">Starter</div>
                        <div class="plan-price">
                            <span class="currency">€</span>9<span class="period">/mois</span>
                        </div>
                        <ul class="plan-features">
                            <li>1 utilisateur</li>
                            <li>5 GB de stockage</li>
                            <li>Support par email</li>
                            <li>Fonctionnalités de base</li>
                        </ul>
                        <a href="#" class="btn btn-secondary">Choisir ce plan</a>
                    </div>
                    
                    <div class="pricing-card featured">
                        <div class="plan-name">Professionnel</div>
                        <div class="plan-price">
                            <span class="currency">€</span>29<span class="period">/mois</span>
                        </div>
                        <ul class="plan-features">
                            <li>5 utilisateurs</li>
                            <li>50 GB de stockage</li>
                            <li>Support prioritaire</li>
                            <li>Fonctionnalités avancées</li>
                            <li>Rapports détaillés</li>
                            <li>Intégrations API</li>
                        </ul>
                        <a href="#" class="btn">Choisir ce plan</a>
                    </div>
                    
                    <div class="pricing-card">
                        <div class="plan-name">Entreprise</div>
                        <div class="plan-price">
                            <span class="currency">€</span>99<span class="period">/mois</span>
                        </div>
                        <ul class="plan-features">
                            <li>Utilisateurs illimités</li>
                            <li>500 GB de stockage</li>
                            <li>Support 24/7</li>
                            <li>Toutes les fonctionnalités</li>
                            <li>Personnalisation avancée</li>
                            <li>Gestionnaire de compte dédié</li>
                            <li>Formation incluse</li>
                        </ul>
                        <a href="#" class="btn btn-secondary">Nous contacter</a>
                    </div>
                </div>
            </div>
        </body>
        </html>';
        
        return new Response($html);
    }
}