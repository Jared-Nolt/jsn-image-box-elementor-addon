<?php
class Elementor_Jsn_Image_Box extends \Elementor\Widget_Base {

	public function get_name(): string {
		return 'jsn-image-box';
	}

	public function get_title(): string {
		return esc_html__( 'JSN Image Box', 'jsn-image-box-elementor-addon' );
	}

	public function get_icon(): string {
		return 'eicon-image-box';
	}

	public function get_categories(): array {
		return [ 'basic' ];
	}

    public function get_keywords() {
		return [ 'image', 'photo', 'visual', 'box' ];
	}

	protected function register_controls(): void {

		// Content Tab Start
    $this->start_controls_section(
        'section_title',
        [
            'label' => esc_html__( 'JSN Image Box', 'elementor-addon' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );
        /*Title*/
		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '', 'elementor-addon' ),
			]
		);
        /*END Title*/
        /*Link*/
        $this->add_control(
			'link',
			[
				'label' => esc_html__( 'Link', 'elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'separator' => 'before',
			]
		);
        /*END link*/
        /*Image*/
        $this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
				'default' => 'medium_large',
				'condition' => [
					'image[url]!' => '',
				],
			]
		);
        /*END image*/
        /*Wysiwyg*/
        $this->add_control(
			'description_text',
			[
				'label' => esc_html__( 'Description', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'elementor-addon' ),
				'placeholder' => esc_html__( 'Enter your description', 'elementor-addon' ),
				'rows' => 3,
			]
		);
        /*END Wysiwyg*/
    $this->end_controls_section();

		// Content Tab End


		// Style Tab Start
        $this->start_controls_section(
            'section_box_style',
            [
                'label' => esc_html__( 'Box styling', 'elementor-addon' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'caption_background_color',
                [
                    'label' => esc_html__( 'Background Color', 'elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .elementor-image-box-wrapper' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'box_width',
                [
                    'label' => esc_html__( 'Box Width', 'elementor' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'default' => [
                        'unit' => '%',
                    ],
                    'tablet_default' => [
                        'unit' => '%',
                    ],
                    'mobile_default' => [
                        'unit' => '%',
                    ],
                    'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                    'range' => [
                        '%' => [
                            'min' => 1,
                            'max' => 100,
                        ],
                        'px' => [
                            'min' => 1,
                            'max' => 1000,
                        ],
                        'vw' => [
                            'min' => 1,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .elementor-image-box-wrapper' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'box_position',
                [
                    'label' => esc_html__( 'Box position', 'elementor-addon' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        'absolute' => 'Absolute',
                        'relative' => 'Relative',
                    ],
                    'default' => 'Relative',
                    'selectors' => [
                        '{{WRAPPER}} .elementor-image-box-wrapper' => 'position: {{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'box_border',
                    'selector' => '{{WRAPPER}} .elementor-image-box-wrapper',
                    'separator' => 'before',
                ]
            );
            $this->add_responsive_control(
                'box_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'elementor' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'separator' => 'after',
                    'selectors' => [
                        '{{WRAPPER}} .elementor-image-box-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
    $this->end_controls_section();

    $this->start_controls_section(
        'section_title_style',
        [
            'label' => esc_html__( 'Title styling', 'elementor-addon' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );
            $this->add_control(
                'title_color',
                [
                    'label' => esc_html__( 'Text Color', 'elementor-addon' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .elementor-image-box-title' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'title_size',
                [
                    'label' => esc_html__( 'Title HTML Tag', 'elementor-addon' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        'h1' => 'H1',
                        'h2' => 'H2',
                        'h3' => 'H3',
                        'h4' => 'H4',
                        'h5' => 'H5',
                        'h6' => 'H6',
                        'div' => 'div',
                        'span' => 'span',
                        'p' => 'p',
                    ],
                    'default' => 'h3',
                ]
            );
            $this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'selector' => '{{WRAPPER}} .elementor-image-box-title',
					'global' => [
						'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
					],
				]
			);
			$this->add_responsive_control(
                'title_margin_space',
                [
                    'label' => esc_html__( 'Title Margin', 'elementor' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'separator' => 'after',
                    'selectors' => [
                        '{{WRAPPER}} .elementor-image-box-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'title_box_width',
                [
                    'label' => esc_html__( 'Title width', 'elementor' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'default' => [
                        'unit' => '%',
                    ],
                    'tablet_default' => [
                        'unit' => '%',
                    ],
                    'mobile_default' => [
                        'unit' => '%',
                    ],
                    'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                    'range' => [
                        '%' => [
                            'min' => 1,
                            'max' => 100,
                        ],
                        'px' => [
                            'min' => 1,
                            'max' => 1000,
                        ],
                        'vw' => [
                            'min' => 1,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .elementor-image-box-title' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
	        $this->add_responsive_control(
				'title_padding_space',
				[
					'label' => esc_html__( 'Title padding', 'elementor' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', 'em', 'rem', 'custom' ],
					'range' => [
						'px' => [
							'max' => 100,
						],
						'em' => [
							'min' => 0,
							'max' => 10,
						],
						'rem' => [
							'min' => 0,
							'max' => 10,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .elementor-image-box-title' => 'padding: {{SIZE}}{{UNIT}};',
					],
				]
			);
            $this->add_control(
                'title_overlay',
                [
                    'label' => esc_html__( 'Title over image', 'elementor-addon' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        'absolute' => 'Yes',
                        'relative' => 'No',
                    ],
                    'default' => 'no',
                    'selectors' => [
                        '{{WRAPPER}} .elementor-image-box-title' => 'position: {{UNIT}};',
                    ],
                ]
            );
            
            $this->add_responsive_control(
		        'text_align_title',
		        [
		            'label' => esc_html__( 'Alignment', 'elementor' ),
		            'type' => \Elementor\Controls_Manager::CHOOSE,
		            'options' => [
		                'left' => [
		                    'title' => esc_html__( 'Left', 'elementor' ),
		                    'icon' => 'eicon-text-align-left',
		                ],
		                'center' => [
		                    'title' => esc_html__( 'Center', 'elementor' ),
		                    'icon' => 'eicon-text-align-center',
		                ],
		                'right' => [
		                    'title' => esc_html__( 'Right', 'elementor' ),
		                    'icon' => 'eicon-text-align-right',
		                ],
		                'justify' => [
		                    'title' => esc_html__( 'Justified', 'elementor' ),
		                    'icon' => 'eicon-text-align-justify',
		                ],
		            ],
		            'selectors' => [
		                '{{WRAPPER}} .elementor-image-box-title' => 'text-align: {{VALUE}};',
		            ],
		            'separator' => 'after',
		        ]
			);
			$this->add_responsive_control(		        
		        'text_position_title',
                [
                    'label' => esc_html__( 'Title link position', 'elementor-addon' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        'block' => 'Block',
                        'inline-block' => 'Inline block',
                    ],
                    'default' => 'no',
                    'selectors' => [
                        '{{WRAPPER}} .elementor-image-box-title a' => 'display: {{UNIT}};',
                    ],
                ]
			);
			
			$this->add_control(
                'title_link_color',
                [
                    'label' => esc_html__( 'Title link Color', 'elementor-addon' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .elementor-image-box-title a' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'title_link_typography',
					'selector' => '{{WRAPPER}} .elementor-image-box-title a',
					'global' => [
						'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
					],
				]
			);
			$this->add_responsive_control(
				'title_link_padding_space',
				[
					'label' => esc_html__( 'Title link padding', 'elementor' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', 'em', 'rem', 'custom' ],
					'range' => [
						'px' => [
							'max' => 100,
						],
						'em' => [
							'min' => 0,
							'max' => 10,
						],
						'rem' => [
							'min' => 0,
							'max' => 10,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .elementor-image-box-title a' => 'padding: {{SIZE}}{{UNIT}};',
					],
				]
			);
       
    $this->end_controls_section();

    $this->start_controls_section(
        'section_description_style',
        [
            'label' => esc_html__( 'Description styling', 'elementor-addon' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

	    $this->add_responsive_control(
	        'text_align_description',
	        [
	            'label' => esc_html__( 'Alignment', 'elementor' ),
	            'type' => \Elementor\Controls_Manager::CHOOSE,
	            'options' => [
	                'left' => [
	                    'title' => esc_html__( 'Left', 'elementor' ),
	                    'icon' => 'eicon-text-align-left',
	                ],
	                'center' => [
	                    'title' => esc_html__( 'Center', 'elementor' ),
	                    'icon' => 'eicon-text-align-center',
	                ],
	                'right' => [
	                    'title' => esc_html__( 'Right', 'elementor' ),
	                    'icon' => 'eicon-text-align-right',
	                ],
	                'justify' => [
	                    'title' => esc_html__( 'Justified', 'elementor' ),
	                    'icon' => 'eicon-text-align-justify',
	                ],
	            ],
	            'selectors' => [
	                '{{WRAPPER}} .elementor-image-box-description' => 'text-align: {{VALUE}};',
	            ],
	            'separator' => 'after',
	        ]
	    );
    	$this->add_responsive_control(
            'description_box_padding',
			[
				'label' => esc_html__( 'Description padding', 'elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-image-box-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

    $this->end_controls_section();

    $this->start_controls_section(
        'section_image_style',
        [
            'label' => esc_html__( 'Image styling', 'elementor-addon' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );
       
		$this->add_responsive_control(
			'position',
			[
				'label' => esc_html__( 'Image Position', 'elementor' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'default' => 'top',
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'elementor' ),
						'icon' => 'eicon-h-align-left',
					],
					'top' => [
						'title' => esc_html__( 'Top', 'elementor' ),
						'icon' => 'eicon-v-align-top',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'elementor' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'prefix_class' => 'elementor-position-',
				'toggle' => false,
				'condition' => [
					'image[url]!' => '',
				],
			]
		);
    
    
		$this->add_responsive_control(
			'content_vertical_alignment',
			[
				'label' => esc_html__( 'Vertical Alignment', 'elementor' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'top' => [
						'title' => esc_html__( 'Top', 'elementor' ),
						'icon' => 'eicon-v-align-top',
					],
					'middle' => [
						'title' => esc_html__( 'Middle', 'elementor' ),
						'icon' => 'eicon-v-align-middle',
					],
					'bottom' => [
						'title' => esc_html__( 'Bottom', 'elementor' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'default' => 'top',
				'toggle' => false,
				'prefix_class' => 'elementor-vertical-align-',
				'condition' => [
					'position!' => 'top',
				],
			]
		);

		$this->add_responsive_control(
			'image_space',
			[
				'label' => esc_html__( 'Image Spacing', 'elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'default' => [
					'size' => 15,
				],
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}}.elementor-position-right .elementor-image-box-img' => 'padding-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.elementor-position-left .elementor-image-box-img' => 'padding-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.elementor-position-top .elementor-image-box-img' => 'padding-bottom: {{SIZE}}{{UNIT}};',
					'(mobile){{WRAPPER}} .elementor-image-box-img' => 'padding-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'image[url]!' => '',
				],
			]
		);

        $this->add_responsive_control(
			'width',
			[
				'label' => esc_html__( 'Width', 'elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
					'px' => [
						'min' => 1,
						'max' => 1000,
					],
					'vw' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'space',
			[
				'label' => esc_html__( 'Max Width', 'elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
					'px' => [
						'min' => 1,
						'max' => 1000,
					],
					'vw' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} img' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'height',
			[
				'label' => esc_html__( 'Height', 'elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vh', 'custom' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 500,
					],
					'vh' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_responsive_control(
			'object-fit',
			[
				'label' => esc_html__( 'Object Fit', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'condition' => [
					'height[size]!' => '',
				],
				'options' => [
					'' => esc_html__( 'Default', 'elementor-addon' ),
					'fill' => esc_html__( 'Fill', 'elementor-addon' ),
					'cover' => esc_html__( 'Cover', 'elementor-addon' ),
					'contain' => esc_html__( 'Contain', 'elementor-addon' ),
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} img' => 'object-fit: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'object-position',
			[
				'label' => esc_html__( 'Object Position', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'center center' => esc_html__( 'Center Center', 'elementor-addon' ),
					'center left' => esc_html__( 'Center Left', 'elementor-addon' ),
					'center right' => esc_html__( 'Center Right', 'elementor-addon' ),
					'top center' => esc_html__( 'Top Center', 'elementor-addon' ),
					'top left' => esc_html__( 'Top Left', 'elementor-addon' ),
					'top right' => esc_html__( 'Top Right', 'elementor-addon' ),
					'bottom center' => esc_html__( 'Bottom Center', 'elementor-addon' ),
					'bottom left' => esc_html__( 'Bottom Left', 'elementor-addon' ),
					'bottom right' => esc_html__( 'Bottom Right', 'elementor-addon' ),
				],
				'default' => 'center center',
				'selectors' => [
					'{{WRAPPER}} img' => 'object-position: {{VALUE}};',
				],
				'condition' => [
					'height[size]!' => '',
					'object-fit' => 'cover',
				],
			]
		);

		$this->add_responsive_control(
            'image_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs( 'image_effects' );

		$this->start_controls_tab(
			'normal',
			[
				'label' => esc_html__( 'Normal', 'elementor' ),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Css_Filter::get_type(),
			[
				'name' => 'css_filters',
				'selector' => '{{WRAPPER}} .elementor-image-box-img img',
			]
		);

		$this->add_control(
			'image_opacity',
			[
				'label' => esc_html__( 'Opacity', 'elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-image-box-img img' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'hover',
			[
				'label' => esc_html__( 'Hover', 'elementor' ),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Css_Filter::get_type(),
			[
				'name' => 'css_filters_hover',
				'selector' => '{{WRAPPER}}:hover .elementor-image-box-img img',
			]
		);

		$this->add_control(
			'image_opacity_hover',
			[
				'label' => esc_html__( 'Opacity', 'elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}}:hover .elementor-image-box-img img' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_control(
			'background_hover_transition',
			[
				'label' => esc_html__( 'Transition Duration', 'elementor' ) . ' (s)',
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'size' => 0.3,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 3,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-image-box-img img' => 'transition-duration: {{SIZE}}s',
				],
			]
		);

		$this->add_control(
			'hover_animation',
			[
				'label' => esc_html__( 'Hover Animation', 'elementor' ),
				'type' => \Elementor\Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->end_controls_tab();




	$this->end_controls_section();

		// Style Tab End

	}

	/**
	 * Render image box widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		$has_content = ! \Elementor\Utils::is_empty( $settings['title'] ) || ! \Elementor\Utils::is_empty( $settings['description_text'] );

		$html = '<div class="elementor-image-box-wrapper">';

		if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_link_attributes( 'link', $settings['link'] );
		}

        if ( ! \Elementor\Utils::is_empty( $settings['title'] ) ) {
            $this->add_render_attribute( 'title', 'class', 'elementor-image-box-title' );
            $this->add_inline_editing_attributes( 'title', 'none' );
            $title_html = $settings['title'];
            if ( ! empty( $settings['link']['url'] ) ) {
                $title_html = '<a ' . $this->get_render_attribute_string( 'link' ) . '>' . $title_html . '</a>';
            }
            $html .= sprintf( '<%1$s %2$s>%3$s</%1$s>', \Elementor\Utils::validate_html_tag( $settings['title_size'] ), $this->get_render_attribute_string( 'title' ), $title_html );
        }

		if ( ! empty( $settings['image']['url'] ) ) {
			$image_html = wp_kses_post( \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' ) );
			if ( ! empty( $settings['link']['url'] ) ) {
				$image_html = '<a ' . $this->get_render_attribute_string( 'link' ) . ' tabindex="-1">' . $image_html . '</a>';
			}
			$html .= '<figure class="elementor-image-box-img">' . $image_html . '</figure>';
		}

		if ( $has_content ) {
			if ( ! \Elementor\Utils::is_empty( $settings['description_text'] ) ) {
				$this->add_render_attribute( 'description_text', 'class', 'elementor-image-box-description' );
				$this->add_inline_editing_attributes( 'description_text' );
				$html .= sprintf( '<div %1$s>%2$s</div>', $this->get_render_attribute_string( 'description_text' ), $settings['description_text'] );
			}
		}

		$html .= '</div>';

		\Elementor\Utils::print_unescaped_internal_string( $html );
	}

}


 