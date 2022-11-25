import graphviz
from dbconnector import cursor
from queries import GET_CLASSES, GET_PREREQS, GET_TAKEN, GET_STUDENT, GET_SKILLS, GET_ALL_SKILLS, GET_TEACHES, GET_JOBS, GET_COMPANIES, GET_REQUIRES
import colors

### Function Definitions ###

# Get the CRNs of all completed classes
def get_taken(year):
    if (year == 'all'):
        cursor.execute(GET_TAKEN)
    else:
        cursor.execute(GET_TAKEN + ' AND Year=' + str(year))
    completed = []
    for c in cursor:
        completed.append(c[1])
        
    return completed

# Get all skills learned by the student
def get_skills():
    cursor.execute(GET_SKILLS)
    learned = []
    for c in cursor:
        learned.append(c[0])
        
    return learned

# CREATE GRAPH FOR CLASSES
def print_classes():
    # Directed graph to be output as a pdf
    e = graphviz.Digraph(filename='graphs/classes', format='pdf')
    e.attr('node', shape='egg')
    e.attr(rankdir='LR')

    # Query the data for each year individually so they can be grouped into subgraphs
    for i in range(0, 5):
        # Make a new subgraph for each year
        with e.subgraph(name='clusterYear' + str(i)) as a:
            a.attr(style='filled', label='Year ' + str(i), fillcolor=colors.LIGHT2 + ':' + colors.LIGHT)
            
            completed = get_taken(i)
            
            # Get the class list and make a node for each class
            cursor.execute(GET_CLASSES + ' WHERE Year=' + str(i))
            for row in cursor:
                class_name = row[1] + str(row[2])
                # If the class has been taken, color the node
                if (class_name in completed):
                    a.node(class_name, row[1] + str(row[2]) + '\n' + row[3], style='filled', fillcolor=colors.PRIMARY)
                else:
                    a.node(class_name, row[1] + str(row[2]) + '\n' + row[3])

    # Get the prerequisite relationships to know what arrows to draw
    cursor.execute(GET_PREREQS)
    for row in cursor:
        e.edge(row[1], row[0], label=row[2])

    # Label the graph
    e.attr(label=r'\nClass diagram for ' + student[2] + ' ' + student[3] + '.')
    e.attr(fontsize='20')

    e.view()

# CREATE GRAPH FOR SKILLS
def print_skills():
    # Make undirected graph to output as a pdf
    f = graphviz.Graph(filename='graphs/skills', format='pdf')

    # Make a student node in the center
    f.attr('node', shape='square')
    f.node('s' + str(student[0]), student[2] + ' ' + student[3], style='filled', fillcolor=colors.PRIMARY)

    # Add skills around the student
    f.attr('node', shape='ellipse')
    cursor.execute(GET_SKILLS)
    for row in cursor:
        if (row[2] > 1):
            f.node(str(row[0]), row[1], style='filled', fillcolor=colors.SECONDARY)
        elif (row[2] == 1):
            f.node(str(row[0]), row[1], style='filled', fillcolor=colors.TERTIARY)
        else:
            f.node(str(row[0]), row[1], style='filled', fillcolor=colors.LIGHT)
        f.edge('s' + str(student[0]), str(row[0]))
        
    # Label the graph
    f.attr(label=r'\nSkills diagram for ' + student[2] + ' ' + student[3] + '.')
    f.attr(fontsize='20')

    f.view()

# Create a graph of every skill and the class that teaches it
def print_all_skills():
    # Make undirected graph to output as a pdf
    g = graphviz.Graph(filename='graphs/allskills', format='pdf', engine='neato')

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
        g.edge(row[0], str(row[1]))
        
    # Label the graph
    g.attr(label=r'\nAll skills taught by U of I classes.')
    g.attr(fontsize='20', overlap='scale')

    g.view()
    
# Create a different graph of the student's skills that includes their classes
def print_classes_and_skills():
    # Make undirected graph to output as a pdf
    h = graphviz.Graph(filename='graphs/classes+skills', format='pdf', engine='neato')

    completed = get_taken('all')
    learned = get_skills()

    # Make the class nodes square
    h.attr('node', shape='square')
    cursor.execute(GET_CLASSES)
    for row in cursor:
        class_name = row[1] + str(row[2])
        if (class_name in completed):
            h.node(class_name, style='filled', fillcolor=colors.PRIMARY)
        else:
            h.node(class_name, style='filled', fillcolor=colors.LIGHT)
        
    # Make skill nodes elliptical
    h.attr('node', shape='ellipse')
    cursor.execute(GET_ALL_SKILLS)
    for row in cursor:
        if (row[0] in learned):
            h.node(str(row[0]), row[1], style='filled', fillcolor=colors.SECONDARY)
        else:
            h.node(str(row[0]), row[1], style='filled', fillcolor=colors.LIGHT)
        
    # Create edges from the teaches table
    cursor.execute(GET_TEACHES)
    for row in cursor:
        h.edge(row[0], str(row[1]))
        
    # Label the graph
    h.attr(label=r'\nAll skills that ' + student[2] + ' ' + student[3] + ' has learned.')
    h.attr(fontsize='20', overlap='scale')

    h.view()
    
def print_jobs():
    # Make undirected graph to output as a pdf
    i = graphviz.Graph(filename='graphs/jobs', format='pdf')

    # Make the company nodes square
    i.attr('node', shape='square')
    cursor.execute(GET_COMPANIES)
    for row in cursor:
        i.node(row[0], style='filled', fillcolor=colors.LIGHT)
        
    # Make skill nodes elliptical
    i.attr('node', shape='ellipse')
    cursor.execute(GET_JOBS)
    for row in cursor:
        i.node('j' + str(row[0]), row[1], style='filled', fillcolor=colors.SECONDARY)
        i.edge(row[2], 'j' + str(row[0]))
        
    cursor.execute(GET_ALL_SKILLS)
    for row in cursor:
        i.node(str(row[0]), row[1], style='filled', fillcolor=colors.TERTIARY)
        
    cursor.execute(GET_REQUIRES)
    for row in cursor:
        i.edge('j' + str(row[0]), str(row[1]), len='1.0')
        
    # Label the graph
    i.attr(label=r'\nAll skills and the jobs that require them.')
    i.attr(fontsize='20')

    i.view()
    
### Program Start ###

# Get student information
cursor.execute(GET_STUDENT)
student = cursor.fetchall()[0]

print_classes()
print_skills()
print_classes_and_skills()
print_all_skills()
print_jobs()