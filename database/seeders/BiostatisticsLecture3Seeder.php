<?php

namespace Database\Seeders;

use App\Models\Lecture;
use Illuminate\Database\Seeder;

class BiostatisticsLecture3Seeder extends Seeder
{
    public function run(): void
    {
        $lecture = Lecture::where('title', 'Biostatistics Lecture 3 - Process of Measuring & Analysing Health Data')->first();
        if (!$lecture) {
            $lecture = Lecture::create([
                'title' => 'Biostatistics Lecture 3 - Process of Measuring & Analysing Health Data',
                'description' => 'Quiz on Process of Measuring, Frequency, Morbidity, Mortality, and Natality Measures.',
                'is_previous' => false,
                'category' => 'Biostatistics'
            ]);
        } else {
            $lecture->update(['is_previous' => false, 'category' => 'Biostatistics']);
            $lecture->questions()->delete();
        }

        $questions = [
            ['Which measure relates the magnitude of two quantities where the numerator is NOT a subset of the denominator?', 'medium', [
                ['Rate', false],
                ['Proportion', false],
                ['Ratio', true],
                ['Attack Rate', false]
            ]],
            ['What does the Incidence Proportion (Attack Rate) measure?', 'medium', [
                ['The proportion of an at-risk group that develops new disease over a defined period.', true],
                ['The total number of existing cases at a single moment in time.', false],
                ['The number of new cases divided by the person-time at risk.', false],
                ['The number of deaths compared to the total population.', false]
            ]],
            ['The denominator for Incidence Rate (Person-Time Rate) is:', 'hard', [
                ['The total mid-year population.', false],
                ['The number of new cases during the period.', false],
                ['The total number of people initially at risk.', false],
                ['The person-time accumulated by individuals at risk.', true]
            ]],
            ['Which measure is considered a snapshot of a disease in a population at one specific moment?', 'easy', [
                ['Period Prevalence', false],
                ['Incidence Rate', false],
                ['Point Prevalence', true],
                ['Secondary Attack Rate', false]
            ]],
            ['What does the Case Fatality Rate (CFR) measure?', 'medium', [
                ['The proportion of deaths from a specific cause out of all deaths.', false],
                ['The severity of a disease by dividing deaths from the disease by diagnosed cases.', true],
                ['The number of deaths from a disease per 100,000 population.', false],
                ['The speed at which an illness spreads in a community.', false]
            ]],
            ['Which mortality measure focuses on deaths in the first 28 days of life compared to live births?', 'medium', [
                ['Neonatal Mortality Rate', true],
                ['Postneonatal Mortality Rate', false],
                ['Infant Mortality Rate', false],
                ['Fetal Death Rate', false]
            ]],
            ['The denominator for Maternal Mortality Rate is typically:', 'hard', [
                ['The number of women of childbearing age.', false],
                ['The total mid-year population.', false],
                ['The number of live births.', true],
                ['The number of pregnant women.', false]
            ]],
            ['What does the Crude Rate of Natural Increase measure?', 'medium', [
                ['The total number of births minus total deaths in a population.', false],
                ['The Crude Birth Rate minus the Crude Death Rate.', true],
                ['The growth of a population including migration.', false],
                ['The proportion of live births weighing under 2,500 grams.', false]
            ]],
            ['In the Secondary Attack Rate formula, the denominator represents:', 'hard', [
                ['The total population of the district.', false],
                ['The primary index cases.', false],
                ['The susceptible contacts minus the primary cases.', true],
                ['The person-time at risk for all contacts.', false]
            ]],
            ['Which rate sharpens the denominator to only include women of childbearing age (commonly 15–49)?', 'medium', [
                ['Crude Birth Rate', false],
                ['Age-Specific Fertility Rate', false],
                ['General Fertility Rate', true],
                ['Maternal Mortality Rate', false]
            ]],
            ['Proportionate Mortality tells you:', 'medium', [
                ['The risk of dying from a specific disease in a population.', false],
                ['The share of all deaths that a specific cause represents.', true],
                ['The fatality of a specific disease among those diagnosed.', false],
                ['The death rate specifically for neonates.', false]
            ]],
            ['When calculating the Fetal Death Rate, the denominator is:', 'hard', [
                ['Live births only.', false],
                ['Live births plus fetal deaths.', true],
                ['Total pregnancies.', false],
                ['Women of childbearing age.', false]
            ]],
            ['Which measure compares the burden of specific diseases across populations or years, typically scaled per 100,000?', 'medium', [
                ['Cause-Specific Death Rate', true],
                ['Crude Death Rate', false],
                ['Proportionate Mortality', false],
                ['Case Fatality Rate', false]
            ]],
            ['What distinguishes a Rate from a Proportion?', 'easy', [
                ['A rate is always expressed as a percentage.', false],
                ['A rate has no time dimension.', false],
                ['A rate measures how fast an event occurs and always carries a time unit.', true],
                ['A proportion compares two completely different groups.', false]
            ]],
            ['Which value is used as a proxy for "women at risk" in the Maternal Mortality Rate formula?', 'medium', [
                ['Number of pregnant women', false],
                ['Women aged 15-49', false],
                ['Total female population', false],
                ['Live births', true]
            ]],
            ['Which of the following formulas represents the Infant Mortality Rate?', 'easy', [
                ['Deaths under 1 year old ÷ Live births', true],
                ['Deaths under 28 days old ÷ Live births', false],
                ['Deaths between 28 days and 1 year ÷ Live births', false],
                ['Deaths under 1 year old ÷ Mid-year population', false]
            ]],
            ['If 500 dengue cases are reported, and 15 deaths occur among dengue patients in the same year, the 3% calculated is justified as:', 'hard', [
                ['Case Fatality Rate if we are measuring disease severity among diagnosed cases.', false],
                ['Death-to-Case Ratio if we are tallying cases and deaths in the same window without cohort follow-up.', false],
                ['Both Case Fatality Rate and Death-to-Case Ratio depending on the context of data collection.', true],
                ['Cause-Specific Death Rate.', false]
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
