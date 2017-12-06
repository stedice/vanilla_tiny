<?php

/**
 * Class Contacts
 * This is a demo class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Contacts extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/contacts/index
     */
    public function index()
    {
        // getting all contacts and amount of contacts
        $contacts = $this->model->getAllContacts();
        $amount_of_contacts = $this->model->getAmountOfContacts();

       // load views. within the views we can echo out $contacts and $amount_of_contacts easily
        require APP . 'views/_templates/header.php';
        require APP . 'views/contacts/index.php';
        require APP . 'views/_templates/footer.php';
    }

    /**
     * ACTION: addContact
     * This method handles what happens when you move to http://yourproject/contacts/addcontact
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "add a contact" form on contacts/index
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to contacts/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function addContact()
    {
        // if we have POST data to create a new contact entry
        if (isset($_POST["submit_add_contact"])) {
            // do addContact() in model/model.php
            $this->model->addContact($_POST["firstname"], $_POST["lastname"]);
        }

        // where to go after contact has been added
        header('location: ' . URL_WITH_INDEX_FILE . 'contacts/index');
    }

    /**
     * ACTION: deleteContact
     * This method handles what happens when you move to http://yourproject/contacts/deletecontact
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "delete a contact" button on contacts/index
     * directs the user after the click. This method handles all the data from the GET request (in the URL!) and then
     * redirects the user back to contacts/index via the last line: header(...)
     * This is an example of how to handle a GET request.
     * @param int $contact_id Id of the to-delete contact
     */
    public function deleteContact($contact_id)
    {
        // if we have an id of a contact that should be deleted
        if (isset($contact_id)) {
            // do deleteContact() in model/model.php
            $this->model->deleteContact($contact_id);
        }

        // where to go after contact has been deleted
        header('location: ' . URL_WITH_INDEX_FILE . 'contacts/index');
    }

     /**
     * ACTION: editContact
     * This method handles what happens when you move to http://yourproject/contacts/editcontact
     * @param int $contact_id Id of the to-edit contact
     */
    public function editContact($contact_id)
    {
        // if we have an id of a contact that should be edited
        if (isset($contact_id)) {
            // do getContact() in model/model.php
            $contact = $this->model->getContact($contact_id);

            // in a real application we would also check if this db entry exists and therefore show the result or
            // redirect the user to an error page or similar

            // load views. within the views we can echo out $contact easily
            require APP . 'views/_templates/header.php';
            require APP . 'views/contacts/edit.php';
            require APP . 'views/_templates/footer.php';
        } else {
            // redirect user to contacts index page (as we don't have a contact_id)
            header('location: ' . URL_WITH_INDEX_FILE . 'contacts/index');
        }
    }
    
    /**
     * ACTION: updateContact
     * This method handles what happens when you move to http://yourproject/contacts/updatecontact
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "update a contact" form on contacts/edit
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to contacts/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function updateContact()
    {
        // if we have POST data to create a new contact entry
        if (isset($_POST["submit_update_contact"])) {
            // do updateContact() from model/model.php
            $this->model->updateContact($_POST["firstname"], $_POST["lastname"], $_POST['contact_id']);
        }

        // where to go after contact has been added
        header('location: ' . URL_WITH_INDEX_FILE . 'contacts/index');
    }

    /**
     * AJAX-ACTION: ajaxGetStats
     * TODO documentation
     */
    public function ajaxGetStats()
    {
        $amount_of_contacts = $this->model->getAmountOfContacts();

        // simply echo out something. A super-simple API would be possible by echoing JSON here
        echo $amount_of_contacts;
    }

}
