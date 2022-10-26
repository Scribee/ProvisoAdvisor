from mysql.connector import connect

# Connect to mySQL
connection = connect(
    host = 'localhost',
    user = 'root',
    password = '',
    database = 'provisoadvising'
)
# Create cursor for executing queries
cursor = connection.cursor()