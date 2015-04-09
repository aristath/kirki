<?php

namespace Kirki\Controls;

use Kirki\Control;

class SliderControl extends Control {

	public $type = 'slider';

	public function enqueue() {
		wp_enqueue_script( 'jquery-ui' );
		wp_enqueue_script( 'jquery-ui-slider' );
	}

	public function render_content() { ?>
		<label>

			<?php $this->title(); ?>

			<input type="text" class="kirki-slider" id="input_<?php echo $this->id; ?>" disabled value="<?php echo $this->value(); ?>" <?php $this->link(); ?>/>

		</label>

		<div id="slider_<?php echo $this->id; ?>" class="ss-slider"></div>
		<script>
		jQuery(document).ready(function($) {
			$( '[id="slider_<?php echo $this->id; ?>"]' ).slider({
					value : <?php echo $this->value(); ?>,
					min   : <?php echo $this->choices['min']; ?>,
					max   : <?php echo $this->choices['max']; ?>,
					step  : <?php echo $this->choices['step']; ?>,
					slide : function( event, ui ) { $( '[id="input_<?php echo $this->id; ?>"]' ).val(ui.value).keyup(); }
			});
			$( '[id="input_<?php echo $this->id; ?>"]' ).val( $( '[id="slider_<?php echo $this->id; ?>"]' ).slider( "value" ) );
		});
		</script>
		<?php

	}
}
