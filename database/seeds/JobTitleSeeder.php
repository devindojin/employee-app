<?php

use Illuminate\Database\Seeder;

class JobTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('job_titles')->insert([
            ['job_title' => '-None-'],
			['job_title' => 'Architecte paysagiste'],
			['job_title' => 'Concepteur paysagiste'],
			['job_title' => 'Infographiste en paysage'],
			['job_title' => "Ingénieur bureau d'études"],
			['job_title' => "Responsable bureau d'études"],
			['job_title' => "Chargé d'affaires"],
			['job_title' => 'Chef de chantier'],
			['job_title' => "Chef d'équipe en création / entretien"],
			['job_title' => "chef d'équipe en maçonnerie"],
			['job_title' => 'Conducteur de travaux'],
			['job_title' => 'Formateur / Enseignant'],
			['job_title' => 'Elagueur / Elagueur-Grimpeur'],
			['job_title' => "Conducteur d'engins"],
			['job_title' => 'Homme de Pied'],
			['job_title' => "Installateur de systèmes d'arrosage / Eclairage"],
			['job_title' => 'Jardinier Botaniste'],
			['job_title' => 'Jardinier Paysagiste en création / entretien'],
			['job_title' => 'Manœuvre Espaces verts'],
			['job_title' => 'Maçon Paysagiste'],
			['job_title' => 'Mécanicien agricole'],
			['job_title' => 'Menuisier'],
			['job_title' => 'Ouvrier paysagiste en création / entretien'],
			['job_title' => 'Ouvrier paysagiste en terrassement'],
			['job_title' => 'Paysagiste concepteur'],
			['job_title' => "Paysagiste d'intérieur"],
			['job_title' => 'Technicien piscine'],
			['job_title' => 'Pépinièriste']
        ]);
    }
}
