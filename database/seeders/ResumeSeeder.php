<?php

namespace Database\Seeders;

use App\Models\Resume;
use Illuminate\Database\Seeder;

class ResumeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // On vide la table pour éviter les doublons à chaque déploiement
        Resume::truncate();

        Resume::create([
            'full_name' => 'Pierre Bultez',
            'title' => 'Développeur Fullstack PHP | Laravel | Vue | Nuxt',
            'level' => 'Junior',
            'location' => 'Courthézon, Vaucluse, France',
            'email' => 'pierre.bultez@proton.me',
            'phone' => '+33 6 12 34 56 78',
            'summary' => 'Développeur Fullstack passionné par les défis techniques, je transforme les demandes clients les plus ambitieuses en solutions web robustes et innovantes. A l\'aise avec l\'écosystème Laravel et l\'administration système, aucune contrainte ne me fait peur.',
            'links' => [
                'github' => 'https://github.com/PierreBultez',
                'linkedin' => 'https://www.linkedin.com/in/pierre-bultez-5699b52a8/',
                'website' => 'https://pierrebultez.com',
            ],
            'experiences' => [
                [
                    'company' => 'PierreBultez.com',
                    'title' => 'Freelance Junior Developer',
                    'period' => '2024 - Présent',
                    'description' => 'Développement de sites et applications web clients',
                ],
                [
                    'company' => 'Wendysdiner.com',
                    'title' => 'Gérant & Webmaster',
                    'period' => '2022 - 2025',
                    'description' => 'Création d\'une application Laravel + Nuxt pour passage de commande & POS',
                ],
                [
                    'company' => 'Utopya.fr',
                    'title' => 'Responsable Technique',
                    'period' => '2020 - 2022',
                    'description' => 'Gestion du site Magento, sourcing Chine, accompagnement technique clients',
                ],
            ],
            'education' => [
                [
                    'school' => 'openClassrooms',
                    'degree' => 'Développeur Informatique',
                    'year' => '2024',
                ],
                [
                    'school' => 'Lycée du Hainaut, Valenciennes',
                    'degree' => 'Bac STT',
                    'year' => '2002',
                ],
            ],
            'projects' => [
                [
                    'name' => 'Meowtivate',
                    'description' => 'Saas de gestion de tâches pour enfants avec système de récompense',
                    'tech' => ['Laravel', 'Livewire', 'Alpine JS', 'Tailwind css', 'Flux UI'],
                    'url' => 'https://meowtivate.me',
                ],
                [
                    'name' => 'Wing Chun Dao Normandie',
                    'description' => 'Site multilingue d\'une école de wing chun avec backoffice pour gérer les demandes de souscriptions',
                    'tech' => ['Laravel', 'Livewire', 'Alpine JS', 'Tailwind css', 'Flowbite'],
                    'url' => 'https://wingchundao-normandie.fr',
                ],
                [
                    'name' => 'Anihome',
                    'description' => 'Site pour des petsitters avec backoffice pour gérer le contenu facilement',
                    'tech' => ['Laravel', 'Inertia', 'Vue JS', 'Tailwind css', 'Shadcn Vue'],
                    'url' => 'https://anihome.fr',
                ],
                [
                    'name' => 'Wendysdiner',
                    'description' => 'Création d\'une application Laravel + Nuxt pour passage de commande & POS. Paiements CB Revolut, gestion des créneaux horaires, notifs, emails',
                    'tech' => ['Laravel', 'Inertia', 'Vue JS', 'Tailwind css'],
                    'url' => 'https://wendysdiner.com',
                ],
                [
                    'name' => 'Trendylux.fr',
                    'description' => 'Thème 100% custom Woocommerce. Fonctionnalités métier custom (promos automatiques, catégories automatiques, catégories clients, CPT pour que l\'admin gère le contenu facilement)',
                    'tech' => ['Wordpress', 'Woocommerce', 'PHP', 'JS', 'Tailwind css'],
                    'url' => 'https://trendylux.fr',
                ],
            ],
            'skills' => [
                'Backend' => ['PHP 8+', 'Laravel 12', 'SQLite', 'MySQL', 'Redis', 'Inertia', 'GraphQL'],
                'Frontend' => ['Livewire 4', 'Tailwind CSS 4', 'Alpine.js', 'Vue JS', 'Nuxt', 'Flux UI', 'Nuxt UI'],
                'Tools' => ['Git', 'Vite', 'PHPUnit/Pest', 'Github Actions', 'PhpStorm', 'WebStorm', 'Composer', 'npm', 'Bash'],
                'CMS' => ['Magento', 'Wordpress'],
                'Os' => ['Debian based distro', 'Arch Linux'],
                'AI' => ['Gemini cli'],
            ],
        ]);
    }
}
