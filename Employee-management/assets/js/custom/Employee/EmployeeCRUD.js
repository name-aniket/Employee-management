$(document).ready(function() {

    /**
     * Initilising Dialogue Box
     */
    $("#dialog").dialog({
        autoOpen: false,
        buttons: [{
            text: "Ok",
            icon: "ui-icon-heart",
            click: function() {
                $(this).dialog("close");
            }
        }]
    });

    /*
     * Function Defination : This function fills the dropdown list with Department from the database
     * Created On : 24-12-2019 21:49.
     */
    function populateDepartment() {
        let dropdown = $('#emp_dept');

        dropdown.empty();

        const url = 'http://localhost/IWP/Department/api/list_department.php';

        $.getJSON(url, function(data) {
            $.each(data, function(key, entry) {
                dropdown.append($('<option></option>').attr('value', entry.deptId).text(entry.deptName));
            })
        });
    }

    /**
     * Populates the Designation List.
     * 
     */
    function populateDesignation() {
        let dropdown = $('#emp_desg');
        dropdown.empty();
        const url = 'http://localhost/IWP/Designation/api/list_designation.php';

        $.getJSON(url, function(data) {
            $.each(data, function(key, entry) {
                dropdown.append($('<option></option>').attr('value', entry.desgId).text(entry.desgName));
            })
        });
    }

    /*
     * Function Defination : This function sends the form data to the server and display a proper message.
     * Create On : 25-12-2019 00:50.
     */
    $('form').on('submit', function(event) {
        /* This line of code restrict the forms from submission. */
        event.preventDefault();

        response = null;
        /*
         * This line of code send the ajax request to the respective php page.
         * The new FormData() will contain all the form fields as key => value pair.
         */
        $.ajax({
            type: 'POST',
            url: 'http://localhost/IWP/Employee/api/employee_insert.php',
            data: new FormData(this),
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                console.log(data);
                response = data;
            },
            complete: function() {
                var str = (response.Message) + "";
                if (str === "") {
                    $('#dialog').val("");
                    $('#dialog').append("You have registered Successfully");
                } else {
                    $('#dialog').append("Something went Wrong !!");
                    $('#dialog').append("Following errors are encountred");
                    $.each(str.split("\n"), function(index, value) {
                        if (value != "") {
                            $('#dialog').append("<li>" + value + "</li>")
                        }
                    });
                }
                $("#dialog").dialog("open");
                $('form').trigger('reset');
                $('#dialog').val("");
            }
        });
    });

    /*
     * Driver block
     */

    populateDepartment();
    populateDesignation();

});