<?php

namespace Database\Seeders;

use App\Models\Lecture;
use App\Models\Question;
use App\Models\Choice;
use Illuminate\Database\Seeder;

class HistologyLecture2Seeder extends Seeder
{
    public function run(): void
    {
        $lecture = Lecture::where('title', 'Like', '%Lecture 2 - Epithelium%')->first();
        if (!$lecture) {
            $lecture = Lecture::create([
                'title' => 'Lecture 2 - Epithelium',
                'description' => 'Human Histology: Epithelial Tissue, Classification, Specializations, and Glands.'
            ]);
        } else {
            $lecture->questions()->delete();
        }

        $questions = [
            ['Epithelium is an avascular tissue. How does it receive nutrients?', 'medium', [
                ['Through diffusion from underlying blood vessels in connective tissues', true], ['Directly from its own blood vessels', false], ['From the free/apical domain', false], ['It does not require nutrients', false]
            ]],
            ['Which type of epithelium is the thinnest and most delicate, often found lining the alveoli of the lungs?', 'easy', [
                ['Simple Squamous Epithelium', true], ['Simple Cuboidal Epithelium', false], ['Simple Columnar Epithelium', false], ['Stratified Squamous Epithelium', false]
            ]],
            ['What is the primary function of the transitional epithelium (urothelium)?', 'medium', [
                ['It shifts its cellular shape to expand surface area during distension', true], ['It provides mechanical protection against friction', false], ['It absorbs nutrients and fluids', false], ['It propels mucus using motile cilia', false]
            ]],
            ['Which form of epithelial metaplasia is commonly seen in the respiratory tract of chronic smokers?', 'hard', [
                ['Pseudostratified columnar to Stratified squamous metaplasia', true], ['Simple squamous to Simple columnar metaplasia', false], ['Transitional to Simple cuboidal metaplasia', false], ['Simple columnar to Stratified columnar metaplasia', false]
            ]],
            ['In which exocrine secretion mechanism does the secretory product accumulate until the cell undergoes programmed cell death and is discharged?', 'hard', [
                ['Holocrine', true], ['Merocrine', false], ['Apocrine', false], ['Endocrine', false]
            ]],
            ['Which surface specialization increases the apical surface area for absorption and appears as a striated or brush border under a light microscope?', 'easy', [
                ['Microvilli', true], ['Cilia', false], ['Stereocilia', false], ['Basal infoldings', false]
            ]],
            ['What type of intercellular junction limits or prevents the paracellular movement of water and ions, forming a barrier between adjacent cells?', 'medium', [
                ['Occluding Junctions (Tight Junctions)', true], ['Anchoring Junctions (Desmosomes)', false], ['Communicating Junctions (Gap Junctions)', false], ['Hemidesmosomes', false]
            ]],
            ['Which type of epithelium is characterized by a single layer of cells that appears stratified because their nuclei are at multiple levels?', 'medium', [
                ['Pseudostratified Columnar Epithelium', true], ['Stratified Squamous Epithelium', false], ['Transitional Epithelium', false], ['Stratified Columnar Epithelium', false]
            ]],
            ['Which type of exocrine gland secretion involves the release of products via membrane-bound vesicles (exocytosis)?', 'medium', [
                ['Merocrine', true], ['Apocrine', false], ['Holocrine', false], ['Paracrine', false]
            ]],
            ['What structure anchors the basal surface of epithelial cells to the underlying reticular lamina (connective tissue)?', 'hard', [
                ['Basement Membrane', true], ['Apical Domain', false], ['Lateral Domain', false], ['Terminal Web', false]
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
