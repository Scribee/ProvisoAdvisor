import graphviz
from dbconnector import cursor
import queries as q
import colors
import os

### Function Definitions ###

# Get the CRNs of all completed classes
def get_taken(year):
    if (year == 'all'):
        cursor.execute(q.get_taken_query(id))
    else:
        cursor.execute(q.get_taken_query(id) + ' AND Year=' + str(year))
    completed = []
    for c in cursor:
        completed.append(c[1])
        
    return completed

# Get all skills learned by the student
def get_skills():
    cursor.execute(q.get_skills_query(id))
    learned = []
    for c in cursor:
        learned.append(c[0])
        
    return learned

# Create graph with all classes, grouped by year and connected where prerequisites exist
def print_classes():
    if (os.path.exists(GRAPH_DIR + '/classes.png')):
        os.remove(GRAPH_DIR + '/classes.png')
        
    # Directed graph to be output as a png
    e = graphviz.Digraph(filename=GRAPH_DIR + '/classes', format='png', engine='dot')
    e.attr('node', shape='square', style='rounded,filled', width='2', fixedsize='shape')
    e.attr('edge', minlen='2')
    e.attr(rankdir='LR', pad='1', compound='true', forcelabels='true')
    
    completed = get_taken('all')
    lastNode = None
    global student

    # Query the data for each year individually so they can be grouped into subgraphs
    for i in range(1, 5):
        # Make a new subgraph for each year
        with e.subgraph(name='clusterYear' + str(i)) as a:
            a.attr(label='<<b>Year ' + str(i) + '</b>>', style='rounded')
            if (student[5] > i):
                a.attr(style='filled,rounded', fillcolor=colors.SECONDARY)
 
            # Get a list of this years prerequisites to add relevant ones to each node's label
            cursor.execute(q.get_detailed_prereqs(str(i)))
            prereqs = cursor.fetchall()

            # Get the class list and make a node for each class
            cursor.execute(q.GET_CLASSES + ' WHERE Year=' + str(i))
            if (cursor == None) :
                continue
            
            first = True
            classes = []
            credit = 0
            for row in cursor:
                class_name = row[1] + str(row[2])
                classes.append(class_name)
                credit += row[6]
                
                # Check if this is the first node in the cluster
                if (first):
                    # Make an edge between the last cluster and this one
                    if (lastNode != None):
                        e.edge(lastNode, class_name, ltail='clusterYear' + str(i - 1), lhead='clusterYear' + str(i))
                    lastNode = class_name
                    first = False
                
                class_title = row[3]
                # Replace the last space with a newline character if the title is longer than the node
                if (len(class_title) > 30):
                    class_title = '<br/>'.join(class_title.rsplit(' ', 2))
                    class_title = ' '.join(class_title.rsplit('<br/>', 1))
                elif (len(class_title) > 20):
                    class_title = '<br/>'.join(class_title.rsplit(' ', 1))
                    
                # Add italic prerequisite list below the class title
                class_title += '<br/>'
                for r in prereqs:
                    if (r[0] == class_name):
                        class_title += '<br/><i>' + r[1] + '</i>'
                
                # If the class has been taken, color the node
                if (completed != None and class_name in completed):
                    a.node(class_name, label='<' + class_name + '<br/>' + class_title + '>', fillcolor=colors.PRIMARY)
                else:
                    a.node(class_name, label='<' + class_name + '<br/>' + class_title + '>', fillcolor=colors.LIGHT)
    
            class_list = str(classes).replace('[', '(').replace(']', ')')
            # Get the prerequisite relationships to know what arrows to draw
            cursor.execute(q.GET_PREREQS + ' WHERE Class IN ' + class_list + ' AND Prereq IN ' + class_list)
            for row in cursor:
                e.edge(row[1], row[0], xlabel=row[2] + '  ', constraint='false', dir='both' if row[2] == 'Corequisite' else 'forward')
                
            if (student[5] <= i):
                with a.subgraph(name='clusterYear' + str(i) + 'Credits') as b:
                    b.attr(label='Year ' + str(i) + ' credits:', style='filled', fillcolor=colors.LIGHT)
                    b.attr('node', shape='rect', style='rounded,filled', fixedsize='false', fillcolor=colors.SECONDARY)
                    
                    creditLabel = str(credit) + ' total credits.'
                    creditLabel += '\nConsider taking ' + str(30 - credit) + ' credits of\nour recommended electives!'
                    
                    b.node('credits' + str(i), label=creditLabel)

    # Label the graph
    e.attr(label=r'\nClass diagram for ' + student[2] + ' ' + student[3] + '.')
    e.attr(fontsize='20')
    
    #e.view()

    return open(e.render(), 'rb').read()

