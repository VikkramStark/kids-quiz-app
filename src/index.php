<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
  $firstName = isset($_POST['first_name']) ? htmlspecialchars($_POST['first_name'], ENT_QUOTES, 'UTF-8') : '';
  $Email = isset($_POST['email']) ? htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8") : "";
  $Phone = isset($_POST['phone']) ? htmlspecialchars($_POST["phone"], ENT_QUOTES, "UTF-8") : "";
  $sql = 'INSERT into user_details (name, email,phone) VALUES(?,?,?)';
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssi", $firstName, $Email, $Phone);
  try {
    $stmt->execute();
    if ($stmt->error) {
      echo "Error:" . $stmt->error;

    } else {
      echo "New user created";
    }

  } catch (mysqli_sql_exception) {

  } finally {
    $stmt->close();
    $conn->close();
    $firstName = ucfirst($firstName);
  }

  $quizAnswers = [];
  foreach ($_POST as $key => $value) {
    if (strpos($key, 'q') === 0) {
      $quizAnswers[$key] = $value;
    }
  }
  // echo "<h3>Quiz Answers:</h3>";
  // foreach ($quizAnswers as $question => $answer) {
  //     echo "<p>$question: $answer</p>";
  // }
}
?>
<?php
$questions = [
  [
    "question" => "Who is the Father of Computers?",
    "options" => [
      "Charles Babbage",
      "Tesla",
      "Thomas Shellby",
      "Jack Sparrow"
    ]
  ],
  [
    "question" => "Who Invented the Aircraft?",
    "options" => [
      "Wright Brothers",
      "Left Brothers",
      "Straight Brothers",
      "Biriyani Brothers"
    ]
  ]
]
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz App</title>
  <link rel="stylesheet" href="static/newStyles.css">
  <style>
    .button {
      border: 1px solid green;
      -webkit-backdrop-filter: blur(10px);
      backdrop-filter: blur(10px);
      transform: skewX(-10deg);
      height: 50px;
      width: 200px;
      border-radius: 20px 5px 20px 0px;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s ease;
      font: 15px sans-serif;
      font-weight: 300;
      text-shadow: 0 0 20px #fff;
      text-transform: uppercase;
      -webkit-animation: breath2 2s 0.5s infinite alternate;
      animation: breath2 2s 0.5s infinite alternate;
      transition: all 0.2s ease;
      cursor: pointer;
    }

    .button:before {
      content: "";
      display: block;
      width: calc(100% - 22px);
      height: calc(50px - 8px);
      -webkit-animation: breath 2s infinite alternate;
      animation: breath 2s infinite alternate;
      left: 10px;
      top: 3px;
      position: absolute;
      background-color: transparent;
      border: 1px solid #fff;
      border-radius: 15px 3px 15px 3px;
    }

    .button.fire {
      border-color: #ffeca8;
      background-image: linear-gradient(to bottom, rgba(255, 138, 48, 0.6), rgba(240, 96, 29, 0.6));
      box-shadow: 0 0 70px rgba(255, 138, 48, 0.6), 0 5px 20px rgba(255, 138, 48, 0.6), inset 0 1px #ffeca8, inset 0 -1px #ffeca8;
      color: #ffeca8;
    }

    .button.fire:before {
      box-shadow: inset 0 0 30px 0 #ffeca8;
    }

    .button.ice {
      border-color: #a8ecff;
      background-image: linear-gradient(to bottom, rgba(48, 138, 255, 0.5), rgba(29, 96, 240, 0.5));
      box-shadow: 0 0 70px rgba(48, 138, 255, 0.5), 0 5px 20px rgba(48, 138, 255, 0.5), inset 0 1px #ffeca8, inset 0 -1px #ffeca8;
      color: #a8ecff;
    }

    .button.ice:before {
      box-shadow: inset 0 0 30px 0 #a8ecff;
    }

    .button:hover.fire {
      box-shadow: 0 0 70px rgba(255, 138, 48, 0.8), 0 5px 20px rgba(255, 138, 48, 0.8), inset 0 1px #ffeca8, inset 0 -1px #ffeca8;
    }

    .button:hover.fire:before {
      box-shadow: inset 0 0 50px 0 #ffeca8;
    }

    .button:hover.ice {
      box-shadow: 0 0 70px rgba(48, 138, 255, 0.8), 0 5px 20px rgba(48, 138, 255, 0.8), inset 0 1px #a8ecff, inset 0 -1px #a8ecff;
    }

    .button:hover.ice:before {
      box-shadow: inset 0 0 50px 0 #a8ecff;
    }

    .button+.button {
      margin-top: 15px;
      -webkit-animation-delay: 0.3s;
      animation-delay: 0.3s;
    }

    @-webkit-keyframes breath {
      0% {
        transform: scaleX(1);
      }

      100% {
        transform: scaleX(0.95);
      }
    }

    @keyframes breath {
      0% {
        transform: scaleX(1);
      }

      100% {
        transform: scaleX(0.95);
      }
    }

    @-webkit-keyframes breath2 {
      0% {
        transform: skewX(-10deg) scaleX(1);
      }

      100% {
        transform: skewX(-10deg) scaleX(0.95);
      }
    }

    @keyframes breath2 {
      0% {
        transform: skewX(-10deg) scaleX(1);
      }

      100% {
        transform: skewX(-10deg) scaleX(0.95);
      }
    }

    .ref {
      -webkit-backdrop-filter: blur(10px);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.6);
      border-radius: 3px;
      padding: 5px 8px;
      position: absolute;
      font-size: 16px;
      bottom: 10px;
      right: 10px;
      color: #fff;


      font-weight: 300;
      font-family: sans-serif;
      text-decoration: none;
    }

    .ref::first-letter {
      font-size: 12px;
    }
  </style>
