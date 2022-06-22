<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor faq_skill Widget.
 * @since 1.0.0
 */
class Elementor_faq_skill_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve faq_skill widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Faq and Skill';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve heading widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Faq and Skill', 'elementor-oembed-widget' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve faq_skill widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-heading';
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return '  ';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the faq_skill widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'halim_theme' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the faq_skill widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'heading', 'head', 'title' ];
	}

	/**
	 * Register faq_skill widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'elementor-addon-halim' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'heading',
			[
				'label' => esc_html__( 'Heading', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'FAQ', 'elementor-addon-halim' )
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_title', [
				'label' => esc_html__( 'Title', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Lorem Ipsum is simply' , 'elementor-addon-halim' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_content', [
				'label' => esc_html__( 'Content', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'List Content' , 'elementor-addon-halim' ),
				'show_label' => false,
			]
		);

		$this->add_control(
			'list',
			[
				'label' => esc_html__( 'Accordion List', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => esc_html__( 'Lorem Ipsum is simply', 'elementor-addon-halim' ),
						'list_content' => esc_html__( ' Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.', 'elementor-addon-halim' ),
					],
					[
						'list_title' => esc_html__( 'Lorem Ipsum is simply', 'elementor-addon-halim' ),
						'list_content' => esc_html__( ' Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.', 'elementor-addon-halim' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

		$this->end_controls_section();

        $this->start_controls_section(
                'style_section',
                [
                    'label' => esc_html__( 'Style', 'elementor-addon-halim' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
        );

        // faq_skill Style
		$this->add_control(
			'heading_style',
			[
				'label' => esc_html__( 'Heading', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'selector' => '{{WRAPPER}} .section-title h3',
			]
		);

		$this->add_control(
			'heading_color',
			[
				'label' => esc_html__( 'Color', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::COLOR,
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
				'label' => esc_html__( 'Description', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'section_desc_typography',
				'selector' => '{{WRAPPER}} .section-title p',
			]
		);

		$this->add_control(
			'section_desc_color',
			[
				'label' => esc_html__( 'Color', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title p' => 'color: {{VALUE}}',
				],
				'default' => '#333'
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
	protected function render() {

		$settings = $this->get_settings_for_display();
        $heading = $settings['heading'];
		$reapeter_list = $settings['list'];

		?>
      <!-- Choose Area End -->
            <div class="row pt-100 pb-100">
               <div class="col-md-6">
                  <div class="faq">
                     <div class="page-title">
                        <h4><?php echo $heading; ?></h4>
                     </div>
                     <div class="accordion" id="accordionExample">
						 <?php foreach($reapeter_list as $list){?>
                        <div class="card">
                           <div class="card-header" id="headingOne">
                              <h5 class="mb-0">
                                 <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                 <?php echo $list['list_title']; ?> 
                                 </button>
                              </h5>
                           </div>
                           <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                              <div class="card-body">
                                 <?php echo $list['list_content'];?>
                              </div>
                           </div>
                        </div>
                        <?php }?>
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="skills">
                     <div class="page-title">
                        <h4>our skills</h4>
                     </div>
                     <div class="single-skill">
                        <h4>html</h4>
                        <div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">90%</div>
                     </div>
                     <div class="single-skill">
                        <h4>css</h4>
                        <div class="progress-bar" role="progressbar" style="width: 74%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">74%</div>
                     </div>
                     <div class="single-skill">
                        <h4>photoshop</h4>
                        <div class="progress-bar" role="progressbar" style="width: 94%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">94%</div>
                     </div>
                     <div class="single-skill">
                        <h4>wordpress</h4>
                        <div class="progress-bar" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
                     </div>
                  </div>
               </div>
            </div>
      <!-- Choose Area End -->
	<?php

	}

}