<?php

class HeartyEffectsLightView {

	public static function generate_view($settings_instance) {

		$options = get_option('heartyeffectslight_options');

		$options_i = array();

		$i = 1;

		if (empty($options)) { return '<p>Please save your settings and try again.</p>'; }

		foreach ($options as $k => $v) {

			if ($i > 1) {

				$k_arr = explode('_', $k);

				if (end($k_arr) == $settings_instance) {

					$options_i[str_replace('_'.$settings_instance, '', $k)] = $v;

				}

			}

			$i++;

		}

		$number_of_content_items = 6;

		// params

		$layout_effect                          = $options_i['layout_effect'];
		$icon_width                             = $options_i['icon_width'];
		$icon_border_radius                     = $options_i['icon_border_radius'];
		$icon_border_type                       = $options_i['icon_border_type'];
		$icon_border_width                      = $options_i['icon_border_width'];
		$title_google_font                      = $options_i['title_google_font'];
		$title_font_weight                      = $options_i['title_font_weight'];
		$title_font_style                       = $options_i['title_font_style'];
		$title_font_size                        = $options_i['title_font_size'];

		for ($j=1;$j<=$number_of_content_items;$j++) {

		${'show_icon'.$j}                       = $options_i['show_icon'.$j];
		${'icon_effect'.$j}                     = $options_i['icon_effect'.$j];
		${'icon_name'.$j}                       = $options_i['icon_name'.$j];
		${'icon_color'.$j}                      = $options_i['icon_color'.$j];
		${'icon_bg_color'.$j}                   = $options_i['icon_bg_color'.$j];
		${'icon_link'.$j}                       = $options_i['icon_link'.$j];
		${'icon_link_target'.$j}                = $options_i['icon_link_target'.$j];
		${'icon_font_size'.$j}                  = $options_i['icon_font_size'.$j];
		${'icon_border_color'.$j}               = $options_i['icon_border_color'.$j];
		${'title_text'.$j}                      = $options_i['title_text'.$j];
		${'title_color'.$j}                     = $options_i['title_color'.$j];
		${'show_title_link'.$j}                 = $options_i['show_title_link'.$j];
		${'title_link'.$j}                      = $options_i['title_link'.$j];

		}

		$custom_id = rand(10000,90000);

		wp_register_style('heartyeffectslight-googlefonts-title'.$custom_id, 'https://fonts.googleapis.com/css?family='.str_replace(" ","+",$title_google_font).':'.$title_font_weight.str_replace("normal","",$title_font_style));

		wp_enqueue_style('heartyeffectslight-googlefonts-title'.$custom_id);

		// end params

		ob_start();

		// html

		?>

		<?php if ($layout_effect != 'layout-effect-none') { ?>

		  <script type="text/javascript">
			jQuery(document).ready(function() {
			jQuery('#heartyeffectslight-<?php echo $custom_id; ?> .layout-effect').addClass("heartyhide").viewportChecker({
			  classToAdd: 'heartyshow <?php echo $layout_effect; ?>', // Class to add to the elements when they are visible
			  offset: 100
			  });
			});
		  </script>

		<?php } ?>

		<div id="heartyeffectslight-<?php echo $custom_id; ?>" class="hrty-row">

		  <?php
		  $col_class = '';
		  $active_columns = array($show_icon1,$show_icon2,$show_icon3,$show_icon4,$show_icon5,$show_icon6);
		  $columns_check = 0; foreach ($active_columns as $active_column) { if ($active_column == 1) { $columns_check++; } }

			if ($columns_check == 6) { $col_class = 'hrty-col-lg-2 hrty-col-md-2 hrty-col-sm-4 hrty-col-xs-6'; }
			else if ($columns_check == 5) { $col_class = 'hrty-col-lg-2-4 hrty-col-sm-4 hrty-col-xs-6'; }
			else if ($columns_check == 4) { $col_class = 'hrty-col-lg-3 hrty-col-md-3 hrty-col-sm-3 hrty-col-xs-6'; }
			else if ($columns_check == 3) { $col_class = 'hrty-col-lg-4 hrty-col-md-4 hrty-col-sm-4 hrty-col-xs-6'; }
			else if ($columns_check == 2) { $col_class = 'hrty-col-lg-6 hrty-col-md-6 hrty-col-sm-6 hrty-col-xs-6'; }
			else if ($columns_check == 1) { $col_class = 'hrty-col-lg-12 hrty-col-md-12 hrty-col-sm-12 hrty-col-xs-12'; }

			for ($i=1;$i<7;$i++) {

			if ((${'show_icon'.$i}) !=0) { ?>

			<div id="heartyeffectslight-box<?php echo $i; ?>"
			  class="<?php echo $col_class; ?> heartyeffectslight<?php echo $i; ?> layout-effect">

				<div id="heartyeffectslight-icon<?php echo $i; ?>"
				  class="heartyeffectslight-<?php echo ${'icon_effect'.$i}; ?>"
				  style="background-color: <?php echo ${'icon_bg_color'.$i}; ?>;
						  width: <?php echo $icon_width; ?>;
						  border: <?php echo $icon_border_width; ?> <?php echo $icon_border_type; ?> <?php echo ${'icon_border_color'.$i}; ?>;
						  -webkit-border-radius: <?php echo $icon_border_radius; ?>;
						  -moz-border-radius: <?php echo $icon_border_radius; ?>;
						  border-radius: <?php echo $icon_border_radius; ?>;">

					  <?php // Do not receive link if the link setting is empty
					  if(empty(${'icon_link'.$i})) { ?>

						<i class="<?php echo ${'icon_name'.$i}; ?>"
							style="color: <?php echo ${'icon_color'.$i}; ?>;
								  font-size: <?php echo ${'icon_font_size'.$i}; ?>;">
						</i>

					  <?php } else { ?>

						<a href="<?php echo ${'icon_link'.$i}; ?>" target="_<?php echo ${'icon_link_target'.$i}; ?>">
						  <i class="<?php echo ${'icon_name'.$i}; ?>"
							  style="color: <?php echo ${'icon_color'.$i}; ?>;
									font-size: <?php echo ${'icon_font_size'.$i}; ?>;">
						  </i>
						</a>

					  <?php } ?>

				</div>

				<p id="heartyeffectslight-title<?php echo $i; ?>"
					style="color: <?php echo ${'title_color'.$i}; ?>;
						  font-family: '<?php echo $title_google_font; ?>', sans-serif;
						  font-weight: <?php echo $title_font_weight; ?>;
						  font-style: <?php echo $title_font_style; ?>;
						  font-size: <?php echo $title_font_size; ?>;">

				  <?php if (${'show_title_link'.$i} == 1) { ?>

					<a href="<?php echo ${'title_link'.$i}; ?>" target="_<?php echo ${'icon_link_target'.$i}; ?>"
					  style="color: <?php echo ${'title_color'.$i}; ?>;">

				  <?php } ?>

					  <?php echo ${'title_text'.$i}; ?>

				  <?php if (${'show_title_link'.$i} == 1) { ?>

					</a>

				  <?php } ?>

				</p>

			</div>

		  <?php } } ?>

		</div>

		<?php

		// end html

		$output = ob_get_contents();

		ob_end_clean();

		return $output;

	}

}

