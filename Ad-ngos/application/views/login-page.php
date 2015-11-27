<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="UTF-8">        
            <script src="<?php echo base_url(); ?>assets/js/jquery.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
            <link href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
            <title>LOGIN</title> 
    </head>
    <body style="background-color: #330000">        
        <div class="container col-lg-6" style="padding-top: 100px">
            <div class="jumbotron" style="width: auto"> 
                <h1>CAM-NGOsearch</h1>
                <?php echo validation_errors(); ?>
                <?php echo form_open('verifylogin'); ?>
                <table  class="table">
                    <tr>
                        <td><label for="username">Username:</label></td>
                        <td><input type="text" size="20" id="username" name="username" class="textbox"/></td>
                    </tr>                    
                    <tr></tr>
                    <tr>
                        <td><label for="password">Password:</label></td>
                        <td><input type="password" size="20" id="passowrd" name="password" class="textbox"/></td>
                    </tr>
                    <tr><td></td><td><input type="submit" value="Login"/></td></tr>
                </table>
                </form>

            </div>
        </div>     
    </body>
</html>