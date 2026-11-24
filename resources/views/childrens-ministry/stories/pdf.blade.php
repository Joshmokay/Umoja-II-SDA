<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $story->title }} - Study Package</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            color: #334155;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        h1 {
            color: #0f172a;
            font-size: 28px;
            margin-bottom: 5px;
        }
        .subtitle {
            color: #64748b;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .cover-image {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            border-radius: 12px;
            margin-bottom: 30px;
        }
        .section-title {
            color: #0284c7;
            border-bottom: 1px solid #bae6fd;
            padding-bottom: 10px;
            margin-top: 40px;
            font-size: 22px;
        }
        .lesson-section .section-title {
            color: #059669;
            border-bottom-color: #a7f3d0;
        }
        .quiz-section .section-title {
            color: #d97706;
            border-bottom-color: #fde68a;
        }
        .content {
            font-size: 15px;
        }
        .question-box {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 15px 20px;
            margin-bottom: 20px;
            page-break-inside: avoid;
        }
        .question-text {
            font-weight: bold;
            color: #1e293b;
            margin-bottom: 15px;
            font-size: 16px;
        }
        .options-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .option-item {
            margin-bottom: 8px;
            padding-left: 30px;
            position: relative;
        }
        .option-letter {
            font-weight: bold;
            position: absolute;
            left: 0;
            color: #64748b;
        }
        .page-break {
            page-break-after: always;
        }
        .footer {
            text-align: center;
            margin-top: 50px;
            font-size: 12px;
            color: #94a3b8;
            border-top: 1px solid #f1f5f9;
            padding-top: 10px;
        }
    </style>
</head>
<body>

    <div class="header">
        <div class="subtitle">Children's Ministry Bible Stories</div>
        <h1>{{ $story->title }}</h1>
    </div>

    @if($story->image_path)
        @php
            $path = public_path('storage/' . $story->image_path);
            $type = pathinfo($path, PATHINFO_EXTENSION);
            if(file_exists($path)) {
                $data = file_get_contents($path);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                echo '<img src="'.$base64.'" class="cover-image" />';
            }
        @endphp
    @endif

    <div class="content">
        {!! $story->content !!}
    </div>

    @if($story->lesson)
        <div class="page-break"></div>
        <div class="lesson-section">
            <h2 class="section-title">{{ $story->lesson->title ?: 'What Can We Learn?' }}</h2>
            <div class="content">
                {!! $story->lesson->content !!}
            </div>
        </div>
    @endif

    @if($story->quizQuestions->count() > 0)
        <div class="page-break"></div>
        <div class="quiz-section">
            <h2 class="section-title">Interactive Quiz</h2>
            <p style="color: #64748b; margin-bottom: 25px;">Circle the correct answer for each question below!</p>
            
            @foreach($story->quizQuestions as $index => $question)
                <div class="question-box">
                    <div class="question-text">{{ $index + 1 }}. {{ $question->question }}</div>
                    <ul class="options-list">
                        <li class="option-item"><span class="option-letter">A.</span> {{ $question->option_a }}</li>
                        <li class="option-item"><span class="option-letter">B.</span> {{ $question->option_b }}</li>
                        <li class="option-item"><span class="option-letter">C.</span> {{ $question->option_c }}</li>
                        <li class="option-item"><span class="option-letter">D.</span> {{ $question->option_d }}</li>
                    </ul>
                </div>
            @endforeach
            
            <!-- We could include an answer key at the very end, but for kids it's usually separate. 
                 However, providing a small upside-down or hidden answer key is helpful for parents. -->
            <div style="margin-top: 40px; font-size: 10px; color: #cbd5e1; text-align: right;">
                Answer Key: 
                @foreach($story->quizQuestions as $index => $question)
                    {{ $index + 1 }}{{ $question->correct_answer }}{{ !$loop->last ? ', ' : '' }}
                @endforeach
            </div>
        </div>
    @endif

    <div class="footer">
        Provided by Umoja II SDA Church Children's Ministry
    </div>

</body>
</html>
