<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;

/**
 * Elementor About Widget.
 * @since 1.0.0
 */
class Elementor_About_Widget extends Widget_Base
{

    /**
     * Get widget name.
     *
     * Retrieve About Widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     */
    public function get_name()
    {
        return 'About';
    }

    /**
     * Get widget title.
     *
     * Retrieve About Widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     */
    public function get_title()
    {
        return esc_html__('About', 'elementor-addon-halim');
    }

    /**
     * Get widget icon.
     *
     * Retrieve About Widget icon.
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
     * Retrieve the list of categories the About Widget belongs to.
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
     * Retrieve the list of keywords the About Widget belongs to.
     *
     * @return array Widget keywords.
     * @since 1.0.0
     * @access public
     */
    public function get_keywords()
    {
        return ['about', 'info', 'company'];
    }

    /**
     * Register About Widget controls.
     *
     * Add input fields to allow the user to customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'elementor-addon-halim'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'heading',
            [
                'label' => esc_html__('Heading', 'elementor-addon-halim'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('ABOUT US', 'elementor-addon-halim'),
                'description' => esc_html__('Add heading text', 'elementor-addon-halim'),
                'placeholder' => esc_html__('Add heading text here', 'elementor-addon-halim'),
            ]
        );

        $this->add_control(
            'subheading',
            [
                'label' => esc_html__('who we are?', 'elementor-addon-halim'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('who we are?', 'elementor-addon-halim'),
                'description' => esc_html__('Add sub heading text here', 'elementor-addon-halim'),
                'placeholder' => esc_html__('Add sub heading text here', 'elementor-addon-halim'),
            ]
        );

        $this->add_control(
            'desc',
            [
                'label' => esc_html__('Description', 'elementor-addon-halim'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting industry.d', 'elementor-addon-halim'),
                'description' => esc_html__('Add description text here', 'elementor-addon-halim'),
                'placeholder' => esc_html__('Add description text here', 'elementor-addon-halim'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Style', 'elementor-addon-halim'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Heading Style
        $this->add_control(
            'heading_style',
            [
                'label' => esc_html__('Heading', 'elementor-addon-halim'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'heading_typography',
                'selector' => '{{WRAPPER}} .section-title h3',
            ]
        );

        $this->add_control(
            'heading_color',
            [
                'label' => esc_html__('Color', 'elementor-addon-halim'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h3' => 'color: {{VALUE}}',
                ],
                'default' => '#333'
            ]
        );

        //Subheading Style
        $this->add_control(
            'subheading_style',
            [
                'label' => esc_html__('Sub Heading', 'elementor-addon-halim'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subheading_typography',
                'selector' => '{{WRAPPER}} .section-title h3 span',
            ]
        );

        $this->add_control(
            'subheading_color',
            [
                'label' => esc_html__('Color', 'elementor-addon-halim'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h3 span' => 'color: {{VALUE}}',
                ],
                'default' => '#333'
            ]
        );

        //Description Style
        $this->add_control(
            'desc_style',
            [
                'label' => esc_html__('Description', 'elementor-addon-halim'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'section_desc_typography',
                'selector' => '{{WRAPPER}} .section-title p',
            ]
        );

        $this->add_control(
            'section_desc_color',
            [
                'label' => esc_html__('Color', 'elementor-addon-halim'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title p' => 'color: {{VALUE}}',
                ],
                'default' => '#333'
            ]
        );

        //Border Style
        $this->add_control(
            'border_style',
            [
                'label' => esc_html__('Border', 'elementor-addon-halim'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'section_border_color',
            [
                'label' => esc_html__('Border Color', 'elementor-addon-halim'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title::before, .section-title::after' => 'background-color: {{VALUE}}',
                ],
                'default' => '#635cdb'
            ]
        );

        $this->end_controls_section();

    }

    /**
     * Render About Widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {

        $settings = $this->get_settings_for_display();

        ?>
        <!-- About Area Start -->
        <section class="about-area pt-100 pb-100" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="about">
                            <div class="page-title">
                                <h4>welcome to halim</h4>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting
                                industry </p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda distinctio maxime
                                laborum delectus aliquam ipsum itaque voluptatem non reiciendis aliquid totam facere,
                                tempora iure iusto adipisci doloremque in, amet, alias nostrum. Explicabo
                                reprehenderit.</p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting
                                industry </p>
                            <a href="#" class="box-btn">read more <i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="single_about">
                            <i class="fa fa-laptop"></i>
                            <h4>our mission</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting
                                industry </p>
                        </div>
                        <div class="single_about">
                            <i class="fa fa-user"></i>
                            <h4>our vission</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting
                                industry </p>
                        </div>
                        <div class="single_about">
                            <i class="fa fa-pencil"></i>
                            <h4>our history</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting
                                industry </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Area End -->
        <?php

    }

}