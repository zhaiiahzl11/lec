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
                'description' => 'Human Histology: Connective Tissues, Fibers, Extracellular Matrix, and Connective Tissue Cells.',
                'is_previous' => false
            ]);
        } else {
            $lecture->update(['is_previous' => false]);
            $lecture->questions()->delete();
        }

        $questions = [
            // Overview & Embryonic Connective Tissues
            ['What are the two main components of connective tissue?', 'easy', [['Cells and Extracellular Matrix (ECM)', true], ['Cells and Epithelium', false], ['Protein fibers and Blood', false], ['Ground substance and Water', false]]],
            ['Connective tissue in the adult body primarily originates from which embryonic germ layer?', 'medium', [['Mesoderm', true], ['Ectoderm', false], ['Endoderm', false], ['Neural crest cells', false]]],
            ['Which specialized embryonic connective tissue is specifically found in the umbilical cord (Wharton\'s jelly)?', 'medium', [['Mucous connective tissue', true], ['Mesenchyme', false], ['Dense irregular connective tissue', false], ['Loose connective tissue', false]]],
            ['Mesenchyme is characterized by what type of cells?', 'hard', [['Small, spindle-shaped cells of relative uniform appearance', true], ['Large polyhedral cells filled with lipids', false], ['Tall columnar cells with microvilli', false], ['Multinucleated giant cells', false]]],
            // Connective Tissue Proper
            ['Loose Connective Tissue (Areolar Tissue) is primarily located where in relation to epithelia?', 'medium', [['Beneath epithelia (Lamina Propia)', true], ['Above epithelia', false], ['Replacing epithelia', false], ['In the cartilage matrix', false]]],
            ['Which type of connective tissue has abundant collagen fibers but relatively few cells and little ground substance?', 'easy', [['Dense Connective Tissue', true], ['Loose Connective Tissue', false], ['Mucous Connective Tissue', false], ['Mesenchyme', false]]],
            ['Dense regular connective tissue is characterized by fibers arranged in parallel arrays. Where is it primarily found?', 'medium', [['Tendons, ligaments, and aponeuroses', true], ['The submucosa of hollow organs', false], ['The dermis of the skin', false], ['The umbilical cord', false]]],
            ['In dense irregular connective tissue, fibers are arranged in bundles oriented in various directions. This allows the organ to:', 'hard', [['Withstand excessive stretching and multidirectional distortion', true], ['Provide unidirectional high tensile strength', false], ['Absorb nutrients effectively', false], ['Facilitate rapid diffusion of gases', false]]],
            // Connective Tissue Fibers
            ['Which type of connective tissue fiber is the most abundant structural component and provides remarkable high-tensile strength?', 'easy', [['Collagen fibers', true], ['Elastic fibers', false], ['Reticular fibers', false], ['Muscle fibers', false]]],
            ['Reticular fibers, which provide a supporting framework for cells in various organs and tissues, are primarily composed of which type of collagen?', 'hard', [['Type III Collagen', true], ['Type I Collagen', false], ['Type II Collagen', false], ['Type IV Collagen', false]]],
            ['Which collagen type provides resistance to force, tension, and stretch, and constitutes 90% of the body\'s collagen?', 'hard', [['Type I Collagen', true], ['Type II Collagen', false], ['Type III Collagen', false], ['Type IV Collagen', false]]],
            ['Elastic fibers are interwoven with collagen fibers to limit distensibility. They are composed primarily of elastin, which is approximately how much more flexible than collagen?', 'medium', [['1,000x', true], ['100x', false], ['10x', false], ['5,000x', false]]],
            // Clinical Correlation: Collagenopathies
            ['Which of the following conditions is a Type I Collagenopathy characterized by brittle bones and frequent fractures?', 'hard', [['Osteogenesis Imperfecta', true], ['Ehlers-Danlos syndrome', false], ['Alport syndrome', false], ['Kniest dysplasia', false]]],
            ['Alport syndrome involves kidney disease, hearing loss, and ocular lesions. It is associated with a defect in which collagen type?', 'hard', [['Type IV Collagen', true], ['Type I Collagen', false], ['Type III Collagen', false], ['Type VII Collagen', false]]],
            ['Which disease is a Type III Collagenopathy that can result in hypermobile joints, dislocations, and fragile skin?', 'medium', [['Ehlers-Danlos syndrome', true], ['Osteogenesis Imperfecta', false], ['Kindler syndrome', false], ['Kniest dysplasia', false]]],
            // Extracellular Matrix and Ground Substance
            ['What are the two main components of the Extracellular Matrix?', 'easy', [['Fibers and Ground Substance', true], ['Water and Lipids', false], ['Epithelium and Connective Tissue', false], ['Fibroblasts and Macrophages', false]]],
            ['Which glycosaminoglycan (GAG) is the most abundant and typically found in synovial fluid and cartilage?', 'hard', [['Hyaluronan / Hyaluronic Acid', true], ['Chondroitin sulfate', false], ['Heparan sulfate', false], ['Dermatan sulfate', false]]],
            ['Which multiadhesive glycoprotein helps cells attach to the extracellular matrix (ECM)?', 'hard', [['Fibronectin', true], ['Laminin', false], ['Tenascin', false], ['Decorin', false]]],
            ['What property of ground substance allows it to act as a diffusion barrier and provide cushioning?', 'medium', [['It is a viscous, gel-like substance with high water content', true], ['It is solid and calcified', false], ['It consists mostly of tightly packed collagen bundles', false], ['It is composed of lipid droplets', false]]],
            // Connective Tissue Cells
            ['What is the principal resident cell of connective tissue responsible for synthesizing all ECM components?', 'easy', [['Fibroblast', true], ['Macrophage', false], ['Mast cell', false], ['Adipocyte', false]]],
            ['Which modified fibroblasts have contractile properties and are important in wound contraction during tissue repair?', 'medium', [['Myofibroblasts', true], ['Macrophages', false], ['Plasma cells', false], ['Adipocytes', false]]],
            ['Macrophages are derived from which type of blood cell?', 'medium', [['Monocytes', true], ['Lymphocytes', false], ['Neutrophils', false], ['Eosinophils', false]]],
            ['Which wandering cells of the connective tissue produce antibodies and are characterized by a "clock face" chromatin pattern?', 'hard', [['Plasma Cells', true], ['Macrophages', false], ['Neutrophils', false], ['Monocytes', false]]],
            ['Which large ovoid cells are filled with granules containing histamine and heparin to mediate allergic responses?', 'medium', [['Mast Cells', true], ['Plasma Cells', false], ['Adipocytes', false], ['Lymphocytes', false]]],
            // Adipose Tissue
            ['Which type of adipose tissue is most common, making up 10% of body weight, and features unilocular adipocytes?', 'easy', [['White Adipose Tissue', true], ['Brown Adipose Tissue', false], ['Beige Adipose Tissue', false], ['Yellow Adipose Tissue', false]]],
            ['Which type of adipose tissue is abundant in newborns for heat production through non-shivering thermogenesis?', 'medium', [['Brown Adipose Tissue', true], ['White Adipose Tissue', false], ['Beige Adipose Tissue', false], ['Yellow Adipose Tissue', false]]]
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
