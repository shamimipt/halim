<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Widget_Base;

/**
 * Elementor services Widget.
 * @since 1.0.0
 */
class Elementor_services_Widget extends Widget_Base
{

    /**
     * Get widget name.
     *
     * Retrieve services widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     */
    public function get_name()
    {
        return 'Services';
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
        return esc_html__('Services', 'elementor-addon-halim');
    }

    /**
     * Get widget icon.
     *
     * Retrieve services widget icon.
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
     * Retrieve the list of categories the services widget belongs to.
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
     * Retrieve the list of keywords the services widget belongs to.
     *
     * @return array Widget keywords.
     * @since 1.0.0
     * @access public
     */
    public function get_keywords()
    {
        return ['services'];
    }

    /**
     * Register services widget controls.
     *
     * Add input fields to allow the user to customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {

        // Service Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('content', 'elementor-addon-halim'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        // Services Column
        $this->add_control(
            'services_column',
            [
                'label' => esc_html__('Select Column', 'elementor-addon-halim'),
                'type' => Controls_Manager::SELECT,
                'default' => 'columnThree',
                'options' => [
                    'columnFour' => esc_html__('Column 4', 'elementor-addon-halim'),
                    'columnThree' => esc_html__('Column 3', 'elementor-addon-halim'),
                    'columnTwo' => esc_html__('Column 2', 'elementor-addon-halim'),
                ],
            ]
        );

        // Service Repeater start
        $repeater = new Repeater();

        $repeater->add_control(
            'service_media_type',
            [
                'label' => esc_html__('Select Media Type', 'elementor-addon-halim'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'service_icon' => [
                        'title' => esc_html__('Icon', 'elementor-addon-halim'),
                        'icon' => 'eicon-menu-bar',
                    ],

                    'service_image' => [
                        'title' => esc_html__('Image', 'elementor-addon-halim'),
                        'icon' => 'eicon-featured-image',
                    ],

                    'service_number' => [
                        'title' => esc_html__('Number', 'elementor-addon-halim'),
                        'icon' => 'eicon-number-field'
                    ]
                ],
                'default' => 'service_icon',
                'toggle' => true,
            ]
        );

        $repeater->add_control(
            'service_icon',
            [
                'label' => esc_html__('Icon', 'elementor-addon-halim'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa fa-star',
                    'library' => 'solid',
                ],
                'condition' => [
                    'service_media_type' => 'service_icon'
                ]
            ]
        );

        $repeater->add_control(
            'service_image',
            [
                'label' => esc_html__('Image', 'elementor-addon-halim'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'service_media_type' => 'service_image'
                ]
            ]
        );

        $repeater->add_control(
            'service_number',
            [
                'label' => esc_html__('Number', 'elementor-addon-halim'),
                'type' => Controls_Manager::NUMBER,
                'default' => 1,
                'condition' => [
                    'service_media_type' => 'service_number'
                ]
            ]
        );

        $repeater->add_control(
            'service_title',
            [
                'label' => esc_html__('Service Title', 'elementor-addon-halim'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Web design', 'elementor-addon-halim'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'service_desc',
            [
                'label' => esc_html__('Description', 'elementor-addon-halim'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Lorem Ipsum Dollar Site', 'elementor-addon-halim'),
            ]
        );

        $this->add_control(
            'service_lists',
            [
                'label' => esc_html__('Service List', 'elementor-addon-halim'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    'service_title' => esc_html__('Web Design', 'elementor-addon-halim'),
                    'service_desc' => esc_html__('Lorem Ipsum Doller Site', 'elementor-addon-halim'),
                ],
                'title_field' => '{{{ service_title }}}',
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
        $service_column_class = $settings['services_column'];
        $service_list = $settings['service_lists'];

        if ($service_column_class == 'columnTwo') {
            $service_column_class = 'col-lg-6';
        } elseif ($service_column_class == 'columnFour') {
            $service_column_class = 'col-lg-3';
        } else {
            $service_column_class = 'col-lg-4';
        }

        ?>
        <!-- Services Area Start -->
        <div class="row">
            <?php foreach ($service_list as $service) : ?>
                <div class="<?php echo $service_column_class ?>">
                    <!-- Single Service -->
                    <div class="single-service">
                        <i class="<?php echo $service['service_icon']['value']; ?>"></i>
                        <h4><?php echo $service['service_title']; ?> </h4>
                        <p><?php echo $service['service_desc']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Services Area End -->
        <?php

    }

}