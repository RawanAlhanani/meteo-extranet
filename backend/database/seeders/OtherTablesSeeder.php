<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prevision; // Ensure the correct namespace for the Prevision model
use App\Models\HistoriqueUtilisateur; // Ensure the correct namespace for the HistoriqueUtilisateur model
use App\Models\Bulletin; // Ensure the correct namespace for the Bulletin model
use App\Models\Carte; // Ensure the correct namespace for the Carte model
use App\Models\Observation; // Ensure the correct namespace for the Observation model
use App\Models\Article; // Ensure the correct namespace for the DonneeClimatique model
 // Ensure the correct namespace for the Article model

class OtherTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Prevision::create([
            'titre' => 'Prévision Météo 1',
            'zone' => 'Zone A',
            'description' => 'Ciel dégagé avec quelques nuages.',
            'date_validite' => now()->addDays(1),
            'user_id' => 1, // Assure-toi que l'ID de l'utilisateur existe dans ta base de données
        ]);

        Prevision::create([
            'titre' => 'Prévision Météo 2',
            'zone' => 'Zone B',
            'description' => 'Pluie prévue toute la journée.',
            'date_validite' => now()->addDays(2),
            'user_id' => 2,
        ]);

        HistoriqueUtilisateur::create([
            'user_id' => 1,
            'action' => 'Création de prévision',
            'date_action' => now(),
        ]);

        HistoriqueUtilisateur::create([
            'user_id' => 2,
            'action' => 'Consultation de prévision',
            'date_action' => now(),
        ]);
        Carte::create([
            'type' => 'Satellite',
            'url' => 'https://example.com/carte1.jpg',
            'date_mise_jour' => now(),
            'date_validité' => now()->addDays(3),
            'user_id' => 1
        ]);

        Observation::create([
            'titre' => 'Observation à Antananarivo',
            'type' => 'Météo',
            'description' => 'Temps ensoleillé avec quelques nuages, 28°C, humidité 65%',
            'date_observation' => now(),
            'user_id' => 1
        ]);
        

        Article::create([
            'titre' => 'Phénomènes climatiques à surveiller',
            'type' => 'Climat',
            'description' => 'Des précipitations sont attendues dans plusieurs régions...',
            'date_publication' => now(),
            'user_id' => 2
        ]);

        // Données de test - Bulletins
        Bulletin::create([
            'titre' => 'Bulletin météo du jour',
            'region' => 'Casablanca',
            'type' => 'Prévision',
            'description' => 'Voici les prévisions pour aujourd’hui...',
            'date' => now(),
            'user_id' => 1
        ]);

        
    
    }

    }