</head>

<body class='bg-violet-400'>

  <main class='container mx-auto bg-violet-300 min-h-screen max-h-max'>
  <div class="flex text-4xl" style="justify-content: center; align-items: center; font-size:  2.25rem; line-height:  2.5rem; padding: 1rem; font-weight: 700; height: auto;">
  <h1> Hello <?php echo $firstName ?></h1>
</div>

    <form action="submitted.php" method="POST" data-multi-step
      class='flex flex-col gap-y-4 py-4 items-center mx-auto w-screen px-5 max-w-3xl relative bg-violet-200'>

      <!-- Sample Structure  -->
      <!-- <div data-step = "1" class = 'card'> 
            <h2 class="text-left text-xl font-semibold">1) Who is the father of Computer?</h2>

            <div class = 'my-3 flex flex-col  gap-y-3'>  

                <div class = 'option-div cursor-pointer'>    
                    <input type="radio" name = 'q1' id = 'Charles Babbage' value = 'Charles Babbage' class = "hidden peer" /> 
                    <label for = "Charles Babbage" class = "block cursor-pointer hover:bg-slate-800 hover:text-white
      duration-200 transition px-4 py-2 rounded-md border border-slate-600 peer-checked:bg-teal-400">Charles
      Babbage</label>

      </div>

      <div class='option-div '>
        <input type="radio" name='q1' id='Tesla' value= 'Tesla' class = "hidden peer" />
          <label for="Tesla"
            class="block cursor-pointer  hover:bg-options-hover hover:text-white duration-200 transition px-4 py-2 rounded-md border border-slate-600 peer-checked:bg-teal-400">Tesla</label>
      </div>

      <div class='option-div '>
        <input type="radio" name='q1' id='Rajan' value='Rajan' class="hidden peer" /> 
        <label for="Rajan"
          class="block cursor-pointer  hover:bg-options-hover hover:text-white duration-200 transition px-4 py-2 rounded-md border border-slate-600 peer-checked:bg-teal-400">Rajan</label>
      </div>
      
      </div>

      </div> -->

      <?php foreach ($questions as $index => $question): ?>
        <div data-step="1" class='card'>
          <h2 class="text-left text-xl font-semibold">
            <?php echo ($index + 1) . ') ' . $question['question']; ?>
          </h2>

          <div class='my-3 flex flex-col  gap-y-3'>
            <?php foreach ($question['options'] as $option): ?>
              <div class='option-div cursor-pointer'>
                <input type="radio" name="<?php echo 'q' . ($index + 1); ?>" id="<?php echo $option; ?>"
                  value="<?php echo $option; ?>" class="hidden peer" />
                <label for="<?php echo $option; ?>"
                  class="block cursor-pointer hover:bg-slate-800 hover:text-white duration-200 transition px-4 py-2 rounded-md border border-slate-600 peer-checked:bg-teal-400">
                  <?php echo $option; ?>
                </label>
              </div>
              <?php endforeach; ?>
              
            </div>
            
          </div>
          <?php endforeach; ?>
          
          <!-- <div data-step = "2" class = 'card'> 
            
            </div>
            
            <div data-step = "3" class = 'card'> 
              
              </div>
              
              <div data-step = "4" class = 'card'> 
                
                </div> -->

      <button type="submit" class="button fire w-full">Submit quiz</button>


      <!-- 
                <button type='submit'
                    class='w-full rounded-xl shadow-md hover:shadow-xl text-white font-semibold text-lg bg-teal-600 hover:bg-teal-500 cursor-pointer py-2 px-4'>Submit
                    Quiz</button> -->

    </form>

  </main>
</body>

</html>