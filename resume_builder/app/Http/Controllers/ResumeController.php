<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ResumeController extends Controller
{
    public function getResumeData()
    {
        return [
            'personal' => [
                'name' => 'Sabita Sau',
                'phone' => '9002950224',
                'email' => 'sausabita62@gmail.com',
                'linkedin' => 'https://www.linkedin.com/in/sabita-sau',
                'github' => 'https://github.com/sabita27',
                'github_handle' => 'sabita27',
                'linkedin_handle' => 'sabita-sau',
            ],
            'summary' => 'Laravel Developer with experience in building scalable web applications and CRM systems. Proficient in Laravel, Spatie (Roles & Permissions), REST API development, AJAX, Fetch API, and jQuery. Strong focus on clean architecture, performance optimization, and secure backend development.',
            'education' => [
                [
                    'institution' => 'Siksha ’O’ Anusandhan University (ITER)',
                    'degree' => 'Master of Computer Application (MCA)',
                    'location' => 'Bhubaneswar, Odisha',
                    'duration' => 'Sep 2023 – Jun 2025',
                    'cgpa' => '9.29',
                ],
                [
                    'institution' => 'Maharaja Purna Chandra Autonomous College',
                    'degree' => 'Bachelor of Computer Application (BCA)',
                    'location' => 'Baripada, Odisha',
                    'duration' => 'Sep 2020 – Jul 2023',
                    'cgpa' => '9.07',
                ],
                [
                    'institution' => 'Aguibani High School (H.S.)',
                    'degree' => 'WBCHSE – Class XII',
                    'location' => 'West Bengal',
                    'duration' => 'Jun 2018 – Jul 2020',
                    'percentage' => '86%',
                ],
            ],
            'experience' => [
                [
                    'company' => 'Sridipta Research & Development Consultancy Pvt. Ltd',
                    'role' => 'Laravel Developer (Incoming)',
                    'duration' => 'January 2026 – Present',
                    'responsibilities' => [
                        'Selected to join as a Laravel Developer contributing to backend development and API-based systems.',
                        'Working on bug fixing, performance optimization, and enhancement of existing applications.',
                        'Handling REST API development, third-party API integration, and backend logic implementation.',
                        'Collaborating with development teams to improve system architecture, validation, and error handling.',
                        'Using API testing tools like Postman and following documentation practices.',
                    ]
                ],
            ],
            'internship' => [
                [
                    'company' => 'DreamWave Innovation',
                    'role' => 'Full Stack Development Internship Training',
                    'duration' => '24th June 2024 – 3rd August 2024',
                ]
            ],
            'skills' => [
                'Programming Languages' => ['PHP', 'Python', 'C', 'SQL', 'HTML', 'CSS', 'JavaScript', 'Java'],
                'Frameworks & Libraries' => ['Laravel', 'Spring Boot (Basic)', 'Bootstrap', 'jQuery', 'AJAX'],
                'API Development' => ['REST API Development', 'Postman'],
                'Database' => ['MySQL', 'DBMS'],
                'Tools & Technologies' => ['VS Code', 'Git/GitHub', 'Jupyter Notebook', 'IntelliJ IDEA', 'Power BI', 'ChatGPT'],
            ],
            'certifications' => [
                [
                    'name' => 'Programming in Python',
                    'id' => 'PS-APSSDC-PYMC-5663',
                ],
                [
                    'name' => 'Program in Data Science (Microsoft)',
                    'id' => 'R24P2118180005632822',
                ],
                [
                    'name' => 'Full Stack Development Internship Training – DreamWave Innovation',
                ],
            ],
            'achievements' => [
                'Strong problem-solving and analytical skills with hands-on experience in full stack web development and data visualization.',
                'Skilled in building responsive and scalable applications using Laravel, Power BI, Python, MySQL, and REST APIs.',
                'Quick learner with the ability to adapt to new technologies and develop efficient, user-focused solutions.',
            ],
            'projects' => [
                [
                    'name' => 'Power BI Project – E-Commerce Dashboard',
                    'duration' => 'December 2023',
                    'tech_stack' => 'Power BI, Data Visualization, Data Analytics',
                    'highlights' => [
                        'Built interactive Power BI dashboards by integrating sales, customer, inventory, and marketing data.',
                        'Delivered insights for sales trends, customer behavior, inventory optimization, and campaign performance.',
                        'Implemented real-time data updates and secure, user-friendly visualizations for better business decision-making.',
                    ]
                ],
                [
                    'name' => 'Full Stack Project – Agrolook',
                    'duration' => 'August 2024',
                    'tech_stack' => 'Full Stack Web Development, HTML, CSS, JavaScript, Database Management',
                    'highlights' => [
                        'Developed an agriculture support platform providing soil testing access and crop-based pH and fertilizer recommendations.',
                        'Integrated weather-based farming guidance and farming equipment suggestions.',
                        'Added reminder systems, e-commerce functionality for farming products, and personalized user profiles.',
                        'Designed a multilingual, mobile-friendly interface with focus on data privacy and security.',
                    ]
                ],
                [
                    'name' => 'Machine Learning Project – Personalized Medical Recommendation System',
                    'duration' => 'June 2025',
                    'tech_stack' => 'Python, Flask, Machine Learning, SVC, Random Forest, GaussianNB',
                    'highlights' => [
                        'Developed a Flask-based medical recommendation system where users input symptoms to receive disease predictions.',
                        'Implemented Machine Learning models including: SVC, Random Forest, GaussianNB.',
                        'Added medicine suggestions, user-friendly web interface, and security features.',
                        'Designed the system architecture for scalability and future enhancements.',
                    ]
                ],
                [
                    'name' => 'Ticket Management System – TMS PRO',
                    'duration' => '2026',
                    'tech_stack' => 'Laravel, PHP, MySQL, Bootstrap, AJAX, jQuery, Spatie Permission, HTML, CSS, JavaScript',
                    'highlights' => [
                        'Developed a complete web-based Ticket Management System (TMS PRO) to streamline business operations and customer support workflows.',
                        'Implemented modules for: User Management, Client Management, Product & Service Management, Project Tracking, Ticket Management, Role & Permission Management.',
                        'Built role-based access control using Spatie Laravel Permissions.',
                        'Developed real-time ticket communication system between Admin, Manager, Staff, and Users.',
                        'Added ticket priority, status tracking, assignment system, and support messaging hub.',
                        'Integrated dashboard analytics, search & filtering, export functionality, SMTP configuration, and profile management.',
                    ]
                ],
            ],
        ];
    }

    public function index()
    {
        $data = $this->getResumeData();
        return view('resume', compact('data'));
    }

    public function download()
    {
        $data = $this->getResumeData();
        $pdf = Pdf::loadView('resume_pdf', compact('data'));
        
        return $pdf->stream('Sabita_Sau_Resume_2026.pdf', [
            'Attachment' => true
        ]);
    }
}
