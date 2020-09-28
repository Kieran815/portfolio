<?php
//Include non-vendor files
require '../core/About/src/Validation/Validate.php';

//Declare Namespaces
use About\Validation;
use About\email;

//Validate Declarations
$valid = new About\Validation\Validate();
$args = [
  'name'=>FILTER_SANITIZE_STRING,
  'subject'=>FILTER_SANITIZE_STRING,
  'message'=>FILTER_SANITIZE_STRING,
  'email'=>FILTER_SANITIZE_EMAIL,
];

$input = filter_input_array(INPUT_POST, $args);

if(!empty($input)){
  $valid->validation = [
    'name'=>[[
      'rule'=>'notEmpty',
      'message'=>'Please enter your name'
    ]],
    'email'=>[[
      'rule'=>'email',
      'message'=>'Please enter a valid email'
    ],[
      'rule'=>'notEmpty',
      'message'=>'Please enter an email'
    ]],
    'subject'=>[[
      'rule'=>'notEmpty',
      'message'=>'Please enter a subject'
    ]],
    'message'=>[[
      'rule'=>'notEmpty',
      'message'=>'Please add a message'
    ]],
  ];
  $valid->check($input);
}

if(empty($valid->errors) && !empty($input)){
  $message = "<div>Success!</div>";
}
// else{
//   $message = "<div>Error!</div>";
// }

?>

<!DOCTYPE html>

<html>

  <head>

    <meta lang='en'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">


    <link rel="author" href="humans.txt" />
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link href="./dist/css/main.min.css" type="text/css" rel="stylesheet" >

    <meta name="description" content="Kieran M. Milligan Intro and Summary Page">
    <meta name="keywords" content="hello, introduction, intro, full-stack, web developer, full-stack web developer, React, JAM, JAM Stack">
    <style>
      body {
        position: relative;
        background-image: url('./images/Galaxy.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        min-height: 100vh;
      }

      .container {
        display: flex;
        flex-direction: column;
        align-items: center;
      }

      textarea,
      input {
        background-color: rgba(0,0,0, 0.75);
        color: white;
      }
    </style>
    <title>Contact Me | Kieran Milligan</title>
  </head>

  <body>

    <header>
      <span class="logo">
        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-power" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M5.578 4.437a5 5 0 1 0 4.922.044l.5-.866a6 6 0 1 1-5.908-.053l.486.875z" />
          <path fill-rule="evenodd" d="M7.5 8V1h1v7h-1z" />
        </svg>
        Kieran Milligan, Web Developer
      </span>
      <a id="toggleMenu">Menu</a>
      <nav>
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="resume.html">Resume</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </nav>
    </header>

    <main class="container">

      <div id="con-intro">
        <h1>Contact Me!</h1>
        <p>I would love to discuss how we can work together.</p>
      </div>

      <?php echo (!empty($message)?$message:null); ?>

      <form class="contactForm" action="contact.php" method="POST">

        <input type="hidden" name="subject" value="New submission!">

        <div>
          <label for="name">Name:</label>
          <div class="text-error"><?php echo $valid->error('name'); ?></div>
          <input id="name" type="text" name="name" value="<?php echo $valid->userInput('name'); ?>" placeholder="Jesse Doe">
          <br />
        </div>

        <div>
          <label for="email">Email:</label>
          <div class="text-error"><?php echo $valid->error('email'); ?></div>
          <input id="email" type="text" name="email" value="<?php echo $valid->userInput('email'); ?>" placeholder="your_email@example.com">
        </div>

        <div>
          <label for="message">Message:</label>
          <div class="text-error"><?php echo $valid->error('message'); ?></div>
          <textarea id="message" name="message" rows="4" placeholder="How can I help you?"><?php echo $valid->userInput('message'); ?></textarea>
        </div>


        <div>
          <!-- <button class="btn btn-outline-dark" id="submit" type="submit">Send</button> -->
          <input id="con-submit" type="submit" value="Send">
        </div>

      </form>

    </main>

    <script>
      var toggleMenu = document.getElementById('toggleMenu');
      var nav = document.querySelector('nav');
      toggleMenu.addEventListener(
        'click',
        function() {
          if (nav.style.display == 'block') {
            nav.style.display = 'none';
          } else {
            nav.style.display = 'block';
          }
        }
      );
    </script>
  </body>

</html>
