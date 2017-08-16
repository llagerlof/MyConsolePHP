# MyConsolePHP
MyConsolePHP is a PHP fiddle-like web tool to simulate running a PHP script in terminal, but in your browser. To do this, the output is sent to a textarea to avoid browser parsing, all within a single script.

## Install instructions
### Mandatory
  - Put the index.php in some empty directory (eg: MyConsolePHP) in your local web server.

### Optional
  - If you need to log your code you must download the [MyLogPHP](https://github.com/llagerlof/MyLogPHP) class to the same directory.
  - Put the .htaccess (if you are using Apache) in the same directory to allow only localhost access.

## How to use it
  - Access the index.php using your browser. eg: http://localhost/MyConsolePHP (if you directory is MyConsolePHP).
  - Write your code in the left panel (the \<?php and ?\> tags are optional).
  - CTRL + ENTER anywhere to execute it.
  - All output is sent to the right panel
