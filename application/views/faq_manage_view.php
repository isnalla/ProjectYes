


<div id="edit_faq_container">
    <form autocomplete="on" id="edit_faq_form">
        <h4>EDIT FAQ</h4>
        <input type="hidden" name="id" id="edit_id" />
        <input type="text" name="question" id="edit_question" placeholder="Question" required/>
        <br/>
        <textarea name="answer" id="edit_answer" placeholder="Answer..."  required></textarea>
        <br/>
        <button type="submit" name="edit_faq_button" id="edit_faq_button">Edit</button>
        <button id="edit_faq_cancel_button" name="edit_faq_cancel_button" >Cancel</button>
    </form>
</div>
<script src="<?php echo base_url(); ?>js/faq_manager.js"></script>