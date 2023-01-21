<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Widget_Base;

/**
 * Elementor Counter Widget.
 * @since 1.0.0
 */
class Elementor_counter_Widget extends Widget_Base
{

    /**
     * Get widget name.
     *
     * Retrieve Counter widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     */
    public function get_name()
    {
        return 'Counter';
    }

    /**
     * Get widget title.
     *
     * Retrieve heading widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     */
    public function get_title()
    {
        return esc_html__('Counter', 'elementor-addon-halim');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Counter widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     */
    public function get_icon()
    {
        return 'eicon-heading';
    }

    /**
     * Get custom help URL.
     *
     * Retrieve a URL where the user can get more information about the widget.
     *
     * @return string Widget help URL.
     * @since 1.0.0
     * @access public
     */
    public function get_custom_help_url()
    {
        return '  ';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the counter widget belongs to.
     *
     * @return array Widget categories.
     * @since 1.0.0
     * @access public
     */
    public function get_categories()
    {
        return ['halim_theme'];
    }

    /**
     * Get widget keywords.
     *
     * Retrieve the list of keywords the counter widget belongs to.
     *
     * @return array Widget keywords.
     * @since 1.0.0
     * @access public
     */
    public function get_keywords()
    {
        return ['counter'];
    }

    /**
     * Register counter widget controls.
     *
     * Add input fields to allow the user to customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {

        // Counter Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('content', 'elementor-addon-halim'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        // Counter Column
        $this->add_control(
            'counter_column',
            [
                'label' => esc_html__('Select Column', 'elementor-addon-halim'),
                'type' => Controls_Manager::SELECT,
                'default' => 'columnFour',
                'options' => [
                    'columnFour' => esc_html__('Column 4', 'elementor-addon-halim'),
                    'columnThree' => esc_html__('Column 3', 'elementor-addon-halim'),
                    'columnTwo' => esc_html__('Column 2', 'elementor-addon-halim'),
                ],
            ]
        );

        // Counter Repeater start
        $repeater = new Repeater();

        $repeater->add_control(
            'counter_icon',
            [
                'label' => esc_html__('Icon', 'elementor-addon-halim'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa fa-star',
                    'library' => 'solid',
                ]
            ]
        );


        $repeater->add_control(
            'counter_number',
            [
                'label' => esc_html__('Counter Number', 'elementor-addon-halim'),
                'type' => Controls_Manager::NUMBER,
                'default' => esc_html__('Number', 'elementor-addon-halim'),
                'show_label' => true,
            ]
        );

        $repeater->add_control(
            'counter_title',
            [
                'label' => esc_html__('Counter Title', 'elementor-addon-halim'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Lorem Ipsum Dollar Site', 'elementor-addon-halim'),
            ]
        );

        $this->add_control(
            'counter_lists',
            [
                'label' => esc_html__('Counter List', 'elementor-addon-halim'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    'counter_number' => esc_html__('1', 'elementor-addon-halim'),
                    'counter_title' => esc_html__('Clients', 'elementor-addon-halim'),
                ],
                'title_field' => '{{{ counter_title }}}',
            ]
        );

        $this->end_controls_section();

    }

    /**
     * Render services widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $service_column_class = $settings['counter_column'];
        $service_list = $settings['counter_lists'];

        if ($service_column_class == 'columnTwo') {
            $service_column_class = 'col-lg-6';
        } elseif ($service_column_class == 'columnFour') {
            $service_column_class = 'col-lg-3';
        } else {
            $service_column_class = 'col-lg-4';
        }

        ?>

        <!-- Counter Area End -->
        <div class="row no-space">
            <?php
            foreach ($service_list as $list) :
                ?>

                <div class="<?php echo $service_column_class; ?>">
                    <div class="single-counter">
                        <h4><i class="<?php echo $list['counter_icon']['value']; ?>"></i><span class="counter"><?php echo $list['counter_number']; ?></span><span><?php echo $list['counter_title']; ?></span>
                        </h4>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
        <!-- Counter Area End -->

        <?php

    }

}