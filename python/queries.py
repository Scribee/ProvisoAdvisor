# File to define query building functions

# Dynamic queries
def get_taken_query(studentID):
    return 'SELECT * FROM taken WHERE ID=' + studentID
def get_student_query(studentID):
    return 'SELECT * FROM students WHERE ID=' + studentID
def get_skills_query(studentID):
    return 'SELECT skills.ID, skills.Name, COUNT(skills.ID) AS Count FROM students, taken, classes, teaches, skills WHERE students.ID=' + studentID + ' AND students.ID=taken.ID AND taken.Class=classes.Class AND classes.Class=teaches.Class AND teaches.SkillID=skills.ID GROUP BY skills.Name'
def get_recommended_classes(studentID):
    return 'SELECT DISTINCT C.Class, C.Year, C.Credits FROM classes AS C, teaches AS T, (' + get_selected_skills(studentID) + ') AS A WHERE A.ID=T.SkillID AND C.Class=T.Class'
def get_selected_skills(studentID):
    return 'SELECT DISTINCT skills.ID, skills.Name FROM requires, selections, skills WHERE selections.CompanyID=requires.CompanyID AND skills.ID=requires.SkillID AND selections.ID=' + studentID
def get_selection(studentID):
    return 'SELECT companies.ID, companies.Name FROM companies, selections WHERE companies.ID=selections.CompanyID AND selections.ID=' + studentID
def get_requires(companyID):
    return 'SELECT SkillID FROM requires WHERE CompanyID=' + companyID
def get_detailed_prereqs(year):
    return 'SELECT prerequisites.Class, Prereq FROM prerequisites, classes WHERE prerequisites.Class = classes.Class AND Year = ' + year

# Constant queries
#'SELECT skills.ID, skills.Name FROM students, taken, classes, teaches, skills WHERE students.ID=' + studentID + ' AND students.ID=taken.ID AND taken.Class=classes.Class AND classes.Class=teaches.Class AND teaches.SkillID=skills.ID'
GET_CLASSES = 'SELECT * FROM classes'
GET_PREREQS = 'SELECT * FROM prerequisites'
GET_ALL_SKILLS = 'SELECT * FROM skills'
GET_TEACHES = 'SELECT Class, SkillID FROM teaches'
GET_JOBS = 'SELECT jobs.id, jobs.name, jobs.company FROM jobs'
GET_REQUIRES = 'SELECT jobID, skillID FROM requires'
GET_COMPANIES = 'SELECT DISTINCT jobs.company FROM jobs'
