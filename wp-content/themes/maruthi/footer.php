    <?php
        /**
         * maruthi_hook_content_after hook.
         * 
         */
        do_action( 'maruthi_hook_content_after' );
    ?>

        <!-- **Footer** -->
        <footer id="footer">
            <div class="container">
            <?php
                /**
                 * maruthi_footer hook.
                 * 
                 * @hooked maruthi_vc_footer_template - 10
                 *
                 */
                do_action( 'maruthi_footer' );
            ?>
            </div>
        </footer><!-- **Footer - End** -->

    </div><!-- **Inner Wrapper - End** -->
        
</div><!-- **Wrapper - End** -->
<?php
    
    do_action( 'maruthi_hook_bottom' );

    wp_footer();
?>
</body>
</html>