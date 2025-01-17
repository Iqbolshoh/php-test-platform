<?php
include 'config.php';
$query = new Database();

if (isset($_GET['url'])) {
    $url = $_GET['url'];

    $subject = $query->select('subjects', '*', "url = ?", [$url], 's');

    if (empty($subject)) {
        header('Location: ./');
        exit();
    }

    $subjectid = $subject[0]['id'];

    $tests = $query->select('test', '*', "subject_id = ?", [$subjectid], 'i');
    $tru_falses = $query->select('tru_false', '*', "subject_id = ?", [$subjectid], 'i');
    $dropdowns = $query->select('dropdown', '*', "subject_id = ?", [$subjectid], 'i');
    $fill_in_the_blanks = $query->select('fill_in_the_blank', '*', "subject_id = ?", [$subjectid], 'i');

    shuffle($tests);
    shuffle($tru_falses);
    shuffle($dropdowns);
    shuffle($fill_in_the_blanks);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $correctAnswersCount = 0;

        foreach ($tests as $test) {
            $testid = $test['id'];
            $correctOption = $query->select('test_options', 'id', "test_id = $testid AND is_correct = 1");

            $correctAnswerId = $correctOption[0]['id'];

            if (isset($_POST["test_answer_$testid"]) && $_POST["test_answer_$testid"] == $correctAnswerId) {
                $correctAnswersCount++;
            }
        }

        foreach ($tru_falses as $tru_false) {
            $correctAnswer = $tru_false['is_true'];
            if (isset($_POST["tru_false_answer_{$tru_false['id']}"]) && $_POST["tru_false_answer_{$tru_false['id']}"] == $correctAnswer) {
                $correctAnswersCount++;
            }
        }

        foreach ($dropdowns as $dropdown) {
            $correctAnswer = $dropdown['correct_answer'];
            if (isset($_POST["dropdown_answer_{$dropdown['id']}"]) && $_POST["dropdown_answer_{$dropdown['id']}"] == $correctAnswer) {
                $correctAnswersCount++;
            }
        }

        foreach ($fill_in_the_blanks as $blank) {
            $correctAnswer = $blank['correct_answer'];
            if (isset($_POST["fill_in_the_blank_answer_{$blank['id']}"]) && strtolower(trim($_POST["fill_in_the_blank_answer_{$blank['id']}"])) == strtolower(trim($correctAnswer))) {
                $correctAnswersCount++;
            }
        }

        $totalQuestions = count($tests) + count($tru_falses) + count($dropdowns) + count($fill_in_the_blanks);
        $percentage = ($correctAnswersCount / $totalQuestions) * 100;

        // $query->insert('results', [
        //     'subject_id' => $subjectid,
        //     // 'participant_name' => $participant_name,
        //     'answered_questions' => $correctAnswersCount,
        //     'total_questions' => $totalQuestions
        // ]);
        ?>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                var correctAnswersCount = <?php echo $correctAnswersCount; ?>;
                var totalQuestions = <?php echo $totalQuestions; ?>;
                var percentage = <?php echo $percentage; ?>;

                Swal.fire({
                    title: "Quiz Result",
                    text: "You answered " + correctAnswersCount + " out of " + totalQuestions + " questions correctly. Your score is " + percentage.toFixed(2) + "%",
                    icon: "success",
                    confirmButtonText: "OK",
                    allowOutsideClick: false,
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = document.referrer;
                    }
                });
            });
        </script>
        <?php
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Test | <?= $subject[0]['title'] ?></title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

    <style>
        .container {
            transform: translateY(0);
            opacity: 0;
            animation: fadeInUp 1s ease-out forwards;
        }

        .title {
            color: #2c3e50;
            text-align: center;
            font-size: 36px;
            margin-bottom: 30px;
            letter-spacing: 2px;
            transform: translateY(0);
            opacity: 0;
            animation: fadeInUp 1s ease-out forwards;
        }

        form {
            margin: 0 auto;
            width: 100%;
            max-width: 800px;
            padding: 20px;
            border-radius: 8px;
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .title_h3 {
            color: #f39c12;
            text-align: center;
            font-size: 24px;
            margin-top: 20px;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
            transform: translateY(0);
            opacity: 0;
            animation: fadeInUp 1s ease-out forwards;
        }

        .task_item {
            border: 1px solid #e0e0e0;
            padding: 20px;
            margin-bottom: 25px;
            border-radius: 8px;
            background-color: #fafafa;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transform: translateY(0);
            opacity: 0;
            animation: fadeInUp 1s ease-out forwards;
        }

        .task_item label {
            font-weight: 600;
            font-size: 18px;
            margin-bottom: 15px;
            display: block;
        }

        .task_item input[type="radio"],
        .task_item select,
        .task_item input[type="text"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 8px;
            box-sizing: border-box;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .task_item input[type="radio"]:hover,
        .task_item select:hover,
        .task_item input[type="text"]:hover {
            border-color: #f39c12;
        }

        .task_item input[type="radio"]:checked,
        .task_item select:focus,
        .task_item input[type="text"]:focus {
            border-color: #f39c12;
            outline: none;
        }

        .task_item .question-number {
            font-size: 18px;
            font-weight: bold;
            color: #f39c12;
            margin-right: 10px;
        }

        .task_item .options {
            display: flex;
            flex-direction: column;
        }

        .task_item .options input[type="radio"] {
            margin-right: 10px;
            width: auto;
        }

        .task_item .options label,
        .task_item .options p {
            display: inline-block;
            margin-bottom: 8px;
        }

        .submit-btn {
            padding: 16px 32px;
            font-size: 18px;
            background-color: #f39c12;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: rgb(207, 129, 4);
        }

        hr {
            border: none;
            border-top: 2px solid #ddd;
            margin: 30px 0;
        }

        @media screen and (max-width: 768px) {
            .container {
                width: 100%;
                padding: 0px !important;
            }

            .title {
                font-size: 24px;
            }

            .submit-btn {
                font-size: 16px;
            }

            .task_item {
                padding: 15px;
            }

            .task_item label {
                font-size: 16px;
            }

            .task_item input[type="radio"],
            .task_item select,
            .task_item input[type="text"] {
                width: 100%;
            }
        }

        .words {
            margin-bottom: 15px;
        }

        .word {
            font-size: 16px;
            display: inline-block;
            padding: 5px 10px;
            margin: 5px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
        }

        .question-text {
            font-size: 18px;
            margin-bottom: 20px;
            text-align: justify;
            line-height: 1.6;
        }

        .answer-option {
            font-size: 18px;
            text-align: justify;
            line-height: 1.6;
            margin-bottom: 9px;
        }

        .answer-select {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .answer-select:hover {
            border-color: #007bff;
        }

        .answer-select:focus {
            border-color: #6c5ce7;
            outline: none;
        }

        #delay-animation {
            transform: translateY(0);
            opacity: 0;
            animation: fadeInUp 1s ease-out forwards;
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(50px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <body>
        <?php include 'includes/header.php' ?>
        <div class="container">

            <?php $delay = 0; ?>
            <?php $test_count = 1 ?>

            <h1 class="title">Test: <?= $subject[0]['title'] ?></h1>

            <?php if (!empty($tests) || !empty($tru_falses) || !empty($dropdowns) || !empty($fill_in_the_blanks)): ?>
                <form method="post">

                    <div id="delay-animation" style="animation-delay: <?= $delay += 0.05 ?>s">
                        <?php if (!empty($tests)): ?>
                            <h3 class="title_h3" style="animation-delay: <?= $delay += 0.05 ?>s">Test Questions</h3>
                            <div class="task_item" style="animation-delay: <?= $delay += 0.05 ?>s">
                                <?php foreach ($tests as $test):
                                    $testid = $test['id'];
                                    $options = $query->select('test_options', '*', "test_id = $testid");
                                    shuffle($options);
                                    ?>
                                    <div id="delay-animation" style="animation-delay: <?= $delay += 0.05 ?>s">
                                        <label for="test_question_<?= $testid; ?>">
                                            <p style="white-space: pre-wrap;"><?= ($test_count++) . ')   ' . $test['question'] ?></p>
                                        </label><br>

                                        <div class="options">
                                            <?php foreach ($options as $option): ?>
                                                <label>
                                                    <input type="radio" name="test_answer_<?= $testid; ?>"
                                                        id="test_answer_<?= $option['id']; ?>"
                                                        value="<?= $option['id'] ?>"><?= $option['option_text'] ?>
                                                </label><br>
                                            <?php endforeach; ?>
                                        </div>
                                        <hr>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div id="delay-animation" style="animation-delay: <?= $delay += 0.05 ?>s">
                        <?php if (!empty($tru_falses)): ?>
                            <h3 class="title_h3">True/False Questions</h3>
                            <div class="task_item">
                                <?php foreach ($tru_falses as $tru_false): ?>
                                    <div id="delay-animation" style="animation-delay: <?= $delay += 0.05 ?>s">
                                        <label for="tru_false_statement_<?= $tru_false['id']; ?>">
                                            <p style="white-space: pre-wrap;"> <?= ($test_count++) . ')   ' . $tru_false['statement'] ?>
                                            </p>
                                        </label><br>
                                        <div class="options">
                                            <label for="tru_false_answer_<?= $tru_false['id']; ?>_true">
                                                <input type="radio" id="tru_false_answer_<?= $tru_false['id']; ?>_true"
                                                    name="tru_false_answer_<?= $tru_false['id']; ?>" value="1"> True
                                            </label><br>
                                            <label for="tru_false_answer_<?= $tru_false['id']; ?>_false">
                                                <input type="radio" id="tru_false_answer_<?= $tru_false['id']; ?>_false"
                                                    name="tru_false_answer_<?= $tru_false['id']; ?>" value="0"> False
                                            </label><br>
                                        </div>
                                        <hr>
                                    </div>

                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div id="delay-animation" style="animation-delay: <?= $delay += 0.05 ?>s">
                        <?php if (!empty($dropdowns)): ?>
                            <h3 class="title_h3">Dropdown Question</h3>
                            <div class="task_item">
                                <?php foreach ($dropdowns as $index => $dropdown): ?>
                                    <?php $dropdownOptions[$index] = $dropdown['correct_answer']; ?>
                                <?php endforeach; ?>

                                <?php foreach ($dropdowns as $dropdown): ?>
                                    <div id="delay-animation" style="animation-delay: <?= $delay += 0.05 ?>s">
                                        <?php shuffle($dropdownOptions); ?>
                                        <label for="dropdown_question_<?= $dropdown['id']; ?>">
                                            <p style="white-space: pre-wrap;"><?= ($test_count++) . ')   ' . $dropdown['question'] ?></p>
                                        </label><br>
                                        <select name="dropdown_answer_<?= $dropdown['id']; ?>"
                                            id="dropdown_question_<?= $dropdown['id']; ?>" class="dropdown">
                                            <option value="" disabled selected>-- Select Section --</option>
                                            <?php foreach ($dropdownOptions as $dropdownOption): ?>
                                                <option value="<?= $dropdownOption ?>"><?= $dropdownOption ?></option>
                                            <?php endforeach; ?>
                                        </select><br>
                                        <hr>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div id="delay-animation" style="animation-delay: <?= $delay += 0.05 ?>s">
                        <?php if (!empty($fill_in_the_blanks)): ?>
                            <h3 class="title_h3">Fill in the Blank Questions</h3>
                            <div class="task_item">
                                <?php foreach ($fill_in_the_blanks as $index => $blank): ?>
                                    <div id="delay-animation" style="animation-delay: <?= $delay += 0.05 ?>s">
                                        <label for="fill_in_the_blank_<?= $blank['id']; ?>">
                                            <p style="white-space: pre-wrap;"><?= ($index + 1) . ')   ' . $blank['sentence'] ?> </p>
                                        </label><br>
                                        <input type="text" name="fill_in_the_blank_answer_<?= $blank['id']; ?>"
                                            placeholder="Enter your answer"><br>
                                        <hr>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div id="delay-animation" style="animation-delay: <?= $delay += 0.05 ?>s">
                        <input type="submit" value="Submit" class="submit-btn">
                    </div>
                </form>
            <?php endif; ?>

        </div>
        <?php include 'includes/footer.php' ?>
    </body>

    </html>
    <?php
} else {
    header('Location: ./');
    exit();
}
?>