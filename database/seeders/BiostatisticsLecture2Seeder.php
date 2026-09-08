<?php

namespace Database\Seeders;

use App\Models\Lecture;
use Illuminate\Database\Seeder;

class BiostatisticsLecture2Seeder extends Seeder
{
    public function run(): void
    {
        $lecture = Lecture::where('title', 'Biostatistics Lecture 2 - Descriptive Statistics')->first();
        if (!$lecture) {
            $lecture = Lecture::create([
                'title' => 'Biostatistics Lecture 2 - Descriptive Statistics',
                'description' => 'Quiz on Descriptive Statistics, Central Tendency, Distribution Curves, Spread, and Position.',
                'is_previous' => false,
                'category' => 'Biostatistics'
            ]);
        } else {
            $lecture->update(['is_previous' => false, 'category' => 'Biostatistics']);
            $lecture->questions()->delete();
        }

        $questions = [
            ['Which of the following best describes inferential statistics?', 'medium', [
                ['It is used to organize data in meaningful forms.', false],
                ['It provides a description of data in an informative way.', false],
                ['It is the complete set of all items or people you want to study.', false],
                ['It is used to make decisions and predictions with a limited set of data.', true]
            ]],
            ['When should the median be used instead of the mean?', 'medium', [
                ['When the dataset has a lot of extreme outliers.', true],
                ['When the data is measured on a ratio scale and is symmetrical.', false],
                ['When all values are nominal.', false],
                ['When you want to include every single value in the calculation.', false]
            ]],
            ['In a positively skewed distribution, what is the relationship between the mean, median, and mode?', 'hard', [
                ['Mean = Median = Mode', false],
                ['Mean < Median < Mode', false],
                ['Mean > Median > Mode', true],
                ['Mode > Mean > Median', false]
            ]],
            ['What does a variance measure?', 'easy', [
                ['The difference between the biggest and smallest number.', false],
                ['The middle value of a dataset.', false],
                ['The average squared distance of each value from the mean.', true],
                ['The most frequently occurring value.', false]
            ]],
            ['According to the Empirical Rule, what percentage of data falls within ±2 standard deviations from the mean in a normal distribution?', 'medium', [
                ['99.7%', false],
                ['95%', true],
                ['68%', false],
                ['50%', false]
            ]],
            ['Which graphical presentation is best for showing the proportion or percentage composition of a whole with 5 or fewer categories?', 'easy', [
                ['Histogram', false],
                ['Pie Chart', true],
                ['Frequency Polygon', false],
                ['Stem-and-Leaf Plot', false]
            ]],
            ['Which value is needed to calculate the Interquartile Range (IQR)?', 'medium', [
                ['Maximum and Minimum', false],
                ['Mean and Standard Deviation', false],
                ['Q3 and Q1', true],
                ['Q2 and Q1', false]
            ]],
            ['If a dataset has an odd number of values, how do you find the median?', 'easy', [
                ['Take the average of the two middle numbers.', false],
                ['It is the number that occurs most frequently.', false],
                ['Use the formula (n+1)÷2 to find the position of the middle number.', true],
                ['Divide the sum of all numbers by the total count.', false]
            ]],
            ['What is the formula to find the lower fence for outlier detection?', 'medium', [
                ['Q3 + 1.5 (IQR)', false],
                ['Q1 - 1.5 (IQR)', true],
                ['Q2 - 1.5 (IQR)', false],
                ['Q3 - Q1', false]
            ]],
            ['Which graph shows bars that touch with no gaps, representing continuous numeric data?', 'easy', [
                ['Bar Graph', false],
                ['Pie Chart', false],
                ['Histogram', true],
                ['Stem-and-Leaf Plot', false]
            ]],
            ['When interpreting a frequency distribution table, what does mutually exclusive mean?', 'medium', [
                ['Each data point belongs to only one category.', true],
                ['Each data point has a group to which it belongs.', false],
                ['The classes cover the entire range of values.', false],
                ['The limits of the classes overlap.', false]
            ]],
            ['In a negatively skewed distribution, where does the tail point?', 'easy', [
                ['To the right side.', false],
                ['To the left side.', true],
                ['It has no tail, it is bell-shaped.', false],
                ['Both sides equally.', false]
            ]],
            ['Which measure of central tendency is the ONLY one valid for nominal (categorical) data?', 'medium', [
                ['Mean', false],
                ['Mode', true],
                ['Median', false],
                ['Variance', false]
            ]],
            ['Which display should be used to show exact values and the shape of the distribution for a small dataset (n < 50)?', 'hard', [
                ['Box-and-Whisker Plot', false],
                ['Pie Chart', false],
                ['Histogram', false],
                ['Stem-and-Leaf Plot', true]
            ]],
            ['What does the Box-and-Whisker plot specifically highlight?', 'medium', [
                ['The spread of the middle 50% of the data and outliers.', true],
                ['The exact frequency of each nominal category.', false],
                ['The average deviation of each point from the mean.', false],
                ['The correlation between two variables.', false]
            ]],
            ['To determine the class interval for a frequency distribution, you divide the difference between the maximum and minimum values by:', 'medium', [
                ['The total number of observations.', false],
                ['The number of classes.', true],
                ['The mean.', false],
                ['The standard deviation.', false]
            ]],
            ['Which of the following is an example of an ungrouped data?', 'easy', [
                ['A frequency polygon.', false],
                ['Raw and unorganized information.', true],
                ['Data presented in a pie chart.', false],
                ['A stem-and-leaf plot.', false]
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
