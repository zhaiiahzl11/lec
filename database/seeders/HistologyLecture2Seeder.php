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
                'description' => 'Human Histology: Epithelial Tissue, Classification, Specializations, and Glands.',
                'is_previous' => false
            ]);
        } else {
            $lecture->update(['is_previous' => false]);
            $lecture->questions()->delete();
        }

        $questions = [
            // General Characteristics
            ['Epithelium is an avascular tissue. How does it receive nutrients?', 'easy', [['Through diffusion from underlying blood vessels in connective tissues', true], ['Directly from its own blood vessels', false], ['From the free/apical domain', false], ['It does not require nutrients', false]]],
            ['Which functional surface domain of an epithelial cell faces the lumen or external environment?', 'easy', [['Apical domain', true], ['Lateral domain', false], ['Basal domain', false], ['Junctional domain', false]]],
            ['What structure anchors the basal surface of epithelial cells to the underlying connective tissue?', 'medium', [['Basement Membrane', true], ['Terminal Web', false], ['Macula adherens', false], ['Glycocalyx', false]]],
            // Classifications
            ['The classification of epithelial cells is traditionally based on which two features?', 'easy', [['Number of cell layers and shape of surface cells', true], ['Cell size and organ location', false], ['Presence of cilia and secretory function', false], ['Nuclear shape and cytoplasmic staining', false]]],
            ['Which type of epithelium is the thinnest and most delicate, often found lining the alveoli of the lungs?', 'medium', [['Simple Squamous Epithelium', true], ['Simple Cuboidal Epithelium', false], ['Simple Columnar Epithelium', false], ['Stratified Squamous Epithelium', false]]],
            ['Which type of simple epithelium is specialized for secretion and absorption and commonly lines kidney tubules and thyroid follicles?', 'medium', [['Simple Cuboidal Epithelium', true], ['Simple Squamous Epithelium', false], ['Simple Columnar Epithelium', false], ['Pseudostratified Epithelium', false]]],
            ['What type of epithelium lines the stomach and large intestine, specializing in absorption and secretion?', 'easy', [['Simple Columnar Epithelium', true], ['Simple Cuboidal Epithelium', false], ['Stratified Squamous Epithelium', false], ['Transitional Epithelium', false]]],
            ['Which type of epithelium is characterized by a single layer of cells that appears stratified because their nuclei are at multiple levels?', 'medium', [['Pseudostratified Columnar Epithelium', true], ['Stratified Squamous Epithelium', false], ['Transitional Epithelium', false], ['Stratified Columnar Epithelium', false]]],
            ['What is the primary function of the transitional epithelium (urothelium)?', 'medium', [['It shifts its cellular shape to expand surface area during distension', true], ['It provides mechanical protection against friction', false], ['It absorbs nutrients and fluids', false], ['It propels mucus using motile cilia', false]]],
            ['Stratified squamous epithelium of the skin (epidermis) is filled with which protein to form a waterproof barrier?', 'hard', [['Keratin', true], ['Collagen', false], ['Elastin', false], ['Mucin', false]]],
            // Metaplasia
            ['What is epithelial metaplasia?', 'medium', [['A reversible conversion of one mature epithelial cell type to another', true], ['The uncontrolled growth of epithelial cells forming a tumor', false], ['The process of epithelial cells undergoing apoptosis', false], ['The failure of epithelial cells to differentiate', false]]],
            ['Which form of epithelial metaplasia is commonly seen in the respiratory tract of chronic smokers?', 'hard', [['Pseudostratified columnar to Squamous metaplasia', true], ['Simple squamous to Simple columnar metaplasia', false], ['Transitional to Simple cuboidal metaplasia', false], ['Simple columnar to Stratified columnar metaplasia', false]]],
            // Glandular Epithelium
            ['Endocrine glands differ from exocrine glands because they:', 'easy', [['Lack a duct system and secrete hormones directly into the bloodstream', true], ['Secrete their products onto a surface directly', false], ['Always use holocrine secretion mechanisms', false], ['Are composed exclusively of single goblet cells', false]]],
            ['Which type of exocrine gland secretion involves the release of products via membrane-bound vesicles (exocytosis) without cell damage?', 'medium', [['Merocrine', true], ['Apocrine', false], ['Holocrine', false], ['Paracrine', false]]],
            ['In which exocrine secretion mechanism does the secretory product accumulate until the cell undergoes programmed cell death and is discharged (e.g., sebaceous glands)?', 'hard', [['Holocrine', true], ['Merocrine', false], ['Apocrine', false], ['Endocrine', false]]],
            ['Which type of gland secretes a viscous, slimy substance due to extensive glycosylation?', 'medium', [['Mucous Glands', true], ['Serous Glands', false], ['Endocrine Glands', false], ['Apocrine Glands', false]]],
            ['Serous demilunes, also called Crescents of Gianuzzi, are typically found in:', 'hard', [['Mixed salivary glands at the periphery of a mucous acinus', true], ['Pure serous glands like the parotid', false], ['Endocrine glands like the pancreas', false], ['Sebaceous glands of the skin', false]]],
            // Surface Specializations
            ['Which surface specialization increases the apical surface area for absorption and appears as a striated or brush border under a light microscope?', 'easy', [['Microvilli', true], ['Cilia', false], ['Stereocilia', false], ['Basal infoldings', false]]],
            ['Stereocilia are unusually long, immotile microvilli. They are primarily found in the male reproductive system and which other structure?', 'hard', [['Sensory epithelium of the inner ear', true], ['Respiratory tract', false], ['Gastrointestinal tract', false], ['Fallopian tubes', false]]],
            ['Motile cilia usually have what type of axonemal arrangement?', 'hard', [['9+2 arrangement', true], ['9+0 arrangement', false], ['6+3 arrangement', false], ['8+1 arrangement', false]]],
            // Intercellular Junctions
            ['What type of intercellular junction limits or prevents the paracellular movement of water and ions, forming a barrier between adjacent cells?', 'medium', [['Occluding Junctions (Tight Junctions)', true], ['Anchoring Junctions (Desmosomes)', false], ['Communicating Junctions (Gap Junctions)', false], ['Hemidesmosomes', false]]],
            ['Which junction provides a scattered, localized, spot-like adhesion that anchors the intermediate filaments?', 'hard', [['Macula adherens (desmosome)', true], ['Zonula adherens', false], ['Gap junction', false], ['Focal adhesion', false]]],
            ['Which type of junction allows for the exchange of ions and small metabolites between adjacent epithelial cells?', 'medium', [['Communicating (Gap) Junctions', true], ['Tight Junctions', false], ['Hemidesmosomes', false], ['Zonula occludens', false]]],
            ['Focal adhesions anchor actin filaments to which structure?', 'hard', [['The basement membrane', true], ['The apical domain', false], ['Adjacent epithelial cells', false], ['The microtubule organizing center', false]]],
            ['Basal membrane infoldings serve primarily to:', 'medium', [['Increase the cell surface area at the basal domain', true], ['Propel mucus along the apical surface', false], ['Provide mechanical strength to the lateral domain', false], ['Synthesize ribosomal RNA', false]]]
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
