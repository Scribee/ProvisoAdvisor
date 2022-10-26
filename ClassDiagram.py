import graphviz
from mysql.connector import connect

# Constants for now
studentID = input('Please enter your student ID: ')
get_classes = 'SELECT * FROM classes WHERE Year='
get_prereqs = 'SELECT * FROM prerequisites'
get_completed = 'SELECT * FROM taken WHERE ID=' + studentID
get_student = 'SELECT * FROM students WHERE ID=' + studentID
get_skills = 'SELECT skills.ID, skills.Name FROM students, taken, classes, teaches, skills WHERE students.ID=' + studentID + ' AND students.ID=taken.ID AND taken.Class=classes.Class AND classes.Class=teaches.Class AND teaches.SkillID=skills.ID'

# Connect to mySQL
connection = connect(
    host = 'localhost',
    user = 'root',
    password = '',
    database = 'provisoadvising'
)
cursor = connection.cursor()

# Get student information
cursor.execute(get_student)
student = cursor.fetchall()[0]

# Get the CRNs of all completed classes
cursor.execute(get_completed)
completed = []
for c in cursor:
    completed.append(c[1])

#### CREATE GRAPH FOR CLASSES ####
# Directed graph to be output as a pdf
e = graphviz.Digraph(filename='classes', format='pdf')
e.attr('node', shape='egg')
e.attr(rankdir='LR')

# Query the data for each year individually so they can be grouped into subgraphs
for i in range(0, 5):
    # Make a new subgraph for each year
    with e.subgraph(name='clusterYear' + str(i)) as a:
        a.attr(style='filled', label='Year ' + str(i), fillcolor='#DDDDDD:#EEEEEE')
        
        # Get the class list and make a node for each class
        cursor.execute(get_classes + str(i))
        for row in cursor:
            class_name = row[1] + str(row[2])
            # If the class has been taken, color the node
            if (class_name in completed):
                a.node(class_name, row[1] + str(row[2]) + '\n' + row[3], style='filled', fillcolor='#40e0d0')
            else:
                a.node(class_name, row[1] + str(row[2]) + '\n' + row[3])

# Get the prerequisite relationships to know what arrows to draw
cursor.execute(get_prereqs)
for row in cursor:
    e.edge(row[1], row[0], label=row[2])

# Label the graph
e.attr(label=r'\nClass diagram for ' + student[2] + ' ' + student[3])
e.attr(fontsize='20')

e.view()

# CREATE GRAPH FOR SKILLS

# Make undirected graph to output as a pdf
f = graphviz.Graph(filename='skills', format='pdf')

# Make a student node in the center
f.attr('node', shape='square')
f.node(str(student[0]), student[2] + ' ' + student[3])

# Add skills around the student
f.attr('node', shape='ellipse')
cursor.execute(get_skills)
for row in cursor:
    f.node(str(row[0]), row[1])
    f.edge(str(student[0]), str(row[0]))
    
# Label the graph
f.attr(label=r'\nSkills diagram for ' + student[2] + ' ' + student[3])
f.attr(fontsize='20')

f.view()