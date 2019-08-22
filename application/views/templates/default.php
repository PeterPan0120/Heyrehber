<!DOCTYPE html>
<html>
 
    <head>
        <title><?php echo $title; ?></title>
        <?php echo $page_css ?>
    </head>
 
    <body>
     
        <h1>Default template</h1>
         
        <div class="wrapper">
             
            <?php echo $body; ?>
             
        </div>
        <script src="/assets/js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <?php echo $page_script ?>
    </body>
     
</html>