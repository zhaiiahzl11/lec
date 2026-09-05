<?php

namespace Database\Seeders;

use App\Models\Lecture;
use App\Models\Question;
use App\Models\Choice;
use Illuminate\Database\Seeder;

class HistologyLecture1Seeder extends Seeder
{
    public function run(): void
    {
        $lecture = Lecture::where('title', 'Like', '%Lecture 1 - The Cell%')->first();
        if (!$lecture) {
            $lecture = Lecture::create([
                'title' => 'Lecture 1 - The Cell',
                'description' => 'Human Histology: Cell Structure, Membranous and Nonmembranous Organelles, and the Nucleus.'
            ]);
        } else {
            $lecture->questions()->delete();
        }

        $questions = [
            ['What is the basic and structural unit of all multicellular organisms?', 'easy', [
                ['The cell', true], ['The tissue', false], ['The organ', false], ['The organism', false]
            ]],
            ['Which stain is considered acidophilic and appears pink to red under the microscope?', 'easy', [
                ['Eosin', true], ['Hematoxylin', false], ['Toluidine blue', false], ['Periodic acid-Schiff', false]
            ]],
            ['According to the Modified fluid mosaic model, what are incorporated within the gaps between phospholipids?', 'medium', [
                ['Cholesterol', true], ['Ribosomes', false], ['Glycogen', false], ['Centrioles', false]
            ]],
            ['Which organelle serves as a quality checkpoint and is highly developed in active secretory cells?', 'medium', [
                ['Rough Endoplasmic Reticulum', true], ['Smooth Endoplasmic Reticulum', false], ['Mitochondria', false], ['Peroxisome', false]
            ]],
            ['Which nonmembranous organelle is described as nonbranching rigid hollow tubes of polymerized proteins?', 'medium', [
                ['Microtubules', true], ['Actin Filaments', false], ['Intermediate Filaments', false], ['Centrioles', false]
            ]],
            ['What is the term for the "Wear and Tear" pigment that accumulates as the cell grows old and is an indicator of cellular stress?', 'hard', [
                ['Lipofuscin', true], ['Hemosiderin', false], ['Glycogen', false], ['Melanin', false]
            ]],
            ['Which type of chromatin is highly condensed and prominent in metabolically inactive cells?', 'medium', [
                ['Heterochromatin', true], ['Euchromatin', false], ['Nucleolus', false], ['Nucleoplasm', false]
            ]],
            ['Which cell death mechanism is characterized by cell shrinkage, plasma membrane blebbing, and fragmentation of the nucleus?', 'hard', [
                ['Apoptosis', true], ['Necrosis', false], ['Karyolysis', false], ['Pyknosis', false]
            ]],
            ['What is the function of the Golgi Apparatus?', 'medium', [
                ['Post-translational modification, sorting, and packaging of proteins', true], ['Generation of ATP for energy', false], ['Detoxification of xenobiotics', false], ['Degradation of damaged proteins', false]
            ]],
            ['Which organelle contains hydrolytic enzymes that degrade macromolecules derived from endocytosis?', 'medium', [
                ['Lysosome', true], ['Peroxisome', false], ['Exosome', false], ['Endosome', false]
            ]],
        ];

        foreach ($questions as $qData) {
            $question = Question::create([
                'lecture_id' => $lecture->id,
                'question' => $qData[0],
                'difficulty' => $qData[1]
            ]);

            foreach ($qData[2] as $choiceData) {
                Choice::create([
                    'question_id' => $question->id,
                    'choice_text' => $choiceData[0],
                    'is_correct' => $choiceData[1]
                ]);
            }
        }
    }
}
