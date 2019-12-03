## University Student/Course Management Application

## TODO
- Write proper values for database (SQL) configuration

* Modify the ".htaccess" file, if necessary, depends on hosting environments

* Modify the "route" file, if necessary, depends on hosting environments 

## Scenario
- Guest/ access control applied, asked to log in

- Admin(admin:admin123)/ Has access to edit/delete student information, course information, grade information, admin information

* Student information - Admin can check students information, add/edit/delete a student information.

* Course information - Admin can check course information and add/edit/delete a course infromation.
- In edit option, admin can change course information and enroll or disenroll student from course.

* Grades - Admin can check all students grades from all course and also modify students grade. 

* Admin Menu - Admin can add/edit/delete a postal information and check PHP information.

- Student(student01:pass01)/ Has access to check/edit student own information, enroll/disenroll course, check course information and own grades.
* Student information - Student can check own information, edit a own student information

* Course information - Student can check course information and enroll/disenroll a course

* Grades - Student can check own grades from all course where student enrolled and got graded

* Admin Menu - Student does not have access to it.

* Search
- Admin can search students or courses by name.
- Student can search students or courses by name

# ER diagram

![alt text](https://raw.githubusercontent.com/t7haki01/ci_university_for_oamk/master/img/University2_EER_Diagram.png)
