# MyConsolePHP
**MyConsolePHP** is a PHP fiddle-like web tool to simulate running a PHP script in terminal, but in your browser. To do this, the output is sent to a textarea to avoid browser parsing without using css, all within a single script.

![](http://i.imgur.com/Ffw0WIo.png)

## Install instructions
### Mandatory
  - Put the **index.php** in some directory (eg: MyConsolePHP) in your local web server. You can rename the script to something else if you wish.

### Optional
  - If you want to keep history of your code you must download the [MyLogPHP](https://github.com/llagerlof/MyLogPHP) class to the same directory. All executed code will be stored in the file **_OUT_MyLogPHP.txt**.
  - Put the **.htaccess** (if you are using Apache) in the same directory to allow only localhost access.

## How to use it
  - Access the **index.php** using your browser. eg: http://localhost/MyConsolePHP (if your directory is MyConsolePHP).
  - Write your code in the left panel (the \<?php and ?\> tags are optional).
  - CTRL + ENTER anywhere to execute it.
  - All output are sent to the right panel.
  - The result panel is editable too, if you want to make annotations.
