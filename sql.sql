CREATE DATABASE health_db;

USE health_db;

CREATE TABLE patient_records (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_name VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    gender VARCHAR(10) NOT NULL,
    diagnosis VARCHAR(255) NOT NULL,
    treatment VARCHAR(255) NOT NULL,
    doctor_name VARCHAR(100) NOT NULL,
    admission_date DATE NOT NULL,
    discharge_date DATE
);



INSERT INTO patient_records (patient_name, age, gender, diagnosis, treatment, doctor_name, admission_date, discharge_date)
VALUES 
('John Doe', 45, 'Male', 'Hypertension', 'Medication', 'Dr. Smith', '2024-01-10', '2024-01-15'),
('Jane Smith', 34, 'Female', 'Diabetes', 'Insulin Therapy', 'Dr. Johnson', '2024-02-05', '2024-02-12'),
('Alice Johnson', 29, 'Female', 'Asthma', 'Inhaler', 'Dr. Brown', '2024-03-01', '2024-03-05'),
('Bob White', 60, 'Male', 'Coronary Artery Disease', 'Bypass Surgery', 'Dr. Green', '2024-04-10', '2024-04-20'),
('Cathy Black', 52, 'Female', 'Chronic Kidney Disease', 'Dialysis', 'Dr. Blue', '2024-05-15', '2024-05-30'),
('David Grey', 40, 'Male', 'Chronic Obstructive Pulmonary Disease', 'Oxygen Therapy', 'Dr. White', '2024-06-10', '2024-06-17'),
('Eva Brown', 25, 'Female', 'Rheumatoid Arthritis', 'Physical Therapy', 'Dr. Yellow', '2024-07-01', '2024-07-10'),
('Frank Green', 55, 'Male', 'Prostate Cancer', 'Radiation Therapy', 'Dr. Black', '2024-08-05', '2024-08-20'),
('Grace Blue', 47, 'Female', 'Breast Cancer', 'Chemotherapy', 'Dr. Grey', '2024-09-10', '2024-09-25'),
('Hank Yellow', 30, 'Male', 'Peptic Ulcer Disease', 'Antibiotics', 'Dr. Pink', '2024-10-01', '2024-10-07'),
('Ivy White', 38, 'Female', 'Epilepsy', 'Anticonvulsants', 'Dr. Violet', '2024-11-15', '2024-11-20'),
('Jack Black', 62, 'Male', 'Parkinson\'s Disease', 'Deep Brain Stimulation', 'Dr. Orange', '2024-12-01', '2024-12-15'),
('Kara Grey', 44, 'Female', 'Multiple Sclerosis', 'Steroids', 'Dr. Red', '2025-01-10', '2025-01-25'),
('Leo Blue', 31, 'Male', 'Inflammatory Bowel Disease', 'Immunosuppressants', 'Dr. White', '2025-02-05', '2025-02-15'),
('Mia Green', 27, 'Female', 'Endometriosis', 'Hormonal Therapy', 'Dr. Brown', '2025-03-10', '2025-03-20'),
('Nick White', 50, 'Male', 'Type 2 Diabetes', 'Lifestyle Changes', 'Dr. Black', '2025-04-01', '2025-04-07'),
('Olivia Pink', 36, 'Female', 'Celiac Disease', 'Gluten-Free Diet', 'Dr. Grey', '2025-05-15', '2025-05-25'),
('Paul Violet', 48, 'Male', 'Osteoporosis', 'Bisphosphonates', 'Dr. Yellow', '2025-06-10', '2025-06-17'),
('Quinn Orange', 29, 'Female', 'Psoriasis', 'Topical Treatments', 'Dr. Red', '2025-07-01', '2025-07-10'),
('Ray Red', 53, 'Male', 'Gout', 'NSAIDs', 'Dr. Blue', '2025-08-05', '2025-08-12'),
('Sara Yellow', 32, 'Female', 'Chronic Fatigue Syndrome', 'Cognitive Behavioral Therapy', 'Dr. Green', '2025-09-10', '2025-09-20'),
('Tom Brown', 41, 'Male', 'Fibromyalgia', 'Pain Management', 'Dr. White', '2025-10-01', '2025-10-10'),
('Uma Green', 45, 'Female', 'Irritable Bowel Syndrome', 'Dietary Changes', 'Dr. Pink', '2025-11-15', '2025-11-20'),
('Victor Black', 28, 'Male', 'Anxiety Disorder', 'Counseling', 'Dr. Violet', '2025-12-01', '2025-12-05'),
('Wendy Grey', 37, 'Female', 'Major Depressive Disorder', 'Antidepressants', 'Dr. Orange', '2026-01-10', '2026-01-20'),
('Xander Blue', 54, 'Male', 'Sleep Apnea', 'CPAP Therapy', 'Dr. Red', '2026-02-05', '2026-02-15'),
('Yara Yellow', 42, 'Female', 'Chronic Sinusitis', 'Nasal Steroids', 'Dr. Brown', '2026-03-10', '2026-03-17'),
('Zane White', 35, 'Male', 'Liver Cirrhosis', 'Liver Transplant', 'Dr. Grey', '2026-04-01', '2026-04-30'),
('Ava Pink', 33, 'Female', 'Lupus', 'Immunosuppressants', 'Dr. Green', '2026-05-15', '2026-05-25'),
('Ben Violet', 49, 'Male', 'Chronic Pain', 'Multimodal Therapy', 'Dr. White', '2026-06-10', '2026-06-20'),
('Cara Orange', 39, 'Female', 'Ovarian Cancer', 'Surgery', 'Dr. Black', '2026-07-01', '2026-07-15');
