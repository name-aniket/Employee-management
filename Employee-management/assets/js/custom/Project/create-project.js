$(document).ready(function() {
    /**
     * 
     */
    let project_list = null;

    /**
     * Get the list of Project name.
     * On page load get the list and store the name in an array for future use.
     * User should be informed that project name is alraedy taken.
     */
    function getProjectList() {
        $.getJSON('http://localhost/IWP/Project/api/get-project-name.php', function(data) {
            project_list = Array();
            /**
             * Store the project name in an array.
             * Later use to check wheather a name already taken or not.
             */
            $.each(data, function(key, value) {
                /**
                 * push() method appends data to array.
                 */
                project_list.push(value['proj_name']);
            });
        });
    }

    /**
     * Get list of project leader of the department.
     */
    const listProjectLeader = () => {
        $.getJSON('http://localhost/IWP/Project/api/get-project-leader.php', function(data) {

            const projectLeader = $('select[name="proj_leader[]"]');

            $.each(data, function(key, value) {
                projectLeader.append('<option value=' + value["emp_id"] + '>' + value["emp_name"] + '</option>');
            });
        });
    }

    /**
     * Get list of project member of the department.
     */
    const listProjectMember = () => {
        $.getJSON('http://localhost/IWP/Project/api/get-project-member.php', function(data) {

            const projectLeader = $('select[name="proj_member[]"]');

            $.each(data, function(key, value) {
                projectLeader.append('<option value=' + value["emp_id"] + '>' + value["emp_name"] + '</option>');
            });
        });
    }

    /**
     * Create an event keyup on the textbox to inform user wheather this name is taken or not.
     */
    $('input[name="proj_name"]').on('blur', function(event) {
        const proj_name = this.value;
        if (proj_name.length != 0 && project_list.includes(proj_name)) {
            alert('Project Name already exist');
        }
    });

    /**
     * Submit form data
     * 
     */
    $('form').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'http://localhost/IWP/Project/api/create-project.php',
            data: new FormData(this),
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                alert(data.Message);
            }
        });
    });

    /**
     * Driver block
     */
    getProjectList();
    listProjectLeader();
    listProjectMember();
});