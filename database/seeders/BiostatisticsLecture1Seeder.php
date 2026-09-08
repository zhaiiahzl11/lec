<?php

namespace Database\Seeders;

use App\Models\Lecture;
use Illuminate\Database\Seeder;

class BiostatisticsLecture1Seeder extends Seeder
{
    public function run(): void
    {
        $lecture = Lecture::where('title', 'Biostatistics Lecture 1 - Introduction to Biostatistics and Variables')->first();
        if (!$lecture) {
            $lecture = Lecture::create([
                'title' => 'Biostatistics Lecture 1 - Introduction to Biostatistics and Variables',
                'description' => 'Quiz on Introduction to Biostatistics, Variables, and Scales of Measurement.',
                'is_previous' => false,
                'category' => 'Biostatistics'
            ]);
        } else {
            $lecture->update(['is_previous' => false, 'category' => 'Biostatistics']);
            $lecture->questions()->delete();
        }

        $questions = [
            ['Which of the following best describes Lovitt\'s definition of statistics?', 'easy', [
                ['It is the method of judging collective, natural, or social phenomena.', false],
                ['It focuses on groups or patterns within a population rather than individuals.', false],
                ['It is the science which deals with collection, classification, description, and comparison of phenomena.', true],
                ['It is the method of least squares and Gaussian distribution.', false]
            ]],
            ['Who is known as the "Father of Experimental Statistics" and revolutionized statistics with ANOVA?', 'medium', [
                ['Austin Bradford Hill', false],
                ['Ronald Fisher', true],
                ['Douglas Altman', false],
                ['Karl Pearson', false]
            ]],
            ['In the context of biostatistics, what type of variable is manipulated or changed in an experiment to examine its effects?', 'easy', [
                ['Independent Variable', true],
                ['Dependent Variable', false],
                ['Moderator Variable', false],
                ['Mediator Variable', false]
            ]],
            ['Which scale of measurement has all the characteristics of an interval scale but also features a true zero point?', 'medium', [
                ['Interval', false],
                ['Ratio', true],
                ['Nominal', false],
                ['Ordinal', false]
            ]],
            ['Which score is used in clinimetrics to quantify the severity of a patient\'s condition?', 'hard', [
                ['APGAR Score', false],
                ['Smoking Index', false],
                ['BMI', false],
                ['APACHE Score', true]
            ]],
            ['What is an example of a natural variation that causes medical uncertainty?', 'medium', [
                ['Errors in measurements', false],
                ['Biological factors', false],
                ['Differences among observers', true],
                ['Incomplete knowledge', false]
            ]],
            ['Which of the following is considered secondary data?', 'easy', [
                ['A survey conducted by the researcher.', false],
                ['Data collected from medical records.', true],
                ['Data from a clinical trial managed by the researcher.', false],
                ['Observation notes written by the researcher.', false]
            ]],
            ['According to King\'s definition, what is the keyword in statistics?', 'medium', [
                ['Classification', false],
                ['Interpretation', false],
                ['Analysis', false],
                ['Collective', true]
            ]],
            ['Which level of measurement categorizes variables without providing value or order?', 'easy', [
                ['Nominal', true],
                ['Ordinal', false],
                ['Interval', false],
                ['Ratio', false]
            ]],
            ['Temperature measured in Celsius is an example of which scale of measurement?', 'medium', [
                ['Nominal', false],
                ['Ratio', false],
                ['Interval', true],
                ['Ordinal', false]
            ]],
            ['Which notable statistician developed the method of least squares and the bell-shaped distribution?', 'medium', [
                ['Karl Pearson', false],
                ['Carl Gauss', true],
                ['C. R. Rao', false],
                ['Austin Bradford Hill', false]
            ]],
            ['Which type of variable may influence the strength or direction of the relationship between independent and dependent variables?', 'medium', [
                ['Dependent', false],
                ['Moderator', true],
                ['Mediator', false],
                ['Input', false]
            ]],
            ['What role does biostatistics play in preventive medicine?', 'hard', [
                ['It diagnoses the condition of a single patient.', false],
                ['It quantifies the prevalence and incidence of health problems within a community.', true],
                ['It establishes the exact statistical criteria for normal vs abnormal clinical measure.', false],
                ['It combines statistical probabilities with clinical expertise.', false]
            ]],
            ['In the conversion of scales of measurement, which sequence represents moving from higher to lower levels?', 'medium', [
                ['Nominal → Ordinal → Interval → Ratio', false],
                ['Ratio → Interval → Ordinal → Nominal', true],
                ['Interval → Ratio → Nominal → Ordinal', false],
                ['Ordinal → Nominal → Ratio → Interval', false]
            ]],
            ['Which of the following is an example of a discrete variable?', 'easy', [
                ['Time in minutes', false],
                ['Weight in kilograms', false],
                ['Height in centimeters', false],
                ['Number of doors in a latrine', true]
            ]],
            ['Clinimetrics allows for the standardization of clinical assessments. Which of the following is an example of clinimetrics?', 'medium', [
                ['Fasting blood glucose level', false],
                ['APGAR Score', true],
                ['Body temperature', false],
                ['White blood cell count', false]
            ]],
            ['The methods used in dealing with statistics in the fields of medicine, biology, and public health are known as:', 'easy', [
                ['Calculus', false],
                ['Epidemiology', false],
                ['Biostatistics', true],
                ['Genetics', false]
            ]]
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
