import time
import datetime
import os


def sendMail(email):
    sendmail_location = "/usr/sbin/sendmail" # sendmail location
    p = os.popen("%s -t" % sendmail_location, "w")
    p.write("From: %s\n" % "GusLally@hotmail.com")
    p.write("To: %s\n" % email[1])
    p.write("Subject: " + "just a reminder \n")
    p.write(email[2]) # blank line separating headers from body
    #p.write(email[2])
    status = p.close()
    if status != 0:
        print "Sendmail exit status", status


fh = open("rt.txt", 'r')
line = fh.readline()
email = line.split('||')
if email[0] == datetime.datetime.now().strftime("%d/%m/%Y"):
    sendMail(email)

while line:
    # do stuff with line
    line = fh.readline()
    email = line.split('||')
    if email[0] == datetime.datetime.now().strftime("%d/%m/%Y"):
        sendMail(email)

fh.close()

