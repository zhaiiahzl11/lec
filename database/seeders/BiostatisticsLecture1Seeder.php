<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lecture;
use App\Models\Question;

class BiostatisticsLecture1Seeder extends Seeder
{
    public function run(): void
    {
        $lecture = Lecture::where('title', 'Like', '%Lecture 1 - Introduction to Biostatistics and Variables%')->first();
        if (!$lecture) {
            $lecture = Lecture::create([
                'title' => 'Biostatistics Lecture 1 - Introduction to Biostatistics and Variables',
                'description' => 'This lecture introduces the fundamental concepts of biostatistics, including its definition, objectives, and applications in health and medicine. It also covers different types of variables and scales of measurement, such as nominal, ordinal, interval, and ratio scales, which are essential for data classification and analysis in biological and health-related research.',
                'is_previous' => false,
                'category' => 'Biostatistics'
            ]);
        } else {
            $lecture->update(['is_previous' => false, 'category' => 'Biostatistics']);
            $lecture->questions()->delete();
        }

        $questions = [
            [
                'What does the prefix "Bio" in Biostatistics mean?',
                'easy',
                [
                    ['Life', true],
                    ['Numbers', false],
                    ['Science', false],
                    ['Medicine', false]
                ]
            ],
            [
                'According to King’s definition, the science of statistics is the method of judging what type of phenomena?',
                'medium',
                [
                    ['Collective, natural, or social phenomena', true],
                    ['Individual biological traits', false],
                    ['Clinical trial results', false],
                    ['Physiological measurements', false]
                ]
            ],
            [
                'Which definition of statistics emphasizes the process of collection, classification, description, and comparison of phenomena?',
                'medium',
                [
                    ['Lovitt’s Definition', true],
                    ['King’s Definition', false],
                    ['Croxton and Cowden’s Definition', false],
                    ['Fisher’s Definition', false]
                ]
            ],
            [
                'According to Croxton and Cowden’s Definition, statistics deals with the collection, analysis, and what other aspect of numerical data?',
                'medium',
                [
                    ['Interpretation', true],
                    ['Description', false],
                    ['Classification', false],
                    ['Distribution', false]
                ]
            ],
            [
                'Who is considered a pioneering figure in medical statistics for publishing 15 influential articles on statistical methods in 1937?',
                'hard',
                [
                    ['Austin Bradford Hill', true],
                    ['Douglas Altman', false],
                    ['Ronald Fisher', false],
                    ['Karl Pearson', false]
                ]
            ],
            [
                'In what year was the first randomized controlled trial (RCT) on the use of streptomycin for treating pulmonary tuberculosis published?',
                'hard',
                [
                    ['1948', true],
                    ['1937', false],
                    ['1952', false],
                    ['1992', false]
                ]
            ],
            [
                'What is considered the "gold standard" in clinical research?',
                'medium',
                [
                    ['Randomized Clinical Trial', true],
                    ['Observational Study', false],
                    ['Cross-sectional Survey', false],
                    ['Case Report', false]
                ]
            ],
            [
                'Between 1952 and 1982, publications related to statistics in medicine experienced what level of growth?',
                'hard',
                [
                    ['Eightfold increase', true],
                    ['Twofold increase', false],
                    ['Tenfold increase', false],
                    ['Exponential decline', false]
                ]
            ],
            [
                'Which notable statistician pioneered medical statistics with a focus on statistical errors and improving clinical research reporting?',
                'hard',
                [
                    ['Douglas Altman', true],
                    ['Ronald Fisher', false],
                    ['Carl Gauss', false],
                    ['C. R. Rao', false]
                ]
            ],
            [
                'Who is known as the "Father of Experimental Statistics" and revolutionized statistics with ANOVA?',
                'hard',
                [
                    ['Ronald Fisher', true],
                    ['Karl Pearson', false],
                    ['Carl Gauss', false],
                    ['Austin Bradford Hill', false]
                ]
            ],
            [
                'Which statistician developed the method of least squares and the bell-shaped distribution?',
                'medium',
                [
                    ['Carl Gauss', true],
                    ['Karl Pearson', false],
                    ['Ronald Fisher', false],
                    ['C. R. Rao', false]
                ]
            ],
            [
                'Who founded modern statistics and created a correlation coefficient to measure relationships?',
                'medium',
                [
                    ['Karl Pearson', true],
                    ['C. R. Rao', false],
                    ['Douglas Altman', false],
                    ['Austin Bradford Hill', false]
                ]
            ],
            [
                'Which statistician is associated with advanced estimation theory and multivariate analysis with a specific bound and score test?',
                'hard',
                [
                    ['C. R. Rao', true],
                    ['Carl Gauss', false],
                    ['Ronald Fisher', false],
                    ['Karl Pearson', false]
                ]
            ],
            [
                'According to Indrayan (2021), biostatistics helps in managing what aspect of medicine?',
                'medium',
                [
                    ['Medical uncertainties', true],
                    ['Hospital administration', false],
                    ['Surgical precision', false],
                    ['Drug manufacturing', false]
                ]
            ],
            [
                'Biological factors, environmental factors, and sampling factors are examples of what source of medical uncertainty?',
                'hard',
                [
                    ['Intrinsic factors', true],
                    ['Natural variation', false],
                    ['Measurement errors', false],
                    ['Incomplete knowledge', false]
                ]
            ],
            [
                'Differences among observers or instruments fall under which source of medical uncertainty?',
                'medium',
                [
                    ['Natural variation', true],
                    ['Intrinsic factors', false],
                    ['Assessment errors', false],
                    ['Incomplete knowledge', false]
                ]
            ],
            [
                'Which application of biostatistics involves systematically documenting the medical history of diseases to identify patterns and risk factors?',
                'medium',
                [
                    ['Clinical Medicine', true],
                    ['Patient Care', false],
                    ['Preventive Medicine', false],
                    ['Health Planning', false]
                ]
            ],
            [
                'Using techniques such as sensitivity, specificity, and predictive values to select diagnostic tests is an application of biostatistics in:',
                'medium',
                [
                    ['Patient Care', true],
                    ['Medical Research', false],
                    ['Preventive Medicine', false],
                    ['Health Planning', false]
                ]
            ],
            [
                'Which application of biostatistics quantifies the prevalence and incidence of health problems within a community?',
                'medium',
                [
                    ['Preventive Medicine', true],
                    ['Patient Care', false],
                    ['Clinical Medicine', false],
                    ['Medical Research', false]
                ]
            ],
            [
                'Objectively assessing the outcomes of health programs by measuring their impact is an application of biostatistics in:',
                'hard',
                [
                    ['Health Planning and Evaluation', true],
                    ['Medical Research', false],
                    ['Clinical Medicine', false],
                    ['Preventive Medicine', false]
                ]
            ],
            [
                'Evaluating the reliability and validity of tools and instruments used to collect data is an application of biostatistics in:',
                'medium',
                [
                    ['Medical Research', true],
                    ['Patient Care', false],
                    ['Health Planning', false],
                    ['Preventive Medicine', false]
                ]
            ],
            [
                'What are the four major activities in the process of statistics?',
                'medium',
                [
                    ['Collecting, Characterizing, Presenting, Interpreting', true],
                    ['Collecting, Classifying, Describing, Comparing', false],
                    ['Planning, Conducting, Analyzing, Interpreting', false],
                    ['Sampling, Surveying, Organizing, Analyzing', false]
                ]
            ],
            [
                'A set of values of one or more variables recorded on one or more observational units is called:',
                'easy',
                [
                    ['Data', true],
                    ['Statistics', false],
                    ['Variables', false],
                    ['Population', false]
                ]
            ],
            [
                'Data collected by YOU (the researcher) through observation is known as:',
                'easy',
                [
                    ['Primary Data', true],
                    ['Secondary Data', false],
                    ['Qualitative Data', false],
                    ['Continuous Data', false]
                ]
            ],
            [
                'Medical records, registries, and censuses are examples of what type of data?',
                'easy',
                [
                    ['Secondary Data', true],
                    ['Primary Data', false],
                    ['Experimental Data', false],
                    ['Survey Data', false]
                ]
            ],
            [
                'A characteristic or attribute of persons or objects which assumes different values or labels is a:',
                'easy',
                [
                    ['Variable', true],
                    ['Statistic', false],
                    ['Parameter', false],
                    ['Data point', false]
                ]
            ],
            [
                'Variables that are manipulated or changed in an experiment to examine their effects are called:',
                'medium',
                [
                    ['Independent Variables', true],
                    ['Dependent Variables', false],
                    ['Moderator Variables', false],
                    ['Mediator Variables', false]
                ]
            ],
            [
                'In an experiment, the "cause or input" is the:',
                'easy',
                [
                    ['Independent Variable', true],
                    ['Dependent Variable', false],
                    ['Moderator Variable', false],
                    ['Mediator Variable', false]
                ]
            ],
            [
                'Variables that are measured in a study to see if they are affected by other variables are called:',
                'medium',
                [
                    ['Dependent Variables', true],
                    ['Independent Variables', false],
                    ['Moderator Variables', false],
                    ['Mediator Variables', false]
                ]
            ],
            [
                'A variable that may influence the strength or direction of the relationship between independent and dependent variables is a:',
                'hard',
                [
                    ['Moderator Variable', true],
                    ['Mediator Variable', false],
                    ['Confounding Variable', false],
                    ['Independent Variable', false]
                ]
            ],
            [
                'A variable that explains HOW or WHY the independent variable affects the dependent variable is a:',
                'hard',
                [
                    ['Mediator Variable', true],
                    ['Moderator Variable', false],
                    ['Continuous Variable', false],
                    ['Discrete Variable', false]
                ]
            ],
            [
                'In a study on medication dosage and blood pressure, "physical activity" influences how patients respond. Physical activity is a:',
                'hard',
                [
                    ['Moderator Variable', true],
                    ['Independent Variable', false],
                    ['Dependent Variable', false],
                    ['Mediator Variable', false]
                ]
            ],
            [
                'What is the most basic level of measurement that categorizes variables without providing value or order?',
                'easy',
                [
                    ['Nominal Scale', true],
                    ['Ordinal Scale', false],
                    ['Interval Scale', false],
                    ['Ratio Scale', false]
                ]
            ],
            [
                'Gender and marital status are examples of what scale of measurement?',
                'medium',
                [
                    ['Nominal Scale', true],
                    ['Ordinal Scale', false],
                    ['Interval Scale', false],
                    ['Ratio Scale', false]
                ]
            ],
            [
                'A scale of measurement that represents variables with a meaningful rank or order, but intervals are not necessarily equal, is called:',
                'medium',
                [
                    ['Ordinal Scale', true],
                    ['Nominal Scale', false],
                    ['Interval Scale', false],
                    ['Ratio Scale', false]
                ]
            ],
            [
                'Socioeconomic status and educational attainment are examples of what scale of measurement?',
                'medium',
                [
                    ['Ordinal Scale', true],
                    ['Nominal Scale', false],
                    ['Interval Scale', false],
                    ['Ratio Scale', false]
                ]
            ],
            [
                'A scale of measurement that orders variables with exact differences between them but lacks a true zero point is:',
                'medium',
                [
                    ['Interval Scale', true],
                    ['Ratio Scale', false],
                    ['Ordinal Scale', false],
                    ['Nominal Scale', false]
                ]
            ],
            [
                'Temperature (in Celsius) and IQ scores are examples of what scale of measurement?',
                'hard',
                [
                    ['Interval Scale', true],
                    ['Ratio Scale', false],
                    ['Ordinal Scale', false],
                    ['Nominal Scale', false]
                ]
            ],
            [
                'The highest level of measurement that has all characteristics of an interval scale plus a true zero point is:',
                'easy',
                [
                    ['Ratio Scale', true],
                    ['Interval Scale', false],
                    ['Ordinal Scale', false],
                    ['Nominal Scale', false]
                ]
            ],
            [
                'Weight, income, and distance are examples of what scale of measurement?',
                'medium',
                [
                    ['Ratio Scale', true],
                    ['Interval Scale', false],
                    ['Ordinal Scale', false],
                    ['Nominal Scale', false]
                ]
            ],
            [
                'Can a higher level of measurement be converted into a lower level of measurement?',
                'medium',
                [
                    ['Yes, e.g., Ratio to Ordinal', true],
                    ['No, it is impossible', false],
                    ['Only Nominal to Ratio', false],
                    ['Only Ordinal to Nominal', false]
                ]
            ],
            [
                'Values that are countable, distinct, and separate, usually whole numbers with no values in between, are called:',
                'medium',
                [
                    ['Discrete', true],
                    ['Continuous', false],
                    ['Qualitative', false],
                    ['Nominal', false]
                ]
            ],
            [
                'The number of doors in a latrine is an example of what type of variable relationship?',
                'medium',
                [
                    ['Discrete quantitative', true],
                    ['Continuous quantitative', false],
                    ['Nominal qualitative', false],
                    ['Ordinal qualitative', false]
                ]
            ],
            [
                'Values that can be measured and can have any value within a range, including decimals and fractions, are called:',
                'medium',
                [
                    ['Continuous', true],
                    ['Discrete', false],
                    ['Qualitative', false],
                    ['Nominal', false]
                ]
            ],
            [
                'Time in minutes (e.g., 5.5 min) is an example of what type of variable?',
                'easy',
                [
                    ['Continuous', true],
                    ['Discrete', false],
                    ['Nominal', false],
                    ['Ordinal', false]
                ]
            ],
            [
                'The science in which qualities are converted into meaningful quantities using a scoring system is called:',
                'hard',
                [
                    ['Clinimetrics', true],
                    ['Biometrics', false],
                    ['Epidemiology', false],
                    ['Psychometrics', false]
                ]
            ],
            [
                'Which of the following is an example of a clinimetric scoring system?',
                'medium',
                [
                    ['APGAR Score', true],
                    ['Blood Pressure Measurement', false],
                    ['Complete Blood Count', false],
                    ['Fasting Blood Sugar', false]
                ]
            ],
            [
                'The APGAR score is specifically used for:',
                'medium',
                [
                    ['Neonatal prognosis', true],
                    ['Quantifying patient severity in ICU', false],
                    ['Measuring smoking history', false],
                    ['Assessing cardiovascular risk', false]
                ]
            ],
            [
                'The "G" in the APGAR score stands for:',
                'hard',
                [
                    ['Grimace', true],
                    ['Growth', false],
                    ['Glucose', false],
                    ['Gait', false]
                ]
            ],
            [
                'Which clinimetric score is used to quantify the severity of a patient\'s condition, standing for Acute Physiology and Chronic Health Evaluation?',
                'hard',
                [
                    ['APACHE Score', true],
                    ['APGAR Score', false],
                    ['Smoking Index', false],
                    ['Glasgow Coma Scale', false]
                ]
            ]
        ];

        foreach ($questions as $q) {
            $question = $lecture->questions()->create([
                'question' => $q[0],
                'difficulty' => $q[1]
            ]);

            // Randomize answers
            $answers = $q[2];
            shuffle($answers);
            foreach ($answers as $choice) {
                \App\Models\Choice::create([
                    'question_id' => $question->id,
                    'choice_text' => $choice[0],
                    'is_correct' => $choice[1]
                ]);
            }
        }
    }
}