# Creates a graph with the recommended classes and the skills they fulfil
def print_recommendations():
    if (os.path.exists(GRAPH_DIR + '/recommendations.png')):
        os.remove(GRAPH_DIR + '/recommendations.png')
        
    # Undrected graph to be output as a png
    e = graphviz.Digraph(filename=GRAPH_DIR + '/recommendations', format='png', engine='dot')
    e.attr('node', shape='square', style='rounded,filled')
    e.attr(overlap='scale', rankdir='LR', pad='1', compound='true')
    
    cursor.execute(q.get_selection(id))
    if (cursor != None):
        company = cursor.fetchone()
        
        e.node('c' + str(company[0]), company[1], fillcolor=colors.LIGHT)
        
        # Make a subgraph for the recommended classes
        with e.subgraph(name='clusterElectives') as b:
            b.attr(label='<<b>Recommended classes</b>>', style='rounded')
            
            completed = get_taken('all')
            cursor.execute(q.get_recommended_classes(id))
            for row in cursor:
                if (row[0] in completed):
                    b.node(row[0], '<' + row[0] + '<br/><i>Already passed!</i>>', fillcolor=colors.LIGHT2, fixedsize='shape', width='1.4')
                elif (row[1] != 0):
                    b.node(row[0], '<' + row[0] + '<br/><i>Required course</i>>', fillcolor=colors.LIGHT2, fixedsize='shape', width='1.4')
                else:
                    b.node(row[0], '<' + row[0] + '<br/><i>Elective</i>>', fillcolor=colors.LIGHT, fixedsize='shape', width='1.4')
                
        cursor.execute(q.GET_TEACHES + ' WHERE Class IN (' + 'SELECT Class FROM (' + q.get_recommended_classes(id) + ') AS C) AND SkillID IN (SELECT S.ID AS SkillID FROM (' + q.get_selected_skills(id) + ') AS S)')
        available = [] # keep track of which skills are actually taught at U of I
        for row in cursor:
            available.append(row[1])
            e.edge(row[0], str(row[1]))
            
        with e.subgraph(name='clusterSkills') as c:
            c.attr(label='<<b>Requirements</b>>', style='rounded')
            
            first = True # add an edge from the subgraph to the company using the first node
            cursor.execute(q.get_selected_skills(id))
            for row in cursor:
                if (row[0] not in available):
                    c.node(str(row[0]), row[1].replace(' ', '\n', 3), fillcolor=colors.SECONDARY, width='1.2', fixedsize='shape')
                else:
                    c.node(str(row[0]), row[1].replace(' ', '\n', 3), fillcolor=colors.PRIMARY, group='skills', width='1.2', fixedsize='shape')
                    if (first):
                        e.edge(str(row[0]), 'c' + str(company[0]), ltail='clusterSkills')
                        first = False
    
    # Label the graph
    global student
    e.attr(label=r'\nRecommended classes for ' + student[2] + ' ' + student[3] + '.')
    e.attr(fontsize='20')
    
    #e.view()

    return open(e.render(), 'rb').read()

# Creates a graph of all skills a student has
def print_skills():
    # Make undirected graph to output as a png
    f = graphviz.Graph(filename=GRAPH_DIR + '/skills', format='png')

    # Make a student node in the center
    f.attr('node', shape='square')
    global student
    f.node('s' + str(student[0]), student[2] + ' ' + student[3], style='filled', fillcolor=colors.PRIMARY)

    # Add skills around the student
    f.attr('node', shape='ellipse')
    cursor.execute(q.get_skills_query(id))
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
    
    #f.view()

    return open(f.render(), 'rb').read()

