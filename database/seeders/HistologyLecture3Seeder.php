<?php

namespace Database\Seeders;

use App\Models\Lecture;
use App\Models\Question;
use App\Models\Choice;
use Illuminate\Database\Seeder;

class HistologyLecture3Seeder extends Seeder
{
    public function run(): void
    {
        $lecture = Lecture::where('title', 'Like', '%Lecture 3 - Connective Tissue%')->first();
        if (!$lecture) {
            $lecture = Lecture::create([
                'title' => 'Lecture 3 - Connective Tissue',
                'description' => 'Human Histology: Connective Tissues, Fibers, Extracellular Matrix, and Connective Tissue Cells.'
            ]);
        } else {
            $lecture->questions()->delete();
        }

        $questions = [
            ['What are the two main components of connective tissue?', 'easy', [
                ['Cells and Extracellular Matrix (ECM)', true], ['Cells and Epithelium', false], ['Protein fibers and Blood', false], ['Ground substance and Water', false]
            ]],
            ['Which specialized embryonic connective tissue is specifically found in the umbilical cord (Wharton\'s jelly)?', 'medium', [
                ['Mucous connective tissue', true], ['Mesenchyme', false], ['Dense irregular connective tissue', false], ['Loose connective tissue', false]
            ]],
            ['Dense regular connective tissue is primarily found in:', 'medium', [
                ['Tendons, ligaments, and aponeuroses', true], ['The submucosa of hollow organs', false], ['The dermis of the skin', false], ['The umbilical cord', false]
            ]],
            ['Which type of connective tissue fiber is the most abundant structural component and provides remarkable high-tensile strength?', 'easy', [
                ['Collagen fibers', true], ['Elastic fibers', false], ['Reticular fibers', false], ['Muscle fibers', false]
            ]],
            ['Reticular fibers, which provide a supporting framework for cells in various organs and tissues, are primarily composed of which type of collagen?', 'hard', [
                ['Type III Collagen', true], ['Type I Collagen', false], ['Type II Collagen', false], ['Type IV Collagen', false]
            ]],
            ['Which of the following conditions is a Type I Collagenopathy characterized by brittle bones and frequent fractures?', 'hard', [
                ['Osteogenesis Imperfecta', true], ['Ehlers-Danlos syndrome', false], ['Alport syndrome', false], ['Kniest dysplasia', false]
            ]],
            ['What is the principal resident cell of connective tissue responsible for synthesizing all ECM components?', 'easy', [
                ['Fibroblast', true], ['Macrophage', false], ['Mast cell', false], ['Adipocyte', false]
            ]],
            ['Which wandering cells of the connective tissue produce antibodies and are characterized by a "clock face" chromatin pattern?', 'medium', [
                ['Plasma Cells', true], ['Macrophages', false], ['Neutrophils', false], ['Monocytes', false]
            ]],
            ['Which type of adipose tissue is abundant in newborns for heat production through non-shivering thermogenesis?', 'medium', [
                ['Brown Adipose Tissue', true], ['White Adipose Tissue', false], ['Beige Adipose Tissue', false], ['Yellow Adipose Tissue', false]
            ]],
            ['Which glycosaminoglycan (GAG) is the most abundant and typically found in synovial fluid and cartilage?', 'hard', [
                ['Hyaluronan / Hyaluronic Acid', true], ['Chondroitin sulfate', false], ['Heparan sulfate', false], ['Dermatan sulfate', false]
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
