$(document).ready(function() {

    /**
     * Populate the Designation dropdown.
     * Fills the designation on page load
     * It will run only one time
     */
    $(function populateDesignation() {

        dropdown = $('#emp_desg');

        dropdown.empty();

        const url = 'http://localhost/IWP/Designation/api/list_designation.php';

        dropdown.append('<option>Select Designation</option>');

        $.getJSON(url, function(data) {
            $.each(data, function(key, entry) {
                dropdown.append($('<option></option>').attr('value', entry.desgId).text(entry.desgName));
            })
        });
    });

    /**
     * Fill all the employee.
     */
    function ListAllEmployee() {
        $.ajax({
            type: "POST",
            url: "http://localhost/IWP/Employee/api/employee_list.php",
            success: function(data) {
                ListEmployee(data);
            }
        });
    };

    /**
     * Anchor tag click event.
     * Employee delete module using AJAX.
     */
    $(document).on('click', 'a[data-selection="dummy"]', function() {
        empId = $(this).data("employeeId");
        if (confirm("Are you sure want to delete?")) {
            $(function() {
                $.ajax({
                    type: "POST",
                    url: "http://localhost/IWP/Employee/api/employee_delete.php",
                    data: { 'emp_id': empId },
                    success: function(data) {
                        console.log(data);
                        ListAllEmployee();
                        alert(data.Message);
                    }
                });
            })
        }
    });

    /**
     * Anchor tag event.
     * Ajax call for search.
     */
    $('a[class="btn btn-success btn-block"]').click(function() {
        id = $('#emp_id').val();
        name = $('#emp_name').val();
        designation = $('#emp_desg').val();

        if ((id != "" || name != "") || designation != "Select Designation") {
            $.ajax({
                type: "POST",
                url: "http://localhost/IWP/Employee/api/employee_search.php",
                data: {
                    'emp_id': $('#emp_id').val(),
                    'emp_name': $('#emp_name').val(),
                    'emp_desg': $('#emp_desg').val()
                },
                success: function(data) {
                    /**
                     * Make the list of employee
                     */
                    ListEmployee(data);
                    /**
                     * Reset the search fields
                     */
                    $('#emp_id').val("");
                    $('#emp_name').val("");

                    /**
                     * $('#emp_desg').val('0');
                     * Have to find a solution for this.
                     * */
                }
            });
        }
    });

    /**
     * List employee function.
     * Takes a collection and make a list of employee.
     */
    function ListEmployee(data) {
        /**
         * Delete the existing data.
         */
        $('div[class="row staff-grid-row"]').text("");

        /**
         * Loop the result set and print the new list of employee
         */
        $.each(data, function(key, entry) {
            entry.emp_mname = (entry.emp_mname == null) ? "" : entry.emp_mname;
            str = '<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">';
            str += '<div class="profile-widget">';
            str += '<div class="profile-img"><a href="Employee_Profile.php?*=' + entry.emp_id + '" class="avatar"><img src="http://localhost/IWP/assets/img/profiles/Employee/' + entry.emp_profilePhoto + '" alt=""></a></div>';
            str += '<div class="dropdown profile-action">';
            str += '<a href="javascript:void(0)" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>';
            str += '<div class="dropdown-menu dropdown-menu-right">';
            str += '<a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-pencil m-r-5"></i> Edit</a>';
            str += '<a class="dropdown-item" href="javascript:void(0)" data-selection="dummy" data-employee-id="' + entry.emp_id + '"><i class="fa fa-trash-o m-r-5"></i> Delete</a>';
            str += '</div></div>';
            str += '<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="Employee_Profile.php?*=' + entry.emp_id + '">' + entry.emp_fname + ' ' + entry.emp_mname + ' ' + entry.emp_lname + '</a></h4>';
            str += '<div class="small text-muted">' + entry.desgName + '</div>';
            str += '</div></div>';
            /**
             * Append the employee record divison.
             */
            $('div[class="row staff-grid-row"]').append(str);
        });
    }
    /**
     *	List all the employee on the page load.					
     */
    ListAllEmployee();
});