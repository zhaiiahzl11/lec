<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lecture;
use App\Models\Question;

class BiostatisticsLecture3Seeder extends Seeder
{
    public function run(): void
    {
        $lecture = Lecture::where('title', 'Like', '%Lecture 3 - Process of Measuring & Analysing Health Data%')->first();
        if (!$lecture) {
            $lecture = Lecture::create([
                'title' => 'Biostatistics Lecture 3 - Process of Measuring & Analysing Health Data',
                'description' => 'The process of measuring and analyzing health data in biostatistics involves the study of disease frequencies, calculating the rate of disease occurrence, determining the probability of disease and death, and comparing the occurrence of disease in different groups.',
                'is_previous' => false,
                'category' => 'Biostatistics'
            ]);
        } else {
            $lecture->update(['is_previous' => false, 'category' => 'Biostatistics']);
            $lecture->questions()->delete();
        }

        $questions = [
            [
                'What measure is defined as a part expressed against its whole, where the numerator is a subset of the denominator, with no time dimension?',
                'easy',
                [
                    ['Proportion', true],
                    ['Rate', false],
                    ['Ratio', false],
                    ['Person-Time', false]
                ]
            ],
            [
                'What frequency measure compares any two values or relative magnitudes of two quantities where the numerator is NOT part of the whole?',
                'easy',
                [
                    ['Ratio', true],
                    ['Proportion', false],
                    ['Rate', false],
                    ['Incidence', false]
                ]
            ],
            [
                'What measure quantifies how fast an event occurs in a population and ALWAYS carries a time unit in its denominator?',
                'easy',
                [
                    ['Rate', true],
                    ['Proportion', false],
                    ['Ratio', false],
                    ['Prevalence', false]
                ]
            ],
            [
                'If a block has 10 males and 30 females, how should the male-to-female ratio be expressed?',
                'medium',
                [
                    ['10:30 (or 1:3)', true],
                    ['30:10 (or 3:1)', false],
                    ['10:40', false],
                    ['30:40', false]
                ]
            ],
            [
                'In a town of 50,000 residents, 3,500 are aged 65+. What proportion of the population is elderly?',
                'medium',
                [
                    ['7%', true],
                    ['14%', false],
                    ['3.5%', false],
                    ['7 per 1,000', false]
                ]
            ],
            [
                'Why is a multiplier (10^n) used in rate formulas in biostatistics?',
                'medium',
                [
                    ['To obtain a whole number and make small decimals easier to visualize', true],
                    ['To change a proportion into a ratio', false],
                    ['To remove the time component', false],
                    ['To adjust for age bias', false]
                ]
            ],
            [
                'What morbidity measure is defined as the proportion of an at-risk group that develops a new disease over a defined, usually short, period?',
                'medium',
                [
                    ['Incidence Proportion (Attack Rate)', true],
                    ['Point Prevalence', false],
                    ['Secondary Attack Rate', false],
                    ['Period Prevalence', false]
                ]
            ],
            [
                'Incidence Proportion is commonly known by what name in outbreak investigations?',
                'easy',
                [
                    ['Attack Rate', true],
                    ['Case Fatality Rate', false],
                    ['Prevalence Rate', false],
                    ['Mortality Rate', false]
                ]
            ],
            [
                'What morbidity measure quantifies person-to-person spread within a close-contact group like a household?',
                'medium',
                [
                    ['Secondary Attack Rate (SAR)', true],
                    ['Primary Attack Rate', false],
                    ['Incidence Rate', false],
                    ['Point Prevalence', false]
                ]
            ],
            [
                'When calculating the Secondary Attack Rate, what is excluded from the denominator?',
                'hard',
                [
                    ['The primary (index) case(s)', true],
                    ['All uninfected contacts', false],
                    ['People with natural immunity', false],
                    ['The general population', false]
                ]
            ],
            [
                'In an outbreak investigation where 300 attended a fiesta and 45 developed gastroenteritis, what is the primary attack rate?',
                'medium',
                [
                    ['15%', true],
                    ['18%', false],
                    ['45%', false],
                    ['15 per 1,000', false]
                ]
            ],
            [
                'If 45 fiesta cases return home and 27 out of 150 household contacts become ill, what is the secondary attack rate?',
                'medium',
                [
                    ['18%', true],
                    ['15%', false],
                    ['27%', false],
                    ['30%', false]
                ]
            ],
            [
                'Which morbidity measure uses person-time at risk in its denominator instead of a head count?',
                'hard',
                [
                    ['Incidence Rate (Person-Time Rate)', true],
                    ['Incidence Proportion', false],
                    ['Point Prevalence', false],
                    ['Secondary Attack Rate', false]
                ]
            ],
            [
                'If a 5-year study accumulates 2,150 person-years of observation and diagnoses 86 new cases, what is the incidence rate per 1,000 person-years?',
                'hard',
                [
                    ['40 cases per 1,000 person-years', true],
                    ['25 cases per 1,000 person-years', false],
                    ['86 cases per 1,000 person-years', false],
                    ['4 cases per 1,000 person-years', false]
                ]
            ],
            [
                'The proportion of a population with a disease at ONE specific moment in time (a snapshot) is called:',
                'medium',
                [
                    ['Point Prevalence', true],
                    ['Period Prevalence', false],
                    ['Incidence Rate', false],
                    ['Attack Rate', false]
                ]
            ],
            [
                'The proportion of a population that had a disease at ANY time during a defined window (e.g., a full year) is called:',
                'medium',
                [
                    ['Period Prevalence', true],
                    ['Point Prevalence', false],
                    ['Incidence Proportion', false],
                    ['Attack Rate', false]
                ]
            ],
            [
                'Which measure counts every death from every cause against the entire mid-year population?',
                'easy',
                [
                    ['Crude Death Rate (Mortality Rate)', true],
                    ['Cause-Specific Death Rate', false],
                    ['Case Fatality Rate', false],
                    ['Proportionate Mortality', false]
                ]
            ],
            [
                'What is the standard multiplier for Crude Death Rate (CDR)?',
                'easy',
                [
                    ['1,000', true],
                    ['100', false],
                    ['100,000', false],
                    ['10,000', false]
                ]
            ],
            [
                'If a city of 50,000 residents records 380 total deaths in a year, what is the Crude Death Rate?',
                'medium',
                [
                    ['7.6 deaths per 1,000 population', true],
                    ['76 deaths per 100,000 population', false],
                    ['3.8 deaths per 1,000 population', false],
                    ['15.2 deaths per 1,000 population', false]
                ]
            ],
            [
                'Which mortality measure restricts the numerator to deaths from one named cause while keeping the whole population as the denominator?',
                'medium',
                [
                    ['Cause-Specific Death Rate', true],
                    ['Proportionate Mortality', false],
                    ['Case Fatality Rate', false],
                    ['Age-Specific Death Rate', false]
                ]
            ],
            [
                'What is the standard multiplier for Cause-Specific Death Rate?',
                'medium',
                [
                    ['100,000', true],
                    ['1,000', false],
                    ['100', false],
                    ['10,000', false]
                ]
            ],
            [
                'If 95 out of 380 total deaths in a population of 50,000 were due to cardiovascular disease, what is the cause-specific death rate?',
                'hard',
                [
                    ['190 per 100,000 population', true],
                    ['95 per 1,000 population', false],
                    ['25% of all deaths', false],
                    ['380 per 100,000 population', false]
                ]
            ],
            [
                'Which mortality indicator restricts both the numerator and denominator to a single age group?',
                'medium',
                [
                    ['Age-Specific Death Rate (ASDR)', true],
                    ['Cause-Specific Death Rate', false],
                    ['Crude Death Rate', false],
                    ['Proportionate Mortality', false]
                ]
            ],
            [
                'If 210 deaths occurred among 3,500 residents aged 65+, what is the ASDR for age 65+?',
                'hard',
                [
                    ['60 deaths per 1,000 population aged 65+', true],
                    ['21 deaths per 1,000', false],
                    ['6 deaths per 1,000', false],
                    ['60 per 100,000', false]
                ]
            ],
            [
                'What mortality measure has a denominator of diagnosed cases of a disease (not the general population) and measures disease severity?',
                'medium',
                [
                    ['Case Fatality Rate (CFR)', true],
                    ['Cause-Specific Death Rate', false],
                    ['Proportionate Mortality', false],
                    ['Death-to-Case Ratio', false]
                ]
            ],
            [
                'If 500 dengue cases were diagnosed and 15 patients died from dengue, what is the Case Fatality Rate?',
                'medium',
                [
                    ['3%', true],
                    ['30%', false],
                    ['0.3%', false],
                    ['15 per 1,000', false]
                ]
            ],
            [
                'Which indicator ties deaths from a disease to cases reported in the same period for routine surveillance reporting?',
                'hard',
                [
                    ['Death-to-Case Ratio', true],
                    ['Case Fatality Rate', false],
                    ['Proportionate Mortality', false],
                    ['Cause-Specific Death Rate', false]
                ]
            ],
            [
                'Which mortality indicator slices up total deaths by cause, answering "among all deaths, how many died of that specific cause?"',
                'medium',
                [
                    ['Proportionate Mortality', true],
                    ['Cause-Specific Death Rate', false],
                    ['Case Fatality Rate', false],
                    ['Crude Death Rate', false]
                ]
            ],
            [
                'If 95 out of 380 total deaths in a hospital were due to cardiovascular disease, what is the proportionate mortality for cardiovascular disease?',
                'medium',
                [
                    ['25%', true],
                    ['190 per 100,000', false],
                    ['9.5%', false],
                    ['50%', false]
                ]
            ],
            [
                'What mortality rate measures infant deaths occurring in the first 28 days of life per 1,000 live births?',
                'medium',
                [
                    ['Neonatal Mortality Rate', true],
                    ['Postneonatal Mortality Rate', false],
                    ['Infant Mortality Rate', false],
                    ['Fetal Death Rate', false]
                ]
            ],
            [
                'What mortality rate measures infant deaths occurring between 28 days and 1 year of age per 1,000 live births?',
                'medium',
                [
                    ['Postneonatal Mortality Rate', true],
                    ['Neonatal Mortality Rate', false],
                    ['Infant Mortality Rate', false],
                    ['Perinatal Mortality Rate', false]
                ]
            ],
            [
                'What mortality rate combines both neonatal and postneonatal deaths under 1 year of age per 1,000 live births?',
                'medium',
                [
                    ['Infant Mortality Rate', true],
                    ['Neonatal Mortality Rate', false],
                    ['Crude Death Rate', false],
                    ['Fetal Death Rate', false]
                ]
            ],
            [
                'If a district records 9 neonatal deaths and 6 postneonatal deaths out of 750 live births, what is the Infant Mortality Rate?',
                'hard',
                [
                    ['20 per 1,000 live births', true],
                    ['12 per 1,000 live births', false],
                    ['8 per 1,000 live births', false],
                    ['15 per 1,000 live births', false]
                ]
            ],
            [
                'Which mortality measure covers fetal deaths at 20 weeks gestation or later, using (Live Births + Fetal Deaths) in its denominator?',
                'hard',
                [
                    ['Fetal Death Rate', true],
                    ['Neonatal Mortality Rate', false],
                    ['Infant Mortality Rate', false],
                    ['Maternal Mortality Rate', false]
                ]
            ],
            [
                'If 12 fetal deaths (≥20 wks) occur alongside 750 live births (total 762), what is the Fetal Death Rate?',
                'hard',
                [
                    ['15.7 per 1,000 total births', true],
                    ['16 per 1,000 live births', false],
                    ['12 per 1,000 live births', false],
                    ['20 per 1,000 total births', false]
                ]
            ],
            [
                'What rate measures pregnancy-related deaths against live births as a proxy for women at risk?',
                'medium',
                [
                    ['Maternal Mortality Rate', true],
                    ['General Fertility Rate', false],
                    ['Age-Specific Fertility Rate', false],
                    ['Fetal Death Rate', false]
                ]
            ],
            [
                'What is the standard multiplier for Maternal Mortality Rate?',
                'medium',
                [
                    ['100,000', true],
                    ['1,000', false],
                    ['100', false],
                    ['10,000', false]
                ]
            ],
            [
                'If 2 maternal deaths occur among 750 live births, what is the Maternal Mortality Rate?',
                'hard',
                [
                    ['266.7 per 100,000 live births', true],
                    ['2.67 per 1,000 live births', false],
                    ['200 per 100,000 live births', false],
                    ['26.7 per 100,000 live births', false]
                ]
            ],
            [
                'What natality measure counts every live birth against the entire mid-year population?',
                'easy',
                [
                    ['Crude Birth Rate (CBR)', true],
                    ['General Fertility Rate', false],
                    ['Age-Specific Fertility Rate', false],
                    ['Gross Reproduction Rate', false]
                ]
            ],
            [
                'If 750 live births occur in a population of 50,000, what is the Crude Birth Rate?',
                'medium',
                [
                    ['15 births per 1,000 population', true],
                    ['15 births per 100,000 population', false],
                    ['7.5 births per 1,000 population', false],
                    ['30 births per 1,000 population', false]
                ]
            ],
            [
                'Which natality measure narrows the denominator to women of childbearing age (commonly 15–49 years)?',
                'medium',
                [
                    ['General (Crude) Fertility Rate', true],
                    ['Crude Birth Rate', false],
                    ['Age-Specific Fertility Rate', false],
                    ['Total Fertility Rate', false]
                ]
            ],
            [
                'If 750 live births occur among 12,500 women aged 15–49, what is the General Fertility Rate?',
                'hard',
                [
                    ['60 births per 1,000 women aged 15–49', true],
                    ['15 births per 1,000 women', false],
                    ['50 births per 1,000 women', false],
                    ['120 births per 1,000 women', false]
                ]
            ],
            [
                'What formula gives the Crude Rate of Natural Increase of a population?',
                'medium',
                [
                    ['Crude Birth Rate minus Crude Death Rate (CBR - CDR)', true],
                    ['Crude Birth Rate plus Migration Rate', false],
                    ['General Fertility Rate minus Crude Death Rate', false],
                    ['Crude Birth Rate divided by Crude Death Rate', false]
                ]
            ],
            [
                'If CBR is 15 per 1,000 and CDR is 7.6 per 1,000, what is the Crude Rate of Natural Increase?',
                'medium',
                [
                    ['7.4 per 1,000 natural increase', true],
                    ['22.6 per 1,000', false],
                    ['7.6 per 1,000', false],
                    ['15 per 1,000', false]
                ]
            ],
            [
                'What is the threshold birth weight for a baby to be classified under the Low-Birth-Weight Ratio?',
                'medium',
                [
                    ['Less than 2,500 grams', true],
                    ['Less than 2,000 grams', false],
                    ['Less than 3,000 grams', false],
                    ['Less than 1,500 grams', false]
                ]
            ],
            [
                'If 54 out of 750 live births weighed less than 2,500 grams, what is the Low-Birth-Weight Ratio?',
                'medium',
                [
                    ['7.2%', true],
                    ['5.4%', false],
                    ['14.4%', false],
                    ['7.2 per 1,000', false]
                ]
            ],
            [
                'Which natality measure restricts both live births and women in the denominator to a single 5-year age band?',
                'medium',
                [
                    ['Age-Specific Fertility Rate (ASFR)', true],
                    ['General Fertility Rate', false],
                    ['Crude Birth Rate', false],
                    ['Total Fertility Rate', false]
                ]
            ],
            [
                'If 660 live births are attributed to 5,500 women aged 25–29, what is the ASFR for age 25–29?',
                'hard',
                [
                    ['120 births per 1,000 women aged 25–29', true],
                    ['66 births per 1,000 women', false],
                    ['12 births per 1,000 women', false],
                    ['120 per 100,000 women', false]
                ]
            ],
            [
                'A school health survey finds 45 of 900 enrolled students have scabies on March 1. What is the point prevalence?',
                'hard',
                [
                    ['50 per 1,000 students (or 5%)', true],
                    ['45 per 1,000 students', false],
                    ['5 per 1,000 students', false],
                    ['500 per 1,000 students', false]
                ]
            ],
            [
                'In a district with 2,400 live births and 19 infant deaths under 28 days old, what is the Neonatal Mortality Rate?',
                'hard',
                [
                    ['7.9 per 1,000 live births', true],
                    ['19 per 1,000 live births', false],
                    ['7.9 per 100,000 live births', false],
                    ['12 per 1,000 live births', false]
                ]
            ]
        ];

        foreach ($questions as $q) {
            $question = $lecture->questions()->create([
                'question' => $q[0],
                'difficulty' => $q[1]
            ]);

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
