<?php
$report = "";
$responses = [];
$downloadableReport = "";

// Define the questions
$questions = [
    "How often do you feel relaxed?",
    "How often do you feel stressed?",
    "How often do you enjoy your daily activities?",
    "How often do you feel overwhelmed?",
    "How often do you have a good night's sleep?",
    "How often do you feel motivated?",
    "How often do you feel anxious?",
    "How often do you feel optimistic?",
    "How often do you feel physically active?",
    "How often do you take time to care for yourself?"
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle the form submission
    $totalScore = 0;
    $categoryScores = [
        "Relaxation" => 0,
        "Stress" => 0,
        "Motivation" => 0,
        "Anxiety" => 0,
        "Physical Activity" => 0,
        "Self-Care" => 0
    ];

    foreach ($questions as $index => $question) {
        $questionKey = "question_" . ($index + 1);
        $responses[$question] = isset($_POST[$questionKey]) ? (int)$_POST[$questionKey] : 3;
        $totalScore += $responses[$question];

        // Example: Categorizing each question into a specific category
        if (in_array($question, ["How often do you feel relaxed?", "How often do you feel physically active?", "How often do you take time to care for yourself?"])) {
            $categoryScores["Relaxation"] += $responses[$question];
        } elseif (in_array($question, ["How often do you feel stressed?", "How often do you feel overwhelmed?", "How often do you feel anxious?"])) {
            $categoryScores["Stress"] += $responses[$question];
        } elseif (in_array($question, ["How often do you enjoy your daily activities?", "How often do you feel motivated?", "How often do you feel optimistic?"])) {
            $categoryScores["Motivation"] += $responses[$question];
        }
    }

    // Calculate the average score
    $averageScore = $totalScore / count($questions);
    $report = generateReport($averageScore, $categoryScores);

    // Generate the downloadable report content
    $downloadableReport = "Mental Wellbeing Report\n\nYour Wellbeing Report:\n" . $report . "\n\nYour Responses:\n";
    foreach ($responses as $question => $response) {
        $downloadableReport .= $question . ": " . $response . "\n";
    }

    // Handle file download if requested
    if (isset($_POST['download_report'])) {
        $filename = "Mental_Wellbeing_Report_" . date('Y-m-d_H-i-s') . ".txt";
        header('Content-Type: text/plain');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        echo $downloadableReport;
        exit;
    }
}

function generateReport($averageScore, $categoryScores) {
    $report = "";
    if ($averageScore >= 4.5) {
        $report = "You are feeling great! Keep up the good work and continue prioritizing self-care.";
    } elseif ($averageScore >= 3.5) {
        $report = "You're doing well, but there might be a few areas to improve. Try to focus on relaxation and activities that bring you joy.";
    } elseif ($averageScore >= 2.5) {
        $report = "It seems like you're feeling a bit overwhelmed. Consider taking some time for yourself and seeking support if needed.";
    } else {
        $report = "You're facing significant challenges. It might help to talk to a trusted friend, family member, or a mental health professional.";
    }

    // Add category-specific insights
    foreach ($categoryScores as $category => $score) {
        $averageCategoryScore = $score / 3;
        $report .= "\n\n" . $category . " Score: " . number_format($averageCategoryScore, 1);
        if ($averageCategoryScore >= 4) {
            $report .= " - Excellent! Keep it up.";
        } elseif ($averageCategoryScore >= 3) {
            $report .= " - Good, but there's room for improvement.";
        } elseif ($averageCategoryScore >= 2) {
            $report .= " - Some improvement is needed.";
        } else {
            $report .= " - Consider focusing more on this area.";
        }
    }

    return $report;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mental Wellbeing Questionnaire</title>
    <style>
        :root {
            --background-color: #ffffff;
            --default-color: #444444;
            --heading-color: #2a2c39;
            --accent-color: #ef6603;
            --surface-color: #ffffff;
            --contrast-color: #ffffff;
            --gradient-start: #fceadc;
            --gradient-end: #f5d4b3;
        }

        body {
            background-color: var(--background-color);
            color: var(--default-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 20px;
            line-height: 1.6;
        }

        h1 {
            color: var(--heading-color);
            text-align: center;
            margin-bottom: 20px;
        }

        .form-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 30px;
            background-color: var(--surface-color);
            border-radius: 12px;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
        }

        .question-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .question {
            background-color: var(--surface-color);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease;
        }

        .question:hover {
            transform: scale(1.02);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: var(--heading-color);
        }

        .slider-container {
            margin-top: 10px;
        }

        .slider {
            width: 100%;
            height: 8px;
            border-radius: 5px;
            background: linear-gradient(to right, var(--gradient-start), var(--gradient-end));
            outline: none;
            appearance: none;
            transition: background 0.3s ease;
        }

        .slider::-webkit-slider-thumb {
            appearance: none;
            width: 20px;
            height: 20px;
            background-color: var(--accent-color);
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s ease;
        }

        .slider::-webkit-slider-thumb:hover {
            transform: scale(1.2);
        }

        button {
            display: block;
            background-color: var(--accent-color);
            color: var(--contrast-color);
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            margin: 20px auto 0;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #d45502;
        }

        .report-container {
            margin-top: 30px;
        }

        .report {
            padding: 20px;
            background-color: var(--surface-color);
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .category-score {
            margin: 10px 0;
            padding: 8px;
            background-color: #f0f0f0;
            border-radius: 5px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <h1>Mental Wellbeing Questionnaire</h1>
    <div class="form-container">
        <form method="POST" action="">
            <div class="question-container">
                <?php foreach ($questions as $index => $question): ?>
                    <div class="question">
                        <label>
                            <?php echo ($index + 1) . ". " . htmlspecialchars($question); ?>
                        </label>
                        <div class="slider-container">
                            <input 
                                type="range" 
                                min="1" 
                                max="5" 
                                value="3" 
                                class="slider" 
                                name="question_<?php echo $index + 1; ?>">
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <button type="submit">Submit</button>
            <?php if (!empty($report)): ?>
                <button type="submit" name="download_report">Download Report</button>
            <?php endif; ?>
        </form>
    </div>

    <?php if (!empty($report)): ?>
        <div class="report-container">
            <div class="report">
                <h3>Your Wellbeing Report</h3>
                <p><?php echo htmlspecialchars($report); ?></p>
                <div class="category-score">
                    <h4>Category Insights</h4>
                    <?php foreach ($categoryScores as $category => $score): ?>
                        <p><strong><?php echo $category; ?>:</strong> <?php echo number_format($score / 3, 1); ?></p>
                    <?php endforeach; ?>
                </div>
                <h4>Your Responses:</h4>
                <ul>
                    <?php foreach ($responses as $question => $response): ?>
                        <li><?php echo htmlspecialchars($question) . ": " . htmlspecialchars($response); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>
</body>
</html>

