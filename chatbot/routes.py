from urllib import request, response
from chatbot import app
from flask import render_template

#define root page
@app.route('/')
#define home page
@app.route('/home')
def homepage():
	return render_template('home.html')

#define about page
@app.route('/about')
def aboutpage():
    return render_template('about.html')

#define contact page
@app.route('/contact')
def contactpage():
    return render_template('contact.html')

@app.post('/predict')
def predict():
    text=request.get_json().get("message")

    response=get_response(text)
    message={"answer" : response}
    return jsonify(message)

bot_name = "Sam"

