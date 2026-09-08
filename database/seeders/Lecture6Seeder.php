<?php

namespace Database\Seeders;

use App\Models\Lecture;
use App\Models\Question;
use App\Models\Choice;
use Illuminate\Database\Seeder;

class Lecture6Seeder extends Seeder
{
    public function run(): void
    {
        $lecture = Lecture::where('title', 'Like', '%Residential, Occupational, and Recreational Environment%')->first();
        if (!$lecture) {
            $lecture = Lecture::create([
                'title' => 'Lecture 6 - Residential, Occupational, and Recreational Environment',
                'description' => 'A guide to environmental health protection focusing on housing quality, workplace safety, and recreational areas.',
                'is_previous' => true,
                'category' => 'Public Health'
            ]);
        } else {
            $lecture->update(['is_previous' => true, 'category' => 'Public Health']);
            $lecture->questions()->delete();
        }

        $questions = [
            // Residential Environment - Basic Principles
            ['Who stated, "A house is not a home unless it contains food and fire for the mind as well as the body"?', 'easy', [
                ['Benjamin Franklin', true], ['John Wanamaker', true], ['Hippocrates', false], ['Paracelsus', false]
            ]],
            ['In terms of environmental health, what should a residence primarily be viewed as?', 'medium', [
                ['A sanctuary where individuals can relax in safety and leave societal pressures behind', true], ['A mere physical shelter from the rain', false], ['A place strictly for conducting business', false], ['An environment meant to test one\'s immunity', false]
            ]],
            ['What does "Quality of Housing" refer to?', 'medium', [
                ['The physical condition of the house, as well as the social and physical environment in which it is located', true], ['Only the expensive materials used to build the house', false], ['The square footage of the living space', false], ['The number of rooms available for guests', false]
            ]],
            ['According to WHO, "Healthy Housing" refers to a shelter that supports:', 'easy', [
                ['A state of complete physical, mental, and social well-being', true], ['Only the physical survival of its occupants', false], ['Strict financial independence', false], ['Isolation from the community', false]
            ]],
            ['Which of the following is NOT one of the 4 Fundamental Pillars of healthful housing?', 'medium', [
                ['Meet economic needs', true], ['Meet physiologic needs', false], ['Meet psychological needs', false], ['Protection against Diseases', false]
            ]],
            // Physiologic Needs
            ['According to CDC Housing Code guidelines, what is the minimum indoor temperature to meet physiologic needs?', 'hard', [
                ['At least 68°F (20°C) measured 18 inches above floor level', true], ['At least 50°F (10°C)', false], ['Exactly 98.6°F (37°C)', false], ['At least 80°F (26°C)', false]
            ]],
            ['To ensure proper ventilation, the window area should comprise at least what percentage of a room\'s floor space?', 'hard', [
                ['8%', true], ['20%', false], ['2%', false], ['50%', false]
            ]],
            ['To prevent long-term hearing impairment, noise levels inside the home should not exceed:', 'medium', [
                ['70 decibels', true], ['120 decibels', false], ['30 decibels', false], ['100 decibels', false]
            ]],
            ['Why should plumbing be designed with minimal bends?', 'hard', [
                ['To maintain water pressure, which directly affects the hygiene of the household', true], ['To make the pipes look aesthetically pleasing', false], ['To save money on copper piping', false], ['To prevent the pipes from freezing in tropical climates', false]
            ]],
            // Psychological Needs
            ['What is the relationship between house size, family size, and privacy?', 'medium', [
                ['As family size decreases relative to house size, individual privacy increases', true], ['House size has no impact on privacy', false], ['Larger families in smaller houses have more privacy', false], ['Privacy is determined only by the number of bathrooms', false]
            ]],
            ['Why should bedrooms and bathrooms be accessible through halls rather than other bedrooms?', 'medium', [
                ['To prevent social friction and privacy violations', true], ['To save space in the floor plan', false], ['To increase the spread of natural light', false], ['To make it easier to clean the house', false]
            ]],
            // Protection against Disease & Injury
            ['Which of the following is an example of protecting a household against diseases?', 'easy', [
                ['Having a plumbing system that prevents sewage from mixing with drinking water', true], ['Installing non-skid strips in the bathroom', false], ['Providing one room for each individual', false], ['Keeping indoor noise below 70 decibels', false]
            ]],
            ['Which parasite (Kigwa) is easily transmissible in households where people are sleeping together in the same bed?', 'hard', [
                ['Entamoeba vermicularis (Pinworms/threadworms)', true], ['Ascaris lumbricoides', false], ['Plasmodium falciparum', false], ['Salmonella typhi', false]
            ]],
            ['Installing non-skid strips or grab bars in bathrooms primarily addresses which housing need?', 'easy', [
                ['Protection against injury', true], ['Physiologic needs', false], ['Psychological needs', false], ['Protection against disease', false]
            ]],
            // Substandard Housing & Slums
            ['Housing that does not meet the standards of living and poses an active risk to physical well-being is defined as:', 'medium', [
                ['Substandard Housing', true], ['Deteriorated Housing', false], ['A Slum', false], ['A Temporary Residence', false]
            ]],
            ['What is "Deteriorated Housing"?', 'medium', [
                ['Housing that is damaged, unmaintained, or structurally unsound due to age or overuse', true], ['Housing that lacks plumbing and electricity from the start', false], ['Housing built near a volcano', false], ['Housing that exceeds the 70 decibel noise limit', false]
            ]],
            ['According to international standards, a slum lacks at least one of four essentials. Which of the following is NOT one of those essentials?', 'hard', [
                ['Access to high-speed internet', true], ['Access to safe water', false], ['Access to sanitation', false], ['Durable housing', false]
            ]],
            // Problems with Poor Housing & Vectors
            ['In slums, residents often prioritize roofs over ventilation. This leads to humid environments that cause:', 'medium', [
                ['Mold growth and respiratory problems', true], ['An increase in natural light', false], ['Decreased indoor noise levels', false], ['Better thermal insulation', false]
            ]],
            ['Cockroaches are particularly dangerous in urban housing because their droppings and shells can trigger:', 'easy', [
                ['Major asthma attacks', true], ['Leptospirosis', false], ['Bubonic plague', false], ['Rat-bite fever', false]
            ]],
            ['Which disease vector is responsible for transmitting the Bubonic Plague and Murine Typhus?', 'hard', [
                ['Fleas', true], ['Rodents', false], ['Cockroaches', false], ['Mosquitoes', false]
            ]],
            ['Rodents are associated with transmitting which of the following diseases?', 'medium', [
                ['Leptospirosis and Rat-bite Fever', true], ['Polio and Asthma', false], ['Bubonic Plague', false], ['Malaria and Dengue', false]
            ]],
            // Housing Standards - Philippines
            ['What is Republic Act No. 6541 in the Philippines?', 'medium', [
                ['The National Building Code of the Philippines', true], ['The Occupational Safety and Health Standards Act', false], ['The Clean Water Act', false], ['The Environmental Protection Law', false]
            ]],
            ['According to the National Building Code, properties should be at a safe distance from:', 'easy', [
                ['Polluted streams, volcanic sites, or sources of explosion', true], ['Public schools and hospitals', false], ['Commercial shopping centers', false], ['Major highways', false]
            ]],
            // Occupational Environment - Intro & History
            ['The science of anticipation, recognition, evaluation, and control of workplace hazards is called:', 'medium', [
                ['Occupational Safety and Health (OSH)', true], ['Industrial Engineering', false], ['Ergonomics', false], ['Human Resources Management', false]
            ]],
            ['While Occupational Safety focuses on injury prevention, Occupational Health focuses on:', 'easy', [
                ['Well-being and illness prevention', true], ['Maximizing worker productivity', false], ['Enforcing minimum wage laws', false], ['Designing ergonomic office furniture', false]
            ]],
            ['Who is considered the "father of occupational medicine" for examining the health conditions of over 50 occupations in the 1700s?', 'hard', [
                ['Ramazzini', true], ['Hippocrates', false], ['Paracelsus', false], ['Agricola', false]
            ]],
            ['The creation of the International Labour Organization (ILO) in 1919 was based on the philosophy of:', 'medium', [
                ['Prevention and protection through international standards', true], ['Maximizing corporate profits globally', false], ['Eliminating all manual labor', false], ['Privatizing healthcare for workers', false]
            ]],
            ['In the United States, which agency acts as the "Regulator" by enforcing safety standards?', 'medium', [
                ['OSHA', true], ['NIOSH', false], ['ILO', false], ['CDC', false]
            ]],
            ['In the United States, which agency acts as the "Watchdog" by conducting research and identifying chronic health issues?', 'medium', [
                ['NIOSH', true], ['OSHA', false], ['FDA', false], ['EPA', false]
            ]],
            // OSH in the Philippines
            ['In the Philippines, what does Republic Act No. 11058 govern?', 'medium', [
                ['Occupational Safety and Health Standards Act', true], ['The National Building Code', false], ['The Clean Water Act', false], ['The Labor Code Minimum Wage', false]
            ]],
            ['Under RA 11058, who holds the primary responsibility to provide appropriate safety equipment and training to workers?', 'easy', [
                ['The Employer', true], ['The Employee', false], ['The Local Government Unit', false], ['The Department of Health', false]
            ]],
            ['Which of the following is an Employee Right under Philippine OSH law?', 'easy', [
                ['Right to refuse unsafe work', true], ['Right to demand unlimited vacation days', false], ['Right to operate machinery without training', false], ['Right to ignore safety protocols if they are inconvenient', false]
            ]],
            // Hazards
            ['What is the definition of a "Hazard"?', 'easy', [
                ['Something with the potential to cause harm', true], ['An injury that has already occurred', false], ['A safety protocol', false], ['A form of personal protective equipment', false]
            ]],
            ['Repeated trauma, such as typing leading to carpal tunnel syndrome, is the leading cause of nonfatal workplace illnesses and is classified as an:', 'medium', [
                ['Ergonomic Hazard', true], ['Physical Hazard', false], ['Psychosocial Hazard', false], ['Biological Hazard', false]
            ]],
            ['Burnout, depression, workplace violence, and harassment are examples of:', 'easy', [
                ['Psychosocial Hazards', true], ['Safety Hazards', false], ['Chemical Hazards', false], ['Biological Hazards', false]
            ]],
            ['Extreme temperatures, high noise levels, and radiation that cause harm with or without contact are classified as:', 'medium', [
                ['Physical Hazards', true], ['Ergonomic Hazards', false], ['Chemical Hazards', false], ['Safety Hazards', false]
            ]],
            ['Slip, trip, and fall hazards, as well as unguarded machinery, are top causes of workplace fatalities and are classified as:', 'easy', [
                ['Safety Hazards', true], ['Physical Hazards', false], ['Ergonomic Hazards', false], ['Psychosocial Hazards', false]
            ]],
            // OSH Cycle & Hierarchy
            ['In the OSH Management Cycle, what occurs during the "Evaluation" phase?', 'hard', [
                ['Audit and management review', true], ['Initial review and implementation', false], ['OSH policy and worker participation', false], ['Continual corrective action', false]
            ]],
            ['What is the purpose of Occupational Health Surveillance?', 'medium', [
                ['Early identification of dangers before they cause incurable disease (Early Warning System)', true], ['To find reasons to fire employees', false], ['To decrease the cost of health insurance', false], ['To enforce strict dress codes', false]
            ]],
            ['Testing blood or urine for chemical exposure in workers is an example of:', 'hard', [
                ['Biological monitoring', true], ['Environmental assessment', false], ['Medical surveillance', false], ['Ergonomic evaluation', false]
            ]],
            ['In the Hierarchy of Controls, what is the most effective method, representing the "removal of the hazard"?', 'medium', [
                ['Elimination', true], ['Substitution', false], ['Engineering Controls', false], ['PPE', false]
            ]],
            ['In the Hierarchy of Controls, using blade guards on a microtome is an example of:', 'hard', [
                ['Engineering Controls', true], ['Administrative Controls', false], ['PPE', false], ['Elimination', false]
            ]],
            ['In the Hierarchy of Controls, implementing Standard Operating Procedures (SOPs) and restricted access is an example of:', 'hard', [
                ['Administrative Controls', true], ['Engineering Controls', false], ['Substitution', false], ['PPE', false]
            ]],
            ['What is the LAST line of defense in the Hierarchy of Controls?', 'easy', [
                ['Personal Protective Equipment (PPE)', true], ['Administrative Controls', false], ['Engineering Controls', false], ['Elimination', false]
            ]],
            ['What does "Total Worker Health" integrate?', 'hard', [
                ['Protection from work hazards with the promotion of injury/illness prevention for overall worker well-being', true], ['Salary negotiations with healthcare benefits', false], ['Physical fitness with dietary tracking only', false], ['Strict disciplinary actions for unsafe behaviors', false]
            ]],
            // Recreational Environment
            ['Who said, "People who cannot find time for recreation are obliged sooner or later to find time for illness"?', 'medium', [
                ['John Wanamaker', true], ['Benjamin Franklin', false], ['Hippocrates', false], ['Ramazzini', false]
            ]],
            ['Why is recreation a vital part of public health?', 'easy', [
                ['It provides emotional release from daily stresses, helping maintain mental health', true], ['It is the primary way people earn an income', false], ['It completely cures all physical diseases', false], ['It forces people to isolate themselves', false]
            ]],
            ['Which of the following is true regarding Indoor vs Outdoor recreational areas?', 'medium', [
                ['Indoor spaces are easier to control in terms of air quality, while outdoor spaces are harder to control but generally safer in terms of fresh air', true], ['Indoor spaces are impossible to manage, while outdoor spaces are perfectly safe', false], ['Outdoor spaces accommodate a strictly limited number of people', false], ['Indoor spaces are highly susceptible to soil compaction', false]
            ]],
            ['Which of the following is a common negative impact of recreation on soil and water?', 'medium', [
                ['Trampling leads to soil compaction, erosion, and increased water runoff', true], ['It increases the fertility of the soil exponentially', false], ['It naturally purifies local lakes', false], ['It eliminates all disease vectors in the area', false]
            ]],
            ['In a recreational water environment, what adverse health outcome is directly associated with currents and tides?', 'easy', [
                ['Drowning', true], ['Impact Injury', false], ['Disease outbreaks', false], ['Asthma attacks', false]
            ]],
            ['Disease outbreaks in recreational areas are most commonly caused by:', 'easy', [
                ['Contaminated water supply', true], ['Hard surfaces', false], ['Currents and tides', false], ['Exposure to sunlight', false]
            ]],
            ['During the COVID-19 pandemic, why were outside recreational areas considered beneficial?', 'medium', [
                ['Air movement disperses respiratory droplets, and sunlight provides Vitamin D', true], ['The virus cannot survive outside for more than a few seconds', false], ['Outside areas naturally produce chlorine to disinfect the air', false], ['People outside do not need to practice hand hygiene', false]
            ]],
            ['According to COVID-19 considerations for recreational water management, what is sufficient to disinfect water against SARS-CoV-2?', 'hard', [
                ['Chlorine or bromine', true], ['Ultraviolet light only', false], ['Simple boiling', false], ['Saltwater from the ocean', false]
            ]],
            ['Which of the following is NOT a standard management focus for recreational areas?', 'easy', [
                ['Maximizing industrial waste dumping', true], ['Ensuring proper drainage and sewage', false], ['Maintaining kitchen and refrigeration hygiene', false], ['Controlling solid waste disposal', false]
            ]],
            ['Our health is described as a "dynamic state resulting from adaptations to our...?"', 'medium', [
                ['Environment', true], ['Genetics only', false], ['Financial status', false], ['Political beliefs', false]
            ]],
            ['Workplace injuries such as falls and roadway incidents fall under which hazard category?', 'easy', [
                ['Safety Hazards', true], ['Physical Hazards', false], ['Ergonomic Hazards', false], ['Psychosocial Hazards', false]
            ]],
            ['Silica dust, engine exhaust, and welding fumes fall under which occupational hazard category?', 'medium', [
                ['Chemical Hazards', true], ['Biological Hazards', false], ['Physical Hazards', false], ['Ergonomic Hazards', false]
            ]],
            ['What is the role of an Occupational Hygienist?', 'hard', [
                ['Focusing on well-being and illness prevention in the workplace', true], ['Focusing strictly on immediate injury prevention', false], ['Designing the aesthetic layout of the office', false], ['Managing the payroll and benefits', false]
            ]],
            ['A multidisciplinary OSH team must enjoy what specific condition to be effective?', 'hard', [
                ['Professional independence from employers and workers to make unbiased recommendations', true], ['Complete control over the company\'s finances', false], ['The ability to fire workers at will', false], ['Immunity from government regulations', false]
            ]],
            ['What defines "Leisure Time"?', 'easy', [
                ['Time when one is not working', true], ['Time spent sleeping', false], ['Time spent commuting to work', false], ['Time spent doing household chores', false]
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
