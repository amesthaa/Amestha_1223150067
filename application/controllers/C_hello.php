<?php
class c_hello extends CI_Controller {
    function index(){
        ?>
        <html>
            <head>
                <title>Hello World</title>
    </head>
    <body>
        <?php echo "Hello World";?>
    </body>
    </html>
    <?php
    }
}