# Flask Ninja

**Points** : 250

**Description**:
Hattori Hattori yeh hai apna yaar , hasta aur hasata hai yeh asli ninja meh hu ek jinja!!

## Write-up

The challenge link contains a web page wherein one can enter a query and get a few search results based on it.

There is a hint in the name of the challenge itself `Flask Ninja`. If you look-up for Flask-based exploits, you would come upon **Server Side Template Injection**. Flask uses **Jinga** which is web template engine for the Python programming language.

When you try entering `{{7*7}}` *a standard query to check whether Jinja templating is being used* in the query it returns `49`. Similarly, if you look-up for a few standard Jinga Templating exploits you'll find `{{config}}` <br>
It returns a huge result:<br>
`.....'SECRET_KEY': "def get_user_file(f_name):\n\twith open(f_name) as f:\n\t\treturn f.readlines()\n\ndef execute(cmd):\n return os.popen(cmd).read()\n\napp.jinja_env.globals['get_user_file'] = get_user_file\napp.jinja_env.globals['execute'] = execute\n", .....`

The `SECRET_KEY` of the result seems to contain 2 python functions. get_user_file() seems to read a file and return it's contents while execute() returns the output of command run on the terminal. execute() can be used to gain access to the shell and execute the shell commands. 