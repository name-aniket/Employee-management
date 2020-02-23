<?php
class Project
{
    public $proj_id;
    public $proj_name;
    public $proj_startdate;
    public $proj_enddate;
    public $proj_priority;
    public $proj_status;
    public $proj_deptId;
    public static $dbConnection = null;
    const Relation = "Project";

    /**
     * 
     * 
     */
    public function __construct()
    {
        
    }

    /**
     * 
     * 
     */
    public function __destruct()
    {

    }

    /**
     * 
     */
    public static function factoryCreateConnection()
    {
        include_once $_SERVER['DOCUMENT_ROOT'] . '/IWP/config/core.php';
        include_once $_SERVER['DOCUMENT_ROOT'] . '/IWP/config/database.php';

        $dbObject = new Database($dbconfig['username'], $dbconfig['password']);
        if (Project::$dbConnection === null)
            Project::$dbConnection = $dbObject->getConnection();
    }

    public static function get_project_name()
    {
        $stmt = Project::$dbConnection->prepare("SELECT proj_name FROM Project WHERE proj_status = ?");
        $stmt->execute(array('Active'));
        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $response;
    }
    
    /**
     * 
     */
    public static function insertProject() 
    {
        try{
            /**
             * Project Record
             * Begin transaction
             */
            Project::$dbConnection->beginTransaction();

            /**
             * Insert project
             */
            $stmt = Project::$dbConnection->prepare("INSERT INTO ".Project::Relation ."(proj_id, proj_name, proj_priority, proj_end) VALUES(?,?,?,?)");

            /**
             * Store the last inserted project Id
             * Project Id for Project Leader Table
             * Project Id for Project Member Table 
             */
            $last_proj_id = Project::generateProjectId();
            
            $fptr = fopen('../resources/project_description/'.$last_proj_id.'.txt','w');
            
            fwrite($fptr, $_POST['proj_desc']);
    
            /**
             * Record Project Table
             */
            $project_record =  array(
                $last_proj_id,
                htmlspecialchars(stripslashes($_POST['proj_name'])),
                htmlspecialchars(stripslashes($_POST['proj_priority'])),
                htmlspecialchars(stripslashes(date_format(date_create(str_replace('/','-',$_POST['proj_enddate'])),'Y-m-d')))
            );

            /**
             * Insert Fails
             * Rollback
             */
            if (!$stmt->execute($project_record)){
                Project::$dbConnection->rollBack();
                return false;
            }

            /**
             * Insert Project Leader
             */
            $project_leader_id_array = $_POST['proj_leader']; 

            $stmt = Project::$dbConnection->prepare("INSERT INTO ProjectLeader(proj_id, proj_leader_id) VALUES(?,?)");

            for($i = 0; $i < count($project_leader_id_array); $i++){
                if (!$stmt->execute(array($last_proj_id,$project_leader_id_array[$i])))
                {
                    Project::$dbConnection->rollBack();
                    return false;
                }
            }

            /**
             * Insert Project Member
             */
            $project_leader_id_array = $_POST['proj_member']; 

            $stmt = Project::$dbConnection->prepare("INSERT INTO ProjectMember(proj_id, proj_member_id) VALUES(?,?)");

            for($i = 0; $i < count($project_leader_id_array); $i++){
                if (!$stmt->execute(array($last_proj_id,$project_leader_id_array[$i])))
                {
                    Project::$dbConnection->rollBack();
                    return false;
                }
            }
            Project::$dbConnection->commit();
            
            /**
             * Stores the project description,
             * in a seperate file
             */
            
        }catch(\PDOException $e){
            return false;
        }
        return true;
    }

    /**
     * 
     * 
     * 
     */
    public static function getProjectLeader()
    {
        $stmt = Project::$dbConnection->prepare("SELECT emp_id, concat(emp_fname,' ', emp_lname) AS emp_name FROM Employee WHERE emp_desg = 'DES0006' AND emp_status = ?");
        $stmt->execute(array('Active'));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    /**
     * 
     * 
     * 
     */
    public static function getProjectMember()
    {
        $stmt = Project::$dbConnection->prepare("SELECT emp_id, concat(emp_fname,' ', emp_lname) AS emp_name FROM Employee WHERE emp_desg <> 'DES0006' AND emp_status = ?");
        $stmt->execute(array('Active'));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function generateProjectId()
    {
        $proj_id = "";
        /*
        * If query() returns a PDOobject
        */
        if ($res = Project::$dbConnection->query("SELECT count(proj_id) FROM Project")) {
            /*
                * Count the number of rows.
                */
            $rowCount = $res->fetchColumn();

            /*
                * If there are > 0 rows
                */
            if ($rowCount > 0) {
                $rowCount = $rowCount + 1;
                /*
                * Add trailing zeros to make the id in required format.
                * eg. EMPxxxx
                */
                for ($i = strlen($rowCount); $i < 3; $i++) {
                $rowCount = '0' . $rowCount;
                }
                $proj_id = "PROJ" . $rowCount;
            } else {
                /*
                * First Employee
                */
                $proj_id = "PROJ001";
            }
        }
        return $proj_id;
    }
    
    /**
     * 
     * 
     */
    public static function getProjectList()
    {
        try{
            Project::factoryCreateConnection();

            $stmt = Project::$dbConnection->prepare("SELECT proj_id, proj_name, DATE_FORMAT(proj_end, '%d %M %Y') As proj_end FROM ".Project::Relation." WHERE proj_status = ?");
            
            $stmt->execute(array('Active'));
            
            $record = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $record_to_return = array();

            foreach( $record as $row ){
                
                /**
                 * Retrieve all the project leader
                 */
                $stmt = Project::$dbConnection->prepare("SELECT concat(emp_fname,' ',emp_lname) As emp_name, emp_profilePhoto FROM Employee E, ProjectLeader PL WHERE E.emp_id = PL.proj_leader_id AND proj_id = ?");
                $stmt->execute(array($row['proj_id']));
                $project_leader_array = $stmt->fetchAll(PDO::FETCH_ASSOC);

                /**
                 * Retrieve all the project member
                 */
                $stmt = Project::$dbConnection->prepare("SELECT concat(emp_fname,' ',emp_lname) As emp_name, emp_profilePhoto FROM Employee E, ProjectMember PM WHERE E.emp_id = PM.proj_member_id AND proj_id = ?");
                $stmt->execute(array($row['proj_id']));
                $project_member_array = $stmt->fetchAll(PDO::FETCH_ASSOC);

                array_push($record_to_return, array(
                    'Project' => $row,
                    'ProjectLeaderList'=>$project_leader_array,
                    'ProjectMemberList'=>$project_member_array 
                ));

            }
        }catch(\PDOException $e) {
            return NULL;
        }
        return $record_to_return;    
    }
}
