<?php

namespace Database\Seeders;

use App\Models\Lecture;
use App\Models\Question;
use App\Models\Choice;
use Illuminate\Database\Seeder;

class Lecture9Seeder extends Seeder
{
    public function run(): void
    {
        $lecture = Lecture::where('title', 'Like', '%Health Resources and Services, International and National Health Services%')->first();
        if (!$lecture) {
            $lecture = Lecture::create([
                'title' => 'Lecture 9 - Health Resources and Services, International and National Health Services',
                'description' => 'Exploration of global and local healthcare structures, international health organizations, and the Philippine healthcare delivery system.'
            ]);
        } else {
            $lecture->questions()->delete();
        }

        $questions = [
            // Definitions & Concepts
            ['According to the World Health Organization (1946), health is defined as:', 'medium', [
                ['A state of complete physical, mental, and social well-being and not merely the absence of disease and infirmity', true], ['The physical survival of an individual without any illness', false], ['A purely physiological state where no pathogens are present', false], ['The ability to work efficiently without feeling tired', false]
            ]],
            ['The word "health" is derived from the word "hal", which means:', 'easy', [
                ['Hale, sound, whole', true], ['Healing and curing', false], ['Happy and active', false], ['Holistic', false]
            ]],
            ['Health Services refer to:', 'medium', [
                ['The organized provision of medical care to individuals or communities aimed at promoting, maintaining, monitoring, or restoring health', true], ['Only the distribution of free medicines by the government', false], ['The administrative duties inside a hospital', false], ['Only the surgical operations performed in a tertiary hospital', false]
            ]],
            // Quality & Beneficial Factors
            ['According to the WHO, "Quality Healthcare" should be Effective, Safe, and:', 'easy', [
                ['People-Centered', true], ['Profit-Driven', false], ['Fast-Paced', false], ['Doctor-Centered', false]
            ]],
            ['In Quality Healthcare, what does "Effective" mean?', 'medium', [
                ['Providing evidence-based healthcare services based on logic, facts, and evidence', true], ['Avoiding harm to the people receiving care', false], ['Responding to individual preferences and needs', false], ['Maximizing the benefit of available resources to avoid waste', false]
            ]],
            ['In Quality Healthcare, what does "Safe" mean?', 'easy', [
                ['Avoiding harm to the people whose care is intended for, following "Do No Harm"', true], ['Providing evidence-based medicine', false], ['Reducing wait times', false], ['Providing care that does not vary in quality based on gender or ethnicity', false]
            ]],
            ['For a Health Service to be beneficial, it must be "Timely", which means:', 'medium', [
                ['Reducing wait times and harmful delays', true], ['Providing care that does not vary in quality', false], ['Providing a full range of health services throughout the life course', false], ['Maximizing resources to avoid waste', false]
            ]],
            ['For a Health Service to be beneficial, it must be "Equitable", which means:', 'medium', [
                ['Providing care that does not vary in quality on account of gender, ethnicity, location, and socio-economic status', true], ['Ensuring all services are completely free of charge', false], ['Prioritizing the wealthy who can pay for better services', false], ['Focusing only on minority groups', false]
            ]],
            ['For a Health Service to be beneficial, it must be "Efficient", which means:', 'medium', [
                ['Maximizing the benefit of available resources and avoiding waste', true], ['Reducing wait times and harmful delays', false], ['Providing a full range of services throughout the life course', false], ['Ensuring all treatments are based on logic and evidence', false]
            ]],
            // Categories of Health Services
            ['Health Education Campaigns and Smoking Cessation Programs that aim to improve health literacy are examples of:', 'medium', [
                ['Promotive Health Services', true], ['Preventive Health Services', false], ['Curative Health Services', false], ['Palliative Health Services', false]
            ]],
            ['Immunizations, vaccinations, and newborn screening tests aim to prevent the onset of diseases. These are examples of:', 'easy', [
                ['Preventive Health Services', true], ['Promotive Health Services', false], ['Rehabilitative Health Services', false], ['Palliative Health Services', false]
            ]],
            ['Medical consultations, surgeries, and medication therapies aimed at diagnosing and treating existing illnesses are examples of:', 'easy', [
                ['Curative Health Services', true], ['Preventive Health Services', false], ['Palliative Health Services', false], ['Promotive Health Services', false]
            ]],
            ['Physical Therapy and Occupational Therapy aimed at restoring a person to normal or near-normal function after an illness are examples of:', 'easy', [
                ['Rehabilitative Health Services', true], ['Palliative Health Services', false], ['Curative Health Services', false], ['Preventive Health Services', false]
            ]],
            ['Hospice care and pain management that focus on improving the quality of life for patients with serious illnesses without curing them are examples of:', 'medium', [
                ['Palliative Health Services', true], ['Rehabilitative Health Services', false], ['Curative Health Services', false], ['Promotive Health Services', false]
            ]],
            // International Health Agencies
            ['What defines a "Multilateral Donor Health Agency"?', 'hard', [
                ['Agencies representing a group of countries where funding comes from multiple governments and is distributed to many countries', true], ['An official body for a single country providing aid to another specific country', false], ['A private, non-government agency that relies entirely on volunteers', false], ['A local government unit managing health centers', false]
            ]],
            ['What defines a "Bilateral Donor Health Agency"?', 'hard', [
                ['An official body for a single country or government providing aid to developing countries on a country-to-country basis', true], ['Agencies where funding comes from multiple governments to many countries', false], ['Private agencies that voluntarily use resources without government ties', false], ['Agencies that only operate within their own borders', false]
            ]],
            ['What defines an "International Non-Government Agency (NGO)"?', 'medium', [
                ['Private agencies that voluntarily use their resources for health initiatives, independent of governments (e.g., Doctors Without Borders)', true], ['Agencies that represent the United Nations Security Council', false], ['Government agencies from first-world countries providing aid', false], ['Agencies that regulate the pharmaceutical industry', false]
            ]],
            // United Nations & Branches
            ['The United Nations (UN) currently has how many member states?', 'hard', [
                ['193', true], ['50', false], ['150', false], ['205', false]
            ]],
            ['Which document, signed in 1945, is the founding document of the UN and codifies major principles of international relations?', 'medium', [
                ['The UN Charter', true], ['The Geneva Convention', false], ['The Treaty of Versailles', false], ['The Declaration of Human Rights', false]
            ]],
            ['Which main body of the UN is the only one with universal representation of all 193 member states?', 'hard', [
                ['The General Assembly', true], ['The Security Council', false], ['The Economic and Social Council', false], ['The International Court of Justice', false]
            ]],
            ['Which UN body has the primary responsibility for the maintenance of international peace and security and has 15 members (5 permanent)?', 'hard', [
                ['The Security Council', true], ['The General Assembly', false], ['The Trusteeship Council', false], ['The Secretariat', false]
            ]],
            ['Which UN body is the principal judicial organ and is the only one located in The Hague, Netherlands, instead of New York?', 'medium', [
                ['The International Court of Justice', true], ['The Security Council', false], ['The Economic and Social Council', false], ['The Secretariat', false]
            ]],
            ['Adopted by the UN in 2015 to replace the Millennium Development Goals (MDGs), what are the universal goals designed to frame agendas through 2030?', 'medium', [
                ['The 17 Sustainable Development Goals (SDGs)', true], ['The 10 Global Health Mandates', false], ['The 20 Universal Human Rights', false], ['The 15 Peacekeeping Objectives', false]
            ]],
            ['Which UN agency, established in 1946, works to protect the rights of children, provides vaccines, and brings clean water to those in need?', 'easy', [
                ['UNICEF (United Nations Children\'s Fund)', true], ['UNDP (United Nations Development Fund)', false], ['FAO (Food and Agriculture Organization)', false], ['UNAIDS', false]
            ]],
            ['Which UN agency leads international efforts to defeat hunger and improve the efficiency of farming, forestry, and fisheries?', 'easy', [
                ['FAO (Food and Agriculture Organization)', true], ['UNICEF', false], ['WHO (World Health Organization)', false], ['UNDP', false]
            ]],
            ['Which agency connects nations to promote health, keep the world safe, and serve the vulnerable, with headquarters in Geneva, Switzerland?', 'easy', [
                ['WHO (World Health Organization)', true], ['The World Bank', false], ['USAID', false], ['The Red Cross', false]
            ]],
            ['In which WHO Regional Office is the Philippines located?', 'hard', [
                ['Western Pacific (WPRO) in Manila, Philippines', true], ['Southeast Asia (SEARO) in New Delhi, India', false], ['Eastern Mediterranean (EMRO) in Cairo, Egypt', false], ['America (PAHO) in Washington, D.C.', false]
            ]],
            ['The WHO Global Outbreak Alert and Response Network (GOARN) was established in the year 2000 to:', 'medium', [
                ['Detect and combat the international spread of outbreaks', true], ['Provide low-interest loans to developing countries', false], ['End poverty in all its forms', false], ['Provide maternal and pediatric health care in Africa', false]
            ]],
            ['Which agency provides low-interest loans, credits, and grants to developing countries for economic growth, education, and health?', 'easy', [
                ['The World Bank', true], ['UNICEF', false], ['MSF (Doctors Without Borders)', false], ['USAID', false]
            ]],
            // Bilateral & NGOs
            ['The United States Agency for International Development (USAID) is an example of which type of donor health agency?', 'medium', [
                ['Bilateral Donor Health Agency', true], ['Multilateral Donor Health Agency', false], ['International Non-Government Agency', false], ['Local Government Unit', false]
            ]],
            ['What is the humanitarian mission of the International Committee of the Red Cross (ICRC)?', 'easy', [
                ['To protect the lives and dignity of victims of armed conflict and violence, and to provide medical assistance', true], ['To provide loans to developing nations', false], ['To defeat world hunger through agriculture', false], ['To regulate private hospitals globally', false]
            ]],
            ['Which fundamental principle of the ICRC states that they must not take sides or be regarded as doing so in speech or actions?', 'hard', [
                ['Neutrality', true], ['Humanity', false], ['Impartiality', false], ['Universality', false]
            ]],
            ['Which fundamental principle of the ICRC states that no group of people will be denied services based on anything other than their needs?', 'hard', [
                ['Impartiality', true], ['Independence', false], ['Unity', false], ['Voluntary Service', false]
            ]],
            ['Médecins Sans Frontières (MSF), a renowned independent medical humanitarian organization, is also known as:', 'easy', [
                ['Doctors Without Borders', true], ['The Red Crescent', false], ['Save the Children', false], ['OXFAM', false]
            ]],
            // Philippines Health System
            ['During the Spanish Colonial Period, which was the first hospital built in Cebu in 1565?', 'hard', [
                ['Hospital Real', true], ['San Juan de Dios Hospital', false], ['San Lazaro Hospital', false], ['Philippine General Hospital', false]
            ]],
            ['Which hospital, established in 1578 during the Spanish era, was meant to care specifically for lepers?', 'hard', [
                ['San Lazaro Hospital', true], ['San Juan de Dios Hospital', false], ['Hospital Real', false], ['San Lazaro Clinic', false]
            ]],
            ['The Department of Health (DOH) was established through Executive Order No. 94 on what date?', 'hard', [
                ['October 4, 1947', true], ['May 31, 1939', false], ['July 1, 1901', false], ['January 30, 1987', false]
            ]],
            ['The vision of the DOH is to make Filipinos among the healthiest in Southeast Asia by what year?', 'medium', [
                ['2040', true], ['2030', false], ['2050', false], ['2025', false]
            ]],
            ['Which DOH value is demonstrated when employees work together with a result-oriented mindset?', 'easy', [
                ['Teamwork', true], ['Integrity', false], ['Professionalism', false], ['Excellence', false]
            ]],
            ['Which law mandates the devolution of basic services from the National Government (DOH) to the Local Government Units (LGUs)?', 'hard', [
                ['Local Government Code (RA 7160)', true], ['The Rural Health Act of 1954', false], ['The Universal Health Care Act (RA 11223)', false], ['The Philippine Clean Air Act (RA 8749)', false]
            ]],
            ['What is the function of the Local Health Board?', 'medium', [
                ['To propose annual budgetary allocations for health facilities to the Sanggunian and serve as an advisory committee on health matters', true], ['To directly hire and fire doctors in the municipality', false], ['To regulate the private hospital sector nationwide', false], ['To create national health policies for the entire country', false]
            ]],
            // RHU & Personnel
            ['The Rural Health Unit (RHU), also known as the Health Center, is the first contact health care facility. What is the DOH recommended ratio of RHU to Population?', 'hard', [
                ['1 RHU for every 20,000 population', true], ['1 RHU for every 5,000 population', false], ['1 RHU for every 50,000 population', false], ['1 RHU for every 10,000 population', false]
            ]],
            ['Who heads the health services at the municipal level and serves as the administrator of the RHU and medicolegal officer?', 'medium', [
                ['Municipal Health Officer (MHO) / Rural Health Physician', true], ['Public Health Nurse (PHN)', false], ['Rural Health Midwife (RHM)', false], ['Rural Health Inspector (RHI)', false]
            ]],
            ['Which RHU personnel supervises all midwives, prepares the FHSIS quarterly reports, and utilizes the nursing process for health promotion?', 'medium', [
                ['Public Health Nurse (PHN)', true], ['Municipal Health Officer (MHO)', false], ['Rural Health Inspector (RHI)', false], ['Barangay Health Worker (BHW)', false]
            ]],
            ['Which RHU personnel manages the Barangay Health Station (BHS), supervises BHWs, and executes programs for women of reproductive age?', 'medium', [
                ['Rural Health Midwife (RHM)', true], ['Public Health Nurse (PHN)', false], ['Rural Health Inspector (RHI)', false], ['Barangay Health Worker (BHW)', false]
            ]],
            ['Which RHU personnel is responsible for ensuring a healthy physical environment, including the inspection of water supplies and unhygienic household conditions?', 'medium', [
                ['Rural Health Inspector (RHI)', true], ['Municipal Health Officer (MHO)', false], ['Barangay Health Worker (BHW)', false], ['Public Health Nurse (PHN)', false]
            ]],
            ['Who serves as the interface between the community and the RHU, is a volunteer accredited by the local health board, and assists in providing basic services?', 'easy', [
                ['Barangay Health Worker (BHW)', true], ['Rural Health Midwife (RHM)', false], ['Public Health Nurse (PHN)', false], ['Rural Health Inspector (RHI)', false]
            ]],
            ['According to DOH recommendations, what is the ideal ratio for a Barangay Health Worker (BHW)?', 'hard', [
                ['1 BHW per 20 Households', true], ['1 BHW per 500 Households', false], ['1 BHW per 5,000 Population', false], ['1 BHW per 10,000 Population', false]
            ]],
            // Levels of Health Care Services
            ['An infirmary or birthing facility that offers basic emergency services and short-stay inpatient beds (1-2 days) is classified under DOH A.O. 2012-0012 as:', 'hard', [
                ['Category A: Primary Care Facility', true], ['Category B: Custodial Care Facility', false], ['Category C: Diagnostic / Therapeutic Facility', false], ['Category D: Specialized Outpatient Facility', false]
            ]],
            ['A psychiatric facility or drug abuse rehab center providing long-term care to patients with chronic conditions is classified as:', 'hard', [
                ['Category B: Custodial Care Facility', true], ['Category A: Primary Care Facility', false], ['Category C: Diagnostic / Therapeutic Facility', false], ['Category D: Specialized Outpatient Facility', false]
            ]],
            ['Clinical laboratories, blood service facilities, and radiologic facilities are classified as:', 'medium', [
                ['Category C: Diagnostic / Therapeutic Facility', true], ['Category B: Custodial Care Facility', false], ['Category A: Primary Care Facility', false], ['Category D: Specialized Outpatient Facility', false]
            ]],
            // Universal Health Care
            ['What does Universal Health Coverage (UHC) ensure?', 'medium', [
                ['All individuals and communities receive the health services they need without suffering financial hardships', true], ['Only the poorest of the poor receive free health services', false], ['All health services are privatized and market-oriented', false], ['Citizens must pay entirely out of pocket for any specialized surgery', false]
            ]],
            ['In the Philippines, the Universal Health Care Act (RA 11223) automatically enrolls all Filipinos into:', 'easy', [
                ['PhilHealth (National Health Insurance Program)', true], ['The World Bank Health Insurance', false], ['Private HMO providers', false], ['The Social Security System (SSS) only', false]
            ]],
            ['Under the Universal Health Care Law, who shoulders the premiums for "Indirect Contributors" (such as the unemployed or Persons with Disabilities)?', 'medium', [
                ['The Government', true], ['Their local Barangay Captain', false], ['Private charity organizations', false], ['They must pay it out of pocket', false]
            ]],
            ['Which of the following is a major source of funding for the Universal Health Care Act in the Philippines?', 'hard', [
                ['Revenue from the Sin Tax Reform Law, PAGCOR, and PCSO', true], ['Donations strictly from the World Bank', false], ['Funds solely from international NGOs like the Red Cross', false], ['Income taxes from Overseas Filipino Workers only', false]
            ]],
            ['The primary goal of "Health for All" was set by the WHO in what year?', 'hard', [
                ['1978', true], ['1948', false], ['2000', false], ['2015', false]
            ]],
            ['In what year did the WHO declare the global outbreak of Coronavirus a Public Emergency of International Concern?', 'medium', [
                ['2020', true], ['2019', false], ['2021', false], ['2018', false]
            ]],
            ['Which United Nations body consists of tens of thousands of staff members led by the Secretary-General (António Guterres)?', 'hard', [
                ['The Secretariat', true], ['The Security Council', false], ['The Trusteeship Council', false], ['The General Assembly', false]
            ]],
            ['Which WHO region has its headquarters in Copenhagen, Denmark?', 'hard', [
                ['Europe (EURO)', true], ['America (PAHO)', false], ['Western Pacific (WPRO)', false], ['Africa (AFRO)', false]
            ]],
            ['Which disease was successfully eradicated globally in 1980 following a 12-year vaccination campaign?', 'medium', [
                ['Smallpox', true], ['Polio', false], ['Measles', false], ['Tuberculosis', false]
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
