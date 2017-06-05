<?php

$c_classes = 'business-info';

?>


<div<?php echo SSMPB\component_id_classes( $c_classes ); ?>>

  <?php $business_info = get_sub_field('business_information'); ?>

  <?php if ( !empty( $business_info ) ) { ?>

  <div itemscope itemtype="http://schema.org/Organization">
    <span itemprop="name" class="hide"><?php echo get_bloginfo('name'); ?></span>

  <?php } ?>

  <?php if ( in_array('Office Address', $business_info ) ) { ?>

  <?php $office_address = get_field('office_address', 'options'); ?>

  <div itemprop="address" itemscope itemtype="http://schema.org/PhysicalAddress">
    <p class="faux-title">Office:</p>
    <span itemprop="streetAddress"><?php echo $office_address['street1']; ?> <?php echo $office_address['street2']; ?></span><br>
    <span itemprop="addressLocality"><?php echo $office_address['city']; ?></span>, <span itemprop="addressRegion"><?php echo $office_address['state']; ?></span> <span itemprop="postalCode"><?php echo $office_address['zip']; ?></span>
  </div>

  <?php } ?>

  <?php if ( in_array('Mailing Address', $business_info ) ) { ?>

  <?php $mailing_address = get_field('mailing_address', 'options'); ?>

  <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
    <p class="faux-title">Mail:</p>
    <span itemprop="streetAddress"><?php echo $mailing_address['street1']; ?> <?php echo $mailing_address['street2']; ?></span><br>
    <span itemprop="addressLocality"><?php echo $mailing_address['city']; ?></span>, <span itemprop="addressRegion"><?php echo $mailing_address['state']; ?></span> <span itemprop="postalCode"><?php echo $mailing_address['zip']; ?></span>
  </div>

  <?php } ?>

  <?php if ( in_array('Primary Phone Number', $business_info ) || in_array('Primary Email Address', $business_info ) ) { ?>

  <?php $phone = get_field('primary_phone_number', 'options'); ?>
  <?php $email = get_field('primary_email_address', 'options'); ?>

  <div class="contact-info">
    <?php if ( $phone ) { ?>
      <?php $stripped_phone = preg_replace('/\D+/', '', $phone); ?>
      <p class="phone">Phone: <span itemprop="telephone"><a href="tel:<?php echo $stripped_phone; ?>"><?php echo $phone; ?></a></span></p>
    <?php } ?>

    <?php if ( $email ) { ?>
    <?php $subject = get_field('default_subject_line', 'options'); ?>
    <p clas="email">Email: <span itemprop="email"><a href="mailto:<?php echo $email; ?>?subject=<?php echo $subject; ?>"><?php echo $email; ?></a></span></p>
    <?php } ?>
  </div>

  <?php } ?>

</div>
