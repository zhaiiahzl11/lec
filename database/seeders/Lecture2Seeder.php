<?php

namespace Database\Seeders;

use App\Models\Lecture;
use App\Models\Question;
use App\Models\Choice;
use Illuminate\Database\Seeder;

class Lecture2Seeder extends Seeder
{
    public function run(): void
    {
        $lecture = Lecture::where('title', 'Like', '%Human Behavior and Community Health Education%')->first();
        if (!$lecture) {
            $lecture = Lecture::create([
                'title' => 'Lecture 2 - Human Behavior and Community Health Education',
                'description' => 'Exploring the psychological and social factors that influence health behaviors, and strategies for community health education.'
            ]);
        } else {
            $lecture->questions()->delete();
        }

        $questions = [
            // Definitions
            ['How is "Behavior" generally defined in the context of this lecture?', 'medium', [
                ['An observable activity or response to external and internal stimuli', true], ['Only the internal thoughts and feelings of a person', false], ['A purely genetic reflex that cannot be modified', false], ['An involuntary physical response to pain', false]
            ]],
            ['Which classification of behavior is described as "occurring without thinking" or an unconscious reflex action?', 'easy', [
                ['Molecular', true], ['Molar', false], ['Covert', false], ['Voluntary', false]
            ]],
            ['Which classification refers to actions that are done with reason and conscious awareness?', 'easy', [
                ['Molar', true], ['Molecular', false], ['Involuntary', false], ['Covert', false]
            ]],
            ['A person thinking or breathing is an example of which type of behavior?', 'medium', [
                ['Covert', true], ['Overt', false], ['Molar', false], ['Voluntary', false]
            ]],
            ['An observable behavior, such as walking or talking, is classified as:', 'easy', [
                ['Overt', true], ['Covert', false], ['Molecular', false], ['Involuntary', false]
            ]],
            ['Behavior that is done consciously and within a person\'s control is called:', 'medium', [
                ['Voluntary', true], ['Involuntary', false], ['Molecular', false], ['Covert', false]
            ]],
            // Views
            ['Which viewpoint on human behavior believes that the mind dominates most bodily activities?', 'medium', [
                ['Intrapsychic Viewpoint (Psychologist\'s Point of View)', true], ['Biological Viewpoint (Psychiatrist\'s Point of View)', false], ['Social/Behavioral Viewpoint', false], ['Genetic Viewpoint', false]
            ]],
            ['According to the Biological Viewpoint, everything you think and feel is controlled by:', 'easy', [
                ['Electrical and chemical activity in your brain and body', true], ['Your social and cultural environment', false], ['Mental processes such as values and attitudes', false], ['Spiritual interventions', false]
            ]],
            ['Which viewpoint focuses on how people interact with others and how their environment influences their actions?', 'medium', [
                ['Social/Behavioral Viewpoint', true], ['Intrapsychic Viewpoint', false], ['Biological Viewpoint', false], ['Genetic Viewpoint', false]
            ]],
            // Biological Bases
            ['Which part of a neuron is considered the "front end" that receives information from other nerve cells?', 'medium', [
                ['Dendrite', true], ['Axon', false], ['Soma', false], ['Synapse', false]
            ]],
            ['What is the function of the Axon in a neuron?', 'hard', [
                ['It carries messages away from the cell body to other neurons', true], ['It receives incoming messages from other neurons', false], ['It processes emotions in the limbic system', false], ['It produces cerebrospinal fluid', false]
            ]],
            ['What is the tiny gap between the axon of one neuron and the dendrite of another called?', 'easy', [
                ['Synapse', true], ['Soma', false], ['Myelin Sheath', false], ['Node of Ranvier', false]
            ]],
            ['What type of neurons carry information from the senses to the brain and spinal cord?', 'medium', [
                ['Sensory Neurons (Afferent)', true], ['Motor Neurons (Efferent)', false], ['Interneurons', false], ['Autonomic Neurons', false]
            ]],
            ['What type of neurons convey impulses from one neuron to another in the brain and spinal cord?', 'hard', [
                ['Interneurons', true], ['Sensory Neurons', false], ['Motor Neurons', false], ['Autonomic Neurons', false]
            ]],
            ['The Autonomic Nervous System (ANS) controls:', 'easy', [
                ['Involuntary normal body functions like breathing and heart rate', true], ['Voluntary muscle movements', false], ['Conscious decision making', false], ['Higher-order thinking and creativity', false]
            ]],
            ['Which part of the Autonomic Nervous System is responsible for "fight or flight" activities?', 'medium', [
                ['Sympathetic Nervous System', true], ['Parasympathetic Nervous System', false], ['Somatic Nervous System', false], ['Central Nervous System', false]
            ]],
            ['Which part of the nervous system is responsible for conserving energy and returning the body to a normal state ("rest and digest")?', 'hard', [
                ['Parasympathetic Nervous System', true], ['Sympathetic Nervous System', false], ['Somatic Nervous System', false], ['Peripheral Nervous System', false]
            ]],
            // Neurotransmitters
            ['Which neurotransmitter is primarily involved in voluntary movements, learning, memory, and emotional behavior?', 'hard', [
                ['Dopamine', true], ['Serotonin', false], ['Acetylcholine', false], ['Endorphins', false]
            ]],
            ['A deficiency in which neurotransmitter is linked to anxiety and Huntington\'s Disease?', 'hard', [
                ['GABA', true], ['Dopamine', false], ['Serotonin', false], ['Endorphins', false]
            ]],
            ['Which neurotransmitter plays a key role in sleep, mood, appetite, and pain perception?', 'medium', [
                ['Serotonin', true], ['Acetylcholine', false], ['Glutamate', false], ['Dopamine', false]
            ]],
            ['Endorphins function primarily to:', 'easy', [
                ['Relieve pain and induce feelings of pleasure', true], ['Regulate muscle contractions', false], ['Inhibit brain activity to cause sleep', false], ['Stimulate the sympathetic nervous system', false]
            ]],
            // Brain
            ['The "Lower Management" of the brain consists of the:', 'medium', [
                ['Hindbrain and Midbrain', true], ['Forebrain and Cerebrum', false], ['Limbic System and Thalamus', false], ['Cerebral Cortex', false]
            ]],
            ['Which part of the hindbrain is involved in coordination, balance, and motor learning?', 'easy', [
                ['Cerebellum', true], ['Medulla', false], ['Pons', false], ['Thalamus', false]
            ]],
            ['Which structure connects the two hemispheres of the brain?', 'hard', [
                ['Corpus Callosum', true], ['Thalamus', false], ['Hypothalamus', false], ['Medulla', false]
            ]],
            ['Which part of the limbic system is important in motivation and emotions, specifically fear and aggression?', 'hard', [
                ['Amygdala', true], ['Hippocampus', false], ['Hypothalamus', false], ['Cerebellum', false]
            ]],
            ['The Hippocampus is primarily responsible for:', 'medium', [
                ['Forming new memories', true], ['Regulating heart rate', false], ['Controlling voluntary movement', false], ['Processing visual information', false]
            ]],
            ['Which lobe of the cerebral cortex is responsible for executive functions, planning, and personality?', 'medium', [
                ['Frontal Lobe', true], ['Parietal Lobe', false], ['Occipital Lobe', false], ['Temporal Lobe', false]
            ]],
            ['The Occipital Lobe is primarily responsible for:', 'easy', [
                ['Processing visual information', true], ['Processing auditory information', false], ['Regulating emotions', false], ['Controlling balance', false]
            ]],
            // Health Behavior & Risks
            ['Aspects of health that an individual has control over (e.g., diet, smoking) are called:', 'easy', [
                ['Modifiable Risks', true], ['Non-modifiable Risks', false], ['Genetic Risks', false], ['Environmental Risks', false]
            ]],
            ['Age, gender, and genetics are examples of:', 'easy', [
                ['Non-modifiable Risks', true], ['Modifiable Risks', false], ['Behavioral Risks', false], ['Preventable Risks', false]
            ]],
            ['What does the "genogram" tool primarily help assess?', 'medium', [
                ['Hereditary patterns of behavior, medical, and psychological patterns that run through families', true], ['The exact economic status of a community', false], ['The prevalence of infectious diseases in an urban area', false], ['A patient\'s current daily dietary intake', false]
            ]],
            ['In the Philippines, the type of obesity commonly affecting adults where fat accumulates abdominally is known as:', 'medium', [
                ['Android or apple-shaped type', true], ['Gynoid or pear-shaped type', false], ['Thyroid type', false], ['Endocrine type', false]
            ]],
            ['Gynoid or pear-shaped obesity involves fat accumulation primarily in the:', 'hard', [
                ['Hips and thighs', true], ['Abdomen and chest', false], ['Neck and face', false], ['Arms and back', false]
            ]],
            // Sleep and substances
            ['According to the National Sleep Foundation, what is the normal state of drowsiness following a meal called?', 'hard', [
                ['Postprandial Somnolence', true], ['Circadian Drop', false], ['Metabolic Fatigue', false], ['Digestive Lethargy', false]
            ]],
            ['Lack of sleep can lead to which of the following cognitive impairments?', 'medium', [
                ['Decreased attention, memory lapses, and poor decision making', true], ['Increased creativity', false], ['Enhanced physical strength', false], ['Improved emotional regulation', false]
            ]],
            ['Which category of psychoactive drugs lowers the body\'s overall energy level and reduces sensitivity to outside stimulation?', 'easy', [
                ['Depressants', true], ['Stimulants', false], ['Hallucinogens', false], ['Opioids', false]
            ]],
            ['Caffeine, nicotine, and cocaine are examples of:', 'easy', [
                ['Stimulants', true], ['Depressants', false], ['Hallucinogens', false], ['Narcotics', false]
            ]],
            ['What is the foremost preventable cause of death in the US, and a major health risk globally?', 'easy', [
                ['Smoking/Tobacco', true], ['Caffeine intake', false], ['Binge eating', false], ['Sleep deprivation', false]
            ]],
            ['Which facial characteristic is NOT associated with Fetal Alcohol Syndrome?', 'hard', [
                ['Large head circumference', true], ['Low nasal bridge', false], ['Indistinct philtrum', false], ['Thin upper lip', false]
            ]],
            ['Binge drinking for men is typically defined as consuming how many drinks in about 2 hours?', 'medium', [
                ['5 or more', true], ['3 or more', false], ['10 or more', false], ['2 or more', false]
            ]],
            // Models
            ['The Health Belief Model assumes that the major determinant of preventive health behavior is:', 'medium', [
                ['Disease avoidance', true], ['Financial reward', false], ['Social pressure', false], ['Genetic predisposition', false]
            ]],
            ['In the Health Belief Model, "one\'s belief regarding the chance of getting a given condition" is defined as:', 'medium', [
                ['Perceived susceptibility', true], ['Perceived severity', false], ['Perceived benefits', false], ['Perceived barriers', false]
            ]],
            ['In the Health Belief Model, beliefs about the material and psychological costs of taking action are called:', 'hard', [
                ['Perceived barriers', true], ['Perceived severity', false], ['Perceived benefits', false], ['Cues to action', false]
            ]],
            ['Which model of behavior change is based on the assumption that behavior change takes place over time through a system of 6 stages?', 'easy', [
                ['Transtheoretical Model', true], ['Health Belief Model', false], ['Theory of Planned Behavior', false], ['Social Cognitive Theory', false]
            ]],
            ['In the Transtheoretical Model, the "Precontemplation" stage is characterized by:', 'medium', [
                ['Denial or ignorance of the problem; no intention of taking action', true], ['Weighing the pros and cons of changing', false], ['Taking direct action to achieve a goal', false], ['Developing coping strategies for long-term maintenance', false]
            ]],
            ['Which stage of the Transtheoretical Model involves the individual actively modifying their behavior, experiences, or environment?', 'medium', [
                ['Action', true], ['Contemplation', false], ['Preparation', false], ['Maintenance', false]
            ]],
            ['The Theory of Reasoned Action and Planned Behavior assumes that:', 'hard', [
                ['Behavior is under volitional control and people are rational beings', true], ['Behavior is completely determined by genetics', false], ['People change only when forced by environmental stress', false], ['Behavior change is a completely unconscious process', false]
            ]],
            ['In the Theory of Planned Behavior, what refers to the perceived social pressure to perform or not perform the behavior?', 'hard', [
                ['Subjective Norm', true], ['Attitude', false], ['Perceived Behavioral Control', false], ['Intention', false]
            ]],
            ['Which theory suggests that learning is promoted by modeling or observing other people?', 'easy', [
                ['Social Cognitive Theory', true], ['Health Belief Model', false], ['Transtheoretical Model', false], ['Theory of Planned Behavior', false]
            ]],
            ['In Social Cognitive Theory, the dynamic interplay among personal factors, environmental factors, and behavior is called:', 'hard', [
                ['Reciprocal Determinism', true], ['Self-Efficacy', false], ['Observational Learning', false], ['Behavioral Capability', false]
            ]],
            // Community Health Education
            ['What is the primary goal of Community Health Education?', 'medium', [
                ['Empowering people to achieve optimum health by bringing about lifestyle changes', true], ['Maximizing hospital profits', false], ['Curing chronic diseases through surgery', false], ['Providing advanced diagnostic imaging', false]
            ]],
            ['Who is considered a Community Health Worker?', 'easy', [
                ['Any person working in the community to improve health, often a trained local resident', true], ['Only licensed medical doctors', false], ['Only government politicians', false], ['Only foreign medical volunteers', false]
            ]],
            ['A "Two-Way Referral System" in community health ensures that:', 'hard', [
                ['Cases are referred from local barangay workers to higher facilities, and feedback/follow-up flows back down', true], ['Doctors and nurses constantly swap roles', false], ['Patients must get a second opinion before treatment', false], ['Only two hospitals are involved in a patient\'s care', false]
            ]],
            ['In the Diagnostic Stages of Educational Planning, which phase involves "identifying what must be known, useful to know, and nice to know"?', 'medium', [
                ['Planning Phase', true], ['Implementation Phase', false], ['Evaluation Phase', false], ['Post-Training Phase', false]
            ]],
            ['During the Implementation Phase of community health education, what is crucial to draw out from participants?', 'medium', [
                ['Their understanding of the topic', true], ['Their financial contributions', false], ['Their political affiliations', false], ['Their medical history records', false]
            ]],
            ['The Evaluation Phase of a health education program primarily aims to:', 'easy', [
                ['Determine if the goals and objectives were met', true], ['Secure funding for the next year', false], ['Punish workers who underperformed', false], ['Provide medical treatment to the participants', false]
            ]],
            ['Which factor is considered a significant barrier to effective community health education?', 'medium', [
                ['Language and cultural differences', true], ['Having too many visual aids', false], ['Conducting sessions in the morning', false], ['Providing free health screenings', false]
            ]],
            ['Which of the following is an effective strategy for engaging adult learners in community health education?', 'hard', [
                ['Making the content highly relevant to their daily lives and practical needs', true], ['Using purely theoretical lectures without discussion', false], ['Ignoring their prior experiences and knowledge', false], ['Enforcing strict memorization of medical terms', false]
            ]],
            ['Family Stress Theory suggests that a family\'s response to a stressful event depends on:', 'hard', [
                ['The stressor, the family\'s resources, and their perception of the event', true], ['Only the severity of the medical illness', false], ['The genetic background of the parents', false], ['The neighborhood they live in', false]
            ]],
            ['In the context of community health, empowerment refers to:', 'medium', [
                ['Equipping individuals and communities with the knowledge and tools to take control of their own health', true], ['Forcing individuals to comply with medical orders', false], ['Providing free medication indiscriminately', false], ['Centralizing all healthcare decisions to the government', false]
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
