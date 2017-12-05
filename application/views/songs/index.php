<?php if (!$this) { exit(header('HTTP/1.0 403 Forbidden')); } ?>

<div class="container">
    <h2>You are in the View: application/views/contact/index.php (everything in this box comes from that file)</h2>
    <!-- add contact form -->
    <div>
        <h3>Add a contact</h3>
        <form action="<?php echo URL_WITH_INDEX_FILE; ?>contacts/addcontact" method="POST">
            <label>FirstName</label>
            <input type="text" name="firstname" value="" required />
            <label>LastName</label>
            <input type="text" name="lastname" value="" required />
            <input type="submit" name="submit_add_contact" value="Submit" />
        </form>
    </div>
    <!-- main content output -->
    <div>
        <h3>Amount of contacts (data from second model)</h3>
        <div>
            <?php echo $amount_of_contacts; ?>
        </div>
        <h3>Amount of contacts (via AJAX)</h3>
        <div>
            <button id="javascript-ajax-button">Click here to get the amount of contacts via Ajax (will be displayed in #javascript-ajax-result-box)</button>
            <div id="javascript-ajax-result-box"></div>
        </div>
        <h3>List of contacts (data from first model)</h3>
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>Id</td>
                <td>FirstName</td>
                <td>LastName</td>
                <td>DELETE</td>
                <td>EDIT</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($contacts as $contact) { ?>
                <tr>
                    <td><?php if (isset($contact->id)) echo htmlspecialchars($contact->id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($contact->firstname)) echo htmlspecialchars($contact->firstname, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($contact->lastname)) echo htmlspecialchars($contact->lastname, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><a href="<?php echo URL_WITH_INDEX_FILE . 'contacts/deletecontact/' . htmlspecialchars($contact->id, ENT_QUOTES, 'UTF-8'); ?>">delete</a></td>
                    <td><a href="<?php echo URL_WITH_INDEX_FILE . 'contacts/editcontact/' . htmlspecialchars($contact->id, ENT_QUOTES, 'UTF-8'); ?>">edit</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