# Create a graph of every skill and the class that teaches it
def print_all_skills():
    # Make undirected graph to output as a pdf
    g = graphviz.Graph(filename='graphs/allskills', format='pdf', engine='neato')

    # Make the class nodes square
    g.attr('node', shape='square')
    cursor.execute(q.GET_CLASSES)
    for row in cursor:
        class_name = row[1] + str(row[2])
        g.node(class_name)
        
    # Make skill nodes elliptical
    g.attr('node', shape='ellipse')
    cursor.execute(q.GET_ALL_SKILLS)
    for row in cursor:
        g.node(str(row[0]), row[1])
    
    cursor.execute(q.GET_TEACHES)
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
    h.attr(fontsize='20')

    completed = get_taken('all')
    learned = get_skills()

    # Make the class nodes square
    h.attr('node', shape='square')
    cursor.execute(q.GET_CLASSES)
    for row in cursor:
        class_name = row[1] + str(row[2])
        if (class_name in completed):
            h.node(class_name, style='filled', fillcolor=colors.PRIMARY)
        else:
            h.node(class_name, style='filled', fillcolor=colors.LIGHT)
        
    # Make skill nodes elliptical
    h.attr('node', shape='ellipse')
    cursor.execute(q.GET_ALL_SKILLS)
    for row in cursor:
        if (row[0] in learned):
            h.node(str(row[0]), row[1], style='filled', fillcolor=colors.SECONDARY)
        else:
            h.node(str(row[0]), row[1], style='filled', fillcolor=colors.LIGHT)
        
    # Create edges from the teaches table
    cursor.execute(q.GET_TEACHES)
    for row in cursor:
        h.edge(row[0], str(row[1]), len='3.0')
        
    # Label the graph
    global student
    h.attr(label=r'\nAll skills that ' + student[2] + ' ' + student[3] + ' has learned.')
    h.attr(overlap='compress')

    h.view()
    
# Prints all companies and their required skills
def print_jobs():
    # Make undirected graph to output as a pdf
    i = graphviz.Graph(filename='graphs/jobs', format='pdf')

    # Make the company nodes square
    i.attr('node', shape='square')
    cursor.execute(q.GET_COMPANIES)
    for row in cursor:
        i.node(row[0], style='filled', fillcolor=colors.LIGHT)
        
    # Make skill nodes elliptical
    i.attr('node', shape='ellipse')
    cursor.execute(q.GET_JOBS)
    for row in cursor:
        i.node('j' + str(row[0]), row[1], style='filled', fillcolor=colors.SECONDARY)
        i.edge(row[2], 'j' + str(row[0]))
        
    cursor.execute(q.GET_ALL_SKILLS)
    for row in cursor:
        i.node(str(row[0]), row[1], style='filled', fillcolor=colors.TERTIARY)
        
    cursor.execute(q.GET_REQUIRES)
    for row in cursor:
        i.edge('j' + str(row[0]), str(row[1]), len='1.0')
        
    # Label the graph
    i.attr(label=r'\nAll skills and the jobs that require them.')
    i.attr(fontsize='20')

    i.view()
    
# Creates the student's class graph
def create_class_graph(user):
    update_student(user)
    return print_classes()
    
# Creates the student's skills graph
def create_skill_graph(user):
    update_student(user)
    return print_recommendations()

# Sets the provided value as the student id for the queries
def update_student(user):
    # Get student information
    global id
    global student
    id = user
    cursor.execute(q.get_student_query(id))
    student = cursor.fetchall()[0]
    
GRAPH_DIR = 'graphs'

# Initialize id and student
id = '2'
cursor.execute(q.get_student_query(id))
student = cursor.fetchall()[0]
#create_skill_graph('19')
#create_class_graph('2')
#print_classes_and_skills()
