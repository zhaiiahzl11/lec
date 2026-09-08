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
                'description' => 'Human Histology: Cell Structure, Membranous and Nonmembranous Organelles, and the Nucleus.',
                'is_previous' => true,
                'category' => 'Histology'
            ]);
        } else {
            $lecture->update(['is_previous' => true, 'category' => 'Histology']);
            $lecture->questions()->delete();
        }

        $questions = [
            // Generalities and Staining
            ['What is the basic and structural unit of all multicellular organisms?', 'easy', [['The cell', true], ['The tissue', false], ['The organ', false], ['The organism', false]]],
            ['Which cell is commonly used by MedTechs to estimate the size of a cell without the use of special gadgets?', 'medium', [['Red Blood Cell', true], ['White Blood Cell', false], ['Nerve cell', false], ['Muscle cell', false]]],
            ['Why is a nerve cell stellate or angled in shape?', 'medium', [['Due to its cellular processes like axons and dendrites', true], ['Because it is exposed to hypertonic stressors', false], ['Because of its location on the basement membrane', false], ['Due to its lack of a distinct apical surface', false]]],
            ['What happens to the shape of an epithelial cell when it is in contact with a surface and neighboring cells?', 'medium', [['It flattens', true], ['It becomes spherical', false], ['It shrinks', false], ['It becomes spindle-shaped', false]]],
            ['In cell polarity, which surface rests on the basement membrane?', 'easy', [['Basal surface', true], ['Apical surface', false], ['Lateral surface', false], ['Free space surface', false]]],
            ['Which histologic stain is used to dye basic cellular components, making them appear pink to red?', 'easy', [['Eosin', true], ['Hematoxylin', false], ['Thionine', false], ['Periodic acid-Schiff', false]]],
            ['Which of the following cellular components is considered basophilic and stains blue to purple with Hematoxylin?', 'medium', [['Nucleus', true], ['Cytoskeleton', false], ['Collagen fibers', false], ['Red Blood Cells', false]]],
            ['According to Dr. Bajarias, why do Hematoxylin and Eosin stain the way they do?', 'hard', [['They are not considered basic or acidic dyes, they only bind to acidic or basic cellular components', true], ['They are strong acids that dissolve cellular membranes', false], ['Hematoxylin is a basic dye and Eosin is an acidic dye', false], ['They only stain the cell if it is actively dividing', false]]],
            ['Which of the following organelles is strictly classified as a MEMBRANOUS organelle?', 'medium', [['Golgi apparatus', true], ['Ribosomes', false], ['Centrioles', false], ['Microtubules', false]]],
            ['Which of the following organelles is classified as a NONMEMBRANOUS organelle?', 'medium', [['Proteasomes', true], ['Lysosomes', false], ['Endosomes', false], ['Peroxisome', false]]],
            
            // Plasma Membrane
            ['What forms the core of the amphipathic phospholipid bilayer in the plasma membrane?', 'medium', [['Nonpolar, hydrophobic fatty-acid tails facing inward', true], ['Polar, hydrophilic heads facing inward', false], ['Cholesterol molecules stacked together', false], ['Integral proteins forming a solid sheet', false]]],
            ['In the plasma membrane, which type of proteins are embedded within the layer?', 'easy', [['Integral proteins', true], ['Peripheral proteins', false], ['Cytoskeletal proteins', false], ['Glycocalyx proteins', false]]],
            ['What role does the Glycocalyx (Cell Coat) play in the cell?', 'hard', [['It serves as a cellular "ID" for cell recognition and cell interactions', true], ['It forms the rigid structural framework of the cytoskeleton', false], ['It digests waste materials within the cell', false], ['It is the primary site of ATP generation', false]]],
            ['Which component makes lipid rafts more ordered and less fluid than the surrounding membrane?', 'hard', [['Cholesterol and specific lipids', true], ['Glycoproteins and glycolipids', false], ['Integral and peripheral proteins', false], ['Actin filaments and microtubules', false]]],
            
            // Membranous Organelles (rER, sER, Golgi, Mitochondria, Endosomes, Lysosomes, Peroxisomes)
            ['Which organelle is a series of interconnected, flattened sacs called cisternae with attached ribosomes?', 'easy', [['Rough Endoplasmic Reticulum', true], ['Smooth Endoplasmic Reticulum', false], ['Golgi Apparatus', false], ['Mitochondria', false]]],
            ['The area of the cell that stains intensely with basic dye, representing the rough ER, is called the:', 'hard', [['Ergastoplasm', true], ['Cytoplasmic matrix', false], ['Centriole', false], ['Glycocalyx', false]]],
            ['Which of the following is a function of the Smooth Endoplasmic Reticulum?', 'medium', [['Detoxification of xenobiotics', true], ['Protein synthesis', false], ['Sorting and packaging of proteins', false], ['Digestion of cellular debris', false]]],
            ['In skeletal and cardiac muscles, the Smooth Endoplasmic Reticulum is specialized and called the:', 'medium', [['Sarcoplasmic reticulum', true], ['Ergastoplasm', false], ['Lipid raft', false], ['Multivesicular body', false]]],
            ['What is the primary function of the Golgi Apparatus?', 'medium', [['Post-translational modification, sorting, and packaging of proteins', true], ['Generation of ATP for energy', false], ['Degradation of macromolecules', false], ['Glycogen metabolism', false]]],
            ['In the Golgi Apparatus, which network represents the forming face near the rough ER?', 'hard', [['cis-Golgi network', true], ['trans-Golgi network', false], ['medial-Golgi network', false], ['Shenzhen network', false]]],
            ['Which of the following cells DO NOT contain mitochondria?', 'medium', [['RBCs and terminal keratinocytes', true], ['Nerve cells and muscle cells', false], ['Liver and kidney cells', false], ['Epithelial and connective tissue cells', false]]],
            ['Where does Mitochondrial DNA come from?', 'medium', [['Mothers', true], ['Fathers', false], ['Both parents', false], ['The nucleus of the cell', false]]],
            ['The inner mitochondrial membrane is arranged into folds to increase surface area. These folds are called:', 'easy', [['Cristae', true], ['Porins', false], ['Cisternae', false], ['Matrix', false]]],
            ['Which phospholipid makes the inner mitochondrial membrane impermeable to ions?', 'hard', [['Cardiolipin', true], ['Cholesterol', false], ['Lysobisphosphatidic acid', false], ['Sphingomyelin', false]]],
            ['What happens to early endosomes as they mature into late endosomes?', 'hard', [['They develop a more complex structure with onion-like internal membranes and become more acidic', true], ['They merge with the plasma membrane to form lipid rafts', false], ['They lose all their internal acidity and become alkaline', false], ['They transform directly into mitochondria', false]]],
            ['Exosomes are small, endosome-derived vesicles released into the extracellular environment. They are formed when the plasma membrane fuses with:', 'hard', [['Multivesicular Bodies (MVBs)', true], ['The nuclear envelope', false], ['The rough endoplasmic reticulum', false], ['Lysosomes', false]]],
            ['Why doesn\'t the membrane of a lysosome get degraded by its own hydrolytic enzymes?', 'hard', [['Presence of lysobisphosphatidic acid and high glycosylation of the luminal surface', true], ['Because it is made entirely of cholesterol', false], ['Due to the constant action of the Golgi apparatus replacing it', false], ['Because lysosomes do not actually contain hydrolytic enzymes', false]]],
            ['What maintains the acidic environment required for lysosomal hydrolytic enzymes to function?', 'medium', [['Proton (H*) pumps', true], ['Sodium-Potassium pumps', false], ['Calcium channels', false], ['Porins', false]]],
            ['Which small, spherical organelle contains oxidative enzymes, is abundant in the liver and kidney, and increases in response to diets and drugs?', 'medium', [['Peroxisome', true], ['Lysosome', false], ['Endosome', false], ['Proteasome', false]]],
            
            // Nonmembranous Organelles (Microtubules, Actin, IFs, Centrioles, Ribosomes, Proteasomes)
            ['Microtubules are described as:', 'medium', [['Nonbranching rigid hollow tubes of polymerized proteins', true], ['Solid, helical arrays of G-actin', false], ['Ropelike, nonpolar structures without enzymatic activity', false], ['Membrane-bound spheres containing oxidative enzymes', false]]],
            ['Actin filaments grow and move through a mechanism where actin is added to the plus end and dissociates from the minus end. This is called:', 'hard', [['Treadmilling', true], ['Autophagy', false], ['Endocytosis', false], ['Polymerization', false]]],
            ['Which of the following is a characteristic of Intermediate Filaments?', 'hard', [['They are ropelike, nonpolar, and do not assemble or disassemble', true], ['They are hollow tubes that originate from the MTOC', false], ['They grow exclusively at their plus (+) end', false], ['They are primarily responsible for muscle contraction', false]]],
            ['Which of the following is an example of a class of Intermediate Filaments?', 'hard', [['Lamins', true], ['Tubulin', false], ['Actin', false], ['Myosin', false]]],
            ['Centrioles are visible under a light microscope as two dots and have what type of orientation?', 'medium', [['Orthogonal, forming 90 degrees with each other', true], ['Parallel, forming straight lines', false], ['Random, scattered throughout the cytoplasm', false], ['Circular, forming a ring', false]]],
            ['What cell structure is required for the development of cilia?', 'medium', [['Basal bodies', true], ['Lipid rafts', false], ['Proteasomes', false], ['Peroxisomes', false]]],
            ['Which nonmembranous organelle enzymatically degrades damaged and unnecessary proteins into small polypeptides and amino acids?', 'medium', [['Proteasomes', true], ['Ribosomes', false], ['Lysosomes', false], ['Endosomes', false]]],
            
            // Inclusions and Cytosol
            ['Which cellular inclusion is known as the "Wear and Tear" pigment, accumulates as the cell grows old, and is an accurate indicator of cellular stress?', 'easy', [['Lipofuscin', true], ['Hemosiderin', false], ['Glycogen', false], ['Fat droplets', false]]],
            ['Hemosiderin is an iron-storage complex that is easily seen in the spleen. It is often mistaken for which other inclusion due to its similar color?', 'hard', [['Lipofuscin', true], ['Glycogen', false], ['Melanin', false], ['Viral proteins', false]]],
            ['Which storage material is NOT visible in the light microscope unless special fixatives and stains (like the PAS method) are used?', 'medium', [['Glycogen', true], ['Hemosiderin', false], ['Lipid Inclusions', false], ['Lipofuscin', false]]],
            ['Which inclusion appears as a space or hole in prepared tissues because it is extracted by organic solvents during preparation?', 'medium', [['Lipid Inclusions (Fat droplets)', true], ['Crystalline Inclusions', false], ['Hemosiderin', false], ['Glycogen', false]]],
            
            // Nucleus
            ['What is the term for highly condensed chromatin that is prominent in metabolically inactive cells and stains intensely with hematoxylin?', 'medium', [['Heterochromatin', true], ['Euchromatin', false], ['Nucleolus', false], ['Nucleoplasm', false]]],
            ['What is Euchromatin?', 'medium', [['Lightly staining material where most genes are located and "uncoiled" ready for transcription', true], ['Densely stained clumps of non-coding DNA', false], ['The double membrane system surrounding the nucleus', false], ['The site of ribosomal RNA synthesis', false]]],
            ['What is the primary function of the Nucleolus?', 'easy', [['Site of ribosomal RNA (rRNA) synthesis and ribosome assembly', true], ['To store glycogen', false], ['To package and sort proteins', false], ['To degrade damaged DNA', false]]],
            ['The Nuclear Envelope is composed of two membranes. The outer membrane resembles and is continuous with the membrane of which organelle?', 'hard', [['Endoplasmic reticulum', true], ['Golgi apparatus', false], ['Plasma membrane', false], ['Mitochondria', false]]],
            ['What structure supports the inner membrane of the nuclear envelope?', 'hard', [['A rigid network of intermediate protein filaments called the nuclear lamina', true], ['A layer of integral and peripheral proteins called the glycocalyx', false], ['The microtubule-organizing center', false], ['The cytoplasmic matrix', false]]],
            
            // Cell Death
            ['According to the lecture, which of the following is a characteristic feature of Apoptosis (programmed cell death)?', 'medium', [['Cell shrinkage', true], ['Cell swelling', false], ['Damage to the plasma membrane', false], ['Random DNA degradation', false]]],
            ['Which of the following features is indicative of Necrosis (nonprogrammed cell death)?', 'medium', [['Cell swelling and damage to the plasma membrane', true], ['Plasma membrane blebbing', false], ['Fragmentation of the nucleus', false], ['Release of Cytochrome C from mitochondria', false]]],
            ['In dying cells, what term describes the disappearance of the nucleus due to the dissolution of DNA by increased DNAse activity?', 'hard', [['Karyolysis', true], ['Pyknosis', false], ['Karyorrhexis', false], ['Autophagy', false]]],
            ['What does the term "Pyknosis" refer to in the context of nuclear alterations in dying cells?', 'hard', [['Shrinkage of the nucleus due to chromatin condensation', true], ['Fragmentation of the nucleus', false], ['Disappearance of the nucleus', false], ['Swelling of the nucleus', false]]],
            ['Which nuclear alteration is defined by the fragmentation of the nucleus?', 'medium', [['Karyorrhexis', true], ['Karyolysis', false], ['Pyknosis', false], ['Apoptosis', false]]]
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

