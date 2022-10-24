import graphviz
from mysql.connector import connect

# Constants for now
studentID = '1'
get_classes="SELECT * FROM classes"
get_prereqs="SELECT * FROM prerequisites"
get_completed="SELECT * FROM takes WHERE ID=" + studentID
get_student="SELECT * FROM students WHERE ID=" + studentID

# Connect to mySQL
connection = connect(
    host = "localhost",
    user = "root",
    password = "",
    database = "provisoadvising"
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

# Create directed graph to output as a pdf
e = graphviz.Digraph(filename='classes', format='pdf')
e.attr('node', shape='egg')
e.attr(rankdir='LR')

# Get the class list and make a node for each class
cursor.execute(get_classes)
for row in cursor:
    # If the class has been taken, color the node
    if (row[0] in completed):
        e.node(str(row[0]), row[1] + str(row[2]) + '\n' + row[3], style='filled', fillcolor='#40e0d0')
    else:
        e.node(str(row[0]), row[1] + str(row[2]) + '\n' + row[3])

# Get the prerequisite relationships to know what arrows to draw
cursor.execute(get_prereqs)
for row in cursor:
    e.edge(str(row[1]), str(row[0]))

# Label the graph
e.attr(label=r'\nClass diagram for ' + student[1] + ' ' + student[2])
e.attr(fontsize='20')

e.view()