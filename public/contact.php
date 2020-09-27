<?php

require '../core/processContactForm.php';

$content = <<<EOT
    <div>
      <h1>Contact Me!</h1>
      <p>I would love to discuss how we can work together.</p>
    </div>

    <div class="card" id="contactForm">
      <form action="contact.php" method="POST">
          {$message}
        <div>
          <label for="name">Name:</label>
          <div class="text-error">{$valid->error('name')}</div>
          <input id="name" type="text" name="name" value="{$valid->userInput('name')}">
          <br />
        </div>

        <div>
          <label for="email">Email:</label>
          <div class="text-error">{$valid->error('email')}</div>
          <input id="email" type="text" name="email" value="{$valid->userInput('email')}" placeholder="your_email@example.com">
        </div>

        <div>
          <label for="message">Message:</label>
          <div class="text-error">{$valid->error('message')}</div>
          <textarea id="message" name="message" rows="12" cols="30" placeholder="How can I help you?" value="{$valid->userInput('message')}"></textarea>
        </div>

        <div>
          <input type="hidden" name="subject" value="New submission!">
        </div>

        <div>
          <!-- <button class="btn btn-outline-dark" id="submit" type="submit">Send</button> -->
          <input type="submit" value="Send">
        </div>
      </form>
    </div>
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
EOT;

include '../core/layout.php';
