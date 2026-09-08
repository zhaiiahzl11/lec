<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lecture;
use App\Models\Question;

class BiostatisticsLecture2Seeder extends Seeder
{
    public function run(): void
    {
        $lecture = Lecture::where('title', 'Like', '%Lecture 2 - Descriptive Statistics%')->first();
        if (!$lecture) {
            $lecture = Lecture::create([
                'title' => 'Biostatistics Lecture 2 - Descriptive Statistics',
                'description' => 'Quiz on Descriptive Statistics, Central Tendency, Spread, Position, and Data Presentation.',
                'is_previous' => false,
                'category' => 'Biostatistics'
            ]);
        } else {
            $lecture->update(['is_previous' => false, 'category' => 'Biostatistics']);
            $lecture->questions()->delete();
        }

        $questions = [
            ['What is defined as a characteristic of a sample or a single numerical datum?', 'easy', [
                ['Statistic', true], ['Statistics', false], ['Parameter', false], ['Population', false]
            ]],
            ['What term refers to the science of collecting, organizing, presenting, analyzing, and interpreting numerical data?', 'easy', [
                ['Statistics', true], ['Statistic', false], ['Variable', false], ['Parameter', false]
            ]],
            ['Which branch of statistics is used to organize, transform, and summarize data in an informative way?', 'medium', [
                ['Descriptive Statistics', true], ['Inferential Statistics', false], ['Clinimetrics', false], ['Epidemiology', false]
            ]],
            ['Which branch of statistics is used to make predictions or hypotheses about a population based on a sample?', 'medium', [
                ['Inferential Statistics', true], ['Descriptive Statistics', false], ['Summary Statistics', false], ['Mathematical Statistics', false]
            ]],
            ['What type of data consists of raw, unorganized information?', 'easy', [
                ['Ungrouped Data', true], ['Grouped Data', false], ['Categorical Data', false], ['Continuous Data', false]
            ]],
            ['Organized or processed data presented in a frequency table is known as:', 'easy', [
                ['Grouped Data', true], ['Ungrouped Data', false], ['Raw Data', false], ['Discrete Data', false]
            ]],
            ['The complete set of all items, people, or events that a researcher wants to study is called the:', 'easy', [
                ['Population', true], ['Sample', false], ['Parameter', false], ['Statistic', false]
            ]],
            ['A representative subset of a population actually measured in a study is called a:', 'easy', [
                ['Sample', true], ['Population', false], ['Census', false], ['Parameter', false]
            ]],
            ['What is the symbol for population mean?', 'medium', [
                ['μ (mu)', true], ['x̄ (x-bar)', false], ['σ (sigma)', false], ['s', false]
            ]],
            ['What is the symbol for sample mean?', 'medium', [
                ['x̄ (x-bar)', true], ['μ (mu)', false], ['s', false], ['σ (sigma)', false]
            ]],
            ['What is the symbol for sample variance?', 'medium', [
                ['s²', true], ['σ²', false], ['s', false], ['σ', false]
            ]],
            ['What is the symbol for population standard deviation?', 'medium', [
                ['σ (sigma)', true], ['s', false], ['σ²', false], ['s²', false]
            ]],
            ['Which measure of central tendency is the arithmetic average of a dataset?', 'easy', [
                ['Mean', true], ['Median', false], ['Mode', false], ['Range', false]
            ]],
            ['Which level(s) of data measurement can be used to compute a mean?', 'medium', [
                ['Interval and Ratio', true], ['Nominal and Ordinal', false], ['Nominal only', false], ['Ordinal only', false]
            ]],
            ['The sum of the deviations of each value from the mean is always equal to:', 'hard', [
                ['Zero', true], ['One', false], ['The sample size', false], ['The standard deviation', false]
            ]],
            ['Which measure of central tendency splits an ordered dataset exactly in half (50% upper, 50% lower)?', 'easy', [
                ['Median', true], ['Mean', false], ['Mode', false], ['Variance', false]
            ]],
            ['How is the median found in an even-numbered list of ordered data?', 'medium', [
                ['By averaging the two middle numbers', true], ['By taking the single middle number', false], ['By adding 1 to n and dividing by 2', false], ['By selecting the most frequent value', false]
            ]],
            ['Which measure of central tendency represents the value that occurs most frequently in a dataset?', 'easy', [
                ['Mode', true], ['Median', false], ['Mean', false], ['Midpoint', false]
            ]],
            ['What is the ONLY measure of central tendency valid for nominal (categorical) data?', 'medium', [
                ['Mode', true], ['Mean', false], ['Median', false], ['Standard Deviation', false]
            ]],
            ['A dataset with two modes is described as:', 'easy', [
                ['Bimodal', true], ['Unimodal', false], ['Multimodal', false], ['Non-modal', false]
            ]],
            ['In a perfectly symmetrical normal distribution curve, what is the relationship between mean, median, and mode?', 'medium', [
                ['Mean = Median = Mode', true], ['Mean > Median > Mode', false], ['Mode > Median > Mean', false], ['Mean > Mode > Median', false]
            ]],
            ['In a positively skewed distribution, where is the tail of the curve located?', 'medium', [
                ['On the right side', true], ['On the left side', false], ['In the center', false], ['On both sides equally', false]
            ]],
            ['What is the relationship between measures of central tendency in a positively skewed distribution?', 'hard', [
                ['Mean > Median > Mode', true], ['Mode > Median > Mean', false], ['Mean = Median = Mode', false], ['Median > Mean > Mode', false]
            ]],
            ['In a negatively skewed distribution (such as exam scores where most students pass), which measure is the largest?', 'hard', [
                ['Mode', true], ['Mean', false], ['Median', false], ['Range', false]
            ]],
            ['What formula indicates a negative skew in a distribution?', 'hard', [
                ['Mean - Median = negative value', true], ['Mean - Median = positive value', false], ['Mean - Median = 0', false], ['Mode - Mean = negative value', false]
            ]],
            ['The difference between the maximum and minimum values in a dataset is called the:', 'easy', [
                ['Range', true], ['Variance', false], ['Standard Deviation', false], ['Interquartile Range', false]
            ]],
            ['What is defined as the average squared distance of each value from the mean?', 'medium', [
                ['Variance', true], ['Standard Deviation', false], ['Range', false], ['Median', false]
            ]],
            ['Why is the square root of variance taken to obtain the standard deviation?', 'medium', [
                ['To return the unit of measurement back to the original unit', true], ['To eliminate negative numbers', false], ['To double the spread value', false], ['To calculate the median', false]
            ]],
            ['In the Empirical Rule for a normal distribution, approximately what percentage of data falls within ±1 SD of the mean?', 'medium', [
                ['68%', true], ['95%', false], ['99.7%', false], ['50%', false]
            ]],
            ['In the Empirical Rule, approximately what percentage of data falls within ±2 SD of the mean?', 'medium', [
                ['95%', true], ['68%', false], ['99.7%', false], ['90%', false]
            ]],
            ['In the Empirical Rule, what percentage of data falls within ±3 SD of the mean?', 'medium', [
                ['99.7%', true], ['95%', false], ['68%', false], ['100%', false]
            ]],
            ['Quartiles divide an ordered dataset into how many equal parts?', 'easy', [
                ['4 equal parts', true], ['10 equal parts', false], ['100 equal parts', false], ['2 equal parts', false]
            ]],
            ['Which quartile is equivalent to the 50th percentile and the median?', 'easy', [
                ['Q2', true], ['Q1', false], ['Q3', false], ['Q4', false]
            ]],
            ['What is the formula for the Interquartile Range (IQR)?', 'easy', [
                ['Q3 - Q1', true], ['Q3 + Q1', false], ['(Q3 - Q1) / 2', false], ['Q3 - Q2', false]
            ]],
            ['What formula is used to calculate the Upper Fence for identifying high outliers in a dataset?', 'hard', [
                ['Q3 + 1.5(IQR)', true], ['Q1 - 1.5(IQR)', false], ['Q3 + 3(IQR)', false], ['Median + 1.5(IQR)', false]
            ]],
            ['Deciles divide a dataset into how many equal parts?', 'easy', [
                ['10 equal parts', true], ['4 equal parts', false], ['100 equal parts', false], ['5 equal parts', false]
            ]],
            ['The 9th decile (D9) corresponds to which percentile?', 'medium', [
                ['90th percentile', true], ['9th percentile', false], ['95th percentile', false], ['50th percentile', false]
            ]],
            ['Percentiles divide a dataset into how many equal parts?', 'easy', [
                ['100 equal parts', true], ['10 equal parts', false], ['4 equal parts', false], ['50 equal parts', false]
            ]],
            ['When constructing a frequency distribution table, what rule is used to decide the number of classes (k)?', 'hard', [
                ['2^k rule (2^k ≥ n)', true], ['3^k rule', false], ['k = n/2', false], ['k = √n + 10', false]
            ]],
            ['In a frequency distribution table, classes must be mutually exclusive and collectively exhaustive. "Mutually exclusive" means:', 'medium', [
                ['Each data point belongs to only one category', true], ['All data points are included in the table', false], ['Class intervals must be unequal', false], ['Frequencies must sum to 100', false]
            ]],
            ['How is relative class frequency calculated?', 'medium', [
                ['Class frequency divided by total number of observations', true], ['Total observations divided by class frequency', false], ['Upper limit minus lower limit', false], ['Class frequency multiplied by 100', false]
            ]],
            ['Which graph displays categorical data using rectangular bars separated by gaps?', 'easy', [
                ['Bar Graph', true], ['Histogram', false], ['Frequency Polygon', false], ['Scatter Plot', false]
            ]],
            ['Which chart is a circle divided into slices emphasizing part-of-a-whole proportions for categorical data?', 'easy', [
                ['Pie Chart', true], ['Histogram', false], ['Box Plot', false], ['Stem-and-Leaf Plot', false]
            ]],
            ['Which graph displays continuous numerical data using touching bars with no gaps between them?', 'medium', [
                ['Histogram', true], ['Bar Graph', false], ['Pie Chart', false], ['Box Plot', false]
            ]],
            ['A line graph formed by connecting the midpoints of each class interval of continuous data is called a:', 'medium', [
                ['Frequency Polygon', true], ['Histogram', false], ['Bar Graph', false], ['Stem-and-Leaf Plot', false]
            ]],
            ['Which graphical display sorts data by leading digit(s) and trailing digit(s), preserving every original value?', 'medium', [
                ['Stem-and-Leaf Plot', true], ['Histogram', false], ['Box Plot', false], ['Pie Chart', false]
            ]],
            ['A Box-and-Whisker plot is constructed using how many summary numbers?', 'medium', [
                ['5-number summary (Min, Q1, Median, Q3, Max)', true], ['3-number summary (Min, Mean, Max)', false], ['4-number summary (Q1, Q2, Q3, Q4)', false], ['2-number summary (Mean, SD)', false]
            ]],
            ['In a workplace wellness cholesterol screening of 24 employees, Q1 = 168.5 and Q3 = 199.5. What is the IQR?', 'hard', [
                ['31 mg/dL', true], ['31.5 mg/dL', false], ['183.5 mg/dL', false], ['246 mg/dL', false]
            ]],
            ['In the same cholesterol screening scenario (Q3 = 199.5, IQR = 31), what is the Upper Fence value?', 'hard', [
                ['246 mg/dL', true], ['230.5 mg/dL', false], ['280 mg/dL', false], ['215 mg/dL', false]
            ]],
            ['In quality control of serum calcium (Mean = 9.5 mg/dL, SD = 0.4 mg/dL), what is the ±2 SD reference interval?', 'hard', [
                ['8.7 to 10.3 mg/dL', true], ['9.1 to 9.9 mg/dL', false], ['8.3 to 10.7 mg/dL', false], ['9.0 to 10.0 mg/dL', false]
            ]]
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
