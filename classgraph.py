import graphviz
from dbconnector import cursor
from queries import GET_CLASSES, GET_PREREQS, GET_TAKEN, GET_STUDENT, GET_SKILLS, GET_ALL_SKILLS, GET_TEACHES

### Function Definitions ###

# Get the CRNs of all completed classes
def get_taken(year):
    cursor.execute(GET_TAKEN + str(year))
    completed = []
    for c in cursor:
        completed.append(c[1])
        
    return completed

# CREATE GRAPH FOR CLASSES
def print_classes():
    # Directed graph to be output as a pdf
    e = graphviz.Digraph(filename='classes', format='pdf')
    e.attr('node', shape='egg')
    e.attr(rankdir='LR')

    # Query the data for each year individually so they can be grouped into subgraphs
    for i in range(0, 5):
        # Make a new subgraph for each year
        with e.subgraph(name='clusterYear' + str(i)) as a:
            a.attr(style='filled', label='Year ' + str(i), fillcolor='#DDDDDD:#EEEEEE')
            
            completed = get_taken(i)
            
            # Get the class list and make a node for each class
            cursor.execute(GET_CLASSES + ' WHERE Year=' + str(i))
            for row in cursor:
                class_name = row[1] + str(row[2])
                # If the class has been taken, color the node
                if (class_name in completed):
                    a.node(class_name, row[1] + str(row[2]) + '\n' + row[3], style='filled', fillcolor='#40e0d0')
                else:
                    a.node(class_name, row[1] + str(row[2]) + '\n' + row[3])

    # Get the prerequisite relationships to know what arrows to draw
    cursor.execute(GET_PREREQS)
    for row in cursor:
        e.edge(row[1], row[0], label=row[2])

    # Label the graph
    e.attr(label=r'\nClass diagram for ' + student[2] + ' ' + student[3])
    e.attr(fontsize='20')

    e.view()

# CREATE GRAPH FOR SKILLS
def print_skills():
    # Make undirected graph to output as a pdf
    f = graphviz.Graph(filename='skills', format='pdf')

    # Make a student node in the center
    f.attr('node', shape='square')
    f.node(str(student[0]), student[2] + ' ' + student[3])

    # Add skills around the student
    f.attr('node', shape='ellipse')
    cursor.execute(GET_SKILLS)
    for row in cursor:
        f.node(str(row[0]), row[1])
        f.edge(str(student[0]), str(row[0]))
        
    # Label the graph
    f.attr(label=r'\nSkills diagram for ' + student[2] + ' ' + student[3])
    f.attr(fontsize='20')

    f.view()
    
def print_all_skills():
    # Make undirected graph to output as a pdf
    g = graphviz.Graph(filename='classes+skills', format='pdf', engine='neato')

    # Make the class nodes square
    g.attr('node', shape='square')
    cursor.execute(GET_CLASSES)
    for row in cursor:
        class_name = row[1] + str(row[2])
        g.node(class_name)
        
    # Make skill nodes elliptical
    g.attr('node', shape='ellipse')
    cursor.execute(GET_ALL_SKILLS)
    for row in cursor:
        g.node(str(row[0]), row[1])
    
    cursor.execute(GET_TEACHES)
    for row in cursor:
        g.edge(row[0], str(row[1]), len='2.0')
        
    # Label the graph
    g.attr(label=r'\nAll skills taught by U of I classes.')
    g.attr(fontsize='20')

    g.view()
    
### Program Start ###    

# Get student information
cursor.execute(GET_STUDENT)
student = cursor.fetchall()[0]

print_classes()
print_skills()
print_all_skills()