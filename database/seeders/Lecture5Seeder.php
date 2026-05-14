<?php

namespace Database\Seeders;

use App\Models\Lecture;
use App\Models\Question;
use App\Models\Choice;
use Illuminate\Database\Seeder;

class Lecture5Seeder extends Seeder
{
    public function run(): void
    {
        $lecture = Lecture::where('title', 'Like', '%Community Water, Waste Management, and Sewage Disposal%')->first();
        if (!$lecture) {
            $lecture = Lecture::create([
                'title' => 'Lecture 5 - Community Water, Waste Management, and Sewage Disposal',
                'description' => 'A comprehensive guide to environmental health focusing on water sources, treatment, waste management, and sewage disposal.'
            ]);
        } else {
            $lecture->questions()->delete();
        }

        $questions = [
            // Intro to Environmental Health
            ['Environmental health examines external factors that affect human well-being, specifically directly affecting:', 'medium', [
                ['Public safety, economic development, and sustainability', true], ['Genetic inheritance and psychological traits', false], ['Space exploration and astronomy', false], ['Only the physical climate of an area', false]
            ]],
            ['Which of the following is considered a key component of environmental health?', 'easy', [
                ['Water quality, air quality, waste management, and sanitation', true], ['Stock market analysis', false], ['Political campaigns', false], ['Entertainment and media', false]
            ]],
            ['What is a common health impact of contaminated water?', 'easy', [
                ['Diarrheal diseases, cholera, and typhoid', true], ['Asthma and lung cancer', false], ['Diabetes and obesity', false], ['Genetic mutations', false]
            ]],
            ['How does poor sanitation economically impact a community?', 'medium', [
                ['It increases healthcare costs and reduces tourism and economic growth', true], ['It lowers taxes', false], ['It increases agricultural output', false], ['It promotes local businesses', false]
            ]],
            ['Exposure to waste increases the risk of which conditions?', 'medium', [
                ['Respiratory infections and skin diseases', true], ['Heart disease and stroke', false], ['Bone fractures', false], ['Hearing loss', false]
            ]],
            ['Approximately what percentage of the human body is water?', 'easy', [
                ['70%', true], ['50%', false], ['90%', false], ['30%', false]
            ]],
            // Water Sources
            ['Which of the following is considered a Surface Water source?', 'easy', [
                ['Rivers, lakes, and reservoirs', true], ['Aquifers', false], ['Deep wells', false], ['Underground springs', false]
            ]],
            ['What is the main limitation of surface water sources?', 'medium', [
                ['They are highly vulnerable to pollution and require proper treatment before consumption', true], ['They are difficult to access', false], ['They dry up every summer', false], ['They cannot be stored in large amounts', false]
            ]],
            ['Where is groundwater stored?', 'easy', [
                ['Beneath the earth\'s surface in aquifers, wells, and springs', true], ['In man-made reservoirs', false], ['In the atmosphere as clouds', false], ['In polar ice caps', false]
            ]],
            ['Why is groundwater generally cleaner than surface water?', 'medium', [
                ['Because it is naturally filtered through soil and rock layers', true], ['Because bacteria cannot survive underground', false], ['Because it is treated with chlorine naturally', false], ['Because sunlight kills the bacteria in it', false]
            ]],
            ['What is a major risk associated with groundwater?', 'medium', [
                ['Over-extraction and contamination from septic tanks, industrial chemicals, and pesticides', true], ['Immediate evaporation', false], ['Excessive natural chlorination', false], ['It is always too salty to drink', false]
            ]],
            ['Rainwater harvesting is technically classified as which type of water source?', 'hard', [
                ['An artificial surface water source', true], ['Groundwater', false], ['A completely sterile water source', false], ['A subsurface aquifer', false]
            ]],
            ['What must be done to stored rainwater to prevent the spread of dengue and malaria?', 'easy', [
                ['Store it properly in covered tanks to prevent it from becoming a breeding ground for mosquitoes', true], ['Boil it immediately upon collection', false], ['Mix it with salt', false], ['Keep it exposed to direct sunlight', false]
            ]],
            ['Why is filtration necessary before consuming rainwater in modern times?', 'medium', [
                ['Because acid rain and environmental pollution are becoming more common', true], ['Because rainwater lacks natural minerals', false], ['Because rainwater is naturally salty', false], ['Because rainwater is too cold', false]
            ]],
            ['Which of the following is a benefit of rainwater harvesting?', 'medium', [
                ['Reduces dependence on municipal/city water supply and helps recharge groundwater levels', true], ['Guarantees 100% sterile drinking water without treatment', false], ['Is highly effective in low rainfall areas like deserts', false], ['Eliminates the need for indoor plumbing', false]
            ]],
            // Water Treatment
            ['Why is water treatment necessary?', 'easy', [
                ['Because natural water sources often contain bacteria, viruses, sediments, and chemical pollutants', true], ['To make the water taste sweeter', false], ['To add artificial colors to the water', false], ['To increase the water\'s temperature', false]
            ]],
            ['In Simple Boiling, water is heated to 100°C primarily to:', 'easy', [
                ['Kill microorganisms like bacteria and viruses', true], ['Remove heavy metals', false], ['Filter out large physical debris', false], ['Remove chemical pollutants', false]
            ]],
            ['What is a disadvantage of Simple Boiling?', 'medium', [
                ['It may not remove any chemical pollutants', true], ['It fails to kill any viruses', false], ['It increases the bacterial count', false], ['It makes the water too acidic', false]
            ]],
            ['What is the principle behind Pasteurization?', 'hard', [
                ['Most disease-causing microorganisms are destroyed at temperatures lower than boiling (around 62.5°C) to avoid breaking down proteins', true], ['Water must be boiled three times to become completely sterile', false], ['Adding chemicals at high temperatures kills all bacteria', false], ['Freezing water kills all known pathogens', false]
            ]],
            ['Which method of boiling can remove some chemical pollutants, often leaving white residues in the flask?', 'hard', [
                ['Distillation', true], ['Pasteurization', false], ['Simple Boiling', false], ['Tyndallization', false]
            ]],
            ['Sterile water can be obtained by boiling water 3 times. What is this process called?', 'hard', [
                ['Tyndallization', true], ['Pasteurization', false], ['Distillation', false], ['Chlorination', false]
            ]],
            ['Filtration involves passing water through porous materials to remove contaminants. What is its main limitation?', 'medium', [
                ['It fails to eliminate viruses and dissolved chemicals unless specialized filters are used', true], ['It cannot remove dirt and debris', false], ['It makes the water cloudy', false], ['It increases the temperature of the water', false]
            ]],
            ['Which water treatment method is highly effective in killing bacteria and viruses but requires electricity?', 'easy', [
                ['UV Treatment', true], ['Chlorination', false], ['Filtration', false], ['Coagulation', false]
            ]],
            ['In Large-Scale Water Treatment Plants, what is the first stage where chemicals are added to bind dirt particles?', 'medium', [
                ['Coagulation & Flocculation', true], ['Sedimentation', false], ['Disinfection', false], ['Filtration', false]
            ]],
            ['What happens during the Sedimentation stage of large-scale water treatment?', 'medium', [
                ['Heavy particles settle to the bottom', true], ['Chlorine is added to kill bacteria', false], ['Water is passed through sand and charcoal', false], ['Water is distributed to homes', false]
            ]],
            ['During large-scale water treatment, which stage kills remaining bacteria using chlorine or ozone?', 'easy', [
                ['Disinfection', true], ['Coagulation', false], ['Filtration', false], ['Sedimentation', false]
            ]],
            // Contaminants
            ['Cloudy water is an indicator of which type of physical contaminant?', 'medium', [
                ['Turbidity', true], ['Heavy Metals', false], ['Bacteria', false], ['Pesticides', false]
            ]],
            ['Lead, Mercury, and Arsenic are examples of:', 'easy', [
                ['Chemical Contaminants (Heavy Metals)', true], ['Microbial Contaminants', false], ['Physical Contaminants', false], ['Organic Fertilizers', false]
            ]],
            ['Which bacteria is known for causing severe gastrointestinal diseases like typhoid fever?', 'hard', [
                ['Salmonella typhi', true], ['Vibrio cholerae', false], ['E. coli', false], ['Shigella dysenteriae', false]
            ]],
            ['Hepatitis A, Norovirus, and Rotavirus are examples of which type of microbial contaminant?', 'medium', [
                ['Viruses', true], ['Bacteria', false], ['Protozoa', false], ['Fungi', false]
            ]],
            ['Giardia and Cryptosporidium are protozoa found in untreated water that are notable because:', 'hard', [
                ['They are resistant to chlorine', true], ['They are easily killed by simple filtration', false], ['They only infect marine life', false], ['They turn the water a bright green color', false]
            ]],
            // WHO Standards
            ['According to World Health Organization (WHO) standards, drinking water should have:', 'easy', [
                ['Zero coliform bacteria', true], ['A high level of beneficial bacteria', false], ['At least some turbidity', false], ['A pH below 5.0', false]
            ]],
            ['The presence of coliform bacteria in drinking water may indicate:', 'medium', [
                ['Contamination by human or animal feces', true], ['Contamination by heavy metals', false], ['Excessive chlorination', false], ['High mineral content', false]
            ]],
            ['According to WHO standards, what is the safe pH range for drinking water consumption?', 'medium', [
                ['Between 6.5 and 8.5', true], ['Between 1.0 and 4.0', false], ['Between 9.0 and 12.0', false], ['Exactly 7.0 only', false]
            ]],
            ['A pH level above 8.5 in water could suggest chemical contamination or severe microbial contamination because:', 'hard', [
                ['When bacteria come into contact with liquid it creates a basic (alkaline) environment', true], ['Bacteria release strong acids into the water', false], ['Heavy metals lower the pH of water', false], ['Viruses neutralize the water completely', false]
            ]],
            ['In a Coliform Bacteria Test, what result indicates a "Presumptive POSITIVE" for coliform bacteria (not safe)?', 'hard', [
                ['Color change (acid production) AND a gas bubble in the Durham tube', true], ['No color change and no gas bubble', false], ['Color change but no gas bubble', false], ['No color change but a massive gas bubble', false]
            ]],
            ['What is the simplest test you can do for physical water contamination by pouring water into a clear beaker?', 'easy', [
                ['Turbidity Test', true], ['Coliform Test', false], ['Pathogen-Specific Test', false], ['pH analysis', false]
            ]],
            // Waste Management
            ['Food scraps, garden waste, and agricultural residues that can be composted into fertilizer are classified as:', 'easy', [
                ['Organic Waste', true], ['Recyclable Waste', false], ['Hazardous Waste', false], ['Industrial Waste', false]
            ]],
            ['Batteries, medical waste, chemicals, and toxic materials are classified as:', 'medium', [
                ['Hazardous Waste', true], ['Recyclable Waste', false], ['Organic Waste', false], ['Liquid Waste', false]
            ]],
            ['Which consequence of improper waste disposal results in disease-carrying pests like rats and mosquitoes?', 'medium', [
                ['Health Risks', true], ['Soil Pollution', false], ['Air Pollution', false], ['Water Contamination', false]
            ]],
            ['Which method of solid waste disposal is the most common but can cause groundwater contamination?', 'easy', [
                ['Landfilling', true], ['Incineration', false], ['Composting', false], ['Recycling', false]
            ]],
            ['Which method of solid waste disposal reduces volume but releases air pollutants?', 'medium', [
                ['Incineration', true], ['Landfilling', false], ['Composting', false], ['Recycling', false]
            ]],
            // Sewage
            ['What is "Sewage"?', 'easy', [
                ['Liquid waste from homes, businesses, and industries, including human waste, soaps, and chemicals', true], ['Solid plastic waste floating in oceans', false], ['Smoke emissions from factories', false], ['Pure, untreated rainwater', false]
            ]],
            ['Small-scale wastewater treatment systems commonly used in rural areas are called:', 'medium', [
                ['Septic Tanks', true], ['Sewage Treatment Plants', false], ['Landfills', false], ['Incinerators', false]
            ]],
            ['What is the impact of poor sewage management on the environment?', 'medium', [
                ['It depletes oxygen in rivers, killing fish and marine life', true], ['It causes the ozone layer to deplete', false], ['It increases the salinity of rainwater', false], ['It reduces the turbidity of local lakes', false]
            ]],
            ['In Wastewater Treatment Steps, what does the "Primary Treatment" stage do?', 'hard', [
                ['Solids settle to the bottom, and grease and oil are skimmed from the top', true], ['Bacteria break down organic matter', false], ['Advanced filtration removes remaining contaminants', false], ['Chlorination or UV light kills harmful bacteria', false]
            ]],
            ['In Wastewater Treatment Steps, which stage uses bacteria to break down organic matter?', 'hard', [
                ['Secondary Treatment', true], ['Primary Treatment', false], ['Screening', false], ['Disinfection', false]
            ]],
            // Stream Pollution & Runoff
            ['When factories discharge chemicals and heavy metals into rivers, this is an example of:', 'easy', [
                ['Industrial Waste causing Stream Pollution', true], ['Agricultural Runoff', false], ['Urban Runoff', false], ['Sewage Discharge', false]
            ]],
            ['"Dead Zones" in water bodies are caused by:', 'hard', [
                ['Excess nutrients (from fertilizers) causing algal blooms that deplete oxygen', true], ['Heavy metals settling to the bottom', false], ['Oil spills blocking sunlight', false], ['Plastic debris choking marine life', false]
            ]],
            ['Rainwater that flows over streets, sidewalks, and asphalt roads, collecting pollutants like oil and heavy metals, is called:', 'medium', [
                ['Urban Runoff', true], ['Agricultural Runoff', false], ['Stream Pollution', false], ['Sewage Discharge', false]
            ]],
            ['Nitrates from agricultural fertilizers contaminating drinking water can cause which condition in infants?', 'hard', [
                ['Blue baby syndrome', true], ['Cholera', false], ['Typhoid fever', false], ['Hepatitis A', false]
            ]],
            ['Implementing "Green Infrastructure" near rivers, such as vegetative buffer zones, is a strategy to:', 'medium', [
                ['Prevent water contamination by reducing runoff', true], ['Increase agricultural yield', false], ['Treat sewage chemically', false], ['Dispose of hazardous waste', false]
            ]],
            // 3Rs & Chemical Safety
            ['Repurposing items instead of throwing them away, such as cleaning glass bottles for storage, is an example of:', 'easy', [
                ['Reuse', true], ['Reduce', false], ['Recycle', false], ['Refuse', false]
            ]],
            ['Converting old materials into new products, such as plastic bottles into textile fibers, is an example of:', 'easy', [
                ['Recycle', true], ['Reuse', false], ['Reduce', false], ['Composting', false]
            ]],
            ['What is the MOST important piece of information to include on a hazardous chemical label?', 'hard', [
                ['The date it was created, along with its name and concentration', true], ['The brand name of the chemical', false], ['The color of the chemical', false], ['The price of the chemical', false]
            ]],
            ['What is the purpose of the "Extended Producer Responsibility (EPR)" policy?', 'medium', [
                ['Companies must manage the waste generated from their own products', true], ['Citizens are responsible for taking their trash to the landfill', false], ['Farmers must stop using all chemical fertilizers', false], ['The government must provide free drinking water', false]
            ]],
            ['What is a major challenge in modern waste and water management?', 'easy', [
                ['Lack of awareness, limited infrastructure, and high costs of sustainable practices', true], ['Overabundance of clean water sources', false], ['Too many government policies', false], ['Lack of plastic materials in the environment', false]
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
