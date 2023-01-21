<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Widget_Base;

/**
 * Elementor faq_skill Widget.
 * @since 1.0.0
 */
class Elementor_faq_skill_Widget extends Widget_Base
{

    /**
     * Get widget name.
     *
     * Retrieve faq_skill widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     */
    public function get_name()
    {
        return 'Faq and Skill';
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
        return esc_html__('Faq and Skill', 'elementor-addon-halim');
    }

    /**
     * Get widget icon.
     *
     * Retrieve faq_skill widget icon.
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
     * Retrieve the list of categories the faq_skill widget belongs to.
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
     * Retrieve the list of keywords the faq_skill widget belongs to.
     *
     * @return array Widget keywords.
     * @since 1.0.0
     * @access public
     */
    public function get_keywords()
    {
        return ['skill', 'faq', 'title'];
    }

    /**
     * Register faq_skill widget controls.
     *
     * Add input fields to allow the user to customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {

        // FAQ Section
        $this->start_controls_section(
            'faq_section',
            [
                'label' => esc_html__('FAQ Section', 'elementor-addon-halim'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'heading_faq',
            [
                'label' => esc_html__('Heading', 'elementor-addon-halim'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('FAQ', 'elementor-addon-halim')
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'list_title',
            [
                'label' => esc_html__('Title', 'elementor-addon-halim'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Lorem Ipsum is simply', 'elementor-addon-halim'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'list_content',
            [
                'label' => esc_html__('Content', 'elementor-addon-halim'),
                'type' => Controls_Manager::WYSIWYG,
                'default' => esc_html__('List Content', 'elementor-addon-halim'),
                'show_label' => false,
            ]
        );

        $this->add_control(
            'list',
            [
                'label' => esc_html__('Accordion List', 'elementor-addon-halim'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => esc_html__('Lorem Ipsum is simply', 'elementor-addon-halim'),
                        'list_content' => esc_html__(' Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.', 'elementor-addon-halim'),
                    ],
                    [
                        'list_title' => esc_html__('Lorem Ipsum is simply', 'elementor-addon-halim'),
                        'list_content' => esc_html__(' Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.', 'elementor-addon-halim'),
                    ],
                ],
                'title_field' => '{{{ list_title }}}',
            ]
        );

        $this->end_controls_section();

        // faq_skill Style
        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Style', 'elementor-addon-halim'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

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

        $this->end_controls_section();

        // Skill Section
        $this->start_controls_section(
            'skill_section',
            [
                'label' => esc_html__('Skill Section', 'elementor-addon-halim'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'heading_skill',
            [
                'label' => esc_html__('Heading', 'elementor-addon-halim'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Our Skills', 'elementor-addon-halim')
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'skill_title',
            [
                'label' => esc_html__('Skill Title', 'elementor-addon-halim'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('HTML5', 'elementor-addon-halim'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'skill_percent',
            [
                'label' => esc_html__('Skill Percent', 'elementor-addon-halim'),
                'type' => Controls_Manager::NUMBER,
                'default' => 80,
            ]
        );

        $this->add_control(
            'skill_list',
            [
                'label' => esc_html__('Skills', 'elementor-addon-halim'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'skill_title' => esc_html__('HTML5', 'elementor-addon-halim'),
                        'skill_percent' => 80,
                    ]
                ],
                'title_field' => '{{{ skill_title }}}',
            ]
        );

        $this->end_controls_section();

    }

    /**
     * Render faq_skill widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $heading = $settings['heading_faq'];
        $reapeter_list = $settings['list'];

        $heading_skill = $settings['heading_skill'];
        $skill_list = $settings['skill_list'];

        ?>
        <!-- Choose Area End -->
        <div class="row pt-100 pb-100">
            <div class="col-md-6">
                <div class="faq">
                    <div class="page-title">
                        <h4><?php echo $heading; ?></h4>
                    </div>
                    <div class="accordion" id="accordionExample">
                        <?php
                        $i = 0;
                        foreach ($reapeter_list as $list) {
                            $i++;
                            ?>
                            <div class="card">
                                <div class="card-header" id="heading-<?php echo $i; ?>">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                                data-target="#collapse-<?php echo $i; ?>" aria-expanded="true"
                                                aria-controls="collapseOne">
                                            <?php echo $list['list_title']; ?>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse-<?php echo $i; ?>" class="collapse <?php if ($i == 1) {
                                    echo "show";
                                } ?>" aria-labelledby="heading-<?php echo $i; ?>" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <?php echo $list['list_content']; ?>
                                    </div>
                                </div>
                            </div>
                            <?php ;
                        } ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="skills">
                    <div class="page-title">
                        <h4><?php echo $heading_skill; ?></h4>
                    </div>
                    <?php foreach ($skill_list as $skill) { ?>
                        <div class="single-skill">
                            <h4><?php echo $skill['skill_title'] ?></h4>
                            <div class="progress-bar" role="progressbar"
                                 style="width: <?php echo $skill['skill_percent']; ?>%;" aria-valuenow="25"
                                 aria-valuemin="0" aria-valuemax="100"><?php echo $skill['skill_percent']; ?>%
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- Choose Area End -->
        <?php

    }

}