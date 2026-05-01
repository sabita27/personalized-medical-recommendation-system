<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $data['personal']['name'] }} - Resume</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #333;
            --secondary-color: #666;
            --border-color: #ddd;
            --bg-color: #f4f4f9;
            --paper-bg: #fff;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-color);
            margin: 0;
            padding: 20px;
            color: var(--primary-color);
            line-height: 1.5;
        }

        .resume-container {
            max-width: 900px;
            margin: 0 auto;
            background: var(--paper-bg);
            padding: 40px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            border-radius: 8px;
            position: relative;
        }

        .download-btn {
            position: absolute;
            top: 20px;
            right: 40px;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 600;
            transition: background 0.3s;
        }

        .download-btn:hover {
            background-color: #0056b3;
        }

        header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 20px;
        }

        .header-top {
            display: flex;
            justify-content: space-between;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }

        h1 {
            margin: 10px 0;
            font-size: 2.5rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            font-size: 0.9rem;
        }

        .social-links a {
            color: #007bff;
            text-decoration: none;
        }

        section {
            margin-bottom: 25px;
        }

        h2 {
            font-size: 1.2rem;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 5px;
            margin-bottom: 15px;
            text-transform: uppercase;
            color: #000;
        }

        .item {
            margin-bottom: 15px;
        }

        .item-header {
            display: flex;
            justify-content: space-between;
            font-weight: 700;
        }

        .item-sub {
            display: flex;
            justify-content: space-between;
            font-style: italic;
            color: var(--secondary-color);
            margin-bottom: 5px;
        }

        ul {
            margin: 5px 0;
            padding-left: 20px;
        }

        li {
            margin-bottom: 3px;
        }

        .skills-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .skill-cat {
            font-weight: bold;
        }

        @media (max-width: 600px) {
            .header-top {
                flex-direction: column;
                align-items: center;
            }
            .item-header, .item-sub {
                flex-direction: column;
            }
            .download-btn {
                position: static;
                display: block;
                margin: 0 auto 20px;
                text-align: center;
            }
            .skills-grid {
                grid-template-columns: 1fr;
            }
        }

        @media print {
            body {
                background: none;
                padding: 0;
            }
            .resume-container {
                box-shadow: none;
                padding: 0;
            }
            .download-btn {
                display: none;
            }
        }
    </style>
</head>
<body>

<div class="resume-container">
    <a href="/Sabita_Sau_Resume_2026.pdf" class="download-btn" download="Sabita_Sau_Resume_2026.pdf">Download PDF</a>

    <header>
        <div class="header-top">
            <span>Email: <strong>{{ $data['personal']['email'] }}</strong></span>
            <span>Phone No.: <strong>+91-{{ $data['personal']['phone'] }}</strong></span>
        </div>
        <h1>{{ $data['personal']['name'] }}</h1>
        <div class="social-links">
            <span>Github: <a href="{{ $data['personal']['github'] }}">@ {{ $data['personal']['github_handle'] }}</a></span>
            <span>Linkedin: <a href="{{ $data['personal']['linkedin'] }}">@ {{ $data['personal']['linkedin_handle'] }}</a></span>
        </div>
    </header>

    <section>
        <h2>Profile Summary</h2>
        <p>{{ $data['summary'] }}</p>
    </section>

    <section>
        <h2>Experience</h2>
        @foreach($data['experience'] as $exp)
            <div class="item">
                <div class="item-header">
                    <span>{{ $exp['company'] }}</span>
                    <span>({{ $exp['duration'] }})</span>
                </div>
                <div class="item-sub">
                    <span>{{ $exp['role'] }}</span>
                </div>
                <ul>
                    @foreach($exp['responsibilities'] as $resp)
                        <li>{{ $resp }}</li>
                    @endforeach
                </ul>
            </div>
        @endforeach

        @if(isset($data['internship']))
            @foreach($data['internship'] as $intern)
                <div class="item">
                    <div class="item-header">
                        <span>{{ $intern['company'] }}</span>
                        <span>({{ $intern['duration'] }})</span>
                    </div>
                    <div class="item-sub">
                        <span>{{ $intern['role'] }}</span>
                    </div>
                </div>
            @endforeach
        @endif
    </section>

    <section>
        <h2>Projects</h2>
        @foreach($data['projects'] as $project)
            <div class="item">
                <div class="item-header">
                    <span>{{ $project['name'] }}</span>
                    <span>({{ $project['duration'] }})</span>
                </div>
                <div class="item-sub">
                    <span>Tech Stack: {{ $project['tech_stack'] }}</span>
                </div>
                <ul>
                    @foreach($project['highlights'] as $highlight)
                        <li>{{ $highlight }}</li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </section>

    <section>
        <h2>Skills</h2>
        <div class="skills-grid">
            @foreach($data['skills'] as $category => $skills)
                <div>
                    <span class="skill-cat">{{ $category }}:</span> {{ implode(', ', $skills) }}
                </div>
            @endforeach
        </div>
    </section>

    <section>
        <h2>Education</h2>
        @foreach($data['education'] as $edu)
            <div class="item">
                <div class="item-header">
                    <span>{{ $edu['degree'] }}</span>
                    <span>{{ $edu['duration'] }}</span>
                </div>
                <div class="item-sub">
                    <span>{{ $edu['institution'] }}</span>
                    <span>{{ $edu['location'] }}</span>
                </div>
                @if(isset($edu['cgpa']))
                    <p style="margin: 0;">CGPA: {{ $edu['cgpa'] }}</p>
                @endif
                @if(isset($edu['percentage']))
                    <p style="margin: 0;">Percentage: {{ $edu['percentage'] }}</p>
                @endif
            </div>
        @endforeach
    </section>

    <section>
        <h2>Achievements</h2>
        <ul>
            @foreach($data['achievements'] as $achievement)
                <li>{{ $achievement }}</li>
            @endforeach
        </ul>
    </section>

    <section>
        <h2>Certifications</h2>
        <ul>
            @foreach($data['certifications'] as $cert)
                <li>
                    {{ $cert['name'] }}
                    @if(isset($cert['id']))
                        ({{ $cert['id'] }})
                    @endif
                </li>
            @endforeach
        </ul>
    </section>

</div>

</body>
</html>
