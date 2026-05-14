<?php

namespace Database\Seeders;

use App\Models\Lecture;
use App\Models\Question;
use App\Models\Choice;
use Illuminate\Database\Seeder;

class Lecture7Seeder extends Seeder
{
    public function run(): void
    {
        $lecture = Lecture::where('title', 'Like', '%Vector and Zoonosis, Control of Air, Radiation, and Noise Pollution%')->first();
        if (!$lecture) {
            $lecture = Lecture::create([
                'title' => 'Lecture 7 - Vector and Zoonosis, Control of Air, Radiation, and Noise Pollution',
                'description' => 'Detailed look at zoonotic diseases, vectors, and environmental pollution including air, noise, and radiation.'
            ]);
        } else {
            $lecture->questions()->delete();
        }

        $questions = [
            // Zoonosis Definition & Bacterial Agents
            ['According to WHO, what is a Zoonosis?', 'easy', [
                ['Any disease or infection that is naturally transmissible from animals to humans', true], ['A disease that only affects zoo animals', false], ['An infection caused exclusively by fungi', false], ['A disease resulting from air pollution', false]
            ]],
            ['Which bacterial zoonosis is transmitted through unpasteurized dairy products or infected animal tissues?', 'medium', [
                ['Brucellosis', true], ['Leptospirosis', false], ['Tuberculosis', false], ['Rabies', false]
            ]],
            ['Leptospira interrogans is maintained in the kidneys of wild and domestic animals and is typically transmitted to humans through direct contact with:', 'easy', [
                ['Urine from rats or dogs', true], ['Feces from cats', false], ['Saliva from bats', false], ['Feathers from birds', false]
            ]],
            ['Listeria monocytogenes, which can cause spontaneous abortions in pregnant women, is typically transmitted through:', 'medium', [
                ['Foodborne sources like cheeses and raw/unpasteurized milk', true], ['Mosquito bites', false], ['Inhalation of bat droppings', false], ['Direct contact with dog urine', false]
            ]],
            ['Which type of tuberculosis is typically transmitted from cattle to humans?', 'hard', [
                ['Mycobacterium bovis', true], ['Mycobacterium tuberculosis', false], ['Mycobacterium leprae', false], ['Mycobacterium avium', false]
            ]],
            ['Scrub Typhus is caused by Rickettsia tsutsugamushi and is transmitted to humans via:', 'hard', [
                ['Bites of larval trombiculid mites (chiggers)', true], ['Tick bites', false], ['Mosquito bites', false], ['Flea bites', false]
            ]],
            ['Rocky Mountain Spotted Fever (RMSF) is a bacterial infection spread by:', 'medium', [
                ['Tick bites', true], ['Mosquito bites', false], ['Flea bites', false], ['Direct contact with rodent urine', false]
            ]],
            // Viral & Fungal Agents
            ['Rabies is a viral zoonosis primarily transmitted through:', 'easy', [
                ['Direct contact, usually saliva through bites or scratches', true], ['Aerosolized respiratory droplets', false], ['Consuming undercooked meat', false], ['Drinking contaminated water', false]
            ]],
            ['Japanese Encephalitis, endemic to Asia, is a mosquito-borne disease caused by a virus in the same family as:', 'hard', [
                ['Dengue virus (Flavivirus)', true], ['Rabies virus', false], ['Influenza virus', false], ['HIV', false]
            ]],
            ['Dermatophytosis (like Microsporum canis from cats and dogs) is a superficial fungal infection typically transmitted through:', 'medium', [
                ['Fomites like beddings, floor mats, and grooming tools', true], ['Aerosols from sneezing', false], ['Consuming contaminated food', false], ['Mosquito bites', false]
            ]],
            ['Cryptococcosis is a fungal infection that humans can contract from soil, decaying wood, and:', 'medium', [
                ['Pigeon droppings', true], ['Cat feces', false], ['Dog saliva', false], ['Bat droppings', false]
            ]],
            ['Histoplasmosis is caused by a fungus typically found in soil enriched with:', 'medium', [
                ['Bird or bat droppings', true], ['Cow manure', false], ['Pig feces', false], ['Rotting fish', false]
            ]],
            // Parasitic Agents
            ['Toxoplasmosis is a parasitic disease primarily associated with contact with contaminated:', 'easy', [
                ['Cat feces (poop)', true], ['Dog urine', false], ['Pigeon droppings', false], ['Mosquito saliva', false]
            ]],
            ['Visceral larva migrans (Toxocara spp.) is typically contracted from:', 'hard', [
                ['Dirt contaminated with pet feces (cats and dogs)', true], ['Eating raw fish', false], ['Bites from sandflies', false], ['Drinking unpasteurized milk', false]
            ]],
            ['Hydatid Disease is caused by the larval stage of Echinococcus granulosus. If eggs are accidentally ingested, where do they typically appear?', 'hard', [
                ['Liver, lungs, and brain', true], ['Skin and nails', false], ['Stomach and intestines only', false], ['Bones and joints', false]
            ]],
            // Transmission Cycle
            ['In Orthozoonoses (Direct Zoonoses), transmission involves:', 'medium', [
                ['A single vertebrate species, either through direct or indirect contact', true], ['Two or more vertebrate species', false], ['Both vertebrate and invertebrate species', false], ['A non-animate substance like soil', false]
            ]],
            ['Anthrax is an example of which transmission cycle?', 'hard', [
                ['Orthozoonoses', true], ['Cyclozoonoses', false], ['Metazoonoses', false], ['Saprozoonoses', false]
            ]],
            ['Taenia solium (pork tapeworm) requires both a human and a pig host to complete its cycle. This classifies it as:', 'hard', [
                ['Cyclozoonoses', true], ['Orthozoonoses', false], ['Metazoonoses', false], ['Saprozoonoses', false]
            ]],
            ['Yellow Fever involves both a vertebrate (human/primate) and an invertebrate (mosquito) species. This classifies it as:', 'hard', [
                ['Metazoonoses', true], ['Orthozoonoses', false], ['Cyclozoonoses', false], ['Saprozoonoses', false]
            ]],
            ['Cutaneous Larva Migrans requires soil (a non-animate substance) for the larva to develop before infecting humans. This classifies it as:', 'hard', [
                ['Saprozoonoses', true], ['Metazoonoses', false], ['Cyclozoonoses', false], ['Orthozoonoses', false]
            ]],
            // Reservoir Hosts
            ['Anthrapozoonoses refers to diseases transmitted from:', 'medium', [
                ['Animals to Humans', true], ['Humans to Animals', false], ['Humans to Humans only', false], ['Animals to Animals only', false]
            ]],
            ['Zooanthroponoses (Reverse Zoonoses) refers to diseases transmitted from:', 'medium', [
                ['Humans to Animals', true], ['Animals to Humans', false], ['Plants to Animals', false], ['Insects to Humans', false]
            ]],
            ['Amphixenoses refers to diseases transmitted from:', 'hard', [
                ['Man to Animal OR Animal to Man', true], ['Insects to Animals only', false], ['Inanimate objects to Humans only', false], ['Soil to Plants', false]
            ]],
            // WHO Classes
            ['According to WHO, Endemic Zoonoses are:', 'medium', [
                ['Present in many places, affect many people/animals, and are expected to be prevalent (e.g., Rabies)', true], ['Sporadic and not expected to increase', false], ['Newly appearing in a population', false], ['Completely eradicated', false]
            ]],
            ['According to WHO, Epidemic Zoonoses are:', 'medium', [
                ['Sporadic in temporal and spatial distribution and not expected to increase (e.g., early COVID-19)', true], ['Expected to be present at all times', false], ['Always caused by climate change', false], ['Only found in Africa', false]
            ]],
            ['Rift Valley fever, SARS, and Avian Influenza are examples of:', 'medium', [
                ['Emerging Zoonoses', true], ['Endemic Zoonoses', false], ['Eradicated Zoonoses', false], ['Non-communicable diseases', false]
            ]],
            // Transmission Routes
            ['The transmission route that involves inanimate objects carrying a pathogen (e.g., doorknobs, grooming tools) is called:', 'easy', [
                ['Fomite transmission', true], ['Aerosol transmission', false], ['Oral transmission', false], ['Vector-borne transmission', false]
            ]],
            ['Consuming unpasteurized milk or eating with unwashed hands after handling animals is an example of which transmission route?', 'easy', [
                ['Oral', true], ['Aerosol', false], ['Fomite', false], ['Direct Contact', false]
            ]],
            // Pandemics
            ['The Black Death pandemic was caused by Yersinia pestis. Humans usually became infected through the bite of an infected:', 'easy', [
                ['Rodent flea', true], ['Tick', false], ['Mosquito', false], ['Sandfly', false]
            ]],
            ['The 1918 Spanish Flu pandemic was caused by which influenza virus strain?', 'hard', [
                ['H1N1', true], ['H2N2', false], ['H3N2', false], ['H5N1', false]
            ]],
            ['Why was the 1957 Asian Flu (H2N2) notable in terms of the demographics it affected?', 'hard', [
                ['It primarily targeted younger populations who typically have better immune systems, rather than the immunocompromised', true], ['It only killed the elderly', false], ['It only affected men', false], ['It only infected animals', false]
            ]],
            ['The source of HIV infection in humans is believed to have come from:', 'medium', [
                ['A type of chimpanzee in Central Africa', true], ['Bats in Southeast Asia', false], ['Pigs in Europe', false], ['Camels in the Middle East', false]
            ]],
            ['The probable natural reservoir or primary host of SARS-CoV-2 (COVID-19) is believed to be:', 'medium', [
                ['Rhinolophus affinis bats', true], ['Pangolins', false], ['Civet cats', false], ['Domestic dogs', false]
            ]],
            ['The natural host of the Nipah virus, which has a case fatality rate of 40% to 75%, is:', 'hard', [
                ['Fruit bats of the Pteropodidae family', true], ['Mosquitoes', false], ['Ticks', false], ['Domestic pigs', false]
            ]],
            // Prevention & Control
            ['In zoonosis control, "Isolation" is used to keep the agent:', 'medium', [
                ['In', true], ['Out', false], ['Dormant', false], ['Mutating', false]
            ]],
            ['In zoonosis control, "Quarantine" is used to keep the agent:', 'medium', [
                ['Out', true], ['In', false], ['Dormant', false], ['Mutating', false]
            ]],
            ['Chemoprophylaxis refers to:', 'medium', [
                ['Administration of a drug to prevent the development of a disease or reduce its severity', true], ['Isolating sick animals', false], ['Spraying insecticides to kill mosquitoes', false], ['Testing accessible animals for diseases', false]
            ]],
            // Vectors
            ['Which mosquito species is responsible for transmitting Malaria?', 'easy', [
                ['Anopheles sp.', true], ['Aedes sp.', false], ['Culex sp.', false], ['Mansonia sp.', false]
            ]],
            ['Aedes mosquitoes transmit all of the following EXCEPT:', 'hard', [
                ['Japanese Encephalitis', true], ['Dengue Fever', false], ['Yellow Fever', false], ['Zika Virus', false]
            ]],
            ['Culex mosquitoes are known to transmit:', 'hard', [
                ['Japanese Encephalitis and West Nile Fever', true], ['Malaria', false], ['Chagas Disease', false], ['Sleeping Sickness', false]
            ]],
            ['Which vector is responsible for transmitting Chagas Disease (American Trypanosomiasis)?', 'hard', [
                ['Triatomine Bugs (Kissing Bugs)', true], ['Tsetse Flies', false], ['Sandflies', false], ['Black Flies', false]
            ]],
            ['African Trypanosomiasis (Sleeping Sickness) is transmitted by:', 'hard', [
                ['Tsetse Flies', true], ['Triatomine Bugs', false], ['Fleas', false], ['Ticks', false]
            ]],
            ['Removing stagnant water to prevent Dengue and Malaria is an example of which method of vector control?', 'easy', [
                ['Habitat Control', true], ['Biological Control', false], ['Chemical Control', false], ['Mechanical Control', false]
            ]],
            ['Using copepods or larvivorous fishes in bodies of water to eat mosquito eggs is an example of:', 'medium', [
                ['Biological Control', true], ['Habitat Control', false], ['Chemical Control', false], ['Genetic Control', false]
            ]],
            ['In the Enhanced 4S Strategy for Dengue Prevention, what does the 4th "S" stand for?', 'medium', [
                ['Say yes to fogging only during outbreaks', true], ['Spray insecticides daily', false], ['Stay indoors at night', false], ['Seek immediate antibiotics', false]
            ]],
            // Air Pollution
            ['What defines "Pollution" in the context of environmental health?', 'easy', [
                ['When substances or energy are introduced to the environment in large amounts that can cause harm', true], ['The natural cycling of carbon dioxide in the atmosphere', false], ['The process of purifying water', false], ['The planting of trees in urban areas', false]
            ]],
            ['Which of the following is considered an "Ambient" source of air pollution?', 'easy', [
                ['Outdoor air pollution like automobiles and industries', true], ['Tobacco smoke inside a house', false], ['Indoor cooking stoves', false], ['Air conditioning units', false]
            ]],
            ['Smog, which traps chemicals and irritates eyes and throats, is considered a:', 'medium', [
                ['Delayed effect of air pollution', true], ['Immediate effect of air pollution', false], ['Socioeconomic effect of air pollution', false], ['Biological control method', false]
            ]],
            ['Which method of preventing air pollution involves placing greenery in buildings to reduce pollutant concentration by mixing it with sufficient air?', 'medium', [
                ['Dilution', true], ['Containment', false], ['Replacement', false], ['Legislation', false]
            ]],
            ['What is Republic Act 8749 in the Philippines?', 'medium', [
                ['The Philippine Clean Air Act', true], ['The National Building Code', false], ['The Occupational Safety Act', false], ['The Noise Pollution Control Act', false]
            ]],
            ['Germicidal UV light used to disinfect microorganisms in the air is an example of:', 'medium', [
                ['Ultraviolet Radiation air disinfection', true], ['Mechanical Ventilation', false], ['Chemical Mists', false], ['Dust Control', false]
            ]],
            // Noise & Radiation Pollution
            ['According to WHO, sound levels less than what decibel (dB) limit are NOT damaging to living organisms?', 'hard', [
                ['70 dB', true], ['85 dB', false], ['100 dB', false], ['50 dB', false]
            ]],
            ['More than 8 hours of constant noise beyond what level may be hazardous?', 'medium', [
                ['85 dB', true], ['70 dB', false], ['60 dB', false], ['50 dB', false]
            ]],
            ['Which of the following is a known health effect of noise pollution?', 'easy', [
                ['Hypertension and Hearing Loss', true], ['Skin cancer', false], ['Lung disease', false], ['Kidney failure', false]
            ]],
            ['About 20% of the radiation humans are exposed to comes from human activities. Which of the following is a man-made source of radiation?', 'easy', [
                ['Medical and Dental X-rays', true], ['Cosmic Rays', false], ['Terrestrial elements in soil', false], ['Atmospheric radiation', false]
            ]],
            ['Alpha and beta particles fall under which type of ionizing radiation?', 'hard', [
                ['Corpuscular Radiations', true], ['Electromagnetic Radiations', false], ['Ultraviolet Radiations', false], ['Microwave Radiations', false]
            ]],
            ['Which living organism is noted to be 10 times more resistant to radiation than humans?', 'medium', [
                ['Cockroaches', true], ['Rats', false], ['Pigeons', false], ['Dogs', false]
            ]],
            ['Cataract formation and cancer induction from radiation exposure are classified as:', 'medium', [
                ['Delayed long-term effects', true], ['Acute immediate effects', false], ['Genetic effects', false], ['Localized acute effects', false]
            ]],
            ['How can radiation exposure be reduced?', 'easy', [
                ['Less time spent near the source, greater distance, and shielding', true], ['Drinking more water', false], ['Exercising heavily', false], ['Wearing sunglasses', false]
            ]],
            ['What is a "film badge" used for by workers?', 'medium', [
                ['Measuring and recording exposure to ionizing radiation', true], ['Identifying their job title to security', false], ['Filtering out air pollutants', false], ['Measuring noise levels in decibels', false]
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
