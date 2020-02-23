CREATE TABLE Employee (
  emp_id varchar(7) primary key,
  emp_fname varchar(20) Not Null,
  emp_mname varchar(20),
  emp_lname varchar(20) Not Null,
  emp_email varchar(100) Unique Not Null,
  emp_dob date Not Null,
  emp_dateOfJoining TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  emp_address varchar(100) Not Null,
  emp_gender varchar(6) Not Null,
  emp_reportsTo varchar(7) references emp_id,
  emp_profilePhoto varchar(100) Not Null,
  emp_maritalStatus varchar(20) Not Null,
  emp_bankName varchar(100) Not Null,
  emp_accountNumber varchar(50) Not Null,
  emp_ifscCode varchar(20) Not Null
)

CREATE Table EmployeeEmergency (
  emp_id varchar(7),
  name varchar(20) not null,
  emp_relationship varchar(20) not null,
  phone varchar(10) Not Null,
  primary key (emp_id, phone),
  foreign key (emp_id) references Employee(emp_id)
)

CREATE Table EmployeeFamily (
  emp_id varchar(7),
  familyMemberName varchar(20) Not Null,
  familyMemberDOB date Not Null,
  familyMemberPhone varchar(10),
  primary key (emp_id, familyMemberPhone),
  foreign key (emp_id) references Employee(emp_id)
)

CREATE Table EmployeeEducation(
  emp_id varchar(7),
  institute_name varchar(50) Not Null,
  subject varchar(30) Not Null,
  degree  varchar(20) not Null,
  startDate Date Not Null,
  completeDate Date Not Null,
  percentage decimal,
  foreign key (emp_id) references Employee(emp_id)
)

CREATE TABLE EmployeeExperience (
  emp_id varchar(7),
  company_name varchar(50) Not Null,
  location varchar(50) Not Null,
  jobPosition  varchar(50) not Null,
  periodFrom Date Not Null,
  periodTo Date Not Null,
  foreign key (emp_id) references Employee(emp_id)
)

CREATE TABLE Department (
  deptId varchar(7) primary key,
  deptName varchar(30) Unique Not Null,
  deptEstb date Not Null,
  deptHOD varchar(7) references Employee(emp_id)
)

CREATE Table Designation (
  desgId varchar(7) primary key,
  desgName  varchar(50) Unique Not Null,
  desgStatus varchar(8) DEFAULT 'Active'
);

CREATE Table Project (
  proj_id VARCHAR(7) PRIMARY KEY,
  proj_name VARCHAR(50) UNIQUE,
  proj_start DATETIME DEFAULT CURRENT_TIMESTAMP,
  proj_end Date NOT NULL,
  proj_priority VARCHAR(10) NOT NULL,
  proj_status VARCHAR(8) DEFAULT 'Active',
  deptId VARCHAR(7) REFERENCES Department
)

INSERT INTO Project VALUES (
  'PROJ003',
  'Video Calling App',
  NOW(),
  '2020-01-08',
  'High',
  'Active',
  'DEP0001'
)

CREATE TABLE ProjectLeader (
  proj_id VARCHAR(7) REFERENCES Project,
  proj_leader_id VARCHAR(7) References Employee,
  PRIMARY KEY (proj_id,proj_leader_id) 
)

CREATE TABLE ProjectMember (
  proj_id VARCHAR(7) REFERENCES Project,
  proj_member_id VARCHAR(7) References Employee,
  PRIMARY KEY (proj_id,proj_member_id) 
)
