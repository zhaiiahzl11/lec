<?php

namespace Database\Seeders;

use App\Models\Lecture;
use App\Models\Question;
use App\Models\Choice;
use Illuminate\Database\Seeder;

class Lecture3Seeder extends Seeder
{
    public function run(): void
    {
        $lecture = Lecture::where('title', 'Like', '%First Aid and Personal Wellness%')->first();
        if (!$lecture) {
            $lecture = Lecture::create([
                'title' => 'Lecture 3 - First Aid and Personal Wellness',
                'description' => 'A guide to understanding stress, maintaining personal wellness, recognizing shock, and performing vital first aid such as CPR.'
            ]);
        } else {
            $lecture->questions()->delete();
        }

        $questions = [
            // Stress vs Anxiety
            ['Benjamin Franklin referred to Stress as the:', 'easy', [
                ['20th Century Syndrome', true], ['Silent Killer', false], ['Modern Plague', false], ['Mind Disease', false]
            ]],
            ['What is the primary difference between Stress and Anxiety?', 'medium', [
                ['Stress is caused by an existing stressor, while anxiety continues even when the stressor is gone', true], ['Stress is always positive, while anxiety is always negative', false], ['Anxiety is a short-term response to danger, while stress is long-term', false], ['There is no difference; they are the exact same condition', false]
            ]],
            ['Which form of stress is described as a short-term response to an imminent danger or event?', 'easy', [
                ['Acute Stress', true], ['Chronic Stress', false], ['Eustress', false], ['Distress', false]
            ]],
            ['Which type of stress is considered the most serious because the body stays alert even in the absence of danger, leading to long-term health risks?', 'medium', [
                ['Chronic Stress', true], ['Acute Stress', false], ['Eustress', false], ['Temporary Stress', false]
            ]],
            ['Which of the following is a long-term risk of Chronic Stress?', 'medium', [
                ['High blood pressure and heart disease', true], ['Improved memory and focus', false], ['Decreased risk of diabetes', false], ['Lowered resting heart rate', false]
            ]],
            ['Which of the following is NOT a common physical or emotional sign of stress?', 'easy', [
                ['Increased motivation and excessive energy', true], ['Trouble concentrating', false], ['Headaches and stomach problems', false], ['Decreased sex drive', false]
            ]],
            ['"Apathy" as a sign of stress is defined as:', 'hard', [
                ['Lack of feeling, emotion, interest, or concern', true], ['Intense anger and hostility', false], ['Excessive talking and hyperactivity', false], ['Extreme physical pain', false]
            ]],
            // Eustress / Distress / EQ
            ['Emotional Intelligence (EQ) is defined as:', 'hard', [
                ['The capability to recognize, discern, and manage one\'s own emotions and those of others', true], ['The ability to solve complex mathematical problems quickly', false], ['The genetic predisposition to handle stress', false], ['The complete suppression of all negative emotions', false]
            ]],
            ['What is "Eustress"?', 'medium', [
                ['A good response to stress that refers to happy, pleasant events and increases performance', true], ['A bad response to stress resulting in declined performance', false], ['The lack of feeling or emotion', false], ['A type of severe stage fright', false]
            ]],
            ['What is "Distress"?', 'easy', [
                ['A bad response to stress resulting in an unhealthy body and declining performance', true], ['A positive emotional state', false], ['A relaxation technique', false], ['A type of mild, helpful anxiety', false]
            ]],
            // Yerkes-Dodson & GAS
            ['According to the Yerkes-Dodson Law (Inverted U Model of Arousal), what is the relationship between stress and task performance?', 'hard', [
                ['A certain amount of anxiety/stress can enhance performance, but too much can impair it', true], ['Stress always decreases performance', false], ['Higher stress always equals higher performance', false], ['Stress has absolutely no effect on task performance', false]
            ]],
            ['Who developed the General Adaptation Syndrome (GAS)?', 'hard', [
                ['Dr. Hans Selye', true], ['Benjamin Franklin', false], ['Robert Yerkes', false], ['John Dillingham Dodson', false]
            ]],
            ['In the General Adaptation Syndrome, what occurs during the "Alarm Reaction Stage"?', 'medium', [
                ['The body experiences a "fight-or-flight" response, releasing cortisol and adrenaline', true], ['The body depletes its energy resources resulting in burnout', false], ['The body returns completely to a normal, relaxed state', false], ['The autonomic nervous system reduces cortisol completely', false]
            ]],
            ['During the Stage of Resistance in GAS, the Autonomic Nervous System attempts to:', 'hard', [
                ['Return the body to normal by reducing the amount of cortisol produced', true], ['Increase adrenaline production to maximum levels', false], ['Shut down all non-essential organs', false], ['Induce immediate sleep', false]
            ]],
            ['What is the final stage of the General Adaptation Syndrome resulting from prolonged or chronic stress?', 'medium', [
                ['Stage of Exhaustion', true], ['Stage of Resistance', false], ['Alarm Reaction Stage', false], ['Stage of Eustress', false]
            ]],
            // Management
            ['Which stress management strategy involves "consciously reinterpreting a situation in a more positive light"?', 'easy', [
                ['Reframing', true], ['Meditation', false], ['Autogenic training', false], ['Journaling', false]
            ]],
            ['Endorphins are chemicals produced by the body to relieve stress and pain. Which activity is known to stimulate their release?', 'easy', [
                ['Exercising', true], ['Eating large meals before bed', false], ['Drinking alcohol', false], ['Prolonged sitting', false]
            ]],
            ['Autogenic training and progressive muscle relaxation are examples of:', 'medium', [
                ['Relaxation Techniques', true], ['Reframing', false], ['Physical Exercise', false], ['Dietary changes', false]
            ]],
            ['Which of the following is considered "internal jogging" because it releases endorphins and improves blood circulation?', 'easy', [
                ['Laughing', true], ['Crying', false], ['Sleeping', false], ['Stretching', false]
            ]],
            ['Creating a "Memory Bank" to manage stress involves:', 'medium', [
                ['Savoring special experiences, taking pictures, and journaling to remember pleasant things', true], ['Memorizing medical facts to prepare for exams', false], ['Saving money to reduce financial stress', false], ['Repressing traumatic memories', false]
            ]],
            // Ergonomics
            ['What does "Ergonomics" mean based on its Greek derivation?', 'hard', [
                ['Work (Ergo) and Law (Nomos)', true], ['Body (Ergo) and Mechanics (Nomos)', false], ['Energy (Ergo) and Movement (Nomos)', false], ['Safety (Ergo) and Rule (Nomos)', false]
            ]],
            ['The primary goal of Ergonomics is:', 'medium', [
                ['"Fitting the task to the human"', true], ['"Fitting the human to the task"', false], ['"Maximizing machine output"', false], ['"Minimizing break times"', false]
            ]],
            ['In the context of workplace health, what does MSD stand for?', 'medium', [
                ['Musculoskeletal Disorders', true], ['Mental Stress Disorders', false], ['Motor System Dysfunctions', false], ['Major Sleep Deprivation', false]
            ]],
            ['Carpal Tunnel Syndrome, Lower Back Pain, and Tendonitis are examples of:', 'easy', [
                ['Work Related Musculoskeletal Disorders (WMSD)', true], ['Acute Infectious Diseases', false], ['Genetic abnormalities', false], ['Psychological disorders', false]
            ]],
            ['According to Office Ergonomics, how should your monitor be positioned?', 'medium', [
                ['Approximately at eye level and at an arm\'s distance away', true], ['Below eye level and very close', false], ['Above eye level and at least two arms\' distance', false], ['Tilted downwards to avoid glare', false]
            ]],
            ['When adjusting your chair for proper ergonomics, your elbows should be bent at:', 'hard', [
                ['90 degrees', true], ['45 degrees', false], ['180 degrees', false], ['120 degrees', false]
            ]],
            ['If your feet do not touch the floor when sitting at your desk, you should:', 'easy', [
                ['Use a footstool or a ream of paper', true], ['Lower your chair as much as possible', false], ['Cross your legs constantly', false], ['Stand up while typing', false]
            ]],
            ['How often should you ideally get up out of your chair and move/stretch?', 'medium', [
                ['Every hour', true], ['Once a day', false], ['Every 15 minutes', false], ['Only during lunch break', false]
            ]],
            // Wellness
            ['According to the World Health Organization (WHO), personal wellness is defined as:', 'medium', [
                ['A state of complete physical, mental, and social well-being, not merely the absence of disease', true], ['Having no physical illnesses or injuries', false], ['A conscious, self-directed evolving process', false], ['The ability to cope effectively with life without medication', false]
            ]],
            ['The National Wellness Institute (NWI) defines personal wellness as:', 'hard', [
                ['A conscious, self-directed, and evolving process of achieving full potential', true], ['The complete eradication of stress in daily life', false], ['A strictly physical state of peak athletic performance', false], ['The absence of financial and social burdens', false]
            ]],
            ['Which dimension of wellness is defined as "personal satisfaction and enrichment derived from one\'s work"?', 'medium', [
                ['Occupational', true], ['Intellectual', false], ['Social', false], ['Spiritual', false]
            ]],
            ['Coping effectively with life and creating satisfying relationships falls under which dimension of wellness?', 'easy', [
                ['Emotional', true], ['Physical', false], ['Environmental', false], ['Financial', false]
            ]],
            ['Expanding our sense of purpose and meaning in life describes which dimension of wellness?', 'medium', [
                ['Spiritual', true], ['Intellectual', false], ['Occupational', false], ['Social', false]
            ]],
            ['Recognizing creative abilities and finding ways to expand knowledge and skills relates to which dimension?', 'medium', [
                ['Intellectual', true], ['Spiritual', false], ['Social', false], ['Environmental', false]
            ]],
            // Shock
            ['In medical terms, what is "Perfusion"?', 'hard', [
                ['The passage of fluid through the circulatory system to an organ or tissue, delivering oxygen and nutrients', true], ['The sudden drop in blood pressure caused by an allergic reaction', false], ['The loss of cardiac contractility', false], ['The over-hydration of tissues', false]
            ]],
            ['Shock is defined as the clinical syndrome that develops when there is:', 'hard', [
                ['Critical impairment of tissue perfusion due to acute circulatory failure', true], ['A sudden spike in blood pressure and heart rate', false], ['A localized infection in a single organ', false], ['Complete cessation of brain activity', false]
            ]],
            ['Which type of shock is caused by hemorrhage, burns, or excessive fluid losses?', 'easy', [
                ['Hypovolemic Shock', true], ['Cardiogenic Shock', false], ['Anaphylactic Shock', false], ['Neurogenic Shock', false]
            ]],
            ['Cardiogenic shock is primarily caused by:', 'medium', [
                ['Myocardial infarction, dysrhythmia, or loss of cardiac contractility', true], ['Severe allergic reactions', false], ['Spinal cord injuries', false], ['Severe systemic infections', false]
            ]],
            ['Which type of shock is caused by severe allergic reactions to drugs, insect stings, or food?', 'easy', [
                ['Anaphylactic Shock', true], ['Septic Shock', false], ['Neurogenic Shock', false], ['Hypovolemic Shock', false]
            ]],
            ['Septic shock is caused by:', 'medium', [
                ['Severe infections, often seen in malnourished or immunosuppressed patients', true], ['Spinal cord injuries', false], ['Massive blood loss', false], ['Allergic reactions to venom', false]
            ]],
            ['A spinal cord injury or emotional stress causing vasomotor center depression leads to which type of shock?', 'hard', [
                ['Neurogenic Shock', true], ['Cardiogenic Shock', false], ['Anaphylactic Shock', false], ['Septic Shock', false]
            ]],
            ['Which of the following is a common sign/symptom of shock?', 'easy', [
                ['Cool, clammy, pale skin and rapid pulse', true], ['Warm, flushed skin and slow pulse', false], ['Increased energy and hyperactivity', false], ['Constricted pupils and deep breathing', false]
            ]],
            ['If you suspect a person is in shock, which of the following is an APPROPRIATE first aid step?', 'medium', [
                ['Lay the person down and elevate their legs and feet slightly', true], ['Give them a warm drink to calm their nerves', false], ['Make them sit up quickly to regain consciousness', false], ['Move them immediately to a comfortable bed', false]
            ]],
            ['If a person in shock vomits or bleeds from the mouth, what should you do (assuming no spinal injury)?', 'hard', [
                ['Turn them onto their side to prevent choking', true], ['Elevate their head higher than their chest', false], ['Force them to swallow water', false], ['Begin immediate chest compressions', false]
            ]],
            // First Aid / CPR
            ['What does BLS stand for in emergency medicine?', 'easy', [
                ['Basic Life Support', true], ['Breathing Life Systems', false], ['Basic Lung Simulation', false], ['Body Life Sustenance', false]
            ]],
            ['Before performing Basic Life Support (BLS), what is the critically important Step 1?', 'medium', [
                ['Secure the scene and ensure that you, yourself, are safe', true], ['Check for a pulse at the carotid artery', false], ['Start High Quality CPR immediately', false], ['Call 911', false]
            ]],
            ['In Step 2 of BLS (Check for a response), how should you assess the victim?', 'medium', [
                ['Shake their shoulders gently and ask loudly, "Are you all right?"', true], ['Slap their face vigorously', false], ['Pour cold water on them', false], ['Wait 5 minutes to see if they wake up', false]
            ]],
            ['If a victim is unresponsive and has abnormal (gasping/agonal) breathing, what should you do next?', 'hard', [
                ['Activate EMS, yell for help, and send for an AED', true], ['Place them in the recovery position and leave them alone', false], ['Give them artificial respiration without calling for help', false], ['Perform abdominal thrusts', false]
            ]],
            ['In Step 3 of BLS, you should check for a pulse at the carotid artery for no longer than:', 'hard', [
                ['10 seconds', true], ['5 seconds', false], ['30 seconds', false], ['1 minute', false]
            ]],
            ['What does CPR stand for?', 'easy', [
                ['Cardiopulmonary Resuscitation', true], ['Cardiovascular Pulmonary Rescue', false], ['Chest Pressure Restoration', false], ['Cardiac Pulse Revival', false]
            ]],
            ['Without oxygen, brain damage can begin within:', 'medium', [
                ['4-6 minutes', true], ['1-2 minutes', false], ['10-15 minutes', false], ['30 minutes', false]
            ]],
            ['For Adult CPR, what is the correct ratio of chest compressions to rescue breaths?', 'easy', [
                ['30 compressions to 2 breaths', true], ['15 compressions to 2 breaths', false], ['5 compressions to 1 breath', false], ['50 compressions to 5 breaths', false]
            ]],
            ['What is the recommended depth and rate for chest compressions during High Quality Adult CPR?', 'hard', [
                ['At least 2 inches deep, at a rate of 100-120 compressions per minute', true], ['About 1 inch deep, at a rate of 80 compressions per minute', false], ['At least 3 inches deep, at a rate of 60 compressions per minute', false], ['Exactly 1.5 inches deep, at a rate of 150 compressions per minute', false]
            ]],
            ['During CPR, it is crucial to allow for:', 'medium', [
                ['Full chest recoil between compressions', true], ['Minimal pressure on the sternum', false], ['Very slow compressions', false], ['Constant uninterrupted rescue breaths', false]
            ]],
            ['To give rescue breaths, how should you open the airway?', 'medium', [
                ['Head-tilt, chin-lift method', true], ['Jaw-thrust without head-tilt', false], ['Neck hyper-extension', false], ['By turning the head to the side', false]
            ]],
            ['For Child CPR (1 year to puberty) with two rescuers, what is the compression to breath ratio?', 'hard', [
                ['15:2', true], ['30:2', false], ['5:1', false], ['100:2', false]
            ]],
            ['For Child CPR with a single rescuer, what is the compression to breath ratio?', 'hard', [
                ['30:2', true], ['15:2', false], ['10:1', false], ['50:2', false]
            ]],
            ['What does AED stand for?', 'easy', [
                ['Automated External Defibrillator', true], ['Automatic Emergency Device', false], ['Advanced Electronic Defibrillator', false], ['Automated Electrocardiogram Device', false]
            ]],
            ['If a pediatric AED pad is not available for a child in cardiac arrest, what should you do?', 'medium', [
                ['Use adult pads, ensuring they do not touch each other', true], ['Do not use the AED; wait for paramedics', false], ['Cut the adult pads in half to make them smaller', false], ['Place both adult pads on the back of the child', false]
            ]],
            ['What is the nationwide emergency hotline number in the Philippines?', 'easy', [
                ['911', true], ['143', false], ['999', false], ['112', false]
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
