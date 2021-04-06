#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Created on Sat Apr  3 10:59:46 2021

@author: msthilaire
"""
from flask import Flask, render_template
from base64 import b64decode


# create an instance of Flask. (a "Flask process")
app = Flask(__name__, template_folder="src/html") 


# tell the web server which function to run for "/"
@app.route('/') 
def drawing_canvas():
    return render_template("test_canvas.html") # return value is sent to the client


@app.route('/upload/<path:img_b64>')
def upload_char(img_b64):
    bin_img = b64decode(img_b64)
    new_char_file = open("new_char.png", 'wb')
    new_char_file.write(bin_img)
    new_char_file.close()

    return "Character received!"
 

if __name__ == "__main__":
    app.run(debug=True, port=42560)