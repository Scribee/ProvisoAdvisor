# Script that interfaces between Apache and the graph generator Python scripts.

import sys
# REPLACE BELOW PATH
path = 'C:/xampp/htdocs/ProvisoAdvisor/python' # REPLACE PATH FOR WHERE THE PYTHON DIRECTORY WAS PLACED
if path not in sys.path:
    sys.path.append(path)
import drawgraphs

# Called by mod-wsgi when the appropriate HTTP request is sent
def application(environ, start_response):
    status = '200 OK'
    id = '0'
    
    query = environ['QUERY_STRING']
    # Check that the query string starts with the ID key
    if (query[0:3] == 'ID=') :
        # Check that there is only 1 key-value pair in the string
        try :
            query.index('&')
        except ValueError :
            id = query[3:] # add value of key to output

    response_headers = [('Content-type', 'image/png')]
    start_response(status, response_headers)

    # Create a new graph for this student
    f = drawgraphs.create_skill_graph(id)
    
    return [f]
