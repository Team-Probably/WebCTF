from flask import Flask, render_template, abort,request, render_template_string,redirect
import os
from google import google
app = Flask(__name__)

flag = "Flag{n1nj4_h4tt0ri}"

app.secret_key = '''def get_user_file(f_name):
	with open(f_name) as f:
		return f.readlines()

def execute(cmd):
    return os.popen(cmd).read()

app.jinja_env.globals['get_user_file'] = get_user_file
app.jinja_env.globals['execute'] = execute
'''

@app.route('/',methods=['GET'])
def index():
    reply = {"reply":request.args.get('query')}
    html = open("./templates/index.html").read()
    resu = '''<div id="result">
		<div id="title">Results</div>
		<div id="def">
			<i><div id="partOfSpeech"></div></i>
			<div id="defs">
				<br>
				<ul style="circle" id="list">%s
				</ul>
			</div>
			<span class="noRes"></span>
		</div>
    </div>'''
    if reply['reply'] is None:
        reply['reply'] = ""
    if reply['reply'][0:2]=="{{" and reply['reply'][-2:]=="}}":
        return render_template_string(html + resu%reply['reply'])
    search = google.search(reply['reply'], 1)
    result = ""
    for i in search:
        result+=i.name+"<br>"+i.description+"<br><br>"
    res = resu%str(reply['reply'] + "<br>" + result)
    html = html+res
    return render_template_string(html)

def get_user_file(f_name):
	with open(f_name) as f:
		return f.readlines()

def exec(cmd):
    blacklist = ["rm","rf","del","app.py"]
    print(cmd)
    for i in blacklist:
        if i in cmd:
            return redirect('/')
    return os.popen(cmd).read()



app.jinja_env.globals['get_user_file'] = get_user_file
app.jinja_env.globals['exec'] = exec

if __name__ == "__main__":
    app.run(host="0.0.0.0")
