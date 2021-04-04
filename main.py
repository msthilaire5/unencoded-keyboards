#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Created on Sat Apr  3 10:59:46 2021

@author: msthilaire
"""
from flask import Flask, render_template

from datetime import datetime


# create an instance of Flask. (a "Flask process")
app = Flask(__name__, template_folder="src/html") 

# tell the web server which function to run for "/"
@app.route('/') 
def hello_world():
    return render_template("test_canvas.html") # return value is sent to the client

# tell the web server which function to run for "/"
@app.route('/time') 
def time_page():
    return """
    <html>
  
    <h1>The time is now...</h1>{time}
                         test 
    </html>
    """.format(time = str(datetime.now()))


if __name__ == "__main__":
    app.run(debug=True, port=43560)