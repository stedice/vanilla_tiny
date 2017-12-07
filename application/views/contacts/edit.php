<?php if (!$this) { exit(header('HTTP/1.0 403 Forbidden')); } ?>

<div class="container">
    <h2>You are in the View: application/views/contact/edit.php (everything in this box comes from that file)</h2>
    <!-- add contact form -->
    <div>
        <h3>Edit a contact</h3>
        <form action="<?php echo URL_WITH_INDEX_FILE; ?>contacts/updatecontact" method="POST">
            <label>FirstName</label>
            <input autofocus type="text" name="firstname" value="<?php echo htmlspecialchars($contact->firstname, ENT_QUOTES, 'UTF-8'); ?>" required />
            <label>LastName</label>
            <input type="text" name="lastname" value="<?php echo htmlspecialchars($contact->lastname, ENT_QUOTES, 'UTF-8'); ?>" required />
            <input type="hidden" name="contact_id" value="<?php echo htmlspecialchars($contact->id, ENT_QUOTES, 'UTF-8'); ?>" />
            <input type="submit" name="submit_update_contact" value="Update" />
        </form>
    </div>
</div>

