from flask import Flask, render_template
import pandas
import csv

app=Flask(__name__)

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

training = pandas.read_csv('data/Training.csv')
testing= pandas.read_csv('data/Testing.csv')
cols= training.columns
cols= cols[:-1]
x = training[cols]
y = training['prognosis']
y1= y


def getDescription():
    global description_list
    with open('MasterData/symptom_Description.csv') as csv_file:
        csv_reader = csv.reader(csv_file, delimiter=',')
        line_count = 0
        for row in csv_reader:
            _description={row[0]:row[1]}
            description_list.update(_description)

def getSeverityDict():
    global severityDictionary
    with open('MasterData/symptom_severity.csv') as csv_file:

        csv_reader = csv.reader(csv_file, delimiter=',')
        line_count = 0
        try:
            for row in csv_reader:
                _diction={row[0]:int(row[1])}
                severityDictionary.update(_diction)
        except:
            pass

def getprecautionDict():
    global precautionDictionary
    with open('MasterData/symptom_precaution.csv') as csv_file:

        csv_reader = csv.reader(csv_file, delimiter=',')
        line_count = 0
        for row in csv_reader:
            _prec={row[0]:[row[1],row[2],row[3],row[4]]}
            precautionDictionary.update(_prec)
    
#running our Flask application
if __name__=='__main__':
    app.run(debug=True)
