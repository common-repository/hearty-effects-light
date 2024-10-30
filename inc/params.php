<?php

class HeartyEffectsLightParams {

	public static function generate_fields($obj, $number_of_settings_instances, $number_of_content_items) {

        $modify_settings_instance_arr = array();

        for ($i = 1; $i <= $number_of_settings_instances; $i++) {

            $modify_settings_instance_arr[$i] = 'Settings Instance '.$i;

        }

        add_settings_field(
            'modify_settings_instance',
            'Modify Settings for',
            array($obj, 'fields_callback'),
            'heartyeffectslight-setting-admin',
            'heartyeffectslight_global_settings_section',
            array(
                'id' => 'modify_settings_instance',
                'type' => 'pills',
                'options' => $modify_settings_instance_arr,
                'default' => 1,
                //'force' => 1,
                'description' => 'Choose the settings instance you would like to modify. This is the free version of our <a href="https://www.heartyplugins.com/wordpress-plugins/premium-plugins/product/hearty-effects" target="_blank">Hearty Effects</a> plugin, so compared to the full version, it has limited features and settings. This plugin has 1 settings instance, 6 content items, simple widgets and shortcodes, so for <b>multiple settings instances</b>, <b>unlimited content items</b> and <b>flexible widgets</b>, <a href="https://www.heartyplugins.com/wordpress-plugins/premium-plugins/product/hearty-effects" target="_blank">check out the full version</a>.',
            )
        );

        for ($i = 1; $i <= $number_of_settings_instances; $i++) {

			//------------- SCRIPT INSERT

            add_settings_field(
                'layout_effect_'.$i,
                'Layout Effect <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyeffectslight-setting-admin',
                'heartyeffectslight_basic_section',
                array(
                    'id' => 'layout_effect_'.$i,
                    'type' => 'select',
                    'class' => 'hearty-sep',
                    'default' => 'layout-effect1',
                    'options' => array('layout-effect-none' => 'None','layout-effect1' => 'Effect1','layout-effect2' => 'Effect2','layout-effect3' => 'Effect3','layout-effect4' => 'Effect4','layout-effect5' => 'Effect5','layout-effect6' => 'Effect6','layout-effect7' => 'Effect7','layout-effect8' => 'Effect8',),
                    'description' => 'Choose a CSS3 effect for the layout on page scroll and load. Note that the CSS3 features are not supported by older browsers.',
                )
            );

            add_settings_field(
                'icon_width_'.$i,
                'Icon Width <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyeffectslight-setting-admin',
                'heartyeffectslight_basic_section',
                array(
                    'id' => 'icon_width_'.$i,
                    'type' => 'text',
                    'class' => '',
                    'default' => '96%',
                    'description' => 'Insert the width for the icon using pixels or percent (for example: 140px or 80%, not 140). A blank field reverts the setting to the default value.',
                )
            );

            add_settings_field(
                'icon_border_radius_'.$i,
                'Icon Border Radius <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyeffectslight-setting-admin',
                'heartyeffectslight_basic_section',
                array(
                    'id' => 'icon_border_radius_'.$i,
                    'type' => 'text',
                    'class' => '',
                    'default' => '50%',
                    'description' => 'Insert the border-radius for the background of the icon using pixels or percent (for example: 140px or 80%, not 140). Note that the CSS3 features are not supported by older browsers. A blank field reverts the setting to the default value.',
                )
            );

            add_settings_field(
                'icon_border_type_'.$i,
                'Icon Border Type <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyeffectslight-setting-admin',
                'heartyeffectslight_basic_section',
                array(
                    'id' => 'icon_border_type_'.$i,
                    'type' => 'select',
                    'default' => 'solid',
                    'options' => array('solid' => 'Solid','dashed' => 'Dashed','dotted' => 'Dotted',),
                    'description' => 'Choose the border type of the background of the icon.',
                )
            );

            add_settings_field(
                'icon_border_width_'.$i,
                'Icon Border Width <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyeffectslight-setting-admin',
                'heartyeffectslight_basic_section',
                array(
                    'id' => 'icon_border_width_'.$i,
                    'type' => 'text',
                    'class' => 'hearty-sep',
                    'default' => '2px',
                    'description' => 'Insert the border width for the background of the icon using pixels (for example: 1px, not 1). A blank field reverts the setting to the default value.',
                )
            );

            add_settings_field(
                'title_google_font_'.$i,
                'Title Google Web Font <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyeffectslight-setting-admin',
                'heartyeffectslight_basic_section',
                array(
                    'id' => 'title_google_font_'.$i,
                    'type' => 'text',
                    'class' => '',
                    'default' => 'Open Sans',
                    'description' => 'Insert the name of the Google Font for the title of the module, for example Open Sans or Roboto. A blank field reverts the setting to the default value.',
                )
            );

            add_settings_field(
                'title_font_weight_'.$i,
                'Title Font Weight <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyeffectslight-setting-admin',
                'heartyeffectslight_basic_section',
                array(
                    'id' => 'title_font_weight_'.$i,
                    'type' => 'select',
                    'default' => '400',
                    'options' => array('300' => 'Light','400' => 'Regular','500' => 'Medium','600' => 'Semibold','700' => 'Bold',),
                    'description' => 'Set the font weight for the title of the module.',
                )
            );

            add_settings_field(
                'title_font_style_'.$i,
                'Title Font Style <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyeffectslight-setting-admin',
                'heartyeffectslight_basic_section',
                array(
                    'id' => 'title_font_style_'.$i,
                    'type' => 'select',
                    'default' => 'normal',
                    'options' => array('normal' => 'Normal','italic' => 'Italic',),
                    'description' => 'Set the font style for the title of the module.',
                )
            );

            add_settings_field(
                'title_font_size_'.$i,
                'Title Font Size <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyeffectslight-setting-admin',
                'heartyeffectslight_basic_section',
                array(
                    'id' => 'title_font_size_'.$i,
                    'type' => 'text',
                    'class' => '',
                    'default' => '16px',
                    'description' => 'Insert the font size for the title of the module using pixels, percent or em (for example: 14px, 120% or 1.2em, not 14). A blank field reverts the setting to the default value.',
                )
            );

			for ($j = 1; $j <= $number_of_content_items; $j++) {

            add_settings_field(
                'show_icon'.$j.'_'.$i,
                'Show Icon '.$j.' <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyeffectslight-setting-admin',
                'heartyeffectslight_content_options_section_'.$j,
                array(
                    'id' => 'show_icon'.$j.'_'.$i,
                    'type' => 'select',
                    'class' => 'hearty-sep',
                    'default' => '1',
                    'options' => array('1' => 'Yes','0' => 'No',),
                    'description' => 'Choose if the icon for this module should be displayed or not.',
                )
            );

            add_settings_field(
                'icon_effect'.$j.'_'.$i,
                'Icon '.$j.' Effect <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyeffectslight-setting-admin',
                'heartyeffectslight_content_options_section_'.$j,
                array(
                    'id' => 'icon_effect'.$j.'_'.$i,
                    'type' => 'select',
                    'default' => 'effect1',
                    'options' => array('effect1' => 'Effect1','effect2' => 'Effect2','effect3' => 'Effect3','effect4' => 'Effect4','effect5' => 'Effect5','effect6' => 'Effect6','effect7' => 'Effect7','effect8' => 'Effect8',),
                    'description' => 'Choose a CSS3 effect for the icon. Note that the CSS3 features are not supported by older browsers.',
                )
            );

            add_settings_field(
                'icon_name'.$j.'_'.$i,
                'Icon '.$j.' Name <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyeffectslight-setting-admin',
                'heartyeffectslight_content_options_section_'.$j,
                array(
                    'id' => 'icon_name'.$j.'_'.$i,
                    'type' => 'text',
                    'class' => '',
                    'default' => 'fas fa-magic',
                    'description' => 'Insert the Font Awesome icon name (for example: fas fa-magic or fab fa-wordpress). A blank field reverts the setting to the default value.',
                )
            );

            add_settings_field(
                'icon_color'.$j.'_'.$i,
                'Icon '.$j.' Color <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyeffectslight-setting-admin',
                'heartyeffectslight_content_options_section_'.$j,
                array(
                    'id' => 'icon_color'.$j.'_'.$i,
                    'type' => 'text',
                    'class' => 'hearty-colorpicker',
                    'default' => '#FFFFFF',
                    'description' => 'Choose the color for the icon. A blank field reverts the setting to the default value.',
                )
            );

            add_settings_field(
                'icon_bg_color'.$j.'_'.$i,
                'Icon '.$j.' Background Color <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyeffectslight-setting-admin',
                'heartyeffectslight_content_options_section_'.$j,
                array(
                    'id' => 'icon_bg_color'.$j.'_'.$i,
                    'type' => 'text',
                    'class' => 'hearty-colorpicker',
                    'default' => '#7E57C2',
                    'description' => 'Choose the color for the background of the icon. A blank field reverts the setting to the default value.',
                )
            );

            add_settings_field(
                'icon_border_color'.$j.'_'.$i,
                'Icon '.$j.' Border Color <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyeffectslight-setting-admin',
                'heartyeffectslight_content_options_section_'.$j,
                array(
                    'id' => 'icon_border_color'.$j.'_'.$i,
                    'type' => 'text',
                    'class' => 'hearty-colorpicker',
                    'default' => '#B39DDB',
                    'description' => 'Choose the color for the border of the background of the icon. A blank field reverts the setting to the default value.',
                )
            );

            add_settings_field(
                'icon_link'.$j.'_'.$i,
                'Icon '.$j.' Link <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyeffectslight-setting-admin',
                'heartyeffectslight_content_options_section_'.$j,
                array(
                    'id' => 'icon_link'.$j.'_'.$i,
                    'type' => 'text',
                    'class' => '',
                    'default' => '',
                    'description' => 'Insert the URL for the icon. Note that the link must include http:// or https://. A blank field reverts the setting to the default value.',
                )
            );

            add_settings_field(
                'icon_link_target'.$j.'_'.$i,
                'Icon '.$j.' Target <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyeffectslight-setting-admin',
                'heartyeffectslight_content_options_section_'.$j,
                array(
                    'id' => 'icon_link_target'.$j.'_'.$i,
                    'type' => 'select',
                    'default' => 'blank',
                    'options' => array('self' => 'self','blank' => 'blank','parent' => 'parent','top' => 'top',),
                    'description' => 'Choose the link target of the URL for the icon.',
                )
            );

            add_settings_field(
                'icon_font_size'.$j.'_'.$i,
                'Icon '.$j.' Font Size <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyeffectslight-setting-admin',
                'heartyeffectslight_content_options_section_'.$j,
                array(
                    'id' => 'icon_font_size'.$j.'_'.$i,
                    'type' => 'text',
                    'class' => 'hearty-sep',
                    'default' => '3em',
                    'description' => 'Insert the font size for the icon using pixels, percent or em (for example: 14px, 120% or 1.2em, not 14). A blank field reverts the setting to the default value.',
                )
            );

            add_settings_field(
                'title_text'.$j.'_'.$i,
                'Title '.$j.' Text <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyeffectslight-setting-admin',
                'heartyeffectslight_content_options_section_'.$j,
                array(
                    'id' => 'title_text'.$j.'_'.$i,
                    'type' => 'text',
                    'class' => '',
                    'default' => 'Title Text',
                    'description' => 'Insert the text for the title of the module. A blank field reverts the setting to the default value.',
                )
            );

            add_settings_field(
                'title_color'.$j.'_'.$i,
                'Title '.$j.' Color <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyeffectslight-setting-admin',
                'heartyeffectslight_content_options_section_'.$j,
                array(
                    'id' => 'title_color'.$j.'_'.$i,
                    'type' => 'text',
                    'class' => 'hearty-colorpicker',
                    'default' => '#444444',
                    'description' => 'Choose the color for the title of the module. A blank field reverts the setting to the default value.',
                )
            );

			}

            //------------- END SCRIPT INSERT

        }

	}

}
