<?php 
$questions =  [
    [
        "question" => "Who is the Father of Computers?",
        "options" => [
            "Charles Babbage",
            "Tesla",
            "Thomas Shelby",
            "Jack Sparrow"
        ],
        "correctOption" => "Charles Babbage"
    ],
    [
        "question" => "Who Invented the Aircraft?",
        "options" => [
            "Wright Brothers",
            "Left Brothers",
            "Straight Brothers",
            "Biriyani Brothers"
        ],
        "correctOption" => "Wright Brothers"
    ]
];

$submittedAnswers = [];
$correctCount = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($questions as $index => $question) {
        $submittedAnswer = $_POST['q' . ($index + 1)] ?? null;
        $submittedAnswers[] = $submittedAnswer;

        if ($submittedAnswer === $question['correctOption']) {
            $correctCount++;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz App</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="static/styles.css"> -->
    <link rel="stylesheet" href="static/newStyles.css">
    <!-- <style>
        .correct-answer {
    color: green;
    font-weight: bold;
}

.wrong-answer {
    color: red;
    font-weight: bold;
}

input[type="radio"]:checked + label {
    color: black; /* Ensure text color is clear when radio button is selected */
}

label {
    color: #333; /* Default label color for better visibility */
}

    </style> -->
</head>

<body class='bg-violet-400 gap-4'>


<div class="confetti">
    <div class="confetti-piece"></div>
    <div class="confetti-piece"></div>
    <div class="confetti-piece"></div>
    <div class="confetti-piece"></div>
    <div class="confetti-piece"></div>
    <div class="confetti-piece"></div>
    <div class="confetti-piece"></div>
    <div class="confetti-piece"></div>
    <div class="confetti-piece"></div>
    <div class="confetti-piece"></div>
    <div class="confetti-piece"></div>
    <div class="confetti-piece"></div>
    <div class="confetti-piece"></div>
</div>
<div style="display: flex; align-items: center; justify-content: center; height: 100vh; flex-direction: column; font-size: 30px; position: relative;">
    <h1>Congratulations 🎉</h1>
    <h2>You got <?php echo $correctCount . " out of " . count($questions); ?></h2>
    <div style="position: absolute; bottom: 20px; left: 50%; transform: translateX(-50%); font-size: 40px">
        <!-- <i class="fa-solid fa-angles-down" style="colour:#eae8e4, background-color:#eae8e4,"></i> -->
        <div class="mouse"></div>
    </div>
</div>

<main class='container mx-auto bg-violet-300 min-h-screen max-h-max'>
    <form action="index.php" method="POST" class='flex flex-col py-4 items-center mx-auto w-screen px-5 max-w-3xl relative bg-violet-200'>
        <?php foreach ($questions as $index => $question): ?>
            <div class='card'>
                <h2 class="text-left text-xl font-semibold"><?php echo ($index + 1) . ') ' . $question['question']; ?></h2>

                <div class='my-3 flex flex-col gap-y-2'>
                    <?php foreach ($question['options'] as $option): ?>
                        <?php 
                        $isCorrect = ($option === $question['correctOption']);
                        $isSelected = ($submittedAnswers[$index] ?? '') === $option;
                        $class = '';
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            if ($isSelected && !$isCorrect) {
                                $class = 'wrong-answer';
                            } elseif ($isCorrect) {
                                $class = 'correct-answer';
                            }
                        }
                        ?>
                        <div class='option-div'>
                            <input type="radio" name="<?php echo 'q' . ($index + 1); ?>" id="<?php echo $option; ?>"
                                   value="<?php echo $option; ?>" <?php echo $isSelected ? 'checked' : ''; ?> />
                            <label for="<?php echo $option; ?>" class="<?php echo $class; ?>">
                                <?php echo $option; ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
        <button type="submit" class="button fire "> <i class="fa-solid fa-rotate-right"></i>Retry </button>
    </form>
</main>

</body>

</html>
