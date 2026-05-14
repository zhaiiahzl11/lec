<?php

namespace Database\Seeders;

use App\Models\Lecture;
use App\Models\Question;
use App\Models\Choice;
use Illuminate\Database\Seeder;

class Lecture8Seeder extends Seeder
{
    public function run(): void
    {
        $lecture = Lecture::where('title', 'Like', '%Disaster Control Management%')->first();
        if (!$lecture) {
            $lecture = Lecture::create([
                'title' => 'Lecture 8 - Disaster Control Management',
                'description' => 'Understanding disaster risks, vulnerability, incident command systems, and emergency response.'
            ]);
        } else {
            $lecture->questions()->delete();
        }

        $questions = [
            // Definitions
            ['According to WHO, what defines a "Disaster"?', 'medium', [
                ['Any occurrence causing damage, loss of life, and deterioration of health services on a scale warranting extraordinary response from outside the affected area', true], ['A temporary disruption that a community can manage using their own resources', false], ['Only events caused by extreme weather conditions', false], ['Any minor accident that causes property damage', false]
            ]],
            ['What is the primary difference between an Emergency and a Disaster?', 'medium', [
                ['An emergency can be managed by a community using its own resources, while a disaster exceeds their ability to respond', true], ['An emergency always involves a natural hazard, while a disaster is always man-made', false], ['Disasters only happen in third-world countries, emergencies happen everywhere', false], ['There is no difference; they mean exactly the same thing', false]
            ]],
            ['In disaster terminology, what constitutes a "Mass casualty" event?', 'easy', [
                ['100 or more casualties', true], ['More than 2 but less than 100 casualties', false], ['Exactly 50 casualties', false], ['10 to 20 casualties', false]
            ]],
            ['What constitutes a "Multiple casualty" event?', 'easy', [
                ['More than 2 but less than 100 casualties', true], ['100 or more casualties', false], ['Only 1 casualty', false], ['More than 1,000 casualties', false]
            ]],
            ['Displaced persons are individuals who:', 'medium', [
                ['Have to evacuate their home, school, or business as a result of a disaster', true], ['Fled their country as a result of war or famine', false], ['Are uninjured but lost their jobs due to a disaster', false], ['Are indirectly affected because their relatives were victims', false]
            ]],
            ['Refugees are defined as a group of people who:', 'medium', [
                ['Fled their home or country as a result of famine, drought, natural disaster, war, or civil unrest', true], ['Evacuated their house temporarily due to a fire', false], ['Are hired to help with disaster recovery', false], ['Are psychological victims of an accident', false]
            ]],
            ['In disaster management, the formula to understand disaster risk is:', 'hard', [
                ['HAZARD + VULNERABILITY = RISK / CAPACITY TO COPE', true], ['HAZARD x EMERGENCY = DISASTER', false], ['CAPACITY - HAZARD = VULNERABILITY', false], ['RISK + HAZARD = DISASTER', false]
            ]],
            ['A Hazard is defined as:', 'easy', [
                ['Any phenomenon that has the potential to cause disruption or damage to people, properties, services, and the environment', true], ['The actual consequence and destruction of an event', false], ['The lack of resources to cope with an emergency', false], ['A purely political phenomenon', false]
            ]],
            ['Which statement differentiates a hazard from a disaster?', 'medium', [
                ['A hazard is the threatening event, while the disaster is the consequence when the hazard impacts a vulnerable population', true], ['A hazard can be prevented, but a disaster is inevitable', false], ['A hazard always involves mass casualties, a disaster does not', false], ['A hazard only refers to weather, a disaster refers to human error', false]
            ]],
            ['Without a vulnerable population, a hazard:', 'hard', [
                ['Does not constitute a disaster', true], ['Automatically becomes a disaster', false], ['Turns into an emergency immediately', false], ['Causes mass casualties regardless', false]
            ]],
            // Types of Hazards
            ['Typhoons, floods, landslides, earthquakes, and volcanic activities are examples of:', 'easy', [
                ['Natural Hazards', true], ['Technological Hazards', false], ['Biological Hazards', false], ['Societal Hazards', false]
            ]],
            ['Pathogenic microorganisms, toxins, and bioactive substances are examples of:', 'easy', [
                ['Biological Hazards', true], ['Natural Hazards', false], ['Technological Hazards', false], ['Complex Hazards', false]
            ]],
            ['Industrial accidents, dangerous procedures, and infrastructure failures fall under:', 'easy', [
                ['Technological Hazards', true], ['Societal Hazards', false], ['Natural Hazards', false], ['Natech Hazards', false]
            ]],
            ['Wars, conflicts, and nuclear wars that result from varying political or economic factors are classified as:', 'medium', [
                ['Societal Hazards', true], ['Technological Hazards', false], ['Biological Hazards', false], ['Natural Hazards', false]
            ]],
            ['A "Natech Hazard" refers to:', 'hard', [
                ['A Natural-technological disaster, where a natural hazard triggers a technological hazard (e.g., an earthquake causing a chemical spill)', true], ['A disaster caused entirely by faulty technology', false], ['A natural disaster that only destroys nature, not technology', false], ['A biological virus affecting computer systems', false]
            ]],
            // Classifications
            ['Earthquakes and Tsunamis fall under which main type of natural disaster?', 'medium', [
                ['Geophysical', true], ['Meteorological', false], ['Hydrological', false], ['Climatological', false]
            ]],
            ['Tropical storms and extreme temperatures fall under which main type of natural disaster?', 'medium', [
                ['Meteorological', true], ['Geophysical', false], ['Extraterrestrial', false], ['Hydrological', false]
            ]],
            ['Riverine floods, flash floods, and avalanches are classified as:', 'medium', [
                ['Hydrological', true], ['Climatological', false], ['Meteorological', false], ['Geophysical', false]
            ]],
            ['Droughts and wildfires (forest/bush fires) are classified as:', 'medium', [
                ['Climatological', true], ['Hydrological', false], ['Meteorological', false], ['Extraterrestrial', false]
            ]],
            ['A sudden impact disaster is one where:', 'easy', [
                ['The immediate effect cannot be predicted (e.g., earthquakes, tsunamis)', true], ['The effect happens gradually over months', false], ['Only animals are affected', false], ['There is a delayed effect that is easily noticed', false]
            ]],
            ['Famine, pest infestation, and deforestation are examples of:', 'medium', [
                ['Slow onset disasters', true], ['Sudden impact disasters', false], ['Extraterrestrial disasters', false], ['Natech hazards', false]
            ]],
            // Vulnerability, Risk, Capacity
            ['What defines "Vulnerability"?', 'medium', [
                ['Conditions reducing people\'s ability to prepare for, withstand, or respond to a hazard, making them prone to damage', true], ['The strength and resilience of a community', false], ['The probability of a hazard occurring in a given year', false], ['The financial capacity to buy insurance', false]
            ]],
            ['Unstable infrastructures and disabled people are examples of which type of vulnerability?', 'medium', [
                ['Physical', true], ['Social', false], ['Economical', false], ['Environmental', false]
            ]],
            ['The inability of an affected population to endure impacts due to illiteracy, poor governance, or ideological beliefs is known as:', 'hard', [
                ['Social vulnerability', true], ['Physical vulnerability', false], ['Economical vulnerability', false], ['Environmental vulnerability', false]
            ]],
            ['If a community has High Exposure to a hazard but also a High Capacity to cope, their vulnerability is considered:', 'hard', [
                ['Low', true], ['Extremely High', false], ['Non-existent', false], ['Moderate', false]
            ]],
            ['"Risk" in disaster management is viewed as:', 'medium', [
                ['The product of potentially damaging events (hazards) and vulnerable conditions of a society', true], ['The same exact thing as a hazard', false], ['The resources available to a community', false], ['The immediate aftermath of a disaster', false]
            ]],
            ['Which of the following is a reason why disasters are increasing globally?', 'easy', [
                ['Increase in population, climate change, and rapid urbanization', true], ['A decrease in global temperatures', false], ['A decrease in poverty worldwide', false], ['Better zoning laws in all countries', false]
            ]],
            ['Rapid urbanization and unplanned development increase disaster risks because:', 'medium', [
                ['A concentrated population in improperly planned areas means more people will be affected by the disaster', true], ['It decreases the number of buildings that can fall', false], ['It naturally improves drainage systems', false], ['It disperses the population over a wider area', false]
            ]],
            ['"Capacity" in disaster management refers to:', 'medium', [
                ['Resources, means, and strengths in a community that enable them to cope with, withstand, and recover from a disaster', true], ['The maximum number of people a shelter can hold', false], ['The volume of water a river can hold before flooding', false], ['The destructive power of a typhoon', false]
            ]],
            ['Manpower and strong infrastructure are examples of:', 'easy', [
                ['Physical Capacity', true], ['Socio-economic Capacity', false], ['Dynamic pressures', false], ['Root causes', false]
            ]],
            ['Connections and privileges that allow quicker recovery from a disaster are examples of:', 'medium', [
                ['Socio-economic Capacity', true], ['Physical Capacity', false], ['Unsafe conditions', false], ['Social Vulnerability', false]
            ]],
            // PH Setting & Characteristics
            ['Why is the Philippines considered one of the most vulnerable countries in the world?', 'easy', [
                ['It lies in the Pacific Ring of Fire and along the Typhoon Belt, averaging 24 typhoons a year', true], ['It has no natural resources', false], ['It lacks any form of government', false], ['It is a completely landlocked country', false]
            ]],
            ['In disaster characteristics, "Predictability" refers to:', 'medium', [
                ['The ability to tell when and if a disaster event will occur', true], ['How often a disaster occurs', false], ['The level of destruction it will cause', false], ['The number of casualties expected', false]
            ]],
            ['In disaster characteristics, "Imminence" refers to:', 'hard', [
                ['The speed of onset of an impending disaster and the extent of possible forewarning', true], ['The physical force of the disaster', false], ['The geographic area affected', false], ['The financial cost of the disaster', false]
            ]],
            ['Region 7 (Cebu, Bohol, Negros Oriental) is notably prone to which type of disaster according to the lecture?', 'medium', [
                ['Earthquakes', true], ['Avalanches', false], ['Blizzards', false], ['Sandstorms', false]
            ]],
            // Disaster Management
            ['Disaster Management is described as the "umbrella term" that encompasses:', 'medium', [
                ['A continuous, integrated process of planning, prevention, mitigation, response, and recovery', true], ['Only the immediate rescue operations during an emergency', false], ['Only the financial funding for rebuilding structures', false], ['Only the training of medical personnel', false]
            ]],
            ['Disaster Risk Management focuses primarily on activities designed to:', 'medium', [
                ['Prevent loss of lives, minimize property damage, and speed up the recovery process', true], ['Arrest looters during a disaster', false], ['Control the weather', false], ['Eliminate all natural hazards globally', false]
            ]],
            ['Which of the following is an aim of Disaster Management?', 'easy', [
                ['To foster local resilience and coordinate resources for disaster response and recovery', true], ['To increase the vulnerability of a population', false], ['To prevent communities from working together', false], ['To delay rescue mechanisms', false]
            ]],
            // Disaster Cycle
            ['The Disaster Management Cycle consists of which four aspects?', 'medium', [
                ['Preparation, Response, Recovery, and Mitigation', true], ['Prevention, Evacuation, Triage, and Tagging', false], ['Hazard, Vulnerability, Risk, and Capacity', false], ['Assessment, Planning, Execution, and Documentation', false]
            ]],
            ['In the Disaster Management Cycle, which phase involves measures required in search of survivors and meeting basic needs during the emergency?', 'medium', [
                ['Response', true], ['Preparation', false], ['Recovery', false], ['Mitigation', false]
            ]],
            ['In the Disaster Management Cycle, which phase refers to risk reduction or anticipatory measures taken PRIOR to an impact to minimize its effects (e.g., building codes)?', 'hard', [
                ['Mitigation', true], ['Recovery', false], ['Response', false], ['Rehabilitation', false]
            ]],
            ['In the Recovery phase, what does "Rehabilitation" specifically focus on?', 'hard', [
                ['Assisting the community to restore a sense of normality, focusing more on the people', true], ['Rebuilding damaged physical structures', false], ['Immediate distribution of relief goods', false], ['Predicting the next disaster', false]
            ]],
            ['In the Recovery phase, what does "Reconstruction" specifically focus on?', 'hard', [
                ['Repairing dwellings, reestablishing essential services, and focusing more on physical structures', true], ['Providing psychological support to victims', false], ['Distributing food and water immediately after impact', false], ['Evacuating people to safe areas', false]
            ]],
            ['Measures taken in anticipation of a disaster to ensure effective actions, such as developing early warnings and disaster simulation exercises (drills), belong to:', 'medium', [
                ['Preparation', true], ['Mitigation', false], ['Response', false], ['Reconstruction', false]
            ]],
            // ICS
            ['What is the Incident Command System (ICS)?', 'medium', [
                ['A hierarchical chain of command used in disaster situations', true], ['A computer program used to predict weather', false], ['A financial ledger for disaster relief funds', false], ['A system used to rate the intensity of earthquakes', false]
            ]],
            ['In the ICS Command Staff, who has overall authority and responsibility for managing all incident operations?', 'easy', [
                ['The Incident Commander', true], ['The Safety Officer', false], ['The Public Information Officer', false], ['The Liaison Officer', false]
            ]],
            ['In the ICS Command Staff, who is responsible for interfacing with the public and media?', 'easy', [
                ['The Public Information Officer', true], ['The Liaison Officer', false], ['The Safety Officer', false], ['The Incident Commander', false]
            ]],
            ['In the ICS Command Staff, who monitors incident operations and advises on matters relating to the health and safety of emergency responders?', 'medium', [
                ['The Safety Officer', true], ['The Operations Section Chief', false], ['The Logistics Section Chief', false], ['The Liaison Officer', false]
            ]],
            ['In the ICS General Staff, which section is responsible for all tactical activities focused on saving lives, property, and reducing the immediate hazard?', 'hard', [
                ['The Operations Section', true], ['The Planning Section', false], ['The Logistics Section', false], ['The Finance/Administrative Section', false]
            ]],
            ['In the ICS General Staff, which section collects, evaluates, and disseminates incident situation information and intelligence?', 'hard', [
                ['The Planning Section', true], ['The Operations Section', false], ['The Logistics Section', false], ['The Finance/Administrative Section', false]
            ]],
            // Response & Triage
            ['During Disaster Response, what is the goal of "Maintenance of Law & Order"?', 'medium', [
                ['To prevent looting, violence, and chaos', true], ['To arrest victims who lost their homes', false], ['To force people to pay for relief goods', false], ['To prevent the media from reporting on the disaster', false]
            ]],
            ['In disaster management, what does "Triage" mean?', 'medium', [
                ['The prioritization of victims into categories depending on the urgency of their needs for evacuation and treatment', true], ['The process of identifying deceased individuals', false], ['The organized movement of uninjured people to safe areas', false], ['The financial assessment of structural damage', false]
            ]],
            ['What is the primary goal of Triage when resources are limited?', 'hard', [
                ['To maximize survival for the greatest number of victims', true], ['To save the most severely injured person first, regardless of the cost', false], ['To ensure everyone gets equal medical supplies', false], ['To quickly identify the dead for burial', false]
            ]],
            ['What does START stand for in triage?', 'hard', [
                ['Simple Triage and Rapid Treatment', true], ['Systematic Treatment and Rescue Tactics', false], ['Standard Triage and Response Team', false], ['Sequential Treatment and Rescue Timeline', false]
            ]],
            ['In Triage Color Tags, what does the RED tag signify?', 'easy', [
                ['Immediate: Cannot survive without immediate treatment but have a chance of survival', true], ['Delayed: Stable for the moment', false], ['Minor: "Walking wounded"', false], ['Deceased: Beyond help', false]
            ]],
            ['In Triage Color Tags, what does the YELLOW tag signify?', 'medium', [
                ['Delayed: Stable for the moment, not in immediate danger of death', true], ['Immediate: Requires urgent life-saving care', false], ['Minor: Only requires a band-aid', false], ['Deceased: Pulseless', false]
            ]],
            ['In Triage Color Tags, what does the GREEN tag signify?', 'easy', [
                ['Minor: "Walking wounded" who will need medical care after more critical injuries are treated', true], ['Deceased: Beyond help', false], ['Immediate: High priority for transport', false], ['Delayed: Cannot walk but are stable', false]
            ]],
            ['In Triage Color Tags, what does the BLACK tag signify?', 'easy', [
                ['Deceased/Beyond help: Injuries are so extensive they will not survive given available care', true], ['Immediate: Requires immediate surgery', false], ['Minor: Uninjured individuals', false], ['Delayed: Needs observation', false]
            ]],
            ['During the Disaster Recovery phase, what does "Repatriation" mean?', 'hard', [
                ['Displaced people returning to their place of origin after the emergency is over', true], ['Rebuilding public roads and bridges', false], ['Distributing psychological medication', false], ['Raising funds from international donors', false]
            ]],
            ['Zoning, land use management, and building codes are components of:', 'medium', [
                ['Disaster Mitigation', true], ['Disaster Response', false], ['Disaster Recovery', false], ['Incident Command Operations', false]
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
