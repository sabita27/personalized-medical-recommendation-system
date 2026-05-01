<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $data['personal']['name'] }} - Resume</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 10pt;
            color: #333;
            line-height: 1.4;
            margin: 0;
            padding: 0;
        }

        .header-table {
            width: 100%;
            border-bottom: 2px solid #000;
            margin-bottom: 15px;
            padding-bottom: 10px;
        }

        .header-top {
            width: 100%;
        }

        .header-top td {
            font-size: 9pt;
        }

        .name-centered {
            text-align: center;
            font-size: 24pt;
            font-weight: bold;
            margin: 10px 0;
            text-transform: uppercase;
        }

        .social-table {
            width: 100%;
            text-align: center;
            font-size: 9pt;
        }

        h2 {
            font-size: 12pt;
            border-bottom: 1px solid #ccc;
            padding-bottom: 3px;
            margin-top: 15px;
            margin-bottom: 10px;
            text-transform: uppercase;
            color: #000;
        }

        .item {
            margin-bottom: 10px;
        }

        .item-table {
            width: 100%;
            font-weight: bold;
        }

        .item-sub-table {
            width: 100%;
            font-style: italic;
            color: #555;
            margin-bottom: 5px;
        }

        ul {
            margin: 5px 0;
            padding-left: 20px;
        }

        li {
            margin-bottom: 2px;
        }

        .skill-item {
            margin-bottom: 5px;
        }

        .skill-cat {
            font-weight: bold;
        }

        .right {
            text-align: right;
        }
    </style>
</head>
<body>

    <table class="header-top">
        <tr>
            <td>Email: <strong>{{ $data['personal']['email'] }}</strong></td>
            <td class="right">Phone No.: <strong>+91-{{ $data['personal']['phone'] }}</strong></td>
        </tr>
    </table>

    <div class="name-centered">{{ $data['personal']['name'] }}</div>

    <table class="social-table">
        <tr>
            <td style="text-align: left;">Github: <span style="color: #007bff;">{{ $data['personal']['github'] }}</span></td>
            <td class="right">Linkedin: <span style="color: #007bff;">{{ $data['personal']['linkedin'] }}</span></td>
        </tr>
    </table>

    <div style="border-bottom: 2px solid #000; margin-top: 5px;"></div>

    <section>
        <h2>Profile Summary</h2>
        <p style="margin: 0;">{{ $data['summary'] }}</p>
    </section>

    <section>
        <h2>Experience</h2>
        @foreach($data['experience'] as $exp)
            <div class="item">
                <table class="item-table">
                    <tr>
                        <td>{{ $exp['company'] }} ({{ $exp['duration'] }})</td>
                    </tr>
                </table>
                <table class="item-sub-table">
                    <tr>
                        <td>{{ $exp['role'] }}</td>
                    </tr>
                </table>
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
                    <table class="item-table">
                        <tr>
                            <td>{{ $intern['company'] }} ({{ $intern['duration'] }})</td>
                        </tr>
                    </table>
                    <table class="item-sub-table">
                        <tr>
                            <td>{{ $intern['role'] }}</td>
                        </tr>
                    </table>
                </div>
            @endforeach
        @endif
    </section>

    <section>
        <h2>Projects</h2>
        @foreach($data['projects'] as $project)
            <div class="item">
                <table class="item-table">
                    <tr>
                        <td>{{ $project['name'] }} ({{ $project['duration'] }})</td>
                    </tr>
                </table>
                <ul>
                    @foreach($project['highlights'] as $highlight)
                        <li>{!! $highlight !!}</li>
                    @endforeach
                </ul>
                <div style="margin-left: 20px; font-weight: bold;">
                    Tech Stack: {{ $project['tech_stack'] }}
                </div>
            </div>
        @endforeach
    </section>

    <section>
        <h2>Skills</h2>
        <ul>
            @foreach($data['skills'] as $category => $skills)
                <li>
                    <span class="skill-cat">{{ $category }} :</span> {{ implode(', ', $skills) }}
                </li>
            @endforeach
        </ul>
    </section>

    <section>
        <h2>Education</h2>
        @foreach($data['education'] as $edu)
            <div class="item">
                <table class="item-table">
                    <tr>
                        <td>{{ $edu['degree'] }}</td>
                    </tr>
                </table>
                <table class="item-sub-table">
                    <tr>
                        <td>{{ $edu['institution'] }} — {{ $edu['duration'] }}</td>
                    </tr>
                </table>
                @if(isset($edu['cgpa']))
                    <p style="margin: 0; padding-left: 20px;">CGPA: {{ $edu['cgpa'] }}</p>
                @endif
                @if(isset($edu['percentage']))
                    <p style="margin: 0; padding-left: 20px;">Percentage: {{ $edu['percentage'] }}</p>
                @endif
            </div>
        @endforeach
    </section>

    <section>
        <h2>Achievements</h2>
        <ul>
            @foreach($data['achievements'] as $achievement)
                <li>{!! $achievement !!}</li>
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

</body>
</html>
