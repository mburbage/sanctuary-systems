<?php

namespace Yoast\WP\SEO\Conditionals;

use Yoast\WP\SEO\Helpers\Zapier_Helper;

/**
 * Conditional that is only met when the Zapier integration is enabled.
 */
class Zapier_Enabled_Conditional implements Conditional {

	/**
	 * The Zapier helper.
	 *
	 * @var Zapier_Helper
	 */
	private $zapier;

	/**
	 * Zapier_Enabled_Conditional constructor.
	 *
	 * @param Zapier_Helper $zapier The Zapier helper.
	 */
	public function __construct( Zapier_Helper $zapier ) {
		$this->zapier = $zapier;
	}

	/**
	 * Returns whether or not this conditional is met.
	 *
	 * @return boolean Whether or not the conditional is met.
	 */
	public function is_met() {
		return $this->zapier->is_enabled();
	}
}
