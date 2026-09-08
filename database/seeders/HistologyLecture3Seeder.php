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
                'is_previous' => true,
                'category' => 'Histology'
            ]);
        } else {
            $lecture->update(['is_previous' => true, 'category' => 'Histology']);
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
            ['Which type of adipose tissue is abundant in newborns for heat production through non-shivering thermogenesis?', 'medium', [['Brown Adipose Tissue', true], ['White Adipose Tissue', false], ['Beige Adipose Tissue', false], ['Yellow Adipose Tissue', false]]],
            // Additional Connective Tissue Questions
            ['Connective tissue in the head region is uniquely derived from which source?', 'hard', [['Ectoderm via neural crest cells', true], ['Mesoderm', false], ['Endoderm', false], ['Hematopoietic stem cells', false]]],
            ['Which embryonic tissue is characterized by cells that extend processes to form a 3D cellular network with gap junctions?', 'medium', [['Mesenchyme', true], ['Mucous connective tissue', false], ['Areolar tissue', false], ['Dense regular connective tissue', false]]],
            ['In tendons, what is the specialized ECM that surrounds the entire tendon and separates it from loose connective tissue?', 'hard', [['Epitendineum', true], ['Endotendineum', false], ['Perineurium', false], ['Epimysium', false]]],
            ['Which layer in a tendon divides it into fascicles and contains small blood vessels and nerves?', 'hard', [['Endotendineum', true], ['Epitendineum', false], ['Submucosa', false], ['Aponeurosis', false]]],
            ['Which type of connective tissue features fibers in regular, orthogonal arrays (oriented at 90 degrees to neighboring layers), making it important for structures like the cornea?', 'hard', [['Aponeuroses', true], ['Tendons', false], ['Ligaments', false], ['Dense irregular connective tissue', false]]],
            ['Which type of collagen is the main component of hyaline and elastic cartilage, providing resistance to pressure?', 'medium', [['Type II Collagen', true], ['Type I Collagen', false], ['Type III Collagen', false], ['Type IV Collagen', false]]],
            ['Which collagen type forms a support and filtration barrier and is found in all basal laminae of epithelial cells?', 'hard', [['Type IV Collagen', true], ['Type I Collagen', false], ['Type II Collagen', false], ['Type VII Collagen', false]]],
            ['Which collagen type functions to secure the basal lamina to underlying connective tissue fibers?', 'hard', [['Type VII Collagen', true], ['Type III Collagen', false], ['Type I Collagen', false], ['Type IV Collagen', false]]],
            ['How do reticular fibers typically appear when stained with silver stains (like Gomori or Wilder)?', 'medium', [['Black (argyrophilic)', true], ['Magenta/Purple', false], ['Blue', false], ['Green', false]]],
            ['What special stain is required to selectively stain elastic fibers?', 'medium', [['Orcein or resorcin-fuchsin', true], ['Periodic acid-Schiff (PAS)', false], ['Masson trichrome', false], ['Alcian blue', false]]],
            ['Which Type II collagenopathy is characterized by short stature, joint mobility issues, and blindness?', 'hard', [['Kniest dysplasia', true], ['Osteogenesis Imperfecta', false], ['Ehlers-Danlos syndrome', false], ['Alport syndrome', false]]],
            ['Which Type VII collagenopathy leads to severe skin blistering and scarring?', 'hard', [['Kindler syndrome', true], ['Alport syndrome', false], ['Kniest dysplasia', false], ['Ehlers-Danlos syndrome', false]]],
            ['What is the most important proteoglycan found in cartilage that provides a cushioning effect?', 'medium', [['Aggrecan', true], ['Decorin', false], ['Syndecon', false], ['Heparan sulfate', false]]],
            ['Which multiadhesive glycoprotein is primarily found in basement membranes and anchors epithelial cells?', 'hard', [['Laminin', true], ['Fibronectin', false], ['Tenascin', false], ['Decorin', false]]],
            ['Which multiadhesive glycoprotein is particularly important in embryonic development and wound healing?', 'hard', [['Tenascin', true], ['Laminin', false], ['Fibronectin', false], ['Syndecon', false]]],
            ['Which wandering cells are the smallest and migrate to connective tissue for immune responses?', 'easy', [['Lymphocytes', true], ['Neutrophils', false], ['Monocytes', false], ['Eosinophils', false]]],
            ['Which cells wrap around capillaries and venules, acting as mesenchymal stem cells for new blood vessel development?', 'hard', [['Pericytes', true], ['Plasma cells', false], ['Mast cells', false], ['Fibroblasts', false]]],
            ['Which type of adipose tissue has a flattened nucleus displaced to the periphery, creating a "signet-ring" appearance?', 'easy', [['White Adipose Tissue', true], ['Brown Adipose Tissue', false], ['Beige Adipose Tissue', false], ['Reticular Adipose Tissue', false]]],
            ['Beige adipose tissue is an intermediate form that is also known by what other name?', 'medium', [['Brite (brown-in-white) adipose tissue', true], ['Yellow adipose tissue', false], ['Mucous adipose tissue', false], ['Mesenchymal adipose tissue', false]]],
            ['Which protein in brown adipose tissue mitochondria uncouples oxidative phosphorylation to release energy as heat rather than ATP?', 'hard', [['UCP-1 (thermogenin)', true], ['Leptin', false], ['Collagen type I', false], ['Aggrecan', false]]],
            ['What hormone is secreted by white adipose tissue to help regulate appetite and homeostasis?', 'medium', [['Leptin', true], ['Insulin', false], ['Histamine', false], ['Heparin', false]]],
            ['Monocytes from the blood can migrate into connective tissues and differentiate into which type of cell?', 'medium', [['Macrophages', true], ['Plasma cells', false], ['Mast cells', false], ['Fibroblasts', false]]],
            ['Which type of connective tissue fibers are thinner than collagen, arrange in a branching pattern to form a 3D network, and allow tissues to respond to stretch and distension?', 'easy', [['Elastic fibers', true], ['Reticular fibers', false], ['Collagen Type I fibers', false], ['Muscle fibers', false]]],
            ['White adipose tissue can transform into brown-like (beige) tissue in response to which of the following?', 'medium', [['Cold exposure, exercise, or hormones (norepinephrine)', true], ['Heat exposure and sedentary lifestyle', false], ['High carbohydrate diets', false], ['Bacterial infections', false]]]
        ];

        foreach ($questions as $qData) {
            $question = Question::create([
                'lecture_id' => $lecture->id,
                'question' => $qData[0],
                'difficulty' => $qData[1]
            ]);

            $choices = $qData[2];
            shuffle($choices);
            foreach ($choices as $choiceData) {
                Choice::create([
                    'question_id' => $question->id,
                    'choice_text' => $choiceData[0],
                    'is_correct' => $choiceData[1]
                ]);
            }
        }
    }
}

