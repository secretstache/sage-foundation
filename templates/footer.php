<footer class="site-footer">
  <div class="grid-container">
    <?php if ( $copyright = get_field( 'copyright', 'options' ) ) { ?>
    <div class="grid-x grid-margin-x">
      <div class="cell">
        <?php echo $copyright; ?>
      </div>
    </div>
    <?php } ?>
  </div>
</footer>
