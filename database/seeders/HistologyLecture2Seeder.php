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
                'is_previous' => true,
                'category' => 'Histology'
            ]);
        } else {
            $lecture->update(['is_previous' => true, 'category' => 'Histology']);
            $lecture->questions()->delete();
        }

        $questions = [
            // General & Principal Characteristics
            ['What defines epithelium as an avascular tissue?', 'easy', [['It has no blood vessels present in the epithelial layer', true], ['It does not require any nutrients to survive', false], ['It is composed entirely of dead cells', false], ['It contains an abundant network of capillaries', false]]],
            ['How do epithelial cells receive their nutrients if they are avascular?', 'medium', [['Through diffusion from the underlying blood vessels in the connective tissues', true], ['Through active transport from the apical domain', false], ['They produce their own nutrients through photosynthesis', false], ['Through direct contact with the external environment', false]]],
            ['Which cellular domain of an epithelial cell faces the lumen or the free space?', 'easy', [['Apical domain', true], ['Lateral domain', false], ['Basal domain', false], ['Junctional domain', false]]],
            ['What is the function of Cell-to-Cell Adhesion Molecules (C-CAMs) in epithelium?', 'medium', [['They form specialized junctions that allow epithelium to function as a barrier and prevent uncontrolled movement of materials', true], ['They generate ATP for cellular metabolism', false], ['They destroy pathogens that attempt to enter the cell', false], ['They synthesize hormones for endocrine secretion', false]]],
            ['What noncellular, protein-polysaccharide-rich layer attaches the basal surface of epithelial cells to underlying connective tissue?', 'easy', [['Basement Membrane', true], ['Glycocalyx', false], ['Plasma Membrane', false], ['Reticular Lamina', false]]],
            ['Which specialized epithelial cells lack a free surface but are still classified as epithelial cells?', 'medium', [['Epithelioid Cells', true], ['Goblet Cells', false], ['Umbrella Cells', false], ['Mesothelial Cells', false]]],
            ['Where are epithelioid cells typically found?', 'hard', [['In endocrine glands', true], ['In exocrine glands', false], ['Lining the respiratory tract', false], ['On the epidermis of the skin', false]]],
            
            // Classification by Layers and Shape
            ['Epithelium classification is traditionally based on which two features?', 'easy', [['Number of cell layers and shape of the surface cells', true], ['Presence of cilia and secretory function', false], ['Cell size and organ location', false], ['Nuclear shape and cytoplasmic staining', false]]],
            ['If all epithelial cells attach to the basement membrane, but they appear to be in multiple layers because their nuclei are at different heights, what is this called?', 'medium', [['Pseudostratified', true], ['Simple', false], ['Stratified', false], ['Transitional', false]]],
            ['In stratified epithelia, how is the overall shape of the epithelium assessed?', 'hard', [['Shape is assessed at the apical (surface) layer', true], ['Shape is assessed at the basal (bottom) layer', false], ['Shape is assessed at the intermediate layer', false], ['It is based on the average shape of all cells combined', false]]],
            ['Which type of epithelium is the thinnest and most delicate, often specialized for passive processes like diffusion and filtration?', 'medium', [['Simple Squamous Epithelium', true], ['Simple Cuboidal Epithelium', false], ['Simple Columnar Epithelium', false], ['Pseudostratified Epithelium', false]]],
            ['Endothelium and Mesothelium are specific examples of which type of epithelium?', 'hard', [['Simple Squamous Epithelium', true], ['Simple Cuboidal Epithelium', false], ['Stratified Squamous Epithelium', false], ['Transitional Epithelium', false]]],
            ['Which type of epithelium has cells that are approximately as tall as they are wide, with round, centrally located nuclei?', 'easy', [['Simple Cuboidal Epithelium', true], ['Simple Columnar Epithelium', false], ['Simple Squamous Epithelium', false], ['Stratified Cuboidal Epithelium', false]]],
            ['Which type of epithelium typically lines the stomach and large intestine?', 'medium', [['Simple Columnar Epithelium', true], ['Simple Cuboidal Epithelium', false], ['Pseudostratified Columnar Epithelium', false], ['Stratified Squamous Epithelium', false]]],
            ['In Simple Columnar Epithelium, where are the oval nuclei usually located?', 'medium', [['Near the basal portion of the cell', true], ['In the exact center of the cell', false], ['Near the apical portion of the cell', false], ['Scattered randomly throughout the cytoplasm', false]]],
            
            // Specific Types and Features
            ['Which type of cell is often interspersed between simple columnar cells to secrete mucus?', 'easy', [['Goblet cells', true], ['Umbrella cells', false], ['Epithelioid cells', false], ['Mesothelial cells', false]]],
            ['What is a key difference between ciliated and non-ciliated simple columnar epithelium?', 'hard', [['Ciliated moves mucus/particles (e.g., in fallopian tubes), while non-ciliated lines the GI tract and uses goblet cells for lubrication', true], ['Ciliated is found in the stomach, while non-ciliated is found in the respiratory tract', false], ['Ciliated has flat nuclei, while non-ciliated has round nuclei', false], ['Ciliated forms the epidermis, while non-ciliated forms the endothelium', false]]],
            ['In Stratified Squamous Epithelium, what is the function of the basal layer (Layer 1)?', 'hard', [['It contains stem cells with high mitotic activity responsible for continuous cell renewal', true], ['It forms a waterproof barrier composed of dead cells filled with keratin', false], ['It propels mucus using motile cilia', false], ['It absorbs nutrients and fluids directly from the lumen', false]]],
            ['What distinguishes keratinized from non-keratinized stratified squamous epithelium?', 'medium', [['Keratinized has dead cells filled with keratin (skin), while non-keratinized has living cells kept moist by secretions (vagina, oral mucosa)', true], ['Keratinized has a single layer of cells, while non-keratinized has multiple layers', false], ['Keratinized is found in the stomach, while non-keratinized is found in the lungs', false], ['There is no difference; they are synonymous terms', false]]],
            ['Stratified Columnar Epithelium is considered a rare epithelial type. Where can it be found?', 'hard', [['Male urethra and large excretory ducts (parotid, submandibular glands)', true], ['Epidermis of the skin', false], ['Lining of the stomach and intestines', false], ['Alveoli of the lungs', false]]],
            ['The respiratory tract is lined with pseudostratified ciliated columnar epithelium. What function do the cilia serve here?', 'medium', [['They form a mucociliary escalator to move mucus and trapped particles along the airway', true], ['They absorb oxygen directly into the bloodstream', false], ['They secrete digestive enzymes', false], ['They provide mechanical protection against high friction', false]]],
            ['Transitional Epithelium is also known as:', 'easy', [['Urothelium', true], ['Mesothelium', false], ['Endothelium', false], ['Neuroepithelium', false]]],
            ['What is the identifying feature of the surface cells in Transitional Epithelium?', 'medium', [['Presence of large dome-shaped cells called "umbrella cells"', true], ['Presence of flask-shaped goblet cells', false], ['Presence of a thick layer of dead, keratinized cells', false], ['Presence of unusually long, immotile stereocilia', false]]],
            ['What happens to Transitional Epithelium when the bladder is fully stretched (distended)?', 'hard', [['The dome-shaped umbrella cells flatten out to 2-3 layers to endure high hydrostatic pressures', true], ['The cells multiply rapidly to form 10-15 layers', false], ['The cells detach from the basement membrane and enter the urine', false], ['The epithelium transforms into pseudostratified columnar epithelium', false]]],
            
            // Metaplasia
            ['What is Epithelial Metaplasia?', 'medium', [['A reversible conversion of one mature epithelial cell type to another', true], ['An irreversible mutation leading to cancer', false], ['The natural shedding of dead cells from the epidermis', false], ['The process of cell death via apoptosis', false]]],
            ['In chronic smokers, what type of metaplasia commonly occurs in the lungs?', 'hard', [['Pseudostratified columnar transforms into squamous metaplasia', true], ['Simple squamous transforms into simple columnar', false], ['Transitional epithelium transforms into simple cuboidal', false], ['Stratified squamous transforms into transitional epithelium', false]]],
            ['Squamous metaplasia in the urothelium is notably associated with which condition?', 'hard', [['Parasitic infections, such as schistosomiasis', true], ['Chronic smoking', false], ['Vitamin C deficiency', false], ['Excessive alcohol consumption', false]]],
            
            // Glands and Secretion
            ['Which type of glands lack a duct system and secrete their products (hormones) directly into the connective tissue to enter the bloodstream?', 'easy', [['Endocrine glands', true], ['Exocrine glands', false], ['Apocrine glands', false], ['Merocrine glands', false]]],
            ['What is Paracrine Signaling?', 'medium', [['Cells secrete substances that do not reach the bloodstream but rather affect other nearby cells', true], ['Cells secrete hormones directly into the bloodstream', false], ['Cells secrete molecules that bind to receptors on their own cell surface', false], ['Cells secrete substances exclusively through a duct system', false]]],
            ['What is Autocrine Signaling?', 'medium', [['Cells secrete molecules that bind to receptors present on the same cell', true], ['Cells secrete substances to affect distant organs', false], ['Cells secrete mucus onto the apical surface', false], ['Cells release entire cellular fragments into a duct', false]]],
            ['Which exocrine secretion mechanism involves delivering products in membrane-bound vesicles that fuse with the plasma membrane (exocytosis)?', 'medium', [['Merocrine Secretion', true], ['Apocrine Secretion', false], ['Holocrine Secretion', false], ['Endocrine Secretion', false]]],
            ['Which exocrine secretion mechanism is found in the lactating mammary gland, where a large lipid droplet is released surrounded by a thin layer of cytoplasm?', 'hard', [['Apocrine Secretion', true], ['Merocrine Secretion', false], ['Holocrine Secretion', false], ['Paracrine Secretion', false]]],
            ['Which secretion mechanism involves the accumulation of product until the cell undergoes programmed cell death and is discharged into the gland lumen (e.g., sebaceous glands)?', 'hard', [['Holocrine Secretion', true], ['Merocrine Secretion', false], ['Apocrine Secretion', false], ['Autocrine Secretion', false]]],
            ['How do Mucous glands appear in a routine H&E stain?', 'medium', [['The cytoplasm appears pale, empty, or foamy because mucin is not strongly stained', true], ['They stain intensely dark red with eosin', false], ['They display a deeply basophilic, reticulated cytoplasm', false], ['They are completely invisible and cannot be seen', false]]],
            ['Serous glands (like the parotid gland) produce watery secretions. How does their apical cytoplasm typically stain?', 'hard', [['Intensely stained with eosin (acidophilic) if secretory granules are preserved', true], ['Pale or empty', false], ['Intensely stained with hematoxylin (basophilic)', false], ['It does not absorb any stain', false]]],
            ['What are Serous Demilunes (Crescents of Gianuzzi)?', 'hard', [['Crescent-shaped groups of serous cells located at the periphery of a mucous acinus', true], ['Unicellular glands that secrete pure mucus', false], ['Endocrine cells embedded within a sweat gland', false], ['Specialized umbrella cells in the bladder', false]]],
            ['Goblet cells are classified as what type of gland?', 'medium', [['Unicellular Exocrine Gland', true], ['Multicellular Endocrine Gland', false], ['Unicellular Endocrine Gland', false], ['Compound Acinar Gland', false]]],
            
            // Surface Specializations
            ['Which surface specialization consists of small, finger-like cytoplasmic processes containing a core of actin filaments to increase absorptive surface area?', 'easy', [['Microvilli', true], ['Cilia', false], ['Stereocilia', false], ['Desmosomes', false]]],
            ['Stereocilia are unusually long, immotile microvilli. Where are they primarily distributed?', 'hard', [['Male reproductive system and sensory epithelium of the inner ear', true], ['Respiratory tract and fallopian tubes', false], ['Stomach and large intestine', false], ['Epidermis and urinary bladder', false]]],
            ['Motile cilia arise from basal bodies and have what specific axonemal arrangement?', 'hard', [['9+2 arrangement', true], ['9+0 arrangement', false], ['6+3 arrangement', false], ['Actin core arrangement', false]]],
            ['Primary cilia function as chemosensors, osmosensors, and mechanosensors. Are they motile or immotile?', 'medium', [['Immotile (9+0 arrangement)', true], ['Motile (9+2 arrangement)', false], ['Highly motile, driven by myosin', false], ['Motile only during gastrulation', false]]],
            ['What type of cilia are found around the primitive node during gastrulation and are important for early embryonic development?', 'hard', [['Nodal cilia', true], ['Primary cilia', false], ['Motile cilia', false], ['Stereocilia', false]]],
            
            // Lateral and Basal Junctions
            ['Which type of intercellular junction limits or prevents the paracellular movement of water and molecules, acting as a tight barrier?', 'medium', [['Occluding Junctions (Zonula occludens)', true], ['Anchoring Junctions (Zonula adherens)', false], ['Communicating Junctions (Gap junctions)', false], ['Hemidesmosomes', false]]],
            ['Macula adherens (desmosome) provides a spot-like junction that anchors which part of the cytoskeleton?', 'hard', [['Intermediate filaments', true], ['Actin filaments', false], ['Microtubules', false], ['Myosin filaments', false]]],
            ['Zonula adherens encircles the cell below its tight junction and interacts with which filaments?', 'hard', [['Actin filaments', true], ['Intermediate filaments', false], ['Microtubules', false], ['Collagen fibers', false]]],
            ['Which junction consists of an accumulation of transmembrane channels called connexons, allowing exchange of ions and small metabolites?', 'easy', [['Communicating Junctions', true], ['Tight Junctions', false], ['Desmosomes', false], ['Hemidesmosomes', false]]],
            ['What structure anchors actin filaments specifically to the basement membrane?', 'hard', [['Focal adhesions', true], ['Hemidesmosomes', false], ['Desmosomes', false], ['Gap junctions', false]]],
            ['What structure anchors intermediate filaments to the basement membrane?', 'hard', [['Hemidesmosomes', true], ['Focal adhesions', false], ['Zonula adherens', false], ['Macula adherens', false]]],
            ['The basement membrane is composed of a basal lamina and a reticular lamina. The reticular lamina is attached via anchoring fibrils composed of:', 'hard', [['Type VII collagen', true], ['Type I collagen', false], ['Type II collagen', false], ['Actin and myosin', false]]],
            ['Basal Membrane Infoldings serve what primary function?', 'medium', [['Increase the cell surface area and facilitate interactions between cells and extracellular matrix proteins', true], ['Propel mucus along the basal surface', false], ['Synthesize keratin to form a waterproof barrier', false], ['Store large droplets of lipids', false]]]
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

