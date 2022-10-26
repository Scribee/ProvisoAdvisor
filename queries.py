# File to define queries as constants

studentID = input('Please enter your student ID: ')

GET_CLASSES = 'SELECT * FROM classes'
GET_PREREQS = 'SELECT * FROM prerequisites'
GET_TAKEN = 'SELECT * FROM taken WHERE ID=' + studentID + ' AND Year='
GET_STUDENT = 'SELECT * FROM students WHERE ID=' + studentID
GET_SKILLS = 'SELECT skills.ID, skills.Name FROM students, taken, classes, teaches, skills WHERE students.ID=' + studentID + ' AND students.ID=taken.ID AND taken.Class=classes.Class AND classes.Class=teaches.Class AND teaches.SkillID=skills.ID'
GET_ALL_SKILLS = 'SELECT * FROM skills'
GET_TEACHES = 'SELECT * FROM teaches'