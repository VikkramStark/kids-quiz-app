<?php
    $questions = [
        [
            "question" => "Who is the Father of Computers?", 
            "options" => [
                "Charles Babbage", "Tesla", "Thomas Shellby", "Jack Sparrow" 
            ]
        ], 
        [
            "question" => "Who Invented the Aircraft?", 
            "options" => [
                "Wright Brothers", "Left Brothers", "Straight Brothers", "Biriyani Brothers" 
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
    <link rel="stylesheet" href="static/styles.css">  
</head>

<body class = 'bg-violet-400'> 

    <main class = 'container mx-auto bg-violet-300 min-h-screen max-h-max'>   

    <form action="" method = "POST" data-multi-step class = 'flex flex-col gap-y-4 py-4 items-center mx-auto w-screen px-5 max-w-3xl relative bg-violet-200'>  

        <!-- Sample Structure  -->
        <!-- <div data-step = "1" class = 'card'> 
            <h2 class="text-left text-xl font-semibold">1) Who is the father of Computer?</h2>

            <div class = 'my-3 flex flex-col  gap-y-3'>  

                <div class = 'option-div cursor-pointer'>    
                    <input type="radio" name = 'q1' id = 'Charles Babbage' value = 'Charles Babbage' class = "hidden peer" /> 
                    <label for = "Charles Babbage" class = "block cursor-pointer hover:bg-slate-800 hover:text-white duration-200 transition px-4 py-2 rounded-md border border-slate-600 peer-checked:bg-teal-400">Charles Babbage</label>
                    
                </div>

                <div class = 'option-div '>   
                    <input type="radio" name = 'q1' id = 'Tesla' value = 'Tesla' class = "hidden peer" /> 
                    <label for="Tesla" class = "block cursor-pointer  hover:bg-options-hover hover:text-white duration-200 transition px-4 py-2 rounded-md border border-slate-600 peer-checked:bg-teal-400">Tesla</label>
                </div>

                <div class = 'option-div '>   
                    <input type="radio" name = 'q1' id = 'Rajan' value = 'Rajan' class = "hidden peer" /> 
                    <label for="Rajan" class = "block cursor-pointer  hover:bg-options-hover hover:text-white duration-200 transition px-4 py-2 rounded-md border border-slate-600 peer-checked:bg-teal-400">Rajan</label>
                </div>
                
            </div>

        </div> -->

        <?php foreach($questions as $index => $question):?>
            <div data-step = "1" class = 'card'> 
            <h2 class="text-left text-xl font-semibold"><?php echo ($index+1).') '.$question['question']; ?></h2>

                <div class = 'my-3 flex flex-col  gap-y-3'>  
                    <?php foreach($question['options'] as $option): ?> 
                    <div class = 'option-div cursor-pointer'>    
                        <input type="radio" name = "<?php echo 'q'.($index+1); ?>" id = "<?php echo $option; ?>" value = "<?php echo $option; ?>" class = "hidden peer" /> 
                        <label for = "<?php echo $option; ?>" class = "block cursor-pointer hover:bg-slate-800 hover:text-white duration-200 transition px-4 py-2 rounded-md border border-slate-600 peer-checked:bg-teal-400"><?php echo $option; ?></label>
                        
                    </div>
                    <?php endforeach;?> 
                    
                </div>

            </div>
        <?php endforeach; ?> 

        <!-- <div data-step = "2" class = 'card'> 

        </div>

        <div data-step = "3" class = 'card'> 

        </div>

        <div data-step = "4" class = 'card'> 

        </div> -->

        <div class="my-2 w-full">  
            <button type = 'submit' class = 'w-full rounded-xl shadow-md hover:shadow-xl text-white font-semibold text-lg bg-teal-600 hover:bg-teal-500 cursor-pointer py-2 px-4'>Submit Quiz</button> 
        </div>
        

    </form>

    </main>
</body>

</html>