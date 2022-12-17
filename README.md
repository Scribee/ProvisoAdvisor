# ProvisoAdvisor  
  
## Overview  
  
ProvisoAdvisor is a college advising site specifically intended to be used by CS majors at the University of Idaho. Using information about what skills you hope to learn in the future or what company you would like to work for, creates a graph of recommended classes for you to take.  
  
## Usage  
  
- Create an account 
- Add the classes you've taken in the past
- Select a company you're interested in working for
  - Select specific skills if none of the companies appeal to you
- Click the *Generate graphs* button at the bottom of the page to view your recommended class schedule  
  
## Server Setup  
  
- The web interface was created in Laravel, and is completely contained within the *ProvisoLaravel* directory.  
  - The login system and dashboard rely on having the provisoadvising database set up in phpMyAdmin. We have not created a migration for these tables, instead create an empty database in phpMyAdmin called **provisoadvising** and import the *DatabaseSetup.sql* file found at the top level of the repository.
  
- The graph generation scripts are in the *python* directory, which can be placed anywhere within the server memory. To run these scripts, the following system requirements must be met:
- Python interpreter
  - **Python 3.8**: the source can be downloaded from [here](https://www.python.org/downloads/release/python-3816/) and installed using make.
- Packages
  - **mod-wsgi 4.9.4**: run `pip install mod-wsgi`. More information can be found [here](https://pypi.org/project/mod-wsgi/).
  - **mysql-connector-python 8.0.29**: run `pip install mysql-connector-python==8.0.29`. This version is necessary for compatibility with mod-wsgi on my machine.
  - **graphviz 0.20.1**: run `pip install graphviz`.
  
- The WSGI interface scripts are in the *wsgi* directory, which can be placed anywhere outside the *ProvisoLaravel* directory. Inside the *wsgi* directory are two scripts which need to be modified once the python scripts have been copied to the server. Open each one and change the string in the 5th line to the path of the *python* folder on the server so the wsgi scripts can import the graph generator.  
  
- Run the command `mod_wsgi-express module-config` in a terminal and copy the output, which should be 3 lines.  
  
- Apache must now be configured to allow mod-wsgi to handle certain HTTP requests by adding several lines to *httpd.conf*. I've provided *SAMPLE_httpd.conf* as an example of how I modified mine for running wsgi with XAMPP. It's not necessary to look at this since I'm not sure how different things are for your Apache setup. Lines 188 to 221 include all of the additions I made to the default configuration file.
  - Within our project's VirtualHost section, paste the output of the last command. This should include paths to the python installation and mod-wsgi module.
  - Below this, add the following WSGI configuration:  
  - ```
# Change "localhost" to the ServerName of the VirtualHost  
WSGIDaemonProcess localhost maximum-requests=4  
WSGIProcessGroup localhost  
# Change the paths to the locations of the wsgi scripts on the server  
WSGIScriptAlias /wsgi/classGraph C:/xampp/wsgi/drawclassgraph.wsgi  
WSGIScriptAlias /wsgi/skillGraph C:/xampp/wsgi/drawskillgraph.wsgi
```
  - Below this, add the following directory information:  
  - ```
# Change this path to the location of the wsgi directory  
<Directory "C:/xampp/wsgi">  
<IfVersion < 2.4>  
    Order allow,deny  
    Allow from all  
</IfVersion>  
<IfVersion >= 2.4>  
    Require all granted  
</IfVersion>  
</Directory>
```
  - More information about mod-wsgi configuration can be found [here](https://modwsgi.readthedocs.io/en/develop/configuration.html).