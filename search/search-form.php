<?php echo $this->form('search-form', $options['form_attributes']); ?>
    <?php echo $this->formText('query', @$_GET['q'], array('title' => __('Search'), 'placeholder' => __('Search'))); ?>
    <?php echo $this->formHidden('query_type', 'boolean'); ?>
    <?php foreach ($filters['record_types'] as $type): ?>
    <?php echo $this->formHidden('record_types[]', $type); ?>
    <?php endforeach; ?>
    <?php echo $this->formButton('submit_search', $options['submit_value'], array('type' => 'submit')); ?>
</form>
