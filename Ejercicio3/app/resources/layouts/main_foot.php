<?php function setFooter($args,...$scripts){ 
        //$ua = as_object($args->ua);
        $ua = as_object([]);    
?>

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="/assets/js/sweetalert2.js"></script>  -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="/assets/js/app.js"></script>
    <?php foreach($scripts as $script){ ?>
        <script src="/assets/js/<?=$script?>"></script>
    <?php } ?>
    <script>
        $(function(){
            
        });

    </script>

<?php } function closeFooter(){ ?>

    </body>
    </html>

<?php }