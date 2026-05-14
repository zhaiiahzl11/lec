<?php

namespace Database\Seeders;

use App\Models\Lecture;
use App\Models\Question;
use App\Models\Choice;
use Illuminate\Database\Seeder;

class Lecture4Seeder extends Seeder
{
    public function run(): void
    {
        $lecture = Lecture::where('title', 'Like', '%Communicable Disease Control%')->first();
        if (!$lecture) {
            $lecture = Lecture::create([
                'title' => 'Lecture 4 - Communicable Disease Control',
                'description' => 'Understanding the chain of infection, communicable disease models, and levels of prevention and eradication.'
            ]);
        } else {
            $lecture->questions()->delete();
        }

        $questions = [
            // Communicable vs Non-communicable
            ['Which of the following best defines Communicable Diseases?', 'easy', [
                ['Diseases caused by biological agents that are transmissible from one person to another', true], ['Diseases that are inherited genetically', false], ['Diseases caused entirely by lifestyle choices', false], ['Diseases that only affect animals', false]
            ]],
            ['Noncommunicable diseases are often referred to as:', 'medium', [
                ['Multi-causational diseases', true], ['Infectious diseases', false], ['Single-agent diseases', false], ['Biological diseases', false]
            ]],
            ['Which of the following can cause a noncommunicable disease?', 'easy', [
                ['Genetic, environmental, and lifestyle factors', true], ['Direct contact with an infected person', false], ['Airborne transmission of a virus', false], ['A mosquito bite', false]
            ]],
            ['How do infections begin in the context of communicable diseases?', 'medium', [
                ['When a biological agent enters, grows, and reproduces within the host\'s body', true], ['When a person experiences severe stress', false], ['When a person inherits a specific gene', false], ['When a person lacks physical exercise', false]
            ]],
            ['Which of the following is a method by which communicable diseases can be transmitted?', 'easy', [
                ['Direct contact, indirect contact, airborne, or vectors', true], ['Only through genetic inheritance', false], ['Only through exposure to radiation', false], ['Only through poor diet', false]
            ]],
            // Acute vs Chronic
            ['An acute disease is defined as a disease where symptoms subside within:', 'easy', [
                ['Three months or less', true], ['Six months', false], ['One year', false], ['A lifetime', false]
            ]],
            ['Which of the following is a characteristic of chronic diseases?', 'medium', [
                ['Symptoms continue for longer than three months, often lasting for years or a lifetime', true], ['Recovery is usually complete and fast', false], ['Peak severity occurs very quickly and resolves', false], ['They are always caused by viruses', false]
            ]],
            ['Chickenpox is an example of an acute disease because:', 'medium', [
                ['It subsides quickly and you develop immunity after one infection, making recovery complete', true], ['It lasts for a lifetime', false], ['It requires daily medication to manage', false], ['It only affects the elderly', false]
            ]],
            ['Diabetes is classified as which type of disease?', 'easy', [
                ['Chronic Noncommunicable', true], ['Acute Communicable', false], ['Chronic Communicable', false], ['Acute Noncommunicable', false]
            ]],
            ['Which of the following is an example of an Acute Communicable disease?', 'medium', [
                ['Common cold', true], ['AIDS', false], ['Appendicitis', false], ['Liver cirrhosis', false]
            ]],
            ['Which of the following is an example of an Acute Noncommunicable condition?', 'hard', [
                ['Appendicitis or poisoning', true], ['Measles', false], ['Tuberculosis', false], ['Diabetes', false]
            ]],
            ['AIDS, Lyme Disease, and Tuberculosis are examples of:', 'hard', [
                ['Chronic Communicable Diseases', true], ['Acute Communicable Diseases', false], ['Chronic Noncommunicable Diseases', false], ['Acute Noncommunicable Diseases', false]
            ]],
            // Definition of Terms
            ['What does "Infectivity" refer to?', 'medium', [
                ['The ability of a biological agent to enter, grow, multiply in a host, and spread to other hosts', true], ['The infectious agent\'s ability to produce a severe disease', false], ['The complete eradication of a virus', false], ['The natural habitat of a microorganism', false]
            ]],
            ['What does "Pathogenicity" refer to?', 'medium', [
                ['An infectious agent\'s ability to produce a disease and how harmful it is', true], ['How fast a virus spreads from person to person', false], ['The method of transmission used by a vector', false], ['The resistance of a host to an infection', false]
            ]],
            ['If a virus spreads very quickly but causes very mild symptoms, it has:', 'hard', [
                ['High infectivity but low pathogenicity', true], ['Low infectivity but high pathogenicity', false], ['High infectivity and high pathogenicity', false], ['Low infectivity and low pathogenicity', false]
            ]],
            // Communicable Disease Model
            ['In the Communicable Disease Model, what is the "Agent"?', 'easy', [
                ['The cause of a disease, such as a virus or bacteria', true], ['Any susceptible organism', false], ['The physical environment', false], ['The mode of transmission', false]
            ]],
            ['In the Communicable Disease Model, what is the "Host"?', 'easy', [
                ['Any susceptible organism invaded by the infectious agent', true], ['The biological cause of the disease', false], ['The climate or social factors regulating transmission', false], ['A contaminated inanimate object', false]
            ]],
            ['In the Communicable Disease Model, the "Environment" includes:', 'medium', [
                ['Physical, biological, and social factors that help regulate disease transmission', true], ['Only the genetic makeup of the host', false], ['Only the microorganism itself', false], ['Only the medical treatments available', false]
            ]],
            // Chain of Infection
            ['What is the Chain of Infection?', 'medium', [
                ['The process by which an infectious disease spreads from one host to another through a series of steps', true], ['The classification of diseases into acute and chronic', false], ['The genetic mutation process of a virus', false], ['The timeline of a disease from exposure to recovery', false]
            ]],
            ['What is the best and most effective way to break the chain of infection?', 'easy', [
                ['Hand Hygiene', true], ['Taking vitamins daily', false], ['Sleeping 8 hours', false], ['Drinking plenty of water', false]
            ]],
            ['How many elements are there in the chain of infection?', 'hard', [
                ['Six', true], ['Four', false], ['Five', false], ['Seven', false]
            ]],
            ['In the chain of infection, what is the "Reservoir"?', 'medium', [
                ['The natural habitat where the infectious agent lives, grows, and multiplies', true], ['The route the agent uses to leave the host', false], ['The susceptible individual', false], ['The microorganism itself', false]
            ]],
            ['Mosquitoes serving as the habitat for malaria is an example of a:', 'medium', [
                ['Reservoir', true], ['Portal of Entry', false], ['Susceptible Host', false], ['Portal of Exit', false]
            ]],
            ['In the chain of infection, the route through which the infectious agent leaves the reservoir is called the:', 'easy', [
                ['Portal of Exit', true], ['Mode of Transmission', false], ['Portal of Entry', false], ['Susceptible Host', false]
            ]],
            ['Tuberculosis exiting through respiratory droplets when an infected person coughs is an example of a:', 'medium', [
                ['Portal of Exit', true], ['Reservoir', false], ['Portal of Entry', false], ['Susceptible Host', false]
            ]],
            ['The way an infectious agent spreads from one host to another is defined as the:', 'easy', [
                ['Mode of Transmission', true], ['Portal of Entry', false], ['Reservoir', false], ['Infectious Agent', false]
            ]],
            ['The route through which the infectious agent enters a new host is called the:', 'easy', [
                ['Portal of Entry', true], ['Portal of Exit', false], ['Reservoir', false], ['Mode of Transmission', false]
            ]],
            ['Which of the following is a common Portal of Entry?', 'medium', [
                ['Respiratory Tract, Mucous Membranes, and Broken Skin', true], ['Intact Skin only', false], ['Hair follicles', false], ['Fingernails', false]
            ]],
            ['A "Susceptible Host" is an individual who:', 'easy', [
                ['Lacks immunity or resistance to the infectious agent', true], ['Is currently sick and showing symptoms', false], ['Carries the disease without showing symptoms', false], ['Has been fully vaccinated', false]
            ]],
            ['Which of the following factors affects host susceptibility?', 'medium', [
                ['Age, underlying health conditions, and weakened immune systems', true], ['Only age', false], ['Only gender', false], ['Only geographical location', false]
            ]],
            // Definition of terms 2
            ['In epidemiology, a "Case" refers to:', 'easy', [
                ['A person who is sick with a disease', true], ['A person who harbors a disease without symptoms', false], ['An animal that transmits a disease', false], ['A contaminated inanimate object', false]
            ]],
            ['What is a "Carrier"?', 'medium', [
                ['A person or animal that harbors a specific communicable agent without discernible clinical disease', true], ['A person who is visibly sick in a hospital', false], ['An insect that bites a human', false], ['A medical professional treating a disease', false]
            ]],
            ['Why are Carriers considered more dangerous than Cases in disease transmission?', 'hard', [
                ['Because they show no symptoms and may unknowingly infect others', true], ['Because they have higher viral loads than sick people', false], ['Because they are immune to all treatments', false], ['Because they only transmit diseases to children', false]
            ]],
            ['What is "Zoonosis"?', 'medium', [
                ['A communicable disease transmissible under natural conditions from vertebrate animals to humans', true], ['A disease that only infects animals', false], ['A disease that only infects humans', false], ['A genetic mutation caused by zoo environments', false]
            ]],
            ['Rabies is an example of which type of disease transmission?', 'easy', [
                ['Zoonosis', true], ['Anthroponosis', false], ['Noncommunicable', false], ['Genetic', false]
            ]],
            ['What does "Anthroponosis" mean?', 'hard', [
                ['Diseases that only infect humans', true], ['Diseases that transfer from humans to animals', false], ['Diseases that only infect plants', false], ['Diseases caused by arthropods', false]
            ]],
            // Portals of exit
            ['According to Table 2, what is the portal of exit for Measles and Tuberculosis?', 'medium', [
                ['Respiratory Tract', true], ['Urogenital Tract', false], ['Digestive Tract', false], ['Skin', false]
            ]],
            ['What is the portal of exit for diseases like Polio, Typhoid Fever, and Cholera?', 'medium', [
                ['Digestive Tract', true], ['Respiratory Tract', false], ['Transplacental', false], ['Skin', false]
            ]],
            ['Rubella virus, Syphilis, and Hepatitis B can exit via which portal affecting unborn children?', 'hard', [
                ['Transplacental', true], ['Skin', false], ['Urogenital Tract', false], ['Respiratory Tract', false]
            ]],
            // Modes of Transmission
            ['Touching, biting, kissing, and sexual intercourse are examples of:', 'easy', [
                ['Direct Transmission', true], ['Indirect Transmission', false], ['Airborne Transmission', false], ['Vector-Borne Transmission', false]
            ]],
            ['Dissemination of microbial aerosols to a suitable portal of entry is known as:', 'medium', [
                ['Airborne Transmission', true], ['Direct Transmission', false], ['Vehicle-Borne Transmission', false], ['Vector-Borne Transmission', false]
            ]],
            ['Toys, handkerchiefs, utensils, and water that transfer communicable agents are known as:', 'medium', [
                ['Fomites (Vehicle-Borne Transmission)', true], ['Vectors', false], ['Reservoirs', false], ['Carriers', false]
            ]],
            ['Transfer of a disease by a living organism such as mosquitoes, flies, and ticks is called:', 'easy', [
                ['Vector-Borne Transmission', true], ['Vehicle-Borne Transmission', false], ['Airborne Transmission', false], ['Direct Transmission', false]
            ]],
            ['When a fly lands on feces and then lands on food, transferring bacteria on its feet, this is an example of:', 'hard', [
                ['Mechanical Vector-Borne Transmission', true], ['Biological Vector-Borne Transmission', false], ['Direct Transmission', false], ['Airborne Transmission', false]
            ]],
            ['When a mosquito bites an infected person, the virus multiplies inside the mosquito before it bites another person. This is:', 'hard', [
                ['Biological Vector-Borne Transmission', true], ['Mechanical Vector-Borne Transmission', false], ['Vehicle-Borne Transmission', false], ['Direct Contact', false]
            ]],
            ['Which mosquito-borne disease is noted as the most common in the Philippines?', 'medium', [
                ['Dengue Fever', true], ['Yellow Fever', false], ['West Nile Virus', false], ['Zika Virus', false]
            ]],
            ['Lyme Disease is the most common disease spread by which vector?', 'medium', [
                ['Ticks', true], ['Mosquitoes', false], ['Flies', false], ['Fleas', false]
            ]],
            // Prevention & Control
            ['In public health, "Prevention" implies:', 'easy', [
                ['Planning for and taking action to prevent or forestall the occurrence of an undesirable event', true], ['Taking action during an event', false], ['Total elimination of a disease', false], ['Limiting the transmission of an active disease', false]
            ]],
            ['Taking an antibiotic to cure an existing infection is an example of:', 'medium', [
                ['Intervention', true], ['Prevention', false], ['Control', false], ['Eradication', false]
            ]],
            ['The containment of a disease, limiting its transmission, is referred to as:', 'medium', [
                ['Control', true], ['Eradication', false], ['Prevention', false], ['Primary Intervention', false]
            ]],
            ['The uprooting or total elimination of a disease from the human population is called:', 'easy', [
                ['Eradication', true], ['Control', false], ['Prevention', false], ['Intervention', false]
            ]],
            ['What is the only communicable disease that has been successfully eradicated globally?', 'hard', [
                ['Smallpox', true], ['Polio', false], ['Measles', false], ['Tuberculosis', false]
            ]],
            // Levels of Prevention
            ['Primary Prevention aims to forestall the onset of illness during which period?', 'medium', [
                ['Prepathogenesis Period (before the disease happens)', true], ['Early Pathogenesis', false], ['Period of Pathogenesis', false], ['Convalescence', false]
            ]],
            ['Health Education, Immunizations, and Chlorination of water are examples of:', 'easy', [
                ['Primary Prevention', true], ['Secondary Prevention', false], ['Tertiary Prevention', false], ['Clinical Intervention', false]
            ]],
            ['Health Screenings that lead to early diagnosis and prompt treatment fall under:', 'medium', [
                ['Secondary Prevention', true], ['Primary Prevention', false], ['Tertiary Prevention', false], ['Rehabilitation', false]
            ]],
            ['Re-training, re-educating, and rehabilitating a patient who already incurred a disability is an example of:', 'medium', [
                ['Tertiary Prevention', true], ['Secondary Prevention', false], ['Primary Prevention', false], ['Early Pathogenesis Intervention', false]
            ]],
            ['Therapy for a patient who suffered from a myocardial infarction (heart attack) belongs to which level of prevention?', 'hard', [
                ['Tertiary Prevention', true], ['Primary Prevention', false], ['Secondary Prevention', false], ['Initial Prevention', false]
            ]],
            // Immunity & Control Measures
            ['When exposure to a disease-causing organism prompts the immune system to develop its own antibodies, this is called:', 'medium', [
                ['Active Immunity', true], ['Passive Immunity', false], ['Artificial Immunity', false], ['Herd Immunity', false]
            ]],
            ['Vaccination provides which type of immunity?', 'medium', [
                ['Active Immunity', true], ['Passive Immunity', false], ['Natural Passive Immunity', false], ['Short-term Immunity', false]
            ]],
            ['When a person receives antibodies from their mother, this is an example of:', 'easy', [
                ['Passive Immunity', true], ['Active Immunity', false], ['Vaccination Immunity', false], ['Synthetic Immunity', false]
            ]],
            ['The separation of infected persons from those who are susceptible for the period of communicability is called:', 'easy', [
                ['Isolation', true], ['Quarantine', false], ['Disinfection', false], ['Eradication', false]
            ]],
            ['The limitation of freedom of movement of healthy people who have been exposed to a disease and may be incubating it is called:', 'medium', [
                ['Quarantine', true], ['Isolation', false], ['Disinfection', false], ['Tertiary Prevention', false]
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
