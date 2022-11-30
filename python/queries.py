# File to define query building functions

# Dynamic queries
def get_taken_query(studentID):
    return 'SELECT * FROM taken WHERE ID=' + studentID
def get_student_query(studentID):
    return 'SELECT * FROM students WHERE ID=' + studentID
def get_skills_query(studentID):
    return 'SELECT skills.ID, skills.Name, COUNT(skills.ID) AS Count FROM students, taken, classes, teaches, skills WHERE students.ID=' + studentID + ' AND students.ID=taken.ID AND taken.Class=classes.Class AND classes.Class=teaches.Class AND teaches.SkillID=skills.ID GROUP BY skills.Name'

# Constant queries
#'SELECT skills.ID, skills.Name FROM students, taken, classes, teaches, skills WHERE students.ID=' + studentID + ' AND students.ID=taken.ID AND taken.Class=classes.Class AND classes.Class=teaches.Class AND teaches.SkillID=skills.ID'
GET_CLASSES = 'SELECT * FROM classes'
GET_PREREQS = 'SELECT * FROM prerequisites'
GET_ALL_SKILLS = 'SELECT * FROM skills'
GET_TEACHES = 'SELECT Class, SkillID FROM teaches'
GET_JOBS = 'SELECT jobs.id, jobs.name, jobs.company FROM jobs'
GET_REQUIRES = 'SELECT jobID, skillID FROM requires'
GET_COMPANIES = 'SELECT DISTINCT jobs.company FROM jobs'