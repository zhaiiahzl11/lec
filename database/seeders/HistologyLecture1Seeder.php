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
                'is_previous' => false
            ]);
        } else {
            $lecture->update(['is_previous' => false]);
            $lecture->questions()->delete();
        }

        $questions = [
            // Generalities and Staining
            ['What is the basic and structural unit of all multicellular organisms?', 'easy', [['The cell', true], ['The tissue', false], ['The organ', false], ['The organism', false]]],
            ['Which stain is considered acidophilic and appears pink to red under the microscope?', 'easy', [['Eosin', true], ['Hematoxylin', false], ['Toluidine blue', false], ['Periodic acid-Schiff', false]]],
            ['Which of the following cellular components is stained blue to purple by hematoxylin?', 'medium', [['Nucleus', true], ['Collagen fibers', false], ['Red Blood Cells', false], ['Cytoskeleton', false]]],
            ['What shape does a nerve cell typically have due to its specialized function with axons and dendrites?', 'easy', [['Stellate or angled', true], ['Spherical', false], ['Spindle shaped', false], ['Columnar', false]]],
            ['To estimate the size of a cell without special instruments, it is commonly compared to which of the following?', 'medium', [['Red Blood Cell', true], ['Nerve cell', false], ['Muscle cell', false], ['Epithelial cell', false]]],
            ['Cell polarity refers to the presence of distinct basal and apical surfaces. The basal surface typically rests on the:', 'medium', [['Basement membrane', true], ['Cytoplasmic matrix', false], ['Microtubule organizing center', false], ['Apical domain', false]]],
            // Plasma Membrane and Compartments
            ['According to the Modified fluid mosaic model, what components are incorporated within the gaps between phospholipids?', 'medium', [['Cholesterol', true], ['Ribosomes', false], ['Glycogen', false], ['Centrioles', false]]],
            ['What structures are small, thicker microdomains enriched with cholesterol and specific lipids that make the membrane less fluid?', 'hard', [['Lipid Rafts', true], ['Glycocalyx', false], ['Integral proteins', false], ['Peripheral proteins', false]]],
            ['Which layer of the plasma membrane serves as a cellular "ID" for cell recognition and plays a role in cell interactions?', 'medium', [['Glycocalyx (Cell Coat)', true], ['Phospholipid bilayer', false], ['Lipid rafts', false], ['Integral proteins', false]]],
            // Membranous Organelles
            ['Which organelle serves as a quality checkpoint and is highly developed in active secretory cells?', 'medium', [['Rough Endoplasmic Reticulum', true], ['Smooth Endoplasmic Reticulum', false], ['Mitochondria', false], ['Peroxisome', false]]],
            ['The smooth endoplasmic reticulum is responsible for which of the following functions?', 'hard', [['Glycogen metabolism and detoxification of xenobiotics', true], ['Protein synthesis', false], ['Digestion of cellular debris', false], ['Organization of microtubules', false]]],
            ['What is the primary function of the Golgi Apparatus?', 'medium', [['Post-translational modification, sorting, and packaging of proteins', true], ['Generation of ATP for energy', false], ['Detoxification of xenobiotics', false], ['Degradation of damaged proteins', false]]],
            ['Which organelle contains hydrolytic enzymes that degrade macromolecules derived from endocytosis?', 'medium', [['Lysosome', true], ['Peroxisome', false], ['Exosome', false], ['Endosome', false]]],
            ['Peroxisomes contain oxidative enzymes. They are abundant in which organs?', 'hard', [['Liver and kidney', true], ['Heart and lungs', false], ['Brain and spinal cord', false], ['Skin and muscles', false]]],
            ['Mitochondria possess their own genome. From which parent is the mitochondrial DNA inherited?', 'easy', [['Mother', true], ['Father', false], ['Both parents equally', false], ['Neither', false]]],
            ['Which enzyme systems are found in the inner mitochondrial membrane (cristae)?', 'hard', [['Respiratory transport chain enzymes', true], ['Lysosomal hydrolases', false], ['Peroxidase and catalase', false], ['Ribosomal RNA polymerases', false]]],
            // Nonmembranous Organelles
            ['Which nonmembranous organelle is described as nonbranching rigid hollow tubes of polymerized proteins?', 'medium', [['Microtubules', true], ['Actin Filaments', false], ['Intermediate Filaments', false], ['Centrioles', false]]],
            ['What is the mechanism by which actin filaments grow at the plus end and dissociate from the minus end resulting in movement?', 'hard', [['Treadmilling', true], ['Autophagy', false], ['Endocytosis', false], ['Polymerization cascade', false]]],
            ['Intermediate filaments are ropelike, nonpolar structures. Which of the following is an example of an intermediate filament?', 'hard', [['Keratin', true], ['Tubulin', false], ['G-actin', false], ['Myosin', false]]],
            ['Where is the microtubule-organizing center (MTOC) usually located in relation to the nucleus?', 'medium', [['Close to the nucleus', true], ['At the apical surface', false], ['Inside the nucleoplasm', false], ['Embedded in the plasma membrane', false]]],
            // Inclusions and Cytosol
            ['What is the term for the "Wear and Tear" pigment that accumulates as the cell grows old and is an indicator of cellular stress?', 'medium', [['Lipofuscin', true], ['Hemosiderin', false], ['Glycogen', false], ['Melanin', false]]],
            ['Hemosiderin is an iron-storage complex in the cytoplasm. It is easily seen in which organ?', 'hard', [['Spleen', true], ['Kidney', false], ['Heart', false], ['Brain', false]]],
            // The Nucleus and Cell Death
            ['Which type of chromatin is highly condensed and prominent in metabolically inactive cells?', 'easy', [['Heterochromatin', true], ['Euchromatin', false], ['Nucleolus', false], ['Nucleoplasm', false]]],
            ['What is the primary function of the nucleolus?', 'medium', [['Site of rRNA synthesis and ribosome assembly', true], ['Storage of glycogen', false], ['Packaging of secretory proteins', false], ['Generation of ATP', false]]],
            ['Which cell death mechanism is characterized by cell shrinkage, plasma membrane blebbing, and fragmentation of the nucleus?', 'hard', [['Apoptosis', true], ['Necrosis', false], ['Karyolysis', false], ['Pyknosis', false]]]
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
