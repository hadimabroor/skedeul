
<?php if ($response == false): ?>
	<p><?php echo trans('oops-there-are-something-wrong') ?></p>
<?php else: ?>
	<p class="fs-16"><i class="fas fa-question-circle"></i> <?php echo html_escape($prompt) ?></p>

	<?php if (settings()->openai_model == 'gpt-3.5-turbo'): ?>
		<div class="response_item">
	    	<?php 
	    		echo '<ul><li>' . str_replace("\n", '</li><li>', trim($response->choices[0]->message->content)) . '</li></ul>';
	    	?>
	    </div>
	<?php else: ?>
		<?php $r=1; foreach ($response->choices as $result): ?>
			<?php if (count($response->choices) > 1): ?>
				<p class="response_variations badge badge-primary-soft"><?php echo trans('output') ?><?php echo html_escape($r) ?></p>
			<?php endif ?>

		    <div class="response_item pb-5">
		    	<?php 
		    		echo '<ul><li>' . str_replace("\n", '</li><li>', trim($result->text)) . '</li></ul>';
		    	?>
		    </div>
		<?php $r++; endforeach; ?>
	<?php endif ?>
<?php endif ?>