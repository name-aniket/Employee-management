$(document).ready(function() {

    /**
     * List active project
     */
    const projectList = () => {
        $.getJSON('http://localhost/IWP/Project/api/get-project.php', function(data) {
            console.log(data);
            $.each(data, function(key, value) {
                str = '';
                str += '<div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">';
                str += '<div class="card">';
                str += '<div class="card-body">';
                str += '<div class="dropdown dropdown-action profile-action">';
                str += '<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>';
                str += '<div class="dropdown-menu dropdown-menu-right">';
                str += '<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_project"><i class="fa fa-pencil m-r-5"></i> Edit</a>';
                str += '<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_project"><i class="fa fa-trash-o m-r-5"></i> Delete</a>';
                str += '</div></div>';
                str += '<h4 class="project-title"><a href="project-view.html">' + value.Project.proj_name + '</a></h4>';
                str += '<small class="block text-ellipsis m-b-15">';
                str += '<span class="text-xs">1</span> <span class="text-muted">open tasks, </span>';
                str += '<span class="text-xs">9</span> <span class="text-muted">tasks completed</span>';
                str += '</small>';
                str += '<p class="text-muted">This paragraph is the description for the project.</p>';
                str += '<div class="pro-deadline m-b-15"><div class="sub-title">Deadline:</div>';
                str += '<div class="text-muted">' + value.Project.proj_end + '</div></div>';
                str += '<div class="project-members m-b-15">';
                str += '<div>Project Leader :</div>';
                str += '<ul class="team-members">';
                $.each(value.ProjectLeaderList, function(key, value) {
                    str += '<li>';
                    str += '<a href="#" data-toggle="tooltip" title="' + value.emp_name + '"><img alt="" src="../../assets/img/profiles/Employee/' + value.emp_profilePhoto + '"></a>';
                    str += '</li>';
                });
                str += '</ul>';
                str += '</div>';
                str += '<div class="project-members m-b-15">';
                str += '<div>Team :</div>';
                str += '<ul class="team-members">';
                $.each(value.ProjectMemberList, function(key, value) {
                    str += '<li>';
                    str += '<a href="#" data-toggle="tooltip" title="' + value.emp_name + '"><img alt="" src="../../assets/img/profiles/Employee/' + value.emp_profilePhoto + '"></a>';
                    str += '</li>';
                });
                str += '</ul>';
                str += '</div>';
                str += '<p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>';
                str += '<div class="progress progress-xs mb-0">';
                str += '<div class="progress-bar bg-success" role="progressbar" data-toggle="tooltip" title="40%" style="width: 40%"></div>';
                str += '</div>';
                str += '</div>';
                str += '</div>';
                str += '</div>';
                $('#content-body').append(str);
            });
        });
    }

    /**
     * Driver Code
     */
    projectList();
});