import sys
sys.path.append('C:/xampp/htdocs/ProvisoAdvisor/python')
import drawgraphs

def application(environ, start_response):
    status = '200 OK'
    output = '0'
    
    query = environ['QUERY_STRING']
    # Check that the query string starts with the ID key
    if (query[0:3] == 'ID=') :
        # Check that there is only 1 key-value pair in the string
        try :
            query.index('&')
        except ValueError :
            output = query[3:] # add value of key to output

    response_headers = [('Content-type', 'image/png')] #('Content-Length', str(len(output))
    start_response(status, response_headers)

    return drawgraphs.create_graphs(output) #[bytes(output, 'ascii')]