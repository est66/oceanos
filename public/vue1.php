<html>
    <head>
        <title>test</title>
    </head>
    <body>
        coucou <?php echo $username; ?>  <?php echo $email; ?> 
        <?php if ($username == "Nicolas") : ?>
            <div> ADMIN </div>
        <?php endif; ?>
    </body>    
</html>