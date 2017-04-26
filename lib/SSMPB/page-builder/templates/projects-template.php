<?php

if ( get_sub_field('project_options') == 'featured_projects' ) {

  get_template_part('lib/SSMPB/page-builder/templates/project-templates/featured-projects', 'template');

} else {

  get_template_part('lib/SSMPB/page-builder/templates/project-templates/project-gallery', 'template');

}


