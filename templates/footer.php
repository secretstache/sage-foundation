<footer class="site-footer">
  <?php if ( $copyright = get_field( 'copyright', 'options' ) ) { ?>
  <div class="row">
    <div class="small-12 column">
      <?php echo $copyright; ?>
    </div>
  </div>
  <?php } ?>
</footer>
