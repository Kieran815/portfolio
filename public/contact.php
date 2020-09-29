<?php
require '../core/processContactForm.php';

$content = <<<EOT

  <div id="con-intro">
    <h1>Contact Me!</h1>
    <p>I would love to discuss how we can work together.</p>
  </div>

  <form class="contactForm" action="contact.php" method="POST">
    {$message}
    <input type="hidden" name="subject" value="New Message from Portfolio">

    <div id="form-control">
      <label for="name">Name:</label>
      <div class="text-error">
        {$valid->error('name')}
      </div>
      <input id="name" type="text" name="name" value="{$valid->userInput('name')}" placeholder="Jesse Doe">
      <br />
    </div>

    <div id="form-control">
      <label for="email">Email:</label>
      <div class="text-error">{$valid->error('email')}</div>
      <input id="email" type="text" name="email" value="{$valid->userInput('email')}" placeholder="your_email@example.com">
    </div>

    <div id="form-control">
      <label for="message">Message:</label>
      <div class="text-error">{$valid->error('message')}</div>
      <textarea id="message" name="message" rows="4" placeholder="How can I help you?">{$valid->userInput('message')}</textarea>
    </div>


    <div id="form-control">
      <input id="con-submit" type="submit" value="Send">
    </div>

  </form>

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
EOT;

include '../core/layout.php';
