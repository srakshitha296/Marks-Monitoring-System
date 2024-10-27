

/*Student table owned by Admin*/
create table student(
usn varchar(15) not null,
name varchar(20),
sem int,
mentor varchar(20),
primary key(usn)
);

/**Inserting dStudent data by the Admin**/
insert into student values('4JK21CS001', 'Abhishek', 5, 'Mrs.Nayana Yadav');
insert into student values('4JK21CS016', 'Darshan Bhandary', 5, 'Mrs.Nayana Yadav');
insert into student values('4JK21CS040', 'Nishitha', 5, 'Mrs.Snitha Shetty');
insert into student values('4JK21CS030', 'Likhith Kumar', 5, 'Dr. Chanchal Antony');
insert into student values('4JK21CS048', 'Rakshitha Shetty', 5, 'Mrs.Snitha Shetty');
insert into student values('4JK21CS060', 'Vaishnavi', 5, 'Mr.Arul');

select * from student;

update student set usn = '4JK21CS001', name = 'Abhishek', sem = 5, mentor = 'Mrs. Nayana Yadav' where usn = '4JK21CS001';

/*Course table owned by Admin*/
create table course(
courseid varchar(10),
coursename varchar(20),
password varchar(20),
faculty_name varchar(20),
primary key(courseid)
); 


ALTER TABLE course
modify COLUMN faculty_name varchar(30);

/*Inserting Course data by the admin*/
insert into course values('21CS51','ATC','123456', 'Mrs.Ashwitha Shetty');
insert into course values('21CS52','CN','123456', 'Mr.VijayKumar Dudhanikar');
insert into course values('21CS53','DBMS','123456', 'Mrs.Vidhya Myagiri');
insert into course values('21CS54','AIML','123456', 'Mrs.Sharon DSouza');
insert into course values('21CSL55','DBMSLab','123456', 'Mrs.Vidhya Myagiri');
insert into course values('21RMI56','RM','123456', 'Dr.Shanthakumari');
insert into course values('21CIV57','EVS','123456', 'Mr.Nithin');
insert into course values('21CS582','C#','123456', 'Mrs.Krathika');

select * from course;

/*Table stores student password*/
create table student_registration(
usn varchar(15),
name varchar(20),
password varchar(20),
primary key(usn),
foreign key(usn) references student(usn) on delete cascade
);

select * from student_registration;

/*Table for ATC*/
create table atc(
usn varchar(15),
ia1 int,
ia2 int,
ia3 int,
ass int,
cie int,
see int,
total int,
primary key(usn),
foreign key(usn) references student(usn) on delete cascade
);

insert into atc values('4JK21CS048',20, 20, 20, 0, 0, 0, 0);
insert into atc values('4JK21CS016',19, 20, 0, 0, 0, 0, 0);

/*Table for CN*/
create table cn(
usn varchar(15),
ia1 int,
ia2 int,
ia3 int,
ass int,
cie int,
see int,
total int,
primary key(usn),
foreign key(usn) references student(usn) on delete cascade
);

insert into cn values('4JK21CS048',0, 0, 20, 0, 0, 0, 0);
insert into cn values('4JK21CS016',10, 0, 0, 0, 0, 0, 0);

/*Table for DBMS*/
create table dbms(
usn varchar(15),
ia1 int,
ia2 int,
ia3 int,
ass int,
cie int,
see int,
total int,
primary key(usn),
foreign key(usn) references student(usn) on delete cascade
);

insert into dbms values('4JK21CS048',0, 0, 20, 0, 0, 0, 0);
insert into dbms values('4JK21CS016',0, 0, 20, 0, 0, 0, 0);

/*Table for AIML*/
create table aiml(
usn varchar(15),
ia1 int,
ia2 int,
ia3 int,
ass int,
cie int,
see int,
total int,
primary key(usn),
foreign key(usn) references student(usn) on delete cascade
);

insert into aiml values('4JK21CS048', 15, 17, 0, 0, 0, 0, 0);
insert into aiml values('4JK21CS016', 14, 15, 0, 0, 0, 0, 0);

/*Table for DBMSLab*/
create table dbmslab(
usn varchar(15),
ia1 int,
ia2 int,
ia3 int,
ass int,
cie int,
see int,
total int,
primary key(usn),
foreign key(usn) references student(usn) on delete cascade
);

insert into dbmslab values('4JK21CS048',0, 0, 0, 0, 0, 0, 0);
insert into dbmslab values('4JK21CS016',15, 16, 0, 0, 0, 0, 0);

