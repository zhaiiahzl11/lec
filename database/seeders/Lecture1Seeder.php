<?php

namespace Database\Seeders;

use App\Models\Lecture;
use App\Models\Question;
use App\Models\Choice;
use Illuminate\Database\Seeder;

class Lecture1Seeder extends Seeder
{
    public function run(): void
    {
        $lecture = Lecture::where('title', 'Like', '%Foundations of Public Health%')->first();
        if (!$lecture) {
            $lecture = Lecture::create([
                'title' => 'Lecture 1 - Foundations of Public Health',
                'description' => 'Comprehensive introduction to the history, evolution, and core concepts of public health and community organizing.',
                'is_previous' => true,
                'category' => 'Public Health'
            ]);
        } else {
            $lecture->update(['is_previous' => true, 'category' => 'Public Health']);
            $lecture->questions()->delete();
        }

        $questions = [
            // Historical Roots
            ['In Indigenous and Tribal Societies, diseases were often believed to be caused by:', 'easy', [
                ['Malevolent spirits or bad luck', true], ['Bacterial infections', false], ['Poor nutrition', false], ['Contaminated water', false]
            ]],
            ['Which ancient civilization was among the first to develop basic medical skills setting a foundation for organized health practice?', 'medium', [
                ['Babylonians/Mesopotamians', true], ['Greeks', false], ['Romans', false], ['Hebrews', false]
            ]],
            ['In Ancient Egypt, physicians were mostly:', 'medium', [
                ['Priests', true], ['Military leaders', false], ['Slaves', false], ['Merchants', false]
            ]],
            ['Which civilization prioritized sanitation by constructing earth privies (early toilets) and public drainage systems?', 'easy', [
                ['Ancient Egyptians', true], ['Babylonians', false], ['Greeks', false], ['Romans', false]
            ]],
            ['Acupuncture therapy, believed to restore balance within the body, originated from which civilization?', 'easy', [
                ['Chinese', true], ['Hebrews', false], ['Greeks', false], ['Egyptians', false]
            ]],
            ['The Hebrew Mosaic Law was notable for stressing:', 'hard', [
                ['Prevention of disease and regulation of personal/community hygiene', true], ['The use of advanced surgical techniques', false], ['The discovery of microorganisms', false], ['Building complex aqueducts', false]
            ]],
            ['Which group practiced the isolation of lepers to prevent the spread of disease?', 'medium', [
                ['Hebrews', true], ['Babylonians', false], ['Chinese', false], ['Romans', false]
            ]],
            // Greeks and Romans
            ['Who were the pioneers in linking health directly to the environment?', 'medium', [
                ['Greeks', true], ['Romans', false], ['Egyptians', false], ['Hebrews', false]
            ]],
            ['The concept of the "Four Humors" (Phlegm, Blood, Yellow Bile, Black Bile) was developed by the:', 'easy', [
                ['Greeks', true], ['Romans', false], ['Egyptians', false], ['Chinese', false]
            ]],
            ['Who is often referred to as the father of modern medicine?', 'easy', [
                ['Hippocrates', true], ['Galen', false], ['Avicenna', false], ['John Snow', false]
            ]],
            ['Which civilization was the first to provide organized medical care primarily for their military legions?', 'medium', [
                ['Romans', true], ['Greeks', false], ['Egyptians', false], ['Hebrews', false]
            ]],
            ['The Romans emphasized which of the following approaches to healthcare?', 'hard', [
                ['Prevention over cure', true], ['Cure over prevention', false], ['Spiritual healing over medicine', false], ['Individual treatment over community welfare', false]
            ]],
            ['Which Greek physician migrated to Rome and became the foundation for the study of Human Anatomy for 1500 years?', 'medium', [
                ['Galen', true], ['Hippocrates', false], ['Constantine', false], ['Aristotle', false]
            ]],
            // Middle Ages
            ['During the Middle Ages, what was the only unifying force that preserved Greco-Roman learning and culture?', 'easy', [
                ['Christianity', true], ['The Roman Empire', false], ['The Feudal Lords', false], ['The Islamic Empire', false]
            ]],
            ['The most devastating epidemic during the Middle Ages, which wiped out 3/4 of Europe and Asia, was:', 'easy', [
                ['The Bubonic Plague', true], ['Cholera', false], ['Smallpox', false], ['Leprosy', false]
            ]],
            ['During the Middle Ages, what was considered the most critical public health concern that led to the establishment of "leprosia"?', 'medium', [
                ['Leprosy', true], ['Malaria', false], ['Tuberculosis', false], ['Syphilis', false]
            ]],
            // Salerno Medical School
            ['What was notable about the Salerno Medical School (Schola Medicina Salernitana)?', 'hard', [
                ['It was a lay organization independent of the church and welcomed students of any race or creed', true], ['It was the first medical school strictly controlled by the Pope', false], ['It only allowed male students from noble families', false], ['It focused entirely on spiritual healing rituals', false]
            ]],
            ['Who is known as the "Father of Pediatrics" and authored "The Diseases of Children"?', 'hard', [
                ['Al-Razi', true], ['Avicenna', false], ['Constantine the African', false], ['Galen', false]
            ]],
            ['Who authored "The Canon of Medicine", which served as a major reference book until the 16th century?', 'medium', [
                ['Avicenna', true], ['Al-Razi', false], ['Hippocrates', false], ['Andreas Vesalius', false]
            ]],
            // Renaissance & Scholars
            ['Who expanded the knowledge on how epidemics and infections are spread during the Renaissance?', 'hard', [
                ['Girolamo Francastoro', true], ['Andreas Vesalius', false], ['William Harvey', false], ['Antonie van Leeuwenhoek', false]
            ]],
            ['Who authored the "Structure of the Human Body"?', 'medium', [
                ['Andreas Vesalius', true], ['Girolamo Francastoro', false], ['William Harvey', false], ['Galen', false]
            ]],
            ['Who used a crude microscope to discover bacteria microorganisms?', 'easy', [
                ['Antonie van Leeuwenhoek', true], ['William Harvey', false], ['Robert Koch', false], ['Louis Pasteur', false]
            ]],
            // Colonial & Industrial
            ['During the Colonial Period, what was a negative health impact of the Galleon Trade?', 'medium', [
                ['The exchange of diseases, such as parasites, between colonizers and the colonized', true], ['The introduction of fast food diets', false], ['The complete destruction of local medical herbs', false], ['The spread of industrial pollution', false]
            ]],
            ['Who discovered that malarial parasites were transmitted by mosquitoes?', 'hard', [
                ['Ronald Ross', true], ['Charles Laveran', false], ['Edward Jenner', false], ['John Snow', false]
            ]],
            ['Who is known as the Father of Immunology for developing the smallpox vaccine?', 'easy', [
                ['Edward Jenner', true], ['Louis Pasteur', false], ['Robert Koch', false], ['Alexander Fleming', false]
            ]],
            ['The rapid growth of industries during the Industrial Revolution led to overcrowding, which directly caused:', 'medium', [
                ['Poor sanitation and preventable diseases', true], ['An immediate improvement in public health', false], ['The eradication of infectious diseases', false], ['The discovery of penicillin', false]
            ]],
            ['Who is known as the Father of Epidemiology for tracing a cholera outbreak to a contaminated water pump?', 'medium', [
                ['Dr. John Snow', true], ['Edwin Chadwick', false], ['Robert Koch', false], ['Louis Pasteur', false]
            ]],
            ['Who pioneered the field of bacteriology and identified specific microorganisms for Tuberculosis and Anthrax?', 'hard', [
                ['Robert Koch', true], ['Louis Pasteur', false], ['John Snow', false], ['Edward Jenner', false]
            ]],
            // Milestones
            ['In what year was the Elizabethan Poor Law written?', 'hard', [
                ['1601', true], ['1789', false], ['1855', false], ['1946', false]
            ]],
            ['When was the World Health Organization (WHO) established?', 'easy', [
                ['1948', true], ['1946', false], ['1928', false], ['1977', false]
            ]],
            ['What major global health milestone occurred in 1977?', 'medium', [
                ['Smallpox was eventually eradicated', true], ['The Ebola virus was discovered', false], ['Penicillin was discovered', false], ['The polio vaccine was developed', false]
            ]],
            // 20th Century & Conceptual Evolution
            ['Which of the following was a major achievement of public health in the 20th century?', 'easy', [
                ['Fluoridation of drinking water', true], ['Discovery of the four humors', false], ['Eradication of COVID-19', false], ['Invention of acupuncture', false]
            ]],
            ['The Disease Control Phase (1880-1920) focused primarily on:', 'medium', [
                ['Controlling the physical environment, sanitary regulations, and vaccinations', true], ['Promoting healthier lifestyles and preventive care', false], ['Social determinants of health and equity', false], ['Universal healthcare coverage', false]
            ]],
            ['The Health Promotion Phase (1920-1960) shifted the focus from the environment to:', 'medium', [
                ['The individual and preventive care', true], ['Universal healthcare coverage', false], ['Social infrastructure', false], ['Sanitary regulations', false]
            ]],
            ['During the Social Engineering Phase (1960-1980), what type of diseases began to rise as a chronic burden on society?', 'hard', [
                ['Chronic diseases such as cancer, diabetes, and cardiovascular diseases', true], ['Infectious diseases like malaria and cholera', false], ['Nutritional deficiencies like scurvy', false], ['Parasitic infections', false]
            ]],
            // Health Field Concept & Core Functions
            ['Which of the following is NOT one of the Four Principal Determinants of Health in the Health Field Concept?', 'medium', [
                ['Spiritual Beliefs', true], ['Human Biology', false], ['Environment', false], ['Lifestyle', false]
            ]],
            ['In the Health Field Concept, "Healthcare Organization" consists of:', 'hard', [
                ['The quantity, quality, arrangement, nature, and relationships of people and resources in health care provision', true], ['Personal behaviors and habits impacting well-being', false], ['Genetic and physiological factors influencing health', false], ['External factors like air, water, and living conditions', false]
            ]],
            ['The primary goal of Public Health is:', 'easy', [
                ['Prevention of disease and disability', true], ['Curing complex rare diseases', false], ['Providing surgical interventions', false], ['Maximizing hospital profits', false]
            ]],
            ['Which core function of public health involves the systematic data collection on the population to monitor health status?', 'medium', [
                ['Assessment', true], ['Policy Development', false], ['Assurance', false], ['Rehabilitation', false]
            ]],
            ['Which core function focuses on ensuring that essential health services are accessible to the community?', 'medium', [
                ['Assurance', true], ['Assessment', false], ['Policy Development', false], ['Diagnosis', false]
            ]],
            // Scope of Public Health
            ['Which of the following falls under activities designed for prevention of illness, disability, or premature death?', 'hard', [
                ['Control of communicable diseases, metabolic diseases, and dietary deficiencies', true], ['Operation of emergency medical service systems', false], ['Supervision of community milk supplies', false], ['Analysis of vital records like birth certificates', false]
            ]],
            // Levels of Healthcare
            ['Health Promotion activities aim to:', 'easy', [
                ['Improve or maintain the overall health status of individuals and communities', true], ['Diagnose existing diseases accurately', false], ['Rehabilitate patients after a stroke', false], ['Treat severe chronic diseases', false]
            ]],
            ['Immunizations to protect against diseases like measles are classified as:', 'medium', [
                ['Disease Prevention (Clinical Prevention)', true], ['Health Promotion', false], ['Diagnosis and Treatment', false], ['Rehabilitation', false]
            ]],
            ['Counseling adolescents for existing sexually transmitted diseases (STDs) falls under which level of healthcare?', 'hard', [
                ['Diagnosis and Treatment', true], ['Health Promotion', false], ['Disease Prevention', false], ['Rehabilitation', false]
            ]],
            ['What is the primary intent of the 3rd (Diagnosis) and 4th (Rehabilitation) levels of healthcare?', 'medium', [
                ['To prevent serious consequences arising from health problems', true], ['To promote general optimum health', false], ['To prevent the initial occurrence of disease', false], ['To reduce environmental exposures', false]
            ]],
            // Community Health Practice Focus
            ['Primary Level Prevention includes:', 'medium', [
                ['Measures to promote optimum health and specific protection against disease agents before they occur', true], ['Early identification and treatment of existing health problems', false], ['Returning a patient to the highest level of functioning post-treatment', false], ['Rehabilitative care for chronic illnesses', false]
            ]],
            ['Screening for glaucoma to catch it early is an example of:', 'hard', [
                ['Secondary Level Prevention', true], ['Primary Level Prevention', false], ['Tertiary Level Prevention', false], ['Health Promotion', false]
            ]],
            ['Tertiary Level Prevention is aimed at:', 'medium', [
                ['Returning the patient to the highest level of functioning possible following treatment', true], ['Preventing the disease from occurring in the first place', false], ['Early detection through mass screening', false], ['Promoting general lifestyle changes for healthy individuals', false]
            ]],
            // Concepts of Community
            ['According to WHO, a community is a social group determined by:', 'medium', [
                ['Geographic boundaries and/or common values and interests', true], ['Strictly genetic relationships', false], ['Financial status and income brackets', false], ['Political affiliations only', false]
            ]],
            ['Which community classification is characterized by a high-density population and complex interpersonal relations?', 'easy', [
                ['Urban', true], ['Rural', false], ['Suburban', false], ['Relational', false]
            ]],
            ['A community where the occupation is usually farming or fishing and has primary group relations is classified as:', 'easy', [
                ['Rural', true], ['Urban', false], ['Suburban', false], ['Territorial', false]
            ]],
            ['Healthcare workers form a community based on which type of bond?', 'hard', [
                ['Relational Bonds', true], ['Territorial Bonds', false], ['Spatial Bonds', false], ['Temporal Bonds', false]
            ]],
            // Components of Community
            ['In the components of a community, what does the "Core" represent?', 'medium', [
                ['The people that make up the community, their demographics, values, beliefs, and history', true], ['The physical infrastructure and housing', false], ['The local government and political structures', false], ['The economic and financial systems', false]
            ]],
            ['Which subsystem of a community involves the distribution of goods, general occupation, and income?', 'easy', [
                ['Economics', true], ['Politics and Government', false], ['Communication Systems', false], ['Education', false]
            ]],
            // Community Action & Innovation
            ['Health Promotion represents a process that not only strengthens individual skills but also:', 'hard', [
                ['Changes social, environmental, and economic conditions to alleviate public health', true], ['Focuses strictly on centralized surgical procedures', false], ['Isolates sick individuals from the healthy population', false], ['Reduces the need for public education', false]
            ]],
            ['According to Himmelman (1992), what role should communities play to achieve real empowerment?', 'medium', [
                ['A lead role', true], ['A passive role', false], ['An observational role', false], ['A purely financial role', false]
            ]],
            ['What is the first step in the 5 Steps of Community Organizing?', 'hard', [
                ['Problem identification', true], ['People Organization', false], ['Goal Setting', false], ['Community Profile and Assessment', false]
            ]],
            ['What is a key characteristic of the Centralized Specialty Care model?', 'medium', [
                ['It centralizes resources in one location, suitable for complex, rare conditions requiring patients to travel', true], ['It branches out healthcare services directly into the community', false], ['It focuses entirely on primary prevention', false], ['It relies exclusively on traditional healers', false]
            ]],
            ['Decentralized Health Care Services aim to:', 'medium', [
                ['Branch healthcare services out into the community instead of requiring the community to come to a central facility', true], ['Force all patients to travel to one central hospital', false], ['Eliminate local health workers', false], ['Focus only on rare, complex surgical procedures', false]
            ]],
            ['Which of the following is an effect of health on a community?', 'easy', [
                ['A healthy community is an economically developed community', true], ['Health has no impact on economic development', false], ['A healthy community reduces the need for education', false], ['A healthy community strictly relies on centralized care', false]
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