/*Table for RM*/
create table rm(
usn varchar(15),
ia1 int,
ia2 int,
ia3 int,
ass int,
cie int,
see int,
total int,
primary key(usn),
foreign key(usn) references student(usn) on delete cascade
);

insert into rm values('4JK21CS048',10, 10, 0, 0, 0, 0, 0);
insert into rm values('4JK21CS016',16, 18, 0, 0, 0, 0, 0);

/*Table for EVS*/
create table evs(
usn varchar(15),
ia1 int,
ia2 int,
ia3 int,
ass int,
cie int,
see int,
total int,
primary key(usn),
foreign key(usn) references student(usn) on delete cascade
);

insert into evs values('4JK21CS048',10, 10, 0, 0, 0, 0, 0);
insert into evs values('4JK21CS016',16, 0, 0, 0, 0, 0, 0);

/*Table for C#*/
create table csharp(
usn varchar(15),
ia1 int,
ia2 int,
ia3 int,
ass int,
cie int,
see int,
total int,
primary key(usn),
foreign key(usn) references student(usn) on delete cascade
);

insert into csharp values('4JK21CS048',0, 0, 0, 0, 0, 0, 0);
insert into csharp values('4JK21CS016',0, 0, 0, 0, 0, 0, 0);

/*Table of Report*/
CREATE TABLE report (
    usn VARCHAR(15),
    courseid varchar(10),
    ia1 INT,
    ia2 INT,
    ia3 INT,
    ass INT,
    cie INT,
    see INT,
    total INT,
    grade CHAR(1),
    PRIMARY KEY (usn, courseid),
    FOREIGN KEY (usn) REFERENCES student(usn) ON DELETE CASCADE,
    FOREIGN KEY (courseid) REFERENCES course(courseid) ON DELETE CASCADE
);

use student_mentoring_system;
drop table subject_details;

select * from student_registration;
select a.ia1 as ATC_IA1, a.ia2 as ATC_IA2, a.ia3 as ATC_IA3, a.ass as ATC_ASS, a.cie as ATC_CIE, a.see as ATC_SEE, a.total as ATC_TOTAL,
		b.ia1 as CN_IA1, b.ia2 as CN_IA2, b.ia3 as CN_IA3, b.ass as CN_ASS, b.cie as CN_CIE, b.see as CN_SEE, b.total as CN_TOTAL,
        c.ia1 as DBMS_IA1, c.ia2 as DBMS_IA2, c.ia3 DBMS_IA3, c.ass as DBMS_ASS, c.cie as DBMS_CIE, c.see as DBMS_SEE, c.total as DBMS_TOTAL,
        d.ia1 as AIML_IA1, d.ia2 as AIML_IA2, d.ia3 as AIML_IA3, d.ass as AIML_ASS, d.cie as AIML_CIE, d.see as AIML_SEE, d.total as AIML_TOTAL,
        e.ia1 as DBMSLAB_IA1, e.ia2 as DBMSLAB_IA2, e.ia3 as DBMSLAB_IA3, e.ass as DBMSLAB_ASS, e.cie as DBMSLAB_CIE, e.see as DBMSLAB_SEE, e.total as DBMSLAB_TOTAL,
        f.ia1 as RM_IA1, f.ia2 as RM_IA2, f.ia3 as RM_IA3, f.ass as RM_ASS, f.cie as RM_CIE, f.see as RM_SEE, f.total as RM_TOTAL,
        g.ia1 as EVS_IA1, g.ia2 as EVS_IA2, g.ia3 as EVS_IA3, g.ass as EVS_ASS, g.cie as EVS_CIE, g.see as EVS_SEE, g.total as EVS_TOTAL,
        h.ia1 as CSHARP_IA1, h.ia2 as CSHARP_IA2, h.ia3 as CSHARP_IA3, h.ass as CSHARP_ASS, h.cie as CSHARP_CIE, h.see as CSHARP_SEE, h.total as CSHARP_TOTAL
		from atc a, cn b, dbms c, aiml d, dbmslab e, rm f, evs g, csharp h 
        where  a.usn = "4JK21CS048" 
			AND b.usn = "4JK21CS048" 
			AND c.usn = "4JK21CS048" 
			AND d.usn = "4JK21CS048" 
			AND e.usn = "4JK21CS048" 
			AND f.usn = "4JK21CS048" 
			AND g.usn = "4JK21CS048" 
			AND h.usn = "4JK21CS048";

select * from report;

desc student;


